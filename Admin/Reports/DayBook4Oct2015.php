<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
include '../../AppConf.php';
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

$ssql="select `srno`,`RegistrationNo`,`sname`,`sclass`,`TxnAmount`,`RegistrationFormNo`,DATE_FORMAT(`RegistrationDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,(select `PGTxnId` from `NewStudentRegistration_temp` where `TxnId`=a.`TxnId` limit 1) as `PGTxnId` from  `NewStudentRegistration` as `a` where 1=1";
$ssqlAdmission="select `srno`,`sadmission`,`sname`,`sclass`,`TxnAmount`,`AdmissionFeeReceipt`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId` from  `NewStudentAdmission` as `a` where 1=1";
$ssqlMisc="select `srno`,`sadmissionno`,`sname`,`sclass`,`Amount`,`FeeReceipt`,DATE_FORMAT(`date`,'%d-%m-%Y') as `date`,'Paid',`TxnId`,`PGTxnId` from `fees_misc_collection` as `a` where 1=1";
if($DateFrom!="")
{
	$ssql=$ssql." and `RegistrationDate`>='$DateFrom' and `RegistrationDate`<='$DateTo' limit 2000";
	$ssqlAdmission=$ssqlAdmission." and `AdmissionDate`>='$DateFrom' and `AdmissionDate`<='$DateTo'";
	$ssqlMisc=$ssqlMisc. " and `date`>='$DateFrom' and `date`<='$DateTo'";
}
$rsRegistration=mysql_query($ssql);

$rsAdmission=mysql_query($ssqlAdmission);
$rsMisc=mysql_query($ssqlMisc);
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

					<strong><font face="Cambria" size="3"><br>Registration Fees Report</font></strong></div>
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
</style>
 <table id="table3" class="CSSTableGenerator" cellpadding="0" width="1327" style="border-collapse: collapse; border-width: 1px" >

   	<tr>
		   <td class="style3" colspan="11">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=300 height="80"><br><font size="3"><?php echo $SchoolAddress; ?></font></img></font><br>
			<span style="font-size: 12pt">Day Book Report<br>Report Date:&nbsp; <?php 
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
		   <td   align="center" width="92" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Sr No</font></b></td>
		   <td   align="center" width="124" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Type</font></b></td>
		   <td   align="center" width="111" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Unique Id. No.</font></b></td>
		   <td   align="center" width="109" class="style2"   bgcolor="#95C23D" style="text-align: center; background-color: #009900">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Source Name</font><font color="#FFFFFF">
			</font></b>
			</td>
			<td   align="center"   width="102" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900">
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Class</font></b></td>
   		   <td   align="center" width="114" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Amount Paid</font></b></td>
			
			 
   		   
   		   <td   align="center" width="119" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Receipt No</font></b></td>
		   <td   align="center" width="119" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Date</font></b></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">Status</font></b></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
			<b>
			<font face="Cambria" size="3" color="#FFFFFF">SIS Txn. ID</font></b></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" bgcolor="#95C23D" style="text-align: center; background-color: #009900" >
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
   			
   			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
   			$RgistrationFeeTotal=$RgistrationFeeTotal+$TxnAmount;
   			//$State=$cnt[10];   			
   	?>
   	<tr>
		   <td   align="center" width="92" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" width="124" class="style2"   >
			<font face="Cambria" style="font-size: 11pt">Registration Fee</font></td>
		   <td   align="center" width="111" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" width="109" class="style2"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center"   width="102" class="style2" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" width="114" class="style2" style="text-align: right"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><a href='RegistrationFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
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
		   <td   align="center" width="92" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" width="124" class="style2"   >
			<font face="Cambria" style="font-size: 11pt">Admission Fee</font></td>
		   <td   align="center" width="111" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" width="109" class="style2"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center"   width="102" class="style2" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" width="114" class="style2" style="text-align: right"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><a href='RegistrationFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
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
			$TotalRegistrationFeePaid=$TotalRegistrationFeePaid+$TxnAmount;
			$MiscTotal=$MiscTotal+$TxnAmount;
   	?>
   	
   	<tr>
		   <td   align="center" width="92" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <td   align="center" width="124" class="style2"   >
			<font face="Cambria" style="font-size: 11pt">Misc Fee</font></td>
		   <td   align="center" width="111" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RegistrationNo;?></font></td>
		   <td   align="center" width="109" class="style2"   >
			<font face="Cambria" size="3"><?php echo $sname;?></font>
			</td>
			<td   align="center"   width="102" class="style2" >
			<font face="Cambria" size="3"><?php echo $sclass;?></font></td>
   		   <td   align="center" width="114" class="style2" style="text-align: right"  >
			<font face="Cambria" size="3"><?php echo $TxnAmount;?></font></td>
			
   
   		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><a href='RegistrationFormReceiptRePrint.php?srno=<?php echo $srno; ?>' target="_blank"><?php echo $RegistrationFormNo;?></a></font></td>
		   <td   align="center" width="119" class="style2"  >
			<font face="Cambria" size="3"><?php echo $RegistrationDate;?></font></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt">
			<?php echo $State;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt"><?php echo $TxnId;?></span></td>
		   

		   			   
		   <td   align="center" width="119" class="style2" style="text-align: center"  >
			<span style="font-size: 11pt">
			<?php echo $PGTxnId;?></span></td>		   			   
   	</tr>
   	<?php
   	$RecCount=$RecCount+1;
   	}
   	?>
   	<tr>
		   <td class="style5" colspan="5" style="background-color: #009900"   >
			<strong><span class="style4"><span style="font-size: 11pt">Total Collection amount</span></span><span style="font-size: 11pt">:</span></strong></td>
   		   <td   align="center" width="114" class="style2" style="background-color: #009900; text-align:right"  >
			<font face="Cambria" size="3"><strong><span class="style4"><?php echo $TotalRegistrationFeePaid;?></span></strong></font></td>
   
   		   <td   align="center" width="949" class="style2" colspan="5"  >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="11"   >
			&nbsp;</td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="11" style="background-color: #009900"   >
			<p style="text-align: center"><u><b><font size="3" color="#FFFFFF">
			Day Book Collection Summary</font></b></u></td>
		   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Registration Fees Collection</font></b></td>
   		   <td   align="center" width="1138" class="style2" colspan="6"  >
			<b><span style="font-size: 11pt"><?php echo $RgistrationFeeTotal;?></span></b></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<font size="3"><b>Admission</b></font><b><font size="3"> Fees 
			Collection</font></b></td>
   		   <td   align="center" width="1138" class="style2" colspan="6"  >
			<b><span style="font-size: 11pt"><?php echo $AdmissionFeeTotalAmt;?></span></b></td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Regular Fees Collection</font></b></td>
   		   <td   align="center" width="1138" class="style2" colspan="6"  >
			&nbsp;</td>
   

		   			   
   	</tr>
   	<tr>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Miscellaneous Collection</font></b></td>
   		   <td   align="center" width="1138" class="style2" colspan="6"  >
			<b><span style="font-size: 11pt"><?php echo $MiscTotal;?></span></b></td>
   

		   			   
   	</tr>
   	<tr>
   	
   	<?php $TotalCollection= $MiscTotal+$AdmissionFeeTotalAmt+$RgistrationFeeTotal; ?>
		   <td class="style5" colspan="5"   >
			<b><font size="3">Total Collection</font></b></td>
   		   <td   align="center" width="1138" class="style2" colspan="6"  >
			<b><span style="font-size: 11pt"><?php echo $TotalCollection ;?></span></b></td>
   

		   			   
   	</tr>
   	</table>
   		
<table border="1" width="1327" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="1325" colspan="3" style="border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="1325" colspan="3" style="border-top-style: none; border-top-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="441">
		<p align="center"><font face="Cambria"><b>Cashier</b></font></td>
		<td width="442">
		<p align="center"><font face="Cambria"><b>Accounts Officer / Sr. 
		Accountant</b></font></td>
		<td width="442">
		<p align="center"><font face="Cambria"><b>Principal</b></font></td>
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
   		