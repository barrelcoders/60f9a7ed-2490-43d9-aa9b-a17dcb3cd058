$fateherDetail="Father's Details";
$motherDetail="Mother's Details";
$gurdianDetail="Guardian's Details (If Applicable)";
$brotherSisterName="Brother / Sister's Name:";
$brotherSisterClass="Brother / Sister's Class:";
$brotherSisterAdmission="Brother / Sister's Admission No.:";
$brotherSisterName2="Brother / Sister's Name:";
$html = '
<style type="text/css">
table{padding:0;}
table td{padding:0.5% 0; font-size:15px; font-family:Arial;}
</style>
<body>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr> <td align="center"><img src="images/logo.png" width="400px" height="100px"></td> </tr>
  <tr> <td align="center"><b>sgfdh</b></td> </tr>  
  <tr> <td align="center"><b>sgfdh</b></td> </tr>  
  <tr> <td align="center"><b>sgfdh</b></td> </tr>  
  <tr> <td style="background:#0b462d; color:#fff; font-size:18px; font-weight:bold; text-align:center">REGISTRATION FORM (Session 2017 - 18)</td> </tr>
  <tr> <td><p style="line-height:1.5"><font style="font-size:18px; font-weight:600;">Parents are requested to note :</font><br>
           » This is not an Admission Form. Submission of this form does not guarantee admission to School.<br>
           » This form is non-transferable and Registration Fee is INR 25/-</p></td> </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> <td colspan="4" style="color:#fff; font-size:16px; font-weight:bold; text-align:center">STUDENT DETAIL</td> </tr>
  <tr> <td style="padding:1% 0;"><b>Registration No.:</b></td>
       <td style="padding:1% 0;"><b> </b></td>
       <td style="padding:1% 0;">Class:</td> 
       <td style="padding:1% 0;"> </td> </tr>
  <tr> <td style="padding:1% 0;">First Name of Applicant*:</td>
       <td style="padding:1% 0;">'.$sname.' </td>
  	   <td style="padding:1% 0;">Middle Name of Applicant:</td>
       <td style="padding:1% 0;"> '.$middlename.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Last Name of Applicant*:</td>
       <td style="padding:1% 0;"> '.$slastname.' </td>
  	   <td style="padding:1% 0;">Place of Birth:</td>
       <td style="padding:1% 0;">'.$PlaceOfBirth.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Date of Birth:</td>
       <td style="padding:1% 0;">'.$DOB.' </td>
  	   <td style="padding:1% 0;">Age as on:</td>
       <td style="padding:1% 0;"> '.$Age.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Gender:</td>
       <td style="padding:1% 0;"> '.$Sex.'</td>
  	   <td style="padding:1% 0;">Nationality:</td>
       <td style="padding:1% 0;"> '.$Nationality.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;"> Enter Distance from school:</td>
       <td style="padding:1% 0;">'.$Location.' </td>
  	   <td style="padding:1% 0;">Mother Tongue:</td>
       <td style="padding:1% 0;">'.$MotherTongue.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Residential Address:</td>
       <td style="padding:1% 0;"> '.$ResidentialAddress.'</td>
  	   <td style="padding:1% 0;">Residence Landline. No:</td>
       <td style="padding:1% 0;"> '.$ResidencePhoneNo.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Permanent Address:</td>
       <td style="padding:1% 0;">'.$PermanentAddress.' </td>
  	   <td style="padding:1% 0;">Permanent Landline. No:</td>
       <td style="padding:1% 0;"> '.$PermanentPhoneNo.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Tick If Applicable:</td>
       <td style="padding:1% 0;">'.$Twin_Triplet.'</td>
  	   <td  style="padding:1% 0;" colspan="2">&nbsp;</td> 
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> <td colspan="4" style="color:#fff; font-size:16px; font-weight:bold; text-align:center">FAMILY DETAILS (FATHER / MOTHER / GUARDIAN)</td> </tr>
  <tr> <td colspan="4" align="center" style="paddig:1.5% 0; font-size:16px"><b><u>'.$fateherDetail.'</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Name:</td>
       <td style="padding:1% 0;"> '.$sfathername.'</td>
  	   <td style="padding:1% 0;">Age:</td>
       <td style="padding:1% 0;">'.$sfatherage.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Qualification:</td>
       <td style="padding:1% 0;">'.$FatherEducation.' </td>
  	   <td style="padding:1% 0;">Designation:</td>
       <td style="padding:1% 0;"> '.$FatherDesignation.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Occupation:</td>
       <td style="padding:1% 0;">'.$FatherOccupation.' </td>
  	   <td style="padding:1% 0;">Organization Name:</td>
       <td style="padding:1% 0;"> '.$FatherCompanyName.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Mobile No:</td>
       <td style="padding:1% 0;"> '.$FatherMobileNo.'</td>
  	   <td style="padding:1% 0;">Landline no:</td>
       <td style="padding:1% 0;">'.$FatherOfficePhoneNo.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Official Address:</td>
       <td style="padding:1% 0;"> '.$FatherOfficeAddress.'</td>
  	   <td style="padding:1% 0;">Email Id :</td>
       <td style="padding:1% 0;">'.$FatherEmailId.' </td> 	  	
  </tr>
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>'.$motherDetail.'</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Name:</td>
       <td style="padding:1% 0;">'.$MotherName.' </td>
  	   <td style="padding:1% 0;">Age:</td>
       <td style="padding:1% 0;">'.$MotherAge.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Qualification:</td>
       <td style="padding:1% 0;">'.$MotherEducation.' </td>
  	   <td style="padding:1% 0;">Designation:</td>
       <td style="padding:1% 0;">'.$MotherDesignation.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Occupation:</td>
       <td style="padding:1% 0;">'.$MotherOccupatoin.' </td>
  	   <td style="padding:1% 0;">Organization Name:</td>
       <td style="padding:1% 0;">'.$MotherCompanyName.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Mobile No:</td>
       <td style="padding:1% 0;">'.$MotherMobile.' </td>
  	   <td style="padding:1% 0;">Landline no:</td>
       <td style="padding:1% 0;">'.$MotherOfficePhone.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Official Address:</td>
       <td style="padding:1% 0;">'.$MotherOfficeAddress.' </td>
  	   <td style="padding:1% 0;">Email Id :</td>
       <td style="padding:1% 0;">'.$MotherEmail.' </td> 	  	
  </tr>
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>'.$gurdianDetail.'</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Name:</td>
       <td style="padding:1% 0;">'.$GuradianName.' </td>
  	   <td style="padding:1% 0;">Age:</td>
       <td style="padding:1% 0;"> '.$GuradianAge.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Qualification:</td>
       <td style="padding:1% 0;">'.$GuradinaEducation.' </td>
  	   <td style="padding:1% 0;">Designation:</td>
       <td style="padding:1% 0;">'.$GuradianDesignation.' </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Occupation:</td>
       <td style="padding:1% 0;"> '.$GuradianOccupation.'</td>
  	   <td style="padding:1% 0;">Organization Name:</td>
       <td style="padding:1% 0;"> '.$GuradianCompanyName.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Mobile No:</td>
       <td style="padding:1% 0;"> '.$GuradianMobileNo.'</td>
  	   <td style="padding:1% 0;">Landline no:</td>
       <td style="padding:1% 0;"> '.$GuradianOfficialPhNo.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Official Address:</td>
       <td style="padding:1% 0;">'.$GuradianOfficialAddress.' </td>
  	   <td style="padding:1% 0;">Email Id :</td>
       <td style="padding:1% 0;"> '.$GuardianEmailId.'</td> 	  	
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> <td colspan="7" style="color:#fff; padding:0.5% 0; text-align:center;">
   <b>Category* </b> <i>(Please select the relevant Category / Categories and fill the details as applicable. If you do not fall into any category, 
      please select Others. Parents are required to produce the relevant documents at the time of Admission. In case the documents are not produced, 
      the candidature will be rejected)</i> </td> </tr>
  <tr> <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;Sibling(s) Studying in DPS, Rohini</td> 
  	   <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	Father DPS Core Alumni</td> 
  	   <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	Mother DPS Core Alumni</td> 
  	   <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	DPS Rohini Staff</td> 
  	   <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	Other DPS Staff</td> </tr>
  <tr> <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	Single Parent</td> 
  	   <td style="padding:1% 0;"><input type="checkbox" value="">&nbsp;	Special Needs</td> 
  </tr>
 </table>
 <table border="0" style="border-bottom:2px solid #ccc;" width="100%" cellpadding="0" cellspacing="0">
  <tr>
   <td colspan="4" style="color:#000; text-align:center; font-size:16px; padding:1.5% 0 0 0; font-weight:bold">Details of Sibling(s) studying in sdbuilgldmno;bsdrg, </td>  
  </tr>
  <tr> <td colspan="4" align="center">(If there is more than one sibling, mention any one)</td> </tr>
  <tr> 
   <td style="padding:1% 0;">'.$brotherSisterName.'</td>
   <td style="padding:1% 0;"> </td> 
   <td style="padding:1% 0;">'.$brotherSisterClass.'</td>
   <td style="padding:1% 0;"> </td>
  </tr>
  <tr style="border-bottom:2px solid #ccc;"> 
   <td style="padding:1% 0;">'.$brotherSisterAdmission.' </td>
   <td style="padding:1% 0;"> </td> 
   <td style="padding:1% 0;" colspan="2">&nbsp;</td>
  </tr>
 </table>
 <table border="0" style="border-bottom:2px solid #ccc;" width="100%" cellpadding="0" cellspacing="0">
  <tr>
   <td style="padding:1% 0;">'.$brotherSisterName2.'</td>
   <td style="padding:1% 0;"> </td> 
   <td style="padding:1% 0;">'.$brotherSisterClass.'</td>
   <td style="padding:1% 0;"> </td>
  </tr>
  <tr> 
   <td style="padding:1% 0;">'.$brotherSisterAdmission.' </td>
   <td style="padding:1% 0;"> </td> 
   <td style="padding:1% 0;" colspan="2">&nbsp;</td>
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
   <td style="padding:1% 0;">Single Parent:</td>
   <td style="padding:1% 0;"> </td> 
   <td style="padding:1% 0;">(If Others Please Specify):</td>
   <td style="padding:1% 0;"> </td>
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> <td colspan="4" style="color:#fff; font-size:16px; text-align:center;">Details of Father / Mother, if Alumni of 
  buldgh erguki oitheo iohetgo</td> </tr>
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>Father Alumni Details</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Name of Father:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">Name of DPS Branch:</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Passout Year:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">Last Passout Class:</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>Mother Alumni Details</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Name of Mother:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">Name of DPS Branch:</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Passout Year:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">Last Passout Class:</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>Special Needs Details</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Special Needs (if any):</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">(If Others Please Specify):</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr> <td colspan="4" align="center" style="font-size:16px; padding:1.5% 0;"><b><u>Category</u></b></td> </tr>
  <tr> <td style="padding:1% 0;">Select Category:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">(If Others Please Specify):</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> 
   <td colspan="4" style="color:#fff; font-size:16px; text-align:center">Contact Details for all Admission Related Information</td> </tr>
  <tr> <td style="padding:1% 0;">Contact Person Name:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;">Mobile No:</td>
       <td style="padding:1% 0;"> </td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">E-mail Id:</td>
       <td style="padding:1% 0;"> </td>
  	   <td style="padding:1% 0;" colspan="2">&nbsp;</td> 	  	
  </tr>
 </table>
 <table border="0" width="100%" style="border-bottom:2px solid #ccc;" cellpadding="0" cellspacing="0">
  <tr style="background:#097b4d;"> 
   <td colspan="4" style="color:#fff; font-size:16px; text-align:center">Pay Order Details</td> </tr>
  <tr> <td style="padding:1% 0;">Name of Bank:</td>
       <td style="padding:1% 0;">'.$BankName.'</td>
  	   <td style="padding:1% 0;">Branch Name:</td>
       <td style="padding:1% 0;"> '.$BankBranch.'</td> 	  	
  </tr>
  <tr> <td style="padding:1% 0;">Date:</td>
       <td style="padding:1% 0;"> '.$ChequeDate.' </td>
  	   <td style="padding:1% 0;">Pay Order No.:</td>
       <td style="padding:1% 0;"> '.$ChequeNo.'</td>
  </tr>
  <tr> <td style="padding:1% 0;">Amount:</td>
       <td style="padding:1% 0;"> '.$Amount.' </td>
  	   <td style="padding:1% 0;">&nbsp;</td>
  </tr>
 </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr> <td style="padding:1% 0;">Place:</td>
       <td style="padding:1% 0;">  '.$RegistrationPlace.'</td>
  	   <td style="padding:1% 0;">Date:</td>
       <td style="padding:1% 0;"> '.$RegistrationDate.' </td>
  </tr>
 </table>
 <br><br><BR>
</body>
</html>
';
//==============================================================
//==============================================================

//echo $html; exit;
//==============================================================
include("../mpdf60/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->list_number_suffix = ')';
$mpdf->AddPage();
$mpdf->SetFont('Arial','B',16);
$mpdf->Cell(100,10,$html);

$content = $mpdf->Output('student.pdf','F');

//$mpdf->WriteHTML($html);

$mpdf->Output();