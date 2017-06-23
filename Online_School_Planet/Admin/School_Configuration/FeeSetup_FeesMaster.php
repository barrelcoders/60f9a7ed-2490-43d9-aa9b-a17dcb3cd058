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
   <li class="active"><a href="FeeSetup_FeesMaster.php"><button class="btnmanu">Fees Master </button></a></li>
   <li><a href="DiscountMaster.php"><button class="btnmanu">Discount Master </button></a></li>
   <li><a href="RouteMaster.php"><button class="btnmanu">Route Master </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="feemaster">
   <div class="feemaster_outer">
    <div class="feemaster_head">Fees Master</div>
    <div class="feemaster_inner">
     <div class="table">
      <table class="table-responsive">
       <tr class="col">
        <td>Sr. No.</td><td>Class</td><td>Quarter</td><td>Fees Head</td><td>Fees Amount</td><td>Edit</td>
       </tr>
       <tr>
        <td>1.</td><td>1</td><td>5000.00</td><td>4000.00</td><td>10000.00</td>
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
<div class="feeedit">
 <div id="popup1" class="overlay">
	<div class="popup" id="feeedit">
		<a class="close" href="FeeSetup_FeesMaster.php">&times;</a>
		<div class="content"> <?php include 'Feemaster_Edit.php'; ?> </div>
	</div>
 </div>
</div>
</body>
</html>
