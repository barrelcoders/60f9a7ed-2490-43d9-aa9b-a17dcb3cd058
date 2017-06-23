<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
	//include '../Header/Header3.php';
?>
<?php
if(isset($_POST['submit'])){
    $registration_no=$_POST['registration_no'];
	
    
 $select = mysql_query("SELECT sname,middlename,slastname, RegistrationNo,DOB,Sex,sfathername,MotherName,EmergencyEmail,EmergencyContactNo FROM NewStudentRegistration_temp where RegistrationNo='".$registration_no."'");  
  $listFetch = mysql_fetch_assoc($select) ;
  
  $Applicant_name=$listFetch['sname'];
  $Applicant_mname=$listFetch['middlename'];
  $Applicant_lname=$listFetch['slastname'];
  $Admission_no=  $listFetch['RegistrationNo'];
  $Father_name=  $listFetch['sfathername'];
  $Mother_name=  $listFetch['MotherName'];
  $DOB        =$listFetch['DOB'];
  $Email_id   =$listFetch['EmergencyEmail'];
  $Phone_no  =$listFetch['EmergencyContactNo'];
  $Gender   =$listFetch['Sex'];
  
 
   
    $result=mysql_query("INSERT INTO total_drawoflots(Applicant_name,Admission_no,Father_name,Mother_name,DOB,Email_id,Phone_no,Gender) value('".$Applicant_name." ".$Applicant_mname." ".$Applicant_lname."','".$Admission_no."','".$Father_name."','".$Mother_name."','".$DOB."','".$Email_id."','".$Phone_no."','".$Gender."')");
 
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Language" content="en-us">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<title>Total No.</title>
		<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
		<script src="js/student_custom.js"></script>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="container">
			 <div class="row ">
			 	<div class="Header" align="center" ><img src="../images/NewLogo.jpg" class="img-responsive"><br /></div>
			 </div>
			 <div class="row">
			 <form name="frmstudentregis" id="frmstudentregis" method="post" action="" enctype="multipart/form-data">
		 
		<div class="row" >
		     <div class="col-xs-4" style="text-align:right;font-size:16px;"> <strong>Enter Application No:</strong></div>
			 <div class="col-xs-4"><input type="text" name="registration_no" id="registration_no"  class="text-box" value="" >
		</div>
		<div class="col-xs-4"><input name="submit" type="submit" value="submit" class="btn" /></div>
		    </form>
			</div>
			  <div align="center" class="h h11"><b><font >Nursery Admission 2017 - 2018<br> Draw List</font></b></div>
			  <div>&nbsp;</div>
			  <table class="table table-striped table-bordered bootstrap-datatable datatable">
			  	<thead>
					<tr>
						<th>S.No.</th>
						<th>Application No.</th>
						<th>Name of Applicant</th>
						<th>Father's Name</th>
						<th>Mother's Name</th>
						<th>Date Of Birth</th>
						<th>E-Mail Id</th>
						<th>Phone No.</th>
						<th>Gender</th>
					</tr>
				</thead>
				<tbody>
					<?php
						  
              			  $list = "select * from total_drawoflots";
              			  $i=1;
						  $listQuery = mysql_query($list);
						
						  while($listFetch = mysql_fetch_assoc($listQuery))
						  {
						  
             		?>
					<tr>
						
						<td><?php echo $i ;?></td>
						<td><?php echo $listFetch['Admission_no'] ;?></td>
						<td><?php echo $listFetch['Applicant_name'] ;?></td>
						<td><?php echo $listFetch['Father_name'] ;?></td>
						<td><?php echo $listFetch['Mother_name'] ;?></td>
						<td><?php echo $listFetch['DOB'] ;?></td>
						<td><?php echo $listFetch['Email_id'] ;?></td>
						<td><?php echo $listFetch['Phone_no'] ;?></td>
						<td><?php echo $listFetch['Gender'] ;?></td>
					
					</tr>
					<?php  $i++; } ?>
				</tbody>
			  </table>
		
		</div>
	</body>
</html>