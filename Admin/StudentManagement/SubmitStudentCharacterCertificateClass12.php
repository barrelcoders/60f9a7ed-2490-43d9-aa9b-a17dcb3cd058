<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
$sadmission=$_REQUEST["txtsadmission"];
$Session=$_REQUEST["txtSession"];
$Name=$_REQUEST["txtname"];
$currentdate=date("d-m-Y");

$rsStudentDetail=mysql_query("select `Sex` from `Almuni` where `sadmission`='$sadmission'");
while($row=mysql_fetch_row($rsStudentDetail))
{
	$Gender=$row[0];
}
if($Gender=="M")
{
	$MasterMs="Master";
	$HisHer="his";
	$HeShe="He";
	$SonOfDaughterof="S/O";
	$HimHer="him";
	$BoyGirl="boy";
}
else
{
	$MasterMs="Miss.";
	$HisHer="her";
	$HeShe="She";
	$SonOfDaughterof="D/O";
	$HimHer="her";
	$BoyGirl="girl";
}






       $rsStudentDetail=mysql_query("select `sclass` from `Almuni` where `sadmission`='$sadmission'");
		while($row=mysql_fetch_row($rsStudentDetail))
		{
			$Class=$row[0];
		}
		if($Class=="12NMEDA")
		{
			$StudentClass="XII / A / NON-MED";
		
		}
		if($Class=="12NMEDB")
		{
			$StudentClass="XII / B / NON-MED";
		
		}
		if($Class=="12NMEDC")
		{
			$StudentClass="XII / C / NON-MED";
		
		}
		if($Class=="12NMEDD")
		{
			$StudentClass="XII / D / NON-MED";
		
		}
		if($Class=="12NMEDE")
		{
			$StudentClass="XII / E / NON-MED";
		
		}
		if($Class=="12MEDF")
		{
			$StudentClass="XII / F / MED";
		
		}
		if($Class=="12COMG")
		{
			$StudentClass="XII / G / COMMERCE";
		
		}
		if($Class=="12COMH")
		{
			$StudentClass="XII / H / COMMERCE";
		
		}
		if($Class=="12COMI")
		{
			$StudentClass="XII / I / COMMERCE";
		
		}
		if($Class=="12ARTJ")
		{
			$StudentClass="XII / J / HUMANITIES";
		
		}
		if($Class=="12MEDA")
		{
			$StudentClass="XII / A / MED";
		
		}
		if($Class=="12COMZ")
		{
			$StudentClass="XII / Z / COMMERCE";
		
		}
		if($Class=="12NMEDZ")
		{
			$StudentClass="XII / Z / NON-MED";
		
		}














$ssql="select `financialyear` from `FYmaster` where `Status`='Active'";
$rs= mysql_query($ssql);
	while($row2 = mysql_fetch_row($rs))
	{
		$CurrentFY=$row2[0];
		break;
	}
	
$ssql="select count(*) from `student_certificate` where `certificate_type`='Aadhar'";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Character Certificate</title>
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
<font face="Cambria" size="4">
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

<form name="frmCertificate" id="frmCertificate" method="post" action="SubmitStudentCharacterCertificateClass12.php">
<p>&nbsp;</p>
<font face="Cambria" size="4">
<?php 
		
			//if(isset($_POST['FillDetail'])) 
			if($_REQUEST["txtsadmission"] !="")
			{
			 	$ID=$_REQUEST['txtsadmission'];
    			$result1=mysql_query("SELECT `sname`,`sfathername`,`sclass`,`DateOfAdmission`,`sadmission`,`DOB`,`CBSERollNo` FROM   `Almuni` where `sadmission`='$ID'");
			  	
			  	while($row = mysql_fetch_row($result1))
				{
					$sname=$row[0];
					$sfathername=$row[1];
					$sclass=$row[2];
					$DateOfAdmission=$row[3];
					$sadmission=$row[4];
					if ($row[5]=="0000-00-00")
					{
					$DOB="";
					}
					else
					{
						$DOB=$row[5];
					}
					
					$CBSERollNo=$row[6];
					break;
				}
			}
?>	


</font>	


<div id="print">
<h1 align="center"><font size="4" face="Cambria"><br />
<br />
</font>
</h1>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<h3 align="center"><u><font face="Cambria">CHARACTER</font></u><font face="Cambria"><u> 
CERTIFICATE</u></font></h3>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p><font face="Cambria" size="4">Certified that&nbsp;<b><i><?php echo $MasterMs;?>
 <?php  echo $sname;  ?>,</b></i>
&nbsp;<i><?php echo $SonOfDaughterof;?>  
<b><?php 
if($sfathername !="")
{
	echo $sfathername; 
}
else
{
	echo $MotherName; 
}
?></i></b> has been a student in Class XI &amp; XII <b><i>(2014-2015 &amp; 2015-2016)</i></b> in Delhi Public School, Faridabad.<?php echo $HeShe;?> has passed 
the All India Senior School Certificate Examination conducted by the Central Board of Secondary Education (CBSE) held in March,<b><i>2016</i></b><?php 
//$DateOfAdmission=$rs['DateOfAdmission'];
/*if($DateOfAdmission!="")
{
$DateOfAdmission=date("d-m-Y", strtotime($DateOfAdmission));  
}
	//echo $rs['DateOfAdmission']; 
	echo $DateOfAdmission;
*/?> under Roll No.<b><i><?php echo $CBSERollNo;?></i></b>. <br>&nbsp;</font></p>
<p><font face="Cambria" size="4">During <?php echo $HisHer;?> stay in the school, <?php echo $HisHer;?> conduct and character has been 
<b><i>Very Good</i></b>.</span>
<br><br><br><br></p>
</font><font size="3" face="Cambria">
<table style="width: 100%" cellpadding="0" class="style1">
<tr>
<td colspan=2 align=right><font size="4"><img src="../images/PrincipalSignature.png" height="50px"></font></td>
</tr>
	<tr>
	
		<td style="width: 594px"><b><font size="4">Date: <?php echo $currentdate;?></font></b></td>
		<td style="width: 595px" class="style2">
<b><font size="4">Principal</font></b></td>
	</tr>
</table>
</font><font size="4" face="Cambria">
<!--<p><b><font face="Cambria" size="3">Place: </font></p>-->
</div>
</font><font size="3" face="Cambria"><font size="4" face="Cambria">
<p>
<br />
</p>
</font>
<font size="3">
<table align="center">
<tr>
	<td>
	<font size="4">
	<!--<button onclick="printcontent('print')"><b><font face="Cambria">PRINT</font></b></button>-->
	</font>
	</td>
</tr>
</table>
</form>
</font>
<div class="footer" align="center">
<div class="footer_contents" align="center">
&nbsp;</div>
</div>

<form name="frmPDF" id="frmPDF" method="post" action="FinalStudentCharacterCertificateClass12.php">
	<span style="font-size: 11pt">
	<font size="4">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="sadmission" id="sadmission" value="<?php echo $sadmission;?>">
	</font>
	</span>
</form>	
</div>
<font size="4">
<div id="divPrint">
	<p align="center">
	<!--<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>-->
	<img src="../Admin/images/progress-indicator-animated-gif.gif"><br>
	</font>
<font size="4" face="Cambria">
	<center><b>Please Wait...</b></center>
	</div>
</font>
</body>
</html>