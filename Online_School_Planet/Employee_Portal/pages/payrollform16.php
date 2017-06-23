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
   <li><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="#payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li><a href="payrollproofsubmission.php"><button class="btnmanu">Proof Submission</button></a></li>
   <li class="active"><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="payroll-topmanu">
   <!--------------->   
   <div class="payslip">FORM16</div>
   <div class="form16-table">
    <table>
     <tr> <td><strong>Select Year&nbsp;:</strong>&nbsp;&nbsp;&nbsp;
             <select name="viewyear" id="viewyear" class="text-box" required>
             	<option value="2016">2016</option>
             	<option value="2015">2015</option>
             	<option value="2014">2014</option>
             	<option value="2013">2013</option>
             	<option value="2012">2012</option>
             	<option value="2011">2011</option>
          	  </select>
          </td>
     </tr>
  </table>
  </div>
  </div>
  <div class="form16-btn"><a href="#/images/myw3schoolsimage.jpg" download><font>DOWNLOAD</font></a></div>
 </form>
 </div>
</div>
</div>
</div>
<div><?php include 'footer.php'; ?></div>
</body>
</html>