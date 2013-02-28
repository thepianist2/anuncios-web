<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DenunciaAnuncio', 'doctrine');

/**
 * BaseDenunciaAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idAnuncio
 * @property string $nombre
 * @property string $email
 * @property string $telefono
 * @property string $empresa
 * @property string $razonAnuncio
 * @property string $documento
 * @property boolean $solucionado
 * @property Anuncio $Anuncio
 * 
 * @method integer         getIdAnuncio()    Returns the current record's "idAnuncio" value
 * @method string          getNombre()       Returns the current record's "nombre" value
 * @method string          getEmail()        Returns the current record's "email" value
 * @method string          getTelefono()     Returns the current record's "telefono" value
 * @method string          getEmpresa()      Returns the current record's "empresa" value
 * @method string          getRazonAnuncio() Returns the current record's "razonAnuncio" value
 * @method string          getDocumento()    Returns the current record's "documento" value
 * @method boolean         getSolucionado()  Returns the current record's "solucionado" value
 * @method Anuncio         getAnuncio()      Returns the current record's "Anuncio" value
 * @method DenunciaAnuncio setIdAnuncio()    Sets the current record's "idAnuncio" value
 * @method DenunciaAnuncio setNombre()       Sets the current record's "nombre" value
 * @method DenunciaAnuncio setEmail()        Sets the current record's "email" value
 * @method DenunciaAnuncio setTelefono()     Sets the current record's "telefono" value
 * @method DenunciaAnuncio setEmpresa()      Sets the current record's "empresa" value
 * @method DenunciaAnuncio setRazonAnuncio() Sets the current record's "razonAnuncio" value
 * @method DenunciaAnuncio setDocumento()    Sets the current record's "documento" value
 * @method DenunciaAnuncio setSolucionado()  Sets the current record's "solucionado" value
 * @method DenunciaAnuncio setAnuncio()      Sets the current record's "Anuncio" value
 * 
 * @package    anuncios
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDenunciaAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('denunciaAnuncio');
        $this->hasColumn('idAnuncio', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('telefono', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('empresa', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('razonAnuncio', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('documento', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('solucionado', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'default' => '0',
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Anuncio', array(
             'local' => 'idAnuncio',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}