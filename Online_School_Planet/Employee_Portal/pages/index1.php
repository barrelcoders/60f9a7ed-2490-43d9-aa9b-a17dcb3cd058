<?php session_start(); ?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/calendar.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery-ui.min.js"></script>
   <script src="../js/jquery-ui-datepicker.min.js"></script>
</head>

<body onLoad="myFunction()" style="margin:0;">
<div id="loader1"><div id="loader"></div>

<div style="display:block;" id="myDiv" class="animate-bottom">
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 a1" style="width:20%"> <?php include 'sidemanu.php'; ?> </div>
 
 <div class="col-md-8" style="width:60%">
  <!--<h4>WELCOME</h4>-->
  <h4 align="left">MY TASKS</h4>
  <form action="../payroll.php" method="post">
  <div class="row input">
   <div class="col-sm-3">Task Code<br><input type="text" name="tcode" class="input-btn"></div>
   <div class="col-sm-3">Employee Name<br><input type="text" name="ename" class="input-btn"></div>
   <div class="col-sm-3">Stage<br><input type="text" name="stage" class="input-btn"></div>
   <div class="col-sm-3">Status<br><input type="text" name="status" class="input-btn"></div>
   <div class="task"> You have no open task </div>
  </div>
  
  </form>
  <p align="right">Detail View</p>
 </div>
 
 <div class="col-md-2 r" style="width:20%">
  <h4>EVENTS</h4>
  <div id="calendar"></div><br>

<script>
	$('#calendar').datepicker({
		inline: true,
		firstDay: 1,
		showOtherMonths: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
	});
</script>
  <!--<h4>Today's Appointments</h4> 
  <table class="tap">
   <tr class="col"> <td class="coln">Name</td> <td class="coln">Organization</td> <td>Time</td> <td>Cancel</td> </tr>
   <tr> <td class="coln">Name</td> <td class="coln">Organization</td> <td>time</td> <td><a href="#">Cancel</a></td> </tr>
   <tr> <td class="coln">Name</td> <td class="coln">Organization</td> <td>time</td> <td><a href="#">Cancel</a></td> </tr>
   <tr> <td class="coln">Name</td> <td class="coln">Organization</td> <td>time</td> <td><a href="#">Cancel</a></td> </tr>
   <tr> <td class="coln">Name</td> <td class="coln">Organization</td> <td>time</td> <td><a href="#">Cancel</a></td> </tr>
  </table><br>--->
  <h4>BIRTHDAYS - OCT 21</h4>
  <a href="#nabeel">Nabeel Mohammad (10297)</a>
  <a href="#" ><img src="../images/bdv.png" class="img-circle" width="25px;" height="20px"></a><hr>
  <a href="#robert">Robert Wilton C (11792)</a>
  <a href="#" ><img src="../images/bdv.png" class="img-circle" width="25px;" height="20px"></a><hr><br>
  <h4>JOINING ANNIVERSARIES - OCT 21</h4>
  <a href="#saurabh">Saurabh Kakkar (10339):3rd</a><hr>
  <a href="#deepak">Deepak Mehrotra (11035):3rd</a><hr>
  <a href="#pranav">Pranav Pratap Gaur (11036):3rd</a><hr>

 </div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>

<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("loader1").style.background = "none";
  document.getElementById("loader1").style.opacity = "1";
  document.getElementById("myDiv").style.display = "block";
}
</script>
