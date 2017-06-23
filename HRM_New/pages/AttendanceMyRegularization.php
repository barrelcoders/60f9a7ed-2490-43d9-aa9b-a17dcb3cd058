<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="Hris/l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
  <li><a href="AttendanceMyAttendance.php"><button class="btnmanu">My Attendance</button></a></li> 
   <li class="active"><a href="AttendanceMyRegularization.php"><button class="btnmanu">My Regularization</button></a></li>
   <li><a href="AttendanceMyRoster.php"><button class="btnmanu">My Roster</button></a></li>
   
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="attendancereg1">MY Regularization List</div>
  <div class="attendance-topmanu">
   <!--------------->   
   <div class="attendancereg-table2">
    <table>
     <thead>
     <tr class="col"> <td>Attendance Reg Code</td><td>Application Date</td><td>Stage</td><td>Status</td> </tr>
     <tr class="col1">
      <td><input type="text" name="attendanceregcode" id="attendanceregcode" class="text-box" ></td> 
      <td>&nbsp;</td>
      <td><input type="text" name="stage" id="stage" class="text-box" ></td>
      <td><input type="text" name="status" id="status" class="text-box" ></td>
     </tr>
     </thead>
     <tbody>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Attendance Approval</td><td>Pending</td></tr>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Attendance Approval</td><td>Pending</td></tr>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Completed</td><td>Approved</td></tr>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Completed</td><td>Approved</td></tr>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Completed</td><td>Approved</td></tr>
     <tr> <td>EBC15485316543125843</td><td>05 Dec 2016</td><td>Completed</td><td>Approved</td></tr>
     </tbody>
    </table>
   </div>
  </div>
 </form>
  <div class="attendancebtn"><a href="#"><button class="btn">More</button></a></div>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>