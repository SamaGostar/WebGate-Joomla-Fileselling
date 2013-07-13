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
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data" >
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_('مشخصات'); ?></legend>

		<table class="admintable">
<?php //*** ECR AUTOCODE START [admin.viewform.table.joominafs.row] ***// ?>
            <tr>
                
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="label_catid"><?php echo JText::_('مجموعه مورد نظر را انتخاب نمایید'); ?></label>
                </td>
                <td>
                    <?php echo $this->lists['catid']; ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="label_name"><?php echo JText::_('توضیحات فایل'); ?></label>
                </td>
                <td>
                    <input type="text" class="text_area" name="name" id="name" size="32" maxlength="250" value="<?php echo $this->joominaFS->name;?>" />
                    
                </td>
            </tr>
            
            <tr>
                <td width="100" align="right" class="key">
                    <label for="label_price"><?php echo JText::_('قیمت'); ?></label>
                </td>
                <td>
                    <input type="text" class="text_area" name="price" id="label_price" size="32" maxlength="250" value="<?php echo $this->joominaFS->price; ?>" /><?php echo JText::_('تومان'); ?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="label_hit"><?php echo JText::_('تعداد دفعات خرداری فایل به صورت نمایشی'); ?></label>
                </td>
                <td>
                   <input type="text" class="text_area" name="hit" id="label_hit" size="32" maxlength="250" value="<?php echo $this->joominaFS->hit; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="label_type"><?php echo JText::_('نوع فایل'); ?></label>
                </td>
                <td>
                    
                    <?php 
					if  ($this->joominaFS->type== 'zip') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/zip.jpg" width="27" height="30" alt="zip" /> <?php 
					}elseif ($this->joominaFS->type== 'png') { 
					echo '<strong>' .$this->joominaFS->filename . '</strong>';
					?> <img src="../administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="png" /> <?php 
					}elseif ($this->joominaFS->type== 'pdf') { 
					echo '<strong>' .$this->joominaFS->filename . '</strong>';
					?> <img src="../administrator/components/com_joominafs/assets/filetype/pdf.jpg" width="27" height="30" alt="pdf" /> <?php 
					}elseif ($this->joominaFS->type== 'rar') { 
					echo '<strong>' .$this->joominaFS->filename . '</strong>';
					?> <img src="../administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="rar" /> <?php 
					}elseif ($this->joominaFS->type== 'docx') { 
					echo '<strong>' .$this->joominaFS->filename . '</strong>';
					?> <img src="../administrator/components/com_joominafs/assets/filetype/docx.jpg" width="27" height="30" alt="docx" /> <?php 
					}else { 
					echo '<strong>' . JText::_('نوع فایل مشخص شده تشخیص داده نشده است') . '</strong>';
					?> <img src="../administrator/components/com_joominafs/assets/filetype/file.jpg" width="27" height="30" alt="file" /> <?php 
					}//if
					
					?>
                    
                   
                </td>
            </tr>
           
<?php //*** ECR AUTOCODE END [admin.viewform.table.joominafs.row] ***// ?>
		</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_joominafs" />
<input type="hidden" name="id" value="<?php echo $this->joominaFS->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="joominafs" />
</form>
<div id="copyright" style="background-color:#F90; padding:10px; clear:both ; text-align:center ; color:#C00">
 توسعه و برنامه نویسی توسط <a href="http://joomina.ir" style="color:#000">وب سایت جومینا</a><br />
وب سایت جومینا اولین پشتیبان جوملا 2.5 در ایران
</div>