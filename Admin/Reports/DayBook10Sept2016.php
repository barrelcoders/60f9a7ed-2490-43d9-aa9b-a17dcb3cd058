<?php 
include '../../connection.php'; 
include '../../AppConf.php'; 
include '../Header/Header3.php';
?>
<?php
$currentdate1=date("d-m-Y");
if($_REQUEST["DateFrom"] !="")
{
		$Dt = $_REQUEST["DateFrom"];
		$arr=explode('/',$Dt);
		$DateFrom= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$Dt = $_REQUEST["DateTo"];
	$arr=explode('/',$Dt);
	$DateTo= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$School=$_REQUEST["cboSchool"];

$ssql="select `srno`,`RegistrationNo`,CONCAT(`sname`,' ',`slastname`) as `sname`,`sclass`,`TxnAmount`,`RegistrationFormNo`,DATE_FORMAT(`RegistrationDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,(select `PGTxnId` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId` limit 1) as `PGTxnId`,`TxnStatus`,`PaymentMode`,DATE_FORMAT(`ChequeDate`,'%d-%m-%Y') as `ChequeDate`,`ChequeBounceAmt` from  `NewStudentRegistration` as `a` where 1=1";
$ssqlAdmission="select `srno`,`sadmission`,CONCAT(`sname`,' ',`slastname`) as `sname`,`sclass`,`TxnAmount`,`AdmissionFeeReceipt`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId`,`PaymentMode`,DATE_FORMAT(`ChequeDate`,'%d-%m-%Y') as `ChequeDate`,`ChequeBounceAmt`,`Stream` from  `NewStudentAdmission` as `a` where 1=1";
$ssqlMisc="select `srno`,`sadmissionno`,`sname`,`sclass`,`Amount`,`FeeReceipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId`,`PaymentMode`,`ChequeNo`,`Chequedate`,`HeadName`,`VendorName`,`ChequeBounceAmt`from `fees_misc_collection` as `a` where `HeadType` = 'Regular'";
$ssqlReg="select `srno`,`sadmission`,`sname`,`sclass`,`amountpaid`,`receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId`,`PaymentMode`,`AdjustedLateFee`,`chequeno`,DATE_FORMAT(`cheque_date`,'%d-%m-%Y') as `cheque_date`,`cheque_bounce_amt` from  `fees` as `a` where `receipt` like 'FR%' and  1=1";
$ssqlMiscHead="select distinct `HeadName`,sum(`Amount`) from `fees_misc_collection` as `a` where `HeadType` = 'Regular'";
if($DateFrom!="")
{
	$ssql=$ssql." and `RegistrationDate`>='$DateFrom' and `RegistrationDate`<='$DateTo' order by `RegistrationFormNo` limit 2000";
	$ssqlAdmission=$ssqlAdmission." and `AdmissionDate`>='$DateFrom' and `AdmissionDate`<='$DateTo' order by `AdmissionFeeReceipt`";
	$ssqlMisc=$ssqlMisc. " and `date`>='$DateFrom' and `date`<='$DateTo' order by `FeeReceipt`";
	$ssqlReg=$ssqlReg. " and `date`>='$DateFrom' and `date`<='$DateTo' order by `receipt`";
	$ssqlMiscHead=$ssqlMiscHead." and `date`>='$DateFrom' and `date`<='$DateTo' group by `HeadName`";
}

$rsRegistration=mysql_query($ssql);

$rsAdmission=mysql_query($ssqlAdmission);
$rsMisc=mysql_query($ssqlMisc);
$rsReg=mysql_query($ssqlReg);
$rsMiscHead=mysql_query($ssqlMiscHead);
}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");

?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("DateFrom").value=="")
	{
		alert("Please select date from!");
		return;
	}
	if(document.getElementById("DateTo").value=="")
	{
		alert("Please select date to!");
		return;
	}
	document.getElementById("frmReport").submit();
	
}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Registration Fees Report</title>



<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

</head>



<body>

				<div>

					<strong><font face="Cambria" size="3"><br>Daily Fees Report</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></body></html><?php

?><br>	
   	
    </font></p>	
   	
    <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
<form method="post" action="" name="frmReport" id="frmReport">
    	
    		<tr>
   	<td width="50%">
   	<font face="Cambria">Date From :&nbsp; <input type="text" name="DateFrom" id="DateFrom" size="20" class="tcal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
To Date : <input type="text" name="DateTo" id="DateTo" size="20" class="tcal"></font></td>

<td width="562">

<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" class="text-box" onclick="Javascript:Validate();" style="font-weight: 700"></font></td>

</tr>
</form>

</table>
<br><br>
<div align="center" id="MasterDiv">
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size:12;
	align: center;
}


.style3 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: center;
}


.style4 {
	font-family: Cambria;
	font-size: small;
}
.style5 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: right;
}
.style6 {
	font-family: Cambria;
	font-size: 11pt;
}
.style7 {
	color: #FFFFFF;
}
.style8 {
	text-align: center;
	font-family: Cambria;
}
.style9 {
	font-family: Cambria;
}
.style10 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	background-color: #009900;
}
</style>
 <table id="table3" class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%" >

   	<tr>
		   <td class="style3" colspan="17">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
			<span class="style4"><span style="font-size: 12pt">Day Book Report<br>Report Date:&nbsp; <?php 
	if($DateFrom!="")
	{
	//echo $currentdate1; 
	$arr=explode('-',$DateTo);
	$DateTo= $arr[2]. "-" . $arr[1] ."-". $arr[0];
	
	$arr=explode('-',$DateFrom);
	$DateFrom= $arr[2]. "-" . $arr[1] ."-". $arr[0];
	
	echo $DateFrom." to ". $DateTo;
	}
	else
	{
		echo $currentdate1; 
	}
	?></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>

   	<tr>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 28px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Sr No</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 120px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Type</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 93px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Unique Id. No.</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Source Name</font><font color="#FFFFFF">
			</font></b>
			</td>
			<td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Vender Name</font></b></td>
			<td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Class</font></b></td>
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Paid</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Late Fee</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Cheque Bounce Charges</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Receipt No</font></b></td>
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Date</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<font face="Cambria" size="3"><strong><span class="style7">Mode Of Paymen</span></strong><b><span class="style7"><strong>t</strong></span></b></font></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 102px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Status</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 103px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Cheque No</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 103px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Cheque Date</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 103px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">SIS Txn. ID</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 103px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Citrus Txn Id</font></b></td>
		   

		   			   
   	</tr>
   	<?php
   		
   		$RecCount=1;
   		$TotalRegistrationFeePayable=0;
   		$TotalRegistrationFeePaid=0;
   		$TotalCancelledAmount=0;
   		$RgistrationFeeTotal=0;
   		$cheque_bounce_amt=0;
   		//while($cnt= mysql_fetch_array($result))
   		
   		while($rowR = mysql_fetch_row($rsRegistration))
   		{
   			$srno=$rowR[0];
   			$RegistrationNo=$rowR[1];
   			$sname=$rowR[2];
   			$sclass=$rowR[3];
   			$TxnAmount=$rowR[4];
   			$RegistrationFormNo=$rowR[5];
   			$RegistrationDate=$rowR[6];
   			$State=$rowR[7];
   			$TxnId=$rowR[8];
   			$PGTxnId=$rowR[9];
   			$PaymentMode=$rowR[11];
   			 $TxnStatus=$rowR[10];
   			 $ChequeDate=$rowR[12];
   			 $cheque_bounce_amt=$rowR[13];
   			
   			$TotalChequeBounceAmt=$TotalChequeBounceAmt+$cheque_bounce_amt;   			
   			
   			
   			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
   			$RgistrationFeeTotal=$RgistrationFeeTotal+$TxnAmount;
   			//$State=$cnt[10];   			
   	?>
   	<tr>
		   <td   align="center" class="style2" style="width: 28px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 120px"   >
			<font face="Cambria" style="font-size: 11pt">Registration Fee</font></td>
		   <td   align="center" class="style2" style="width: 93px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 102px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 102px" >
			&nbsp;</td>
			<td   align="center" class="style2" style="width: 102px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 102px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			0</td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<?php echo $cheque_bounce_amt; ?></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><a href='RegistrationFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<?php echo $PaymentMode; ?>
			</td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Cheque")
			{
			echo $TxnId;
			}
			else
			
			echo " ";
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Online")
			{
			echo " ";
			}
			else
			{
			echo $ChequeDate;
			}
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Cheque")
			{
			echo " ";
			}
			else
			
			echo $TxnId;
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Cheque")
			{
			echo " ";
			}
			else
			
			echo $PGTxnId;
			

			?></td>
		   

		   			   
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
   		}
   	?>
   	<?php
   		$AdmissionFeeTotalAmt=0;
   			
   		while($cnt1= mysql_fetch_array($rsAdmission))
   		{
   			$srno=$cnt1[0];
   			$RegistrationNo=$cnt1[1];
   			$sname=$cnt1[2];
   			$sclass=$cnt1[3];
   			$TxnAmount=$cnt1[4];
   			$RegistrationFormNo=$cnt1[5];
   			$RegistrationDate=$cnt1[6];
   			$State=$cnt1[7];
   			$TxnId=$cnt1[8];
   			$PGTxnId=$cnt1[9];
   			$PaymentMode=$cnt1[10];
   			$ChequeDate=$cnt1[11];
   			$cheque_bounce_amt=$cnt1[12];
   			$Stream=$cnt1[13];
   			
   			$TotalChequeBounceAmt=$TotalChequeBounceAmt+$cheque_bounce_amt;
   			
   			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
   			$AdmissionFeeTotalAmt=$AdmissionFeeTotalAmt+$TxnAmount;
   			//$State=$cnt[10];   			
   	?>
   	<tr>
		   <td   align="center" class="style2" style="width: 28px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 120px"   >
			<font face="Cambria" style="font-size: 11pt">Admission Fee</font></td>
		   <td   align="center" class="style2" style="width: 93px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 102px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 102px" >
			&nbsp;</td>
			<td   align="center" class="style2" style="width: 102px" >
			<font face="Cambria" size="3"><?php echo $sclass;?>-<?php echo $Stream; ?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 102px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			0</td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<?php echo $cheque_bounce_amt; ?></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><a href='AdmissionFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" class="style2" style="width: 102px">
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<?php echo $PaymentMode;;
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Cheque")
			{
			echo $TxnId;
			}
			else
			
			echo " ";
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php 
			if($PaymentMode="Online")
			{
			echo " ";
			}
			else
			{
			echo $ChequeDate;
			}
			
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt">
			<?php 
			if($PaymentMode="Cheque")
			{
			echo " ";
			}
			else
			
			echo $TxnId;
			
			?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt">
			<?php 
			if($PaymentMode="Cheque")
			{
			echo " ";
			}
			else
			
			echo $PGTxnId;
			

			?></span></td>		   			   
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
   		
   		}
   	?>
   	<?php
   	$MiscTotal=0;
   	$MiscChequeDate="";
   	$VendorName="";
   	
   	while($cnt1= mysql_fetch_array($rsMisc))
   		{
   			$VendorName="";
			$srno=$cnt1[0];
			$RegistrationNo=$cnt1[1];
			$sname=$cnt1[2];
			$sclass=$cnt1[3];
			$TxnAmount=$cnt1[4];
			$RegistrationFormNo=$cnt1[5];
			$RegistrationDate=$cnt1[6];
			$State=$cnt1[7];
			$TxnId=$cnt1[8];
			$PGTxnId=$cnt1[9];
			$PaymentMode=$cnt1[10];
			$cheque_bounce_amt=$cnt1[15];

			if($PaymentMode=="Online")
			{
				$ShowReceiptFileName="ShowMiscReceipt.php";
			}
			if($PaymentMode=="Regular")
			{
				$ShowReceiptFileName="../Fees/ShowMiscReceiptRegular.php";
			}
			$MiscChequeNo=$cnt1[11];
			if($cnt1[12]!="0000-00-00")
			{
				$MiscChequeDate=$cnt1[12];
			}
			$MiscHeadName=$cnt1[13];
			$VendorName=$cnt1[14];
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$MiscTotal=$MiscTotal+$TxnAmount;
			$TotalChequeBounceAmt=$TotalChequeBounceAmt+$cheque_bounce_amt;

   	?>
   	
   	<tr>
		   <td   align="center" class="style2" style="width: 28px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 120px"   >
			<font face="Cambria" style="font-size: 11pt">Misc Fee</font></td>
		   <td   align="center" class="style2" style="width: 93px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 102px"   >
			<font face="Cambria" size="3"><?php echo $sname;?>-<?php echo $MiscHeadName;?></font> </td>
			<td   align="center" class="style2" style="width: 102px" >
			<?php echo $VendorName;?></td>
			<td   align="center" class="style2" style="width: 102px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 102px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			0</td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<?php echo $cheque_bounce_amt; ?></td>
			
   
   		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3">
			<a href='<?php echo $ShowReceiptFileName;?>?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a> 
			</font></td>
		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<?php echo $PaymentMode;?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php echo $MiscChequeNo;?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php echo $MiscChequeDate;?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt">
			<?php echo $PGTxnId;?></span></td>		   			   
   	</tr>
   	<?php
   	$RecCount=$RecCount+1;
   	}
   	?>
   	<?php
   	$RegularTotal=0;
   	$PGTxnId="";
   	$PaymentMode="";
   	$LateFee=0;
   	$TotalLateFee=0;
   
   	$RegChequeDate="";
   	$RegChequeNo="";
   	while($cnt1= mysql_fetch_array($rsReg))
   		{
			$srno=$cnt1[0];
			$RegistrationNo=$cnt1[1];
			$sname=$cnt1[2];
			$sclass=$cnt1[3];
			$TxnAmount=$cnt1[4];
			$RegistrationFormNo=$cnt1[5];
			$RegistrationDate=$cnt1[6];
			$State=$cnt1[7];
			$TxnId=$cnt1[8];
			$PGTxnId=$cnt1[9];
			$PaymentMode=$cnt1[10];
			$LateFee=$cnt1[11];
			$RegChequeNo=$cnt1[12];
			//if($cnt1[12] !="0000-00-00")
			if($cnt1[13] !="00-00-0000")
			{
				$RegChequeDate=$cnt1[13];
			}
			$cheque_bounce_amt=$cnt1[14];
			
			
			$TotalLateFee=$TotalLateFee+$LateFee;
			//$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$RegularTotal=$RegularTotal+$TxnAmount;
			$TxnAmountAdjustedLateFee=$TxnAmount-$LateFee;
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmountAdjustedLateFee;
			$TotalChequeBounceAmt=$TotalChequeBounceAmt+$cheque_bounce_amt;
   			

   	?>
   	
   	<tr>
		   <td   align="center" class="style2" style="width: 28px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 120px"   >
			<span class="style6">Regular</span><font face="Cambria" style="font-size: 11pt"> Fee</font></td>
		   <td   align="center" class="style2" style="width: 93px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 102px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 102px" >
			&nbsp;</td>
			<td   align="center" class="style2" style="width: 102px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 102px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmountAdjustedLateFee;?></font></td>
   		   <td   align="center" class="style2" style="width: 102px"  ><?php echo $LateFee; ?></td>
   		   <td   align="center" class="style2" style="width: 102px"  ><?php echo $cheque_bounce_amt;?></td>
   		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationFormNo;?></font></td>
		   <td   align="center" class="style2" style="width: 102px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<?php 
			if($PGTxnId !="")
			{
			echo "Online";
			}
			else
			{
			echo $PaymentMode;
			}
			?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 102px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php echo $RegChequeNo;?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<?php echo $RegChequeDate;?></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 103px;"  >
			<span style="font-size: 11pt">
			<?php echo $PGTxnId;?></span></td>		   			   
   	</tr>
   	<?php
   	$RecCount=$RecCount+1;
   	}
   	?>
   	<tr>
		   <td class="style5" colspan="6" style="background-color: #009900"   >
			<strong><span class="style4">Total Collection amount</span>:</strong></td>
   		   <td   align="center" class="style2" style="background-color: #009900; text-align:right; width: 102px;"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalRegistrationFeePaid;?></span></strong></font></td>
   
   		   <td   align="center" class="style10" style="width: 102px"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalLateFee;?></span></strong></font></td>
		   

		   			   
   		   <td   align="center" class="style10" style="width: 102px"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalChequeBounceAmt;?></span></strong></font> 
			</td>
		   

		   			   
   		   <td   align="center" class="style2" colspan="8"  >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="17"   >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="17" style="background-color: #009900"   >
			<p style="text-align: center"><u><b><font size="3" color="#FFFFFF">
			Day Book Collection Summary</font></b></u></td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Registration Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo $RgistrationFeeTotal;?></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<font size="3"><b>Admission</b></font><b><font size="3"> Fees 
			Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo $AdmissionFeeTotalAmt;?></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Regular Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo ($RegularTotal-$TotalLateFee);?>
			</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Regular Late Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo $TotalLateFee;?></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Regular Fees Cheque Bounce Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo $TotalChequeBounceAmt;?>
			</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Miscellaneous Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php echo $MiscTotal;?></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3">Grand Total </font></b></td>
   		   <td   align="center" class="style2" colspan="11" style="width: 1153px"  >
			<?php
			echo $RgistrationFeeTotal+$AdmissionFeeTotalAmt+$RegularTotal-$TotalLateFee+$TotalLateFee+$TotalChequeBounceAmt+$MiscTotal;
			?>
			</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="17"   >
			&nbsp;</td>
   

		   			   
   	</tr>
   	</table>
   		
<p align="center">&nbsp;<p align="center"><u><b>
<font face="Cambria" style="font-size: 12pt">Miscellaneous Collection Summary 
Report</font></b></u><p align="center">&nbsp;

<table width="100%" cellspacing="0" cellpadding="0" class="style1">
	<tr>
		<td align="center" bgcolor="#008000" style="border-left: 1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<font face="Cambria" color="#FFFFFF"><b>Sr No</b></font></td>
		<td align="center" bgcolor="#008000" style="border-style: solid; border-width: 1px">
		<font face="Cambria" color="#FFFFFF"><b>Head Name</b></font></td>
		<td align="center" bgcolor="#008000" style="border-left-style: solid; border-left-width: 1px; border-right: 1px solid #808080; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<font face="Cambria" color="#FFFFFF"><b>Amount</b></font></td>
	</tr>
	<?php
	$SrCnt=1;
	while($rowMH = mysql_fetch_row($rsMiscHead))
   		{
   			$HeadName=$rowMH[0];
   			$Amount=$rowMH[1];
	?>
	<tr>
		<td style="border-left: 1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px"><font face="Cambria"><?php echo $SrCnt;?></td>
		<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px"><font face="Cambria" size="3"><?php echo $HeadName;?></font></td>
		<td style="border-left-style: solid; border-left-width: 1px; border-right: 1px solid #808080; border-top-style: solid; border-top-width: 1px"><font face="Cambria" size="3"><?php echo $Amount;?></font></td>
	</tr>
	<?php
	$SrCnt=$SrCnt+1;
	}
	?>
	<tr>
		<td class="style8" valign="bottom" style="border-style: solid; border-width: 1px">&nbsp;</td>
		<td class="style8" valign="bottom" style="border-style: solid; border-width: 1px">&nbsp;</td>
		<td class="style8" valign="bottom" style="border-style: solid; border-width: 1px">
			&nbsp;</td>
	</tr>

	<tr>
		<td class="style8" valign="bottom" style="border-left: 1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><strong><span class="style9">
		<span style="font-size: 11pt"><br>
		<br>
		<br>
		Cashier</span></span></strong></td>
		<td class="style8" valign="bottom" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><strong>
		<span style="font-size: 11pt">Accounts Officer / Sr. Accountant</span></strong></td>
		<td class="style8" valign="bottom" style="border-left-style: solid; border-left-width: 1px; border-right: 1px solid #808080; border-bottom-style: solid; border-bottom-width: 1px">
			<strong><span style="font-size: 11pt">Principal</span></strong></td>
	</tr>

</table>
</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
   		