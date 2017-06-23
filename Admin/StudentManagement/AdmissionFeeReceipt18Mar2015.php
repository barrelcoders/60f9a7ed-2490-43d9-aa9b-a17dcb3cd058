<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php
		     $extension = end(explode(".", $_FILES["file"]["name"]));

		      move_uploaded_file($_FILES["file"]["tmp_name"],"StudentPhotos/" . $_FILES["file"]["name"]);

		//commented on 8-Mar-2015
		/*
		$ssqlRegi="SELECT max(CAST(x.`sadmission` AS SIGNED INTEGER))+1 FROM ";
		$ssqlRegi= $ssqlRegi . "(";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `Almuni`";
		$ssqlRegi= $ssqlRegi . " union ";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `NewStudentAdmission`";
		$ssqlRegi= $ssqlRegi . " union ";
		$ssqlRegi= $ssqlRegi . "SELECT distinct `sadmission` FROM `student_master`";
		$ssqlRegi= $ssqlRegi . ") as `x`";
		$rsRegiNo= mysql_query($ssqlRegi);
		while($row2 = mysql_fetch_row($rsRegiNo))
		{
			$NewRistrationNo=$row2[0];
		}
		*/
		
		$Admission=$NewRistrationNo;
		
		$Admission=$_REQUEST["txtRegNo"];
		
		$RegNo=$_REQUEST["txtRegNo"];	
		$FYear=$_REQUEST["cboFinancialYear"];
		$Quarter=$_REQUEST["cboQuarter"];
		$Name = $_REQUEST["txtName"];
		
		$Dt = $_REQUEST["txtDOB"];
		$arr=explode('/',$Dt);
		$DOB = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		
		//$DOB=$_REQUEST["txtDOB"];
		$Dt = $_REQUEST["txtDate"];
		$arr=explode('/',$Dt);
		$AdmissionDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		
		
		$Sex=$_REQUEST["txtSex"];
		$Category=$_REQUEST["cboCategory"];
		$Nationality=$_REQUEST["txtNationality"];
		$Class=$_REQUEST["cboClass"];
		$DiscountType1=$_REQUEST["cboDiscountType"];
		$RollNo=$_REQUEST["txtRollNo"];
		$LastSchool = str_replace("'","",$_REQUEST["txtLastSchool"]);
		$Father=$_REQUEST["txtFatherName"];
		$FatherEducation=$_REQUEST["txtFatherEducation"];
		$FatherOccupation=$_REQUEST["txtFatherOccupation"];
		$MotherName=$_REQUEST["txtMotherName"];
		$MotherEducation=$_REQUEST["txtMotherEducation"];
		$Address=str_replace("'","",$_REQUEST["txtAddress"]);
		$MobileNo=$_REQUEST["txtMobile"];
		$AlternatMobileNo = $_REQUEST["txtAltMobile"];
		$Imei=$_REQUEST["txtImei"];
		$UserId=$Admission;
		//$UserId=$_REQUEST["txtUserId"];
		
		$Password=$Admission;
		//$Password=$_REQUEST["txtPassword"];
		
		$email=$_REQUEST["txtEmail"];
		$Route=$_REQUEST["cboRoute"];
		
		$ProfilePic = $_FILES["file"]["name"];
		
		$PlaceOfBirth=$_REQUEST["txtPlaceOfBirth"];
		$Age=$_REQUEST["txtAge"];
		$MotherTongue=$_REQUEST["txtMotherTounge"];
		$ResidentialAddress=$_REQUEST["txtCorrespondenceAddress"];
		$PermanentAddress=$_REQUEST["txtPermanentAddress"];
		//$PhoneNo=$_REQUEST["cboRoute"];
		
		$sfatherage=$_REQUEST["txtFatherAge"];
		$FatherDesignation=$_REQUEST["txtFatherDesignation"];
		$FatherAnnualIncome=$_REQUEST["txtFatherAnnualIncome"];
		$FatherCompanyName=$_REQUEST["txtFatherCompanyName"];
		$FatherOfficeAddress=$_REQUEST["txtFatherOfficialAddress"];
		$FatherOfficePhoneNo=$_REQUEST["txtFatherOfficialPhNo"];
		
		$MotherAge=$_REQUEST["txtMotherAge"];
		$MotherOccupatoin=$_REQUEST["txtMotherOccupation"];
		$MotherDesignation=$_REQUEST["txtMotherDesignation"];
		$MontherAnnualIncome=$_REQUEST["txtMotherAnnualIncome"];
		$MotherCompanyName=$_REQUEST["txtMotherCompanyName"];
		$MotherOfficeAddress=$_REQUEST["txtMotherOfficialAddress"];
		$MotherOfficePhone=$_REQUEST["txtMotherOfficialPhNo"];
		$GeneralInformation=$_REQUEST["txtGeneralInformation"];
		$ContributionArea=$_REQUEST["txtContributionArea"];
		$StudentWeeknessStrength=$_REQUEST["txtStudentWeaknessStrength"];
		$SpecialAttentionDetail=$_REQUEST["txtStudentSpecialAttentionDetail"];
		$StudetnPreviousHistory=$_REQUEST["txtStudentPreviousDetail"];
		$RealBroSisName=$_REQUEST["txtRealBroSisName"];
		$RealBroSisSchool=$_REQUEST["txtRealBroSisSchoolName"];
		$RealBroSisClass=$_REQUEST["txtRealBroSisClass"];
	

		$AdmissionFeeAmt = $_REQUEST["txtAdmissionFees"];
		$AnnualFeeAmt = $_REQUEST["txtSecurityFeesAmount"];		
		$AdmissionDiscountType=$_REQUEST["cboAdmissionDiscountType"];
		$AnnualFeeDiscountType = $_REQUEST["cboAnnualFeeDiscountType"];
		$ModeOfPayment=$_REQUEST["cboPaymentMode"];
		$chequeno=$_REQUEST["txtChequeNo"];
		$bankname=$_REQUEST["cboBank"];
		
		$currentdate=date("Y-m-d");
		$currentdate1=date("d-m-Y");
		
		if ($_REQUEST["txtAdmissionFeesDiscount"] =="")
		{
			$AdmissionDiscountFee=0;
		}
		else
		{
			$AdmissionDiscountFee=$_REQUEST["txtAdmissionFeesDiscount"];
		}
		if ($_REQUEST["txtAnnualFeeDiscount"]=="")
		{
			$AnnualFeeDiscount=0;
		}
		else
		{
			$AnnualFeeDiscount=$_REQUEST["txtAnnualFeeDiscount"];
		}
		
		if ($_REQUEST["txtTotalDiscount"] == "")
		{
			$TotalDiscountFee = 0;
		}
		else
		{
			$TotalDiscountFee  = $_REQUEST["txtTotalDiscount"];
		}

		

		$TotalAdmissionFee=$AdmissionFeeAmt;
		
		$TotalFeePayable = $_REQUEST["txtTotal"];
		$TotalFeePaid = $_REQUEST["txtTotalAmtPaying"];
		if ($_REQUEST["txtBalance"]=="")
		{
			$TotalBalanceAmt=0;
		}
		else
		{
			$TotalBalanceAmt= $_REQUEST["txtBalance"];
		}
		
		
		if ($AnnualFeeAmt !="")

		{$TotalAdmissionFee=$TotalAdmissionFee + $AnnualFeeAmt;}

		

		if ($AdmissionDiscountFee !="")

		{$TotalAdmissionFee=$TotalAdmissionFee - $AdmissionDiscountFee;}

		$sqlCheck = "SELECT * FROM `student_master` where  `sclass`='$Class' and `srollno`='$RollNo'";

		$result1 = mysql_query($sqlCheck,$Con);

		if (mysql_num_rows($result1) > 0)
		{
			echo "<br><br><center><b>Roll No.:" . $RollNo . " already exists !<br>Please click <a href='StudentRegistration.php'>here</a> to go back";
			exit();
		}

		
		$sql="select `MasterClass` from `class_master`  where `class`='$Class'";
		$rsMasterClass = mysql_query($sql,$Con);
		while($row = mysql_fetch_row($rsMasterClass))
		{
			$MasterClass=$row[0];
			break;
		}
		
		$sql = "SELECT `srno` , `sname` , `DOB` , `Sex` , `Category`, `Nationality`, `sadmission` ,`sclass`,`srollno`,`LastSchool`, `sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`, `smobile`,`simei`,`suser`,`spassword`,`email` FROM `NewStudentAdmission` where  `sadmission`='$Admission'";
		$result = mysql_query($sql,$Con);



		$sqlRcpt = "SELECT MAX(`srno`) +1 FROM  `AdmissionFees`";

		$rsRcpt = mysql_query($sqlRcpt);

		while($row = mysql_fetch_row($rsRcpt))

				{

					$newsrno=$row[0];

					$NewReciptNo="AF" . $newsrno;
					//$NewReciptNo = $newsrno;

				}

		$PDFFileName=$NewReciptNo . ".pdf";
		

		if (mysql_num_rows($result)==0)
		{

			$RollNo="To be alloted";
			
			$ssql="INSERT INTO `NewStudentAdmission` (`RegistrationNo`,`sname` , `DOB`, `Sex`, `Category`, `Nationality`,`sadmission`,`AdmissionDate`,`sclass`,`MasterClass`,`srollno`,`LastSchool`, `sfathername`,`FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`,`smobile`,`AlternateMobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`ProfilePhoto`,`FinancialYear`,`PlaceOfBirth`,`Age`,`MotherTongue`,`ResidentialAddress`,`PermanentAddress`,`sfatherage`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherAge`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`GeneralInformation`,`ContributionArea`,`StudentWeeknessStrength`,`SpecialAttentionDetail`,`StudetnPreviousHistory`,`RealBroSisName`,`RealBroSisSchool`,`RealBroSisClass`,`DiscontType`) VALUES('$RegNo','$Name','$DOB','$Sex','$Category','$Nationality','$Admission','$AdmissionDate','$Class','$MasterClass','$RollNo','$LastSchool','$Father','$FatherEducation','$FatherOccupation','$MotherName','$MotherEducation','$MobileNo','$AlternatMobileNo','$Imei','$UserId','$Password','$email','$Route','$ProfilePic','$FYear','$PlaceOfBirth','$Age','$MotherTongue','$ResidentialAddress','$PermanentAddress','$sfatherage','$FatherDesignation','$FatherAnnualIncome','$FatherCompanyName','$FatherOfficeAddress','$FatherOfficePhoneNo','$MotherAge','$MotherOccupatoin','$MotherDesignation','$MontherAnnualIncome','$MotherCompanyName','$MotherOfficeAddress','$MotherOfficePhone','$GeneralInformation','$ContributionArea','$StudentWeeknessStrength','$SpecialAttentionDetail','$StudetnPreviousHistory','$RealBroSisName','$RealBroSisSchool','$RealBroSisClass','$DiscountType1')";

			mysql_query($ssql) or die(mysql_error());



			//$ssql1="INSERT INTO `user_master` (`sname`,`sadmission`,`sclass`,`srollno`,`sfathername`,`smobile`,`simei`,`suser`,`spassword`,`email`,`FinancialYear`) values ('$Name','$Admission','$Class','$RollNo','$Father','$MobileNo','$Imei','$UserId','$Password','$email','$FYear')";

			//mysql_query($ssql1) or die(mysql_error());

			

			//$ssql1="INSERT INTO `AdmissionFees` (`sadmission`,`sname`,`sclass`,`srollno`,`amountpaid`,`AnnualAmtPaid`,`AdmissionFeeDiscType`,`AdmissionFeeDiscount`,`AnnualFeeDiscType`,`AnnualFeeDiscount`,`TotalDiscount`,`TotalAmtPayable`,`TotalAmoutPaid`,`BalanceAmt`,`FinancialYear`,`receipt`,`status`,`EntryDate`,`quarter`,`ReceiptFileName`,`ModeOfPayment`,`chequeno`,`bankname`) values ('$Admission','$Name','$Class','$RollNo','$AdmissionFeeAmt','$AnnualFeeAmt','$AdmissionDiscountType','$AdmissionDiscountFee','$AnnualFeeDiscountType','$AnnualFeeDiscount','$TotalDiscountFee','$TotalFeePayable','$TotalFeePaid','$TotalBalanceAmt','$FYear','$NewReciptNo','PAID','$currentdate','$Quarter','$PDFFileName','$ModeOfPayment','$chequeno','$bankname')";

			//mysql_query($ssql1) or die(mysql_error());

						

			$Message1="<br><br><center><b>Student Registration successfully completed!<br>Click <a href='Fees/AdmissionFeesPayment.php'>here </a> to submit admission fee.";



		}

		else

		{

			$Message1="<br><br><center><b>Admission No:" . $Admission . " already exists!" ;
			echo $Message1;
			exit();
		}

		//echo $Message1;

//}

?>



<?php
$rsFy = mysql_query("select `year` from `FYmaster` where `Status`='Active'", $Con);
while($row = mysql_fetch_row($rsFy))
{
$CurrentFinancialYear=$row[0];
break;
}
	
	$SelectClass=$_REQUEST["Class"];
	$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,'' as `Caste`,`MasterClass`,`DiscontType`,`MotherName`,`ResidentialAddress` as `Address`,`smobile`,`routeno`,`FinancialYear` FROM `NewStudentAdmission` as `a` where `sadmission`='$Admission'";
   	
   	$rs = mysql_query($sql, $Con);
   	$currentdate=date("Y-m-d");
   							
?>
<?php
$sstr1='<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>School Name</title>
</head>

<body>';
//echo $sstr1;

$DiscountTotal4Student=0;
$StudentType="";
while($row1 = mysql_fetch_row($rs))
{
					$sadmission=$row1[0];
					$sname=$row1[1];
					$sclass=$row1[2];
					$srollno=$row1[3];
					$sfathername=$row1[4];
					$DiscontType=$row1[5];
					$Caste=$row1[6];
					$MasterClass=$row1[7];
					$StudentDiscountType=$row1[8];
					$MotherName=$row1[9];
					$Address=$row1[10];
					$Mobile=$row1[11];
					$RouteNo=$row1[12];
					$FinancialYear=$row1[13];
					if($FinancialYear<$CurrentFinancialYear)
					{
						$StudentType="OldStudent";
					}
					else
					{
						$StudentType="NewStudent";
					}
					
					
					$ChallanNo="JPS/Q1/".$CurrentFinancialYear."/".$sadmission;
					$ChallanNoQ2="JPS/Q2/".$CurrentFinancialYear."/".$sadmission;
					$ChallanNoQ3="JPS/Q3/".$CurrentFinancialYear."/".$sadmission;
					$ChallanNoQ4="JPS/Q4/".$CurrentFinancialYear."/".$sadmission;
					
					
					//if ($sclass=="PRE-NURSERY" || $sclass=="LKG" || $sclass=="UKG")
					if ($MasterClass=="PRE-NURSERY" || $MasterClass=="LKG" || $MasterClass=="UKG")
					{
						$SchoolNM=$SchoolName1." ".$SchoolName2 ;
						$SchoolAC=$Account2;
					}
					else
					{
						$SchoolNM=$SchoolName ;
						$SchoolAC=$Account1;
					}

///COVER PAGE***********
$sstr='<table style="width: 100%;border-collapse: collapse;">
	<tr>
		<td>
				<div style="border-style:solid; border-width:2px; width: 1268px; height: 809px; left: 10px; top: 15px; padding-left:4px; padding-right:4px; padding-top:1px;" id="layer1" align="center">

<font face="Cambria"></font>
<p>&nbsp;</p>
<p><img src ="../images/logo.png" height="122" width="595"><br><font face="Cambria" style="font-size: 12pt">'.$SchoolAddress.'</p>
<p><font face="Cambria" style="font-size: 20pt; font-weight: 700">HDFC BANK</font></p>
<p>Opp JPS, Circular Road, Rewari</p>
<p><span style="font-weight: 700">
<font face="Cambria" style="font-size: 14pt; text-decoration:underline">
Academic Session 2015 - 2016</font></span></p>
<p>&nbsp;</p>
<p><span style="font-weight: 700"><font face="Cambria" style="font-size: 14pt">
FEE CHALLAN BOOKLET</font></span></p>
<p>&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-width: 0px" height="48%">
	<tr>
		<td style="border-style: none; border-width: medium" height="29">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Student Name :&nbsp;'.$sname.' 
			</font>
		</blockquote>
		</td>
		<td style="border-style: none; border-width: medium" height="29">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Admission No :&nbsp;'.$sadmission.' 
			</font>
		</blockquote>
		</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" height="34">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Father\'s Name :&nbsp;'.$sfathername.'
			</font>
		</blockquote>
		</td>
		<td style="border-style: none; border-width: medium" height="34">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Mother\'s Name :&nbsp;'.$MotherName.'
			</font>
		</blockquote>
		</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" height="33">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Class :&nbsp;'.$sclass.'
			</font>
		</blockquote>
		</td>
		<td style="border-style: none; border-width: medium" height="33">
		<blockquote>
		</blockquote>
		</td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium" height="31">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Address : '.$Address.'
			</font>
		</blockquote>
		</td>
		<td style="border-style: none; border-width: medium" height="31">
		<blockquote>
			<font face="Cambria" style="font-size: 14pt; font-weight:700">Phone No : '.$Mobile.'
			</font>
		</blockquote>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="border-style: none; border-width: medium">
		<blockquote>
			<p>&nbsp;</p>
			<p><b><font face="Cambria" style="font-size: 14pt">Bank Timing : Mon 
			to Fri : 
		10:00 AM T0 02:00 PM</font></b></p>
			<p><b><font face="Cambria" style="font-size: 14pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Saturday : 10:00 AM 
		To 12:00 Noon</font></b></p>
			<p>&nbsp;</p>
		</blockquote>
		</td>
	</tr>
</table>

</div>

				
		</td>
	</tr>
</table>
<p style="page-break-before: always">';

///END OF COVER PAGE

//START OF DETAIL ABOUT STUDENT OF Q1
$sstr=$sstr.'<table style="width: 100%" style="border-collapse: collapse;border: 1px solid #000000;" class="style1">';
$sstr=$sstr.'<td style="border-style: solid;border-width: 1px; width: 179px;">';
//$sstr=$sstr.'<p align="left"><b><font face="Cambria" style="font-size: 12pt">Parent Copy</font></b>';
$sstr=$sstr.'<div style="width: 358px;left: 10px;" id="layer1">
	<p align="left"><b><font face="Cambria" style="font-size: 12pt">Parent Copy</font></b>
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNo.'</font>
	<br><font face="Cambria">Fees for Quarter : Q1 (Apr-May-Jun)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;</b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Apr-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Apr-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q1' and `class`='$MasterClass' and `amount` !=0";
		$rsQ1 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ1))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				if ($feeshead=="ADMISSION FEES")
				{
					if ($StudentType="NewStudent" || $SelectClass="11")
					{
						$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
						mysql_query($ssql) or die(mysql_error());
						$GrandTotal=$GrandTotal+$amount;
					}
				}
				else
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}	
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 179px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">Bank Copy</font></b>
<div style="width: 358px;left: 758px;" id="layer3">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNo.'</font>
	<br><font face="Cambria">Fees for Quarter : Q1 (Apr-May-Jun)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;</b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Apr-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Apr-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q1' and `class`='$MasterClass' and `amount` !=0";
		$rsQ2 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ2))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				if ($feeshead=="ADMISSION FEES")
				{
					if ($StudentType="NewStudent" || $SelectClass="11")
					{
						$GrandTotal=$GrandTotal+$amount;
					}
				}
				else
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			if ($feeshead=="CONVEYANCE")
			{				
				if($RouteNo !="")
				{
?>

<?php
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
			</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 180px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">School Copy</font></b>
<div style="width: 358px;left: 383px;" id="layer2">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNo.'</font>
	<br><font face="Cambria">Fees for Quarter : Q1 (Apr-May-Jun)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;</b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Apr-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Apr-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q1' and `class`='$MasterClass' and `amount` !=0";
		$rsQ3 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ3))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				if ($feeshead=="ADMISSION FEES")
				{
					if ($StudentType="NewStudent" || $SelectClass="11")
					{
						$GrandTotal=$GrandTotal+$amount;
					}
				}
				else
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
</tr>
';

$sstr=$sstr.'</table><p style="page-break-before: always">';
//echo $sstr;
$sstr=str_replace("'","''",$sstr);
$ssql="INSERT INTO `fees_challan` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`challandate`,`challanhtmlcode`,`challan_amount`,`empid`,`EntryDate`) VALUES ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$currentdate','$sstr','$GrandTotal','','$currentdate')";
mysql_query($ssql) or die(mysql_error());

/////////////End of Quarter Q1///////////////////////
/////////////Start of Quarter Q2////////////////////

$sstr='<table style="width: 100%" style="border-collapse: collapse;border: 1px solid #000000;" class="style1">';
$sstr=$sstr.'<td style="border-style: solid;border-width: 1px; width: 179px;">';
$sstr=$sstr.'<p align="left"><b><font face="Cambria" style="font-size: 12pt">Parent Copy</font></b>';
$sstr=$sstr.'<div style="width: 358px;left: 10px;" id="layer1">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ2.'</font>
	<br><font face="Cambria">Fees for Quarter : Q2 (Jul-Aug-Sep)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-July-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-July-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q2' and `class`='$MasterClass' and `amount` !=0";
		$rsQ1 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ1))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q2','$CurrentFinancialYear','$ChallanNoQ2','$feeshead','$amount','$currentdate','','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q2','$CurrentFinancialYear','$ChallanNoQ2','$feeshead','$amount','$currentdate','','$currentdate')";
				mysql_query($ssql) or die(mysql_error());
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 179px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">Bank Copy</font></b>
<div style="width: 358px;left: 758px;" id="layer3">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ2.'</font>
	<br><font face="Cambria">Fees for Quarter : Q2 (Jul-Aug-Sep)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-July-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-July-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q2' and `class`='$MasterClass' and `amount` !=0";
		$rsQ2 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ2))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 180px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">School Copy</font></b>
<div style="width: 358px;left: 383px;" id="layer2">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ2.'</font>
	<br><font face="Cambria">Fees for Quarter : Q2 (Jul-Aug-Sep)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-July-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-July-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q2' and `class`='$MasterClass' and `amount` !=0";
		$rsQ3 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ3))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>			
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>			
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
</tr>
';

$sstr=$sstr.'</table><p style="page-break-before: always">';
//echo $sstr;
$sstr=str_replace("'","''",$sstr);
$ssql="INSERT INTO `fees_challan` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`challandate`,`challanhtmlcode`,`challan_amount`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q2','$CurrentFinancialYear','$ChallanNoQ2','$currentdate','$sstr','$GrandTotal','','$currentdate')";
mysql_query($ssql) or die(mysql_error());
/////End of Quarter Q2**************
/////////////Start of Quarter Q3////////////////////

$sstr='<table style="width: 100%" style="border-collapse: collapse;border: 1px solid #000000;" class="style1">';
$sstr=$sstr.'<td style="border-style: solid;border-width: 1px; width: 179px;">';
$sstr=$sstr.'<p align="left"><b><font face="Cambria" style="font-size: 12pt">Parent Copy</font></b>';
$sstr=$sstr.'<div style="width: 358px;left: 10px;" id="layer1">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ3.'</font>
	<br><font face="Cambria">Fees for Quarter : Q3 (Oct-Nov-Dec)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp;</b> </font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Oct-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Oct-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q3' and `class`='$MasterClass' and `amount` !=0";
		$rsQ1 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ1))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q3','$CurrentFinancialYear','$ChallanNoQ3','$feeshead','$amount','$currentdate','','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q3','$CurrentFinancialYear','$ChallanNoQ3','$feeshead','$amount','$currentdate','','$currentdate')";
				mysql_query($ssql) or die(mysql_error());
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 179px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">Bank Copy</font></b>
<div style="width: 358px;left: 758px;" id="layer3">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ3.'</font>
	<br><font face="Cambria">Fees for Quarter : Q3 (Oct-Nov-Dec)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Oct-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Oct-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q3' and `class`='$MasterClass' and `amount` !=0";
		$rsQ2 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ2))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 180px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">School Copy</font></b>
<div style="width: 358px;left: 383px;" id="layer2">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ3.'</font>
	<br><font face="Cambria">Fees for Quarter : Q3 (Oct-Nov-Dec)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Oct-2015</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Oct-2015</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q3' and `class`='$MasterClass' and `amount` !=0";
		$rsQ3 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ3))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
</tr>
';

$sstr=$sstr.'</table><p style="page-break-before: always">';
//echo $sstr;
$sstr=str_replace("'","''",$sstr);
$ssql="INSERT INTO `fees_challan` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`challandate`,`challanhtmlcode`,`challan_amount`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q3','$CurrentFinancialYear','$ChallanNoQ3','$currentdate','$sstr','$GrandTotal','','$currentdate')";
mysql_query($ssql) or die(mysql_error());
/////End of Quarter Q3**************
/////////////Start of Quarter Q4////////////////////

$sstr='<table style="width: 100%" style="border-collapse: collapse;border: 1px solid #000000;" class="style1">';
$sstr=$sstr.'<td style="border-style: solid;border-width: 1px; width: 179px;">';
$sstr=$sstr.'<p align="left"><b><font face="Cambria" style="font-size: 12pt">Parent Copy</font></b>';
$sstr=$sstr.'<div style="width: 358px;left: 10px;" id="layer1">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ4.'</font>
	<br><font face="Cambria">Fees for Quarter : Q4 (Jan-Feb-Mar)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp;</b> </font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Jan-2016</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Jan-2016</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q4' and `class`='$MasterClass' and `amount` !=0";
		$rsQ1 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ1))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q4','$CurrentFinancialYear','$ChallanNoQ4','$feeshead','$amount','$currentdate','','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q4','$CurrentFinancialYear','$ChallanNoQ4','$feeshead','$amount','$currentdate','','$currentdate')";
				mysql_query($ssql) or die(mysql_error());
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 179px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">Bank Copy</font></b>
<div style="width: 358px;left: 758px;" id="layer3">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ4.'</font>
	<br><font face="Cambria">Fees for Quarter : Q4 (Jan-Feb-Mar)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Jan-2016</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Jan-2016</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q4' and `class`='$MasterClass' and `amount` !=0";
		$rsQ2 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ2))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
<td style="width: 15px;">&nbsp;</td>
<td style="border-style: solid;border-width: 1px; width: 180px;" valign="top">
<p align="left"><b><font face="Cambria" style="font-size: 12pt">School Copy</font></b>
<div style="width: 358px;left: 383px;" id="layer2">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt">HDFC BANK</font></b>
	<br><font face="Cambria">Circular Road, Rewari - 123401</font></p>
	<p align="left"><font face="Cambria"><b>Session 2015-16</b></font>
	<br><font face="Cambria">Challan No. '.$ChallanNoQ4.'</font>
	<br><font face="Cambria">Fees for Quarter : Q4 (Jan-Feb-Mar)</font>
	<br><font face="Cambria">Credit to '.$SchoolNM.' A/c <b>'.$SchoolAC.'</b></font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No.'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;&nbsp;&nbsp; </b></font>
	<br><font face="Cambria">Father\'s Name : '.$sfathername.'</font>
	<br><font face="Cambria">Last Date of Fees Deposit in Bank : 20-Jan-2016</font>
	<br><font face="Cambria">Last Date of Fees Deposit By Cheque : 17-Jan-2016</font> </p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Fees Head</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">Amount</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q4' and `class`='$MasterClass' and `amount` !=0";
		$rsQ3 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ3))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						//$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				$GrandTotal=$GrandTotal+$amount;
			}
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>

<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Late Fees Fine @ Rs 5/- Per Day</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">&nbsp;</td>
		</tr>
		<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">GRAND TOTAL</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">'."".'</td>
		</tr>
	</table>
	<p><font face="Cambria">Cheque No. ................... Bank Name...................... <br>Subject to realization</font><p>
	<font face="Cambria">Pl. Deposit by A/c Payee Cheque</font><p>
	<font face="Cambria">Date of Deposit : ....../....../......</font><p>
	<font face="Cambria">Signature of Depositor ............</font>
	<!--<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose.</font><p align="left">
	<font face="Cambria">Affiliated to CBSE vide Aff. No. 530144</font><p align="left">
	<font face="Cambria">School No. 4172</font>-->
</div>
</td>
</tr>
';

$sstr=$sstr.'</table><p style="page-break-before: always">';
//BACK PAGE************
$sstr=$sstr.'<table style="width: 100%;height: 100%;border-collapse: collapse;">
	<tr>
		<td style="height: 100%;">
		<div style="border-style:solid; border-width:2px; width: 1321px; height: 100%; left: 10px; top: 15px; padding-left:4px; padding-right:4px; padding-top:1px;" id="layer1" align="center">
<p><br><font face="Cambria" style="font-size: 18pt"><b>'.$SchoolName.'</b><br><br><font face="Cambria" style="font-size: 14pt">'.$SchoolAddress.'</font></p>
<font face="Cambria" style="font-size: 14pt">
<p align="left"><b>Instructions:</font></b></p>
<font face="Cambria" style="font-size: 12pt"><p align="left">1. The parents / Guardians shall deposit Tri - monthly fees (3 
months\' fee) in HDFC Bank, Rewari. For this purpose they will be issued a fee 
booklet containing 4 counter foils (for 12 months) for session 2015 - 16</p>
<p align="left">2. Parents / Guardians should fill up the counter foil and 
deposit the fees <u>in the bank in accordance</u> with the schedule printed on 
the fee booklet</p>
<p align="left">3. The fees become due / payable after 20th of the month and 
after that the fees will be collected along with a late fees fine of Rs 5/- per 
day. In case 20th being Sunday or Holiday, the fees would be accepted by bank 
next day</p>
<p align="left">4. The bank has been instructed to accept the fees by cash / by 
cheque (only local cheques will be accepted up to 17th of the month). However it 
would be advisable for the parents to deposit the fees by A/C payee cheque in 
advance favoring &quot;<b>Jain Public School, Rewari&quot;</b>. </p>
<p align="left">5. Kindly ensure that the cheque so presented does not bounce on lack of funds as it amounts to criminal 
offences. Besides, there would be additional charge of Rs. 100/- + ST levied by 
the Bank</p>
<p align="left">6. Entries on the fee bills: For depositing the fees of the 
Quarter, parents/ guardians should make correct entries on all 3 counter foils 
of the fee booklet before presenting the same to the bank</font></div>
		</td>
	</tr>
</table><p style="page-break-before: always">';

///////////////////////*********
//echo $sstr;
$sstr=str_replace("'","''",$sstr);
$ssql="INSERT INTO `fees_challan` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`challandate`,`challanhtmlcode`,`challan_amount`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q4','$CurrentFinancialYear','$ChallanNoQ4','$currentdate','$sstr','$GrandTotal','','$currentdate')";
mysql_query($ssql) or die(mysql_error());
/////End of Quarter Q4**************


//$sstr="";
} // End of While loop for Student Detai
//$sstr=$sstr.'</table>';

$sstr1='</body>';

$sstr1=$sstr1.'</html>';

echo "<br><br><center><b>Admission process for admission no ".$sadmission." has been completed successfully!<br><br>Click <a href='../Fees/DisplayStudentWiseChallan.php?sadmission=".$sadmission."' target='_blank'>here</a> to print challan!<br><br>";
?>
<?php
///////////////////////////////////Admission Receipt Printing************************
?>
<?php
$sstr='<table style="width: 60%" style="border-collapse: collapse;border: 1px solid #000000;" class="style1">';
$sstr=$sstr.'<tr><td style="border-style: solid;border-width: 1px; width: 100%;">';
$sstr=$sstr.'<div style="width: 100%;left: 10px;" id="MasterDiv">
	<p align="center"><b><font face="Cambria" style="font-size: 14pt"><img src="../images/logo.png" width="200" height="80"></font></b>
	<br><font face="Cambria">'.$SchoolAddress.'<br><b>Phone No :</b>'.$SchoolPhoneNo.'</font><br><b>Admission Fee Receipt</b></p>
	<p align="left"><font face="Cambria">Date:'.$currentdate1.'</font><br><font face="Cambria">Session 2015-16</font>- <font face="Cambria">Q1 (Apr-May-Jun)<br>Receipt No. &nbsp; '.$ChallanNo.'</font>
	<br><font face="Cambria" style="font-size: 13pt"><b>Adm. No. &nbsp;'.$sadmission.'&nbsp; Name:'.$sname.'&nbsp; Class:'.$sclass.'&nbsp;</b></font>
	<br><font face="Cambria"><b>Father\'s Name : '.$sfathername.'</b></font>
	</p>
	<table border="1" width="80%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px;" align="center">
		<tr>
			<td width="70%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">PARTICULARS</font></td>
			<td width="30%" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium">
			<font face="Cambria">AMOUNT</font></td>
		</tr>';
?>
<?php
		$sql="select `feeshead`,`amount` from `fees_master` where `quarter`='Q1' and `class`='$MasterClass' and `amount` !=0";
		$rsQ1 = mysql_query($sql, $Con);
		$GrandTotal=0;
		while($row2 = mysql_fetch_row($rsQ1))
		{
			$feeshead=$row2[0];
			$amount=$row2[1];
			
			$rsDiscount=mysql_query("select `percentage`,`FixAmount` from `discounttable` where `discounttype`='$StudentDiscountType' and `head`='$feeshead'", $Con);
			if(mysql_num_rows($rsDiscount)>0)
			{
				while($rowDis = mysql_fetch_row($rsDiscount))
				{
					$DiscountPercent=$rowDis[0];
					$DiscountAmt=$rowDis[1];
					if($DiscountPercent !=0 & $DiscountPercent !="")
					{
						$HeadDiscount=($amount * $DiscountPercent)/100;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
					if($DiscountAmt !=0 & $DiscountAmt !="")
					{
						$HeadDiscount=$DiscountAmt;
						$amount=$amount-$HeadDiscount;
						$DiscountTotal4Student=$DiscountTotal4Student+$HeadDiscount;
					}
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
					//mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			else
			{
				if ($feeshead=="ADMISSION FEES")
				{
					if ($StudentType="NewStudent" || $SelectClass="11")
					{
						$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
						//mysql_query($ssql) or die(mysql_error());
						$GrandTotal=$GrandTotal+$amount;
					}
				}
				else
				{
					$ssql="INSERT INTO `fees_challan_detail` (`sadmission`,`sname`,`class`,`rollno`,`sfathername`,`quarter`,`financialyear`,`challanno`,`fee_head_name`,`head_amount`,`challandate`,`empid`,`EntryDate`) values ('$sadmission','$sname','$sclass','$srollno','$sfathername','Q1','$CurrentFinancialYear','$ChallanNo','$feeshead','$amount','$currentdate','','$currentdate')";
					//mysql_query($ssql) or die(mysql_error());
					$GrandTotal=$GrandTotal+$amount;
				}
			}
			
			if ($feeshead=="CONVEYANCE")
			{
				if($RouteNo !="")
				{
?>
<?php
		$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px" align="left">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
				}
			}
			else
			{
			$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">'.$feeshead.'</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$amount.'</td>
		</tr>';
			}
		}	
$sstr=$sstr.'<tr>
			<td width="70%" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">TOTAL AMOUNT</font></td>
			<td width="30%" style="border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium" align="right">'.$GrandTotal.'</td>
		</tr>				
	</table>
	<p align="center">
	<font face="Cambria"><u><b>Certificate </b></u></font>
	<p align="left"><font face="Cambria">Valid for Income Tax Purpose U/S 80C as 
	applicable and Reimbursement purpose. </font>
	<p align="left"><font face="Cambria">Affiliated to CBSE vide Aff. No. 530144 School No. 4172</font>
	<p align="right"><b>Accountant</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</td>
</tr>
';
$sstr=$sstr.'</table><p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT RECEIPT</a></font><p style="page-break-before: always">';
echo $sstr;
$sstr=str_replace("'","''",$sstr);
if($sadmission != "")
{
$ssql="INSERT INTO `AdmissionFees` (`sadmission`,`sname`,`sclass`,`amountpaid`,`quarter`,`FinancialYear`,`receipt`,`EntryDate`,`FeeReceiptCode`) values ('$sadmission','$sname','$sclass','$GrandTotal','Q1','2015','$ChallanNo','$currentdate','$sstr')";
mysql_query($ssql) or die(mysql_error());
}
?>

<?php
////////////////////////////*I-CARD********************

//$sstr='<br><div style="width: 268px; height: 349px; left: 25px; top: 16px" id="divICard">
//<table border="1" width="268px" height="361" cellspacing="0" cellpadding="2" style="border-collapse: collapse">

$sstr='<br><div style="width: 268px; height: 290px; left: 25px; top: 16px" id="divICard">
	<table border="1" width="268px" height="290" cellspacing="0" cellpadding="2" style="border-collapse: collapse">
	
		<tr>
			<td>
			<p align="center">
			<img border="0" src="../images/logo.png" width="232" height="65">
			<font face="Cambria" size="2"><p align="center">'.$SchoolAddress.'<br><br><b>Phone No :</b> '.$SchoolPhoneNo.'</p> </font><br>
			<p align="center">
			<img border="0" src="../images/logo11.png" width="100" height="100">
			<br>
			<!--<p align="center">&nbsp;</p>-->
			
			<p align="left"><b><font face="Cambria">Admission No :'.$sadmission.' </font></b></p>
			<p align="left"><b><font face="Cambria">Student Name : '.$sname.'</font></b></p>
			<p align="left"><b><font face="Cambria">Father\' Name : '.$sfathername.'</font></b></p>
			<p align="left"><b><font face="Cambria">Provisional Class: '.$sclass.'</font></b></p>
			<p align="left"><b><font face="Cambria">Phone No: '.$MobileNo.'</font></b></p>
			<p align="left"><b><font face="Cambria">Address: '.$Address.'</font></b></p>
			</td>
		</tr>
	</table>
</div>';
$sstr=$sstr.'<br><br><p align="center"><font face="Cambria"><a href="Javascript:printDiv1();">PRINT I-Card</a></font>';
echo $sstr;
?>

<?php
function number_to_word( $num = '' )
{
	$num	= ( string ) ( ( int ) $num );
	
	if( ( int ) ( $num ) && ctype_digit( $num ) )
	{
		$words	= array( );
		
		$num	= str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
		
		$list1	= array('','one','two','three','four','five','six','seven',
			'eight','nine','ten','eleven','twelve','thirteen','fourteen',
			'fifteen','sixteen','seventeen','eighteen','nineteen');
		
		$list2	= array('','ten','twenty','thirty','forty','fifty','sixty',
			'seventy','eighty','ninety','hundred');
		
		$list3	= array('','thousand','million','billion','trillion',
			'quadrillion','quintillion','sextillion','septillion',
			'octillion','nonillion','decillion','undecillion',
			'duodecillion','tredecillion','quattuordecillion',
			'quindecillion','sexdecillion','septendecillion',
			'octodecillion','novemdecillion','vigintillion');
		
		$num_length	= strlen( $num );
		$levels	= ( int ) ( ( $num_length + 2 ) / 3 );
		$max_length	= $levels * 3;
		$num	= substr( '00'.$num , -$max_length );
		$num_levels	= str_split( $num , 3 );
		
		foreach( $num_levels as $num_part )
		{
			$levels--;
			$hundreds	= ( int ) ( $num_part / 100 );
			$hundreds	= ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
			$tens		= ( int ) ( $num_part % 100 );
			$singles	= '';
			
			if( $tens < 20 )
			{
				$tens	= ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
			}
			else
			{
				$tens	= ( int ) ( $tens / 10 );
				$tens	= ' ' . $list2[$tens] . ' ';
				$singles	= ( int ) ( $num_part % 10 );
				$singles	= ' ' . $list1[$singles] . ' ';
			}
			$words[]	= $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
		}
		
		$commas	= count( $words );
		
		if( $commas > 1 )
		{
			$commas	= $commas - 1;
		}
		
		$words	= implode( ', ' , $words );
		
		//Some Finishing Touch
		//Replacing multiples of spaces with one space
		$words	= trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
		if( $commas )
		{
			$words	= str_replace_last( ',' , ' and' , $words );
		}
		
		return $words;
	}
	else if( ! ( ( int ) $num ) )
	{
		return 'Zero';
	}
	return '';
}
?>

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
 function printDiv1() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("divICard").innerHTML;
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

<html>
<head>
<body>
</body>
</head>
</html>