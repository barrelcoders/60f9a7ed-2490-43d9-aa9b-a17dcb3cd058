<?php 
include 'connection.php';
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy();
//start new session
session_start(); 
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
	header('Location: http://www.dpsfbd.info/mPortal/index.php');
	exit();
}
$suser=$_REQUEST["pupilname"];
$spassword=$_REQUEST["pupilpass"];
if ($suser !="")
{
	$ssql="select `suser`,`spassword`,`sname`,`sclass`,`srollno`,`sfathername` from `student_master` where `sadmission`='$suser'";
	$rs= mysql_query($ssql);	
	$num_rows=0;
	while($row = mysql_fetch_row($rs))
		{
				$password1=$row[1];
				$StudentName=$row[2];
				$StudentClass=$row[3];
				$StudentRollNo=$row[4];
				$StudentFatherName=$row[5];
				$num_rows=$num_rows+1;
				break;
			}
	if($num_rows==0)
	{
		$msg="User Does Not Exist ! Please Try Again";
	}
	else
	{
			if ($spassword==$password1)
			{
				$_SESSION['userid']=$suser;
				$_SESSION['StudentName']=$StudentName;
				$_SESSION['StudentClass']=$StudentClass;
				$_SESSION['StudentRollNo']=$StudentRollNo;
				$_SESSION['StudentFatherName']=$StudentFatherName;
				//header('location: http://dpsfsis.com/DPS19/Users/Notices.php');
   				echo "<script type='text/javascript'>window.location.href = 'http://www.dpsfbd.info/Users/Notices.php';</script>";
   				exit();
   				//die();	
			}
			else
			{
						$msg="Password does not match ! Please Try Again";
			}
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

<script type="text/javascript">
		
  		var _gaq = _gaq || [];
  		_gaq.push(['_setAccount', 'UA-7243260-2']);
 		_gaq.push(['_trackPageview']);

  		(function() {
    			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  		})();
		
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
    <form action="#" method="post" class="email-login">
<!--header-->
<div id="container"> 
 <div style="background:rgba(11,70,45,0.6);" class="a">
  <table class="table-responsive"><thead><th>  <img src="Admin/images/logo.png" class="img-responsive" />   </th>
  <th>   </th></thead></table>
 </div>
 
<!---Container-->
<div align="right"><a href="index.php"><img src="Admin/images/BackButton.png" width="7%"></a></div>
 <div class="row">
  <div class="col-md-7">
   <img src="Admin/images/DPS.jpg" class="img">
  
  </div>
  <div class="col-md-4">
   <table class="table-responsive" style="background:rgba(11,70,45,0.1);">
    <thead style="background:rgba(11,70,45,0.84);"><th><img src="Admin/images/m.png" class="img-responsive"></th></thead>
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
		  <input type="text" name="pupilname" id="pupilname" placeholder="Username" class="c"/></br><br>
		   <input type="password" name="pupilpass" id="pupilpass" placeholder="Password" class="c"/></br><br>
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
