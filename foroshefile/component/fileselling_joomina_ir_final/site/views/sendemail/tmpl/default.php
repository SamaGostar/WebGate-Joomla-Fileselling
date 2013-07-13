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


	include_once('nusoap.php');
	
	 $id=$_GET['id'];
			$db2 =& JFactory::getDBO();
			$query2 = "select * from #__joominafs_seting";
			$db2->setQuery($query2);
			$rows = $db2->loadObject();
			$merchantID = $rows->merchantid;
			
			$db =& JFactory::getDBO();
			$query = "select * from #__joominafs where id="  ;
			$query .= "'".$id."'"; 
			$db->setQuery($query);
			$result = $db->loadObject();
	$amount = $result->price; //Amount will be based on Toman
	$au = $_GET['Authority'];
	$st = $_GET['Status'];
	if( $st == "OK"){
		$client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
		$res = $client->call("PaymentVerification", array(
			array(
							'MerchantID'	 => $merchantID ,
							'Authority' 	 => $au ,
							'Amount'		 => $amount
				)));
	}else{
		$res = 0;
	}
		
 if ($res->Status == '100' ){
 echo 'کاربرگرامی مراحل خرید شما با موفقیت انجام پذیرفت ' .'<br />' . 'هم اکنون یک پست الکترونیک حاوی فایل خریداری شده به صندوق پستی شما ارسال شده است لطفا پوشه های ورودی inbox  و پوشه هرز نامه spam صندوق خود را بررسی نمایید'.'<br />' . 'باتشکر از خرید شما ';
  $id=$_GET['id'];
			$db =& JFactory::getDBO();
			$query = "select * from #__joominafs where id="  ;
			$query .= "'".$id."'"; 
			$db->setQuery($query);
			$result = $db->loadObject();
             
             
             # Set some variables for the email message
				$app =& JFactory::getApplication();			
				$sitename = $app->getCfg('sitename');

				$subject = "ارسال فایل خریداری شده از" . $sitename;
				$body = "کاربر گرامی فایل خریداری شما به پیوست همین نامه میباشد . از خرید شما ممنونیم ";
				$to=$_GET['email'];
				$config =& JFactory::getConfig();
				$from = array( 
				$config->getValue( 'config.mailfrom' ),
				$config->getValue( 'config.fromname' ) );
				# Invoke JMail Class
				$mailer = JFactory::getMailer();
				 
				# Set sender array so that my name will show up neatly in your inbox
				$mailer->setSender($from);
				 
				# Add a recipient -- this can be a single address (string) or an array of addresses
				$mailer->addRecipient($to);
				 
				$mailer->setSubject($subject);
				$mailer->setBody($body);
				 
				# If you would like to send as HTML, include this line; otherwise, leave it out
				$mailer->isHTML();
				$file = JPATH_SITE."/administrator/components/com_joominafs/uploads/" . $result->filename ;
				$mailer->addAttachment($file);
				
				$mailer->send();
				$hit=  $result->hit;
				$hit ++; 
					$db =& JFactory::getDBO();
			$query = "UPDATE #__joominafs SET hit =" . "'".$hit."'" ." WHERE  id ="  ;
			$query .= "'".$id."'"; 
			$db->setQuery($query);
			$resu = $db->query();
 }elseif ($res == '0'){
	  echo 'کاربر گرامی مراحل پرداخت بدرستی انجام نپذیرفته است !';
	 
	 }else {
		 
		echo ' اطلاعات پرداختی این تراکنش قبلا در سیستم ما ثبت شده است!'; 
		 }
?>