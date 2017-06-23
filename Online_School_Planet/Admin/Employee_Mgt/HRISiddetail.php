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
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li class="active"><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!------>
  <div class="show-contactdetails">
   <form action="#" method="post">
   <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=84; echo $x; ?>%" ><font style="float:right; color:#fff; margin-right:25%;"><?php echo $x; ?>% Complete Your Profile</font></div>
	</div>
  <!------>
   <div class="basic position"><strong>ID DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="cdetails"> 
    <div>
    <table>
     <tr>
      <td>ID Type</td><td>:</td>
      <td><select type="text" name="idtype" class="text-box tbs" >
           	<option value="">Selct One</option>
            <option value="passport">Passport</option>
            <option value="aadhaarcard">Aadhaar Card</option>
            <option value="rationcard">Ration Card</option>
            <option value="PANcard">PAN Card</option>
            <option value="drivinglicense ">Driving License</option>
            <option value="voterID">Voter ID</option>
          </select>
      </td>
     </tr>
     <tr>
      <td>Issue Date</td><td>:</td>
      <td><input type="date" name="issuedate" class="text-box tbs" placeholder="Ifsc Code"></td>
     </tr>
     <tr>
      <td>Issue Place</td><td>:</td>
      <td><input type="text" name="issueplace" placeholder="Branch Name" class="text-box"  ></td>
     </tr>
    </table>
    </div>
    <div>
    <table>   
     <tr>
      <td>ID No.</td><td>:</td>
      <td><input type="text" name="accountno" class="text-box" placeholder="Account No." ></td>
     </tr>
     <tr>
      <td>Expiry Date</td><td>:</td>
      <td><input type="date" name="expirydate" class="text-box tbs" placeholder="Ifsc Code"></td>
     </tr>
    </table>
    </div>
    <div align="center" style="margin-top:2%; width:100%">
     <input type="submit" id="submit" onClick="submit()" class="btn">
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