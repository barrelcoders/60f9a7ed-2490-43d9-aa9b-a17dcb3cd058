<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../../css/payroll.css" />
   <script src="../../../js/bootstrap.min.js"></script>
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
   <li class="active"><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!------>
  <div class="show-basicdetails">
   <form action="#" method="post" >
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
     <tr><td>Title</td><td>:</td><td><input type="text" name="title" id="title" class="text-box"></td></tr>
     <tr><td>Employee Name</td><td>:</td><td><input type="text" name="employeename" id="employeename" class="text-box"></td></tr>
     <tr><td>Date Of Birth</td><td>:</td><td><input type="date" name="dob" id="dob" class="text-box tbs"></td></tr>
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
     <tr><td>Mobile</td><td>:</td><td><input type="tel" name="mobile" id="mobile" class="text-box"></td></tr>
     
    </table>
   </div>
  </div>
  <!------------->
 <!--- <div class="health"><strong>HEALTH INFORMATION</strong></div>-->
  <!------------------>
  <div align="center"><a id="submit" onClick="window.open('HRISpositiondetail.php', '_top')" class="btn"> Submit</a></div>
  </form>
 </div>
 
</div>
</div>
<div><?php include '../../footer.php'; ?></div>
</body>
</html>