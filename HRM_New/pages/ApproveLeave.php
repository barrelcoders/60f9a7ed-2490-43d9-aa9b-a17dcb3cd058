<?php session_start();
include '../../connection.php';
$EmployeeId  =$_SESSION['userid'];

?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Approve/Reject Leave</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
</head>
<style> .ddiframeshim{height:0%} </style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->
<div class="cont">
<div class="row c leave">
<div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="NewLeave.php"><button class="btnmanu">New Leave</button></a></li>
   <li><a href="MyLeave.php"><button class="btnmanu">My Leave</button></a></li>
   <li><a href="ViewHoliday.php"><button class="btnmanu">Holiday List</button></a></li>
   <li class="active"><a href="ApproveLeave.php"><button class="btnmanu">Approve Leave</button></a></li>
  </ul> 
 </div>
 
 <!------------------------->
 
 <div class="col-md-10">
 <br/>
  <p align="center"><input type="submit" name="approve" id="approve" value="Approve" class="btn-success"> <input type="submit" name="reject" id="reject" value="Reject" class="btn-success"></p>
  <br/>
  <div class="form3" style="width:100%;">
  <table class="table-responsive">
   <thead>  <td><input type="checkbox" name="chkall" id="chkall" /></td> <td>Sr.No.</td> <td>Employee Id</td> <td>Employee Name</td> <td>Leave Type</td> <td>Leave From</td> <td>Leave To</td> <td>No. of Days</td> <td>Date of Apply</td> <td>Remarks</td> <td>Certificate</td> </thead>
  
 
  <tr> <td><input type="checkbox" name="chkleave" id="chkleave" /></td> <td>Sr.No.</td> <td>Employee Id</td> <td>Employee Name</td> <td>Leave Type</td> <td>Leave From</td> <td>Leave To</td> <td>No. of Days</td> <td>Date of Apply</td> <td><input type="text" name="LeaveRemarks" id="LeaveRemarks" class="text-box"></td> <td><a href="">View</a></td>  </tr>
						
  </table>   
  </div>
  <br>
  
 </div>
</div></div></div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>