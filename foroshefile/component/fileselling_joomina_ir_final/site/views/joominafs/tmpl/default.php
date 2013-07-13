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

JHTML::stylesheet('default.css', 'components/com_joominafs/assets/css/');
include_once('nusoap.php');

				
?>

<?php

             
               
	?>

	<h1 class="componentheading">فروش فایل</h1>
<?php if( ! $this->data) : ?>
    <h3><?php echo JText::_('هنوز اطلاعاتی وارد سیستم نشده است'); ?></h3>
<?php else : ?>
				<?php if ($_POST['namesender'] == true) : ?>
                <?php
					$id= $_POST['id'];
					$pro_des .=  $_POST['namesender'];
					$pro_des .= ' ' .  $_POST['cellphone'] . ' ' .  $_POST['email'];
					$params = &JComponentHelper::getParams( 'com_joominafs' );
					
					$db =& JFactory::getDBO();
					$query = "select * from #__joominafs_seting";
					$db->setQuery($query);
					$rows = $db->loadObject();
					$merchantID = $rows->merchantid;
					
					$amount =  $_POST['TransactionAmount']; //Amount will be based on Toman
					$callBackUrl = $_POST['TransactionRedirectUrl']."index.php?view=sendemail&option=com_joominafs&amount=".$amount."&des=". $pro_des ."&merchantID=". $merchantID ."&email=" . $_POST['email'] ."&id=" . $id  ;	
					$client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
					$res = $client->call('PaymentRequest', array(
						array(
							'MerchantID' 	=> $merchantID ,
							'Amount' 		=> $amount ,
							'Description' 	=> $pro_des ,
							'Email' 		=> '' ,
							'Mobile' 		=> '' ,
							'CallbackURL' 	=> $callBackUrl

						)));
					if($res->Status == 100 )
					{
						//Redirect to URL You can do it also by creating a form
						Header('Location: https://www.zarinpal.com/pg/StartPay/' . $res->Authority . '/');		
					}else{
						echo ' ERR:';
						echo $res->Status;
					}
				 ?>
					<?php else : ?>
					<?php  $row = $this->data;
					
					$amount= $row->price;
					$pro_des= $row->filename;
					
					$callBackUrl= 'http://joominamarket.com/';
				
					?>
 	
    
    <form action="" method="post" id="TransactionAddForm">
   <input type="hidden" id="TransactionAccountID" value="'.$TransactionAccountID.'" name="TransactionAccountID">
   <input type="hidden" id="TransactionAmount" value=" <?php echo $row->price; ?>" name="TransactionAmount">
      <input type="hidden" id="id" value=" <?php echo $row->id; ?>" name="id">
   <input type="hidden" id="TransactionDesc" value="<?php echo $pro_des; ?>" name="TransactionDesc">
    <input type="hidden" id="TransactionRedirectUrl" value="<?php echo $callBackUrl; ?>" name="TransactionRedirectUrl">
    <table>
  <tr>
    <td >نام شما :</td>
    <td>&nbsp;</td>
    <td ><input name="namesender" type="text" /></td>
  </tr>
  <tr>
    <td>تلفن همراه :</td>
    <td>&nbsp;</td>
    <td><input name="cellphone" type="text" /></td>
  </tr>
  <tr>
    <td> پست الکترونیک شما :</td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" /></td>
  </tr>
    <tr>
    <td><?php echo JText::_( 'توضیحات فایل' ); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->name; ?></td>
  </tr>
 <tr>
    <td><?php echo JText::_( 'نام فایل' ); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->filename; ?></td>
  </tr>
  <tr>
    <td><?php echo JText::_( 'قیمت' ); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->price; ?></td>
  </tr>
  <tr>
    <td><?php echo JText::_( 'تعداد دفعات خریداری شده' ); ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->hit; ?></td>
  </tr>

</table>

  <input name="submit" type="submit" value="خرید آنلاین" />
    
   </form>
	<?php endif; ?>

<?php $row = $this->data; ?>
<?php //*** ECR AUTOCODE START [site.viewitem.div.joominafs.divrow] ***// ?>


<?php //*** ECR AUTOCODE END [site.viewitem.div.joominafs.divrow] ***// ?>
<?php endif; ?>

