<?php
session_start();

include '../../connection.php';

$EmployeeId=$_SESSION['userid'];
if(isset($_REQUEST['cbosubmit'])){
   

    
  $result=mysql_query("UPDATE  `employee_master` SET  `Title` =   '".$_POST['title']."', `Name` =   '".$_POST['txtname']."', `DOB` =   '".$_POST['dob']."', `Gender` =   '".$_POST['gender']."', `PersonalEmail` =   '".$_POST['pemail']."',
    `MobileNo` =   '".$_POST['mobile']."', `MaritalStatus` =   '".$_POST['marital']."'  WHERE  `EmpId` ='$EmployeeId'");
    
}
$rsEmp=mysql_query("select `Title`,`Name`,`Department`,`Designation`,`DOB`,`Gender`,`EmpId`,`MobileNo`,`L1_Approver_Id`,`MaritalStatus`,`ProfilePhoto`,`PersonalEmail` from `employee_master` where `EmpId` ='$EmployeeId'");
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
			$PersonalEmail=$row[11];
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
   <li class="active"><a href="HRISmydetail.php">Basic Details</a></li>
   <li><a href="HRISpositiondetail.php">Position Details</a></li>
   <li><a href="HRIScontactdetail.php">Contact Details</a></li>
   <li><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
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
      <form name="updateBasicDetail" id='' method="post" action="">
   <div class="img"> <img src="EmpPhoto/<?php echo $ProfilePhoto;?>" ><br>
   <a href="UploadEmployeeDocument.php?txtEmpNo=<?php echo $EmpId;?>" target=_blank>Upload New Photo</a></div>
   <div class="details"> 
   
    <table>
     <tr><td>Title</td><td>:</td><td><input type="text" name="title" id="title" value="<?php echo $Title; ?>" class="text-box"></td></tr>
     <tr><td>Name</td><td>:</td><td><input type="text" name="txtname" id="txtname" value="<?php echo $Name; ?>" class="text-box"></td></tr>
     
     <tr><td>Date Of Birth</td><td>:</td><td><input type="date" name="dob" id="dob" value="<?php echo $DOB; ?>" class="text-box tbs"></td></tr>
     <tr><td>Gender</td><td>:</td><td><select name="gender" id="gender" class="text-box tbs">
     							<option value="">Select One</option>
                                                        <option value="MALE"<?php if($Gender=="MALE"){ echo "selected";} ?>>Male</option>
                                <option value="FEMALE"<?php if($Gender=="FEMALE"){ echo "selected";} ?>>Female</option>
                             </select>
     </td></tr>
     <tr><td>Marital Status</td><td>:</td><td><select name="marital" id="marital" class="text-box tbs">
     							<option value="">Select One</option>
                                <option value="Single" <?php if($MaritalStatus=="Single"){ echo "selected";} ?>>Single</option>
                                <option value="Married" <?php if($MaritalStatus=="Married"){ echo "selected";} ?>>Married</option>
                             </select>
     </td></tr>
     <tr><td>Personal Email</td><td>:</td><td><input type="email" name="pemail" id="pemail" value="<?php echo $PersonalEmail; ?>" class="text-box"></td></tr>
     <tr><td>Mobile</td><td>:</td><td><input type="text" name="mobile" id="mobile" value="<?php echo $MobileNo; ?>" class="text-box"></td></tr>
     <tr><td colspan="3"><input type="submit" name="cbosubmit" id="cbosubmit" value="Submit" class="btn"></td></tr>
     
    </table>
    
   </div>
      </form>
  </div>
 
  <!------------->
  <div class="health"><strong>HEALTH INFORMATION</strong></div>
  <!------------------>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
 
</body>
</html>