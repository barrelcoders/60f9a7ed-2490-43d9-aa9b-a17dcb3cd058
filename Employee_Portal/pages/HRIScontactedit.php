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
   <div><strong>CONTACT DETAILS:</strong>&nbsp; <?php echo $tn; ?></div>
   <div>
    <ul>
     <li><a href="HRIScontactdetail.php">View</a></li>
     <li class="active"><a href="HRIScontactedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <form action="#" method="post">
    <table>
     <tr class="col">
      <td colspan="2"><b>Permanent Address:</b></td>
      <td colspan="2"><b>Current Address:</b></td>
     </tr>
     <tr>
      <td>Address</td>
      <td><input type="text" class="text-box " name="currentaddress" id="currentaddress" value="<?php echo $tpad; ?>"></td>
      <td>Address</td>
      <td><input type="text" class="text-box " name="currentaddress" id="currentaddress" value="<?php echo $tca; ?>"></td>
     </tr>
     <tr>
      <td>City</td>
      <td><input type="text" id="city" name="city" class="text-box" value="<?php echo $tpct; ?>"></td>
      <td>City</td>
      <td><input type="text" id="city" name="city" class="text-box" value="<?php echo $tcc; ?>"></td>
     </tr>
     <tr>
      <td>State</td>
      <td><input type="text" id="state" name="state" class="text-box" value="<?php echo $tpst; ?>"></td>
      <td>State</td>
      <td><input type="text" id="state" name="state" class="text-box" value="<?php echo $tcs; ?>"></td>
     </tr>
     <tr>
      <td>Phone No.</td>
      <td><input type="tel" id="phoneno" name="phoneno" class="text-box" value="<?php echo $tppn; ?>"></td>
      <td>Phone No.</td>
      <td><input type="tel" id="phoneno" name="phoneno" class="text-box" value="<?php echo $tcpn; ?>"></td>
     </tr>
     <tr>
     <td colspan="4" align="center"><input type="submit" class="save" value="SAVE"></input>&nbsp;
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