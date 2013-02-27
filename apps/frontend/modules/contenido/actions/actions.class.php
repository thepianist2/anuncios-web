<?php

/**
 * contenido actions.
 *
 * @package    anuncios
 * @subpackage contenido
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenidoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->contenidos = Doctrine_Core::getTable('Contenido')
      ->createQuery('a')
      ->execute();
  }
  
  
    public function executeMostrar(sfWebRequest $request)
  {
    $this->condiciones = Doctrine_Core::getTable('Contenido')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->condiciones);
        $this->politica = Doctrine_Core::getTable('Contenido')->find(2);
    $this->forward404Unless($this->politica);
  }



}
