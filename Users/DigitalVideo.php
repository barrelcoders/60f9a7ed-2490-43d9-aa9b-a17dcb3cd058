<?php 
	require_once('../include/connection.php');

	session_start();
	if(!isset($_SESSION['userid']))
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	
	$class = $_SESSION['StudentClass'];
	$master_class = $db->rawQueryOne($manager->query['MasterClassByClassName'], array($class));
	$subjects = $db->rawQuery($manager->query['DigitalVideoUrlSubjectsByMasterClass'], array($master_class['MasterClass']));
	$digital_videos = array();
	
	if(isset($_POST['btnSubmit'])){
		$selectedSubject = $_POST['slSubjects'];
		$digital_videos = $db->rawQuery($manager->query['DigitalVideoListByMasterClassAndSubject'], array($master_class['MasterClass'], $selectedSubject));
	}
?>
<script language="javascript">
	function fnlRedirect() {
		window.location.href ="DigitalVideoURL.php?Subject=" + document.getElementById("cboSubject").value;
	}
	function openVideo(url){
		var myWindow = window.open("DigitalVideoURL.php?url=" + url ,"","width=660,height=515");
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			  <h5 class="page-title hidden-menubar-top hidden-float">Digital Video Library</h5>
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

					<div class="widget p-lg">
						<header class="widget-header">
							<h4 class="widget-title">Leave Request</h4>
						</header><!-- .widget-header -->
						<hr class="widget-separator">
						<div class="widget-body">
							<div class="m-b-lg">
							</div>
							<form method="post" action="" id="frmSearch">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="slSubjects">Subjects</label>
											<select size="1" name="slSubjects" id="slSubjects" class="form-control" onchange="fnlRedirect();">
												<option selected="" value="Select One">Select One</option>
												<?php foreach($subjects as $items){ ?>
													<option value="<?php echo $items['Subject']; ?>"><?php echo $items['Subject']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>					
									<div class="col-sm-6"></div>									
								</div>
								<button type="submit" class="btn btn-primary btn-md" name="btnSubmit" value="Search">Search</button>
							</form>
							<br>
							<br>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>S. No.</th>
										<th>Chapter Name</th>
										<th>Topic Name</th>
										<th>Sub Topic Name</th>
										<th>Video Link</th>
										<th>Related Questions</th>
										<th>Likes</th>
										<th>Viewed</th>
									</tr>
									<?php 
										$SNo = 1;
										foreach ($digital_videos as $item) {  ?>
										<tr>
											<td><?php echo $SNo; ?></td>
											<td><?php echo $item['ChapterName']; ?></td>
											<td><?php echo $item['Topic']; ?></td>
											<td><?php echo $item['SubTopic']; ?></td>
											<td><a href="javascript:void(0);" onclick="openVideo('<?php echo $item['URL']; ?>');"><?php echo $item['URL']; ?></a></td>
											<td><?php echo $item['RelatedQuestion']; ?></td>
											<td><?php echo $item['Rating']; ?></td>
											<td><?php echo $item['ViewershipCount']; ?></td>
										</tr>
									<?php 
										$SNo++;
									} ?>
								</tbody>
							</table>
						</div><!-- .widget-body -->
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
