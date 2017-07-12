<?php
	require_once(__DIR__.'/../include/connection.php');
	session_start();
	if(!isset($_SESSION['userid']) || !isset($_GET['id']))
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	
	if($_SESSION['userid'] != $_GET['id']){
		echo "<br><br><center><b>You are unauthorised to view this page!";
		exit();
	}
	
	if(isset($_POST['btnSubmit']) && isset($_SESSION['userid'])){
		$result = $db->rawQueryOne($manager->query['UpdateStudentSelfDetails'], Array($_POST['txtFatherEducation'], $_POST['txtFatherOccupation'], $_POST['txtMotherEducation'], 
		$_POST['txtStudentAddress'], $_POST['txtMobile'], $_POST['txtIMEI'], $_POST['txtPassword'], $_POST['txtEmail'], $_SESSION['userid']));
		if ($result){
			$result = $db->rawQueryOne($manager->query['UpdateStudentSelfLoginDetails'], Array($_POST['txtMobile'], $_POST['txtIMEI'], $_POST['txtPassword'], $_POST['txtEmail'], $_SESSION['userid']));
			if ($result){
				echo "<script>alert('Information updated successfully');</script>";
			}
		}
	}
	
	$student = $db->rawQueryOne($manager->query['StudentFullDetailsByAdmissionNo'], Array($_SESSION['userid']));
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
	<title>edu-barrel :: Student</title>
	
	<link rel="stylesheet" href="../libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css ../assets/css/app.min.css -->
	<link rel="stylesheet" href="../libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="../libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="../libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/core.css">
	<link rel="stylesheet" href="../assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<link rel="stylesheet" type="text/css" href="../libs/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="../libs/bower/switchery/dist/switchery.min.css">
	<link rel="stylesheet" type="text/css" href="../libs/bower/lightbox2/dist/css/lightbox.min.css">
	<script src="../libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script language="javascript">
		Breakpoints();
		function Validate()			
		{			
			if (document.getById("txtMobile").value=="")			
			{			
				alert("Mobile No is mandatory");			
				return;
			}			
			if(isNaN(document.getElementById("txtMobile").value)==true)
			{
				alert("Mobile No should be numeric");		
				return;	
			}	
			if (document.getElementById("txtAddress").value=="")	
			{		
				alert("Address is mandatory");		
				return;	
			}
			document.getElementById("frmStudentProfile").submit();
		}
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>
    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <a href="javascript:window.reload();" onclick="" class="navbar-brand">
      <span class="brand-icon"><i class="fa fa-users"></i></span>
      <span class="brand-name">edu-barrel</span>
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">Profile</h5>
        </li>
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<?php include (__DIR__.'/SideMenu.php')?>
<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title"><?php echo $student['sname'];?></h4>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="row">
				<form action="" method="post" id="frmStudentProfile">
				<div class="col-md-6">
					<div class="widget-body">
							<div class="form-group">	
								<label for="txtName">Name</label>
								<div>
									<input readonly class="form-control input-lg" type="text" id="txtName" name="txtName" value="<?php echo $student['sname'];?>" placeholder="Name">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="txtDOB">Date of Birth</label>
								<div class="input-group date" data-plugin="datetimepicker">
									<input readonly type="text" class="form-control" id="txtDOB" name="txtDOB" value="<?php echo $student['DOB']?>" />
									<span class="input-group-addon bg-info text-white">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="form-group">
								<label for="txtGender" >Gender</label>
								<div>
									<input readonly class="form-control input-lg" type="text" id="txtGender" name="txtGender" value="<?php echo $student['Sex'];?>" placeholder="Name">
								</div><!-- END column -->
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="txtCategory" >Category</label>
								<div>
									<input readonly class="form-control input-lg" type="text" id="txtCategory" name="txtCategory" value="<?php echo $student['Category'];?>" placeholder="Name">
								</div><!-- END column -->
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtNationality">Nationality</label>
								<div>
									<input readonly class="form-control input-lg" type="text" id="txtNationality" name="txtNationality" value="<?php echo $student['Nationality'];?>" placeholder="Nationality">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtAdmissionNumber">Admission Number</label>
								<div>
									<input readonly class="form-control input-lg" type="text" id="txtAdmissionNumber" name="txtAdmissionNumber" value="<?php echo $student['sadmission'];?>" placeholder="Admission Number">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtClass">Class</label>
								<div >
									<input readonly class="form-control input-lg" type="text" id="txtClass" name="txtClass" value="<?php echo $student['sclass'];?>" placeholder="Class">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtRollNo">Roll Number</label>
								<div >
									<input readonly class="form-control input-lg" type="text" id="txtRollNo" name="txtRollNo" value="<?php echo $student['srollno'];?>" placeholder="Roll Number">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtFatherName">Father's Name</label>
								<div >
									<input readonly class="form-control input-lg" type="text" id="txtFatherName" name="txtFatherName" value="<?php echo $student['sfathername'];?>" placeholder="Father's Name">
								</div>
							</div><!-- .form-group -->
							
							<div class="form-group">	
								<label for="txtMotherName">Mother's Name</label>
								<div >
									<input readonly class="form-control input-lg" type="text" id="txtMotherName" name="txtMotherName" value="<?php echo $student['MotherName'];?>" placeholder="Mother's Name">
								</div>
							</div><!-- .form-group -->
					</div><!-- .widget-body -->
				</div><!-- END column -->
				<div class="col-md-6">
					<div class="widget-body">
							<div class="form-group">	
								<label for="txtFatherEducation">Father's Education</label>
								<div >
									<input class="form-control input-lg" type="text" id="txtFatherEducation" name="txtFatherEducation" value="<?php echo $student['FatherEducation'];?>" placeholder="Father's Education">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtFatherOccupation">Father's Occupation</label>
								<div >
									<input class="form-control input-lg" type="text" id="txtFatherOccupation" name="txtFatherOccupation" value="<?php echo $student['FatherOccupation'];?>" placeholder="Father's Occupation">
								</div>
							</div>
							<div class="form-group">	
								<label for="txtMotherEducation">Mother's Education</label>
								<div >
									<input class="form-control input-lg" type="text" id="txtMotherEducation" name="txtMotherEducation" value="<?php echo $student['MotherEducation'];?>" placeholder="Mother's Education">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtStudentAddress">Student Address</label>
								<div >
									<textarea id="txtStudentAddress" name="txtStudentAddress" maxlength="140" class="form-control" data-plugin="maxlength" data-options="{ alwaysShow: true, threshold: 10, warningClass: 'label label-warning', limitReachedClass: 'label label-danger',
									placement: 'bottom', message: 'used %charsTyped% of %charsTotal% chars.' }" placeholder="you have 140 characters"><?php echo $student['Address'];?></textarea>
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtMobile">Mobile Number</label>
								<div >
									<input class="form-control input-lg" type="text" id="txtMobile" name="txtMobile" value="<?php echo $student['smobile'];?>" placeholder="Mobile Number">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtIMEI">IMEI</label>
								<div >
									<input class="form-control input-lg" type="text" id="txtIMEI" name="txtIMEI" value="<?php echo $student['simei'];?>" placeholder="IMEI">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="txtPassword">Password</label>
								<div >
									<input type="password" class="form-control input-lg" id="txtPassword" name="txtPassword" value="<?php echo $student['spassword'];?>" placeholder="Password">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="txtEmail">Email</label>
								<input type="text" data-plugin="tagsinput" data-role="tagsinput" id="txtEmail" name="txtEmail" class="form-control" value="<?php echo $student['email'];?>" placeholder="add more.." style="display: none;">
							</div>
							<button type="submit" name="btnSubmit" class="btn btn-primary btn-md" onclick="Validate();" onsubmit="Validate();">Submit</button>
					</div><!-- .widget-body -->
				</div><!-- END column -->
				</form>
			</div>
		</div>
	</section><!-- .app-content -->
</div><!-- .wrap -->
 <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <?php include (__DIR__.'/Footer.php')?>
  </div>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

	

	<!-- build:js ../assets/js/core.min.js -->
	<script src="../libs/bower/jquery/dist/jquery.js"></script>
	<script src="../libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="../libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="../libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="../libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="../libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="../libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js ../assets/js/app.min.js -->
	<script src="../assets/js/library.js"></script>
	<script src="../assets/js/plugins.js"></script>
	<script src="../assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="../libs/bower/moment/moment.js"></script>
	<script src="../libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="../assets/js/fullcalendar.js"></script>
	<script src="../libs/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="../libs/bower/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="../libs/bower/switchery/dist/switchery.min.js"></script>
	
</body>
</html>

