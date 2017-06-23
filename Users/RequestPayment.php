<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
 <html>
     <head>
         <meta HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=iso-8859-1">
     <body>
         <?php
             set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             
             //Should be commented in both Request and Response Page
             //require_once 'Zend/Crypt/Hmac.php';
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
             //$formPostUrl = "https://www.citruspay.com/1dr2yk6e3i";	
             $formPostUrl = "https://www.citruspay.com/ov3fvkdvbw";	
             
             //Need to change with your Secret Key
             //$secret_key = "6e925006a84cae6c135ef78dc2b6d10b426fd132";	
             $secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";	
             
             //Need to change with your Vanity URL Key from the citrus panel
             //$vanityUrl = "1dr2yk6e3i";
             $vanityUrl = "ov3fvkdvbw";
	
             //Should be unique for every transaction
             $merchantTxnId = uniqid(); 
             

             //Need to change with your Order Amount
             $orderAmount = "1.00";
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             //$data= $orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);
            
         ?>
         <form align="center" method="post" action="<?php echo $formPostUrl ?>">
         	<input type="hidden" name="AdminNo" id="AdminNo" value="0001" />
         	 <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency ?>" />
             <input type="hidden" name="returnUrl" value="http://dpsfsis.com/Users/ResponsePayment.php" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature ?>" />
             <input type="Submit" value="Pay Now"/>
         </form>
     </body>
 </html>