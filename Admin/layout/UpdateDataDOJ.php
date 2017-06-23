<?php
include '../connection.php';
  
	$sql="SELECT `sadmission`, `DateOfAdmission` FROM `doj_temp`";
    $rs= mysql_query($sql);
	while($row = mysql_fetch_row($rs))
	{
		$sadmission=$row[0];
		$DateOfAdmission=$row[1];
	
		$ssql="update `Almuni` set `DateOfAdmission`='$DateOfAdmission' where `sadmission`='$sadmission'";
		echo $ssql."<br>";
		//mysql_query($ssql);
   	}
   	echo "Updated Successfully!";
?>