<?php
session_start();

include '../Header/Header3.php';
include '../../connection.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../../Bootstrap/bootstrap.min.js"></script>
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
   <li><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li class="active"><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
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
  <div class="show-positiondetails">
   <form action="#" method="post" >
   <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=14; echo $x; ?>%"></div>
     <div align="center"><font><?php echo $x; ?>% Complete Your Profile</font></div>
	</div>
  <!------>
  <div class="basic position"><strong>POSITION DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="details"> 
    <table>
     <tr><td>Employee Code</td><td>:</td><td><input type="number" name="emplcode" id="emplcode" class="text-box tbs" min="0"></td></tr>
     <tr><td>Official Email</td><td>:</td><td><input type="email" name="offemail" id="offemail" class="text-box" ></td></tr>
     <tr><td>Designation</td><td>:</td><td><input type="text" name="designation" id="designation" class="text-box" ></td></tr>
     <tr><td>L1 Manager</td><td>:</td><td><input type="text" name="l1manager" id="l1manager" class="text-box" ></td></tr>
     <tr><td>HR Manager</td><td>:</td><td><input type="text" name="hrmanager" id="hrmanager" class="text-box" ></td></tr>
     <tr><td>Employment Type</td><td>:</td><td><select name="empltype" id="empltype" class="text-box tbs" >
     												<option value="">Select One</option>
                                                    <option value="Permanentfull">Permanent Employee(Full-Time)</option>
                                                    <option value="Permanentpart">Permanent Employee(Part-Time)</option>
                                                    <option value="Fixedtermfull">Fixed-term Employee(Full-Time)</option>
                                                    <option value="Fixedtermpart">Fixed-term Employee(Part-Time)</option>
     										   </select>
     </td></tr>
     <tr><td>Probation Period (In Days)</td><td>:</td><td><input type="number" name="properiod" id="properiod tbs" class="text-box tbs" min="0" ></td></tr>
     <tr><td>Confirmation Status</td><td>:</td><td><select name="confstatus" id="confstatus" class="text-box tbs" >
     													<option value="Conform">Conform</option>
                                                    	<option value="Pending">Pending</option>
                                                   </select>
     </td></tr>
    </table>
   </div>
   <div class="details"> 
    <table>
     <tr><td>Date Of Joining</td><td>:</td><td><input type="date" name="joiningdate" id="joiningdate" class="text-box tbs" ></td></tr>
     <tr><td>Grade</td><td>:</td><td><input type="text" name="grade" id="grade" class="text-box" ></td></tr>
     <tr><td>Global Manager</td><td>:</td><td><input type="text" name="globalmanager" id="globalmanager" class="text-box" ></td></tr>
     <tr><td>L2 Manager</td><td>:</td><td><input type="text" name="l2manager" id="l2manager" class="text-box" ></td></tr>
     <tr><td>Employment Status</td><td>:</td><td><select name="emplstatus" id="emplstatus" class="text-box tbs" >
     												<option value="Active">Active</option>
                                                    <option value="Non-Active">Non-Active</option>
                                                 </select>
     </td></tr>
     <tr><td>Notice Period</td><td>:</td><td><input type="number" name="noticeperiod" id="noticeperiod" class="text-box tbs" min="0" ></td></tr>
     <tr><td>Confirmation Due Date</td><td>:</td><td><input type="Date" name="confduedate" id="confduedate" class="text-box tbs" ></td></tr>
     <tr><td>Relieving Date</td><td>:</td><td><input type="date" name="relievingdate" id="relievingdate" class="text-box tbs" ></td></tr>
     
    </table>
   </div>
  </div>
  <!------
  <div class="work1">
   <div><strong>WORK INFORMATION</strong></div>
    <table>
     <tr><td>Org Unit</td><td><strong>:</strong></td>
         <td><textarea name="orgunit" id="orgunit" class="text-box tbs"></textarea></td> 
         <td>Work Site</td> <td><strong>:</strong></td> <td><textarea name="worksite" id="worksite" class="text-box tbs"></textarea></td> </tr>
    </table>
   </div>-->
  <div align="center" style="margin-top:1%;"><a id="submit" onClick="window.open('HRIScontactdetail.php', '_top')" class="btn">Submit</a></div>
 </form>
  <!------------------>
 </div>
</div>
</div>
</div>
<div><?php include '../../footer.php'; ?></div>
</body>
</html>