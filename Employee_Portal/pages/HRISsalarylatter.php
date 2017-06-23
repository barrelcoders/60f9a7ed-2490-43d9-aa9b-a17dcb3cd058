<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
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
   <li><a href="#"><button class="btnmanu">My Letters</button></a></li>
   <li><a href="HRISmydetail.php"><button class="btnmanu">My Details</button></a></li>
   <li class="active"><a href="HRISsalarylatter.php"><button class="btnmanu">Salary Letters</button></a></li>
   <li><a href="#"><button class="btnmanu">Hr Policies &amp; User Guides</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="hris-salarylatter">  
   <div class="salarylatter">My Increment Latters</div>
  <!------>
    <div class="salary-table">
     <table>
      <tr> <td>Increment Latters of Financial Year:</td>
      	   <td> <select name="financialyear" id="financialyear" class="text-box tbs" >
        			<option value="">Select One</option>
            		<option value="">Apr 2016</option>
        		</select></td> </tr>
    <tr> <td>1234_ABC_xy, xyz.pdf: </td>
    <td><a href="#/images/myw3schoolsimage.jpg" download><font>DOWNLOAD</font></a></td> </tr>
   </table>
 </div>
  <!------------------>
 </div>
 </form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>