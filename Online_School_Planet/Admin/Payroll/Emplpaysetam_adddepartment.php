<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li class="addmanu active"><a href="#"><button class="btnmanu">My Master</button></a>
    <ul class="submanu">
     <li><a href="Emplpaysetam_adddepartment.php"><button class="btnmanu">Add Department</button></a></li>
     <li><a href="Emplpaysetam_adddesignation.php"><button class="btnmanu">Add Designation</button></a></li>
     <li><a href="Emplpaysetam_addpayband.php"><button class="btnmanu">Add Payband</button></a></li>
     <li><a href="Emplpaysetam_addsection.php"><button class="btnmanu">Add Section Field</button></a></li>
     <li><a href="Emplpaysetam_addinvestment.php"><button class="btnmanu">Add Investment Type</button></a></li>
     <li><a href="Emplpaysetam_addleave.php"><button class="btnmanu">Add Leave Types</button></a></li>
    </ul>
   </li>
   <li><a href="#"><button class="btnmanu">Department Master</button></a></li>
   <li><a href="#"><button class="btnmanu">Salary Earning Components</button></a></li>
   <li><a href="#"><button class="btnmanu">Salary Deduction Components</button></a></li>
   <li><a href="#"><button class="btnmanu">Define Leave Types</button></a></li>
   <li><a href="#"><button class="btnmanu">Salary Investment Heads</button></a></li>
   <li><a href="#"><button class="btnmanu">Create Department &amp; Designation</button></a></li>
   <li><a href="#"><button class="btnmanu">Create Investment Type</button></a></li>
   <li><a href="#"><button class="btnmanu">Create Provisional Components</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emplmaster">
   <div class="emplmastertop">Add Department</div>
   <div class="row">
    <div class="col-xs-4"><b>1.</b>&nbsp;Department Name :</div>
    <div class="col-xs-8"><input type="text" name="adddepartmentname" id="adddepartmentname" class="text-box"></div>
    <div class="col-xs-4"><b>2.</b>&nbsp;Status :</div>
    <div class="col-xs-8"><select name="departmentstatus" id="departmentstatus" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                          </select>
   </div>
  </div>
  <div class="col-md-12" align="center"><input type="submit" onClick="show('comment');" class="btn" value="Submit"></div>
 </div>
 <div class="empdepartment-table" style="display:none;" id="comment">
  <table>
   <tr class="col"> <td>Sr.No.</td><td>Department</td><td>Status</td>  </tr>
   <tr> <td>1.</td> <td>XYZ</td> <td>0</td> </tr>
   <tr> <td>2.</td> <td>XYZ</td> <td>1</td> </tr>
  </table>
 </div>
</div>
<script>
  function show (toBlock){
    setDisplay(toBlock, 'block');
	
		document.getElementById("form").style.display = "none";
  }
  function setDisplay (target, str) {
    document.getElementById(target).style.display = str;
  }
</script></div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
