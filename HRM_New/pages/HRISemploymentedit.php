<?php
session_start();

include '../../connection.php';
include '../../APPConf.php';

$EmployeeId=$_SESSION['userid'];
if(isset($_REQUEST['cbosubmit'])){
   

    
  $result=mysql_query("UPDATE  `employee_master` SET  `Department` =   '".$_POST['txtTitle']."', `DOJ` =   '".$_POST['startdate']."', `EndDate` =   '".$_POST['enddate']."', `Location` =   '".$_POST['Location']."'  WHERE  `EmpId` ='$EmployeeId'");
    
}
$rsEmp=mysql_query("select `Department`,`Name`,`DOJ`,`EndDate`,`Location` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$Department=$row[0];
			$Name=$row[1];
			$DOJ=$row[2];
			$EndDate=$row[3];
			$Location=$row[4];
			
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
   <li class="active"><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>EMPLOYMENT DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div>
    <ul>
     <li><a href="HRISemploymentdetail.php">View</a></li>
     <li class="active"><a href="HRISemploymentedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  
  <div class="showdetail">
   <div class="cdetails">
   <form action="" method="post" name="modifyemployeedetail"> 
    <table>
      <tr>
      <td>School Name</td>
      <td><input type="text" name="CompanyName" class="text-box" value="<?php echo $SchoolName; ?>" readonly></td>
      <td>Title</td>
      <td><input type="text" name="txtTitle" class="text-box" value="<?php echo $Department; ?>"></td>
     </tr>
     <tr>
      <td>Start Date</td>
      <td><input type="date" name="startdate" class="text-box" value="<?php echo $DOJ; ?>" ></td>
      <td>End Date</td>
      <td><input type="date" name="enddate" class="text-box" value="<?php echo $EndDate; ?>"></td>
     </tr>
      <tr>      
      <td>Location</td>
      <td><textarea name="Location" class="text-box" value="<?php echo $Location; ?>"><?php echo $Location; ?></textarea> </td>
      <td colspan="2">&nbsp;</td>
     </tr>
     <tr>
      <td colspan="4" align="center"><input type="submit" class="save" value="SAVE" name="cbosubmit"></input>&nbsp;
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