<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Attendence and Leave Manegement</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <ul>
   <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">Student Attendance</button>
  		 <div id="demo" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="Student_ClassAttendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Class Attendance 
</button></a></li>
           <li style="margin-left:1%;"><a href="Student_BulkClassAttendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Bulk Class Attendance 
</button></a></li>
          </ul>
         </div>
  </li>
  <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo1">Employee Attendance</button>
  		 <div id="demo1" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="Employee_Attendance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Employee Attendance 
</button></a></li>
           <li style="margin-left:1%;"><a href="Employee_RowAttendanceLog.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Raw Attendance Logs 
</button> </a></li>
          </ul>
         </div>
   </li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="classattendance">
   <div class="classattendance_top">Upload Employee Attendance</div>
   <div class="classattendance_bottom"> 
    <form action="#" method="post" >
     <div class="row">
     <div class="col-xs-3" align="right"><b>Date&nbsp;:</b></div>
     <div class="col-xs-3"><input type="date" name="date" id="date" class="text-box"></div>
     <div class="col-xs-6">&nbsp;</div>
    </div>
    <div class="classattendance_bottom1">
     <table>
      <tr class="col">
	   <td>EmpId</td>
	   <td>Emp Name</td>
	   <td>Attendance</td>
	   <td>Time In</td>
	   <td>Time Out</td>
      </tr>
	  <tr>											
	   <td><input type="text" name="emplid" id="emplid" class="text-box tb1" value="DPS1" readonly></td>
	   <td><input type="text" name="emplname" id="emplname" class="text-box tb1" value="ABCDE NIJK" readonly></td>
	   <td><select name="attendance" id="attendance" class="text-box">
             	  <option value="P">P</option>
                  <option value="A">A</option>
                  <option value="L">L</option>
           </select></td>
	   <td><input type="time" name="timein" id="timein" class="text-box" ></td>
	   <td><input type="time" name="timeout" id="timeout" class="text-box" ></td>										 
	  </tr>
     </table>										
    </div>
   </form>
  </div>
 </div>
</div>
<!----------------->
</div>
</div>
<!----------------->
</div>
</body>
</html>
