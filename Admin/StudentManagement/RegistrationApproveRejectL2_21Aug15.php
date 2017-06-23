<?php
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `RegistrationNo`,`sname`,`DOB`,`Age`,`Sex`,`sclass`,`sfathername`,`FatherEducation`,`status`,`Remarks`,`smobile`,`MotherName`,`Distance`,`FatherAnnualIncome`,`TxnStatus`,`SchoolId`,`srno`,`ProfilePhoto`,`MotherEducation`,`Sibling`,`RealBroSisName`,`RealBroSisAdmissionNo`,`RealBroSisClass`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`AlumniSchoolName`,`AlumniFatherPassingClass`,`AlumniMotherSchoolName`,`AlumniMotherPassingClass`,`Location`,`ResidentialAddress`,`Single_Parent`,`L1ApprovalStatus`,`L1Remarks`,`L2ApprovalStatus`,`L2Remarks`,`BirthCertificate` FROM `NewStudentRegistration` where 1=1";
	if($_REQUEST["cboClass"] != "Select One")
	{
		$SelectedClass=$_REQUEST["cboClass"];
		$ssql=$ssql." and `sclass`='$SelectedClass'";	
	}
	if($_REQUEST["cboAge"] != "Select One")
	{
		$SelectedAge=$_REQUEST["cboAge"];
		if($SelectedAge=="Less than 3 Years")
		{
			$ssql=$ssql." and `AgeYear` <=3";	
		}
		if($SelectedAge=="Greater than 4 Years")
		{
			$ssql=$ssql." and `AgeYear` >=4";	
		}
		
	}	
	if($_REQUEST["cboSibling"]!="Select One")
	{
		$Sibling=$_REQUEST["cboSibling"];
		$ssql=$ssql." and `Sibling` ='$Sibling'";	
	}
	if($_REQUEST["cboFatherQualification"]!="Select One")
	{
		$FatherQualification=$_REQUEST["cboFatherQualification"];
		$ssql=$ssql." and `FatherEducation` ='$FatherQualification'";	
	}
	if($_REQUEST["cboFatherInCome"]!="Select One")
	{
		$FatherInCome=$_REQUEST["cboFatherInCome"];
		$ssql=$ssql." and `FatherAnnualIncome` ='$FatherInCome'";	
	}
	if($_REQUEST["cboMotherQualification"]!="Select One")
	{
		$MotherQualification=$_REQUEST["cboMotherQualification"];
		$ssql=$ssql." and `MotherEducation` ='$MotherQualification'";	
	}
	if($_REQUEST["cboMotherInCome"]!="Select One")
	{
		$MotherInCome=$_REQUEST["cboMotherInCome"];
		$ssql=$ssql." and `MontherAnnualIncome` ='$MotherInCome'";	
	}
	if($_REQUEST["cboFatherAlumni"]!="Select One")
	{	
		if($_REQUEST["cboFatherAlumni"]=="Yes")
		{
			$ssql=$ssql." and `AlumniSchoolName` !=''";	
		}
		if($_REQUEST["cboFatherAlumni"]=="No")
		{
			$ssql=$ssql." and `AlumniSchoolName` ==''";	
		}
	}
	if($_REQUEST["cboMotherAlumni"]!="Select One")
	{	
		if($_REQUEST["cboMotherAlumni"]=="Yes")
		{
			$ssql=$ssql." and `AlumniMotherSchoolName` !=''";	
		}
		if($_REQUEST["cboMotherAlumni"]=="No")
		{
			$ssql=$ssql." and `AlumniMotherSchoolName` ==''";	
		}
	}
	if($_REQUEST["cboGender"]!="Select One")
	{
		$Gender=$_REQUEST["cboGender"];
		$ssql=$ssql." and `Sex` ='$Gender'";	
	}
	if($_REQUEST["cboSingleParent"] !="Select One")
	{
		$SingleParent=$_REQUEST["cboSingleParent"];
		$ssql=$ssql." and `Single_Parent` ='$SingleParent'";		
	}
	$ssql=$ssql." and `L1ApprovalStatus` !='Pending'";
	if($_REQUEST["cboApprovalStatus"] !="All")
	{
		$RequestedStatus=$_REQUEST["cboApprovalStatus"];
		$ssql=$ssql." and `L2ApprovalStatus` ='$RequestedStatus'";		
	}
		
	$ssql=$ssql." order by `srno` desc";
	$rs= mysql_query($ssql);
}

$rsClass = mysql_query("select distinct `sclass` from `NewStudentRegistration` order by `sclass`");
$rsFQualification = mysql_query("select distinct `FatherEducation` from `NewStudentRegistration` order by `FatherEducation`");
$rsFIncome= mysql_query("select distinct `FatherAnnualIncome` from `NewStudentRegistration` order by `FatherAnnualIncome`");

$rsMQualification = mysql_query("select distinct `MotherEducation` from `NewStudentRegistration` order by `MotherEducation`");
$rsMIncome= mysql_query("select distinct `MontherAnnualIncome` from `NewStudentRegistration` order by `MontherAnnualIncome`");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Pending for Approval</title>
<style type="text/css">

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

        font-family: Calibri;

        font-weight:bold;

}
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style2 {
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	border: 1px solid #000000;

}
.style4 {
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
	text-align: center;
}
.style5 {
	border: 1px solid #000000;
}
.style6 {
	font-family: Cambria;
	border: 1px solid #000000;
}
</style>
<script type="text/javascript" language="javascript">
function fnlApprove(cnt,RegId)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	var RegistrationId=RegId;
	var myWindow = window.open("RegistrationApproveRejL2.php?RegId=" + RegistrationId + "&Remarks=" + escape(Remarks) + "&action=approve", "", "width=200, height=100");	
}
function fnlReject(cnt,RegId)
{
	ctrlRemarks="txtRemarks" + cnt;
	ctrlApproveBtn="btnApprove" + cnt;
	ctrlRejectBtn="btnReject" + cnt;
	document.getElementById(ctrlApproveBtn).disabled="true";
	document.getElementById(ctrlRejectBtn).disabled="true";
	
	var Remarks=document.getElementById(ctrlRemarks).value;
	var RegistrationId=RegId;
	var myWindow = window.open("RegistrationApproveRejL2.php?RegId=" + RegistrationId + "&Remarks=" + escape(Remarks) + "&action=reject", "", "width=200, height=100");	
}
function Validate()
{
document.getElementById("frmRegApp").submit();
}
</script>

</head>

<body>

		<p>&nbsp;</p>

		<table style="width: 100%; border-collapse:collapse" class="style14" cellpadding="0">



			<tr>



				<td class="auto-style49" style="height: 10px; background-color:#FFFFFF">







				<strong><font face="Cambria">Confirm Registration For Admission</font></strong><hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<p>&nbsp;</td>





			</tr>



			
		</table>

		<table style="width: 100%" class="style1">
		<form name="frmRegApp" id="frmRegApp" method="post" action="">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
			<tr>
				<td class="style6" style="width: 196px; height: 25px;">Class</td>
				<td class="style6" style="width: 196px; height: 25px;"><select name="cboClass" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
					while($rowC = mysql_fetch_row($rsClass))
					{
						$Class=$rowC[0];
				?>
				<option value="<?php echo $Class;?>"><?php echo $Class;?></option>
				<?php
					}
				?>
				</select></td>
		<td class="style6" style="width: 197px; height: 25px;">
		Age</td>
		<td class="style5" style="width: 197px; height: 25px;">
		<select name="cboAge" id="cboAge"  class="text-box">
		<option selected="" value="Select One">Select One</option>
		<option value="Less than 3 Years">Less than 3 Years</option>
		<option value="Greater than 4 Years">Greater than 4 Years</option>
		</select></td>
		<td class="style6" style="width: 197px; height: 25px;">
				Sibling</td>
		<td class="style5" style="width: 197px; height: 25px;">
				<select name="cboSibling" id="cboSibling" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				</select></td>
		</tr>
			<tr>
				<td class="style6" style="width: 196px; height: 29px;">Father&#39;s Qualification</td>
				<td class="style6" style="width: 196px; height: 29px;">
		<select name="cboFatherQualification"  class="text-box">
		<option selected="" value="Select One">Select One</option>
			<?php
					while($rowFQ = mysql_fetch_row($rsFQualification))
					{
						$FatherQualification=$rowFQ[0];
			?>
				<option value="<?php echo $FatherQualification;?>"><?php echo $FatherQualification;?></option>
				<?php
					}
				?>
		</select></td>
		<td class="style6" style="width: 197px; height: 29px;">
		Father&#39;s Income</td>
		<td class="style5" style="width: 197px; height: 29px;">
		<select name="cboFatherInCome" id="cboFatherInCome"  class="text-box">
		<option selected="" value="Select One">Select One</option>
			<?php
					while($rowFI = mysql_fetch_row($rsFIncome))
					{
						$FatherIncome=$rowFI[0];
			?>
				<option value="<?php echo $FatherIncome;?>"><?php echo $FatherIncome;?></option>
				<?php
					}
				?>
		</select>
		</td>
		<td class="style6" style="width: 197px; height: 29px;">
		Mother&#39;s Qualification</td>
		<td class="style5" style="width: 197px; height: 29px;">
		<select name="cboMotherQualification" id="cboMotherQualification"  class="text-box">
		<option selected="" value="Select One">Select One</option>
			<?php
					while($rowMQ = mysql_fetch_row($rsMQualification))
					{
						$MotherQualification=$rowMQ [0];
			?>
				<option value="<?php echo $MotherQualification;?>"><?php echo $MotherQualification;?></option>
				<?php
					}
				?>
		</select>
		</td>
		</tr>
			<tr>
				<td class="style6" style="width: 196px">Mother&#39;s Income</td>
				<td class="style6" style="width: 196px">
				<select name="cboMotherInCome" id="cboMotherInCome"  class="text-box">
		<option selected="" value="Select One">Select One</option>
			<?php
					while($rowMI = mysql_fetch_row($rsMIncome))
					{
						$MotherIncome=$rowMI[0];
			?>
				<option value="<?php echo $MotherIncome;?>"><?php echo $MotherIncome;?></option>
				<?php
					}
				?>
		</select>
				</td>
		<td class="style6" style="width: 197px">
		Father Alumni</td>
		<td class="style5" style="width: 197px">
		<select name="cboFatherAlumni" id="cboFatherAlumni"  class="text-box">
		<option selected="" value="Select One">Select One</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		</select></td>
		<td class="style6" style="width: 197px">
		Mother Alumni</td>
		<td class="style5" style="width: 197px">
		<select name="cboMotherAlumni" id="cboMotherAlumni" class="text-box">
		<option selected="" value="Select One">Select One</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		</select>
		</td>
		</tr>
			<tr>
				<td class="style6" style="width: 196px">Gender</td>
				<td class="style6" style="width: 196px">
				<select name="cboGender" id="cboGender" class="text-box">
				<option value="Select One" selected="">Select One</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select></td>
		<td class="style6" style="width: 197px">
		Single Parent</td>
		<td class="style5" style="width: 197px">
		<select name="cboSingleParent" id="cboSingleParent" class="text-box">
		<option value="Select One">Select One</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		</select></td>
		<td class="style5" style="width: 197px">
		Approval Status </td>
		<td class="style5" style="width: 197px">
		<select name="cboApprovalStatus" id="cboApprovalStatus" class="text-box">
		<option selected="" value="All">All</option>
		<option value="Pending">Pending</option>
		<option value="Approved">Approved</option>
		<option value="Rejected">Rejected</option>
		</select></td>
		</tr>
			<tr>
				<td class="style6" style="width: 196px">&nbsp;</td>
				<td class="style6" style="width: 196px">
				&nbsp;</td>
		<td class="style5" style="width: 197px">
		<input name="btnSubmit" type="button" value="submit" class="text-box" onclick="Javascript:Validate();"></td>
		<td class="style5" style="width: 197px">
		&nbsp;</td>
		<td class="style5" style="width: 197px">
		&nbsp;</td>
		<td class="style5" style="width: 197px">
		&nbsp;</td>
		</tr>
		</form>
	</table>
&nbsp;<table style="border-color:#000000; width: 100%" class="CSSTableGenerator">

	<tr>
		<td class="style3" style="width: 60px; text-align:center" bgcolor="#95C23D"><strong>Sr. No</strong></td>
		<td class="style3" style="width: 71px; text-align:center" bgcolor="#95C23D"><strong>Reg.#</strong></td>
		<td class="style3" style="width: 145px; text-align:center" bgcolor="#95C23D"><strong>
		Student Pic.</strong></td>
		<td class="style3" style="width: 145px; text-align:center" bgcolor="#95C23D">
		<strong>Birth Certificate</strong></td>
		<td class="style3" style="width: 145px; text-align:center" bgcolor="#95C23D"><strong>Name</strong></td>
		<td class="style3" style="width: 92px; text-align:center" bgcolor="#95C23D"><strong>D.O.B</strong></td>
		<td class="style3" style="width: 92px; text-align:center" bgcolor="#95C23D"><strong>Age</strong></td>
		<td class="style3" style="width: 92px; text-align:center" bgcolor="#95C23D"><strong>Gender</strong></td>
		<td class="style3" style="width: 92px; text-align:center" bgcolor="#95C23D"><strong>Class</strong></td>
		<td class="style3" style="width: 116px; text-align:center" bgcolor="#95C23D"><strong>Father&#39;s Name 
		/ Qual.</strong></td>
		<td class="style3" style="width: 102px; text-align:center" bgcolor="#95C23D"><strong>Contact No</strong></td>
		<td class="style3" style="width: 102px; text-align:center" bgcolor="#95C23D"><strong>Mother&#39;s Name 
		/ Qual.</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D"><strong>
		Address /Location /Distance </strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Location</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D"><strong>Father&#39;s Income</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Sibling Name /Adm. No / Class</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Father Alumni School / Class</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Mother Alumni School / Class</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Single Parent </strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Distance (25)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Sibling (20)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Father&#39;s Qualification (15)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Mother&#39;s Qualification (15)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Father Alumni (10)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Mother Alumni (10)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Girl Child (3)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Single Parent (2)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D">
		<strong>Total Score (100)</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D"><strong>
		L1 Remarks</strong></td>
		<td class="style3" style="width: 159px; text-align:center" bgcolor="#95C23D"><strong>Remarks</strong></td>
		<td class="style3" style="width: 89px; text-align:center" bgcolor="#95C23D"><strong>Approve</strong></td>
		<td class="style3" style="width: 93px; text-align:center" bgcolor="#95C23D"><strong>Reject</strong></td>
	</tr>
	<?php
				$cnt=1;
				
				while($row = mysql_fetch_row($rs))
				{
						$DistanceScore=0;
						$SiblingScore=0;
						$FatherQual=0;
						$MotherQual=0;
						$FatherAlumniScore=0;
						$MotherAlumniScore=0;
						$GirlChildScore=0;
						$SingleParentScore=0;
						$TotalScoreChild=0;
						$SiblingScore=0;
						
						
							$RegistrationNo=$row[0];
							$sname=$row[1];
							$DOB=$row[2];
							$Age=$row[3];
							$Sex=$row[4];
							$sclass=$row[5];
							$sfathername=$row[6];
							$FatherEducation=$row[7];
							$Status=$row[8];
							$Remarks=$row[9];
							$ContactNo=$row[10];
							$MotherName=$row[11];
							$Distance=$row[12];
							$FatherAnnualIncome=$row[13];
							$TxnStatus=$row[14];
							$SchoolId=$row[15];
							$ProfilePhoto=$row[17];
							
							$MotherEducation=$row[18];
							$Sibling=$row[19];
							
							$RealBroSisName=$row[20];
							$RealBroSisAdmissionNo=$row[21];
							$RealBroSisClass=$row[22];
							$Father_DPS_Alumni=$row[23];
							$Mother_DPS_Alumni=$row[24];
							$AlumniSchoolName=$row[25];
							$AlumniFatherPassingClass=$row[26];
							$AlumniMotherSchoolName=$row[27];
							$AlumniMotherPassingClass=$row[28];
							$Location=$row[29];
							$ResidentialAddress=$row[30];
							$Single_Parent=$row[31];
							$L1ApprovalStatus=$row[32];
							
							$L1Remarks=$row[33];
							$L2ApprovalStatus=$row[34];
							$L2Remarks=$row[35];
							$BirthCertificate=$row[36];

							
							
							if($Sibling=="Yes")
							{
								$SiblingScore=20;
							}
							$rsDistance=mysql_query("select `DistanceScore` from `NewStudentRegistrationDistanceMaster` where `Distance`='$Distance'");
							while($rowD = mysql_fetch_row($rsDistance))
							{
								$DistanceScore=$rowD[0];
								break;
							}
							
							$rsFatherQ=mysql_query("select `FatherScore` from `NewStudentRegistrationQualificationMaster` where `Qualification`='$FatherEducation'");
							while($rowFQ = mysql_fetch_row($rsFatherQ))
							{
								$FatherQual=$rowFQ[0];
								break;
							}
							$rsMotherQ=mysql_query("select `MotherScore` from `NewStudentRegistrationQualificationMaster` where `Qualification`='$MotherEducation'");
							while($rowFQ = mysql_fetch_row($rsMotherQ))
							{
								$MotherQual=$rowFQ[0];
								break;
							}
							$rsAlumniQ=mysql_query("select `Score` from `NewStudentRegistrationSchoolList` where `SchoolName`='$AlumniSchoolName' and `sclass`='$AlumniFatherPassingClass'");
							while($rowFA = mysql_fetch_row($rsAlumniQ))
							{
								$FatherAlumniScore=$rowFA[0];
								break;
							}
							$rsAlumniMQ=mysql_query("select `Score` from `NewStudentRegistrationSchoolList` where `SchoolName`='$AlumniMotherSchoolName' and `sclass`='$AlumniMotherPassingClass'");
							while($rowMA = mysql_fetch_row($rsAlumniMQ))
							{
								$MotherAlumniScore=$rowMA[0];
								break;
							}
							if($Sex=="Female")
							{
								$GirlChildScore=3;
							}
							if($Single_Parent=="Yes")
							{
								$SingleParentScore=2;
							}
							$TotalScoreChild=$SiblingScore+$DistanceScore+$FatherQual+$MotherQual+$FatherAlumniScore+$MotherAlumniScore+$GirlChildScore+$SingleParentScore;
							

							
				?>

	<tr>
		<td class="style4" style="width: 60px"><?php echo $cnt;?></td>
		<td class="style2" style="width: 71px"><a href="FilledRegistrationForm.php?RegNo=<?php echo $RegistrationNo;?>" target="_blank"><?php echo $RegistrationNo;?></td>
		<td class="style4" style="width: 145px"><a href="../../StudentRegistrationPhotos/<?php echo $ProfilePhoto;?>" target="_blank">Show Pic</a></td>
		<td class="style2" style="width: 145px"><a href="http://dpsfsis.com/StudentRegistrationPhotos/<?php echo $BirthCertificate;?>" target="_blank">Show Doc.</a></td>
		<td class="style2" style="width: 145px"><?php echo $sname;?></td>
		<td class="style2" style="width: 92px"><?php echo $DOB;?></td>
		<td class="style2" style="width: 92px"><?php echo $Age;?></td>
		<td class="style2" style="width: 92px"><?php echo $Sex;?><br><br><b>(<?php echo $GirlChildScore;?>)</b></td>
		<td class="style2" style="width: 92px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 116px"><?php echo $sfathername;?><br><?php echo $FatherEducation;?><br><br><b>(<?php echo $FatherQual;?>)</b></td>
		<td class="style2" style="width: 102px"><?php echo $ContactNo;?></td>
		<td class="style2" style="width: 102px"><?php echo $MotherName;?><br><?php echo $MotherEducation;?><br><br><b>(<?php echo $MotherQual;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $ResidentialAddress;?><br><?php echo $Distance;?><br><br><b>(<?php echo $DistanceScore;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $Location;?></td>
		<td class="style2" style="width: 159px"><?php echo $FatherAnnualIncome;?></td>
		<td class="style2" style="width: 159px"><?php echo $RealBroSisName;?><br><?php echo $RealBroSisAdmissionNo;?><br><?php echo $RealBroSisClass;?><br><br><b>(<?php echo $SiblingScore;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $AlumniSchoolName;?><br><?php echo $AlumniFatherPassingClass;?><br><br><b>(<?php echo $FatherAlumniScore;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $AlumniMotherSchoolName;?><br><?php echo $AlumniMotherPassingClass;?><br><br><b>(<?php echo $MotherAlumniScore;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $Single_Parent;?><br><br><b>(<?php echo $SingleParentScore;?>)</b></td>
		<td class="style2" style="width: 159px"><?php echo $DistanceScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $SiblingScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $FatherQual;?></td>
		<td class="style2" style="width: 159px"><?php echo $MotherQual;?></td>
		<td class="style2" style="width: 159px"><?php echo $FatherAlumniScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $MotherAlumniScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $GirlChildScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $SingleParentScore;?></td>
		<td class="style2" style="width: 159px"><?php echo $TotalScoreChild;?></td>
		<td class="style2" style="width: 159px"><?php echo $L1Remarks;?></td>
		<td class="style2" style="width: 159px">
		<textarea name="txtRemarks<?php echo $cnt;?>" id="txtRemarks<?php echo $cnt;?>" class="text-box" cols="17" rows="2" <?php if($L2ApprovalStatus=="Approved"){?> disabled="disabled" <?php } ?>><?php echo $L2Remarks;?></textarea></td>
		<td class="style4" style="width: 89px">
		<?php 
			if($L2ApprovalStatus=="Approved")
			{ 
				echo "Approved";
			}
			elseif($L2ApprovalStatus=="Pending" && $L1ApprovalStatus !="Pending")
			{
		?>
		<input name="btnApprove<?php echo $cnt;?>" id="btnApprove<?php echo $cnt;?>" type="button" value="Approve" onclick="Javascript:fnlApprove('<?php echo $cnt;?>','<?php echo $RegistrationNo;?>');">
		<?php
			}
		?>
		</td>
		<td class="style4" style="width: 93px">
		<?php
			if($L2ApprovalStatus=="Rejected")
			{
				echo "Rejected";
			}
			elseif($L2ApprovalStatus=="Pending" && $L1ApprovalStatus !="Pending")
			{
		?>
		<input name="btnReject<?php echo $cnt;?>" id="btnReject<?php echo $cnt;?>" type="button" value="Reject" onclick="Javascript:fnlReject('<?php echo $cnt;?>','<?php echo $RegistrationNo;?>');">
		<?php
			}
		?>
		</td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}
	?>
</table>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>

</body>

</html>