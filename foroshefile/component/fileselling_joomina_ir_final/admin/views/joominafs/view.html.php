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
class joominaFSListViewjoominaFS extends JView
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
        $option = JRequest::getCmd('option');

        //-- Get the joominaFS
        $joominaFS	=& $this->get('Data');
        $isNew = ($joominaFS->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title('joominaFS: <small><small>[ '.$text.' ]</small></small>');
        JToolBarHelper::save();
		

        if($isNew)
        {
            JToolBarHelper::cancel();
        }
        else
        {
            //-- For existing items the button is renamed `close`
            JToolBarHelper::cancel('cancel', JText::_('Close'));
        }

        $lists = array();
        $lists['catid'] = JHTML::_('list.category', 'catid', $option, intval($joominaFS->catid));

        $this->assignRef('joominaFS', $joominaFS);
        $this->assignRef('lists', $lists);

        parent::display($tpl);
    }//function
}//class
