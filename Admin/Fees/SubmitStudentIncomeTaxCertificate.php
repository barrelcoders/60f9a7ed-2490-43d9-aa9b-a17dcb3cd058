<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
$sadmission=$_REQUEST["txtsadmission"];
$Session=$_REQUEST["txtSession"];
$Session1=$_REQUEST["txtSession1"];
$Session2=$_REQUEST["txtSession2"];
$Name=$_REQUEST["txtname"];
$currentdate=date("d-m-Y");


$rsStudentDetail=mysql_query("select `Sex` from `student_master` where `sadmission`='$sadmission'");
while($row=mysql_fetch_row($rsStudentDetail))
{
	$Gender=$row[0];
}
if($Gender=="Male")
{
	$MasterMs="Master";
	$HisHer="His";
	$hisher="his";
	$HeShe="He";
	$SonOfDaughterof="S/O";
	$HimHer="him";
}
else
{
	$MasterMs="Miss.";
	$HisHer="Her";
	$hisher="her";
	$HeShe="She";
	$SonOfDaughterof="D/O";
	$HimHer="her";
}


$ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
$rs= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rs))
	{
		$CurrentFY=$row2[0];
		break;
	}
	
$ssql="select count(*) from `student_certificate` where `certificate_type`='TutionFee'";
$rsChar= mysql_query($ssql);
	if (mysql_num_rows($rsChar) > 0)
	{
		while($row2 = mysql_fetch_row($rsChar))
		{
			$CNT=$row2[0]+1;
			break;
		}
		
		$CertificateNo="JPS/".$CurrentFY."/$CNT";
	}
	else
	{
		$CertificateNo="JPS/".$CurrentFY."/1";
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Income tax Certificate</title>
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
<div id="MasterDiv">
<font face="Calibri">
<!--<div id="MasterDiv" style="display: none;">-->

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
.style1 {
	border-collapse: collapse;
}
.style2 {
	text-align: right;
}
</style>

</font>

<form name="frmCertificate" id="frmCertificate" method="post" action="SubmitStudentIncomeTaxCertificate.php">
<font face="Calibri">
<?php 
		
			//if(isset($_POST['FillDetail'])) 
			if($_REQUEST["txtsadmission"] !="")
			{
			 	$ID=$_REQUEST['txtsadmission'];
    			$result1=mysql_query("SELECT `sname`,`sfathername`,`MotherName`,`sclass`,`DOB` FROM   `student_master` where `sadmission`='$ID'");
			  	
			  	while($row = mysql_fetch_row($result1))
				{
					$sname=$row[0];
					$sfathername=$row[1];
					$MotherName=$row[2];
					$sclass=$row[3];
					
					if ($row[4]=="0000-00-00")
					{
					$DOB="";
					}
					else
					{
						$DOB=$row[4];
					}
				
					break;
					
				}
			}
?>	


</font>	


<div id="print">
<h1 align="center"><font size="4" face="Calibri"><image src="../images/logo.png" height="100px" width="300px"></image><br><?php echo $SchoolName; ?><br />
<?php echo $SchoolAddress; ?><br />
<span style="font-weight: 400">(Affiliated to C.B.S.E. New Delhi) <br></span> </font>
</h1>
<font face="Calibri">
<br>
</font>

<h3 align="center"></h3>
<p align="center"><font face="Calibri" size="5"><b><u>Fee Certificate For 2016-2017</u></b></font></p>
<font face="Calibri">
<br>
</font>
<table style="width: 100%" cellpadding="0" class="style1">
	<tr>
		<td style="width: 594px"><b><font face="Calibri" size="3">Date: <?php echo $currentdate;?></font></b></td>
		<td style="width: 595px" class="style2">
<b><font face="Calibri" size="3"></font></b></td>
	</tr>
</table>

<table width=100%>
<tr>
	<td>
	<p>
	<font size="4" face="Calibri">Certify that Master/Kum.&nbsp;
	</td>
	<td><b><u>
	<font face="Calibri">
	<?php echo $sname; ?></font></u></b><font face="Calibri"> </font>
	</td>
</tr>
<tr>
	<td>
	<font face="Calibri">S/o, D/o Mr. / Mrs<b>.
	</font>
	</td>
	<td>
				<b><u><font face="Calibri"><?php echo $sfathername; ?> / <?php echo $MotherName; ?></font></u></b><font face="Calibri">
				</font>
	</td>
</tr>
<tr>
	<td>
	<font face="Calibri">Bearing Admn. No<b>.</b>
	</font>
	</td>
	<td>
	<b><u><font face="Calibri"><?php echo $sadmission; ?></font></u></b><font face="Calibri">
	</font> 
	</td>
</tr>
<tr>
	<td>
	<font face="Calibri">Student of class
	</font>
	</td>
	<td>
	<b><u><font face="Calibri"><?php  echo $sclass;  ?></font></u></b><font face="Calibri">
	</font>
	</td>
</tr>
</table>
<font face="Calibri">
</font>
<p><font size="4" face="Calibri">Has paid tution fee for the period from <?php echo $Session;?> to <?php echo $Session1;?>
 as per the details given below :-</font></p>
<font face="Calibri">
</font>
<table width=100%>
<tr>
  <td> <font face="Calibri">1. Tuition Fee</font></td>
  <td> <font face="Calibri">@ Rs. <?php echo $Session2;?></font> </font> </td>
</tr>
</table>
<font face="Calibri">
</font>
<p><font size="4" face="Calibri">
It is also certified that this School is affiliated to the Central Board of Secondary Education ( CBSE ).
</font></p> 
<font face="Calibri"> 
<br>
<br>
</b> 
</font> 
<p>&nbsp;</p>
<p><b>
<font face="Calibri" size="4">( Seal of the Institution )</font></b><font face="Calibri">
</font>

<font face="Calibri">
</font>
</font>
</div>


<table align="center">
<tr>
	<td>
	<font face="Calibri">
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
	</font>
	</td>
</tr>
</table>
</form>
<div class="footer" align="center">
<div class="footer_contents" align="center">
</div>
</div>

<p><font face="Calibri">
<br />
</font>
</p>
<table align="center">
<tr>
	<td>
	<font face="Calibri">
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
	</font>
	</td>
</tr>
</table>
<font face="Calibri">
</form>
</font>
<div class="footer" align="center">
<div class="footer_contents" align="center">
</div>
</div>

<form name="frmPDF" id="frmPDF" method="post" action="FinalStudentIncomeTaxCertificate.php">
	<span style="font-size: 11pt">
	<font face="Calibri">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="sadmission" id="sadmission" value="<?php echo $sadmission;?>">
	</font>
	</span>
</form>	
</div>
<div id="divPrint">
	<p align="center">
	<font face="Calibri" style="font-size: 10pt">
	<!--<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>-->
	<img src="../Admin/images/progress-indicator-animated-gif.gif"><br>
	<center>Please Wait...</center>
	</font>
	</div>
</body>
</html>