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
   <div class="emplmastertop">Add Leave</div>
   <div class="row">
    <div class="col-xs-4"><b>1.</b>&nbsp;Leave Name :</div>
    <div class="col-xs-8"><input type="text" name="leavename" id="leavename" class="text-box" > </div>
    <div class="col-xs-4"><b>2.</b>&nbsp;Max. Leaves in Session :</div>
    <div class="col-xs-8"><input type="text" name="maxleaveinsession" id="maxleaveinsession" class="text-box" > </div>
    <div class="col-xs-4"><b>3.</b>&nbsp;Financial Year :</div>
    <div class="col-xs-8"><select name="financialyear" id="financialyear" class="text-box tbs">
    					  	<option value="">Select One</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                          </select>
   </div>
  </div>
  <div class="col-xs-12" align="center"><input type="submit" onClick="show('comment');" class="btn" value="Submit"></div>
 </div>
 <div class="empdepartment-table" style="display:block;" id="comment">
  <table>
   <tr class="col"> <td>Sr.No.</td><td>Leave Type</td><td>Max. Leave</td><td>Financial Year</td> </tr>
   <tr> <td>1.</td> <td>XYZ</td> <td>EFG</td> <td>2017</td> </tr>
   <tr> <td>2.</td> <td>XYZ</td> <td>EFG</td> <td>2018</td> </tr>
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
