<?php

/**
 * Anuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epi
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Anuncio extends BaseAnuncio
{
    
    
      
  
     function encriptar($cadena, $clave)
    {

        $cifrado = MCRYPT_RIJNDAEL_256;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_encrypt($cifrado, $clave, $cadena, $modo,

            mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }
    
    
 
    function desencriptar($cadena, $clave)
    {
        $cifrado = MCRYPT_RIJNDAEL_256;

        $modo = MCRYPT_MODE_ECB;

        return mcrypt_decrypt($cifrado, $clave, $cadena, $modo,

            mcrypt_create_iv(mcrypt_get_iv_size($cifrado, $modo), MCRYPT_RAND)

            );
    }
    
    
}
