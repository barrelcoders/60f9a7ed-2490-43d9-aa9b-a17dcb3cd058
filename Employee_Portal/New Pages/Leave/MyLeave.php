<?php session_start();
include '../../../connection.php';
$EmployeeId  = $_SESSION['userid'];
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Payroll</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>

<style>
 .he, .he1, .he11, .he111{color:#FFFFFF;} .table2{margin-top:3%; } .table1{margin-top:1%;} .check{margin-bottom:3%;}

</style>


</head>
<style> .ddiframeshim{height:0%} </style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->

<div class="row c leave">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="NewLeave.php"><button class="btnmanu">New Leave</button></a></li>
   <li class="active"><a href="MyLeave.php"><button class="btnmanu">My Leave</button></a></li>
   <li><a href="ViewHoliday.php"><button class="btnmanu">Holiday List</button></a></li>
  </ul> 
 </div>
 <!------------------------->
  <div class="col-md-10">
  <h4>LEAVE AVAILED HISTORY</h4>
  <div class="table1">
 <table class="table-responsive">
 <thead><td>Leave Type</td>
 	<td>January</td>		
     	 <td>Februry</td>
	 <td>March</td>
	 <td>April</td>
     	 <td>May</td>
	 <td>June</td>
	 <td>July</td>
	 <td>August</td>
	 <td>September</td>
	 <td>October</td>
	 <td>November</td>
	 <td>December</td>
 </thead>
 <tr>
     <td><b>Casual (CL)</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td> 
 </tr>
 <tr>
     <td><b>Earned (EL)</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>
 </tr>
 <tr>
  <td><b>Half Pay (HPL)</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
  <tr>
  <td><b>Maternity</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
  <tr>
  <td><b>Paternity</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
  <tr>
  <td><b>Leave Without pay</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
  <tr>
  <td><b>Extra Ord LWP</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
  <tr>
  <td><b>Compensatory</b></td><td>2</td> <td>2</td> <td>2</td> <td>2</td>  <td>2</td> <td>2</td> <td>2</td> <td>2</td>   <td>2</td> <td>2</td> <td>2</td> <td>2</td>  
 </tr>
     
 </table>

</div>

<div class="table2">
 <h4>LEAVE APPROVED </h4>
 <table class="table-responsive">
 <thead>
  <td><div class="he">Sr. <br> No</div></td>
  <td><div class="he">Leave <br> Type</div></td>
  <td><div class="he">Leave <br> From</div></td>
  <td><div class="he">Leave <br> To</div></td>
  <td><div class="he">Date Of <br> Apply</div></td>
  <td><div class="he">Level 1 <br> Approval Id</div></td>
  <td><div class="he">Level 1 <br> Status</div></td>
  <td><div class="he">Level 2 <br> Approval Id</div></td>
  <td><div class="he">Level 2 <br> Status</div></td>
 <!--- <td><div class="he">Level 3 <br> Approval Id</div></td>
  <td><div class="he">Level 3 <br> Status</div></td>
  -->
  
 </thead>
 <?php
$resultQuery=mysql_query("SELECT * FROM Employee_Leave_Transaction WHERE EmployeeId='".$EmployeeId."'");

while($data=mysql_fetch_array($resultQuery)){
 ?>
 <tr>
  <td><?php echo $data['srno'] ?></td>  <td><?php echo $data['LeaveType'] ?></td> <td><?php echo $data['LeaveFrom'] ?></td> <td><?php echo $data['LeaveTo'] ?></td><td><?php echo $data['EntryDate'] ?></td> <td><?php echo $data['ApproverId'] ?></td> <td><?php echo $data['ApprovalStatus'] ?></td> <td><?php echo $data['L2ApproverId'] ?></td> <td><?php echo $data['L2ApproverStatus'] ?></td> <!-- <td>2</td> <td>2</td> -->
 </tr>
<?php     } ?>
 </table>
</div><br>

</div>
</div>

<!-------End Containt-------->

</div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>
