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


	
	if (isset($_POST['submit'])) {
					 
					 
			$db =& JFactory::getDBO();
			$query = "UPDATE" .'`'.'#__joominafs_seting'.'`' ."SET" .'`' . yourname .'` = ' . "'" . $_POST['yourname'] . "'";
			$query .=  ',';
			$query .= '`' . cellphone .'` = ' . "'" . $_POST['cellphone'] . "'";
			$query .=  ',';
			$query .= '`' . usercell .'` = ' . "'" . $_POST['usercell'] . "'";
			$query .=  ',';
			$query .= '`' . merchantid .'` = ' . "'" . $_POST['merchantid'] . "'";
			$query .=  ',';
			$query .= '`' . passcell .'` = ' . "'" . $_POST['passcell'] . "'";
			$db->setQuery($query);
			$result2 = $db->query();
			echo 'تنظیمات شما در سیستم ذخیره شد'; 
					 
					 
					 }


	$db =& JFactory::getDBO();
	$query = "select * from #__joominafs_seting";
	$db->setQuery($query);
	$row = $db->loadObject();
?>


            
            
            
<form action="index.php?option=com_joominafs&view=joominafsetting" method="post" name="adminForm" id="adminForm" >
<table class="admintable">
  <tr>
    <td><?php echo JText::_('نام شما'); ?></td>
    <td>&nbsp;</td>
    <td>  <input type="text" class="text_area" name="yourname" id="label_yourname" size="32" maxlength="250" value="<?php echo $row->yourname;?>" /></td>
  </tr>
  <TR>
  <td><?php echo JText::_('تلفن همراه شما'); ?></td>
    <td>&nbsp;</td>
    <td>  <input type="text" class="text_area" name="cellphone" id="label_cellphone" size="32" maxlength="250" value="<?php echo $row->cellphone;?>" /></td>
   </TR>
    <tr>
    <td><?php echo JText::_('کد 36 رقمی خریدار که میباید از وب سایت زرین پل گرفته شود'); ?></td>
    <td>&nbsp;</td>
    <td>  <input type="text" class="text_area" name="merchantid" id="label_merchantid" size="32" maxlength="250" value="<?php echo $row->merchantid;?>" /></td>
  </tr>
    <tr>
    <td><?php echo JText::_('نام کاربری شما در پنل پیامک ایرانیان'); ?></td>
    <td>&nbsp;</td>
    <td>  <input type="text" class="text_area" name="usercell" id="label_usercell" size="32" maxlength="250" value="<?php echo $row->usercell;?>" /></td>
  </tr>
  
     <tr>
    <td><?php echo JText::_('رمز شما در پنل پیامک ایرانیان'); ?></td>
    <td>&nbsp;</td>
    <td>  <input type="text" class="text_area" name="passcell" id="label_passcell" size="32" maxlength="250" value="<?php echo $row->passcell;?>" /></td>
  </tr>
  
</table>
<br/>
<input name="submit" type="submit" value="ذخیره تنظیمات" />
<br/>
</form>

<div id="copyright" style="background-color:#F90; padding:10px; clear:both ; text-align:center ; color:#C00">
 توسعه و برنامه نویسی توسط <a href="http://joomina.ir" style="color:#000">وب سایت جومینا</a><br />
وب سایت جومینا اولین پشتیبان جوملا 2.5 در ایران
</div>