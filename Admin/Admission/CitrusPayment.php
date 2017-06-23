<?php 

			
			//set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
                      //   $formPostUrl = "https://www.citruspay.com/totalsoft";
               $formPostUrl = "https://www.citruspay.com/totalsoft";
             
             //Need to change with your Secret Key
             $secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
             
             
             
             //Need to change with your Vanity URL Key from the citrus panel
             $vanityUrl = "totalsoft";
             // $vanityUrl = "5hkf5moj0z";
			
			
            $txtName="manish";
             //Need to change with your Order Amount
             $merchantTxnId=$lastInsertIdReg['srno'];
             $orderAmount=1;
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);
             $SubmitStatus="successfull"



?>

<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo "DPS ROHINI" ?> </title>

<style type="text/css">
.style1 {
	text-align: center;
	font-family: Cambria;
}
</style>

</head>

<body onload="Javascript:fnlsubmitform();">
			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 <div class="style1">
				<font size="3"><strong>
			 <input type="hidden" name="SubmitStatus" id="SubmitStatus" value="<?php echo $SubmitStatus;?>">
	         <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
			 <input type="hidden" id="firstName" name="firstName" value="<?php echo $sname;?>" />
			 <input type="hidden" id="lastName" name="lastName" value="<?php echo $slastname;?>" />
			 <input type="hidden" id="Name" name="Name" value="<?php echo $sname;?>" />
             <input type="hidden" name="returnUrl" value="http://dpsrohini.info/Admission/RegistrationFeeResponse.php" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
			 <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
			 <input type="hidden" name="customParams[0].value" value="NA" />			 		
			 	             
	            <input type="Submit" value="Pay Now"/>
	             Please wait Payment is in progress</strong></font></div>
			</form>
</body>

</html>
