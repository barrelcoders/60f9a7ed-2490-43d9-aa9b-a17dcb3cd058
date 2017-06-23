<?php
session_start();

include '../../connection.php';

$EmployeeId=$_SESSION['userid'];
if(isset($_REQUEST['cbosubmit'])){
   

    
  $result=mysql_query("UPDATE  `employee_master` SET  `PermanentAddress` =   '".$_POST['permanentaddress']."', `Permanentcity` =   '".$_POST['permanentcity']."', `PermanentState` =   '".$_POST['permanentstate']."', `PermanentPhone` =   '".$_POST['permanentphoneno']."', `Address` =   '".$_POST['currentaddress']."', `City` =   '".$_POST['currentcity']."', `State` =   '".$_POST['currentstate']."', `Phoneno` =   '".$_POST['currentphoneno']."'  WHERE  `EmpId` ='$EmployeeId'");
    
}
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
     <li><a href="HRIScontactdetail.php">View</a></li>
     <li class="active"><a href="HRIScontactedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <form action="#" method="post" name="updatecontactdetail">
    <table>
     <tr class="col">
      <td colspan="2"><b>Permanent Address:</b></td>
      <td colspan="2"><b>Current Address:</b></td>
     </tr>
     <tr>
      <td>Address</td>
      <td><input type="text" class="text-box " value="<?php echo $PermanentAddress; ?>" name="permanentaddress" id="currentaddress"></td>
      <td>Address</td>
      <td><input type="text" class="text-box " value="<?php echo $Address; ?>" name="currentaddress" id="currentaddress"></td>
     </tr>
     <tr>
      <td>City</td>
      <td><input type="text" id="city" name="permanentcity" class="text-box" value="<?php echo $Permanentcity; ?>"</td>
      <td>City</td>
      <td><input type="text" id="city" name="currentcity" class="text-box" value="<?php echo $City; ?>"></td>
     </tr>
     <tr>
      <td>State</td>
      <td><input type="text" id="state" name="permanentstate" class="text-box" value="<?php echo $PermanentState; ?>"></td>
      <td>State</td>
      <td><input type="text" id="state" name="currentstate" class="text-box" value="<?php echo $State; ?>"></td>
     </tr>
     <tr>
      <td>Phone No.</td>
      <td><input type="tel" id="phoneno" name="permanentphoneno" class="text-box" value="<?php echo $PermanentPhone; ?>">:</td>
      <td>Phone No.</td>
      <td><input type="tel" id="phoneno" name="currentphoneno" class="text-box" value="<?php echo $Phoneno; ?>">:</td>
     </tr>
     <tr>
     <td colspan="4" align="center"><input type="submit" name="cbosubmit" id="cbosubmit" class="save" value="SAVE"></input>&nbsp;
                                    <input type="reset" class="reset" value="RESET"></input></td>
     </tr>
    </table>
    </form>
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