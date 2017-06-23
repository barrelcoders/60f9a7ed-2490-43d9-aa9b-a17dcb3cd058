<?php session_start();?>

<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>User Management</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
.col-md-10{height:535px !important;}
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
 <div class="c1">
  <div class="row c">
   <div class="col-md-2 hris1"> 
    <h4>SELF SERVICE</h4>
    <ul>
     <li class="active"><a href="StaffUser_AssignRoles.php"><button class="btnmanu">Assign Roles </button></a></li>
     <li><a href="RemoveRoles.php"><button class="btnmanu">Remove Roles </button></a></li>
     <li><a href="UserPermissionList.php"><button class="btnmanu">List of User Permissions </button></a></li>
    </ul>
   </div>
<!--------------Details------------------>
   <div class="col-md-10">
    <form action="#" method="post">
      <div class="assignrole">
       <div class="assignrole_outer">  <!---Start Containt-->
        <div class="assignrole_head">Assign Roles To Employees</div>
        <div class="assignrole_inner">
         <div class="row a">
          <div class="col-xs-4">
           <div>Employee Detail</div>
           <div>
            <table width="100%">
             <tr> <td>Employee ID:</td><td><input type="text" name="employeeid" name="employeeid" class="text-box" ></td> </tr>
             <tr> <td>Employee Name:</td><td>ASDFGHJKL</td> </tr>
             <tr> <td>Designation:</td><td>ZXCVBNM</td> </tr>
            </table>
           </div>
          </div>
          <div class="col-xs-4">
          <?php
			  $sql = "SELECT `srno`, `ApplicationName`, `ModulName`, `Menu`, `PageURL`, `BaseURL`, `status` FROM `modul_master` WHERE `ApplicationName`='Admin' "  ;
			  $result = $conn->query($sql);
			  
		  ?>
           <div>Application Name</div>
           <div>
              <select name="ApplicationName" id="ApplicationName" class="text-box" onchange="run()" size="7">
                  <?php if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
				  
				  ?>
                  <option value="<?php echo $row['ModulName']?>" ><?php echo $row['ModulName']?></option>
                  <?php } } ?>
              </select>
           </div>
          </div>
          <div class="col-xs-4">
           <div>Header Name</div>
           <div>
              <select name="HeaderName" id="HeaderName" class="text-box" size="7" >
                
              </select>
           </div>
          </div>
         </div>
         <div class="row a">
          <div class="col-xs-4">
           <div>Menu Name</div>
           <div>
              <select name="ManuName" id="ManuName" class="text-box" multiple size="7">
              </select>
           </div>
          </div>
          <div class="col-xs-4">
           <div>Add &amp; Remove</div>
           <div class="btns">
            <a href="#" id="add" class="btn1" style="padding:1% 5%">Add&nbsp;&raquo;</a><br><br>
            <a href="#" id="remove" class="btn1" >Delete&nbsp;&laquo;</a>
           </div>
          </div>
          <div class="col-xs-4">
           <div>Assigned Role</div>
           <div>
              <select name="AssignedRole" id="AssignedRole" class="text-box" multiple size="7">
              </select>
           </div>
          </div>
         </div>
        </div>
       </div>                          <!---End Containt-->
      </div>
      <div align="center"><input type="submit" name="submit" id="submit" class="btn" ></div>
     </form>
   </div>
  </div>
<!----------------->
 </div>
<!----------------->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
<script>
$('#ApplicationName').change(function(){
    $('#HeaderName').append("<option value="+$(this).val()+">"+$("#ApplicationName option:selected").text()+"</option>")
})
$('#HeaderName').change(function(){
    $('#ManuName').append("<option value="+$(this).val()+">"+$("#HeaderName option:selected").text()+"</option>")
})
$().ready(function() {  
 $('#add').click(function() {  
  return !$('#ManuName option:selected').remove().appendTo('#AssignedRole');  
 });  
 $('#remove').click(function() {  
  return !$('#AssignedRole option:selected').remove().appendTo('#ManuName');  
 });  
}); 
</script>>>>>>>>>>