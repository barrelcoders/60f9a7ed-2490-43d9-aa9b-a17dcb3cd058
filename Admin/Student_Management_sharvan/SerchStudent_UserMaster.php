<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Student Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
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
   <li><a href="AlumniStudent_SearchStudent.php"><button class="btnmanu">Search Alumni Students</button></a></li>
   <li><a href="CheckUser_Name_Password.php"><button class="btnmanu">Check User Name Password</button></a></li>
   <li class="active"><a href="SerchStudent_UserMaster.php"><button class="btnmanu">Search Student in User Master</button></a></li> 
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
 
 
 
 
 
 




