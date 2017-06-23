<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Attendence and Leave Manegement</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
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
   <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">Student Leave</button>
  		 <!--<div id="demo" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="#">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Class Attendance 
</button>
           </a></li>
           <li style="margin-left:1%;"><a href="#">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Bulk Class Attendance 
</button>
           </a></li>
          </ul>
         </div>-->
  </li>
  <li class="dropmanu"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo1">Employee Leave</button>
  		 <div id="demo1" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="EmployeeLeave_Balance.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Leave opening Balance 
 </button>
           </a></li>
           <li style="margin-left:1%;"><a href="EmployeeLeave_ApprovalHistory.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Leaves Approval &amp; History </button>
           </a></li>
           <li style="margin-left:1%;"><a href="EmployeeLeave_ApproveReject.php">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Approve / Reject Leaves 
 </button>
           </a></li>
          </ul>
         </div>
   </li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="employeeleave">
   <div class="employeeleave_top">Employee Leave Balance</div>
   <form action="#" method="post">
    <div class="employeeleave_bottom"> 
     <table class="table-responsive">
      <tr class="col">
       <td>SrNo.</td><td>Emp.Id</td><td>Name</td><td>Casual(CL)</td><td>Half pay(HPL)</td><td>Maternity</td><td>Paternity</td>
       <td>Leave W/O pay</td><td>Extra ord LWP</td><td>Compensatory</td>
      </tr>
      <tr>
       <td>1</td>
       <td>DPS1</td>
       <td width="20%">Mr.ANIL KUMAR-principal</td>
       <td><input type="number" name="casual" value="8" class="text-box" /></td>
       <td><input type="number" name="halfpay" value="30" class="text-box" /></td>
       <td><input type="number" name="maternity" value="20" class="text-box" /></td>
       <td><input type="number" name="paternity" value="180" class="text-box" /></td>
       <td><input type="number" name="leavewithoutpay" value="15" class="text-box" /></td>
       <td><input type="number" name="extraordlwp" value="0" class="text-box" /></td>
       <td><input type="number" name="compensatory" value="0" class="text-box" /></td>
      </tr>
     </table>
    </div>
    <div align="center"><input type="submit" name="submit" class="btn"></div>
   </form>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
