<?php 
require_once('include/connection.php');

if (isset($_SESSION))
{
    session_unset(); 
    session_destroy();
    session_start(); 
}
else{
    session_start(); 
}

if(isset($_POST["txtstudentAdmissionNo"]) && isset($_POST["txtStudentPassword"])){ 
    $studentAdmissionNo=$_POST["txtstudentAdmissionNo"];
    $studentPassword=$_POST["txtStudentPassword"];
    if ($studentAdmissionNo !="" && $studentPassword !="") {
        $student = $db->rawQueryOne($manager->query['StudentDetailsByAdmissionNo'], Array($studentAdmissionNo));
   	    if($student){
            $dbPassword=$student['spassword'];
            $studentName=$student['sname'];
            $studentClass=$student['sclass'];
            $studentRollNo=$student['srollno'];
            $studentFatherName=$student['sfathername'];
            
            if ($studentPassword==$dbPassword)
   			{
   				$_SESSION['userid']=$studentAdmissionNo;
   				$_SESSION['StudentName']=$studentName;
   				$_SESSION['StudentClass']=$studentClass;
   				$_SESSION['StudentRollNo']=$studentRollNo;
   				$_SESSION['StudentFatherName']=$studentFatherName;
                header('location: Users/Notices.php');
      		}
   			else
   			{
                $msg="Password does not match ! Please Try Again";
   			}
        }
        else{
            $msg="User Does Not Exist ! Please Try Again";
        }
    }
    else{
        $msg="User Does Not Exist ! Please Try Again";
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>barrel-edu :: Student Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script language="javascript">
         String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };
         function Validate()
         {
         
         	if(document.getElementById("txtUserId").value.trim()=="")
         	{
         		alert("Please Enter User Id");
         		return;
         	}
         	if(document.getElementById("txtPassword").value.trim()=="")
         	{
         		alert("Please Enter Password");
         		return;
         	}
         
         	document.getElementById("frmLogin").submit();
         }
         $(".email-signup").hide();
         $("#signup-box-link").click(function(){
           $(".email-login").fadeOut(100);
           $(".email-signup").delay(100).fadeIn(100);
           $("#login-box-link").removeClass("active");
           $("#signup-box-link").addClass("active");
         });
         $("#login-box-link").click(function(){
           $(".email-login").delay(100).fadeIn(100);;
           $(".email-signup").fadeOut(100);
           $("#login-box-link").addClass("active");
           $("#signup-box-link").removeClass("active");
         });
         
      </script>
</head>
<body class="simple-page">
	<div id="back-to-home">
		<a href="index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="javascript:void(0);">
				<span><i class="fa fa-users"></i></span>
				<span>barrel-edu</span>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
		<h4 class="form-title m-b-xl text-center">STUDENT LOGIN</h4>
		<form action method="post">
			<div class="form-group">
				<input name="txtstudentAdmissionNo" id="txtstudentAdmissionNo" type="text" class="form-control" placeholder="Username">
			</div>

			<div class="form-group">
				<input  name="txtStudentPassword" id="txtStudentPassword" type="password" class="form-control" placeholder="Password">
			</div>

			<div class="form-group m-b-xl">
				<div class="checkbox checkbox-primary">
					<input type="checkbox"  value="r"/>
					<label for="keep_me_logged_in">Keep me signed in</label>
				</div>
			</div>
			
			<input type="submit" class="btn btn-primary" name="pupillogin" id="pupillogin" value="SING IN" onClick="Javascript:Validate();">
		</form>
	</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p><a href="Admin/ForgotPassword.php">FORGOT YOUR PASSWORD ?</a></p>
			<!--<p>
				<small>Don't have an account ?</small>
				<a href="signup.html">CREATE AN ACCOUNT</a>
			</p>-->
		</div><!-- .simple-page-footer -->
	</div><!-- .simple-page-wrap -->
	<!--
		<a href="https://www.facebook.com/search/top/?q=paul%20george%20global%20school"><img src="Admin/images/f.png"></a>
	   <a href="linkline.com"><img src="Admin/images/i.png"></a>
	   <a href="globle.com"><img src="Admin/images/w.png"></a>
	-->
</body>
</html>