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
   <div><strong>POSITION DETAILS:</strong>&nbsp; <?php echo $tn; ?></div>
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
     <tr><td>Employee Code</td><td>:</td><td><?php echo $teii; ?></td></tr>
     <tr><td>Official Email</td><td>:</td><td><?php echo $tei; ?></td></tr>
     <tr><td>Designation</td><td>:</td><td><?php echo $tdg; ?></td></tr>
     <tr><td>L1 Manager</td><td>:</td><td><?php echo $tl1i; ?></td></tr>
     <tr><td>HR Manager</td><td>:</td><td><?php echo $thri; ?></td></tr>
     <tr><td>Employment Type</td><td>:</td><td><?php echo $tet; ?></td></tr>
     <tr><td>Probation Period (In Days)</td><td>:</td><td><?php echo $tpp; ?></td></tr>
     <tr><td>Confirmation Status</td><td>:</td><td><?php echo $tcs; ?></td></tr>
    </table>
   </div>
   <div class="details"> 
    <table>
     <tr><td>Date Of Joining</td><td>:</td><td><?php echo $tdoj; ?></td></tr>
     <tr><td>Grade</td><td>:</td><td><?php echo $tgrade; ?></td></tr>
     <tr><td>Global Manager</td><td>:</td><td><?php echo $tgm; ?></td></tr>
     <tr><td>L2 Manager</td><td>:</td><td><?php echo $tl2i; ?></td></tr>
     <tr><td>Employment Status</td><td>:</td><td><?php echo $tsts; ?></td></tr>
     <tr><td>Notice Period</td><td>:</td><td><?php echo $tnp; ?></td></tr>
     <tr><td>Confirmation Due Date</td><td>:</td><td><?php echo $tcdd; ?></td></tr>
     <tr><td>Relieving Date</td><td>:</td><td><?php echo $trd; ?></td></tr>
     
    </table>
   </div>
  </div>
  <!------------->
  <div class="work">
   <div><strong>WORK INFORMATION</strong></div>
    <table>
     <tr> <td>Org Unit:</td>  <td><?php echo $tou; ?></td> </tr>
     <tr> <td>Work Site</td>  <td><?php echo $tws; ?></td> </tr>
    </table>
   </div>
  <!------------------>
 </div>
</div>
</div>
</div></div>
</body>
</html>
<div><?php include 'footer.php'; ?></div>