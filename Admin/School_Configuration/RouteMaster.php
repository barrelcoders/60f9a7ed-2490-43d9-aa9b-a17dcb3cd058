<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>School Configuration</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/nexus.css" />
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
   <li><a href="FeeSetup_FeesMaster.php"><button class="btnmanu">Fees Master </button></a></li>
   <li><a href="DiscountMaster.php"><button class="btnmanu">Discount Master </button></a></li>
   <li class="active"><a href="RouteMaster.php"><button class="btnmanu">Route Master </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="feemaster">
   <div class="feemaster_outer">
    <div class="feemaster_head">Route Master</div>
    <div class="feemaster_inner">
     <div class="table">
      <table class="table-responsive">
       <tr class="col">
        <td>Sr. No.</td><td>Route No</td><td>Bus Number</td><td>Timing</td><td>	Driver Name</td><td>Driver Mobile</td><td>Route Details</td>
        <td>Route Charges</td><td>Financial Year</td><td>Edit</td>
       </tr>
       <tr>
        <td>1.</td>
        <td>1</td>
        <td>10</td>
        <td>04.00AM</td>
        <td>ASDFGHJK</td>
        <td>99999999999</td>
        <td>ASDFGHJKK</td>
        <td>DFGHJKL</td>
        <td>2017</td>
        <td><a class="button" href="#popup1">Edit</a></td>
       </tr>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
<div class="feeedit1">
 <div id="popup1" class="overlay">
	<div class="popup" id="feeedit1">
		<a class="close" href="RouteMaster.php">&times;</a>
		<div class="content"> <?php include 'Rootmaster_Edit.php'; ?> </div>
	</div>
 </div>
</div>
</body>
</html>
