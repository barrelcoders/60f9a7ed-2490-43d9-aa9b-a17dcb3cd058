<?php
include '../connection.php';
include '../AppConf.php';
?>
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
<style>
nav a li a button{font-family:Arial !important;}
</style>
<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><img src="../images/logo.png" class="img-responsive"></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name">ABC</span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="../images/DPS Logo.jpg" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../AdminLogin.php"><button class="btnmanu">Logout</button></a></li>
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
        <li class="m active"><a href="Employeepayroll.php" active><button class="btnmanu">HOME</button></a></li>
        <li class="m" style="width:12%"><a href="Employeefinancial.php"><button class="btnmanu">Employee Financials </button></a></li>
        <li class="m" style="width:12%"><a href="Employeemonthlysalary_presheet.php"><button class="btnmanu">Monthly Salary Tasks</button></a></li>
        <li  class="m1"><a href="Emplpaysetam_adddepartment.php" ><button class="btnmanu">My Masters</button></a></li>
		<li  class="m"><a href="Employeepayroll_Incometax1.php" ><button class="btnmanu">Income Tax</button></a></li>
     
      <li style="margin-left:38%;">
          <?php
$sql = "SELECT `srno`, `ApplicationName`, `ModulName`, `Menu`, `PageURL`, `BaseURL`, `status` FROM `modul_master` WHERE `ApplicationName`='Admin' "  ;
$result = $conn->query($sql);

?>
													
          <select name="" id="my_selection" class="text-box tbs" style="width:140%; height:30px;" >
            <option value="">Select One</option>
            <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
            <option value="<?php echo $row['ModulName']?>" href="<?php echo $row['BaseURL']?>"><?php echo $row['ModulName']?></option>
            <?php } } ?>
          </select>
          <script>
document.getElementById('my_selection').onchange = function() {
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
}
</script>
        </li>
     </ul>
</nav>
  
 </div>