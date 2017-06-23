<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
$EmpId=$_REQUEST["txtEmpId"];

//echo $EmpId;


$Name=$_REQUEST["txtname"];
$txtYear=$_REQUEST["txtYear"];
$txtRollNo=$_REQUEST["txtRollNo"];
$txtMarks=$_REQUEST["txtMarks"];

$currentdate=date("d-m-Y");

$ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
$rs= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rs))
	{
		$CurrentFY=$row2[0];
		break;
	}
	
$ssql="select count(*) from `employee_certificate` where `certificate_type`='Experience'";
$rsChar= mysql_query($ssql);
	if (mysql_num_rows($rsChar) > 0)
	{
		while($row2 = mysql_fetch_row($rsChar))
		{
			$CNT=$row2[0]+1;
			break;
		}
		
		$CertificateNo="DPS/".$CurrentFY."/$CNT";
	}
	else
	{
		$CertificateNo="DPS/".$CurrentFY."/1";
	}
 	$ID=$_POST['txtEmpId'];
	
	$ssql="SELECT `EmpId`,`Name`,`DOJ`,`Address`,`FatherName`,`Department`,`Designation`,`Salary` FROM  `employee_alumni` where `EmpId`='$EmpId'";
	$rsSt= mysql_query($ssql);

	
	while($row2 = mysql_fetch_row($rsSt))
	{
		
		$EmpID=$row2[0];
		$Name=$row2[1];
		$DOJ=$row2[2];	
		$Address=$row2[3];
		$FatherName=$row2[4];
		$Department=$row2[5];
		$Designation=$row2[6];
		$Salary=$row2[7];
		$DOB=date("d-m-Y", strtotime($DOB));  
	}
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Experience Certificate</title>
<script src="../Certificaties/autofil/jquery-1.11.0.js" type="text/javascript"></script>
<script>
function printcontent(e1)
{
	var restorepage=document.body.innerHTML;
	var printcontent=document.getElementById(e1).innerHTML;
	document.body.innerHTML=printcontent;
	window.print(e1); 
	document.body.innerHTML=restorepage;
}
function printDiv() 
 {
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 }
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
</head>

<body onload="Javascript:CreatePDF();">
<!--<div id="MasterDiv">-->
<div id="MasterDiv" style="display: none;">
<style>
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
.word
{
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
margin:0px 0px 0px 200px; 
}
.inputword
{
font-size:18px;
text-align:center;
}
</style>

<form name="frmCertificate" id="frmCertificate" method="post" action="SubmitEmployeeExperienceCertificate.php">
<p>&nbsp;</p>


<div id="print">
<h1 align="center"><font size="3" face="Cambria"><image src="../images/logo.png" height="80px" width="300px"></image><br>(Affiliated to C.B.S.E. New Delhi)<br/>
<?php echo $SchoolAddress; ?><br><?php echo $SchoolAffiliation; ?><br></h1>

<h2 align="center"><u><b><span style="font-size: 14pt">Experience Certificate</span></b></u></h2>
<p align="center"><u><b>To Whom So Ever It May Concern</b></u></p>

<table width="100%">

<tr>

<td width="50%">
<b><font face="Cambria" size="3">Date : <?php echo $currentdate;?></font></b>

</td>

<td width="50%">
<p align="right">
<b><font face="Cambria" size="3">Certificate No:<?php echo $CertificateNo; ?> </font></b>

</td>
</tr>
</table>


<p>
<font size="3" face="Cambria">This is to certify that&nbsp;<b>
<?php echo $sname; ?></b>
&nbsp;S/D/O Mr. / Mrs.<b>
<?php  echo $FatherName;  ?></b>&nbsp; 
resident of <b> <?php echo $Address; ?></b> is / has been&nbsp; been working / 
worked from <?php  echo $DOJ;  ?> to .............. as on a pay scale of Payband :<?php  echo $Salary;  ?> Gradepay : .</font></p>
<p>During his / her stay in school, his / her work and conduct has 
been found satisfactory.</p>
<p>We wish him / her all the success in life.</p>
<p><b><font face="Cambria" size="3">Principal</font></b></p><b>
</div>
<table align="center">
<tr>
	<td>
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
	</td>
</tr>
</table>
</form>
<form name="frmPDF" id="frmPDF" method="post" action="FinalEmployeeExperienceCertificate.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $EmpId;?>">
	</span>
</form>	
</div>
<div id="divPrint">
	<p align="center">
	<font face="Cambria" style="font-size: 10pt">
	<!--<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>-->
	<br>
	<br>
	<img src="../Admin/images/progress-indicator-animated-gif.gif"><br>
	<center><b>Please Wait...</b></center>
	</font>
	</div>
</body>
</html>
