<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if(isset($_POST['submit']))
{
    $startofficetimings=$_POST['StartOfficeTimings'];
    $endofficetimings=$_POST['EndOfficeTimings'];


    mysql_query("INSERT INTO appointment_timings(`StartOfficeTimings`,`EndOfficeTimings`)VALUES('$startofficetimings','$endofficetimings')");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" 
/>
<title>Appointment Timings</title>
<style type="text/css">
.footer {
     height:20px;
     width: 100%;
     background-image: none;
     background-repeat: repeat;
     background-attachment: scroll;
     background-position: 0% 0%;
     position: fixed;
     bottom: 2pt;
     left: 0pt;
}

.footer_contents

{       height:20px;
         width: 100%;
         margin:auto;
         background-color:Blue;
         font-family: Calibri;
         font-weight:bold;
}
</style>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
   <tr>
     <td align="center">
	<p align="left"><b><font face="Cambria">Define Office Timings</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left">&nbsp;</b></td>
   </tr>
</table>
<table class="name" width="100%">
   <tr>
     <td align="left"><font face="Cambria">Start Office Timings:</font></td>
     <td style="padding:0px 300px 0px 0px"><font face="Cambria">
	<input name="StartOfficeTimings" id="StartOfficeTimings" type="time" class="text-box" style="float: left" /></font></td>
   </tr>
   <tr>
     <td align="left"><font face="Cambria">End Office Timings:</font></td>
     <td style="padding:0px 300px 0px 0px"><font face="Cambria"><input name="EndOfficeTimings"  type="time" id="EndOfficeTimings" class="text-box" style="float: left" /></font></td>
   </tr>
  	<tr>
	
	<td style="text-align:center"  colspan="2">
				&nbsp;</td>
	
			</tr>
  	<tr>
	
	<td style="text-align:center"  colspan="2">
				<font face="Cambria">
				<input name="submit" type="submit" value="Submit" class="text-box" ></font></td>
	
			</tr>
   </table>
</form>
<font face="Cambria"><br>

</font>
<div align="center">
<table border=1 width="50%" id="table3" class="CSSTableGenerator" style="width:100%; border-collapse:collapse" 
cellspacing="0" cellpadding="0">
    <tr>
    		<td height="20" align="center" style="width: 14%" 
bgcolor="#95C23D"><b><font face="Cambria">Serial No.</font></b></td>
    		<td height="20" align="center" bgcolor="#95C23D"><b>
			<font face="Cambria">Start Office Timings</font></b></td>
	
    		
	
    		<td height="20" align="center" bgcolor="#95C23D"><b>
			<font face="Cambria">End Office Timings</font></b></td>
	
    		
	
    	</tr>
<?php
$result=mysql_query("SELECT `srno`, `StartOfficeTimings`, `EndOfficeTimings` FROM `appointment_timings` WHERE 1=1");

while($row= mysql_fetch_row($result))
{
?>
<tr>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[0]?></font></td>
	<td align="center" height="20" ><font face="Cambria"><?php echo $row[1]?></font></td>
	<td align="center" height="20" ><font face="Cambria"><?php echo $row[2]?></font></td>


	      </tr> <?php } ?> </table>

</div>

<div class="footer" align="center">
<div class="footer_contents" align="center"> <font color="#FFFFFF" face="Cambria" size="2">
	Powered by Online School Planet</font></div> </div> </body> </html>

