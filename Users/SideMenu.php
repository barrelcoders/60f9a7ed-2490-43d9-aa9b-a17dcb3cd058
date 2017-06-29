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
                  <a class="text-color" href="MyProfile.php">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logoff.php">
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
		<ul class="app-menu">
			<li class="has-submenu"><a href="News.php"><i class="menu-icon fa fa-newspaper-o"></i><span class="menu-text">News</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Notices.php"><i class="menu-icon fa fa-newspaper-o"></i><span class="menu-text">Notices</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Classwork.php"><i class="menu-icon fa fa-pencil"></i><span class="menu-text">Homework</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Attendance.php"><i class="menu-icon fa fa-hand-paper-o"></i><span class="menu-text">Attendance</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="MyFees.php"><i class="menu-icon fa fa-money"></i><span class="menu-text">My Fees</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="../ecommerce/index.php"><i class="menu-icon fa fa-shopping-cart"></i><span class="menu-text">School E-Shop</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="SchoolAlmnac.pdf"><i class="menu-icon fa fa-users"></i><span class="menu-text">School Almnac</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="DigitalVideo.php"><i class="menu-icon fa fa-film"></i><span class="menu-text">Digital Video Library</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="InfoCollection.php"><i class="menu-icon fa fa-info"></i><span class="menu-text">Info Collection Center</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Holiday.php"><i class="menu-icon fa fa-umbrella"></i><span class="menu-text">Holidays</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="ReportCard.php"><i class="menu-icon fa fa-briefcase"></i><span class="menu-text">Report Card</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="DateSheet.php"><i class="menu-icon fa fa-list"></i><span class="menu-text">Datesheet</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Timetable.php"><i class="menu-icon fa fa-calendar"></i><span class="menu-text">Timetable</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="SessionPlan.php"><i class="menu-icon fa fa-area-chart"></i><span class="menu-text">Session Plan</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Assignment.php"><i class="menu-icon fa fa-sticky-note"></i><span class="menu-text">Assignment</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Directory.php"><i class="menu-icon fa fa-user-md"></i><span class="menu-text">School Directory</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="Transport.php"><i class="menu-icon fa fa-bus"></i><span class="menu-text">Transport Details</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="SendQuery.php"><i class="menu-icon fa fa-question-circle"></i><span class="menu-text">Send A Query</span></a><ul class="submenu" style=""></ul></li>
			<li class="has-submenu"><a href="../Gallery/website_index.php"><i class="menu-icon fa fa-image"></i><span class="menu-text">Photo Gallery</span></a><ul class="submenu" style=""></ul></li>
			<li class="menu-separator"><hr></li>
		</ul><!-- .app-menu -->
	</div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->