<?php

/**
 * denunciaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage denunciaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class denunciaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->denuncia_anuncios = Doctrine_Core::getTable('DenunciaAnuncio')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->denuncia_anuncio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DenunciaAnuncioForm();
    $this->form->setDefault('idAnuncio', $this->getUser()->getAttribute('idAnuncio'));
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DenunciaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new DenunciaAnuncioForm($denuncia_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new DenunciaAnuncioForm($denuncia_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($denuncia_anuncio = Doctrine_Core::getTable('DenunciaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object denuncia_anuncio does not exist (%s).', $request->getParameter('id')));
    $denuncia_anuncio->delete();

    $this->redirect('denunciaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $denuncia_anuncio = $form->save();

      $this->redirect('denunciaAnuncio/edit?id='.$denuncia_anuncio->getId());
    }
  }
}
