<?php

/**
 * fotografiaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage fotografiaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fotografiaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->fotografia_anuncios = Doctrine_Core::getTable('FotografiaAnuncio')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FotografiaAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FotografiaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new FotografiaAnuncioForm($fotografia_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new FotografiaAnuncioForm($fotografia_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($fotografia_anuncio = Doctrine_Core::getTable('FotografiaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object fotografia_anuncio does not exist (%s).', $request->getParameter('id')));
    $fotografia_anuncio->delete();

    $this->redirect('fotografiaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $fotografia_anuncio = $form->save();

      $this->redirect('fotografiaAnuncio/edit?id='.$fotografia_anuncio->getId());
    }
  }
}
