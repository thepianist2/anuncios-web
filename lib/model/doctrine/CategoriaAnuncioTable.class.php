<?php

/**
 * CategoriaAnuncioTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CategoriaAnuncioTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CategoriaAnuncioTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CategoriaAnuncio');
    }
    
                          public function getLista() {	     
          
    $q = Doctrine_Query::create()
    ->select('t.id, t.texto')
    ->from('CategoriaAnuncio t')
    ->orderBy('t.texto DESC');
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
   
   
             public function verificarExisteNombreCategoria($Nombrecategoria){
        $q = Doctrine_Query::create()
	            ->select('u.*')
	            ->from('CategoriaAnuncio u')
                     ->where('u.texto LIKE ?',$Nombrecategoria);

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