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
   <li><a href="AcademicSetup_ClassMaster.php"><button class="btnmanu">Class Master </button></a></li>
   <li><a href="ExamMaster.php"><button class="btnmanu">Exam Master </button></a></li>
   <li><a href="SubjectMaster.php"><button class="btnmanu">Subject Master </button></a></li>
   <li class="active"><a href="AddSubjectForMarksE.php"><button class="btnmanu">Add Subject for Marks Entry </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
