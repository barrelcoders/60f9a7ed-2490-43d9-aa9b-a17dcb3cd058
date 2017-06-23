<?php
error_reporting(0);
include 'connection.php';
include 'AppConf.php';
$an=$_SESSION["aname"];
$aui=$_SESSION["aid"];
$selectOption = $_REQUEST['my_selection'];
$sql = "SELECT * FROM `module_master` WHERE `ModuleName`='$selectOption'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$Base = $row['PageUrl'];
		//ob_start();
   //echo '<meta http-equiv="refresh" content="1;'.$Base.'" />';
   //ob_flush();
   ob_start();
   header("Location: $Base?mn=$selectOption");
   ob_flush();
    }

}
?>

   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
<style>
nav a li a button{font-family:Arial !important;}
</style>
<script>
function selectChange(val)
{
//Set the value of action in action attribute of form element.
//Submit the form
$('#myForm').submit();

}
</script>
<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><a href="../Index.php"><img src="../images/logo.png" class="img-responsive"></a></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name"><?php echo $an; ?><br /><?php echo $aui; ?></span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="../images/DPS Logo.jpg" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
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
     <form id="myForm1" action="#" method="post">
      <ul class="nav navbar-nav">
      <?php
	  $m=$_REQUEST['mn'];
$sql = "SELECT `srno`, `ApplicationName`, `MasterMenu`, `Menu`, `PageURL`, `BaseURL`, `status` FROM `menu_master` WHERE `MasterMenu`='$m' and `ApplicationName`='Admin' and `status`='Active'";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
        <li><a href="<?php echo $row['PageURL']?>"><?php echo $row['Menu']?></a></li>
       <?php } } ?> 
      </ul>
      </form>
      <ul class="nav navbar-nav navbar-right" style="margin-top:-1.1%">
       <li>
        <?php
$sql = "SELECT * FROM `module_master` WHERE `Empid`='1' and `Status`='Active'  "  ;
$result = $conn->query($sql);

?>
        <form action="" id="myForm" method="post">
         <select name="my_selection" id="my_selection"  onChange=selectChange(this.value)>
          <option value="">Select One</option>
            <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>  
            <option value="<?php echo $row['ModuleName']?>"  ><?php echo $row['ModuleName']?></option>
            <?php } } ?>
         </select>
        </form>
       </li>
      </ul>
    </div>
  </div>
  </nav>
 </div> 