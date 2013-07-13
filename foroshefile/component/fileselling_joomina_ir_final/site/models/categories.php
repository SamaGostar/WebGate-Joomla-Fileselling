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
 * joominaFS Categories Model.
 *
 * @package joominaFS
 * @subpackage	Models
 */
class joominaFSModelCategories extends JModel
{
    /**
     * Categories data array
     *
     * @var array
     */
    var $_data = null;

    /**
     * Categories total
     *
     * @var integer
     */
    var $_total = null;

    /**
     * Constructor
     *
     * @since
     */

    /**
     * Constructor.
     */
    public function __construct()
    {
        $foo = 'Do something here..';

        parent::__construct();
    }//function

    /**
     * Method to get joominaFS item data for the category.
     *
     * @access public
     * @return array
     */
    function getData()
    {
        // Lets load the content if it doesn't already exist
        if(empty($this->_data))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query);
        }

        return $this->_data;
    }//function

    /**
     * Method to get the total number of joominaFS items for the category.
     *
     * @access public
     * @return integer
     */
    function getTotal()
    {
        // Lets load the content if it doesn't already exist
        if(empty($this->_total))
        {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }

        return $this->_total;
    }//function

    /**
     * Build the SELECT query.
     *
     * @return string
     */
    private function _buildQuery()
    {
        $user =& JFactory::getUser();
        $aid = $user->get('aid', 0);

        //-- Query to retrieve all categories that belong under the joominaFS section
        //-- and that are published.
        $query = 'SELECT cc.*, COUNT(a.id) AS numitems,'
        .' cc.id as slug'
        .' FROM #__categories AS cc'
        .' LEFT JOIN #__joominafs AS a ON a.catid = cc.id'
//        .' WHERE a.published = 1'
        .' WHERE section = \'com_joominafs\''
        .' AND cc.published = 1'
        .' AND cc.access <= '.(int)$aid
        .' GROUP BY cc.id'
        .' ORDER BY cc.ordering';

        return $query;
    }//function
}//class
