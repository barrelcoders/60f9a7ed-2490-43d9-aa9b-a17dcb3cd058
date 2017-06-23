<?php
	session_start();
	include '../../../connection.php';
	include '../../../AppConf.php';
?>
<?php
if ($_REQUEST["txtEmpNo"] !="")
{
               $EmpNo=$_POST['txtEmpNo'];
			   $EmpName=$_POST['txtEmpName'];
			   $EmpType=$_POST['txtEmpType'];
			   $Designation=$_POST['txtDesig'];

			   
               $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $ProfilePic="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $ProfilePic="ProfilePic".$t.$_FILES["F1"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"EmpPhoto/ProfilePic".$t.$_FILES["F1"]["name"]);
		      		     
  		     
		      $t=time();				
			  $extension = end(explode(".", $_FILES["F2"]["name"]));
			  
			$FatherPhoto="";
		 if($_FILES["F2"]["name"] !="")
			  {
			      $FatherPhoto="FatherPhoto".$t.$_FILES["F2"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F2"]["tmp_name"],"StudentPhotos/FatherPhoto".$t.$_FILES["F2"]["name"]);
		      
		       
			     $t=time();				
			  $extension = end(explode(".", $_FILES["F3"]["name"]));
			  
			$MotherPhoto="";
		 if($_FILES["F3"]["name"] !="")
			  {
			      $MotherPhoto="MotherPhoto".$t.$_FILES["F3"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F3"]["tmp_name"],"StudentPhotos/MotherPhoto".$t.$_FILES["F3"]["name"]);

		      		
		       $t=time();				
			  $extension = end(explode(".", $_FILES["F4"]["name"]));
			  
			$DOBCertificate="";
		 if($_FILES["F4"]["name"] !="")
			  {
			      $DOBCertificate="DOBCertificate".$t.$_FILES["F4"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F4"]["tmp_name"],"StudentPhotos/DOBCertificate".$t.$_FILES["F4"]["name"]);


            $t=time();				
			  $extension = end(explode(".", $_FILES["F5"]["name"]));
			  
			$AddressProof="";
		 if($_FILES["F5"]["name"] !="")
			  {
			      $AddressProof="AddressProof".$t.$_FILES["F5"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F5"]["tmp_name"],"StudentPhotos/AddressProof".$t.$_FILES["F5"]["name"]);

         
            $t=time();				
			  $extension = end(explode(".", $_FILES["F6"]["name"]));
			  
			$ScoreCard="";
		 if($_FILES["F6"]["name"] !="")
			  {
			      $ScoreCard="ScoreCard".$t.$_FILES["F6"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F6"]["tmp_name"],"StudentPhotos/ScoreCard".$t.$_FILES["F6"]["name"]);

		
        if($ProfilePic!='')		
        {
        $rs=mysql_query("update `employee_master` set `ProfilePhoto`='$ProfilePic' where `EmpId`='$EmpNo'");
         }
    
       
         if($FatherPhoto!='')		
        {
         $rs=mysql_query("update `student_master` set `FatherPhoto`='$FatherPhoto' where `sadmission`='$sadmission'");

        
        }
       
          if($MotherPhoto!='')		
        {
         $rs=mysql_query("update `student_master` set `MotherPhoto`='$MotherPhoto'  where `sadmission`='$sadmission'");
    
        }
       
          if($DOBCertificate!='')		
        {
          $rs=mysql_query("update `student_master` set `BirthCertificate`='$DOBCertificate'  where `sadmission`='$sadmission'"); 
         }
       
         if($AddressProof!='')		
        {
     
         $rs=mysql_query("update `student_master` set `AddressProofPhoto`='$AddressProof'  where `sadmission`='$sadmission'");
        }
       
           if($ScoreCard!='')		
        {
         $rs=mysql_query("update `student_master` set `ScoreCard`='$ScoreCard'  where `sadmission`='$sadmission'");
    
        }
       




         echo "<b> Employee Photo have been Submitted Successfully</b>";
         echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();

}

else

{

echo "Not Submitted Successfully";
echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
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
			 
	        <div class="style1"><font size="3"></font></div>
	             <br>
	             <br>
	             <br>
	             <br>
	           </body>

</html>
