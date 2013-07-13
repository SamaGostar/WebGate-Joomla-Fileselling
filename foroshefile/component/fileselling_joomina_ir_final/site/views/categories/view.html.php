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
 * HTML View class for the joominaFS component.
 *
 * @static
 * @package	joominaFS
 * @subpackage	Views
 * @since 1.0
 */
class joominaFSViewCategories extends JView
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
        $document =& JFactory::getDocument();

        $categories	=& $this->get('data');
        $total =& $this->get('total');
        $state =& $this->get('state');

        //-- Get the page/component configuration
        $params = JComponentHelper::getParams('com_joominafs');

        $menus = &JSite::getMenu();
        $menu = $menus->getActive();

        //-- Because the application sets a default page title, we need to get it
        //-- right from the menu item itself
        if(is_object($menu))
        {
            $menu_params = new JParameter($menu->params);

            if( ! $menu_params->get('page_title'))
            {
                $params->set('page_title', JText::_('joominaFS'));
            }
        }
        else
        {
            $params->set('page_title', JText::_('joominaFS'));
        }

        $document->setTitle($params->get('page_title'));

        //-- Set some defaults if not set for params
        $params->def('comp_description', JText::_('joominaFS_DESC'));

        //-- Define image tag attributes
        if($params->get('image') != -1)
        {
            $attribs['align'] =($params->get('image_align') != '') ? $params->get('image_align') : '';
            $attribs['hspace'] = 6;

            //-- Use the static HTML library to build the image tag
            $image = JHTML::_('image', 'images/stories/'.$params->get('image'), JText::_('joominaFS'), $attribs);
        }

        for($i = 0; $i < count($categories); $i++)
        {
            $category =& $categories[$i];
            $category->link = JRoute::_('index.php?option=com_joominafs&view=category&id='.$category->slug);

            //-- Prepare category description
            $category->description = JHTML::_('content.prepare', $category->description);
        }//for

        $this->assignRef('image', $image);
        $this->assignRef('params', $params);
        $this->assignRef('categories', $categories);

        parent::display($tpl);
    }//function
}//class
