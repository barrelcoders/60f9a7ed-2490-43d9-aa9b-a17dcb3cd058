<?php
include 'connection.php';
include 'AppConf.php';
?>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/payroll.css" />
   <script src="js/bootstrap.min.js"></script>
<style>
nav a li a button{font-family:Arial !important;}
</style>

<script language="javascript">
function ValidateHeader3()
{
	//alert(document.getElementById("txtLoggedInUser").value);
	if(document.getElementById("cboApp").value != "Select One")
	{
		//alert(document.getElementById("cboApp").value);
		try
		    {    
				// Firefox, Opera 8.0+, Safari    
				document.getElementById("frmApp").submit();
			}
		  catch (e)
		    {
		    	//IE
		    	document.frmApp.submit;
			}
	}
}
</script>

<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><img src="images/logo.png" class="img-responsive"></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name">ABC</span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="images/DPS Logo.jpg" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../Login.php"><button class="btnmanu">Logout</button></a></li>
             </ul>
        </span>
  </div>
 </div> 
 <!-----manu---->
<form name="frmApp" id="frmApp" method="post" action="SubmitfrmApp.php">
 <div class="empmgt">
   <nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation">Show Manu
	 
	</a>
    <a href="#" title="Hide navigation">Hide Manu</a>
    <ul><?php $sql = "SELECT `Menu`,`PageURL` FROM `menu_master` WHERE `ApplicationName`='$SelectedAppName'  ";
	$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	?> 
     <li class="m active"><a href="<?php echo $row['PageURL']?>" active><button class="btnmanu"><?php echo $row['Manu']?></button></a></li>
     
     <?php } } ?>   
     	<!---<li class="m active"><a href="Employeemgt1.php" active><button class="btnmanu">HOME</button></a></li>
        <li class="m"><a href="Employeemgt2_Employeetask1.php"><button class="btnmanu">EMPLOYEE TASKS </button></a></li>
        <li class="m"><a href="HRISbasicdetail.php"><button class="btnmanu">NEW EMPLOYEE</button></a></li>
		<li  class="m"><a href="Employeemgt4_Employeeexit1.php" ><button class="btnmanu">EMPLOYEE EXIT</button></a></li>
		<li class="m"><a href="Employeemgt5_Communication1.php"><button class="btnmanu">COMMUNICATION</button></a></li>  
        <li class="m"><a href="Employeemgt6_Leavemgt1.php"><button class="btnmanu">LEAVE MGT</button></a></li>
        <li class="m"><a href="Employeemgt7_Servicebook1.php"><button class="btnmanu">SERVICE BOOK</button></a></li>-->
      <li style="margin-left:15%;">
      <?php
$sql = "SELECT `ApplicationName` , `MasterManu`, `Manu`, `PageURL`, `BaseURL` FROM `module_master` where 1=1"  ;
$result = $conn->query($sql);

?>
													
          <select name="" id="my_selection" size="1" name="cboApp" id="cboApp" onchange="Javascript:ValidateHeader3();" class="text-box tbs" style="width:100%; height:30px;" >
            <option value="">Select One</option>
            <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
            <option value="<?php echo $row['Manu']?>" href="<?php echo $row['BaseURL']?>"><?php echo $row['Manu']?></option>
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
 </form>