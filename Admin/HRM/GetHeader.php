<?php include '../../connection.php'; ?>
<?php
$Application=$_REQUEST["Application"];

$ssql="SELECT distinct `Menu` FROM `menu_master` WHERE `ApplicationName`='$Application' and `Menu`=`MasterMenu`";
$rsMainMenu= mysql_query($ssql);
	
while($row = mysql_fetch_assoc($rsMainMenu))
{
		$sstr=$sstr.$row['Menu'].',';	
}
echo(str_replace(' 1','1',substr($sstr,0,strlen($sstr)-1)));
exit();
?>