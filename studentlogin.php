<?php 
require_once('connection.php');


if (isset($_SESSION))
{
    session_unset(); 
    session_destroy();
    session_start(); 
}
else{
    session_start(); 
}

if(isset($_POST["txtStudentUsername"]) && isset($_POST["txtStudentPassword"])){ 
    $studentUsername=$_POST["txtStudentUsername"];
    $studentPassword=$_POST["txtStudentPassword"];
    if ($studentUsername !="" && $studentPassword !="") {
        $student = $db->rawQueryOne($manager->query['StudentDetailsByAdmissionNo'], Array($studentUsername));
   	    if($student){
            $dbPassword=$student['spassword'];
            $studentName=$student['sname'];
            $studentClass=$student['sclass'];
            $studentRollNo=$student['srollno'];
            $studentFatherName=$student['sfathername'];
            
            if ($studentPassword==$dbPassword)
   			{
   				$_SESSION['userid']=$studentUsername;
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
<html>
   <head>
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
         
      </script>
      <script>
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
      <meta charset='utf-8'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Student Login</title>
      <link rel="stylesheet" href="Bootstrap/bootstrap.min.css" />
      <script src="Bootstrap/bootstrap.min.js"></script>
   </head>
   <style>
      .a .table-responsive {margin-left:5% !important; margin-top:0 !important;  font-size:35px; font-weight:200; color:#FFFFFF !important;}
      .a .table-responsive .img-responsive{ width:60% !important;  }
      ul{ line-height:2 !important; }
      .row{ margin:1% 0% 0 5% !important; } .col-md-4{padding-left:5%; width:36%;} .col-md-4 table {width:100%; height: 72.2%;}
      .col-md-5 .table-responsive{ width:100% !important; background:rgb(249,249,249)!important; margin-left:20%!important; }
      .row .table-responsive .img-responsive{ margin-left:42% !important; margin-top:-4% !important; margin-bottom:3% !important; }
      .col-md-5 .table-responsive tr td{ padding-left:8% !important; }
      .table-responsive .c{ height:40px !important; padding: 10px; border: 1px solid #999; width: 80%; }
      .col-md-5 .table-responsive select{ width:90% !important; line-height:2 !important; height:40px !important;  }
      .btn{ background:rgb(238,177,28) !important; color:#FFFFFF !important;  height:40px !important; width:90% !important }
      .img{height:70%; width:90%}
   </style>
   <body>
      <form action="" method="post" class="email-login">
         <!--header-->
         <div id="container">
            <div style="background:rgba(11,70,45,0.6);" class="a">
               <table class="table-responsive">
                  <thead>
                     <th>  <img src="Admin/images/logo.png" class="img-responsive" />   </th>
                     <th>   </th>
                  </thead>
               </table>
            </div>
            <!---Container-->
            <div align="right"><a href="index.php"><img src="Admin/images/BackButton.png" width="7%"></a></div>
            <div class="row">
               <div class="col-md-7">
                  <img src="Admin/images/DPS.jpg" class="img">
               </div>
               <div class="col-md-4">
                  <table class="table-responsive" style="background:rgba(11,70,45,0.1);">
                     <thead style="background:rgba(11,70,45,0.84);">
                        <th><img src="Admin/images/m.png" class="img-responsive"></th>
                     </thead>
                     <tr>
                        <td align="center">
                           <h3 align="center" style="color:rgba(11,70,45,0.84)">STUDENT LOGIN</h3>
                           <!--<select id="choose" onchange="">
                              <option value="">Chose user</option>
                              <option value="Admin/Login.php">Admin/Teacher Login</option>
                              <option value="index.php">Student Login</option>
                              </select>
                              <script>
                              document.getElementById("choose").onchange = function() {
                                  if (this.selectedIndex!==0) {
                                      window.location.href = this.value;
                                  }        
                              };
                              </script>-->
                           <!--<a href="../Admin/Login.php" class="active" id="login-box-link">Teacher Login</a>-->
                           </br><br>
                           <input type="text" name="txtStudentUsername" id="txtStudentUsername" placeholder="Username" class="c"/></br><br>
                           <input type="password" name="txtStudentPassword" id="txtStudentPassword" placeholder="Password" class="c"/></br><br>
                           <input type="submit" name="pupillogin" value="Login" id="pupillogin" onClick="Javascript:Validate();"></br> <br>
                           <input type="checkbox" value="r">&nbsp;&nbsp;Remember me 
                           <a href="Admin/ForgotPassword.php" style="margin-left:10%"><u>Forgot Password</u></a><br><br><br>
                        </td>
                     </tr>
                     <tr>
                        <td align="center">
                           <a href="https://www.facebook.com/search/top/?q=paul%20george%20global%20school"><img src="Admin/images/f.png"></a>
                           <a href="linkline.com"><img src="Admin/images/i.png"></a>
                           <a href="globle.com"><img src="Admin/images/w.png"></a>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </form>
   </body>
</html>
