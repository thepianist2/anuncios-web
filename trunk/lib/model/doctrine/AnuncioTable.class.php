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
}