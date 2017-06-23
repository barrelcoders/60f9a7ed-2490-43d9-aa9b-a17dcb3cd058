<?php 

   
   //set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
                      //   $formPostUrl = "https://www.citruspay.com/totalsoft";
               $formPostUrl = "https://www.citruspay.com/pof4bjla93";
             
             //Need to change with your Secret Key
             $secret_key = "62c05b02b3788876bb14619060b879706ee6ad22";
             
             
             
             //Need to change with your Vanity URL Key from the citrus panel
             $vanityUrl = "pof4bjla93";
             // $vanityUrl = "5hkf5moj0z";
   
   
            $txtName="manish";
             //Need to change with your Order Amount
             $merchantTxnId=$finalRegistrationNO;
           
             $orderAmount=25;
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);
             $SubmitStatus="successfull"



?>

<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
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
<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>
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
             <input type="hidden" name="returnUrl" value="http://dpsrohini.in/Admission/citrusResponse9th.php" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
    <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
    <input type="hidden" name="customParams[0].value" value="NA" />      
                  
             <input type="Submit" value="Pay Now"/>
              Please wait Payment is in progress</strong></font></div>
   </form>
</body>

</html>