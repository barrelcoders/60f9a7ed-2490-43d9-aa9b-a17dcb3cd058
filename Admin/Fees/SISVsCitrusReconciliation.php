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

$ssql="select `srno`,`RegistrationNo`,`sname`,`sclass`,`TxnAmount`,`RegistrationFormNo`,DATE_FORMAT(`RegistrationDate`,'%d-%m-%Y') as `date`,`TxnStatus`,`TxnId`,(select `PGTxnId` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId` limit 1) as `PGTxnId`,`TxnStatus` from  `NewStudentRegistration_temp` as `a` where 1=1";
$ssqlAdmission="select `srno`,`sadmission`,`sname`,`sclass`,`TxnAmount`,`AdmissionFeeReceipt`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `date`,'TxnStatus',`TxnId`,`PGTxnId` from  `NewStudentAdmission_temp` as `a` where 1=1";
$ssqlMisc="select `srno`,`sadmissionno`,`sname`,`sclass`,`Amount`,`FeeReceipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,`TxnStatus`,`TxnId`,`PGTxnId`,`PaymentMode` from `fees_misc_collection_temp` as `a` where 1=1";
$ssqlReg="select `srno`,`sadmission`,`sname`,`sclass`,`amountpaid`,`receipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,TxnStatus,`TxnId`,`PGTxnId`,`PaymentMode` from  `fees_temp` as `a`";
$ssqlMiscHead="select distinct `HeadName`,sum(`Amount`) from `fees_misc_collection` as `a` where 1=1";
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

	<link rel="stylesheet" type="text/css" href="../Reports/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../Reports/tcal.js"></script>

</head>



<body>

				<div>

					<p align="center">

					<strong><font face="Cambria" size="3"><br><u>SIS Vs Citrus 
					Vs Cheque Collection - Reconciliation Report</u></font></strong></div>
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
</style>
 <table id="table3" class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%" >

   	<tr>
		   <td class="style3" colspan="13">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center">
			<b>
			<span class="style4"><span style="font-size: 12pt">SIS Vs Citrus 
			Reconciliation<br>Report Date:&nbsp; <?php 
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
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 42px;">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Sr No</font></b></td>
		   <td   align="center" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 127px;">
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
			<font face="Cambria" size="3" color="#FFFFFF">Class</font></b></td>
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Paid</font></b></td>
			
			 
   		   
   		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 110px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Receipt No</font></b></td>
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Date</font></b></td>
		   

		   			   
		   <td   align="center" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900; width: 111px;" colspan="2" >
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
   		
   		$RecCount=1;
   		$TotalRegistrationFeePayable=0;
   		$TotalRegistrationFeePaid=0;
   		$TotalCancelledAmount=0;
   		$RgistrationFeeTotal=0;
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
   			$PaymentMode=$rowR[10];
   			   			$TxnStatus=$rowR[10];
   			
   			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
   			$RgistrationFeeTotal=$RgistrationFeeTotal+$TxnAmount;
   			//$State=$cnt[10];   			
   	?>
   	<tr>
		   <td   align="center" class="style2" style="width: 42px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 127px"   >
			<font face="Cambria" style="font-size: 11pt">Registration Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 110px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 110px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<font face="Cambria" size="3"><a href='RegistrationFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" class="style2" style="width: 111px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;" colspan="2"  >
			<?php 
			if($PGTxnId!="")
			{
			echo "Online"; 
			}
			?>
			</td>
		   

		   			   
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
   			
   			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
   			$AdmissionFeeTotalAmt=$AdmissionFeeTotalAmt+$TxnAmount;
   			//$State=$cnt[10];   			
   	?>
   	<tr>
		   <td   align="center" class="style2" style="width: 42px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 127px"   >
			<font face="Cambria" style="font-size: 11pt">Admission Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 110px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 110px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<font face="Cambria" size="3"><a href='AdmissionFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" class="style2" style="width: 111px">
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;" colspan="2"  >
			<?php 
			if($PGTxnId!="")
			{
			echo "Online";
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
   	while($cnt1= mysql_fetch_array($rsMisc))
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
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$MiscTotal=$MiscTotal+$TxnAmount;
   	?>
   	
   	<tr>
		   <td   align="center" class="style2" style="width: 42px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 127px"   >
			<font face="Cambria" style="font-size: 11pt">Misc Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 110px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 110px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<font face="Cambria" size="3"><a href='ShowMiscReceipt.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" class="style2" style="width: 111px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;" colspan="2"  >
			<?php echo $PaymentMode;?></td>
		   

		   			   
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
   	$RegularTotal=0;
   	$PGTxnId="";
   	$PaymentMode="";
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
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$RegularTotal=$RegularTotal+$TxnAmount;
   	?>
   	
   	<tr>
		   <td   align="center" class="style2" style="width: 42px"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" class="style2" style="width: 127px"   >
			<span class="style6">Regular</span><font face="Cambria" style="font-size: 11pt"> Fee</font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" class="style2" style="width: 110px"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center" class="style2" style="width: 110px" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" class="style2" style="text-align: right; width: 110px;"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" class="style2" style="width: 110px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationFormNo;?></font></td>
		   <td   align="center" class="style2" style="width: 111px"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" class="style2" style="text-align: center; width: 111px;" colspan="2"  >
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
   	<tr>
		   <td class="style5" colspan="5" style="background-color: #009900"   >
			<strong><span class="style4">Total Collection amount</span>:</strong></td>
   		   <td   align="center" class="style2" style="background-color: #009900; text-align:right; width: 110px;"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalRegistrationFeePaid;?></span></strong></font></td>
   
   		   <td   align="center" class="style2" colspan="7" style="width: 933px"  >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="13"   >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="13" style="background-color: #009900"   >
			<p style="text-align: center"><u><font size="3"><b>SIS </b></font>
			<b><font size="3" color="#FFFFFF">
			Collection Summary</font></b></u></td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5" style="background-color: #008000"   >
			<p style="text-align: center"><b><font style="font-size: 11pt">Fees 
			Type</font></b></td>
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px; text-align:center; background-color:#008000"  >
			<b><span style="font-size: 11pt">SIS Collection</span></b></td>
   

		   			   
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px; text-align:center; background-color:#008000"  >
			<b><span style="font-size: 11pt">Citrus Collection</span></b></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Registration Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			<?php echo $RgistrationFeeTotal;?></td>
   

		   			   
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			&nbsp;</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<font size="3"><b>Admission</b></font><b><font size="3"> Fees 
			Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			<?php echo $AdmissionFeeTotalAmt;?></td>
   

		   			   
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			&nbsp;</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Regular Fees Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			<?php echo $RegularTotal;?>
			</td>
   

		   			   
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			&nbsp;</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Miscellaneous Collection</font></b></td>
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			<?php echo $MiscTotal;?></td>
   

		   			   
   		   <td   align="center" class="style2" colspan="4" style="width: 1122px"  >
			&nbsp;</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="13"   >
			&nbsp;</td>
   

		   			   
   	</tr>
   	</table>
   		
<p align="center">&nbsp;<p align="left"><font face="Cambria"><b>Date Wise 
Collection Summary</b></font><hr>
<p align="center">&nbsp;<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">Sr No</font></b></td>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">Date</font></b></td>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">SIS Amount</font></b></td>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">Citrus Amount</font></b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<p align="center">&nbsp;<p align="left"><font face="Cambria"><b>Mode Of Payment 
Collection Summary</b></font><hr>
<p align="left">&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">Sr No</font></b></td>
		<td align="center" bgcolor="#009900"><b>
		<font face="Cambria" color="#FFFFFF">Date</font></b></td>
		<td align="center" bgcolor="#009900"><b><font face="Cambria">Online</font></b></td>
		<td align="center" bgcolor="#009900"><b><font face="Cambria">Cheque / DD</font></b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
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
		<td class="style8" valign="bottom" style="border-left: 1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<p style="text-align: left"><strong><span class="style9">
		<span style="font-size: 11pt"><br>
		<br>
		<br>
		Cashier</span></span></strong></td>
		<td class="style8" valign="bottom" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><strong>
		<span style="font-size: 11pt">Accounts Officer / Sr. Accountant</span></strong></td>
		<td class="style8" valign="bottom" style="border-left-style: solid; border-left-width: 1px; border-right: 1px solid #808080; border-bottom-style: solid; border-bottom-width: 1px">
			<p style="text-align: right">
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
   		