<?php
session_start();

include '../../connection.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `PermanentAddress`,`Permanentcity`,`PermanentState`,`PermanentPhone`,`Name`,`Address`,`City`,`State`,`Phoneno` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$PermanentAddress=$row[0];
			$Permanentcity=$row[1];
			$PermanentState=$row[2];
			$PermanentPhone=$row[3];
			$Name=$row[4];
			$Address=$row[5];
			$City=$row[6];
			$State=$row[7];
			$Phoneno=$row[8];
			
			break;
		}
		while($row1 = mysql_fetch_row($rs1))
		{
			$Empname=$row1[0];
			break;
		}

$rsNotice=mysql_query("select `noticetitle`,`NoticeDate`,`srno` from `employee_notice` where `EmpId`='$EmployeeId' or `EmpId`='All'");


?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
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
   <li><a href="#"><button class="btnmanu">My Letters</button></a></li>
   <li class="active"><a href="#"><button class="btnmanu">My Details</button></a></li>
   <li><a href="#"><button class="btnmanu">Salary Letters</button></a></li>
   <li><a href="#"><button class="btnmanu">Hr Policies &amp; User Guides</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <div class="hris-topmanu">
  <ul>
   <li><a href="HRISmydetail.php">Basic Details</a></li>
   <li><a href="HRISpositiondetail.php">Position Details</a></li>
   <li class="active"><a href="HRIScontactdetail.php">Contact Details</a></li>
   <li><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>CONTACT DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div>
    <ul>
     <li class="active"><a href="HRIScontactdetail.php">View</a></li>
     <li><a href="HRIScontactedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <table>
     <tr class="col">
      <td>Contact Type</td>
      <td>Address</td>
      <td>City</td>
      <td>State</td>
      <td>Phone No.</td>
      <td>Action</td>
     </tr>
     <tr>
      <td><b>Permanent Address:</b></td>
      <td><?php echo $PermanentAddress; ?></td>
      <td><?php echo $Permanentcity; ?></td>
      <td><?php echo $PermanentState; ?></td>
      <td><?php echo $PermanentPhone; ?></td>
      <td><a href="HRIScontactedit.php" class="edit"></a><a href="#" onClick="delete()" class="delete"></a></td>
     </tr>
     <tr>
      <td><b>Current Address:</b></td>
      <td><?php echo $Address; ?></td>
      <td><?php echo $City; ?></td>
      <td><?php echo $State; ?></td>
      <td><?php echo $Phoneno; ?></td>
      <td><a href="HRIScontactedit.php" class="edit"></a><a href="#" onClick="delete()" class="delete"></a></td>
     </tr>
    </table>
   </div>
  </div>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include 'footer.php'; ?></div>
</body>
</html>