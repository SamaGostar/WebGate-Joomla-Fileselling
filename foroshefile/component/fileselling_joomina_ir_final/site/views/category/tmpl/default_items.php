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

?>
<script language="javascript" type="text/javascript">
function tableOrdering(order, dir, task)
{
	var form = document.adminForm;

	form.filter_order.value = order;
	form.filter_order_Dir.value = dir;

	document.adminForm.submit(task);
}//function
</script>

<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
   

<?php foreach($this->items as $item) : ?>
<tr>
         <td><?php echo JText::_( 'توضیحات فایل' ); ?> </td><td> <a href="index.php?view=joominaFS&catid= <?php echo $item->catid; ?>&id= <?php echo $item->id; ?>&option=com_joominafs"><?php echo $item->name; ?></a> </td>
         </tr>
      <tr>
         <td><?php echo JText::_( 'نام فایل' ); ?> </td><td> <a href="index.php?view=joominaFS&catid= <?php echo $item->catid; ?>&id= <?php echo $item->id; ?>&option=com_joominafs"><?php echo $item->filename; ?></a> </td>
         </tr>
         
         <tr><td>  <?php echo JText::_( 'قیمت' ); ?></td><td>  <?php echo $item->price; ?> <?php echo JText::_( 'تومان' ); ?></td></tr>
        
        
       <tr><td>    <?php echo JText::_( 'تعداد دفعات خریداری شده' ); ?></td><td> <?php echo $item->hit; ?></td></tr>
        
        <tr>
        <td><?php echo JText::_( 'نوع فایل' ); ?></td>
        <td>
          <?php 
				 
					if  ($item->type== 'zip') { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/zip.jpg" width="27" height="30" alt="zip" /> <?php 
					}elseif ($item->type== 'png') { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="png" /> <?php 
					}elseif ($item->type== 'pdf') { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/pdf.jpg" width="27" height="30" alt="pdf" /> <?php 
					}elseif ($item->type== 'rar') { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="rar" /> <?php 
					}elseif ($item->type== 'docx') { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/docx.jpg" width="27" height="30" alt="docx" /> <?php 
					}else { 
					?> <img src="administrator/components/com_joominafs/assets/filetype/file.jpg" width="27" height="30" alt="file" /> <?php 
					}//if
					
					?>
       </td> </tr>
        
<?php //*** ECR AUTOCODE END [site.viewcategory.table.joominafs.cell] ***// ?>
<tr><td><hr/></td><td><hr/></td></tr>
	</tr>
  
<?php endforeach; ?>

  
    	<td align="center" colspan="4"
    		class="sectiontablefooter<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
    	<?php echo $this->pagination->getPagesLinks(); ?>
    	</td>
   
    <tr>
    	<td colspan="4" align="right" class="pagecounter">
    		<?php echo $this->pagination->getPagesCounter(); ?>
    	</td>
    </tr>
</table>

<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>
