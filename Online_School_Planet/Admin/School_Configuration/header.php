<?php
include '../connection.php';
include '../AppConf.php';
$an=$_SESSION["aname"];
$aui=$_SESSION["aid"];
?>

   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
<style>
nav a li a button{font-family:Arial !important;}
</style>
<!----Header--------->
 <div class="row t">
  <div class="col-md-5"><a href="../Index.php"><img src="../images/logo.png" class="img-responsive"></a></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name"><?php echo $an; ?><br /><?php echo "1".$aui; ?></span></div>
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
      <ul class="nav navbar-nav">
        <li class="active"><a href="SchoolConf_Landing.php">HOME</a></li>
        <li><a href="AcademicSetup_ClassMaster.php">Academic Setup</a></li>
        <li><a href="FeeSetup_FeesMaster.php">Fees Setup</a></li>
        <li><a href="HRsetup_DepartmentMaster.php" >HR Setup</a></li>
        <li><a href="SchoolSetup.php" >School Setup</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li>
        <?php
$sql = "SELECT `srno`, `ApplicationName`, `ModulName`, `Menu`, `PageURL`, `BaseURL`, `status` FROM `modul_master` WHERE `ApplicationName`='Admin' "  ;
$result = $conn->query($sql);

?>
        <form action="#" method="post">
         <select name="my_selection" id="my_selection">
          <option value="">Select One</option>
            <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
            <option value="<?php echo $row['ModulName']?>" href="<?php echo $row['BaseURL']?>"><?php echo $row['ModulName']?></option>
            <?php } } ?>
         </select>
        </form>
       </li>
      </ul>
    </div>
  </div>
  </nav>
 </div>
     <script>
document.getElementById('my_selection').onchange = function() {
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
}
</script>  