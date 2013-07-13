<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    joominaFS
 * @subpackage Base
 * @author     AmiRezaTehrani {@link http://joomina.ir}
 * @author     Created on 18-Mar-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

jimport('joomla.application.component.controller');

/**
 * joominaFS default Controller.
 *
 * @package    joominaFS
 * @subpackage Controllers
 */
class joominaFSListController extends JController
{
    /**
     * Method to display the view.
     *
     * @access	public
     */
    public function display()
    {
        $foo = 'Do something here..';

        parent::display();
    }//function
}//class
