<?php
include '../../connection.php';
?>
<?php
	$Grade=$_REQUEST["Grade"];
	$Class=$_REQUEST["Class"];
	$Grade =str_replace("plus","+",$Grade);
	$indicatortype=$_REQUEST["indicatortype"];
	if($indicatortype=="Assignment")
	{
   		$sql = "SELECT distinct `DescriptiveIndicator` FROM `reportcard_Class1and2_indicators` where `Grade`='$Grade' and `class` in (select distinct `MasterClass` from `class_master` where `class`='$Class') and `indicatortype`='Assignment & Project'";
   	}
   	if($indicatortype=="Pencil")
	{
   		$sql = "SELECT distinct `DescriptiveIndicator` FROM `reportcard_Class1and2_indicators` where `Grade`='$Grade' and `class` in (select distinct `MasterClass` from `class_master` where `class`='$Class') and `indicatortype`='Pencil & Paper Assessment'";
   	}
   	if($indicatortype=="Pencil")
	{
   		$sql = "SELECT distinct `DescriptiveIndicator` FROM `reportcard_Class1and2_indicators` where `Grade`='$Grade' and `class` in (select distinct `MasterClass` from `class_master` where `class`='$Class') and `indicatortype`='Pencil & Paper Assessment'";
   	}
   	if($indicatortype=="Numeracy")
	{
   		$sql = "SELECT distinct `DescriptiveIndicator` FROM `reportcard_Class1and2_indicators` where `Grade`='$Grade' and `class` in (select distinct `MasterClass` from `class_master` where `class`='$Class') and `indicatortype`='Numeracy Concepts'";
   	}
   	if($indicatortype=="Environment")
	{
   		$sql = "SELECT distinct `DescriptiveIndicator` FROM `reportcard_Class1and2_indicators` where `Grade`='$Grade' and `class` in (select distinct `MasterClass` from `class_master` where `class`='$Class') and `indicatortype`='Self and Environment'";
   	}	
   
   //echo $sql;
   //exit();
   
   $result = mysql_query($sql);
   while($row = mysql_fetch_assoc($result))
	{
		$DescriptiveIndicator=$row['DescriptiveIndicator'];
		break;
	}
	echo $DescriptiveIndicator;

?>