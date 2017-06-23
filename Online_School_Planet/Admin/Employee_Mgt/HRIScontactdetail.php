<?php
session_start();
include '../connection.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title> </title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../../Bootstrap/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row newemployee">
 <div class="col-md-2 hris-topmanu"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li class="active"><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
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
	 <div id="myBar" style="width:<?php $x=28; echo $x; ?>%" ></div>
     <div align="center"><font><?php echo $x; ?>% Complete Your Profile</font></div>
	</div>
  <!------>
   <div class="basic position"><strong>CONTACT DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="cdetails">
    <div>
     <table>
     <tr class="col"> <td colspan="3"><b>Permanent Address:</b></td> </tr>
     <tr>
      <td>Address</td><td>:</td>
      <td><input type="text" class="text-box " placeholder="Enter Your Permanent Address" name="permanentaddress" id="permanentaddress"></td>
     </tr>
     <tr>
      <td>City</td><td>:</td>
      <td><input type="text" id="city" name="city" class="text-box" placeholder="Enter Your City Name"></td>
     </tr>
     <tr>
      <td>State</td><td>:</td>
      <td><input type="text" id="state" name="state" class="text-box" placeholder="Enter Your State Name"></td>
     </tr>
     <tr>
      <td>Pin No.</td><td>:</td>
      <td><input type="text" id="pineno" name="pineno" class="text-box" placeholder="Enter Your Pin No."></td>
     </tr>
     <tr>
      <td>Phone No.</td><td>:</td>
      <td><input type="tel" id="phoneno" name="phoneno" class="text-box" placeholder="Enter Your Phone No."></td>
     </tr>
    </table>
    </div>
    <div>
    <table>
     <tr class="col"> <td colspan="3"><b>Current Address:</b></td>  </tr>
     <tr>
      <td>Address</td><td>:</td>
      <td><input type="text" class="text-box " placeholder="Enter Your Current Address" name="currentaddress" id="currentaddress"></td>
     </tr>
     <tr>
      <td>City</td><td>:</td>
      <td><input type="text" id="city" name="city" class="text-box" placeholder="Enter Your City Name"></td>
     </tr>
     <tr>
      <td>State</td><td>:</td>
      <td><input type="text" id="state" name="state" class="text-box" placeholder="Enter Your State Name"></td>
     </tr>
     <tr>
      <td>Pin No.</td><td>:</td>
      <td><input type="text" id="pineno" name="pineno" class="text-box" placeholder="Enter Your Pin No."></td>
     </tr>
     <tr>
      <td>Phone No.</td><td>:</td>
      <td><input type="tel" id="phoneno" name="phoneno" class="text-box" placeholder="Enter Your Phone No."></td>
     </tr>
    </table>
    </div>
    <div align="center" style="margin-top:2%; width:100%">
     <a id="submit" onClick="window.open('HRISemploymentdetail.php', '_top')" class="btn">Submit</a>
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