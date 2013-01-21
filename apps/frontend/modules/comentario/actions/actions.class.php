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
}
