<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title> </title><link rel="icon" href="../l.png" type="image/x-icon">
   
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
    <li><a href="Emplpaysetam_Department_Master.php"><button class="btnmanu">Department Master</button></a></li>
    <li><a href="Emplpaysetam_adddepartment.php"><button class="btnmanu">Add Department</button></a></li>
    <li><a href="Emplpaysetam_adddesignation.php"><button class="btnmanu">Add Designation</button></a></li>
    <li><a href="Emplpaysetam_addpayband.php"><button class="btnmanu">Add Payband</button></a></li>
    <li><a href="Emplpaysetam_addsection.php"><button class="btnmanu">Add Section Field</button></a></li>
    <li><a href="Emplpaysetam_addinvestment.php"><button class="btnmanu">Add Investment Type</button></a></li>
    <li><a href="Emplpaysetam_addleave.php"><button class="btnmanu">Add Leave Types</button></a></li>
   </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="emplmaster-desig">
   <div class="emplmastertop">Add Payband</div>
   <div class="row">
    <div class="col-xs-4"><b>1.</b>&nbsp;Department Name :</div>
    <div class="col-xs-8"><select name="adddepartmentname" id="adddepartmentname" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value=""></option>
                          </select>
    </div>
    <div class="col-xs-4"><b>2.</b>&nbsp;Designation Name :</div>
    <div class="col-xs-8"><select name="adddesignationname" id="adddesignationname" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value=""></option>
                          </select>
    </div>
    <div class="col-xs-4"><b>3.</b>&nbsp;Pay Band :</div>
    <div class="col-xs-8"><input type="text" name="payband" id="payband" class="text-box"></div>
    <div class="col-xs-4"><b>4.</b>&nbsp;Grade Pay :</div>
    <div class="col-xs-8"><input type="text" name="gradepay" id="gradepay" class="text-box"></div>
    <div class="col-xs-4"><b>5.</b>&nbsp;Additional Grade Pay :</div>
    <div class="col-xs-8"><input type="text" name="additionalgradepay" id="additionalgradepay" class="text-box"></div>
  </div>
  <div class="col-xs-12" align="center"><input type="submit" onClick="show('comment');" class="btn" value="Submit"></div>
 </div>
 <div class="empdepartment-table" style="display:block;" id="comment">
  <table>
   <tr class="col"> <td>Sr.No.</td><td>Department</td><td>Designation</td><td>Payband</td><td>Grade Pay</td><td>Add Grade Pay</td> </tr>
   <tr> <td>1.</td> <td>XYZ</td> <td>HIJ</td> <td>EFG</td> <td>MNO</td> <td>UVW</td> </tr>
   <tr> <td>2.</td> <td>XYZ</td> <td>HIJ</td> <td>EFG</td> <td>MNO</td> <td>UVW</td> </tr>
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
</script>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
