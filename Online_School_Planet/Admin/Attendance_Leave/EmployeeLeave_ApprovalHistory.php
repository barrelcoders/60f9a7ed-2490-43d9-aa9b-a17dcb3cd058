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
   <div class="employeeleave_top">Employee Leave History</div>
   <form action="#" method="post">  
    <div class="employeeleave_history">
     <div class="row">
      <div class="col-xs-3">Employee Id</div>
      <div class="col-xs-3"><input type="text" name="employeeid" id="employeeid" class="text-box"></div>
      <div class="col-xs-3">Employee Name</div>
      <div class="col-xs-3"><select name="employeename" id="employeename" class="text-box">
      							<option value="">Select One</option>
                            </select>
      </div>                            
     </div>
     <div class="row">
      <div class="col-xs-3">From Date</div>
      <div class="col-xs-3"><input type="date" name="fromdate" id="fromdate" class="text-box" ></div>
      <div class="col-xs-3">To Date</div>
      <div class="col-xs-3"><input type="date" name="todate" id="todate" class="text-box" ></div>
     </div>
     <div align="center" style="margin-top:1%;"><input type="submit" name="submit" class="btn"></div>
    </div>
    <div class="employeeleave_bottom emlb"> 
     <table class="table-responsive">
      <tr class="col">
       <td>SrNo.</td><td>Emp.Id</td><td>Name</td><td>Leave Type</td><td>Leave From</td><td>Leave To</td><td>Date of Apply</td>
       <td>Level 1 Approval Id</td><td>Level 1 Status</td><td>Level 2 Approval Id</td><td>Level 2 Status</td><td>Remarks</td><td>Medical Certificate</td>
       <td>Edit</td><td>Delete</td>
      </tr>
      <tr>
       <td>1</td>
       <td>DPS1</td>
       <td>ABCDEF</td>
       <td>Casual Leave</td>
       <td>09-12-2016</td>
       <td>11-12-2016</td>
       <td>07-12-2016</td>
       <td>DPS1</td>
       <td>Approved</td>
       <td>DPS6</td>
       <td>Approved</td>
       <td>Family Function</td>
       <td>&nbsp;</td>
       <td><a href="#">Edit</a></td>
       <td><a href="#">Delete</a></td>
      </tr>
      <tr>
       <td>2</td>
       <td>DPS2</td>
       <td>ABCDEF</td>
       <td>Casual Leave</td>
       <td>09-12-2016</td>
       <td>11-12-2016</td>
       <td>07-12-2016</td>
       <td>DPS1</td>
       <td>Approved</td>
       <td>DPS6</td>
       <td>Approved</td>
       <td>Family Function</td>
       <td>&nbsp;</td>
       <td><a href="#">Edit</a></td>
       <td><a href="#">Delete</a></td>
      </tr>
     </table>
    </div>
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
