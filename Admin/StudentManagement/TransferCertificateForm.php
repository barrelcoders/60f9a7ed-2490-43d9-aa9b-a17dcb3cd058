<?php

session_start();

include '../../connection.php';

include '../../AppConf.php';

include '../Header/Header3.php';

?>

<?php
$sadmission=$_REQUEST["txtAdmissionNo"];
	   $ssql="SELECT `srno` , `sname` , `DOB`,`Sex`,`Category`,`Nationality`,`sadmission` ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`SchoolId`,`DateOfAdmission` FROM `Almuni` where `sadmission`='$sadmission'";
		//echo $ssql;
		//exit();
		
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
			break;
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
	
	$rsSubject= mysql_query("select distinct `subject` from `subject_master` where `class`='$sclass'");
		$strSubject="";
		while($row = mysql_fetch_row($rsSubject))
		{
			$strSubject=$strSubject.$row[0].",";
		}
		$strSubject=substr($strSubject,0,strlen($strSubject)-1);
		
	$rsNo= mysql_query("select max(`SrNo`) from `student_certificate`");
	if (mysql_num_rows($rsNo) > 0)
	{
		while($row = mysql_fetch_row($rsNo))
		{
			$CertificateNo=$row[0]+1;
		}
	}
	else
	{
		$CertificateNo=1;
	}
$currentdate1=date("d-m-Y");
?>

<script language="javascript">
function Validate()
{
document.getElementById("frmCertificate").submit();	
}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta content="en-us" http-equiv="Content-Language" />

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<title>Transfer Certificate</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>

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
.style4 {
	line-height: 150%;
}

.style5 {
	text-align: right;
}

</style>

</head>



<body>
<table width="100%">
<tr>
<td>


	<p align="left"><b><font face="Cambria">Issue Transfer Certificate</font></b></p>
	<hr>
	
	</td>
	</tr>
</table>

<div id="divCertificate">
<form name="frmCertificate" id="frmCertificate" method="post" action="TransferCertificateRcpt.php">
<input type="hidden" name="txtCertificateNo" id="txtCertificateNo" value="<?php echo $CertificateNo;?>">
<input type="hidden" name="txtAdmissionNo" id="txtAdmissionNo" value="<?php echo $sadmission;?>">
	
	<p align="center"><font face="Cambria" style="font-size: 12pt"><img border="0" src="../images/logo.png" width="350" height="81"></font></p>
	<!--
	<p align="center"><b><font face="Cambria" style="font-size: 12pt"><?php echo $SchoolAddress; ?></font></b></p>
	<p align="center" class="auto-style5"><font face="Cambria" style="font-size: 12pt"><strong>Affiliated to C.B.S.E., New Delhi</strong></font></p>
	
	
	
	-->
	
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
			<td colspan="3" class="style1"><font face="Cambria" style="font-size: 12pt"><strong>SCHOOL LEAVING CERTIFICATE / TRANSFER CERTIFICATE</strong></font></td>
		</tr>
		</table>
		<br>
	<table style="width: 100%; border-collapse:collapse">
		<tr>
			<td colspan="2">
			<table style="width: 100%" cellpadding="0" class="style3">
				<tr>
					<td style="width: 397px"><font face="Cambria"></font></td>
					<td style="width: 398px" class="style1">
					&nbsp;</td>
					<td style="width: 398px" class="style5"></td>
				</tr>
			</table>
			<table style="width: 100%" cellpadding="0" class="style3">
				<tr>
					<td style="width: 397px"><font face="Cambria" style="font-size: 12pt">
	Certificate No.<?php echo $CertificateNo;?></font></td>
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
			<td style="width: 864px; border-bottom-style:solid; border-bottom-width:1px">
			<p class="style4">&nbsp;</p>
			</td>
			<td style="width: 308px; border-bottom-style:solid; border-bottom-width:1px">
			<p class="style4"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">1. Name of 
			Pupil : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $sname;?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">2. Father&#39;s / Guardian&#39;s Name : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $sfathername; ?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">3. Mother&#39;s Name : </font>
			</p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $MotherName;?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">4. Nationality : </font>
			</p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $Nationality; ?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">5. Whether the candidate belongs to Schedule Caste or 
	Schedule &nbsp;&nbsp;&nbsp; Tribe : </font>
			</p>
	</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $Category; ?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">6. Date of first admission in the School with class : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php 
//$DateOfAdmission=$rs['DateOfAdmission'];
if($DateOfAdmission!="")
{
$DateOfAdmission=date("d-m-Y", strtotime($DateOfAdmission));  
}
	//echo $rs['DateOfAdmission']; 
	echo $DateOfAdmission;
?>&nbsp;,&nbsp;<input name="txtAdmissionClass" id="txtAdmissionClass" type="text"> </p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">7. Date Of Birth (in Christian Era) according to 
	Admission Register :  </font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php 
//$DOB=$rs['DOB'];
if($DOB !="")
{
$DOB=date("d-m-Y", strtotime($DOB));  
}
	//echo $rs['DOB']; 
	echo $DOB;
?></p></td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px" class="style2">
			<p class="style4">8. Class in which pupil last studied :  </p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><?php echo $sclass; ?></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">9. School / Board Annual examination last taken with 
	result : </font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input type="text" name="txtBoardAnnualExam" size="81"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px" class="style2">
			<p class="style4">10. Whether failed. If so, once / twice in the same 
	class: </p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4">
			<select size="1" name="cboFailedYeNo">
	<option value="No" selected="selected">No</option>
	<option value="Yes">Yes</option>
	</select></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">11. Subjects studied :</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4">
			<input name="txtSubjectStudied" type="text" style="width: 466px" value="<?php echo $strSubject;?>"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">12. Whether qualified for promotion to the higher 
	class : </font>
			</p>
	</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4">
			<select size="1" name="cboPromotiontoNextClass" id="cboPromotiontoNextClass">
	<option value="Yes">Yes</option>
	<option value="No">No</option>
	</select>,<input name="txtPromotiontoNextClass" id="txtPromotiontoNextClass" type="text">
			</p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">13. Month upto which the (pupil has paid) school dues 
	/ paid :</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input name="txtSchoolDuesPaid" type="text"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">14. Any fees concession availed : If so, nature of 
	such concession : </font>
			</p>
	</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><!--<input type="text" name="txtFeeConcession" size="81">-->
			<select size="" name="txtFeeConcession" id="txtFeeConcession" style="width:90px";>
	        <option value="Yes">Yes</option>
	       <option value="No">No</option>
	       <option value="Yes-Full Tuition Fee">Yes-Full Tuition Fee</option>
	       <option value="Yes-Half Tuition Fee">Yes-Half Tuition Fee</option>
	       <option value="Yes-Freeship">Yes-Freeship</option>
	        </select></p>
			</td>
		</tr>
		<tr>
			<td style="border-style: solid; border-width: 1px">
			<p class="style4"><font face="Cambria" size="3">15(A). Total no. of working days :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	</font></p>
			</td>
			<td style="border-style: solid; border-width: 1px">
			<p class="style4"><font face="Cambria" size="3"><input name="txtTotalWorkingDays" type="text"></font></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<font face="Cambria" size="3">15(B). Total No. of working 
			days present :  
	</font>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<font face="Cambria" size="3"> <input name="txtTotalWorkingDaysPresent" type="text"></font></td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">16. Whether NCC cadet / Boy Scout / Girl Guide 
	(Details may be given) :</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input type="text" name="txtNCCCadet" size="81"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">17. Games played or extra curricular activities in 
	which the pupil usually took part : </font>
			</p>
	</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input type="text" name="txtGamePlayed" size="81"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">18. General conduct : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4">
			<!--<input type="text" name="txtGeneralConduct" size="81" value="Good">-->
			<select size="" name="txtGeneralConduct" id="txtGeneralConduct" style="width:80px";>
	        <option value="Very Good">Very Good</option>
	        <option value="Good">Good</option>
	        <option value="Excellent">Excellent</option>
	       <option value="Bad">Bad</option>
	        </select></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">19. Date of application for certificate :</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input name="txtDateOfApplicationCertificate" type="text" class="tcal"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">20. Date of issue of certificate : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input name="txtDateOfIssueCertificate" type="text" class="tcal"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">21. Reason for leaving the school : 
	</font></p>
			</td>
			<td style="border-style:solid; border-width:1px; width: 308px">
			<p class="style4"><input type="text" name="txtReasonforLeaving" size="81"></p>
			</td>
		</tr>
		<tr>
			<td style="border-style:solid; border-width:1px; width: 864px">
			<p class="style4"><font face="Cambria" size="3">22. Any other remarks : 
	</font></p>
			</td>
			<td style="width: 308px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px">
			<p class="style4"><input type="text" name="txtRemarks" size="81"></p>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" style="border-top-style: solid; border-top-width: 1px">
			<table style="width: 100%" cellpadding="0" class="style3">
				<tr>
					<td style="width: 397px"><b><font face="Cambria" size="3">Class Teacher&#39;s 
	Signature :</font></b></td>
					<td style="width: 398px" class="style1"><b><font face="Cambria" size="3">Checked By :</font></b></td>
					<td style="width: 398px" class="style5"><b><font face="Cambria" size="3">Principal&#39;s Signature</font></b></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td style="width: 864px"><font face="Cambria" size="3">(Seal with full address &amp; Pincode)</font></td>
			<td style="width: 308px">&nbsp;</td>
		</tr>
	</table>

		   
	
	
	
	<p class="auto-style6">&nbsp;</p>
	
	
	<p class="auto-style6">&nbsp;</p>
</form>
</div>



<p class="style1">
	<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();">
</p>
</body>
</html>