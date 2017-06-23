<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedempId=$_REQUEST["txtEMPID"];
	$Selecteddays=$_REQUEST["txtdays"];
	$Selectedempname=$_REQUEST["CboName"];
	$SelectedLeaveDate=$_REQUEST["txtLeaveDate"];
	
	
	$ssql="SELECT `srno`, `EmployeeId`, `EmployeeName`, `LeaveFrom`, `LeaveTo`, `LeaveType`, `NoOfDays`, `ContactNoDuringLeave`, `AddressDuringLeave`, `Remarks`, `EntryDate`, `ApproverId`, `ApprovalStatus`, `L2ApproverId`, `L2ApproverStatus`, `L3ApproverId`,`L3ApproverStatus` ,`MedicalCertificate`,`StatusUpdateDate` FROM `Employee_Leave_Transaction` WHERE 1=1";

	//echo $ssql;
	//exit();
	
	if($_REQUEST["DateFrom"] !="")
   	{
		$DateFrom = $_REQUEST["DateFrom"];
		$DateTo = $_REQUEST["DateTo"];
		 if($DateFrom!="")
	     {
		   $ssql=$ssql." and (`LeaveFrom`>='$DateFrom' and `LeaveFrom`<='$DateTo') or (`LeaveTo`>='$DateFrom' and `LeaveTo`<='$DateTo')";
		 }
    }
	if($SelectedempId!="")
	{
		$ssql=$ssql." and `EmployeeId`='$SelectedempId'";
	}
	if($Selecteddays!="")
	{
		$ssql=$ssql." and `NoOfDays`='$Selecteddays'";
	}

	
	if($SelectedLeaveDate!="")
	{
	$ssql=$ssql." and `EntryDate`='".$SelectedLeaveDate."'";
	}
	if($Selectedempname!="Select One")

	{

		$ssql=$ssql." and `EmployeeName`='".$Selectedempname."'";

	}
	
	
$rs= mysql_query($ssql);

}

?>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditLeave.php?srno=" + SrNo ,"","width=700,height=650");
}
function ShowDelete(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("DeleteLeave.php?srno=" + SrNo ,"","width=700,height=650");
}


</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Employee Leave History</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />

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
<p><b><font face="Cambria">Employee Leave History</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="89%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="EmployeeLeaveHistory.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 14%">
<p align="left"><font face="Cambria">Emp Id:</font></td>
<td style="width: 59%"><font face="Cambria">
<input name="txtEMPID" id="txtEMPID" type="text" class="text-box"> </font>
</td>
<td style="width: 18%" colspan="2">
<font face="Cambria">Employee Name:</font></td>
<td style="width: 8%">	<font face="Cambria">
	 <select name="CboName" id="CboName" style="float: left" ; >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Name` FROM `employee_master`";
							

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
<tr>
<td style="width: 14%"><p align="center">&nbsp;</td>
<td style="width: 59%">&nbsp;</td>
<td style="width: 18%" colspan="2">&nbsp;</td>
<td style="width: 8%">&nbsp;</td>
</tr>
<tr>
<td style="width: 14%"><p class="style2">&nbsp;</td>
<td style="width: 59%">&nbsp;</td>
<td style="width: 18%" colspan="2">&nbsp;</td>
<td style="width: 8%">&nbsp;</td>
</tr>
<tr>
	<td width="14%">
   	<font face="Cambria">Date From :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
</font></td>

<td style="width: 59%">
   	<font face="Cambria"> <input type="date" name="DateFrom" id="DateFrom"  size="20"></font></td>

<td width="18%">
   	<font face="Cambria">To Date : </font></td>

<td style="width: 6%" colspan=2>
   	<font face="Cambria"> <input type="date" name="DateTo" id="DateTo"  size="20"></font></td>

</tr>
<td colspan=5 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
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

<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator" cellspacing="0" cellpadding="0">
<tr>
		   <td class="style3" color="#FFFFFF" colspan="15" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #A0A0A0; border-right-width: 1px">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
         	<span class="style4"><span style="font-size: 12pt">Leave History<br> </strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>

<tr>
<td height="22" align="center" class="style12" ><b><font face="Cambria">
		S No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Employee Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Employee Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave Type</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave From</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave To</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Date of Apply</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 1 Approval Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 1 Status</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 2 Approval Id</font></b></td>
		

		
		
		<td height="22" align="center" class="style14" width="10%">
		<b><font face="Cambria">Level 2 Status</font></b></td>
		
		
		<!--<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Level 3 Approval Id</font></b></td>
		
        <td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Level 3 Status</font></b></td>-->
		
		<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Remarks</font></b></td>
		
		<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Medical Certificate</font></b></td>
		<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Edit</font></b></td>

<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria">Delete</font></b></td>


				
		
		
		
		
				
		
</tr>
<?php
$recno=1;
	while($row = mysql_fetch_row($rs))
	{
	    $srno=$row[0];
		$EmployeeLeaveType=$$row[5];
		$MedicalCerti=$row[17];
?>
<tr>
<td style="width: 4%" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 8%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 16%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 7%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 7%" font="Cambria" class="style13"><font face="Cambria"><?php echo date("d-m-Y", strtotime($row[3]));?></font></td>
<td style="width: 7%" font="Cambria" class="style13"><font face="Cambria"><?php echo date("d-m-Y", strtotime($row[4]));?></font></td>
<td style="width: 11%" font="Cambria" class="style13"><font face="Cambria"><?php echo date("d-m-Y", strtotime($row[10]));?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 10%" font="Cambria" class="style10"><font face="Cambria"><?php echo $row[12];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[13];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[14];?></font></td>

<!--<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[15];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[16];?></font></td>-->
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[9];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria">
<?php
if($EmployeeLeaveType="HPLM")
{
?>
<a href="http://dpsfsis.com/Admin/HRM/MedicalCertificates/<?php echo $row[17];?>" target="_blank"><?php echo $row[17];?></a></font>
<?php
}
?>
</td>


<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria"><a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></b></td>

<td height="22" align="center" class="style14" width="12%">
		<b><font face="Cambria"><a href="Javascript:ShowDelete(<?php echo $srno ?>);" class="style3">Delete</a></font></b></td>

</tr>
<?php
$recno=$recno+1;
	}
?>
</table>
</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<br>
<br>
<br>

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
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>
</div>
<br>
<br>
<br>
<br>

</body>
</html>