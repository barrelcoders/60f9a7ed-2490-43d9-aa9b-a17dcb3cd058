<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../Hris/l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
   <script src="../../js/jquery.min.js"></script>
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
   <li class="active"><a href="payroll.php"><button class="btnmanu">View Payslip</button></a></li>
   <li><a href="payrollfbp.php"><button class="btnmanu">FBP Planner</button></a></li>
   <li><a href="investment_declaration.php"><button class="btnmanu">Investment Declaration</button></a></li>
   <li><a href="#payrollnewfbp.php"><button class="btnmanu">NEW FBP CLAIM</button></a></li>
   <li><a href="#payrollmyfbp.php"><button class="btnmanu">MY FBP CLAIMS</button></a></li>
   <li><a href="payrollform16.php"><button class="btnmanu">Form16</button></a></li>
   <li><a href="#payrollnpsdecl.php"><button class="btnmanu">NPS Declaration</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <form action="#" method="post">
  <div class="payroll-topmanu">
   <!--------------->   
   <div class="payslip">Payslip</div>
   <div class="payroll-table">
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
      <td><strong>Select Month&nbsp;:</strong>&nbsp;&nbsp;&nbsp;
              <select name="viewmonth" id="viewmonth" class="text-box1" required>
             		<option value="January">January</option>
             		<option value="February">February</option>
             		<option value="March">March</option>
		            <option value="April">April</option>
          		    <option value="May">May</option>
             		<option value="June">June</option>
             		<option value="July">July</option>
             		<option value="August">August</option>
             		<option value="September">September</option>
             		<option value="October">October</option>
             		<option value="November">November</option>
             		<option value="December">December</option>
          		</select>
    		</td>
   </tr>
  </tr>
  </table>
  </div>
  </div>
  <div class="payroll-btn"><!--<input type="submit" name="submit" id="submit" value="VIEW" onClick="show('payslip');" class="btn">-->
  							<a href="payslip.php" name="view" id="view" class="btn">View</a>&nbsp;&nbsp;
    						 <input type="reset" name="cancel" id="cancel" value="CANCEL" class="btnc">
  </div>
 </form>
 <div id="payslip" style="display:none;" class="payslip-table">
  
 </div>
 <script>
  function show (toBlock){
    setDisplay(toBlock, 'block');
  }
  function setDisplay (target, str) {
    document.getElementById(target).style.display = str;
  }
</script>
 </div>
</div>
</div>
</div>
<div><?php include '../footer.php'; ?></div>
</body>
</html>