<?php
session_start();

include '../Header/Header3.php';
include '../../connection.php';
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
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row newemployee">
 <div class="col-md-2 hris-topmanu"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li class="active"><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!------>
  <div class="show-contactdetails">
   <form action="#" method="post">
   <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=56; echo $x; ?>%" ><font style="float:right; color:#fff;"><?php echo $x; ?>% Complete Your Pr</font></div>
     <div align="center"><font style="color:#000; margin-left:14.5%;">ofile</font></div>
	</div>
  <!------>
   <div class="basic position"><strong>EDUCATION DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="cdetails"> 
    <div>
    <table>
     <tr>
      <td>Degree</td><td>:</td>
      <td><input type="text" name="degree" class="text-box" placeholder="Degree"></td>
     </tr>
     <tr>
      <td>Specialization</td><td>:</td>
      <td><input type="text" name="specialization" class="text-box" placeholder="Specialization"></td>
     </tr>
     <tr>
      <td>Start Date</td><td>:</td>
      <td><input type="date" name="startdate" class="text-box tbs" ></td>
     </tr>
    </table>
    </div>
    <div class="emtable2">
    <table>
     <tr>
      <td>Institute Name/Location</td><td>:</td>
      <td><textarea name="institutename" class="text-box" placeholder="Institute Name / Location"></textarea> </td>
     </tr>
     
     <tr>
      <td>Percentage/Final Grade</td><td>:</td>
      <td><input type="number" name="percentage" placeholder="Percentage/Final Grade" class="text-box tbs" min="0" max="100" ></td>
     </tr>
     
     <tr>
      <td>End Date</td><td>:</td>
      <td><input type="date" name="enddate" class="text-box tbs" ></td>
     </tr>
    </table>
    </div>
    <div align="center" style="margin-top:2%; width:100%">
     <a id="submit" onClick="window.open('HRISbankdetail.php', '_top')" class="btn">Submit</a>
    </div>
   </div>
  </div>
 </form>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include '../../footer.php'; ?></div>
</body>
</html>