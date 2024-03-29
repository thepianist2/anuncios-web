<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Configuracion', 'doctrine');

/**
 * BaseConfiguracion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $variable
 * @property string $valor
 * @property string $descripcion
 * @property enum $tipo
 * 
 * @method string        getVariable()    Returns the current record's "variable" value
 * @method string        getValor()       Returns the current record's "valor" value
 * @method string        getDescripcion() Returns the current record's "descripcion" value
 * @method enum          getTipo()        Returns the current record's "tipo" value
 * @method Configuracion setVariable()    Sets the current record's "variable" value
 * @method Configuracion setValor()       Sets the current record's "valor" value
 * @method Configuracion setDescripcion() Sets the current record's "descripcion" value
 * @method Configuracion setTipo()        Sets the current record's "tipo" value
 * 
 * @package    anuncios
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfiguracion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('configuracion');
        $this->hasColumn('variable', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('valor', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('tipo', 'enum', 30, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'imagen',
              1 => 'variable',
              2 => 'mensaje',
             ),
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}