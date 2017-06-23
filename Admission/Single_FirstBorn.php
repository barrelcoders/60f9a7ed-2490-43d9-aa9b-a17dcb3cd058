<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
$registrationno=$_POST['registrationno'];
if(isset($_POST['submit']))
{
$rn=$_POST['ApplicationNo'];
$single_parent=$_FILES['F1']["name"];
$first_born=$_FILES['F2']["name"];
$ssql=mysql_query("UPDATE `NewStudentRegistration_temp` SET `SingleParent`='$single_parent' , `GirlChild_FirstBorn`='$first_born' WHERE `RegistrationNo`='$rn'");
$target_dir = "new-document-nursery/";
        $target_file1 = $target_dir.basename($_FILES["F1"]["name"]);
        move_uploaded_file($_FILES["F1"]["tmp_name"], $target_file1);
        
         $target_fileF2 = $target_dir.basename($_FILES["F2"]["name"]);
        move_uploaded_file($_FILES["F2"]["tmp_name"], $target_fileF2);
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
  .col-xs-4{ text-align:left; margin-top:1%;}
  
 </style>
 </head>
 <body>
 <form method="post" enctype="multipart/form-data">
 <div class="row">
 <div class="col-xs-2">&nbsp;</div>
 <div class="col-xs-4"><strong>Registration Number</strong></div>
  <div class="col-xs-4"><input name="ApplicationNo" id="ApplicationNo" class="text-box" type="text" value="<?php echo $registrationno; ?>"  readonly></div>
  <div class="col-xs-2">&nbsp;</div>
 </div>
   <div class="row">
    <div class="col-xs-2">&nbsp;</div>
   <div class="col-xs-4"><b> 1. Single Parent :</b></div>
  <div class="col-xs-4"> <input type="file" name="F1" id="F1"> </div>
  <div class="col-xs-2">&nbsp;</div>
 </div>
 <div class="row">
  <div class="col-xs-2">&nbsp;</div>
   <div class="col-xs-4"><b> 2. First Born :</b></div>
   <div class="col-xs-4"> <input type="file" name="F2" id="F2"> </div>
   <div class="col-xs-2">&nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div align="center"><input type="submit" name="submit" value="Submit"></div>
  </form>
 </body>
 </html>