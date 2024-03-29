<?php

/**
 * ProvinciaAnuncioTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProvinciaAnuncioTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProvinciaAnuncioTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProvinciaAnuncio');
    }
    
        
                          public function getLista() {	     
          
    $q = Doctrine_Query::create()
    ->select('t.id, t.texto')
    ->from('ProvinciaAnuncio t')
    ->orderBy('t.texto ASC');
       $q->fetchArray();
       
  $resultados=$q->fetchArray();
	     if (!$resultados) {
	     	return false;
	     }
	     else {
	     	foreach ($resultados as $resultado) {
	     		$retorno[$resultado['id']]=$resultado['texto'];
	     	}
	     	
	     	return $retorno;
	     } 
   }
   
   
             public function verificarExisteNombreProvincia($Nombre){
        $q = Doctrine_Query::create()
	            ->select('u.*')
	            ->from('ProvinciaAnuncio u')
                     ->where('u.texto LIKE ?',$Nombre);

	   $u=$q->fetchOne();
	     if ($u) {
                 //si ya esta en la base de datos
	 		return true;
	     }else{
                 //si no esta en la base de datos
	 		return false;
             }
         }
    
    
}