<?php
session_start();
error_reporting(0);
include '../connection.php';
include '../AppConf.php';
$tan=$_SESSION["tid"];
$tui=$_SESSION["tname"];
$sql="SELECT * FROM `employee_master` WHERE `UserId`='$tan'";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
			$tn=$row['Name'];  $teii=$row['EmpId']; 	$tt=$row['Title'];  $tdob=$row['DOB'];  $tg=$row['Gender'];	$tms=$row['MaritalStatus'];
			$tei=$row['email'];	$tmn=$row['MobileNo'];	$tppp=$row['ProfilePhoto'];
			$tpmi=$row['PersonalEmail'];	$tdg=$row['Designation'];	$tdoj=$row['DOJ'];	$tgrade=$row['Grade'];  $tgm=$row['GlobalManager'];  
			$tl1i=$row['L1_Approver_Id'];  $tl2i=$row['L2_Approver_Id'];  $thri=$row['HR_Approver_Id'];  $tsts=$row['status'];  
			$tet=$row['EmploymentType'];  $tnp=$row['NoticePeriod'];  $tpp=$row['ProbationPeriod'];	 $tcdd=$row['ConfirmationDueDate'];  
			$tcs=$row['ConfirmationStatus'];  $trd=$row['RelievingDate'];  $tou=$row['OrgUnit'];  $tws=$row['WorkSite'];  
			$tpad=$row['PermanentAddress'];  $tpct=$row['Permanentcity'];  $tpst=$row['PermanentState'];  $tppn=$row['PermanentPhone'];  
			$tca=$row['Address'];  $tcc=$row['City'];  $tcs=$row['State'];  $tcpn=$row['Phoneno'];  
			$tcn=$row['CompanyName'];  $tct=$row['CompanyTitle'];  $tsd=$row['StartDate'];  $ted=$row['EndDate'];  $tcl=$row['Location']; 
			$teq=$row['Education_Qualification'];  $tin=$row['InstituteName'];  $tsz=$row['Specialization'];  $tdfg=$row['DegreeFinalGrade'];  
			$tdsd=$row['DegreeStartDate'];  $tded=$row['DegreeEndDate'];  
			$tbn=$row['BankName'];  $tifsc=$row['IFSCCode'];  $tat=$row['AccountType'];  $tean=$row['EmpAccountNo'];  $tbb=$row['BankBranch'];  
			$tbba=$row['BankBranchAddress'];  $tpn=$row['PayeeName'];  
			$tun=$row['UanNo'];  $tpnn=$row['UanNo']; 
	}
}
?>
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
<style>
</style>
<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><a href="index.php"><img src="../images/logo.png" class="img-responsive"></a></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name"><?php echo $tn; ?><br /><?php echo $teii; ?></span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="<?php echo $tppp; ?>" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="ChangePassword.php"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../../Index.php"><button class="btnmanu">Logout</button></a></li>
             </ul>
        </span>
  </div>
 </div> 
 <!-----manu---->
 <div>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php
$sql = "SELECT * FROM `employee_manu` WHERE 1";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
        <li><a href="<?php echo $row['PageURL']?>"><?php echo $row['MasterMenu']?></a></li>
		<?php } } ?>
      </ul>
    </div>
  </div>
  </nav>
 </div>
 
        