<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include '../header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="active"><a href="SendSMSToEmployee.php"><button class="btnmanu">Send SMS to Employee </button></a></li>
   <li><a href="SendEmailToEmployee.php"><button class="btnmanu">Send Email to Employee  </button></a></li>
   <li><a href="#Employeemgt5_Communication3.php"><button class="btnmanu">SMS Logs  </button></a></li>
   <li><a href="#Employeemgt5_Communication4.php"><button class="btnmanu">Email Logs  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="employee_mgt">
   <div class="empmgt_top">Send SMS to Employees</div>
   <div class="emplmgt_comm">
    <div class="row">
    <div class="col-xs-2"><b>Select Date</b></div><div class="col-xs-1"><b>:</b></div>
    <div class="col-xs-9"><input type="date" name="communicationdate" id="communicationdate" class="text-box" ></div>
    <div class="col-xs-2"><b>Select Department</b></div><div class="col-xs-1"><b>:</b></div>
    <div class="col-xs-9"> <select name="commdepartment" id="commdepartment" class="text-box tbs" >
    													  	<option value="">Select One</option>
                                                            
                                                          </select>
    </div>
    <div class="col-xs-2"><b>Type SMS here </b></div><div class="col-xs-1"><b>:</b></div>
    <div class="col-xs-9"><textarea name="sms" id="sms" class="text-box tba" rows="6" ></textarea></div>
    </div>
    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
   </div>
  </div>
  </form>
 </div>
<!----------------->
</div>
<!----------------->
</div></div>
</body>
</html>
