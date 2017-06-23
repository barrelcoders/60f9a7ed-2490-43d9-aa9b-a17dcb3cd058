<?php 
include '../connection.php';
//$ssql="select `ExamName`,`ExamFee`,`WorkBook`,`TextBook` from `fees_exam_master` where `sclass`='4'";
//$rs=mysql_query($ssql);
?>
<?php
$Admission=$_REQUEST["txtAdmissionNo"];
$sname=$_REQUEST["txtStudentName"];
$sclass=$_REQUEST["txtClass"];

$merchantTxnId = uniqid(); 

$TotalExam=$_REQUEST["TotalExam"];
$TotalExamFee=0;
$TotalWorkBookFee=0;
$TotalTextBookFee=0;
$GrandTotal=0;
$strExamSubscribed="";

$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	


$currentdate=date('Y-m-d');
$showcurrentdate=date('d-m-Y');

for($i=1;$i<=$TotalExam;$i++)
{
	$ctrlExamFee="chkExamFee".$i;
	$ctrlWorkBookFee="chkWorkBook".$i;
	$ctrlTextBookFee="chkTextBook".$i;
	
	$RowWiseExamFees=0;
	$RowWiseWorkBookFees=0;
	$RowWiseTextBookFees=0;
	
		if($_REQUEST[$ctrlExamFee]=="Yes")
		{
			$ctrlExamName="hExamName".$i;
			$ctrlExamFeeAmount="hExamFees".$i;
			$ExamName=$_REQUEST[$ctrlExamName];
			$strExamSubscribed=$strExamSubscribed.$ExamName.",";
			
			$RowWiseExamFees=$_REQUEST[$ctrlExamFeeAmount];
			$TotalExamFee=$TotalExamFee + $_REQUEST[$ctrlExamFeeAmount];
			//echo "INSERT INTO `fees_exam_student_temp`( `ExamName`, `FeesType`, `Amount`, `sadmission`, `sname`, `sclass`,  `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`) VALUES ('$ExamName','ExamFee','$RowWiseExamFees','$Admission','$sname','$sclass','$merchantTxnId','$currentdate','Online','Pending')"."<br>";
			mysql_query("INSERT INTO `fees_exam_student_temp`( `ExamName`, `FeesType`, `Amount`, `sadmission`, `sname`, `sclass`,  `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`) VALUES ('$ExamName','ExamFee','$RowWiseExamFees','$Admission','$sname','$sclass','$merchantTxnId','$currentdate','Online','Pending')") or die(mysql_error());
		}
		if($_REQUEST[$ctrlWorkBookFee]=="Yes")
		{
			$ctrlWorkBookFeeAmount="hWorkBook".$i;
			$RowWiseWorkBookFees=$_REQUEST[$ctrlWorkBookFeeAmount];
			$TotalWorkBookFee=$TotalWorkBookFee + $_REQUEST[$ctrlWorkBookFeeAmount];
			mysql_query("INSERT INTO `fees_exam_student_temp`( `ExamName`, `FeesType`, `Amount`, `sadmission`, `sname`, `sclass`,  `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`) VALUES ('$ExamName','WorkBook','$RowWiseWorkBookFees','$Admission','$sname','$sclass','$merchantTxnId','$currentdate','Online','Pending')") or die(mysql_error());
		}
		if($_REQUEST[$ctrlTextBookFee]=="Yes")
		{
			$ctrlTextBookFeeAmount="hTextBook".$i;
			$RowWiseTextBookFees=$_REQUEST[$ctrlTextBookFeeAmount];
			$TotalTextBookFee=$TotalTextBookFee + $_REQUEST[$ctrlTextBookFeeAmount];
			mysql_query("INSERT INTO `fees_exam_student_temp`( `ExamName`, `FeesType`, `Amount`, `sadmission`, `sname`, `sclass`,  `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`) VALUES ('$ExamName','TextBook','$RowWiseTextBookFees','$Admission','$sname','$sclass','$merchantTxnId','$currentdate','Online','Pending')") or die(mysql_error());
		}
		//echo "Exam Name:".$ExamName.",Exam Fees:".$_REQUEST["hExamFees".$i].",WorkBookFees:".$RowWiseWorkBookFees.",TextBookFees:".$RowWiseTextBookFees."<br>";
	
        $ssql="insert into `fees_misc_collection_tmp` (`date`, `HeadName`, `Source`, `sadmissionno`, `sname`, `sclass`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `FeeReceipt`,`HeadType`) values ('$currentdate','Misc. Exam Fees','Student','$Admission','$sname','$sclass','$GrandTotal','Online','$merchantTxnId','Pending','','','Regular')";
				mysql_query($ssql) or die(mysql_error());
	
}
$GrandTotal=$TotalExamFee + $TotalWorkBookFee + $TotalTextBookFee;
$ExamSubscribed=substr($strExamSubscribed,0,strlen($strExamSubscribed)-1);


	$orderAmount=$GrandTotal;
	//$orderAmount=1;
	$SubmitStatus="successfull";
			
			set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
             $formPostUrl = "https://www.citruspay.com/totalsoft";	
             
             //Need to change with your Secret Key
             $secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
             
             //Need to change with your Vanity URL Key from the citrus panel
             $vanityUrl = "totalsoft";
					

             //Need to change with your Order Amount
             
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);
	
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
<head></head>
<body onload="Javascript:fnlsubmitform();">

			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 <div class="style1">
				<font size="3"><strong>
			 <input type="hidden" name="SubmitStatus" id="SubmitStatus" value="<?php echo $SubmitStatus;?>">
	         <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
			 <input type="hidden" id="firstName" name="firstName" value="<?php echo $sname;?>" />
			 <input type="hidden" id="lastName" name="lastName" value="." />
			 <input type="hidden" id="Name" name="Name" value="<?php echo $Name;?>" />
             <input type="hidden" name="returnUrl" value="http://dpsfsis.com/Users/ExamFeeReceiptResponse.php" />
             <!--<input type="hidden" name="notifyUrl" value="http://dpsfsis.com/AdmissionFeeNotifyResponse.php" />-->
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
			 <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
			 <input type="hidden" name="customParams[0].value" value="NA" />			 		
			 	             
	             <!--<input type="Submit" value="Pay Now"/>-->
	             Please wait Payment is in progress</strong></font></div>
			</form>
</body>
</html>


