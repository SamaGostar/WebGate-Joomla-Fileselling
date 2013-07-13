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
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_('شناسه'); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
			</th>
<?php //*** ECR AUTOCODE START [admin.viewlist.table.joominafs.header] ***// ?>
           
            <th>
                <?php echo JText::_('مجموعه'); ?>
            </th>
           <th>
                <?php echo JText::_('توضیحات فایل'); ?>
            </th>
            <th>
                <?php echo JText::_('نام فایل'); ?>
            </th>
            <th>
                <?php echo JText::_('قیمت'); ?>
            </th>
            <th>
                <?php echo JText::_('دفعات خریداری شده'); ?>
            </th>
            <th>
                <?php echo JText::_('نوع فایل'); ?>
            </th>
<?php //*** ECR AUTOCODE END [admin.viewlist.table.joominafs.header] ***// ?>
		</tr>
	</thead>
	<?php
    $k = 0;
    for($i = 0, $n = count($this->items); $i < $n; $i++) :
        $row = &$this->items[$i];
        $checked = JHTML::_('grid.id', $i, $row->id);
        $link = JRoute::_('index.php?option=com_joominafs&controller=joominafs&task=edit&cid[]='.$row->id);

        ?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<a href="<?php echo $link; ?>">
					<?php echo $row->id; ?>
				</a>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
<?php //*** ECR AUTOCODE START [admin.viewlist.table.joominafs.cell] ***// ?>
            
            <td>
                <?php echo $row->category; ?>
            </td>
            <td>
                <?php echo $row->name; ?>
            </td>
             <td>
            <?php if ($row->filename== true){
			echo $row->filename;
				} else {
				?>
                <a href='../administrator/index.php?option=com_joominafs&view=joominafsupload &id=<?php echo $row->id ?>&catid[]=<?php echo $row->catid ?> '><?php echo JText::_('هنوز فایلی بارگذاری نشده است  <کلیک کنید>'); ?></a>	
				
					<?php
					
					}
                  ?>
            </td>
            <td>
                <?php echo $row->price; ?>
            </td>
            <td>
                <?php echo $row->hit; ?>
            </td>
            <td>
                   <?php 
				 
					if  ($row->type== 'zip') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/zip.jpg" width="27" height="30" alt="zip" /> <?php 
					}elseif ($row->type== 'png') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="png" /> <?php 
					}elseif ($row->type== 'pdf') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/pdf.jpg" width="27" height="30" alt="pdf" /> <?php 
					}elseif ($row->type== 'rar') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/png.jpg" width="27" height="30" alt="rar" /> <?php 
					}elseif ($row->type== 'docx') { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/docx.jpg" width="27" height="30" alt="docx" /> <?php 
					}else { 
					?> <img src="../administrator/components/com_joominafs/assets/filetype/file.jpg" width="27" height="30" alt="file" /> <?php 
					}//if
					
					?>
            </td>
<?php //*** ECR AUTOCODE END [admin.viewlist.table.joominafs.cell] ***// ?>
		</tr>
		<?php
        $k = 1 - $k;
    endfor;
    ?>
	 <tfoot>
    <tr>
      <td colspan="9">
      	<?php echo $this->pagination->getListFooter(); ?>
      </td>
    </tr>
  </tfoot>
	</table>
</div>

<input type="hidden" name="option" value="com_joominafs" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="joominafs" />
</form>
<div id="copyright" style="background-color:#F90; padding:10px; clear:both ; text-align:center ; color:#C00">
 توسعه و برنامه نویسی توسط <a href="http://joomina.ir" style="color:#000">وب سایت جومینا</a><br />
وب سایت جومینا اولین پشتیبان جوملا 2.5 در ایران
</div>
