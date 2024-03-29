<?php

/**
 * comentario actions.
 *
 * @package    anuncios
 * @subpackage comentario
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class comentarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $consulta='a.activo = 1 AND a.borrado= 0';
        $consulta.=' AND a.idAnuncio = '.$request->getParameter('idAnuncio').'';
    $this->comentarios = Doctrine_Core::getTable('Comentario')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy('a.created_at DESC')
      ->execute();
  }
  
    public function executeIndex5(sfWebRequest $request)
  {
      
      $consulta='a.activo = 1 AND a.borrado= 0';
        $consulta.=' AND a.idAnuncio = '.$request->getParameter('idAnuncio').'';
    $this->comentarios = Doctrine_Core::getTable('Comentario')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy('a.created_at DESC')
       ->limit(5)
      ->execute();
    $this->setTemplate('index');
  }
  
  
    public function executeIndexUsuario(sfWebRequest $request)
  {
                    $anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('idAnuncio')));
      if($this->getUser()->getGuardUser()->getEmail_address()==$anuncio->correo){

      $consulta='a.borrado= 0';
        $consulta.=' AND a.idAnuncio = '.$request->getParameter('idAnuncio').'';
    $q = Doctrine_Core::getTable('Comentario')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy('a.created_at DESC');
 $this->anuncio = Doctrine_Core::getTable('Anuncio')->find($request->getParameter('idAnuncio')); 
        $this->comentarios = new sfDoctrinePager('Comentario', 20);
	$this->comentarios->setQuery($q);   	
        $this->comentarios->setPage($this->getRequestParameter('page',1));
	$this->comentarios->init();
        //route del paginado
        $this->action = '@comentario_indexUsuario_page';  
            }else{
            $this->getUser()->setFlash('mensajeErrorGrave','Este anuncio no te pertenece, porfavor respeta la privacidad y seguridad de la web.');
            $this->redirect('tusAnuncios/index');
        }
  }
  
        public function executeNuevo(sfWebRequest $request)
  {
    $idAnuncio=$request->getParameter('idAnuncio');
    
    $comentario= new Comentario();
    $comentario->setIdAnuncio($idAnuncio);
    $comentario->setNombre($request->getParameter('nombre'));
    $comentario->setCorreo($request->getParameter('correo'));
    $comentario->setTelefono($request->getParameter('telefono'));
    $comentario->setTexto($request->getParameter('publicacion'));
    //desarrollo
    $comentario->setActivo(1);
    $comentario->setBorrado(0);
    $comentario->save();    

  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ComentarioForm();
  }
  
  
    public function executeShow(sfWebRequest $request)
  {
    $this->comentario = Doctrine_Core::getTable('Comentario')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->comentario);
  }

  public function executeCreate(sfWebRequest $request)
  {
//    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ComentarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($comentario = Doctrine_Core::getTable('Comentario')->find(array($request->getParameter('id'))), sprintf('Object comentario does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComentarioForm($comentario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($comentario = Doctrine_Core::getTable('Comentario')->find(array($request->getParameter('id'))), sprintf('Object comentario does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComentarioForm($comentario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($comentario = Doctrine_Core::getTable('Comentario')->find(array($request->getParameter('id'))), sprintf('Object comentario does not exist (%s).', $request->getParameter('id')));
    $comentario->delete();

    $this->redirect('comentario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $comentario = $form->save();

      $this->redirect('comentario/edit?id='.$comentario->getId());
    }
  }
  
        public function executeSwitchValor(sfWebRequest $request){
    $this->forward404Unless($comentario = Doctrine_Core::getTable('Comentario')->find(array($request->getParameter('id'))), sprintf('Object comentario does not exist (%s).', $request->getParameter('id')));
    if($request->getParameter('variable')=='activo'){
        $comentario->activo=$request->getParameter('valor');
    }
    $comentario->save();
    
    }
  
}
