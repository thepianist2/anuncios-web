<?php

/**
 * AnuncioTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnuncioTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AnuncioTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Anuncio');
    }
    
    
        public function getComentarios($idAnuncio){
           $query = Doctrine_Core::getTable('Comentario')      
      ->createQuery('a')
      ->where('a.idAnuncio =?',$idAnuncio)             
      ->andWhere('a.borrado = false');

            return $query->execute();
    }
    
                          public function getLista() {	     
          
    $q = Doctrine_Query::create()
    ->select('t.id, t.titulo')
    ->from('Anuncio t')
    -where('a.borrado= false')
    ->orderBy('t.titulo DESC');
       $q->fetchArray();
       
  $resultados=$q->fetchArray();
	     if (!$resultados) {
	     	return false;
	     }
	     else {
	     	foreach ($resultados as $resultado) {
	     		$retorno[$resultado['id']]=$resultado['titulo'];
	     	}
	     	
	     	return $retorno;
	     } 
   }
}