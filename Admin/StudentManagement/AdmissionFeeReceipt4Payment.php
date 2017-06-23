<?php
$Con = mysql_connect("","dpsfsis","DpsSec19");
if (!$Con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("eduworld_dps19", $Con);

if ($_REQUEST["hRegNo"] != "")
{
			$RegistrationNo=$_REQUEST["hRegNo"];
			
			 $cboClass=str_replace("'","",$_REQUEST["cboClass"]);
			 
			 
			  $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $FatherPhoto="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $FatherPhoto="FatherPic".$t.$_FILES["F1"]["name"];
			      if ($_FILES['F1']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Father Image,maximum file size allowed is 250 Kb<br>Please click <a href='StudentAdmission.php'>here</a> to restart the registration process again";
			      	exit();
			      }
			  }
		      
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"Admin/StudentManagement/StudentPhotos/FatherPic".$t.$_FILES["F1"]["name"]);
		      
		      $extension = end(explode(".", $_FILES["F2"]["name"]));
		      $MotherPhoto="";
		      if($_FILES["F2"]["name"] !="")
		      {
		      	$MotherPhoto="MotherPhoto".$t.$_FILES["F2"]["name"];
		      	  if ($_FILES['F2']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Mother image,maximum file size allowed is 250 Kb<br>Please click <a href='StudentAdmission.php'>here</a> to restart the registration process again";
			      	exit();
			      }
		      }	
		      move_uploaded_file($_FILES["F2"]["tmp_name"],"Admin/StudentManagement/StudentPhotos/MotherPhoto".$t.$_FILES["F2"]["name"]);
		      
		      
		      $extension = end(explode(".", $_FILES["F3"]["name"]));
		      $AddressProof="";
		      if($_FILES["F3"]["name"] !="")
		      {
		      	$AddressProof="AddressProof".$t.$_FILES["F3"]["name"];
		      	  if ($_FILES['F3']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Mother image,maximum file size allowed is 250 Kb<br>Please click <a href='StudentAdmission.php'>here</a> to restart the registration process again";
			      	exit();
			      }
		      }	
		      move_uploaded_file($_FILES["F3"]["tmp_name"],"Admin/StudentManagement/StudentPhotos/AddressProof".$t.$_FILES["F3"]["name"]);
		      
		      $extension = end(explode(".", $_FILES["F4"]["name"]));
		      $MedicalCerti="";
		      if($_FILES["F4"]["name"] !="")
		      {
		      	$MedicalCerti="MedicalCerti".$t.$_FILES["F4"]["name"];
		      	  if ($_FILES['F4']['size'] > 250000) 
			      {
			      	echo "<br><br><center>Please check the size of Mother image,maximum file size allowed is 250 Kb<br>Please click <a href='StudentAdmission.php'>here</a> to restart the registration process again";
			      	exit();
			      }
		      }	
		      move_uploaded_file($_FILES["F4"]["tmp_name"],"Admin/StudentManagement/StudentPhotos/MedicalCerti".$t.$_FILES["F4"]["name"]);
		      
		      
		      
		      

			

	$txtName=$_REQUEST["txtName"];
	$LastName=$_REQUEST["txtLastName"];
	
	//$txtDOB=$_REQUEST["txtDOB"];
	$Dt = $_REQUEST["txtDOB"];
		$arr=explode('/',$Dt);
		$txtDOB = $arr[2] . "-" . $arr[0] . "-" . $arr[1];


	$txtPlaceOfBirth=str_replace("'","",$_REQUEST["txtPlaceOfBirth"]);
	$txtAge=str_replace("'","",$_REQUEST["txtAge"]);
	
	$strAge=str_replace(" ","",$txtAge);
	$arr1=explode(',',$strAge);
	
	$AgeYear=$arr1[0];
	$AgeMonth=$arr1[1];
	$AgeDay=$arr1[2];
	
	
	$txtSex=str_replace("'","",$_REQUEST["txtSex"]);
	$txtMotherTounge=str_replace("'","",$_REQUEST["txtMotherTounge"]);
	$txtNationality=str_replace("'","",$_REQUEST["txtNationality"]);
	//$cboClass=str_replace("'","",$_REQUEST["cboClass"]);
	$txtLastSchool=str_replace("'","",$_REQUEST["txtLastSchool"]);
	//$cboCategory=$_REQUEST["cboCategory"];
	$txtAddress=str_replace("'","",$_REQUEST["txtAddress"]);
	
	$cboLocation=str_replace("'","",$_REQUEST["cboLocation"]);
	$rsLocation=mysql_query("select distinct `Distance` from `NewStudentRegistrationDistanceMaster` where `Sector`='$cboLocation'");
	while($rowL=mysql_fetch_row($rsLocation))
	{
		$cboDistance=$rowL[0];
		break;
	}
	//$cboDistance=$_REQUEST["cboDistance"];
	
	$txtFatherName=str_replace("'","",$_REQUEST["txtFatherName"]);
	$txtFatherAge=str_replace("'","",$_REQUEST["txtFatherAge"]);
	$txtFatherEducation=str_replace("'","",$_REQUEST["txtFatherEducation"]);
	$cboDuration=str_replace("'","",$_REQUEST["cboDuration"]);
	
	$txtFatherOccupation=str_replace("'","",$_REQUEST["txtFatherOccupation"]);
	$txtFatherDesignation=str_replace("'","",$_REQUEST["txtFatherDesignation"]);
	$txtFatherAnnualIncome=str_replace("'","",$_REQUEST["txtFatherAnnualIncome"]);
	$txtFatherCompanyName=str_replace("'","",$_REQUEST["txtFatherCompanyName"]);
	$txtFatherOfficialAddress=str_replace("'","",$_REQUEST["txtFatherOfficialAddress"]);
	$txtFatherOfficialPhNo=str_replace("'","",$_REQUEST["txtFatherOfficialPhNo"]);
	$txtFatherMobileNo=str_replace("'","",$_REQUEST["txtFatherMobileNo"]);
	$txtFatherEmailId=str_replace("'","",$_REQUEST["txtFatherEmailId"]);
	
	
	$txtMotherName=str_replace("'","",$_REQUEST["txtMotherName"]);
	$txtMotherAge=str_replace("'","",$_REQUEST["txtMotherAge"]);
	$txtMotherEducation=str_replace("'","",$_REQUEST["txtMotherEducation"]);
	$cboMotherQualificationDuration=str_replace("'","",$_REQUEST["cboMotherQualificationDuration"]);
	$txtMotherOccupation=str_replace("'","",$_REQUEST["txtMotherOccupation"]);
	$txtMotherDesignation=str_replace("'","",$_REQUEST["txtMotherDesignation"]);
	$txtMotherAnnualIncome=str_replace("'","",$_REQUEST["txtMotherAnnualIncome"]);
	$txtMotherCompanyName=str_replace("'","",$_REQUEST["txtMotherCompanyName"]);
	$txtMotherOfficialAddress=str_replace("'","",$_REQUEST["txtMotherOfficialAddress"]);
	$txtMotherOfficialPhNo=str_replace("'","",$_REQUEST["txtMotherOfficialPhNo"]);
	$txtMotherMobileNo=str_replace("'","",$_REQUEST["txtMotherMobileNo"]);
	$txtMotherEmailId=str_replace("'","",$_REQUEST["txtMotherEmailId"]);
	
	$txtGuradianName=str_replace("'","",$_REQUEST["txtGuradianName"]);
	$txtGuradianAge=str_replace("'","",$_REQUEST["txtGuradianAge"]);
	$txtGuradinaEducation=str_replace("'","",$_REQUEST["txtGuradinaEducation"]);
	$txtGuradianOccupation=str_replace("'","",$_REQUEST["txtGuradianOccupation"]);
	$txtGuradianDesignation=str_replace("'","",$_REQUEST["txtGuradianDesignation"]);
	$txtGuradianAnnualIncome=str_replace("'","",$_REQUEST["txtGuradianAnnualIncome"]);
	$txtGuradianCompanyName=str_replace("'","",$_REQUEST["txtGuradianCompanyName"]);
	$txtGuradianOfficialAddress=str_replace("'","",$_REQUEST["txtGuradianOfficialAddress"]);
	$txtGuradianOfficialPhNo=str_replace("'","",$_REQUEST["txtGuradianOfficialPhNo"]);
	$txtGuradianMobileNo=str_replace("'","",$_REQUEST["txtGuradianMobileNo"]);
	
	$cboTransport=str_replace("'","",$_REQUEST["cboTransport"]);
	$cboSafeTransport=str_replace("'","",$_REQUEST["cboSafeTransport"]);
	
	$txtRealBroSisName=str_replace("'","",$_REQUEST["txtRealBroSisName"]);
	$txtRealBroSisClass=str_replace("'","",$_REQUEST["txtRealBroSisClass"]);
	$txtRealBroSisSchoolName=str_replace("'","",$_REQUEST["txtRealBroSisSchoolName"]);
	
	$txtFatherAlumniName=str_replace("'","",$_REQUEST["txtFatherAlumniName"]);
	$txtDPSSchoolName=str_replace("'","",$_REQUEST["txtDPSSchoolName"]);
	$txtYearOfPassing=str_replace("'","",$_REQUEST["txtYearOfPassing"]);
	$txtLastPassoutClassFather=str_replace("'","",$_REQUEST["txtLastPassoutClassFather"]);
	
	$txtMotherAlumniName=str_replace("'","",$_REQUEST["txtMotherAlumniName"]);
	$txtMotherDPSSchoolName=str_replace("'","",$_REQUEST["txtMotherDPSSchoolName"]);
	$txtMotherYearOfPassing=str_replace("'","",$_REQUEST["txtMotherYearOfPassing"]);
	$txtLastPassoutClassMother=str_replace("'","",$_REQUEST["txtLastPassoutClassMother"]);
	
	
	$txtEmergencyNo=str_replace("'","",$_REQUEST["txtEmergencyNo"]);
	$txtMobile=str_replace("'","",$_REQUEST["txtMobile"]);
	$txtemail=str_replace("'","",$_REQUEST["txtemail"]);
	
	$hSibling=$_REQUEST["hSibling"];
	$hFatherAlumni=$_REQUEST["hFatherAlumni"];
	$hMotherAlumni=$_REQUEST["hMotherAlumni"];
	$hSingleParent=$_REQUEST["hSingleParent"];
	$hSpecialNeed=$_REQUEST["hSpecialNeed"];
	$hDPSStaff=$_REQUEST["hDPSStaff"];
	$hOtherCategory=$_REQUEST["hOtherCategory"];
	
	$currentdate=date("Y-m-d");
	
		
		/*
		$sqlRcpt = "select max(CAST(`newsadmission` AS UNSIGNED)) as `newsadmission` from (SELECT CAST(`sadmission` AS UNSIGNED) as `newsadmission` FROM `student_master` union SELECT CAST(`sadmission` AS UNSIGNED) as `newsadmission` FROM `Almuni`) as `x`";
		$rsRcpt = mysql_query($sqlRcpt);
		while($rowA = mysql_fetch_row($rsRcpt))
				{
					$sadmission=$rowA[0];
					break;
				}
		*/
			

$merchantTxnId = uniqid(); 
if($cboClass=="Nursery")
{
	//$orderAmount=500;	
	$orderAmount = 1;
}
else
{
	//$orderAmount=750;	
	$orderAmount = 2;
}
//$orderAmount = 1;

	
$ssql="insert into `NewStudentAdmission_temp` (`RegistrationNo`,`RegistrationDate`,`sname`,`slastname`,`sclass`,`smobile`,`email`,`sfathername`,`quarter`,`FinancialYear`,`TxnAmount`,`TxnId`,`FatherPhoto`,`MotherPhoto`,`AddressProofPhoto`,`MedicalCertificatePhoto`) VALUES ";
$ssql=$ssql."('$RegistrationNo','$currentdate','$txtName','$LastName','$cboClass','$txtMobile','$txtemail','$txtFatherName','Q1','2015','60000','$merchantTxnId','$FatherPhoto','$MotherPhoto','$AddressProof','$MedicalCerti')";


	///**************
		mysql_query($ssql) or die(mysql_error());
		
		mysql_query("insert into `Fees_Online_Transactions` (`Id`,`Name`,`Class`,`TxnId`,`TxnStatus`,`TxnAmount`,`sfathername`,`Quarter`,`FinancialYear`) values ('$RegistrationNo','$txtName','$cboClass','$merchantTxnId','Pending','60000','$txtFatherName','Q2','2015')") or die(mysql_error());
					
			
			//$Message1="<br><br><center><b>Student Registration: ".$Admission." successfully completed!<br><a href='StudentManagementLandingPage.php'>Home </a>";

			//echo $Message1;
			//exit();
			$SubmitStatus="successfull";
			
			set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
             $formPostUrl = "https://www.citruspay.com/totalsoft";	
             
             //Need to change with your Secret Key
             $secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
             
             //Need to change with your Vanity URL Key from the citrus panel
             $vanityUrl = "totalsoft";
			
			

             //Need to change with your Order Amount
             
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);

}
else
{
	exit();
}

?>

<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>

<style type="text/css">
.style1 {
	text-align: center;
	font-family: Cambria;
}
</style>

</head>

<body onload="Javascript:fnlsubmitform();">
			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 <div class="style1">
				<font size="3"><strong>
			 <input type="hidden" name="SubmitStatus" id="SubmitStatus" value="<?php echo $SubmitStatus;?>">
	         <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
			 <input type="hidden" id="firstName" name="firstName" value="<?php echo $txtName;?>" />
			 <input type="hidden" id="lastName" name="lastName" value="<?php echo $LastName;?>" />
			 <input type="hidden" id="Name" name="Name" value="<?php echo $txtName;?>" />
             <input type="hidden" name="returnUrl" value="http://dpsfsis.com/AdmissionFeeResponse.php" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
			 <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
			 <input type="hidden" name="customParams[0].value" value="NA" />			 		
			 	             
	             <!--<input type="Submit" value="Pay Now"/>-->
	             Please wait Payment is in progress</strong></font></div>
			</form>
</body>

</html>
