<?php
session_start();

include '../../connection.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `BankName`,`IFSCCode`,`AccountType`,`EmpAccountNo`,`Name`,`BankBranch`,`BankBranchAddress`,`PayeeName` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$BankName=$row[0];
			$IFSCCode=$row[1];
			$AccountType=$row[2];
			$EmpAccountNo=$row[3];
			$Name=$row[4];
			$BankBranch=$row[5];
			$BankBranchAddress=$row[6];
			$PayeeName=$row[7];
			
			
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
   <li><a href="HRIScontactdetail.php">Contact Details</a></li>
   <li><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li><a href="HRISeducationdetail.php">Education Details</a></li>
   <li class="active"><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-bankdetails">
   <div class="basic position">
   <div><strong>BANK DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div class="active"><a href="#">View</a></div>
    <!--<ul>
     <li class="active"></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>-->
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <table>
     <tr class="col">
      <td>Name Of Bank</td>
      <td>Ifsc Code</td>
      <td>Account Type</td>
      <td>Account Number</td>
      <td>Branch Name</td>
      <td>Branch Address</td>
      <td>Payee Name</td>
      <td>Action</td>
     </tr>
     <tr>
      <td><b><?php echo $BankName; ?></b></td>
      <td><?php echo $IFSCCode; ?></td>
      <td><?php echo $AccountType; ?></td>
      <td><?php echo $EmpAccountNo; ?></td>
      <td><?php echo $BankBranch; ?></td>
      <td><?php echo $BankBranchAddress; ?></td>
      <td><?php echo $PayeeName; ?></td>
      <td></td>
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
<div><?php include 'footer.php'; ?></div>
</body>
</html>