<?php
/**
 * @version SVN: $Id: builder.php 469 2011-07-29 19:03:30Z elkuku $
 * @package    joominaFS
 * @subpackage Views
 * @author     AmiRezaTehrani {@link http://joomina.ir}
 * @author     Created on 18-Mar-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

jimport('joomla.application.component.view');

/**
 * HTML View class for the joominaFS Component.
 *
 * @package    joominaFS
 * @subpackage Views
 */
class joominaFSViewjoominaFS extends JView
{
    /**
     * joominaFSList view display method.
     *
     * @param string $tpl The name of the template file to parse;
     *
     * @return void
     */
    public function display($tpl = null)
    {
        $data = $this->get('Data');

        $this->assignRef('data', $data);

        parent::display($tpl);
    }//function
}//class
