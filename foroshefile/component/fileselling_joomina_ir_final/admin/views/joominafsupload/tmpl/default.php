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
<?php
$id = $_GET['id'];
	$db =& JFactory::getDBO();
	$query = "select * from #__joominafs where id="  ;
	$query .= "'".$id."'"; 
	$db->setQuery($query);
	$row = $db->loadObject();?>
    <table class="admintable" >
  <tr>
    <td><?php echo JText::_('مجموعه');  ?></td>
    <td>&nbsp;</td>
    <td><?php  
	$db2 =& JFactory::getDBO();
	$query2 = "select * from #__categories where id="  ;
	$query2 .= "'".$row->catid."'"; 
	$db2->setQuery($query2);
	$row2 = $db2->loadObject();
	
	
	
	echo $row2->title; ?> </td>
  </tr>
  <tr>
    <td><?php echo JText::_('نام'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->name;?></td>
  </tr>
  <tr>
    <td><?php echo JText::_('قیمت'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->price;?></td>
  </tr>
  <tr>
    <td><?php echo JText::_('تعداد دفعات خرید شده'); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->hit;?></td>
  </tr>
</table>

<form action="index.php?option=com_joominafs" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data" >
<tr>
                <td width="100" align="right" class="key">
                    <label for="label_filename"><?php echo JText::_('نام فایل'); ?></label>
                </td>
                <td>
                    <input type="file" class="text_area" name="filename" id="label_filename" size="32" maxlength="250" value="<?php echo $this->joominaFS->filename;?>" />
                    
                </td>
            </tr>
<?php //*** ECR AUTOCODE END [admin.viewform.table.joominafs.row] ***// ?>
		</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_joominafs" />

<input type="hidden" name="catid" value="<?php echo $row->catid; ?>" />
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="joominafs" />
</form>
<div id="copyright" style="background-color:#F90; padding:10px; clear:both ; text-align:center ; color:#C00">
 توسعه و برنامه نویسی توسط <a href="http://joomina.ir" style="color:#000">وب سایت جومینا</a><br />
وب سایت جومینا اولین پشتیبان جوملا 2.5 در ایران
</div>