<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <script src="jquery.min.js"></script>
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Teacher Class Mapping</title>
      <style>
         #username {
         color: #DE2A00;
         }
		 #ar
		 {
			 margin-left:60px;
		 }
      </style>
   </head>
   <body >
      <form action="" method="post" id="form">
         <table style="border:1; width:990px; height:auto ;"   cellpadding="0" cellspacing="0" align="center">
            <tr>
               <td colspan="2" align="center" style="font-size:x-large" ><b><span><font>
				Teacher Class Mapping</font></span></b></td>
            </tr>
            <tr>
               <td style="padding:0px 0px 0px 0x">    
                  
               </td>
               <td style="align:left;">
                  Class:     
                  <select name="itemcate" id="textbasic"  class="auto-style35" style="height: 22px";>
                     <option selected="" value="Select One">Select One</option>
                     <?php
$ssqlclass = "SELECT distinct `class` FROM `class_master`";
$rsclass   = mysql_query($ssqlclass);

while ($row1 = mysql_fetch_row($rsclass)) {
    $class = $row1[0];
?>
                    <option value="<?php
    echo $class;
?>"><?php
    echo $class;
?></option>
                     <?php
}
?>
                 </select>
                  <input type="submit" value="click On"  name="butt" />
               </td>
            </tr>
         </table>
         <table style="border:2px solid #993300; width:990px; height:auto ;"   cellpadding="0" cellspacing="0" align="center"    >
            <tr>
               <td align="center"><a href="#"></a></td>
               <td align="center"><a href="#"></a> </td>
            </tr>
         </table>
         <table style="border:2px solid ; width:990px; height:auto;"   cellpadding="0" cellspacing="0" align="center" >
            <?php
$result = mysql_query("SELECT * FROM   employee_master");
$i      = 1;
echo " <tr bgcolor=''><td style='padding:0px 0px 0px 25px;'><b>EMPID</b></td><td style='padding:0px 0px 0px 25px;'><b>Name</b></td><td style='padding:0px 0px 0px 10px;'><b>CLASS</b></td><td style='padding:0px 0px 0px 10px;'><b>SUBJECTS</b></td><td style='padding:0px 0px 0px 25px;'><b></b></td></tr>";
while ($test = mysql_fetch_array($result)) {
    
    echo " <tr>
                   <td><input type='text' name='EmpID'" . $i . "  value='" . $test['EmpId'] . "' readonly style=' text-align:center;'/></td>
                   
                   <td><input type='text' name='Name'" . $i . " value='" . $test['Name'] . "' readonly style=' text-align:center;'/></td>
				   
				   
				   
				   
				     <td>"; ?>
					 
					 <select name="itemcate" id="textbasic"  class="auto-style35" style="height: 22px";>
                     <option selected="" value="Select class">Select class</option>
                     <?php
$ssqlclass2 = "SELECT distinct `class` FROM `class_master`";
$rsclass2   = mysql_query($ssqlclass2);

while ($row12 = mysql_fetch_row($rsclass2)) {
    $class2 = $row12[0];
?>
                    <option value="<?php
    echo $class2;
?>"><?php
    echo $class2;
?></option>
                     <?php
}
?>
                 </select>
					 
					 <?php
					echo" </td>
				   
				    
				   
				   
				    <td>"; ?>
					 
					 <select name="itemcate" id="textbasic"  class="auto-style35" style="height: 22px";>
                     <option selected="" value="Select subject">Select subject</option>
                     <?php
$ssqlclass1 = "SELECT distinct `subject` FROM `subject_master`";
$rsclass1   = mysql_query($ssqlclass1);

while ($row11 = mysql_fetch_row($rsclass1)) {
    $class1 = $row11[0];
?>
                    <option value="<?php
    echo $class1;
?>"><?php
    echo $class1;
?></option>
                     <?php
}
?>
                 </select>
					 
					 <?php
					echo" </td>
				   
				   
				 
                   
                                          
               
               <td>                </td></tr>";
    
    
    
    
    $i = $i + 1;
    
}


?>
        </table>
         <table style="border:2px solid #993300; width:990px; height:auto;"   cellpadding="0" cellspacing="0" align="center">
            <tr>
               <td align="center"><input name="Submit1" type="submit"  value="Submit" /></td>
            </tr>
         </table>
      </form>

  </body>
</html>