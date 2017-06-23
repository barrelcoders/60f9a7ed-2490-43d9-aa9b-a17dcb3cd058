<?php session_start();
include '../connection.php';
include '../AppConf.php';
$si=$_SESSION["sid"];
$sn=$_SESSION["sname"];
$sql="SELECT * FROM `student_master` WHERE `suser`='$si'";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
			$sn=$row['sname'];  $sdob=$row['DOB']; 	$sg=$row['Sex'];  $sc=$row['sclass'];  $sa=$row['sadmission'];	$sr=$row['srollno'];
			$sct=$row['Category'];	$snl=$row['Nationality'];	$sad=$row['Address'];	$sfn=$row['sfathername'];	$sfe=$row['FatherEducation'];	
			$sfo=$row['FatherOccupation'];  $smn=$row['MotherName'];  $sme=$row['MotherEducation'];  $smo=$row['MotherOccupatoin'];  
			$sm=$row['smobile'];  $sim=$row['simei'];  $sp=$row['spassword'];  $se=$row['email'];  $spp=$row['ProfilePhoto'];
	}
}
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Parent Portal</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/scriptmanu.js"></script>




</head>
<style>

</style>
<body>
<div id="container">
 <div class="top_header"> 
  <div class="row">
   <div class="col-md-4"><a href="Index.php"><img src="../images/logo.png" class="img-responsive" ></a></div>
   <div class="col-md-8">
    <div class="top_header1">
     <span>Notifications</span>
     <ul>
      <li><a href="Communication.php"><button class="btnmanu"><span>0</span>Messages</button></a></li>
      <li><a href="Notice.php"><button class="btnmanu"><span>0</span>Notices</button></a></li>
      <li><a href="MyCalendar.php"><button class="btnmanu">My Holidays</button></a></li>
      <li><a href="EmeContact.php"><button class="btnmanu">Emergency Contacts</button></a></li>
      <li><a href="MyProfile.php"><button class="btnmanu">My Profile</button></a></li>
     </ul>
    </div>
    <div class="top_header2">
     <div class="s_name">
      <font style="font-size:15px; color:#063; font-weight:600"><?php echo $sn; ?></font>&nbsp; <font style="font-weight:600">[<?php echo $sc; ?>]</font><br>
      <font>Admission No.:&nbsp;<?php echo $sa; ?></font><br>
      <font>Roll No.:&nbsp;<?php echo $sr; ?></font>
     </div>
     <div class="s_img">
      <div class="hover_s_img">
       <a href="#"><img src="<?php echo $spp; ?>" class="img-circle" width="90%" ></a>
        <ul class="s_submanu">
         <li class="te"><span></span></li>
         <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
         <li><a href="../../Index.php"><button class="btnmanu">LogOut</button></a></li>
        </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Index.php">Home</a></li>
        <li><a href="DateSheet.php">DATESHEET</a></li>
        <li><a href="TimeTable.php">TIMETABLE</a></li>
        <li><a href="#">REPORT CARD</a></li>
        <li><a href="Assignment.php">ASSIGNMENT</a></li>
        <li><a href="FeeInfo.php">FEE INFO</a></li>
        <li><a href="SessionPlan.php">SESSION PLAN</a></li>
        <li><a href="http://dpsrohini.info/Admin/britannica.html">LEARNING ZONE</a></li>
      </ul>
    </div>
  </div>
</nav>
  <!---<nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation">Show Manu
	 
	</a>
    <a href="#" title="Hide navigation">Hide Manu</a>
    <ul>
        <li class="m active"><a href="#index.php" active><button class="btnmanu">TODAY</button></a></li>
        <li class="m"><a href="#Hris/HRISmydetail.php"><button class="btnmanu">ACADEMICS </button></a></li>
        <li class="m"><a href="#Leave/NewLeave.php"><button class="btnmanu">MY CALENDAR</button></a></li>
        <li  class="m1"><a href="#AttendanceMyRoster.php" ><button class="btnmanu">REPORT CARD</button></a></li>
		<li  class="m"><a href="#Payroll/payroll.php" ><button class="btnmanu">HOME WORK</button></a></li>
		<li class="m"><a href="#Exit/exit.php"><button class="btnmanu">FEE INFO</button></a></li>
		<li  class="m1"><a href="#Helpdesk/helpdeskNewquery.php"><button class="btnmanu">A DAY AT SCHOOL</button></a></li>        
    </ul>
  </nav>--->
 </div>
</div>
</body>
</html>