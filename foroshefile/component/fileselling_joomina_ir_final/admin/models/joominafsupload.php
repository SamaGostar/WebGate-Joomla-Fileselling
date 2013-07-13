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
class joominaFSListModeljoominaFSupload extends JModel
{
    /**
     * Constructor that retrieves the ID from the request.
     */
    public function __construct()
    {
        parent::__construct();

        $array = JRequest::getVar('cid', 0, '', 'array');
        $this->setId((int)$array[0]);
    }//function

    /**
     * Method to set the joominaFS identifier
     *
     * @access  public
     * @param   int joominaFS identifier
     *
     * @return  void
     */
    function setId($id)
    {
        // Set id and wipe data
        $this->_id = $id;
        $this->_data = null;
    }//function

    /**
     * Method to get a record
     *
     * @return object with data
     */
   

    /**
     * Method to store a record
     *
     * @access  public
     * @return  boolean True on success
     */
    function store()
    {
		
	$filename=$_FILES["filename"]["name"];
		move_uploaded_file($_FILES['filename']['tmp_name'],'../administrator/components/com_joominafs/uploads/'. $filename);
        $row =& $this->getTable();

        $data = JRequest::get('post');

        //-- Bind the form fields to the hello table
        if( ! $row->bind($data))
        {
            $this->setError($this->_db->getError());
            return false;
        }

        //-- Make sure the record is valid
        if( ! $row->check())
        {
            $this->setError($this->_db->getError());
            return false;
        }

        //-- Store the table to the database
        if( ! $row->store())
        {   
          
		    
		  $this->setError($row->getError());
            return false;
        }
		$db =& JFactory::getDBO();
			$query = "UPDATE" .'`'.'#__joominafs'.'`' ."SET" .'`' . filename .'` = ' . "'" . $filename . "'" . " WHERE ". '`'. 'id' . '` ='. "'" . $_POST['id'] ."'";
			$db->setQuery($query);
			$result = $db->query();
			$filetype= explode ("." , $filename);
			$type = $filetype[1];
			$db =& JFactory::getDBO();
			$query = "UPDATE" .'`'.'#__joominafs'.'`' ."SET" .'`' . type .'` = ' . "'" . $type . "'" . " WHERE ". '`'. 'id' . '` ='. "'" . $_POST['id'] ."'";
			$db->setQuery($query);
			$result2 = $db->query();
				$db =& JFactory::getDBO();
			$query = "UPDATE" .'`'.'#__joominafs'.'`' ."SET" .'`' . catid .'` = ' . "'" . $_POST['catid'] . "'" . " WHERE ". '`'. 'id' . '` ='. "'" . $_POST['id'] ."'";
			$db->setQuery($query);
			$result3 = $db->query();
		  
        return true;
    }//function

    /**
     * Method to delete record(s)
     *
     * @access  public
     * @return  boolean True on success
     */
    function delete()
    {
        $cids = JRequest::getVar('cid', array(0), 'post', 'array');

        $row =& $this->getTable();

        if(count($cids))
        {
            foreach($cids as $cid)
            {
                if( ! $row->delete($cid))
                {
                    $this->setError($row->getError());
                    return false;
                }
            }//foreach
        }

        return true;
    }//function
}//class