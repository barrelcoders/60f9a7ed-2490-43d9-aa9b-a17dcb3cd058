<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/calendar.css" />
</head>

<body >

<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?> </div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 a1" style="width:20%"> <?php include 'sidemanu.php'; ?> </div>
 
 <div class="col-md-8" style="width:60%">
  <!--<h4>WELCOME</h4>-->
  <div class="change_password">
  <form action="../payroll.php" method="post">
   <div class="changepassword">
    <div class="changepassword_head">Change Password</div>
    <div class="changepassword_form">
     <table class="table-responsive">
      <tr>
       <td>* Current Password:</td>
       <td><input type="password" name="CurrentPassword" id="CurrentPassword" class="text-box" ></td>
       <td rowspan="3">
        <p>Password must<br>
          - contain at least 6 characters<br>
          - contain at least one number: 0-9<br>
          - not contain any space<br>
          - contain atleast one special character: '!-@#$%^&*
        </p>
       </td>
      </tr>
      <tr>
       <td>* New Password:</td>
       <td><input type="password" name="NewPassword" id="NewPassword" class="text-box" ></td>
      </tr>
      <tr>
       <td>* Confirm Password:</td>
       <td><input type="password" name="ConfirmPassword" id="ConfirmPassword" class="text-box" ></td>
      </tr>
     </table>
    </div>
   </div>
   <div class="changepassword_btn">
    <input type="submit" name="submit" id="submit" value="Save" class="btn" >&nbsp;&nbsp;
    <input type="reset" name="cancel" id="cancel" value="Cancel" class="btn btn1" >
   </div>
  </form>
  </div>
 </div> 
 <div class="col-md-2 r" style="width:20%">
  <h4>EVENTS</h4>
  <div id="calendar"></div><br>

   <script src="../js/jquery-ui.min.js"></script>
   <script src="../js/jquery-ui-datepicker.min.js"></script>
<script>
	$('#calendar').datepicker({
		inline: true,
		firstDay: 1,
		showOtherMonths: true,
		dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
	});
</script>
  <!--<h4>Today`s Appointments</h4> 
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
</div></div>
</div>
</body>
</html>
<div><?php include 'footer.php'; ?> </div>