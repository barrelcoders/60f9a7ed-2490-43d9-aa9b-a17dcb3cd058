<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Student Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
</head>
<style>
</style>
<body>

<div id="container">
<!------Top Header-----> 
 <div class="top"> <?php include 'Header.php'; ?> </div>
 
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />   
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>

<!------End Top Header ----->
 <!-------Container-------->
  <div class="myprofile">
   <div class="myprofile_inner">
   <!-----------------Self Detail--------------->
    <div class="myprofile_self">
     <div class="myprofile_self_head">Student Detail</div>
     <!--<div class="edit"><a class="button" href="#popup1"><span class="img"></span><span class="name">Edit</span></a></div>-->
     <div class="myprofile_self1"> 
      <div class="student_img">  <!---Student Image-->
       <img src="<?php echo $spp; ?>" class="img-responsive" width="140px" height="130px">
      </div>
      <div class="student_detail">  <!---Student Detail-->
       <div class="row">
        <div class="col-xs-3">Admission No.</div>
        <div class="col-xs-3"><?php echo $sa; ?></div>
        <div class="col-xs-3 xs">Class</div>
        <div class="col-xs-3 xs1"><?php echo $sc; ?></div>
       </div>
       <div class="row">
        <div class="col-xs-3">Name</div>
        <div class="col-xs-3"><?php echo $sn; ?></div>
        <div class="col-xs-3">Roll No.</div>
        <div class="col-xs-3"><?php echo $sr; ?></div>
       </div>
       <div class="row">
        <div class="col-xs-3">Date of Birth</div>
        <div class="col-xs-3"><?php echo $sdob; ?></div>
        <div class="col-xs-3">Gender</div>
        <div class="col-xs-3"><?php echo $sg; ?></div>
       </div>
       <div class="row">
        <div class="col-xs-3">Category</div>
        <div class="col-xs-3"><?php echo $sct; ?></div>
        <div class="col-xs-3">Nationality</div>
        <div class="col-xs-3"><?php echo $snl; ?></div>
       </div>
       <div class="row">
        <div class="col-xs-3">Student Address</div>
        <div class="col-xs-6"><?php echo $sad; ?>.</div>
        <div class="col-xs-3">&nbsp;</div>
       </div>
      </div>
     </div>
    </div>
   <!----------------Second Layer--------------->
    <div class="row">
     <div class="col-md-6">
   <!-----------------Family Detail--------------->
      <div class="myprofile_family">
       <div class="myprofile_self_head">Family Detail</div>
       <div class="family_detail">
        <div class="row">
         <div class="col-xs-6">Father Name</div>
         <div class="col-xs-6"><?php echo $sfn; ?></div>
         <div class="col-xs-6">Father Education</div>
         <div class="col-xs-6"><?php echo $sfe; ?></div>
         <div class="col-xs-6">Father Occupation</div>
         <div class="col-xs-6"><?php echo $sfo; ?></div>
        </div>
        <div class="row" style="border-top:1px solid #097b4d;">
         <div class="col-xs-6">Mother Name</div>
         <div class="col-xs-6"><?php echo $smn; ?></div>
         <div class="col-xs-6">Mother Education</div>
         <div class="col-xs-6"><?php echo $sme; ?></div>
         <div class="col-xs-6">Mother Occupation</div>
         <div class="col-xs-6"><?php echo $smo; ?></div>
        </div>
       </div>
      </div>
     </div>
   <!-----------------Portal and Mobile applicaton Detail--------------->
     <div class="col-md-6">
      <div class="myprofile_application">
       <div class="myprofile_self_head"><!--Portal And Mobile--> Application Login Details</div>
       <div class="application_detail">
        <div class="row">
         <div class="col-xs-6">Mobile No.</div>
         <div class="col-xs-6"><?php echo $sm; ?></div>
         <div class="col-xs-6">IMEI</div>
         <div class="col-xs-6"><?php echo $sim; ?></div>
        </div>
        <div class="row">
         <div class="col-xs-6">Password</div>
         <div class="col-xs-6"><?php echo $sp; ?></div>
         <div class="col-xs-6">Email Id</div>
         <div class="col-xs-6"><?php echo $se; ?></div>
        </div>
       </div>
      </div>  
     </div>
    </div>
   </div>
  </div>
 <!----------Edit Profile Detail---------------->
  <div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<div class="content"> <?php include 'EditProfileDetail.php'; ?> </div>
	</div>
   </div>
 <!----End Container------->
</div>
<div><?php include 'Footer.php'; ?></div>
</body>
</html>>>>>