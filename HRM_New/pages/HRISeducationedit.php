<?php
session_start();

include '../../connection.php';
include '../../APPConf.php';

$EmployeeId=$_SESSION['userid'];
if(isset($_REQUEST['cbosubmit'])){
   

    
  $result=mysql_query("UPDATE  `employee_master` SET  `Education_Qualification` =   '".$_POST['txtdegree']."', `InstituteName` =   '".$_POST['institutename']."', `Specialization` =   '".$_POST['specialization']."', `DegreeFinalGrade` =   '".$_POST['percentage']."', `DegreeStartDate` =   '".$_POST['startdate']."', `DegreeEndDate` =   '".$_POST['enddate']."' WHERE  `EmpId` ='$EmployeeId'");
    
}
$rsEmp=mysql_query("select `Education_Qualification`,`Name`,`InstituteName`,`Specialization`,`DegreeFinalGrade`,`DegreeStartDate`,`DegreeEndDate` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$Education_Qualification=$row[0];
			$Name=$row[1];
			$InstituteName=$row[2];
			$Specialization=$row[3];
			$DegreeFinalGrade=$row[4];
			$DegreeStartDate=$row[5];
			$DegreeEndDate=$row[6];
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
   <li class="active"><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>EDUCATION DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div>
    <ul>
     <li><a href="HRISeducationdetail.php">View</a></li>
     <li class="active"><a href="HRISeducationedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
   <form method="post" name="modifyeducationdetail">
    <table>
      <tr>
      <td>Degree</td>
      <td><input type="text" name="txtdegree" class="text-box" value="<?php echo $Education_Qualification; ?>"></td>
      <td>Institute Name/Location</td>
      <td><textarea name="institutename" class="text-box" value="<?php echo $InstituteName; ?>"><?php echo $InstituteName; ?></textarea> </td>
     </tr>
     <tr>
      <td>Specialization</td>
      <td><input type="text" name="specialization" class="text-box" value="<?php echo $Specialization; ?>"></td>
      <td>Percentage/Final Grade</td>
      <td><input type="number" name="percentage" value="<?php echo $DegreeFinalGrade; ?>" class="text-box" min="0" max="100" ></td>
     </tr>
     <tr>
      <td>Start Date</td>
      <td><input type="date" name="startdate" class="text-box" value="<?php echo $DegreeStartDate; ?>" ></td>
      <td>End Date</td>
      <td><input type="date" name="enddate" class="text-box" value="<?php echo $DegreeEndDate; ?>" ></td>
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