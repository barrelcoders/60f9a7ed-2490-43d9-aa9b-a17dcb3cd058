<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
?>
<?php
if(isset($_POST['submit']))
{
$RegistrationNo=$_POST['registrationno'];
$select=mysql_query("SELECT `RegistrationNo`,`sname`,`DOB`,`sfathername`,`EmergencyContactNo`,`EmergencyEmail` FROM `NewStudentRegistration_temp` WHERE `RegistrationNo`='$RegistrationNo'");
$selectresult=mysql_fetch_assoc($select);

 $old_date = Date_create($selectresult['DOB']);
$new_date = Date_format($old_date, "d/m/Y");

}
?>
<?php
if(isset($_POST['submit1']))
{
$applicationno=$_POST['registrationno'];
$single_parent=$_FILES['F1']["name"];
$first_born=$_FILES['F2']["name"];
$ssql=mysql_query("UPDATE `NewStudentRegistration_temp` SET `SingleParent`='$single_parent' , `GirlChild_FirstBorn`='$first_born' WHERE `RegistrationNo`='$applicationno'");
$target_dir = "new-document-nursery/";
        $target_file1 = $target_dir.basename($_FILES["F1"]["name"]);
        move_uploaded_file($_FILES["F1"]["tmp_name"], $target_file1);
        
         $target_fileF2 = $target_dir.basename($_FILES["F2"]["name"]);
        move_uploaded_file($_FILES["F2"]["tmp_name"], $target_fileF2);
        if($ssql)
        {
        	echo "<script type='text/javascript'>window.location.href = 'upload_new_document.php';</script>";
        	exit();
        }
}
?>
  <html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>
<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <script src="../../bootstrap/bootstrap.min.js"></script>
  <style>
  
  .text-box{ width:50%; border-radius:3px; border:1px solid #999;}
  .col-xs-3{ text-align:left; margin-top:1%;}
  
 </style>
 </head>
 <body>
 <form method="post" enctype="multipart/form-data">


 <div class="row">
 <div class="col-xs-3"><strong>Registration Number</strong></div>
 <div class="col-xs-3"><input type="text" name="registrationno" value="<?php echo $selectresult['RegistrationNo']; ?>" readonly style="border:none"></div>
 <div class="col-xs-3"><strong>Student Name</strong></div>
 <div class="col-xs-3"><?php echo $selectresult['sname']; ?></div>
 </div>
<div class="row">
 <div class="col-xs-3"><strong>Date of Birth</strong></div>
 <div class="col-xs-3"><?php echo $new_date; ?></div>
 <div class="col-xs-3"><strong>Father Name</strong></div>
 <div class="col-xs-3"><?php echo $selectresult['sfathername']; ?></div>
 </div>
<div class="row">
 <div class="col-xs-3"><strong>Mobile No.</strong></div>
 <div class="col-xs-3"><?php echo $selectresult['EmergencyContactNo']; ?></div>
 <div class="col-xs-3"><strong>Email id</strong></div>
 <div class="col-xs-3"><?php echo $selectresult['EmergencyEmail']; ?></div>
 </div>
   <div class="row">
    <div class="col-xs-3"> <b>1. Single Parent :</b></div>
   <div class="col-xs-3"><input type="file" name="F1" id="F1"></div>
  <div class="col-xs-3"> <b> 2. First Born :</b> </div>
  <div class="col-xs-3"><input type="file" name="F2" id="F2"></div>
 </div>
 <div>&nbsp;</div>
 <div align="center"><input type="submit" name="submit1" value="Submit"></div>
  </form>
 </body>
 </html>