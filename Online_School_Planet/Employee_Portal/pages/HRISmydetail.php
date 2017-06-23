
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
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
   <div><strong>BASIC DETAILS:</strong>&nbsp; <?php echo $tn; ?></div>
   <div >
    <ul>
     <li class="active"><a href="HRISmydetail.php">View</a></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <div class="personal"><strong>PERSONAL INFORMATION</strong></div>
  <!------>
  <div class="showdetail">
   <div class="img"> <img src="<?php echo $tppp; ?>" ></div>
   <div class="details"> 
    <table>
     <tr><td>Title</td><td>:</td><td><?php echo $tt; ?></td></tr>
     <tr><td>Name</td><td>:</td><td><?php echo $tn; ?></td></tr>
     <tr><td>Date Of Birth</td><td>:</td><td><?php echo $tdob; ?></td></tr>
     <tr><td>Gender</td><td>:</td><td><?php echo $tg; ?></td></tr>
     <tr><td>Marital Status</td><td>:</td><td><?php echo $tms; ?></td></tr>
     <tr><td>Personal Email</td><td>:</td><td><?php echo $tpmi; ?></td></tr>
     <tr><td>Mobile</td><td>:</td><td><?php echo $tmn; ?></td></tr>
     
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
</div>
</body>
</html>
<div><?php include 'footer.php'; ?></div>