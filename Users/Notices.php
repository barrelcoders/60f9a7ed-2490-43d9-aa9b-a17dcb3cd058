<?php
	require_once(__DIR__.'/../include/connection.php');
	session_start();
	if(!isset($_SESSION['StudentClass']) || !isset($_SESSION['StudentRollNo']))
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	$studentClass= $_SESSION['StudentClass'];
	$studentRollNo = $_SESSION['StudentRollNo'];
	$notices = $db->rawQuery($manager->query['NoticesByStudentClassAndRollNo'], Array($studentClass, $studentRollNo));
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
	<script language="javascript">
		Breakpoints();
		function fnlAck(SrNo){
			var myWindow = window.open("Ack.php?SrNo="+SrNo,"MsgWindow","width=300,height=200");
			return;
		}
		function ShowPreviewNotice(SrNo){
			var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","fullscreen=yes,location=no");
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
          <h5 class="page-title hidden-menubar-top hidden-float">Notices</h5>
        </li>
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)">
			<!--<img class="img-responsive" src="../assets/images/221.jpg" alt="avatar"/>-->
			<i class="fa fa-user" style="font-size: 50px;color: #000;"></i>
		  </a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username"><?php echo $_SESSION['StudentName'];?></a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>Student</small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="settings.html">
                    <span class="m-r-xs"><i class="fa fa-newspaper-o"></i></span>
                    <span>News</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.html">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
		<?php include (__DIR__.'/SideMenu.php')?>
	</div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->


<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="mail-toolbar m-b-lg">								
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">time</a></li>
									<li><a href="#">importance</a></li>
								</ul>
							</div>

							<div class="btn-group" role="group">
								<a href="#" class="btn btn-default"><i class="fa fa-trash"></i></a>
								<a href="#" class="btn btn-default"><i class="fa fa-refresh"></i></a>
							</div>

							<div class="btn-group pull-right" role="group">
								<a href="#" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
								<a href="#" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table mail-list">
						<tr>
							<td>
							
							<?php
								foreach ($notices as $notice)
								{
							?>
								<!-- a single mail -->
								<div class="mail-item" onclick="ShowPreviewNotice(<?php echo $notice['srno']; ?>);">
									<table class="mail-container">
										<tr>
											<td class="mail-left">
												<div class="avatar avatar-sm avatar-circle">
													<a href="#"><i style="font-size:36px;color:#000;" class="fa fa-bell"></i></a>
												</div>
											</td>
											<td class="mail-center">
												<div class="mail-item-header">
													<h4 class="mail-item-title"><a href="javascript:void(0);" class="title-color"><?php echo  $notice['noticetitle']; ?></a></h4>
												</div>
												<p class="mail-item-excerpt"><?php echo  $notice['notice']; ?></p>
											</td>
											<td class="mail-right">
												<p class="mail-item-date"><?php echo date('d-m-Y', strtotime($notice['datetime'])); ?></p>
												<p class="mail-item-star starred">
													<a href="#"><i class="zmdi zmdi-star"></i></a>
												</p>
											</td>
										</tr>
									</table>
								</div><!-- END mail-item -->
								
							<?php } ?>
								
								
							</td>
						</tr>
					</table>
				</div>
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- .app-content -->
</div><!-- .wrap -->

<!-- Compose modal -->
<div class="modal fade" id="composeModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">New Message</h4>
			</div>
			<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<input name="mail_from_field" id="mail_from_field" type="text" class="form-control" placeholder="from">
					</div>
					<div class="form-group">
						<input name="mail_to_field" id="mail_to_field" type="text" class="form-control" placeholder="to">
					</div>
					<div class="form-group">
						<input name="mail_subject_field" id="mail_subject_field" type="text" class="form-control" placeholder="subject">
					</div>
					<textarea name="mail_body_field" id="mail_body_field" cols="30" rows="5" class="form-control" placeholder="content"></textarea>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
				<button type="button" data-dismiss="modal" class="btn btn-success"><i class="fa fa-save"></i></button>
				<button type="button" data-dismiss="modal" class="btn btn-primary">Send <i class="fa fa-send"></i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- new label Modal -->
<div id="labelModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Create / update label</h4>
			</div>
			<form action="#" id="newCategoryForm">
				<div class="modal-body">
					<div class="form-group m-0">
						<input type="text" id="catLabel" class="form-control" placeholder="Label">
					</div>
				</div><!-- .modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
				</div><!-- .modal-footer -->
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- delete item Modal -->
<div id="deleteItemModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete item</h4>
			</div>
			<div class="modal-body">
				<h5>Do you really want to delete this item ?</h5>
			</div><!-- .modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
			</div><!-- .modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <footer class="app-footer">
      <div class="clearfix">
        <!--<ul class="footer-menu pull-right">
          <li><a href="javascript:void(0)">Careers</a></li>
          <li><a href="javascript:void(0)">Privacy Policy</a></li>
          <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
        </ul>-->
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