<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>School Configuration</title><link rel="icon" href="../l.png" type="image/x-icon">
   
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
   <li><a href="HRsetup_DepartmentMaster.php"><button class="btnmanu">Department Master </button></a></li>
   <li><a href="SalaryEarningCom.php"><button class="btnmanu">Salary Earning Components </button></a></li>
   <li><a href="SalaryDeductionCom.php"><button class="btnmanu">Salary Deduction Components </button></a></li>
   <li class="active"><a href="DefineLeaveType.php"><button class="btnmanu">Define Leave Types </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  &nbsp;
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
