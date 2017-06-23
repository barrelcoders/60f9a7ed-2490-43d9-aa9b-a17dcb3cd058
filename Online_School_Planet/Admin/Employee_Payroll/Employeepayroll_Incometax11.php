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
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="Employeepayroll_Incometax1.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="Employeepayroll_Incometax2.php"><button class="btnmanu">Submit Investment Proof</button></a></li>
   <li><a href="Employeepayroll_Incometax3.php"><button class="btnmanu">Declared Investment Report</button></a></li>
   <li><a href="Employeepayroll_Incometax4.php"><button class="btnmanu">Prepare Form 16</button></a></li>
   <li><a href="Employeepayroll_Incometax5.php"><button class="btnmanu">Tax Computation Sheet</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emptax-top" align="center"><img src="../images/dpslogo.png" style="width:30%;" ><br>Employee Investment Declarationt</div>
  <div class="employeetax-main">
  <form action="" method="post" id="form" >
   <div class="row incometax-table">
    <div class="col-xs-6"><b>Investment Head</b></div>
    <div class="col-xs-6"><select name="investmenthead" id="investmenthead" class="text-box tbs">
      	  	<option value="">Select One</option>
          </select></div>
    <div class="col-xs-6"><b>Amount(Limit 2,00,000)</b></div>
    <div class="col-xs-6"><input type="number" name="amount" id="amount" class="text-box" > </div>
    
   </div>
   <div class="col-xs-12" align="center" style="margin-top:2%;"><input type="submit" name="submit" id="submit" class="btn" value="Submit"></div>
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
