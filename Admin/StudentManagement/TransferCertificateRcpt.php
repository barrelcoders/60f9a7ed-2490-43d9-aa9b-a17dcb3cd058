<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
//$CertificateNo=$_REQUEST["txtCertificateNo"];
$sadmission=$_REQUEST["txtAdmissionNo"];
	   $ssql="SELECT `srno` , `sname` , `DOB`,`Sex`,`Category`,`Nationality`,`sadmission` ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`SchoolId`,`DateOfAdmission` FROM `Almuni` where `sadmission`='$sadmission'";
		//echo $ssql;
		//exit();
$currentdate2=date("Y-m-d");

$rsCertiNo=mysql_query("SELECT max(`certificate_sr_no`) FROM `student_certificate` WHERE `certificate_type`='Transfer Certificate'");
if(mysql_num_rows($rsCertiNo)>0)
{
	$rowCertiNo=mysql_fetch_row($rsCertiNo);
	if($rowCertiNo[0]=="")
	{
		$CertificateNo="5407";
	}
	else
	{
		$CertificateNo=$rowCertiNo[0]+1;
	}
}
else
{
	$CertificateNo="5407";
}

		
	$rs= mysql_query($ssql);
	if (mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_row($rs))
		{
			$srno=$row[0];
			$sname=$row[1];
			$DOB=$row[2];
			$Sex=$row[3];
			$Category=$row[4];
			$Nationality=$row[5];
			$sadmission=$row[6];
			$sclass=$row[7];
			$srollno=$row[8];
			$LastSchool=$row[9];
			$sfathername=$row[10];
			$FatherEducation=$row[11];
			$FatherOccupation=$row[12];
			$MotherName=$row[13];
			$MotherEducation=$row[14];
			$Address=$row[15];
			$smobile=$row[16];
			$simei=$row[17];
			$suser=$row[18];
			$spassword=$row[19];
			$email=$row[20];
			$routeno=$row[21];
			$SchoolId=$row[22];
			$DateOfAdmission=$row[23];
			//$DiscontType=$row[22];
			//$DocumentFileName=$row[22];
			$rsChk=mysql_query("select * from `student_certificate` where `sadmission`='$sadmission' and `certificate_type`='Transfer Certificate'");
			if(mysql_num_rows($rsChk)>0)
			{
			
			echo "Transfer Certificate has already been generated";
			}
            else
            {
			
			$ssql="INSERT INTO  `student_certificate` (`sadmission`,`sname`,`sclass`,`srollno`,`certificate_type`,`generation_date`,`certificate_sr_no`,`financial_year`) VALUES ('$sadmission','$sname','$sclass','$srollno','Transfer Certificate','$currentdate2','$CertificateNo','2015')";
			mysql_query($ssql) or die(mysql_error());
			break;
			}
		}
	}
	else
	{
		echo "<br><br><center><b>Record Not Found!";
		exit();
	}
	
	$rsSchoolDetail=mysql_query("select `SchoolName`,`SchoolAddress`,`PhoneNo`,`LogoURL`,`AccountNo`,`AffiliationNo`,`website`,`SchoolNo` from `SchoolConfig` where `SchoolId`='$SchoolId'");
	while($row = mysql_fetch_row($rsSchoolDetail))
		{
			$SchoolName=$row[0];
			$SchoolAddress=$row[1];
			$PhoneNo=$row[2];
			$LogoURL=$row[3];
			$AccountNo=$row[4];
			$AffiliationNo=$row[5];
			$website=$row[6];
			$SchoolNo=$row[7];
			break;
		}

	$PreNursery="PRE-NURSERY";
	$LKG="LKG";
	$UKG="UKG";
	
	$pos1 = strpos($Class, $PreNursery);
	$pos2 = strpos($Class, $LKG);
	$pos3 = strpos($Class, $UKG);
	
	if ($pos1 !== false || $pos2 !== false || $pos3 !== false)
	{
		$SchoolName=$SchoolName2;
	}
	else
	{
		$AffiliationString="Affiliated to C.B.S.E., New Delhi";
	}
$Schedule=$_REQUEST["cboSchedule"];
$txtBoardAnnualExam=$_REQUEST["txtBoardAnnualExam"];
$cboFailedYeNo=$_REQUEST["cboFailedYeNo"];
$cboPromotiontoNextClass=$_REQUEST["cboPromotiontoNextClass"];
$txtPromotiontoNextClass=$_REQUEST["txtPromotiontoNextClass"];
$txtSchoolDuesPaid=$_REQUEST["txtSchoolDuesPaid"];
$txtFeeConcession=$_REQUEST["txtFeeConcession"];
$txtTotalWorkingDays=$_REQUEST["txtTotalWorkingDays"];
$txtTotalWorkingDaysPresent=$_REQUEST["txtTotalWorkingDaysPresent"];
$txtNCCCadet=$_REQUEST["txtNCCCadet"];
$txtGamePlayed=$_REQUEST["txtGamePlayed"];
$txtGeneralConduct=$_REQUEST["txtGeneralConduct"];


$Dt = $_REQUEST["txtDOB"];
		$arr=explode('/',$Dt);
$txtDOB=$arr[1] . "-" . $arr[0] . "-" . $arr[2];

		$Dt = $_REQUEST["txtDateOfApplicationCertificate"];
		$arr=explode('/',$Dt);
$txtDateOfApplicationCertificate=$arr[1] . "-" . $arr[0] . "-" . $arr[2];

$txtAdmissionClass=$_REQUEST["txtAdmissionClass"];


		$Dt = $_REQUEST["txtDateOfIssueCertificate"];
		$arr=explode('/',$Dt);
$txtDateOfIssueCertificate= $arr[1]. "-" . $arr[0] . "-" . $arr[2];

$txtReasonforLeaving=$_REQUEST["txtReasonforLeaving"];
$txtRemarks=$_REQUEST["txtRemarks"];


		$Dt = $_REQUEST["txtDateofAdmission"];
		$arr=explode('/',$Dt);
		$txtDateofAdmission= $arr[1] . "-" . $arr[0] . "-" . $arr[2];
		
$txtSubjectStudied=$_REQUEST["txtSubjectStudied"];


$currentdate1=date("d-m-Y");
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

<meta content="en-us" http-equiv="Content-Language" />

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<title>Transfer Certificate</title>



</head>



<body onload="Javascript:CreatePDF();">
<table width="100%">
<tr>
<td>


	<p align="left"><b><font face="Cambria">Issue Transfer Certificate</font></b></p>
	<hr>
	
	</td>
	</tr>
</table>

<div id="MasterDiv">
<style type="text/css">

.auto-style4 {

	font-size: large;

	font-weight: bold;

}

.auto-style5 {

	font-size: large;

	font-family: Calibri;

	text-decoration: underline;

}

.auto-style6 {

	font-family: Calibri;
	font-size: large;

}

.style1 {
	text-align: center;
}

.style2 {
	font-family: Cambria;
}

.style3 {
	border-collapse: collapse;
}

.style5 {
	text-align: right;
}

.style8 {
	line-height: 100%;
	font-weight: bold;
}

.style11 {
	line-height: 100%;
}

.style13 {
	font-size: 10pt;
}
.style14 {
	line-height: 100%;
	font-family: Cambria;
	font-size: 10pt;
}
.style15 {
	line-height: 100%;
	font-size: 10pt;
}
.style16 {
	font-family: Cambria;
	font-size: 10pt;
}

</style>
	<p align="center"><font face="Cambria" style="font-size: 12pt">
	<img border="0" src="../images/logo.png" width="350" height="75"></font>
	</p>
	<table style="width: 100%" class="style3">
		<tr>
			<td colspan="3" class="style1"><?php echo $SchoolAddress; ?></td>
		</tr>
		<tr>
			<td colspan="3" class="style1"><P align="center"><font face="Cambria" style="font-size: 12pt">(The School Affiliated to the C.B.S.E New Delhi)</font></p></td>
		</tr>
		<tr>
			<td style="width: 450px"><font face="Cambria">School Number : <?php echo $SchoolNo; ?><br>Affiliation Number : <?php echo $AffiliationNo; ?></font></td>
			<td style="width: 391px" class="style1"></td>
			<td style="width: 391px" class="style5" ><span class="style2">Phone: <?php echo $TCMobile; ?><br>E-mail: <?php echo $SchoolEmailIdTC; ?></span></td>
		</tr>
		</table>
		<table style="width: 100%" class="style3">
	<hr>
		<tr>
			<td colspan="3" class="style1">
			<font face="Cambria" style="font-size: 12pt"><strong>SCHOOL LEAVING CERTIFICATE / TRANSFER CERTIFICATE</strong></font></td>
		</tr>
		</table>
		
		<br>
	<table style="width: 100%; border-collapse:collapse">
		<tr>
			<td colspan="3">			
			<table style="width: 100%" cellpadding="0" class="style3">
				<tr>
					<td style="width: 397px"><font face="Cambria" style="font-size: 12pt">
	&nbsp;&nbsp;&nbsp;&nbsp;Certificate No.<?php echo $CertificateNo;?></font></td>
					<td style="width: 398px" class="style1">
					<font face="Cambria" style="font-size: 12pt">
					Admission No.<?php echo $sadmission;?></font></td>
					<td style="width: 398px" class="style5"><font face="Cambria" style="font-size: 12pt">

	Date:<?php echo $currentdate1;?></font></td>
				</tr>					
			</table>
			</td>
		</tr>
		<tr>
			<td>
			&nbsp;</td>
			<td style="width: 82%">
			</td>
			<td style="width: 18%">
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">1.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Name of 
			Pupil : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $sname;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">2.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Father&#39;s / Guardian&#39;s Name : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $sfathername; ?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">3.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Mother&#39;s Name : </font>
			</p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $MotherName;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">4.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Nationality : </font>
			</p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $Nationality; ?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">5.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Whether&nbsp; candidate belongs to Schedule Caste or 
	Schedule Tribe : </font>
			</p>
	</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $Schedule;?><?php echo $Category; ?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">6.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Date of first admission in the School with class : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo date("d-m-Y", strtotime($DateOfAdmission));?>&nbsp;,&nbsp;<?php echo $txtAdmissionClass;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">7.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Date Of Birth (in Christian Era) according to 
	Admission Register :  </font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php 
//$DOB=$rs['DOB'];
if($DOB !="")
{
$DOB=date("d-m-Y", strtotime($DOB));  
}
	//echo $rs['DOB']; 
	echo $DOB;
?></p>
			</td>
		</tr>
		<tr>
			<td class="style16">
			<font face="Cambria">8.</font></td>
			<td style="width: 82%" class="style2">
			<p class="style15">Class in which pupil last studied :  </p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $sclass; ?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">9.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">School/Board Annual examination last taken with 
	result : </font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtBoardAnnualExam;?></p>
			</td>
		</tr>
		<tr>
			<td class="style16">
			<font face="Cambria">10.</font></td>
			<td style="width: 82%" class="style2">
			<p class="style15">Whether failed. If so, once / twice in the same 
	class: </p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14">
			<?php echo $cboFailedYeNo;?>
			</p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">11.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Subjects studied :</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtSubjectStudied;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">12.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Whether qualified for promotion to the higher 
	class : </font>
			</p>
	</td>
			<td style="width: 18%" class="style2">
			<p class="style14">
			<?php echo $cboPromotiontoNextClass;?>,<?php echo $txtPromotiontoNextClass;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">13.</font></td>
			<td style="width: 82%">
			<p class="style11"><font face="Cambria" size="3" class="style13">Month upto which the (pupil has paid) school dues/paid :</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtSchoolDuesPaid;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">14.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Any fees concession availed :If so, nature of 
	such concession : </font>
			</p>
	</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtFeeConcession;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">15.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Total no. of working days :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtTotalWorkingDays;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">16.</font></td>
			<td style="width: 82%">
			<p class="style15">
			<font face="Cambria">Total No. of working 
			days present : </font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtTotalWorkingDaysPresent;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">17.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Whether NCC cadet/Boy Scout/Girl Guide 
	(Details may be given) :</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtNCCCadet;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">18.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Games played or extra curricular activities in 
	which the pupil usually took part </font>
			</p>
	</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtGamePlayed;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">19.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">General conduct : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtGeneralConduct;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">20.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Date of application for certificate :</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtDateOfApplicationCertificate=date("d-m-Y", strtotime($txtDateOfApplicationCertificate)); ?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">21.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Date of issue of certificate : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtDateOfIssueCertificate;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">22.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Reason for leaving the school : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtReasonforLeaving;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			<font face="Cambria">23.</font></td>
			<td style="width: 82%">
			<p class="style15"><font face="Cambria">Any other remarks : 
	</font></p>
			</td>
			<td style="width: 18%" class="style2">
			<p class="style14"><?php echo $txtRemarks;?></p>
			</td>
		</tr>
		<tr>
			<td class="style13">
			&nbsp;</td>
			<td style="width: 82%" class="style13">
			&nbsp;</td>
			<td style="width: 18%" class="style13">
			&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" style="width: 80%">
			<table style="width: 100%" cellpadding="0" class="style3">
				<tr>
					<td style="width: 397px">
					&nbsp;</td>
					<td style="width: 398px" class="style1">
					&nbsp;</td>
					<td style="width: 398px" class="style5">
					&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 397px">
					&nbsp;</td>
					<td style="width: 398px" class="style1">
					&nbsp;</td>
					<td style="width: 398px" class="style5">
					&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 397px">
					<p class="style8"><font face="Cambria" size="3">Class 
					Teacher&#39;s 
	Signature :</font></p>
					</td>
					<td style="width: 398px" class="style1">
					<p class="style8"><font face="Cambria" size="3">Checked By :</font></p>
					</td>
					<td style="width: 398px" class="style5">
					<p class="style8"><font face="Cambria" size="3">Principal&#39;s Signature</font></p>
					</td>
				</tr>
				<tr>
					<td style="width: 397px">
					&nbsp;</td>
					<td style="width: 398px" class="style1">
					<font face="Cambria" size="3">(State full name &amp; Designation)</font></td>
					<td style="width: 398px" class="style5">
					&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
<form name="frmPDF" id="frmPDF" method="post" action="StorePDF.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $CertificateNo;?>">
	</span>
</form>			
	</table>
</div>

<div id="divPrint">
	<p align="center">
	<font face="Cambria" style="font-size: 10pt">
	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php"><span >HOME</span></a>
	</font>
</div>

</body>
</html>