<?php 
	require_once('../include/connection.php');

	session_start();
	if(!isset($_SESSION['StudentClass']))
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	
	$class=$_SESSION['StudentClass'];
	$homeworks = $db->rawQuery($manager->query['TodayHomeworkByClassAndStatus'], array($class, "FinalSubmit"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<script language="javascript">
			Breakpoints();
			function showNews(id) {
				var myWindow = window.open("ShowNews.php?srno=" + id ,"","width=500,height=500");
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

		<button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="zmdi zmdi-hc-lg zmdi-search"></span>
		</button>

		<a href="javascript:window.reload();" onclick="" class="navbar-brand">
		  <span class="brand-icon"><i class="fa fa-users"></i></span>
		  <span class="brand-name">barrel-edu</span>
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
			  <h5 class="page-title hidden-menubar-top hidden-float">Today's Homework</h5>
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
			<div class="row">
				<div class="col-md-12">
					<p class="m-b-lg docs">
						<div class="btn-group" role="group">
							<a href="Classwork.php" class="btn btn-default">Today</a>
							<a href="YesterdayClassWork.php" class="btn btn-default">Yesterday</a>
							<a href="SearchClassWork.php" class="btn btn-default">Search Previous</a>
						</div>
					</p>

					<div class="widget p-lg">
						<h4 class="m-b-lg"></h4>

						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>S. No.</th>
									<th>Subject</th>
									<th>Date</th>
									<th>Today's Homework</th>
									<th>Today's Classwork</th>
								</tr>
								<?php 
									$SNo = 1;
									foreach ($homeworks as $item) { ?>
									<tr>
										<td><?php echo $SNo; ?></td>
										<td><?php echo $item['subject']; ?></td>
										<td><?php echo date('d-M-Y', strtotime($item['date'])); ?></td>
										<td><?php echo $item['homework']; ?></td>
										<td><?php echo $item['classwork']; ?></td>
									</tr>
								<?php 
									$SNo++;
								} ?>
							</tbody>
						</table>
					</div>
				</div><!-- END column -->
			</div><!-- .row -->
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
</body>
</html>
