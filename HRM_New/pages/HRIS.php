<?php session_start();?>
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
   <li class="active"><a href="#">Basic Details</a></li>
   <li><a href="#">Position Details</a></li>
   <li><a href="#">Contact Details</a></li>
   <li><a href="#">Employment Details</a></li>
   <li><a href="#">Education Details</a></li>
   <li><a href="#">Bank Details</a></li>
   <li><a href="#">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-basicdetails">
   <div class="basic">
   <div><strong>BASIC DETAILS</strong></div>
   <div >
    <ul>
     <li class="active"><a href="HRISbasicdetailview.php">View</a></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <div class="personal"><strong>PERSONAL INFORMATION</strong></div>
  <!------>
  <div class="showdetail">
   <div class="img"> <img src="../images/DPS Logo.jpg" ></div>
   <div class="details"> 
    <table>
     <tr><td>Title:</td><td>CEO</td></tr>
     <tr><td>First Name:</td><td>Mohit</td></tr>
     <tr><td>Middle Name:</td><td></td></tr>
     <tr><td>Last Name:</td><td>Aggarwal</td></tr>
     <tr><td>Date Of Birth:</td><td>07/FEB/2016</td></tr>
     <tr><td>Gender:</td><td>Male</td></tr>
     <tr><td>Marital Status:</td><td>Married</td></tr>
     <tr><td>Personal Email:</td><td></td></tr>
     <tr><td>Mobile:</td><td>Teacher</td></tr>
     
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
<div><?php include 'footer.php'; ?></div>
</body>
</html>