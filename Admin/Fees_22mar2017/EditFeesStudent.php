<?php
session_start();
include '../../connection.php';
?>
<?php
$Admission=$_REQUEST["Admission"];

$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

if ($Admission!="")
{
	$ssql="SELECT `sadmission`,`sname`,`sclass`,`DiscontType`,`routeno`,(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ADMISSION FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='Advances'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='ANNUAL CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CAUTION MONEY (REFUNDABLE)'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT CREDIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='CLOSE AMOUNT DEBIT'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='COMPUTER FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MAINTENANCE FEE'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='MANAGEMENT FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SCIENCE FEES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='SMART CLASS'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TRANSPORT CHARGES'),(select IF(a.`DiscontType`='Staff Child',`amount`,`actualamount`) from `fees_student1` where `sadmission`=a.`sadmission` and `feeshead`='TUITION FEES'),(select sum(discountamount) from `fees_student1` where `sadmission`=a.`sadmission`)from `student_master` as `a` where `sadmission`='$Admission'";
	//echo $ssql;
	//exit();
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
			    $Admission=$row[0];
				$StudentName=$row[1];
				$Class=$row[2];
				$DiscountType=$row[3];
				$RouteNo=$row[4];
				$AdmissionFee=$row[5];
				$Advances=$row[6];
				$AnnualCharges=$row[7];
				$CautionMoney=$row[8];
				$ClosedCreditAmount=$row[9];
				$ClosedDebitAmount=$row[10];
                $ComputerFees=$row[11];
				$MaintainenceFee=$row[12];
				$ManagementFee=$row[13];
				$ScienceFee=$row[14];
				$SmartClass=$row[15];
				$TransportCharge=$row[16];
				$TutionFee=$row[17];
				$ConsessionAmount=$row[18];
	}
}

$rsSt=mysql_query("select `FinancialYear` from `student_master` where `sadmission`='$Admission'");
	$rowSt=mysql_fetch_row($rsSt);
	$FinancialYear=$rowSt[0];
	if($FinancialYear==$CurrentFinancialYear)
	{
		$StudentType="new";
	}
	else
	{
		$StudentType="old";
	}

	$sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   $ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute, $Con);
if ($_REQUEST["txtName"] !="")
{
	
			    $Admission=$_REQUEST["txtAdmission"];
				$StudentName=$_REQUEST["txtName"];
				$Class=$_REQUEST["txtClass"];
				$DiscountType=$_REQUEST["txtDiscountType"];
				$RouteNo=$_REQUEST["txtRouteNo"];
				$AdmissionFee=$_REQUEST["txtAdmissionFee"];
				$Advances=$_REQUEST["txtAdvances"];
				$AnnualCharges=$_REQUEST["txtAnnualCharge"];
				$CautionMoney=$_REQUEST["txtCautionMoney"];
				$ClosedCreditAmount=$_REQUEST["txtClosedCreditAmount"];
				$ClosedDebitAmount=$_REQUEST["txtClosedDebitAmount"];
                $ComputerFees=$_REQUEST["txtComputerFees"];
				$ManagementFee=$_REQUEST["txtManagementFee"];
				$ScienceFee=$_REQUEST["txtScienceFee"];
				$SmartClass=$_REQUEST["txtSmartClass"];
				$TransportCharge=$_REQUEST["txtTransportCharge"];
				$TutionFee=$_REQUEST["txtTutionFee"];
				$ConsessionAmount=$_REQUEST["txtConsessionAmount"];
	
	
			//$ssql1="UPDATE `fees_student1` SET `actualamount`='$AdmissionFee'  WHERE `sadmission` = '$Admission' and `feeshead`='ADMISSION FEES'";
			//$ssql2="UPDATE `fees_student1` SET `actualamount`='$Advances'  WHERE `sadmission` = '$Admission' and `feeshead`='Advances'";
			//$ssql3="UPDATE `fees_student1` SET `actualamount`='$AnnualCharges'  WHERE `sadmission` = '$Admission' and `feeshead`='ANNUAL CHARGES'";
			//$ssql4="UPDATE `fees_student1` SET `actualamount`='$CautionMoney'  WHERE `sadmission` = '$Admission' and `feeshead`='CAUTION MONEY (REFUNDABLE)'";
			//$ssql5="UPDATE `fees_student1` SET `actualamount`='$ClosedCreditAmount'  WHERE `sadmission` = '$Admission' and `feeshead`='CLOSE AMOUNT CREDIT'";
			//$ssql6="UPDATE `fees_student1` SET `actualamount`='$ClosedDebitAmount'  WHERE `sadmission` = '$Admission' and `feeshead`='CLOSE AMOUNT DEBIT'";
			//$ssql7="UPDATE `fees_student1` SET `actualamount`='$ComputerFees'  WHERE `sadmission` = '$Admission' and `feeshead`='COMPUTER FEES'";
			//$ssql8="UPDATE `fees_student1` SET `actualamount`='$ManagementFee'  WHERE `sadmission` = '$Admission' and `feeshead`='MANAGEMENT FEES'";
			//$ssql9="UPDATE `fees_student1` SET `actualamount`='$ScienceFee'  WHERE `sadmission` = '$Admission' and `feeshead`='SCIENCE FEES'";
			//$ssql10="UPDATE `fees_student1` SET `actualamount`='$SmartClass'  WHERE `sadmission` = '$Admission' and `feeshead`='SMART CLASS'";
			
			//$ssql12="UPDATE `fees_student1` SET `actualamount`='$TutionFee' WHERE `sadmission` = '$Admission' and `feeshead`='TUITION FEES'";
		
			$rsCheckQ1=mysql_query("SELECT `srno`, `sadmission`, `Route`, `StudentName`, `TransportCode`, `Amount`, `datetime`, `feeshead`, `Quarter`, `FinancialYear` FROM `fees_transportmaster` WHERE `sadmission`='$Admission'");
			if (mysql_num_rows($rsCheckQ1)>0)
			{
               	$ssql11="UPDATE  `fees_student1` SET  `actualamount` =  '$TransportCharge',`amount` =  '$TransportCharge' WHERE  `sadmission` =  '$Admission' AND  `feeshead` =  'TRANSPORT CHARGES'";
               	$ssql13="UPDATE `fees_transportmaster` SET `Amount`='$TransportCharge' WHERE `sadmission` = '$Admission' and `feeshead`='TRANSPORT CHARGES'  ";
			    mysql_query($ssql13) or die(mysql_error());
                mysql_query($ssql11) or die(mysql_error());

			   //echo $ssql11;
			   //echo $ssql13;
			}
			
			else
			{
			    $ssql14="INSERT INTO `fees_transportmaster`(`sadmission`, `Route`, `StudentName`, `TransportCode`, `Amount`,`feeshead`, `Quarter`, `FinancialYear`) VALUES('$Admission','$RouteNo','$StudentName','','$TransportCharge','TRANSPORT CHARGES','','$CurrentFinancialYear')";
			   
                 mysql_query($ssql14) or die(mysql_error());
                   
			      $ssql15="INSERT INTO  `fees_student1` (  `sadmission` ,  `class` ,  `Name` ,  `feeshead` ,  `actualamount` ,  `discountamount` ,  `amount` ,  `financialyear` , `StudentType` ,  `FeesType` ,  `DiscountType` ,  `AdmissionFY` ) VALUES('$Admission','$Class',  '$StudentName',  'TRANSPORT CHARGES',  '$TransportCharge',  '',  '$TransportCharge',  '$CurrentFinancialYear',  '$StudentType',  'Regular', '$DiscountType',  '$FinancialYear')";
			    mysql_query($ssql15) or die(mysql_error());
			     //echo $ssql14;
			   //echo $ssql15;

			}
			

			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtName").value=="")

	{

		alert("Name is mandatory");

		return;

	}

	if (document.getElementById("txtAdmission").value=="")

	{

		alert("Admission is mandatory");

		return;

	}

	if (document.getElementById("txtClass").value=="")

	{

		alert("Class is mandatory");

		return;

	}

	

	document.getElementById("frmEditStudentMaster").submit();

	

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Student Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

}
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="EditFeesStudent.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Admission No:</strong></td>

		<td style="width: 524px">

		<input name="txtAdmission" id="txtAdmission" type="text" value="<?php echo $Admission; ?>" size="40"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName"  type="text" value="<?php echo $StudentName; ?>" size="53"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Class:</strong></td>

		<td style="width: 524px">

		<input name="txtClass" id="txtClass" type="text" value="<?php echo $Class; ?>" size="43"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Discount Type</strong></td>

		<td style="width: 524px">

		<input name="txtDiscountType" id="txtDiscountType" type="text" value="<?php echo $DiscountType; ?>" size="43"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Route No</strong></td>

		<td style="width: 524px">

		<input name="txtRouteNo" id="txtRouteNo" type="text" value="<?php echo $RouteNo; ?>" style="height: 22px" size="43"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Admission Fee:</strong></td>

		<td class="style5">

		<input name="txtAdmissionFee" id="txtAdmissionFee" type="text" value="<?php echo $AdmissionFee; ?>" size="43" readonly></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Advances:</strong></td>

		<td class="style5">



		<input name="txtAdvances" id="txtAdvances" type="text" value="<?php echo $Advances; ?>" size="43" readonly></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>Annual Charge:</strong></td>

		<td class="style5">



		<input name="txtAnnualCharge" id="txtAnnualCharge" type="text" value="<?php echo $AnnualCharges; ?>"size="43" readonly></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Caution Money</strong></td>

		<td style="width: 524px">

		<input name="txtCautionMoney" id="txtCautionMoney" type="text" value="<?php echo $CautionMoney; ?>" size="43" readonly></td>

	</tr><tr>

	

	

		<td style="width: 523px" class="style3"><strong>Credit Amount</strong></td>

		<td style="width: 524px">

		<input name="txtClosedCreditAmount" id="txtClosedCreditAmount" type="text" value="<?php echo $ClosedCreditAmount; ?>" size="43" readonly></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Debit Amount</strong></td>

		<td style="width: 524px">

		<input name="txtClosedDebitAmount" id="txtClosedDebitAmount" type="text" value="<?php echo $ClosedDebitAmount; ?>" size="43" readonly></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Computer Fees</strong></td>

		<td style="width: 524px">

		<input name="txtComputerFees" id="txtComputerFees" type="text" value="<?php echo $ComputerFees; ?>" size="43" readonly></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>Management Fees:</strong></td>

		<td class="style5">

		<input name="txtManagementFee" id="txtManagementFee" type="text" value="<?php echo $ManagementFee; ?>" size="43" readonly></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Science Fees:</strong></td>

		<td class="style5">

		<input name="txtScienceFee" id="txtScienceFee" type="text" value="<?php echo $ScienceFee; ?>" size="43" readonly></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Smart Class Fee:</strong></td>

		<td class="style5">



		<input name="txtSmartClass" id="txtSmartClass" type="text" value="<?php echo $SmartClass; ?>" size="43" readonly></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Transport Charges:</strong></td>

		<td class="style5">

		<input name="txtTransportCharge" id="txtTransportCharge" type="text" value="<?php echo $TransportCharge; ?>" size="43"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Tuition Fee:</strong></td>

		<td class="style5">

		<input name="txtTutionFee" id="txtTutionFee" type="text" value="<?php echo $TutionFee; ?>" size="43" readonly></td>

	</tr>

	<tr>

		<!---<td class="style4">

		<b>Remarks</b></td>

		<td class="style5">

		<input type="text" name="txtConsessionAmount" id="txtConsessionAmount" size="41" value="<?php echo $ConsessionAmount; ?>" size="43"></td>
      ---->
	</tr>

	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>