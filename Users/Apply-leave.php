<?php 
	require_once('../include/connection.php');

	session_start();
	if(!isset($_SESSION['userid']))
	{
		echo "<br><br><center><b>Session has bee expired<br>Click <a href='../studentlogin.php'>here</a> to re-login!";
		exit();
	}
	$admissionId  = $_SESSION['userid'];
	$leaveTypes = $db->rawQuery($manager->query['StudentLeaveTypes']);
	$studentLeaves = $db->rawQuery($manager->query['StudentLeaveRecordByAdmissionId'], array($admissionId));
	if(isset($_POST['btnSubmit'])){ 
		if($_POST['txtStartDate'] != "" && $_POST['txtEndDate'] != "" && $_POST['txtReason'] != "" && $_POST['txtContact'] != ""){
			$startDate=date("Y-m-d", strtotime($_POST['txtStartDate']));
			$reason=$_POST['txtReason'];
			$leaveType=$_POST['slLeaveType'];
			$endDate=date("Y-m-d", strtotime($_POST['txtEndDate']));
			$ContactNoDuringLeave=$_POST['txtContact'];
			$applyDate=  date("Y-m-d");
			$days = abs(floor((strtotime($endDate)-strtotime($startDate)) / (60 * 60 * 24)))+1;
			
			$leaveId = $db->insert('student_leave_transaction', array (
				"LeaveFrom"=>$startDate,
				"Reason"=>$reason,
				"LeaveType"=>$leaveType,
				"NoOfDays"=>$days,
				"LeaveTo"=>$endDate,
				"EntryDate"=>$applyDate,
				"sadmission"=>$admissionId,
				"ContactNoDuringLeave"=>$ContactNoDuringLeave
			));
			
			echo "<script type='text/javascript'>alert('Leave applied successfully');</script>";
			$studentLeaves = $db->rawQuery($manager->query['StudentLeaveRecordByAdmissionId'], array($admissionId));
			//TODO: Send Mail on Leave Applied
			/*if($leaveApplied){
				if($days>0 ||  $days<3){ 
					$to = "roymanish28@gmail.com";
				}else if($days>2 || $days<11){
					$to = "roymanish28@gmail.com";  
				}else if($days>10){
					$to = "roymanish28@gmail.com";  
				}
				
				$subject = "Student Leave";
				$message = "<html>
								<head>
									<title>HTML email</title>
								</head>
								<body>
									<p>Dear Sir</p>
									<table>
									<tr>
										<th>Leave</th>
										<th>Apply</th>
									</tr>
									</table>
								</body>
							</html>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <manish@gmail.com>' . "\r\n";
				$headers .= 'Cc: mohit@gmail.com' . "\r\n";
				mail($to, $subject, $message, $headers);
			}else{
				echo "Problem applying leave, Please try again later";die;
			}*/
			
		}
		else{
			echo "<script type='text/javascript'>alert('Please fill the required fields');</script>";
		}
	}
?>
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
			  <h5 class="page-title hidden-menubar-top hidden-float">Apply Leave</h5>
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
											<label>Application Date</label>
											<p><?php echo date('M, d Y')?></p>
										</div>
									</div>					
									<div class="col-sm-6"></div>									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="slSubjects">Leave Type</label>
											<select size="1" name="slLeaveType" id="slLeaveType" class="form-control" >
												<?php foreach($leaveTypes as $items){ ?>
													<option value="<?php echo $items['LeaveType']; ?>"><?php echo $items['LeaveType']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>					
									<div class="col-sm-6"></div>									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="txtStartDate">Start Date</label>
											<div class="input-group date" data-plugin="datetimepicker">
												<input type="text" class="form-control" id="txtStartDate" name="txtStartDate" />
												<span class="input-group-addon bg-info text-white">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>	
									<div class="col-sm-6"></div>	
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="txtEndDate">End Date</label>
											<div class="input-group date" data-plugin="datetimepicker">
												<input type="text" class="form-control" id="txtEndDate" name="txtEndDate" />
												<span class="input-group-addon bg-info text-white">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>	
									<div class="col-sm-6"></div>									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="txtReason">Reason</label>
											<textarea  class="form-control" id="txtReason" name="txtReason"></textarea>
										</div>
									</div>	
									<div class="col-sm-6"></div>									
								</div> 
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="txtContact">Contact No During Leave</label>
											<input type="text" class="form-control" id="txtContact" name="txtContact"></textarea>
										</div>
									</div>	
									<div class="col-sm-6"></div>									
								</div> 
								<button type="submit" class="btn btn-primary btn-md" name="btnSubmit" value="Apply">Apply</button>
							</form>
							<br>
							<br>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>S. No.</th>
										<th>Leave From</th>
										<th>Leave To</th>
										<th>Days</th>
										<th>Leave Type</th>
										<th>Reason</th>
										<th>Status</th>
									</tr>
									<?php 
										$SNo = 1;
										foreach ($studentLeaves as $item) {  ?>
										<tr>
											<td><?php echo $SNo; ?></td>
											<td><?php echo $item['LeaveFrom']; ?></td>
											<td><?php echo $item['LeaveTo']; ?></td>
											<td><?php echo $item['NoOfDays']; ?></td>
											<td><?php echo $item['LeaveType']; ?></td>
											<td><?php echo $item['Reason']; ?></td>
											<td><?php echo $item['ApprovalStatus']; ?></td>
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
