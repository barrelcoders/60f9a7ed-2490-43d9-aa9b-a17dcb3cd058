<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Library Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
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
   <li><a href="Acquisition_Add.php"><button class="btnmanu">Acquire a Book </button></a></li>
   <li class="active"><a href="Purchase_Order.php"><button class="btnmanu">Purchase Orders </button></a></li>
   <li><a href="Acquisition_Register.php"><button class="btnmanu">Acquisition Register Jiva </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="studentwithdrawal">
    	<div class="studentwithdrawal_head"></div>
        <div class="studentroll">
        	<form action="" method="post">
	        	
            </form>                
        </div>
    </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
<?php include'../footer.php'; ?>
 
 
 
 




