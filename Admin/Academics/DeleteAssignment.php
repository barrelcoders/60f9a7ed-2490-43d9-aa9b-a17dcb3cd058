<?php
session_start();
include '../../connection.php';
?>
<?php
   $SrNo=$_REQUEST["srno"];
   	
   	$ssql="SELECT `srno`, `class`, `subject`, `assignmentdate`, `assignmentcompletiondate`, `remark`, `assignmentURL`, `status`, `datetime` FROM `assignment` where `srno`='$SrNo'";
	$rs= mysql_query($ssql);
	if (mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_row($rs))
		{
			
			$class=$row[1];
			$subject=$row[2];
			$assignmentURL=$row[6];
			$assignmentdate=$row[3];
			break;
		}	
	}
   
  
   {
   		$ssql="delete from `assignment` where `srno`='$SrNo'";
   }  
   //echo $ssql;
	mysql_query($ssql) or die(mysql_error());
	echo "<br><br><center><b>Assignment has been deleted!<br>Click <a href='Javascript:window.close();'>here</a> to close window";
	exit();
?>
<html>
<head></head>
<body onunload="window.opener.location.reload();">
</body>
</html>
