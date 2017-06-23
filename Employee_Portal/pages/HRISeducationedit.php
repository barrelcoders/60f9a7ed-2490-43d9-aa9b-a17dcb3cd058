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
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li class="active"><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>EDUCATION DETAILS:</strong>&nbsp; <?php echo $tn; ?></div>
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
    <table>
      <tr>
      <td>Degree</td>
      <td><input type="text" name="degree" class="text-box" value="<?php echo $teq; ?>"></td>
      <td>Institute Name/Location</td>
      <td><textarea name="institutename" class="text-box" value=""><?php echo $tin; ?></textarea> </td>
     </tr>
     <tr>
      <td>Specialization</td>
      <td><input type="text" name="specialization" class="text-box" value="<?php echo $tsz; ?>"></td>
      <td>Percentage/Final Grade</td>
      <td><input type="number" name="percentage" value="<?php echo $tdfg; ?>" class="text-box" min="0" max="100" ></td>
     </tr>
     <tr>
      <td>Start Date</td>
      <td><input type="date" name="startdate" class="text-box" value="<?php echo $tdsd; ?>"></td>
      <td>End Date</td>
      <td><input type="date" name="enddate" class="text-box" value="<?php echo $tded; ?>" ></td>
     </tr>
     <tr>
      <td colspan="4" align="center"><input type="submit" class="save" value="SAVE"></input>&nbsp;
      							 	 <input type="reset" class="reset" value="RESET"></input></td>
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
<div><?php include 'footer.php'; ?></div>
</body>
</html>