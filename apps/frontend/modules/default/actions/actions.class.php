<?php

/**
 * default actions.
 *
 * @package    anuncios
 * @subpackage default
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      //variables de busqueda
       $this->query = $request->getParameter('query');
       $this->getUser()->setAttribute('query', $this->query);
       $this->categoriaF = $request->getParameter('categoriaF');
       $this->getUser()->setAttribute('categoriaF', $this->categoriaF);
       $this->provinciaF = $request->getParameter('provinciaF');
       $this->getUser()->setAttribute('provinciaF', $this->provinciaF);
       $this->ofertaDemandaF = $request->getParameter('ofertaDemandaF');
       $this->getUser()->setAttribute('ofertaDemandaF', $this->ofertaDemandaF);
       $this->selectOrder = $request->getParameter('selectOrder');
       $this->getUser()->setAttribute('selectOrder', $this->selectOrder); 
       $this->soloImagen = $request->getParameter('soloImagen');
       $this->getUser()->setAttribute('soloImagen', $this->soloImagen);
       
       
       //cargamos la categorias en el select
      $this->categorias = Doctrine_Core::getTable('CategoriaAnuncio')
      ->createQuery('a')
      ->orderBy('a.texto')              
      ->execute();
      
      
             //cargamos la provincias para select
      $this->provincias = Doctrine_Core::getTable('ProvinciaAnuncio')
      ->createQuery('a')
      ->orderBy('a.texto')              
      ->execute();
      
      
      
      //mostrar datos
      $hoy=date('Y-m-d');
    $q = Doctrine_Core::getTable('Anuncio')
      ->createQuery('a')
      ->where('a.activo = 1 AND a.borrado= 0 AND a.FechaInicio <= "'.$hoy.'" AND a.FechaFin >= "'.$hoy.'"')  
      ->orderBy('rand()');
     
        $this->anuncios = new sfDoctrinePager('Anuncio', 20);
	$this->anuncios->setQuery($q);   	
        $this->anuncios->setPage($this->getRequestParameter('page',1));
	$this->anuncios->init();
        //route del paginado
        $this->action = '@default_index_page'; 
  }
  
  
    public function executeAnuncios(sfWebRequest $request)
  {
           if($request->hasParameter('term')){
               $this->term = $request->getParameter('term');
           }
         $hoy=date('Y-m-d');
        $consulta='a.activo = 1 AND a.borrado= 0 AND a.FechaInicio <= "'.$hoy.'" AND a.FechaFin >= "'.$hoy.'" ';
        $consulta.=' AND a.id IN(SELECT b.id from anuncio b where b.titulo LIKE  "'.$this->term.'%" OR b.descripcion LIKE  "'.$this->term.'%" OR b.codigopostal LIKE  "'.$this->term.'%") ';
              //mostrar datos
     
    $this->anuncios = Doctrine_Core::getTable('Anuncio')
      ->createQuery('a')
      ->where($consulta)
      ->execute();
  }
  
  
    public function executeBuscar(sfWebRequest $request)
  {
        //obtenemos las variables de búsqueda y despues las guardamos dentro de una variable this
        //si existe el parametro se reinicia
        if($request->hasParameter('query')){
        $this->query = $request->getParameter('query');
        $this->getUser()->setAttribute('query', $this->query); 
        }else{
        $this->query= $this->getUser()->getAttribute('query');
        }
        if($request->hasParameter('categoriaF')){
        $this->categoriaF = $request->getParameter('categoriaF');
        $this->getUser()->setAttribute('categoriaF', $this->categoriaF);  
        }else{
        $this->categoriaF= $this->getUser()->getAttribute('categoriaF');
        }
        if($request->hasParameter('provinciaF')){
        $this->provinciaF = $request->getParameter('provinciaF');
        $this->getUser()->setAttribute('provinciaF', $this->provinciaF);    
        }else{
        $this->provinciaF= $this->getUser()->getAttribute('provinciaF');    
        }
        if($request->hasParameter('ofertaDemandaF')){
       $this->ofertaDemandaF = $request->getParameter('ofertaDemandaF');
       $this->getUser()->setAttribute('ofertaDemandaF', $this->ofertaDemandaF);              
        }else{
        $this->ofertaDemandaF= $this->getUser()->getAttribute('ofertaDemandaF');        
        }
        if($request->hasParameter('selectOrder')){
       $this->selectOrder = $request->getParameter('selectOrder');
       $this->getUser()->setAttribute('selectOrder', $this->selectOrder);            
        }else{
        $this->selectOrder= $this->getUser()->getAttribute('selectOrder');         
        }
        if($request->hasParameter('soloImagen')){
        $this->soloImagen = $request->getParameter('soloImagen');
        $this->getUser()->setAttribute('soloImagen', $this->soloImagen); 
        }else{
        $this->soloImagen= null;
        }
        
   
       
       //cargamos la categorias en el select
      $this->categorias = Doctrine_Core::getTable('CategoriaAnuncio')
      ->createQuery('a')
      ->orderBy('a.texto')              
      ->execute();
       
       //cargamos las provincias para select
      $this->provincias = Doctrine_Core::getTable('ProvinciaAnuncio')
      ->createQuery('a')
      ->orderBy('a.texto')              
      ->execute();
       $hoy=date('Y-m-d');
      $consulta='a.activo = 1 AND a.borrado= 0 AND a.FechaInicio <= "'.$hoy.'" AND a.FechaFin >= "'.$hoy.'" ';

            if($this->getUser()->getAttribute('ofertaDemandaF')!="todos"){
      $consulta.=' AND a.tipoAnuncio LIKE  "%'.$this->getUser()->getAttribute('ofertaDemandaF').'%" ';    
      }
            //se ha cambiado el select de categoria anuncio
            if($this->getUser()->getAttribute('categoriaF')!=0){
      $consulta.=' AND a.idcategoriaanuncio = '.$this->getUser()->getAttribute('categoriaF').'';
      }
            //se ha cambiado el select de provincia anuncio
            if($this->getUser()->getAttribute('provinciaF')!=0){
      $consulta.=' AND a.idprovinciaanuncio = '.$this->getUser()->getAttribute('provinciaF').'';    
      }
      
            //solo los que contengan imágenes
            if($this->soloImagen!=null){
      $consulta.=' AND a.id IN(SELECT c.idAnuncio from fotografiaAnuncio c)'.'';
      }
      //se ha introducido nada en el buscador de texto
            if(strlen($this->getUser()->getAttribute('query'))!=0){
      $consulta.=' AND a.id IN(SELECT b.id from anuncio b where b.titulo LIKE  "%'.$this->getUser()->getAttribute('query').'%" OR b.descripcion LIKE  "%'.$this->getUser()->getAttribute('query').'%" OR b.codigopostal LIKE  "%'.$this->getUser()->getAttribute('query').'%") ';
      }




      $q = Doctrine_Core::getTable('Anuncio')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy($this->getUser()->getAttribute('selectOrder'));
      
        $this->anuncios = new sfDoctrinePager('Anuncio', 20);
	$this->anuncios->setQuery($q);   	
        $this->anuncios->setPage($this->getRequestParameter('page',1));
	$this->anuncios->init();
        //route del paginado
        $this->action = 'default/buscar';
        
        
        $this->setTemplate('index');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anuncio);
   
    //poner uno mas al contador de visitas
    $this->anuncio->visitas+=1;
    $this->anuncio->save();
    
              $consulta='a.activo = 1 AND a.borrado= 0';
        $consulta.=' AND a.idAnuncio = '.$request->getParameter('id').'';
    $this->comentarios = Doctrine_Core::getTable('Comentario')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy('a.created_at DESC')
      ->execute();
   
  }
  
  

  
    public function executeMostrar(sfWebRequest $request)
  {
    $this->anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anuncio);
    
       
    //poner uno mas al contador de visitas
    $this->anuncio->visitas+=1;
    $this->anuncio->save();
        
          $consulta='a.activo = 1 AND a.borrado= 0';
        $consulta.=' AND a.idAnuncio = '.$request->getParameter('id').'';
    $this->comentarios = Doctrine_Core::getTable('Comentario')
      ->createQuery('a')
      ->where($consulta)
      ->orderBy('a.created_at DESC')
      ->execute();

  }

  
      public function executeVerAnunciante(sfWebRequest $request)
  {
    $this->anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anuncio);
  }
  
        public function executeEnviarCorreo(sfWebRequest $request)
  {
                $this->anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->anuncio);

                    
  }
  
  
          public function executeNuevoCorreoEnviar(sfWebRequest $request)
  {
                $this->nombre=$request->getParameter('nombre');
                $this->correo=$request->getParameter('correo');
                if($request->hasParameter('telefono')){
                $this->telefono=$request->getParameter('telefono');
                }
                $this->publicacion=$request->getParameter('publicacion');
                
               $this->error=false;
           $this->anuncio = Doctrine_Core::getTable('Anuncio')->find($request->getParameter('idAnuncio')); 
        $to = $this->anuncio->getCorreo();
        $from = "contacto@tusanunciosweb.es";
        $url_base = 'http://desarrollo.tusanunciosweb.es';
        $asunto = 'Hay alguien interesado en su anuncio, y le ha enviado un correo';
        $mailBody = $this->getPartial('mailBodyContacto', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'anuncio' => $this->anuncio,'nombre' => $this->nombre,'correo' => $this->correo,'telefono'=>$this->telefono,'publicacion'=>$this->publicacion));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           
       }
       catch (Exception $e)
       {
           echo $e;
           $this->error=true;
       }
  
    
    
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnuncioForm2();
    $this->idAnuncio=$this->form->getObject()->getId();
  }

  public function executeCreate(sfWebRequest $request)
  {

    $this->form = new AnuncioForm2();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnuncioForm2($anuncio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnuncioForm2($anuncio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  
  
  /**
   * Enviamos correo de confirmacion
   */
  public function executeEnviarCorreoConfirmacion(sfWebRequest $request){
           $this->error=false;
           $this->clv = "";
           $this->anuncio = Doctrine_Core::getTable('Anuncio')->find($request->getParameter('idAnuncio')); 
      $encriptado=base64_encode($this->encriptar($this->anuncio->id, "anuncio"));
        $to = $this->anuncio->getCorreo();
        $from = "contacto@tusanunciosweb.es";
        $url_base = 'http://desarrollo.tusanunciosweb.es';
        $asunto = 'Confirmación y activación de nuevo anuncio';
        $this->url=$url_base.'/default/confirmarAlta?idAnuncio='.$encriptado;
        $mailBody = $this->getPartial('mailBody', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'anuncio'=>$this->anuncio,'url'=>$this->url,'clv'=>$this->clv));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           
       }
       catch (Exception $e)
       {
           echo $e;
           $this->error=true;
       }
  
  }
  
    /**
   * Enviamos correo de confirmacion
   */
  public function executeEnviarCorreoConfirmacionNUser(sfWebRequest $request){
           $this->error=false;
           //buscar anuncio
           $this->anuncio = Doctrine_Core::getTable('Anuncio')->find($request->getParameter('idAnuncio')); 
           //crear nuevo usuario
            $usuario=new sfGuardUser();
      $this->clv = mt_rand(999999,999999999);
      $usuario->setPassword($this->clv);
      $usuario->setIsActive(false);
      $usuario->setEmailAddress($this->anuncio->correo);
      $usuario->setUsername($this->anuncio->correo);
      $usuario->save();
      $credencial=new sfGuardUserGroup();
      $credencial->setUserId($usuario);
      $credencial->setGroupId(2);
      $credencial->save();
      $encriptado=base64_encode($this->encriptar($this->anuncio->id, "anuncio"));

        $to = $this->anuncio->getCorreo();
        $from = "contacto@tusanunciosweb.es";
        $url_base = 'http://desarrollo.tusanunciosweb.es';
        $asunto = 'Confirmación y activación de nuevo anuncio';
        $this->url=$url_base.'/default/confirmarAlta?idAnuncio='.$encriptado;
        

        $mailBody = $this->getPartial('mailBody', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'anuncio'=>$this->anuncio,'clv'=>$this->clv,'url'=>$this->url));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           
       }
       catch (Exception $e)
       {
           echo $e;
           $this->error=true;
       }
  
  }
  
  
  
     function encriptar($cadena, $clave)
    {

        $cifrado = MCRYPT_RIJNDAEL_128;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_encrypt($cifrado, $clave, $cadena, $modo, mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }

 

    function desencriptar($cadena, $clave)
    {
        $cifrado = MCRYPT_RIJNDAEL_128;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_decrypt($cifrado, $clave, $cadena, $modo, mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }
  
  
          public function executeConfirmarAlta(sfWebRequest $request) {             
              
              $idAnuncioEncriptado=$request->getParameter('idAnuncio');
              $idAnuncio=$this->desencriptar(base64_decode($idAnuncioEncriptado), "anuncio");
        $anuncio = Doctrine::getTable('Anuncio')
                ->createQuery('u')
                ->where('u.id = ?',$idAnuncio)
                ->fetchOne();
        $usuario = Doctrine_Core::getTable('sfGuardUser')->getByEmail($anuncio->correo); 
        $usuario->setIsActive(true);
        $usuario->save();
        if($anuncio->borrado==0){
        $anuncio->activo=1;
        $anuncio->save();
           $this->getUser()->setFlash('mensajeTerminado','Anuncio activado correctamente.'); 
        }else{
           $this->getUser()->setFlash('mensajeErrorGrave','Este anuncio no se puede activar porque está borrado.');
        }
  if($this->getUser()->isAuthenticated()){
      
  }else{
      $this->redirect('tusAnuncios/index');
  }

    }
//redireccionamos a poner fotos.
    // y la redireccion de ahora la ponemos en el submit de fotos.
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $anuncio = $form->save();
//      $idAnuncio=base64_encode($this->encriptar($anuncio->id, "anuncio"));
      $this->redirect('fotografiaAnuncio/new?idAnuncio='.$anuncio->id);
    }else{
        $this->getUser()->setFlash('mensajeErrorGrave','Porfavor, revise los campos marcados que faltan.');
    }
  }
  
  
      
  public function executeSwitchPositivo(sfWebRequest $request){
    $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
    if($request->getParameter('variable')=='positivo'){
            $anuncio->votoPositivo+=1;
    }
    if($request->getParameter('variable')=='negativo'){
            $anuncio->votoNegativo+=1;
    }
    $anuncio->save();
    }
}
