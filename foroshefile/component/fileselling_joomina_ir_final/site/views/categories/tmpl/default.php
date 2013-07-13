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
$doc =& JFactory::getDocument();
$doc->addStyleSheet('components/com_joominafs/assets/css/default.css');


?>

<?php if($this->params->def('show_page_title', 1)) : ?>
<div class="joominaFS">
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php endif; ?>

<!-- Here comes a <table> - please override.. -->
<?php if(($this->params->def('image', -1) != -1)
   || $this->params->def('show_comp_description', 1)) : ?>
<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center"
class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

<tr>
	<td valign="top" class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php
        if(isset($this->image)) :
             echo $this->image;
        endif;

        echo 'سیستم فروش فایل ';
    ?>
	</td>
</tr>
</table>
<?php endif; ?>
<?php if( ! $this->categories) : ?>
<h3><?php echo JText::_('هنوز هیچ مجموعه ای مشخص نشده است'); ?></h3>
<?php endif; ?>
<DIV id="joominacat"><ul>
<?php foreach($this->categories as $category) : ?>
	<li>
		<a href="<?php echo $category->link; ?>"
			class="category<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php echo $this->escape($category->title);?>
		</a>
		&nbsp;
		<span class="small">
			(<?php echo $category->numitems;?>)
		</span>
	</li>
<?php endforeach; ?>
</ul></DIV>

</div>
