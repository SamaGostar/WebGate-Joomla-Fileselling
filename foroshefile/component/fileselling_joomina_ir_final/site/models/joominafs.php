<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    joominaFS
 * @subpackage Models
 * @author     AmiRezaTehrani {@link http://joomina.ir}
 * @author     Created on 18-Mar-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

jimport('joomla.application.component.model');

/**
 * joominaFS Model.
 *
 * @package    joominaFS
 * @subpackage Models
 */
class joominaFSModeljoominaFS extends JModel
{
    /**
     * Gets the Data.
     *
     * @return string The greeting to be displayed to the user
     */
    function getData()
    {
        $id = JRequest::getInt('id');
        $db = JFactory::getDBO();

        $query = 'SELECT a.*, cc.title AS category '
        . ' FROM #__joominafs AS a '
        . ' LEFT JOIN #__categories AS cc ON cc.id = a.catid '
        . ' WHERE a.id = '.$id;

        $db->setQuery($query);
        $data = $db->loadObject();

        return $data;
    }//function
}//class
