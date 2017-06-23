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
   <li class="active"><a href="DiscountMaster.php"><button class="btnmanu">Discount Master </button></a></li>
   <li><a href="RouteMaster.php"><button class="btnmanu">Route Master </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="feemaster">
   <div class="feemaster_outer">
    <div class="feemaster_head">Fees Discount Master</div>
    <div class="feemaster_inner">
     <div class="table">
      <table class="table-responsive">
       <tr class="col">
        <td>Sr. No.</td><td>Discount Head</td><td>Discount On Fees Type</td><td>Discount Percentage</td><td>Financial Year</td><td>Edit</td>
       </tr>
       <tr>
        <td>1.</td><td>ABCD</td><td>ASDFG</td><td>10</td><td>2017</td>
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
		<a class="close" href="DiscountMaster.php">&times;</a>
		<div class="content"> <?php include 'Discountmaster_Edit.php'; ?> </div>
	</div>
 </div>
</div>
</body>
</html>
