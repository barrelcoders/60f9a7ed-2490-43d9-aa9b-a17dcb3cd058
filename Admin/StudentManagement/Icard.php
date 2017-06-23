<?php 

include '../../connection.php' ;
include '../../AppConf.php' ;

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paste Photograph</title>
</head>

<body>

<div style="position: absolute; width: 268px; height: 349px; z-index: 1; left: 25px; top: 16px" id="layer1">
	<table border="1" width="100%" height="361" cellspacing="0" cellpadding="2" style="border-collapse: collapse">
		<tr>
			<td>
			<p align="center">
			<img border="0" src="../images/logo.png" width="232" height="65">
			<font face="Cambria" size="2"><p align="center"><?php echo $SchoolAddress ?><br><br><b>Phone No :</b> <?php echo $SchoolPhoneNo ?></p> </font><br>
			<p align="center">&nbsp;</p>
			<div style="position: absolute; width: 127px; height: 120px; z-index: 1; left: 60px; top: 134px; border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" id="layer2">
				<p align="center">&nbsp;</p>
				<p align="center"><font face="Cambria">Paste Photograph</font></div>
			<p align="center">&nbsp;</p>
			
			<p align="Center"><b><font face="Cambria"><br>Admission No : </font>
			</b></p>
			<p align="Center"><b><font face="Cambria">Student Name : </font></b>
			</p>
			<p align="Center"><b><font face="Cambria">Father's Name : </font></b>
			</p>
			<p align="Center"><b><font face="Cambria">Provisional Class: </font>
			</b><br><br></td>
		</tr>
	</table>
</div>

</body>

</html>
