<?php
session_start();

include '../../../connection.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `Title`,`Name`,`Department`,`Designation`,`DOB`,`Gender`,`EmpId`,`MobileNo`,`L1_Approver_Id`,`MaritalStatus`,`ProfilePhoto` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$Title=$row[0];
			$Name=$row[1];
			$Department=$row[2];
			$Designation=$row[3];
			$DOB=$row[4];
			$Gender=$row[5];
			$EmpId=$row[6];
			$MobileNo=$row[7];
			$ManagerId=$row[8];
			$MaritalStatus=$row[9];
			$ProfilePhoto=$row[10];
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
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
<form method="post" action="">
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
   <li class="active"><a href="HRISmydetail.php"><button class="btnmanu">My Details</button></a></li>
   <li><a href="HRISsalarylatter.php"><button class="btnmanu">Salary Letters</button></a></li>
   <li><a href="#"><button class="btnmanu">Hr Policies &amp; User Guides</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <div class="hris-topmanu">
  <ul>
   <li class="active"><a href="HRISmydetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
  </div>
  <!------>
  <div class="show-basicdetails">
   <div class="basic">
   <div><strong>BASIC DETAILS</strong></div>
   <div >
    <ul>
     <li><a href="HRISmydetail.php">View</a></li>
     <li class="active"><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <div class="personal"><strong>PERSONAL INFORMATION</strong></div>
  <!------>
  
  <div class="showdetail">
   <div class="img"> <img src="EmpPhoto/<?php echo $ProfilePhoto;?>" ><br>
   <a href="UploadEmployeeDocument.php?txtEmpNo=<?php echo $EmpId;?>" target=_blank>Upload New Photo</a></div>
   <div class="details"> 
   
    <table>
     <tr><td>Title</td><td>:</td><td><input type="text" name="title" id="title" value="<?php echo $Title; ?>" class="text-box"></td></tr>
     <tr><td>Name</td><td>:</td><td><input type="text" name="txtname" id="txtname" value="<?php echo $Name; ?>" class="text-box"></td></tr>
     
     <tr><td>Date Of Birth</td><td>:</td><td><input type="date" name="dob" id="dob" value="<?php echo $DOB; ?>" class="text-box tbs"></td></tr>
     <tr><td>Gender</td><td>:</td><td><select name="gender" id="gender" class="text-box tbs">
     							<option value="">Select One</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                             </select>
     </td></tr>
     <tr><td>Marital Status</td><td>:</td><td><select name="marital" id="marital" class="text-box tbs">
     							<option value="">Select One</option>
                                <option value="single">Single</option>
                                <option value="Married">Married</option>
                             </select>
     </td></tr>
     <tr><td>Personal Email</td><td>:</td><td><input type="email" name="pemal" id="pemail" class="text-box"></td></tr>
     <tr><td>Mobile</td><td>:</td><td><input type="text" name="mobile" id="mobile" value="<?php echo $MobileNo; ?>" class="text-box"></td></tr>
     <tr><td colspan="3"><input type="submit" name="cbosubmit" id="cbosubmit" value="Submit" class="btn"></td></tr>
     
    </table>
    
   </div>
   
  </div>
 
  <!------------->
  <div class="health"><strong>HEALTH INFORMATION</strong></div>
  <!------------------>
 </div>
</div>
</div>
</div>
<div><?php include '../footer.php'; ?></div>
 </form>
</body>
</html>