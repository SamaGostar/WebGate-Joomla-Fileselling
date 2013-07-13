<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    joominaFS
 * @subpackage Tables
 * @author     AmiRezaTehrani {@link http://joomina.ir}
 * @author     Created on 18-Mar-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

/**
 * joominaFS Table class.
 *
 * @package    joominaFS
 * @subpackage Components
 */
class TablejoominaFS extends JTable
{
//*** ECR AUTOCODE START [admin.tableclass.classvar.joominafs.var] ***//
   /**
    * Primary key
    * 
    * @var int
    */
    var $id = 0;


   /**
    * Category id
    * 
    * @var int
    */
    var $catid = 0;


   /**
    * Checked out
    * 
    * @var int
    */
    var $checked_out = 0;


   /**
    * FILENAME
    * 
    * @var text
    */
    var $filename = NULL;


   /**
    * PRICE
    * 
    * @var varchar
    */
    var $price = NULL;


   /**
    * HIT
    * 
    * @var varchar
    */
    var $hit = NULL;


   /**
    * TYPE
    * 
    * @var varchar
    */
    var $type = NULL;
	var $name = NULL;

//*** ECR AUTOCODE END [admin.tableclass.classvar.joominafs.var] ***//
    /**
    * Constructor.
    *
    * @param object $db Database connector object
    */
    function TablejoominaFS(& $db)
    {
        parent::__construct('#__joominafs', 'id', $db);
    }//function
}//class
