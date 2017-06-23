<?php 

session_start();

include '../../connection.php';

?>

<?php

if($_REQUEST["isHeaderSubmit"]=="yes")
{

	$SelectedAppName=$_REQUEST["cboApp"];

	$_SESSION['SelectedAppName']=$SelectedAppName;

	

	$ssql="SELECT distinct `BaseURL` FROM `menu_master` where `ApplicationName`='$SelectedAppName'";

	$rsBaseUrl= mysql_query($ssql);

	while($row = mysql_fetch_row($rsBaseUrl))

	{

		$BaseURL=$row[0];

		//header("Location: $BaseURL");

		break;

	}

	//echo $BaseURL;
	//exit();

	//header("Location: $BaseURL");	

	//header("Location: StudentManagement.php");	

	ob_start();
   echo '<meta http-equiv="refresh" content="1;'.$BaseURL.'" />';
   ob_flush();
}
?>