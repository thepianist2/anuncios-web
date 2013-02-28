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
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DenunciaAnuncioForm2();
    $this->form->setDefault('idAnuncio', $request->getParameter('idAnuncio'));
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DenunciaAnuncioForm2();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $denuncia_anuncio = $form->save();
        $this->getUser()->setFlash('mensajeTerminado','Denuncia Enviada.');
      $this->redirect('default/index');
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
}
