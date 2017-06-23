<?php session_start();?>
<?php
include 'connection.php';
if(isset($_POST['submit1'])){
 $suser=$_POST['studentId'];
 $spass=$_POST['studentPassword'];
 $mysql="SELECT * FROM `student_master` WHERE 1";
 $result = $conn->query($mysql);
	 if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["spassword"] == $suser && $row["suser"]==$spass){
				$_SESSION["sid"] = $row["suser"];
				$_SESSION["sname"] = $row["Name"];
		 header('location:Student_Portal/Pages/Index.php');
		 }
	 	else{ echo  "your User ID and Password Not Correct"; }
		}
	 }
}
if(isset($_POST['submit2'])){
 $tuser=$_POST['teacherId'];
 $tpass=$_POST['teacherPassword'];
 $mysql="SELECT * FROM `employee_master` WHERE 1";
 $result = $conn->query($mysql);
	 if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["Password"] == $tpass && $row["UserId"]==$tuser){
				$_SESSION["tid"] = $row["UserId"];
				$_SESSION["tname"] = $row["Name"];
			 header('location:Employee_Portal/pages/index.php');
			}
		 else{ echo  "your User ID and Password Not Correct"; }
		}
	 }
}
if(isset($_POST['submit3'])){
	 $auser=$_POST['admintId'];
	 $apass=$_POST['adminPassword'];
	 $mysql="SELECT * FROM `admin_master` WHERE 1";
	 $result = $conn->query($mysql);
	 if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			if($row["aUserPassword"] == $apass && $row["aUserId"]==$auser){
				$_SESSION["aid"] = $row["aUserId"];
				$_SESSION["aname"] = $row["aName"];
			 header('location:Admin/Index.php');
			}
		 else{ echo  "your User ID and Password Not Correct"; }
		}
	 }
}
?>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login Portal</title><link rel="icon" href="image/l1.png" type="image/x-icon">

<link rel="stylesheet" href="Bootstrap/bootstrap.min.css" />
<script src="Bootstrap/bootstrap.min.js"></script>
<script src="Bootstrap/jquery.min.js"></script>

</head>
<style>
body{cursor:default;}
.row, .col-md-8, .col-md-4{padding:0; margin:0;} //#e5eecc
.outer .col-md-8 .img-responsive{width:100%; height:100% !important;}
.loginpage .loginpage_head{background:#000080; padding:5% 0; text-align:center; font-size:18px; font-weight:bold; color:#fff; margin:0 0 1% 0; text-transform:uppercase;}
.loginpage .loginpage_inner{height:65%;}
.loginpage .loginpage_inner .text-box{height:40px; font-size:16px; padding:1%; border:1px solid #000080; border-radius:3px; width:80%;}
.loginpage .loginpage_inner #panel1 div, .loginpage .loginpage_inner #panel2 div, .loginpage .loginpage_inner #panel3 div{margin:2% 0;}
.loginpage .loginpage_inner .btn{color:#fff; background:#000080; border:1px solid transparent; border-radius:5px; width:30%;}
.loginpage .loginpage_inner .btn:hover{background:#03C;}
.link{margin:1% 0;} .link a{margin:0 3%;}
#panel1, #flip1, #panel2, #flip2, #panel3, #flip3 {padding: 5px; text-align: center; background-color:#00bfff; border: solid 1px #c3c3c3; }
#panel1, #panel2, #panel3 {display: none; background-color:#87ceeb; padding:1% 0;}
#flip1, #flip2, #flip3{padding:2% 0; color:#000080; text-transform:uppercase;}
@media only screen and (min-width:500px) and (max-width: 768px){
	.loginpage .loginpage_inner{height:auto;}
	.outer .col-md-8 .img-responsive{width:100%; height:80% !important;}
}
@media only screen and (min-width:240px) and (max-width: 500px){
	.loginpage .loginpage_inner{height:auto;} .link{margin:20% 0 3% 0;} 
	.outer .col-md-8 .img-responsive{width:100%; height:auto !important;}
}
</style>


<body>

<!--header-->
<div id="container"> 
 <div class="outer">
  <div class="row">
   <div class="col-md-8">
    <img src="image/1.jpg" class="img-responsive" style="height:100%">
   </div>
   <div class="col-md-4">
    <div class="loginpage">
     <div class="loginpage_head">Login Panel</div>
     <div class="loginpage_inner">
      <div id="flip1">Student Login</div>
      <div id="panel1">
       <form action="" method="post" name="studentLogin" id="studentLogin">
        <div><input type="text" name="studentId" id="studentId" value="" class="text-box" placeholder="Enter User ID" ></div>
        <div><input type="password" name="studentPassword" id="studentPassword" value="" class="text-box" placeholder="Enter User Password" ></div>
        <div align="center"><input type="submit" name="submit1" id="submit1" class="btn"></div>
       </form>
      </div>
      <div id="flip2">Teacher Login</div>
      <div id="panel2">
       <form action="" method="post" name="staffLogin" id="staffLogin">
        <div><input type="text" name="teacherId" id="teacherId" value="" class="text-box" placeholder="Enter User ID" ></div>
        <div><input type="password" name="teacherPassword" id="teacherPassword" value="" class="text-box" placeholder="Enter User Password" ></div>
        <div align="center"><input type="submit" name="submit2" id="submit2" class="btn"></div>
       </form>
      </div>
      <div id="flip3">Admin Login</div>
      <div id="panel3">
       <form action="" method="post" name="adminLogin" id="adminLogin">
        <div><input type="text" name="admintId" id="admintId" value="" class="text-box" placeholder="Enter User ID" ></div>
        <div><input type="password" name="adminPassword" id="adminPassword" value="" class="text-box" placeholder="Enter User Password" ></div>
        <div align="center"><input type="submit" name="submit3" id="submit3" class="btn"></div>
       </form>
      </div>
     </div>
     <div class="link" align="center">
      <a href="https://www.facebook.com/Online-school-planet-187989758338486/"><img src="image/f.png"></a>
      <a href="https://www.linkedin.com/groups/10329686"><img src="image/i.png"></a>
      <a href="http://onlineschoolplanet.com"><img src="image/w.png"></a>
     </div>
     <div class="footer">
      <div class="img" align="center"><img src="image/logo.png" class="img-responsive"></div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>
<script> 
$(document).ready(function(){
    $("#flip1").click(function(){
        $("#panel1").slideToggle("slow");
		$("#panel2").slideUp("slow");
		$("#panel3").slideUp("slow");
    });
    $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");
		$("#panel1").slideUp("slow");
		$("#panel3").slideUp("slow");
    });
    $("#flip3").click(function(){
        $("#panel3").slideToggle("slow");
		$("#panel2").slideUp("slow");
		$("#panel1").slideUp("slow");
    });
});
$(document).ready(function(){
    $(".loginpage_head").click(function(){
        $("#panel3").slideUp("slow");
		$("#panel2").slideUp("slow");
		$("#panel1").slideUp("slow");
    });
    $(".col-md-8").click(function(){
        $("#panel3").slideUp("slow");
		$("#panel2").slideUp("slow");
		$("#panel1").slideUp("slow");
    });
	$(".link").click(function(){
        $("#panel3").slideUp("slow");
		$("#panel2").slideUp("slow");
		$("#panel1").slideUp("slow");
    });
	$(".footer").click(function(){
        $("#panel3").slideUp("slow");
		$("#panel2").slideUp("slow");
		$("#panel1").slideUp("slow");
    });
});
</script>