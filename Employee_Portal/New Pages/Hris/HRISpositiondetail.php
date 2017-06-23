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
   <li class="active"><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
  </div>
  <!------>
  <div class="show-positiondetails">
   <div class="basic position">
   <div><strong>POSITION DETAILS:</strong>&nbsp;Mohit Aggrawal</div>
   <div class="active"><a href="#">View</a></div>
    <!--<ul>
     <li class="active"></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>-->
  </div>
  <!------>
  <div class="personal"><strong>POSITION INFORMATION</strong></div>
  <!------>
  <div class="showdetail">
   <div class="details"> 
    <table>
     <tr><td>Employee Code</td><td>:</td><td>10532</td></tr>
     <tr><td>Official Email</td><td>:</td><td>mohitaggarwal@pearson.com</td></tr>
     <tr><td>Designation</td><td>:</td><td>Senior Territory Manager - Sales</td></tr>
     <tr><td>L1 Manager</td><td>:</td><td>Rahul Kumar Sahu - 10032</td></tr>
     <tr><td>HR Manager</td><td>:</td><td>Ayan Majumdar</td></tr>
     <tr><td>Employment Type</td><td>:</td><td>Permanent</td></tr>
     <tr><td>Probation Period (In Days)</td><td>:</td><td>0</td></tr>
     <tr><td>Confirmation Status</td><td>:</td><td>Confirmed</td></tr>
    </table>
   </div>
   <div class="details"> 
    <table>
     <tr><td>Date Of Joining</td><td>:</td><td>05/Sep/2011</td></tr>
     <tr><td>Grade</td><td>:</td><td>B3.0</td></tr>
     <tr><td>Global Manager</td><td>:</td><td></td></tr>
     <tr><td>L2 Manager</td><td>:</td><td>Ketaki Chaudhary - 11612</td></tr>
     <tr><td>Employment Status</td><td>:</td><td>Active</td></tr>
     <tr><td>Notice Period</td><td>:</td><td>60</td></tr>
     <tr><td>Confirmation Due Date</td><td>:</td><td>03/Mar/2012</td></tr>
     <tr><td>Relieving Date</td><td>:</td><td></td></tr>
     
    </table>
   </div>
  </div>
  <!------------->
  <div class="work">
   <div><strong>WORK INFORMATION</strong></div>
    <table>
     <tr><td>Org Unit:</td>
         <td><p>Pearson Education Service Pvt. Ltd > Pearson Eduction Service Pvt. Ltd > Pearson India Education Service Private Limited > School > School - Learning Services > School - Channel > Selling > Textbook.</p></td> </tr>
     <tr> <td>Work Site</td>  <td>India > Haryana > Faridabad.</td> </tr>
    </table>
   </div>
  <!------------------>
 </div>
</div>
</div>
</div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>