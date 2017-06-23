<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title> </title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header2.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="Employeefinancial.php"><button class="btnmanu">Define Employee Salary</button></a></li>
   <li><a href="Employeefinancialmodify.php"><button class="btnmanu">Modify Employee Salary</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emplfinancial-salary">
   <div class="emplfinancial">Define Employee Salary</div>
   <form action="#" method="post" >
   <div class="row row-top">
    <div class="col-xs-3"><b>Enter Employee ID*</b></div>
    <div class="col-xs-4" style="padding-left:3.5%;"><input type="text" name="imployeeid" id="employeeid" class="text-box" style="width:62%;" ></div>
    <div class="col-xs-5"><input type="submit" name="filldetail" id="filldetail" class="btn" onClick="show('comment');" value="Fill Details"></div>
   </div>
   <div id="comment" style="display:block; margin-top:0%; padding:0 10%;">
    <div class="row">
     <div class="col-xs-3">Date</div>
     <div class="col-xs-3"><input type="date" name="salarydate" id="salarydate" class="text-box tbd"></div>
     <div class="col-xs-3">Financial Year</div>
     <div class="col-xs-3"><select name="financilyear" id="financilyear" class="text-box tbs">
     					   	<option value="">Select One</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                           </select>
     </div>
    </div>
    <div class="row">
     <div class="col-xs-3">Employee Name</div>
     <div class="col-xs-3"><input type="text" name="employeename" id="employeename" class="text-box"></div>
     <div class="col-xs-3">Enter PF No*</div>
     <div class="col-xs-3"><input type="text" name="employeepfno" id="employeepfno" class="text-box"></div>
    </div>
    <div class="row">
     <div class="col-xs-3">Department</div>
     <div class="col-xs-3"><input type="text" name="employeedepartment" id="employeedepartment" class="text-box"></div>
     <div class="col-xs-3">	Designation</div>
     <div class="col-xs-3"><input type="text" name="employeedesignation" id="employeedesignation" class="text-box"></div>
    </div>
    <div class="emplfinancial-table">
     <table>
      <tr class="col"> <td colspan="2">Define Earnings</td></tr>
      <tr> <td>Pay band : (A)</td><td><input type="number" name="paybandamount" id="paybandamount" class="text-box"></td></tr>
      <tr> <td>Grade Pay : (B)</td><td><input type="number" name="gradepayamount" id="gradepayamount" class="text-box"></td></tr>
      <tr> <td>Add. Grade Pay (C = 10% of B)</td><td><input type="number" name="addgradepayamount" id="addgradepayamount" class="text-box"></td></tr>
      <tr> <td>T.A.</td><td><input type="number" name="taamount" id="taamount" class="text-box" value="600"></td></tr>
      <tr> <td>T.A.D.A.</td><td><input type="number" name="tadaamount" id="tadaamount" class="text-box" value="750"></td></tr>
      <tr class="col1"> <td><b>Net Salary : (A + B + C) - (E + F)</b></td><td><b><?php $x=50000; echo $x; ?></b></td></tr>
     </table>
    </div>
   <div class="col-xs-12" align="center" style="margin-top:1%;"><input type="submit" name="submit" value="SUBMIT" class="btn"></div>
   </div>
   </form>
  </div>
 </div>
</div>

<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
