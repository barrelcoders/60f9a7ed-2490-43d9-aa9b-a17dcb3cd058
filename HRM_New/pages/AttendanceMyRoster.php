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
      <li><a href="AttendanceMyRegularization.php"><button class="btnmanu">My Regularization</button></a></li>
   <li class="active"><a href="AttendanceMyRoster.php"><button class="btnmanu">My Roster</button></a></li>
   
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="attendance-topmanu">
   <!--------------->   
   <div class="attendance">PERIOD</div>
   <div class="attendance-table2">
    <table>
     <tr>
      <td>Start Date</td>
      <td><input type="date" name="startdate" id="startdate" class="text-box" ></td> 
      <td>End Date</td>
      <td><input type="date" name="enddate" id="enddate" class="text-box" ></td>
      <td align="center"><input type="reset" name="refresh" id="refresh" value="REFRESH" class="btn btn-success"></td>
    </table>
   </div>
  </div>
  <div class="attendance1">SHIFT DETAIL</div>
  <div class="attendance-topmanu">
   <!--------------->   
   <div class="attendance-table1">
    <table>
     <tr class="col"> <td>Shift Date</td><td>Shift</td><td>Start Time</td><td>End Time</td> </tr>
     <tr> <td>05 Dec 2016</td><td>Day Shift</td><td>09:30</td><td>18:30</td> </tr>
     <tr> <td>05 Dec 2016</td><td>Day Shift</td><td>09:30</td><td>18:30</td> </tr>
     <tr> <td>05 Dec 2016</td><td>Day Shift</td><td>09:30</td><td>18:30</td> </tr>
     <tr> <td>05 Dec 2016</td><td>Day Shift</td><td>09:30</td><td>18:30</td> </tr>
     <tr> <td>05 Dec 2016</td><td>Day Shift</td><td>09:30</td><td>18:30</td> </tr>
    </table>
   </div>
  </div>
 </form>
 
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>