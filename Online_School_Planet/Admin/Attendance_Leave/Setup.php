<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Attendence and Leave Manegement</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="Style.css" />
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
  <!--<h4>SELF SERVICE</h4>-->
  <ul>
   <li class="dropmanu"><a href="#student_setup.php"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo">For Student</button></a>
  		 <!--<div id="demo" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="#">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Define Leave Types 
</button></a></li>
          </ul>
         </div>-->
  </li>
  <li class="dropmanu"><a href="#employee_setup.php"><button type="button" class="btnmanu1" data-toggle="collapse" data-target="#demo1">For Employee</button></a>
  		 <!--<div id="demo1" class="collapse">
          <ul style=" margin-left:-20%; margin-top:0%;">
           <li style="margin-left:1%;"><a href="#">
            <button class="btnmanu" style="border:none; background:none; margin:0; height:40px; font-weight:500; font-size:14px; ">Define Leave Types 
</button></a></li>
          </ul>
         </div>-->
   </li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="setup">
   <div class="setup_top">Leave Master </div>
   <div class="setup_bottom"> 
    <form action="#" method="post" >
     <div style="font-weight:600; font-size:15px; text-decoration:underline; margin:1% 0;">Add A New Leave Type</div>
     <div class="row">
      <div class="col-xs-6">Leave Name</div>
      <div class="col-xs-6"><input type="text" name="leavename" class="text-box" id="leavename"></div>
      <div class="col-xs-6">Maximum Leaves in Category</div>
      <div class="col-xs-6"><input type="number" name="maxleave" id="maxleave" class="text-box"></div>
      <div class="col-xs-6">Financial Year</div>
      <div class="col-xs-6"><select name="financialyear" class="text-box" id="financialyear">
      							<option value="">Select One</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                            </select></div>
     </div>
     <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
    </form>
   </div>
   <div class="setup_table">
    <form action="#" method="post">
     <table>
      <tr class="col">
       <td>Sr.No.</td><td>Leave Type</td><td>Maximum Leaves Allowed</td><td>Financial Year</td><td>Edit Details</td>
      </tr>
      <tr>
       <td>1</td><td>Leave Type</td><td>08</td><td>2016</td><td><a href="#">Edit</a></td>
      </tr>
     </table>
    </form>
   </div>
  </div>
 </div>
<!----------------->
</div>
<!----------------->
</div></div>
</body>
</html>
