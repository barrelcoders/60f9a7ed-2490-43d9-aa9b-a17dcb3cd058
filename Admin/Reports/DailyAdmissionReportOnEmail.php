<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
	$ssql="SELECT `srno`,`InquiryFormNo`,`Name`,`FatherName`,`EmailId`,`sclass`,`smobile`,`Address`,`EntryDate` FROM `InquiryDetail` WHERE `EntryDate`='$currentdate1'";
	$rs= mysql_query($ssql);
	
	$ssql="SELECT `FormNo`,`sname`,`sclass`,`FatherName`,`ContactNo`,`EmailId`,`Address`,`date` FROM `RegistrationFees` WHERE `date`='$currentdate1' and `FormNo` != ''";
	$rs1= mysql_query($ssql);
	
	$ssql="SELECT `RegistrationNo`,`sname`,`sclass`,`FatherName`,`ContactNo`,`EmailId`,`Address`,`date` FROM `RegistrationFees` WHERE `date`='$currentdate1' and `RegistrationNo` != ''";
	$rs2= mysql_query($ssql);
	
	$ssql="SELECT `sadmission`,`sname`,`sclass`,`EntryDate` FROM `AdmissionFees` WHERE `EntryDate`='$currentdate1'";
	$rs3= mysql_query($ssql);
?>
<script language="javascript">
function CreatePDF() 
{
       //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
        //Print Page
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/Fees/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;
}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daily Admission Report</title>
</head>

<body onload="Javascript:CreatePDF();">
<div id="MasterDiv">
<table width="100%" border="1" style="border-collapse: collapse">
<tr>
<td colspan="2" align="center"><b><font face="Calibri">Daily Admission Report (<?php echo $currentdate;?>)</font></b></td>
</tr>
</table><br>
<table width="100%" border="1" style="border-collapse: collapse">
<tr>
<td colspan="9" align="center"><b><font face="Calibri">Inquiry Count:<?php echo mysql_num_rows($rs);?></font></b></td>
</tr>
<tr>
<td align="center">SrNo</td>
<td align="center">Inq. Form No</td>
<td align="center">Name</td>
<td align="center">Father Name</td>
<td align="center">Email</td>
<td align="center">Class</td>
<td align="center">Mobile</td>
<td align="center">Address</td>
<td align="center">Entry Date</td>
</tr>
<?php
if (mysql_num_rows($rs) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs))
	{
		$SrNo=$row[0];
		$InqFormNo=$row[1];
		$Name=$row[2];
		$FName=$row[3];
		$Email=$row[4];
		$Class=$row[5];
		$Mobile=$row[6];
		$Address=$row[7];
		$EntryDate=$row[8];			
			
?>		
<tr>
<td><?php echo $RowCnt;?></td>
<td><?php echo $InqFormNo;?></td>
<td><?php echo $Name;?></td>
<td><?php echo $FName;?></td>
<td><?php echo $Email;?></td>
<td><?php echo $Class;?></td>
<td><?php echo $Mobile;?></td>
<td><?php echo $Address;?></td>
<td><?php echo $EntryDate;?></td>
</tr>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
</table><br>
<table width="100%" border="1" style="border-collapse: collapse">
<tr>
<td colspan="9" align="center"><b><font face="Calibri">Form Count:<?php echo mysql_num_rows($rs1);?></font></b></td>
</tr>
<tr>
<td align="center">SrNo</td>
<td align="center">Form No</td>
<td align="center">Name</td>
<td align="center">Class</td>
<td align="center">Father Name</td>
<td align="center">Mobile</td>
<td align="center">Email</td>
<td align="center">Address</td>
<td align="center">Entry Date</td>
</tr>
<?php
$RowCnt=1;
if (mysql_num_rows($rs1) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs1))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName=$row[3];
		$Mobile=$row[4];
		$Email=$row[5];
		$Address=$row[6];
		$EntryDate=$row[7];
		
?>
<tr>
<td><?php echo $RowCnt;?></td>
<td><?php echo $FormNo;?></td>
<td><?php echo $Name;?></td>
<td><?php echo $Class;?></td>
<td><?php echo $FName;?></td>
<td><?php echo $Mobile;?></td>
<td><?php echo $Email;?></td>
<td><?php echo $Address;?></td>
<td><?php echo $EntryDate;?></td>
</tr>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
</table><br>
<table width="100%" border="1" style="border-collapse: collapse">
<tr>
<td colspan="9" align="center"><b><font face="Calibri">Registration Count:<?php echo mysql_num_rows($rs2);?></font></b></td>
</tr>
<tr>
<td align="center">SrNo</td>
<td align="center">Reg. No</td>
<td align="center">Name</td>
<td align="center">Class</td>
<td align="center">Father Name</td>
<td align="center">Mobile</td>
<td align="center">Email</td>
<td align="center">Address</td>
<td align="center">Entry Date</td>
</tr>
<?php
$RowCnt=1;
if (mysql_num_rows($rs2) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs2))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName=$row[3];
		$Mobile=$row[4];
		$Email=$row[5];
		$Address=$row[6];
		$EntryDate=$row[7];
		
?>
<tr>
<td><?php echo $RowCnt;?></td>
<td><?php echo $FormNo;?></td>
<td><?php echo $Name;?></td>
<td><?php echo $Class;?></td>
<td><?php echo $FName;?></td>
<td><?php echo $Mobile;?></td>
<td><?php echo $Email;?></td>
<td><?php echo $Address;?></td>
<td><?php echo $EntryDate;?></td>
</tr>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
</table><br>
<table width="100%" border="1" style="border-collapse: collapse">
<tr>
<td colspan="9" align="center"><b><font face="Calibri">Admission Count:<?php echo mysql_num_rows($rs3);?></font></b></td>
</tr>
<tr>
<td align="center">SrNo</td>
<td align="center">Admission. No</td>
<td align="center">Name</td>
<td align="center">Class</td>
<td align="center">Father Name</td>
<td align="center">Mobile</td>
<td align="center">Email</td>
<td align="center">Address</td>
<td align="center">Entry Date</td>
</tr>
<?php
$RowCnt=1;
if (mysql_num_rows($rs3) > 0)
{
	$RowCnt=1;
	while($row = mysql_fetch_row($rs3))
	{
		$FormNo=$row[0];
		$Name=$row[1];
		$Class=$row[2];
		$FName="";
		$Mobile="";
		$Email="";
		$Address="";
		$EntryDate=$row[3];
		
?>
<tr>
<td><?php echo $RowCnt;?></td>
<td><?php echo $FormNo;?></td>
<td><?php echo $Name;?></td>
<td><?php echo $Class;?></td>
<td><?php //echo $FName;?></td>
<td><?php //echo $Mobile;?></td>
<td><?php //echo $Email;?></td>
<td><?php //echo $Address;?></td>
<td><?php echo $EntryDate;?></td>
</tr>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
</table>
<form name="frmPDF" id="frmPDF" method="post" action="SendEmailDailyRegRpt.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">	
	</span>
</form>
</div>
</body>

</html>
