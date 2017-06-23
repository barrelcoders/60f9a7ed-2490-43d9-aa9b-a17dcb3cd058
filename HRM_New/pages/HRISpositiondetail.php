<?php
session_start();

include '../../connection.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `EmpId`,`email`,`Designation`,`DOJ`,`HR_Approver_Id`,`L1_Approver_Id`,`EmploymentType`,`ProbationPeriod`,`status`,`Grade`,`GlobalManager`,`L2_Approver_Id`,`ConfirmationStatus`,`NoticePeriod`,`ConfirmationDueDate`,`RelievingDate`,`Name`,`OrgUnit` ,`WorkSite`from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$EmpId=$row[0];
			$email=$row[1];
			$Designation=$row[2];
			$DOJ=$row[3];
			$HR_Approver_Id=$row[4];
			$L1_Approver_Id=$row[5];
			$EmploymentType=$row[6];
			$ProbationPeriod=$row[7];
			$status=$row[8];
			$Grade=$row[9];
			$GlobalManager=$row[10];
			$L2_Approver_Id=$row[11];
			$ConfirmationStatus=$row[12];
			$NoticePeriod=$row[13];
			$ConfirmationDueDate=$row[14];
			$RelievingDate=$row[15];
			$Name=$row[16];
			$OrgUnit=$row[17];
			$WorkSite=$row[18];
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
   <li class="active"><a href="HRISpositiondetail.php">Position Details</a></li>
   <li><a href="HRIScontactdetail.php">Contact Details</a></li>
   <li><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-positiondetails">
   <div class="basic position">
   <div><strong>POSITION DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div class="active"><a href="#">View</a></div>
    <!--<ul>
     <li class="active"></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>-->
  </div>
  <!------>
  <div class="personal"><strong>POSITION INFORMATION</strong></div>
  <!------>
  <div class="showdetail">
   <div class="details"> 
    <table>
     <tr><td>Employee Code</td><td>:</td><td><?php echo $EmpId; ?></td></tr>
     <tr><td>Official Email</td><td>:</td><td><?php echo $email; ?></td></tr>
     <tr><td>Designation</td><td>:</td><td><?php echo $Designation; ?></td></tr>
     <tr><td>L1 Manager</td><td>:</td><td><?php echo $L1_Approver_Id; ?></td></tr>
     <tr><td>HR Manager</td><td>:</td><td><?php echo $HR_Approver_Id; ?></td></tr>
     <tr><td>Employment Type</td><td>:</td><td><?php echo $EmploymentType; ?></td></tr>
     <tr><td>Probation Period (In Days)</td><td>:</td><td><?php echo $ProbationPeriod; ?></td></tr>
     <tr><td>Confirmation Status</td><td>:</td><td><?php echo $ConfirmationStatus; ?></td></tr>
    </table>
   </div>
   <div class="details"> 
    <table>
     <tr><td>Date Of Joining</td><td>:</td><td><?php echo $DOJ; ?></td></tr>
     <tr><td>Grade</td><td>:</td><td><?php echo $Grade; ?></td></tr>
     <tr><td>Global Manager</td><td>:</td><td><?php echo $GlobalManager; ?></td></tr>
     <tr><td>L2 Manager</td><td>:</td><td><?php echo $L2_Approver_Id; ?></td></tr>
     <tr><td>Employment Status</td><td>:</td><td><?php echo $status; ?></td></tr>
     <tr><td>Notice Period</td><td>:</td><td><?php echo $NoticePeriod; ?></td></tr>
     <tr><td>Confirmation Due Date</td><td>:</td><td><?php echo $ConfirmationDueDate; ?></td></tr>
     <tr><td>Relieving Date</td><td>:</td><td><?php echo $RelievingDate; ?></td></tr>
     
    </table>
   </div>
  </div>
  <!------------->
  <div class="work">
   <div><strong>WORK INFORMATION</strong></div>
    <table style="width:100%">
     <tr><td>Org Unit:</td>
         <td><?php echo $OrgUnit; ?></td> </tr>
     <tr> <td>Work Site</td>  <td><?php echo $WorkSite; ?></td> </tr>
    </table>
   </div>
  <!------------------>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>