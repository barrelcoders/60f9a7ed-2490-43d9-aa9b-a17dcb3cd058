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

$ssql="select `srno`,`RegistrationNo`,`sname`,`sclass`,`TxnAmount`,`RegistrationFormNo`,DATE_FORMAT(`RegistrationDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,(select `PGTxnId` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId` limit 1) as `PGTxnId`,`TxnStatus` from  `NewStudentRegistration` as `a` where 1=1";
$ssqlAdmission="select `srno`,`sadmission`,`sname`,`sclass`,`TxnAmount`,`AdmissionFeeReceipt`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId` from  `NewStudentAdmission` as `a` where 1=1";
$ssqlMisc="select `srno`,`sadmissionno`,`sname`,`sclass`,`Amount`,`FeeReceipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId`,`PaymentMode`,`ChequeNo`,`Chequedate`,`HeadName`,`VendorName` from `fees_misc_collection` as `a` where `HeadType` ='Hostel'";
$ssqlReg="select `srno`,`sadmission`,`sname`,`sclass`,`amountpaid`,`receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId`,`PaymentMode`,`AdjustedLateFee`,`cheque_bounce_amt` from  `fees` as `a` where `receipt` like 'HR%' and  1=1";
$ssqlMiscHead="select distinct `HeadName`,sum(`Amount`) from `fees_misc_collection` as `a` where `HeadType` ='Hostel'";
if($DateFrom!="")
{
	$ssql=$ssql." and `RegistrationDate`>='$DateFrom' and `RegistrationDate`<='$DateTo' limit 2000";
	$ssqlAdmission=$ssqlAdmission." and `AdmissionDate`>='$DateFrom' and `AdmissionDate`<='$DateTo'";
	$ssqlMisc=$ssqlMisc. " and `date`>='$DateFrom' and `date`<='$DateTo'";
	$ssqlReg=$ssqlReg. " and `date`>='$DateFrom' and `date`<='$DateTo'";
	$ssqlMiscHead=$ssqlMiscHead." and `date`>='$DateFrom' and `date`<='$DateTo' group by `HeadName`";
}

//$rsRegistration=mysql_query($ssql);

//$rsAdmission=mysql_query($ssqlAdmission);
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

					<strong><font face="Cambria" size="3"><br>Hostel Fees Report</font></strong></div>
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
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	font-family: Cambria;
}
.style9 {
	font-size: 14pt;
}
.style10 {
	font-size: 12pt;
}
.style12 {
	text-align: left;
}
.style13 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: left;
}
</style>
 <table id="table3" class="CSSTableGenerator" cellspacing="0" cellpadding="0" width="1327" >

   	<tr>
		   <td class="style3" colspan="15">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
			<span class="style4"><span style="font-size: 12pt">Hostel Day Book Report<br>Report Date:&nbsp; <?php 
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
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Sr No</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Type</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Unique Id. No.</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Source Name</font><font color="#FFFFFF">
			</font></b>
			</td>
			<td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Vendor Name</font></b></td>
			<td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Class</font></b></td>
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Paid</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b><font face="Cambria" size="3" color="#FFFFFF">Late Fees</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b><font face="Cambria" size="3" color="#FFFFFF">Cheque Bounce 
			Charges</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Receipt No</font></b></td>
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Date</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b><font face="Cambria" size="3"><strong><span class="style7">Mode Of Paymen</span></strong><span class="style7"><strong>t</strong></span></font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Status</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">SIS Txn. ID</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Citrus Txn Id</font></b></td>
		   

		   			   
   	</tr>
   	
   	
   	<?php
   	$RegularTotal=0;
   	$PGTxnId="";
   	$PaymentMode="";
   	$LateFee=0;
   	$TotalLateFee=0;
   	$RecCount=1;
   	$cheque_bounce_amt=0;
   	$Total_cheque_bounce_amt=0;
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
			$cheque_bounce_amt=$cnt1[12];
			$Total_cheque_bounce_amt=$Total_cheque_bounce_amt+$cheque_bounce_amt;
			
			$TotalLateFee=$TotalLateFee+$LateFee;
			$TxnAmountAdjustedLateFee=$TxnAmount-$LateFee;
			//$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$cheque_bounce_amt=$cnt1[12];
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmountAdjustedLateFee;
			
			//$RegularTotal=$RegularTotal+$TxnAmount;
			$RegularTotal=$RegularTotal+$TxnAmountAdjustedLateFee;
   	?>
   	
   	<tr>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?>.</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<span class="style6">Hostel</span><font face="Cambria" style="font-size: 11pt"> Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 110px" >
			&nbsp;</td>
			<td   align="center" class="style2" style="width: 110px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style3" style="width: 110px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmountAdjustedLateFee;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  ><font face="Cambria" size="3">
			<?php echo $LateFee;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<?php echo $cheque_bounce_amt;?>
			</td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationFormNo;?></font></td>
		   <td   align="center" class="style2" style="width: 111px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;"  >
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
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;"  >
			<span style="font-size: 11pt">
			<?php echo $PGTxnId;?></span></td>		   			   
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
   	?>

   	<tr>
		   <td   align="center" class="style2" style="width: 110px; height: 35px;"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?>.</font></td>
		   <td   align="center" class="style2" style="width: 110px; height: 35px;"   >
			<span class="style6">Hostel Misc.</span><font face="Cambria" style="font-size: 11pt"> Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px; height: 35px;"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px; height: 35px;"   >
			<font face="Cambria" size="3"><?php echo $sname;?>-<?php echo $MiscHeadName;?></font> </td>
			<td   align="center" class="style8" style="width: 110px; height: 35px;" >
			<span class="style10"><?php echo $VendorName;?></span></td>
			<td   align="center" class="style2" style="width: 110px; height: 35px;" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style3" style="width: 110px; height: 35px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px; height: 35px;"  ><font face="Cambria" size="3"></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px; height: 35px;"  >
			</td>
			
   
   		   <td   align="center" class="style2" style="width: 110px; height: 35px;"  >
			<font face="Cambria" size="3"><?php echo $RegistrationFormNo;?></font></td>
		   <td   align="center" class="style2" style="width: 111px; height: 35px;"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px; height: 35px;"  >
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
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px; height: 35px;"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px; height: 35px;"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px; height: 35px;"  >
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
   		   <td   align="center" class="style3" style="background-color: #009900; width: 110px;"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalRegistrationFeePaid;?></span></strong></font></td>
			<td   align="center" class="style3" style="background-color: #009900; width: 110px;"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalLateFee;?></span></strong></font></td>
			<td   align="center" class="style3" style="background-color: #009900; width: 110px;"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $Total_cheque_bounce_amt;?></span></strong></font></td>
   
   		   <td   align="center" class="style2" colspan="6" style="width: 933px"  >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="15"   >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="15" style="background-color: #009900"   >
			<p style="text-align: center"><u><b>
			<font size="3" color="#FFFFFF" face="Cambria">
			Day Book Collection Summary</font></b></u></td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6"   >
			<b><font size="3" face="Cambria">Hostel Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="9" style="width: 1122px"  >
			<p class="style12"><font face="Cambria"><?php echo $RegularTotal;?></font></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6" style="height: 21px"   >
			<b><font size="3" face="Cambria">Hostel Late Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="9" style="width: 1122px; height: 21px;"  >
			<p class="style12"><font face="Cambria"><?php echo $TotalLateFee;?></font>
			</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6" style="height: 21px"   >
			<b><font size="3" face="Cambria">Hostel Misc. Fees Collection</font></b></td>
   		   <td class="style13" colspan="9" style="width: 1122px; height: 21px;"  >
			<font face="Cambria"><?php echo $MiscTotal;?></font></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="6" style="height: 21px"   >
			<b><font size="3" face="Cambria">Hostel Cheque Bounce Collection</font></b></td>
   		   <td class="style13" colspan="9" style="width: 1122px; height: 21px;"  >
			<font face="Cambria">
			<?php echo $Total_cheque_bounce_amt;?></font></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="15"   >
			</td>
   

		   			   
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
<p align="center">&nbsp;<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
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
   		