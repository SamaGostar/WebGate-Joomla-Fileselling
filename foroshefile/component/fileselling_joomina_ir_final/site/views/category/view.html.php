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
 */
class joominaFSViewCategory extends JView
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
        jimport('joomla.application.pathway');

        //-- Initialize some variables
        $document = JFactory::getDocument();
        $uri = JFactory::getURI();
        $pathway = JPathway::getInstance('site');

        //-- Get the parameters of the active menu item
        $menus = JSite::getMenu();
        $menu = $menus->getActive();

        //-- Get some data from the model
        $items = $this->get('data');
        $category = $this->get('category');
        $state = $this->get('state');

        //-- Get the page/component configuration
        $params = JComponentHelper::getParams('com_joominafs');

        if( ! $category)
        {
            $this->assignRef('params', $params);
            parent::display($tpl);

            return;
        }

        if($items)
        {
            $total = $this->get('total');
            $pagination	= $this->get('pagination');
            $category->total = $total;
        }

        $model = JModel::getInstance('categories', 'joominaFSmodel');
        $categories = $model->getData();

        //-- Add alternate feed link
        if($params->get('show_feed_link', 1) == 1)
        {
            $link	= '&view=category&id='.$category->slug.'&format=feed&limitstart=';
            $attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
            $document->addHeadLink(JRoute::_($link.'&type=rss'), 'alternate', 'rel', $attribs);
            $attribs = array('type' => 'application/atom+xml', 'title' => 'Atom 1.0');
            $document->addHeadLink(JRoute::_($link.'&type=atom'), 'alternate', 'rel', $attribs);
        }

        $menus = JSite::getMenu();
        $menu = $menus->getActive();

        //-- Because the application sets a default page title, we need to get it
        //-- right from the menu item itself
        if(is_object($menu))
        {
            $menu_params = new JParameter($menu->params);

            if( ! $menu_params->get('page_title'))
            {
                $params->set('page_title', $category->title);
            }
        }
        else
        {
            $params->set('page_title', $category->title);
        }

        $document->setTitle($params->get('page_title'));

        //-- Set breadcrumbs
        if(is_object($menu)
        && $menu->query['view'] != 'category')
        {
            $pathway->addItem($category->title, '');
        }

        //-- Prepare category description
        $category->description = JHTML::_('content.prepare', $category->description);

        //-- Table ordering
        $lists['order_Dir'] = $state->get('filter_order_dir');
        $lists['order'] = $state->get('filter_order');

        //-- Set some defaults if not set for params
        $params->def('comp_description', JText::_('joominaFS_DESC'));

        //-- Define image tag attributes
        if(isset($category->image)
        && $category->image != '')
        {
            $attribs['align'] = $category->image_position;
            $attribs['hspace'] = 6;

            //-- Use the static HTML library to build the image tag
            $category->image = JHTML::_('image', 'images/stories/'.$category->image, JText::_('Web Links'), $attribs);
        }

        $k = 0;
        $count = count($items);

        for($i = 0; $i < $count; $i ++)
        {
            $item =& $items[$i];

            $link = JRoute::_('index.php?view=joominaFS&catid='.$category->slug.'&id='.$item->slug);

            $menuclass = 'category'.$this->escape($params->get('pageclass_sfx'));

            /*
             * @todo set edit link to custom field
             */
            $item->link = '<a href="'.$link.'" class="'.$menuclass.'">'.$this->escape($item->id).'</a>';

            $item->odd = $k;
            $item->count = $i;
            $k = 1 - $k;
        }//for

        $count = count($categories);

        for($i = 0; $i < $count; $i ++)
        {
            $cat =& $categories[$i];
            $cat->link = JRoute::_('index.php?option=com_joominafs&view=category&id='.$cat->slug);
        }//for

        $this->assignRef('lists', $lists);
        $this->assignRef('params', $params);
        $this->assignRef('category', $category);
        $this->assignRef('categories', $categories);
        $this->assignRef('items', $items);
        $this->assignRef('pagination', $pagination);

        $this->assign('action',	$uri->toString());

        parent::display($tpl);
    }//function
}//class
