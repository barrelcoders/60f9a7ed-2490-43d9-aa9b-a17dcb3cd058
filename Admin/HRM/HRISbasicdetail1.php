<?php
session_start();

include '../Header/Header3.php';
include '../../connection.php';
?>

<?php
if(isset($_POST['Basicsubmit']))
{
	$Title=$_POST['txttitle'];
	$Name=$_POST['txtname'];
	$DOB=$_POST['cbodob'];
	$Gender=$_POST['cbogender'];
	$MaritalStatus=$_POST['cbomarital'];
	$PersonalEmail=$_POST['cbopemail'];
	$MobileNo=$_POST['cbomobile'];
	$ProfilePhoto=$_POST['userimage'];
	
	mysql_query("INSERT INTO `employee_master`( `Title`, `Name`, `DOB`, `Gender`, `MaritalStatus`, `PersonalEmail`, `MobileNo`, `ProfilePhoto`) VALUES ('$Title','$Name','$DOB','$Gender','$MaritalStatus','$PersonalEmail','$MobileNo','$ProfilePhoto')");

}
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../../Bootstrap/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->

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
   <li class="active"><a href="HRISbasicdetail.php">Basic Details</a></li>
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
   <form action="HRISpositiondetail.php" method="post" >
    <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=0; echo $x; ?>%"></div>
     <div align="center"><font><?php echo $x; ?>% Complete Your Profile</font></div>
	</div>
  <!------>
  <div class="basic1"><strong>PERSONAL DETAILS</strong> </div>
  <!------>
  <div class="showdetail1">
   
   <div class="img"><input type="file" name="userimage" id="userimage" width="200px" height="150px"></div>
   <div class="details"> 
    <table>
     <tr><td>Title</td><td>:</td><td><select name="txttitle" id="txttitle" class="text-box tbs">
     				<option value="">Select One</option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs</option>
                             </select></td></tr>
     <tr><td>Employee Name</td><td>:</td><td><input type="text" name="txtname" id="txtname" class="text-box"></td></tr>
    
     <tr><td>Date Of Birth</td><td>:</td><td><input type="date" name="cbodob" id="cbodob" class="text-box tbs"></td></tr>
     <tr><td>Gender</td><td>:</td><td><select name="cbogender" id="cbogender" class="text-box tbs">
     							<option value="">Select One</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                             </select>
     </td></tr>
     <tr><td>Marital Status</td><td>:</td><td><select name="cbomarital" id="cbomarital" class="text-box tbs">
     							<option value="">Select One</option>
                                <option value="single">Single</option>
                                <option value="Married">Married</option>
                             </select>
     </td></tr>
     <tr><td>Personal Email</td><td>:</td><td><input type="email" name="cbopemail" id="cbopemail" class="text-box"></td></tr>
     <tr><td>Mobile</td><td>:</td><td><input type="tel" name="cbomobile" id="cbomobile" class="text-box"></td></tr>
     
    </table>
   </div>
  </div>
  <!------------->
 <!--- <div class="health"><strong>HEALTH INFORMATION</strong></div>-->
  <!------------------>
  <div align="center"><input type="submit" id="Basicsubmit" name="Basicsubmit" class="btn"></div>
  </form>
 </div>
 
</div>
</div>
</div></div>
<div><?php include '../../footer.php'; ?></div>
</body>
</html>