<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
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
   <li><a href="HRISmydetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li class="active"><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>CONTACT DETAILS:</strong>&nbsp;Mohit Aggrawal</div>
   <div>
    <ul>
     <li class="active"><a href="HRIScontactdetail.php">View</a></li>
     <li><a href="HRIScontactedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <table>
     <tr class="col">
      <td>Contact Type</td>
      <td>Address</td>
      <td>City</td>
      <td>State</td>
      <td>Phone No.</td>
      <td>Action</td>
     </tr>
     <tr>
      <td><b>Permanent Address:</b></td>
      <td>C-60, Lajpat Nagar-II, New Delhi, India-200000</td>
      <td>New Delhi:</td>
      <td>New Delhi</td>
      <td>9586849244:</td>
      <td><a href="HRIScontactedit.php" class="edit"></a><a href="#" onClick="delete()" class="delete"></a></td>
     </tr>
     <tr>
      <td><b>Current Address:</b></td>
      <td>C-60, Lajpat Nagar-II, New Delhi, India-200000</td>
      <td>New Delhi:</td>
      <td>New Delhi</td>
      <td>9586849244:</td>
      <td><a href="HRIScontactedit.php" class="edit"></a><a href="#" onClick="delete()" class="delete"></a></td>
     </tr>
    </table>
   </div>
  </div>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include '../footer.php'; ?></div>
</body>
</html>