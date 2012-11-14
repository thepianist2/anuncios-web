<?php

/**
 * categoriaAnuncio actions.
 *
 * @package    anuncios
 * @subpackage categoriaAnuncio
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaAnuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categoria_anuncios = Doctrine_Core::getTable('CategoriaAnuncio')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoriaAnuncioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaAnuncioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaAnuncioForm($categoria_anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaAnuncioForm($categoria_anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($categoria_anuncio = Doctrine_Core::getTable('CategoriaAnuncio')->find(array($request->getParameter('id'))), sprintf('Object categoria_anuncio does not exist (%s).', $request->getParameter('id')));
    $categoria_anuncio->delete();

    $this->redirect('categoriaAnuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $categoria_anuncio = $form->save();

      $this->redirect('categoriaAnuncio/edit?id='.$categoria_anuncio->getId());
    }
  }
}
