<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../Hris/l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
   <script src="../../js/jquery.min.js"></script>
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
   <li><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="#payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li class="active"><a href="payrollproofsubmission.php"><button class="btnmanu">Proof Submission</button></a></li>
   <li><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="row proofsubmission">
   <div class="col-md-6">PROOF SUBMISSION FOR THE YEAR 2016-2017</div>
   <div class="col-md-6" align="right">Proof Submission Guidelines &nbsp;VIEWHISTORY</div>
  </div>
  <div class="payroll-topmanu">
   <!--------------->   
   <div class="payslip">Employee Information</div>
   <div class="proof-table">
    <table>
     <tr> <td>Employee Code:</td> <td>105421</td> <td>Employee Name:</td><td>ABC</td> </tr>
     <tr> <td>Date Of Joining:</td> <td>Sep 04, 2010</td> <td>Gender:</td><td>Male</td> </tr>
     <tr> <td>Date Of Birth:</td> <td>Sep 04, 2000</td> <td>Pan Number:</td><td>AGE567G589G</td> </tr>
  </table>
  </div>
  </div>
  <div class="proof-table2">
   <div class="payslip1">Investment Declaration</div>
   <p>You have not yet submitte your Investment Declaration</p>
  </div>
  <div class="proof-table3">
   <div class="payslip1">Declaration</div>
   <p>I hereby confirm thet I have invested / contributed the above mentioned amounts for the purpose of rebate / deduction to be considered in calculating my income tax for the current financial year. I further undertake that wherever eligible investments are made of spouse / children / dependent parents, the same have been made out of my income and claim therof has / shall not be made by anybody else.</p>
  </div>
 </form>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>