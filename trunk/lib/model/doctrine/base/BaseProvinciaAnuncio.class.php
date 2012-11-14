<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProvinciaAnuncio', 'doctrine');

/**
 * BaseProvinciaAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $texto
 * @property Doctrine_Collection $Anuncio
 * 
 * @method text                getTexto()   Returns the current record's "texto" value
 * @method Doctrine_Collection getAnuncio() Returns the current record's "Anuncio" collection
 * @method ProvinciaAnuncio    setTexto()   Sets the current record's "texto" value
 * @method ProvinciaAnuncio    setAnuncio() Sets the current record's "Anuncio" collection
 * 
 * @package    anuncios
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProvinciaAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('provinciaAnuncio');
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
             'foreign' => 'idProvinciaAnuncio'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}