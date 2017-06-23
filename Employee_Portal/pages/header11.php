


   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>

<!----Header--------->
  <div class="row t">
  <div class="col-md-5" style="padding: 0.17% 0;"><a href="index.php"><img src="../images/dpslogo.png" class="img-responsive"></a></div>
  <div class="col-md-4 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-2" align="right"><span class="name"><b><?php echo $Name;?></b><br><?php echo $Designation;?></span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="EmpPhoto/<?php echo $ProfilePhoto;?>" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../Login.php"><button class="btnmanu">Logout</button></a></li>
             </ul>
        </span>
  </div>
 </div> 
 <!-----manu---->
 <div>
   <nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation">Show Manu
	 
	</a>
    <a href="#" title="Hide navigation">Hide Manu</a>
    <ul>
        <li class="m active"><a href="index.php" active><button class="btnmanu">HOME</button></a></li>
        <li class="m"><a href="HRISmydetail.php"><button class="btnmanu">HRIS</button> </a></li>
        <li class="m "><a href="NewLeave.php"><button class="btnmanu">LEAVE</button></a></li>
        <li  class="m1"><a href="AttendanceMyRegularization.php" ><button class="btnmanu">ATTENDANCE</button></a></li>
		<li  class="m"><a href="payroll.php" ><button class="btnmanu">PAYROLL</button></a></li>
		<li class="m"><a href="exit.php"><button class="btnmanu">EXIT</button></a></li>
		<li  class="m1"><a href="helpdeskNewquery.php"><button class="btnmanu">HELPDESK</button></a></li> 
    </ul>
</nav>
  
 </div>
