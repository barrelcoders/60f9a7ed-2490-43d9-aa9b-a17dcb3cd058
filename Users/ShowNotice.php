<?php require_once(__DIR__.'/../include/connection.php');?>
<?php include '../AppConf.php';?>
<?php
	session_start();
	if(isset($_REQUEST["srno"]) && intVal($_REQUEST["srno"]) != 0){
		$studentClass = $_SESSION['StudentClass'];
		$studentRollNo = $_SESSION['StudentRollNo'];
		
		$studentClass= $_SESSION['StudentClass'];
		$studentRollNo = $_SESSION['StudentRollNo'];
		$notice = $db->rawQueryOne($manager->query['NoticeDetailByID'], Array($_REQUEST["srno"]));
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
	<title>barrel-edu :: Student</title>
	
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
	<script src="../libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="m-b-lg nav-tabs-horizontal">
			<!-- Tab panes -->
			<div class="tab-content p-md">
				<div role="tabpanel" class="tab-pane in active fade" id="colors">
					<h3 class="m-b-lg">Notice</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12">
						<?php
							if($notice){
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><?php echo $notice['noticetitle']?></h4>
									</div>
									<div class="panel-body">
										<p><?php echo $notice['notice']?></p>
									</div>
								</div>
								<?php
							}
						?>
						</div><!-- END column -->
					</div><!-- .row -->
				</div><!-- .tab-pane -->
			</div><!-- .tab-content -->
		</div><!-- .nav-tabs-horizontal -->
	</section><!-- .app-content -->
</div><!-- .wrap -->
  <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <footer class="app-footer">
      <div class="clearfix">
        <div class="copyright pull-left">Copyright barrel-edu &copy; 2017</div>
      </div>
    </footer>
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
</body>
</html>

