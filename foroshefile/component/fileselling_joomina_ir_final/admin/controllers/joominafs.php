<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    joominaFS
 * @subpackage Controllers
 * @author     AmiRezaTehrani {@link http://joomina.ir}
 * @author     Created on 18-Mar-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

jimport('joomla.application.component.controller');

/**
 * joominaFS Controller.
 *
 * @package    joominaFS
 * @subpackage Controllers
 */
class joominaFSListControllerjoominaFS extends joominaFSListController
{
    /**
     * Constructor (registers additional tasks to methods)..
     */
    public function __construct()
    {
        parent::__construct();

        //-- Register Extra tasks
        $this->registerTask('add', 'edit');
    }//function

    /**
     * Display the edit form.
     *
     * @return void
     */
    function edit()
    {
        JRequest::setVar('view', 'joominaFS');
        JRequest::setVar('layout', 'form');
        JRequest::setVar('hidemainmenu', 1);

        parent::display();
    }//function

    /**
     * Save a record (and redirect to main page).
     *
     * @return void
     */
    function save()
    {
		$filename=$_FILES["filename"]["name"];
		move_uploaded_file($_FILES['filename']['tmp_name'],'../administrator/components/com_joominafs/uploads/'. $filename);
        $model = $this->getModel('joominaFS');
        $link = 'index.php?option=com_joominafs';

        if($model->store())
		
		
        {    
	 
		
            $msg = JText::_('Record saved');
            $this->setRedirect($link, $msg);
        }
        else
        {
            $msg = $model->getError();
            $this->setRedirect($link, $msg, 'error');
        }
    }//function

    /**
     * Remove record(s).
     *
     * @return void
     */
    function remove()
    {
        $model = $this->getModel('joominaFS');
        $link = 'index.php?option=com_joominafs';

        if($model->delete())
        {
            $msg = JText::_('Records deleted');
            $this->setRedirect($link, $msg);
        }
        else
        {
            $msg = JText::sprintf('One or more records could not be deleted: %s', $model->getError());
            $this->setRedirect($link, $msg, 'error');
        }
    }//function

    /**
     * Cancel editing a record.
     *
     * @return void
     */
    function cancel()
    {
        $msg = JText::_('Operation Cancelled');
        $this->setRedirect('index.php?option=com_joominafs', $msg, 'notice');
    }//function
}//class
