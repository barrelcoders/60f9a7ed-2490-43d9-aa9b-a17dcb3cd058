<?php
session_start();
include 'connection.php';
include 'AppConf.php';
$an=$_SESSION["aname"];
$aui=$_SESSION["aid"];
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
  <div class="col-md-5"><a href="Index.php"><img src="images/logo.png" class="img-responsive"></a></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name"><?php echo $an; ?><br /><?php echo $aui; ?></span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="images/DPS Logo.jpg" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../Index.php"><button class="btnmanu">Logout</button></a></li>
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
        <li class="active"><a href="Index.php">HOME</a></li>
        <!--<li><a href="StaffUser_AssignRoles.php">EXISTING STUDENT TASKS</a></li>
        <li><a href="StudentUser.php">STUDENT WITHDRAWAL</a></li>
        <li><a href="AlumniUser.php" >ALUMNI STUDENTS</a></li>
        <li><a href="">SECTION & ROLL NO ALLOCATION</a></li>
        <li><a href="">REPORTS</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li>
        <?php
$sql = "SELECT * FROM `module_master` WHERE `Empid`='1' and `Status`='Active' "  ;
$result = $conn->query($sql);

?>
        <form action="SubmitfrmApp1.php" id="myForm" method="post">
         <select name="my_selection" id="my_selection"  onChange=selectChange(this.value)>
          <option value="">Select One</option>
            <?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		?>
            <option value="<?php echo $row['ModuleName']?>" ><?php echo $row['ModuleName']?></option>
            <?php } } ?>
         </select>
        </form>
       </li>
      </ul>
    </div>
  </div>
  </nav>
 </div> 