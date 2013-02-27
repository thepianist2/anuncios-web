<?php

/**
 * contacto actions.
 *
 * @package    anuncios
 * @subpackage contacto
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->contactos = Doctrine_Core::getTable('Contacto')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContactoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ContactoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }





  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $contacto = $form->save();
        $this->getUser()->setFlash('mensajeTerminado','Mensaje enviado.'); 
      $this->redirect('contacto/new');
    }
  }
}
