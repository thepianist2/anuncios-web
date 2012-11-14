<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CategoriaAnuncio', 'doctrine');

/**
 * BaseCategoriaAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $texto
 * @property Doctrine_Collection $Anuncio
 * 
 * @method text                getTexto()   Returns the current record's "texto" value
 * @method Doctrine_Collection getAnuncio() Returns the current record's "Anuncio" collection
 * @method CategoriaAnuncio    setTexto()   Sets the current record's "texto" value
 * @method CategoriaAnuncio    setAnuncio() Sets the current record's "Anuncio" collection
 * 
 * @package    anuncios
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoriaAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categoriaAnuncio');
        $this->hasColumn('texto', 'text', null, array(
             'type' => 'text',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Anuncio', array(
             'local' => 'id',
             'foreign' => 'idCategoriaAnuncio'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}