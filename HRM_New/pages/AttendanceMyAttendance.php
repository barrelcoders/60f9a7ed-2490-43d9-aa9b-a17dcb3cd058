<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   <script src="../js/sorttable.js"></script>
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
   <li class="active"><a href="AttendanceMyAttendance.php"><button class="btnmanu">My Attendance</button></a></li>
   <li><a href="AttendanceMyRegularization.php"><button class="btnmanu">My Regularization</button></a></li>
   <li><a href="AttendanceMyRoster.php"><button class="btnmanu">My Roster</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <div class="attendance-topmanu">
   <!--------------->   
   <div class="attendance">Attendance Duration</div>
   <form action="#" method="post">
    <div class="attendance-table2">
     <table>
      <tr>
       <td>Start Date</td>
       <td><input type="date" name="startdate" id="startdate" class="text-box" ></td> 
       <td>End Date</td>
       <td><input type="date" name="enddate" id="enddate" class="text-box" ></td>
       <td align="center"><input type="reset" name="refresh" id="refresh" value="REFRESH" class="btn btn-success"></td>
      </tr>
     </table>
    </div>
   </form>
  </div>
  <div class="attendance1">ATTENDANCE DETAIL</div>
  <form action="MyAttendanceEdit.php" method="post">
   <div class="attendance-topmanu1">
    <!--------------->   
    <div class="attendance_table1">
     <table class="sortable">
      <thead> <td>Select</td>
      		  <td>Date</td>
              <td>Shift</td>
              <td>Status</td>
      </thead>
      <tbody>
       <tr>
        <td><input type="checkbox" name="select"></td>
        <td>12-12-2016</td>
        <td>Day Shift</td>
        <td>A</td>
       </tr>
       <tr>
        <td><input type="checkbox" name="select"></td>
        <td>13-12-2016</td>
        <td>WOFF</td>
        <td>P</td>
       </tr>
       <tr>
        <td><input type="checkbox" name="select"></td>
        <td>15-12-2016</td>
        <td>Night Shift</td>
        <td>WO</td>
       </tr>
       <tr>
        <td><input type="checkbox" name="select"></td>
        <td>15-12-2016</td>
        <td>Night Shift</td>
        <td>WO</td>
       </tr>
       <tr>
        <td><input type="checkbox" name="select"></td>
        <td>15-12-2016</td>
        <td>Night Shift</td>
        <td>WO</td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
   <!---<div class="regularize"> <input type="submit" nam="submit" value="REGULARIZE" class="btn"> </div>-->
  </form>
  <div class="box">	<a class="button" href="#popup1">REGULARIZE</a> </div>
  <div class="attendance_bottom">
   <div class="attendance_bottom1">
    <table>
     <tr>
      <td>Present Days: &nbsp;14</td>
      <td>Absent Days: &nbsp;8</td>
      <td>Half Days: &nbsp;0</td>
      <td>Miss Punch Out: &nbsp;0</td>
      <td>Leave: &nbsp;1</td>
      <td>Holiday: &nbsp;2</td>
      <td>Half Days Leave:&nbsp; 1</td>
     </tr>
    </table>
   </div>
   <div class="attendance_bottom2">
    <table>
     <tr>
      <td>Present: &nbsp; P</td>
      <td>Absent: &nbsp; A</td>
      <td>Half Days: &nbsp; HD</td>
      <td>Miss Punch Out: &nbsp; MIS</td>
      <td>Weekly Off: &nbsp; WO</td>
      <td>Leave: &nbsp; L</td>
      <td>Holiday: &nbsp; H</td>
      <td>Half Days Leave: &nbsp; HDL</td>
     </tr>
     <tr>
      <td>Late Arrival: &nbsp; LA</td>
      <td>Early Exit: &nbsp; EE</td>
      <td colspan="8">Not Available: &nbsp; NA</td>
     </tr>
    </table>
   </div>
  </div>
 </div>
</div>
<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="AttendanceMyAttendance.php">&times;</a>
		<div class="content"> <?php include 'MyAttendanceEdit.php'; ?> </div>
	</div>
  </div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>