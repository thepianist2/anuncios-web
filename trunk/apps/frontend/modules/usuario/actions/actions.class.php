<?php

/**
 * usuario actions.
 *
 * @package    anuncios
 * @subpackage usuario
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{



  public function executeEdit(sfWebRequest $request)
  {
      if($this->getUser()->isAuthenticated()){
    $this->forward404Unless($sf_guard_user = Doctrine_Core::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserFormEdit($sf_guard_user);
      }else{
          $this->getUser()->setFlash('mensajeErrorGrave','El usuario no está autenticado!');
          $this->redirect('default/index');
      }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sf_guard_user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserFormEdit($sf_guard_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  
 
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
   $errorExiste=false;
    $errorExisteEmail=false;
   $errorExisteUserName=false;
   $usuarioSiExiste=null;
   $valores = $request->getParameter($form->getName());
   $username = $valores['username'];
   $email = $valores['email_address'];
   
        if($form->getObject()->isNew() or $form->getObject()->username != $valores['username'] or $form->getObject()->email_address != $valores['email_address'] )
        {
            if(Doctrine_Core::getTable('sfGuardUser')->verificarExisteEmail($email))
            {
                 $errorExisteEmail=true;
                 $errorExiste=true;
                 $usuarioSiExiste= Doctrine_Core::getTable('sfGuardUser')->getByEmail($email);
                 
            }
                 
            if(Doctrine_Core::getTable('sfGuardUser')->verificarExisteUserName($username))
            {
                 $errorExisteUserName=true;
                 $errorExiste=true;
                 $usuarioSiExiste= Doctrine_Core::getTable('sfGuardUser')->getByUserName($username);       
                 
            }          
                
        }
    
    if ($form->isValid() && $errorExiste==false)
    {
      $sf_guard_user = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Usuario guardado.');
      $this->redirect('usuario/edit');
    }else{
       if($errorExiste){
           
           if($errorExisteEmail){

               
          $this->getUser()->setFlash('mensajeErrorGrave','Este correo ya existe');
        
           }
           
           if($errorExisteUserName){
          $this->getUser()->setFlash('mensajeErrorGrave','Este nombre de usuario ya existe');
               
           }

               $this->redirect('usuario/edit');
//           
//            $this->getUser()->setFlash('mensajeErrorGrave','Este usuario ya existe, será te hemos redireccionado al usuario existente');
//            $this->getUser()->setFlash('mensajeSuceso','Edita este usuario existente o vuelve atrás si quieres crear otro usuario');
            
//            $this->redirect('usuario/show?id='.$usuarioSiExiste->id);
            

        }else{
            $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados.');
        }  
    }
  }
  
  
   
}

