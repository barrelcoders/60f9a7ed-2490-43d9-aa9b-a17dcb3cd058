<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadmissionno=$_REQUEST["txtadmissionno"];
	$Selectedchequeno=$_REQUEST["txtchequeno"];
	$Selectedheadname=$_REQUEST["headname"];
	$Selecteddateofcheque=$_REQUEST["cbodateofcheque"];
	$SelectedEntryDate=$_REQUEST["cboEntryDate"];
	$SelectedClass=$_REQUEST["cboClass"];

	$ssql="SELECT `srno`, `date`, `HeadName`, `SubHead`, `Source`, `sadmissionno`, `sname`, `sclass`, `srollno`, `VendorName`, `VendorCompanyName`, `VendorAddress`, `VendorPhNo`, `ChequeNo`, `Chequedate`, `BankName`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `Status`, `FeeReceipt`, `ReceiptCode`, `SendToBank` FROM `fees_misc_collection` WHERE 1=1";

	//echo $ssql;
	//exit();
	if($Selectedadmissionno!="")
	{
		$ssql=$ssql." and `sadmissionno`='$Selectedadmissionno'";
	}
	if($Selectedchequeno!="")
	{
		$ssql=$ssql." and `ChequeNo`='$Selectedchequeno'";
	}

	if($Selecteddateofcheque!="")
	{

		$ssql=$ssql." and `Chequedate`='".$Selecteddateofcheque."'";

	}
	if($SelectedEntryDate !="")
	{
	$ssql=$ssql." and `date`='".$SelectedEntryDate."'";
	}
	if($Selectedheadname!="Select One")

	{

		$ssql=$ssql." and `HeadName`='".$Selectedheadname."'";

	}
	if($SelectedClass!="Select One")

	{

		$ssql=$ssql." and `sclass`='".$SelectedClass."'";

	}

	
$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Misc Collection Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}


.style2 {
	text-align: left;
}
.style3 {
	font-family: Cambria;
}


.style4 {
	text-align: right;
}
.style5 {
	border-collapse: collapse;
		border-left-style: solid;
	border-left-width: 0px;
	border-right-style: solid;
	border-right-width: 0px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 0px;
}


.style6 {
	text-align: right;
	border-top-style: solid;
	border-top-width: 1px;
	border-left-color: #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style10 {
	border-style: solid;
	border-width: 1px;
	text-align: right;
	}


.style12 {
	border-left: 1px solid #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style13 {
	border-style: solid;
	border-width: 1px;
}
.style14 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right: 1px solid #A0A0A0;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Misc Collection Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="MiscCollectionReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Admission No:</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtadmissionno" id="txtadmissionno" type="text" class="text-box"> </font>
</td>
<td style="width: 278px"><p align="left"><font face="Cambria">Cheque No:</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtchequeno" id="txtchequeno" type="text" class="text-box"></font></td>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="left">
<font face="Cambria">Head Name:</font></td>
<td style="width: 278px">	<font face="Cambria">
	 <select name="headname" id="headname" style="float: left" ; required onchange="Javascript:GetSubHead();">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							//$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_head`";
							$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_head` union SELECT distinct `HeadName` FROM `fees_misc_announce`";

							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
<td style="width: 278px"><p align="left"><font face="Cambria">Cheque Date:</font></td>
<td style="width: 278px">	<font face="Cambria">
<input name="cbodateofcheque" type="date" class="text-box"></font></td>
</tr>
<tr>
<td style="width: 278px"><p class="style2">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p class="style2">
<span class="style3">Entry</span><font face="Cambria"> Date:</font></td>
<td style="width: 278px">	<font face="Cambria">
<input name="cboEntryDate" id="cboEntryDate" type="date" class="text-box"></font></td>
<td style="width: 278px"><p align="left"><font face="Cambria">Class:</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboClass" id="cboClass" style="float: left" ; onchange="javascript:fnlFillClass();"class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `class` FROM `class_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
</tr>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<font face="Cambria">
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
</font>
<div id="MasterDiv">

<table width="100%" style="border-collapse: collapse;" border="0" class="CSSTableGenerator" cellspacing="0" cellpadding="0">
<tr>
		   <td class="style3" color="#FFFFFF" colspan=10" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #A0A0A0; border-right-width: 1px">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
         	<span class="style4"><span style="font-size: 12pt">Miscellaneous Collection Report<br> <?php 
         	if($Selectedheadname=="Select One")
         	{
         	$Selectedheadname="";
         	}
         	
         	
         	
         	echo $Selectedheadname;?></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>

<tr>
<td height="22" align="center" class="style12" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Admission No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Student / Vendor Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Class Section</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Cheque No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Deposit  Date</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Cheque Date</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Bank Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Amount</font></b></td>
		
		
		
		<td height="22" align="center" class="style14">
		<b><font face="Cambria">Fee Receipt</font></b></td>
		
		
				
		
</tr>
<?php
$recno=1;
$TotalAmt=0;
	while($row = mysql_fetch_row($rs))
	{
		$EmpId=$row[0];
		
		if($row[6] !="")
		{
			$StudVenderName=$row[6];
		}
		if($row[9] !="")
		{
			//$VenderName=$row[9];
			$StudVenderName=$row[9];
			$class=$row[7];
		}
		$TotalAmt=$TotalAmt+$row[16];
?>
<tr>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $StudVenderName;?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[7];?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[13];?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 153px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[14];?></font></td>
<td style="width: 153px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[15];?></font></td>
<td style="width: 153px" font="Cambria" class="style10"><font face="Cambria"><?php echo $row[16];?></font></td>
<td style="width: 153px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[22];?></font></td>
</tr>
<?php
$recno=$recno+1;
	}
?>
<tr>
<td></td>
<td></td>
<td font="Cambria" colspan="6" class="style6"><b><font face="Cambria">Total:</font></b></td>
<td style="width: 153px" font="Cambria" class="style10"><b><font face="Cambria"><?php echo $TotalAmt;?></font></b></td>
<td style="width: 153px" font="Cambria" class="style14">&nbsp;</td>
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

<font face="Cambria">
<?php
}
?>
</font>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>