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
class joominaFSListModeljoominaFSList extends JModel
{
    /**
     * joominaFSList data array
     *
     * @var array
     */
    var $_data;

    /**
     * Items total
     *
     * @var integer
     */
    var $_total = null;

    /**
     * Pagination object
     *
     * @var object
     */
    var $_pagination = null;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $app = JFactory::getApplication('administrator');

        //-- Get pagination request variables
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'int');
        $limitstart = $app->getUserStateFromRequest('com_joominafs.limitstart', 'limitstart', 0, 'int');

        //-- In case limit has been changed, adjust it
        $limitstart =($limit != 0) ? floor($limitstart / $limit) * $limit : 0;

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }//function

    /**
     * Build the query.
     *
     * @return string The query to be used to retrieve the rows from the database
     */
    private function _buildQuery()
    {
//*** ECR AUTOCODE START [admin.models.model.joominafs.buildquery] ***//
        $query = ' SELECT a.id, a.catid, a.checked_out, a.filename, a.price,  a.hit, a.type,a.name, b.title AS category'
        .' FROM #__joominafs AS a '
        .' LEFT JOIN #__categories AS b ON b.id = a.catid'
;
//*** ECR AUTOCODE END [admin.models.model.joominafs.buildquery] ***//

        return $query;
    }//function

    /**
     * Retrieves the data.
     *
     * @return array Array of objects containing the data from the database
     */
    function getData()
    {
        //-- Lets load the data if it doesn't already exist
        if(empty($this->_data))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_data;
    }//function

    /**
     * Get the records total.
     *
     * @return integer Total
     */
    function getTotal()
    {
        //-- Load the content if it doesn't already exist
        if(empty($this->_total))
        {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }

        return $this->_total;
    }//function

    /**
     * Get the pagination.
     *
     * @return object JPagination
     */
    function getPagination()
    {
        //-- Load the content if it doesn't already exist
        if(empty($this->_pagination))
        {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }//function
}//class
