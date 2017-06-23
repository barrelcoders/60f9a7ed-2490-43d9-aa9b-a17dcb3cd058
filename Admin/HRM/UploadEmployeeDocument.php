<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
<?php
if ($_REQUEST["txtEmpNo"] !="")
{
        
	          $EmployeeId=$_REQUEST["txtEmpNo"];
			  $EmpName=$_REQUEST["txtEmpName"];
			   
               $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $AadharCardFileName="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $AadharCardFileName="AadharCard".$t.$_FILES["F1"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"EmployeeImage/AadharCard".$t.$_FILES["F1"]["name"]);
		      		     
  		     
		      $t=time();				
			  $extension = end(explode(".", $_FILES["F2"]["name"]));
			  
			$VoterCardFileName="";
		 if($_FILES["F2"]["name"] !="")
			  {
			      $VoterCardFileName="VoterCard".$t.$_FILES["F2"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F2"]["tmp_name"],"EmployeeImage/VoterCard".$t.$_FILES["F2"]["name"]);
		      
		       
			     $t=time();				
			  $extension = end(explode(".", $_FILES["F3"]["name"]));
			  
			$RationCardFileName="";
		 if($_FILES["F3"]["name"] !="")
			  {
			      $RationCardFileName="RationCard".$t.$_FILES["F3"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F3"]["tmp_name"],"EmployeeImage/RationCard".$t.$_FILES["F3"]["name"]);

		      		
		       $t=time();				
			  $extension = end(explode(".", $_FILES["F4"]["name"]));
			  
			$DivingLicenseFileName="";
		 if($_FILES["F4"]["name"] !="")
			  {
			      $DivingLicenseFileName="DivingLicense".$t.$_FILES["F4"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F4"]["tmp_name"],"EmployeeImage/DivingLicense".$t.$_FILES["F4"]["name"]);


            $t=time();				
			  $extension = end(explode(".", $_FILES["F5"]["name"]));
			  
			$PanCardFileName="";
		 if($_FILES["F5"]["name"] !="")
			  {
			      $PanCardFileName="PanCard".$t.$_FILES["F5"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F5"]["tmp_name"],"EmployeeImage/PanCard".$t.$_FILES["F5"]["name"]);

         
            $t=time();				
			  $extension = end(explode(".", $_FILES["F6"]["name"]));
			  
			$TenCertificateFileName="";
		 if($_FILES["F6"]["name"] !="")
			  {
			      $TenCertificateFileName="TenCertificate".$t.$_FILES["F6"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F6"]["tmp_name"],"EmployeeImage/TenCertificate".$t.$_FILES["F6"]["name"]);


           
		      		      $t=time();				
			  $extension = end(explode(".", $_FILES["F7"]["name"]));
			  
			$TwelveCertificateFileName="";
		 if($_FILES["F7"]["name"] !="")
			  {
			      $TwelveCertificateFileName="TwelveCertificate".$t.$_FILES["F7"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F7"]["tmp_name"],"EmployeeImage/TwelveCertificate".$t.$_FILES["F7"]["name"]);
		      
		      
		      
		      		      $t=time();				
			  $extension = end(explode(".", $_FILES["F8"]["name"]));
			  
			$GraduationCertificateFileName="";
		 if($_FILES["F8"]["name"] !="")
			  {
			      $GraduationCertificateFileName="GraduationCertificate".$t.$_FILES["F8"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F8"]["tmp_name"],"EmployeeImage/GraduationCertificate".$t.$_FILES["F8"]["name"]);


            		      $t=time();				
			  $extension = end(explode(".", $_FILES["F9"]["name"]));
			  
			$PostGraduationCertificateFileName="";
		 if($_FILES["F9"]["name"] !="")
			  {
			      $PostGraduationCertificateFileName="PostGraduationCertificate".$t.$_FILES["F9"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F9"]["tmp_name"],"EmployeeImage/PostGraduationCertificate".$t.$_FILES["F9"]["name"]);
     





	
  //echo "INSERT INTO `Employee_Document`(`EmpId`, `EmpName`, `AadharCard`, `VoterCard`, `RationCard`, `DrivingLicense`, `PanCard`, `10Certificate`, `12Certificate`, `Graduation`, `PostGraduation`) VALUES ('$EmployeeId','$EmpName','$AadharCardFileName','$VoterCardFileName','$RationCardFileName','$DivingLicenseFileName','$PanCardFileName','$TenCertificateFileName','$TwelveCertificateFileName','$GraduationCertificateFileName','$PostGraduationCertificateFileName')";
    $rs=mysql_query("INSERT INTO `Employee_Document`(`EmpId`, `EmpName`, `AadharCard`, `VoterCard`, `RationCard`, `DrivingLicense`, `PanCard`, `10Certificate`, `12Certificate`, `Graduation`, `PostGraduation`) VALUES ('$EmployeeId','$EmpName','$AadharCardFileName','$VoterCardFileName','$RationCardFileName','$DivingLicenseFileName','$PanCardFileName','$TenCertificateFileName','$TwelveCertificateFileName','$GraduationCertificateFileName','$PostGraduationCertificateFileName')");
       echo "<b> Employee Document ahve been Submitted Successfully</b>";
}

else

{

echo "Not Submitted Successfully";
}
?>
    

		

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title></title>
<style type="text/css">
.style1 {
	text-align: center;
	font-family: Cambria;
}
</style>

</head>

<!--<body onload="Javascript:fnlsubmitform();">-->
<body>
			 
	        <div class="style1"><font size="3"><strong>
	             <br>
	             <br>
	             <br>
	             <br>
	           </body>

</html>
