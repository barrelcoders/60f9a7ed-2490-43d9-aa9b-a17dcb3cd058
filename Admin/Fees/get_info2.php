<?php
include '../../connection.php';
?>
<?php

if(isset($_REQUEST['c']))
{
	$sql="SELECT `sname`,`sclass`,`srollno`,`suser`,`spassword` FROM user_master WHERE sadmission='".$_REQUEST['c']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sname'].",".$fetch['sclass'].",".$fetch['srollno'].",".$fetch['suser'].",".$fetch['spassword'];
	
}
if(isset($_REQUEST['adm']))
{
	$sql1="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['adm']."'";
	$select1=mysql_query($sql1);
	$fetch1=mysql_fetch_array($select1);
	echo $fetch1['srollno'];
	
}
if(isset($_REQUEST['clas']))
{
	$sql="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['clas']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sclass'];

}
if(isset($_REQUEST['user']))
{
	$sql="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['user']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['suser'];

}
if(isset($_REQUEST['pass']))
{
	$sql="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['pass']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['spassword'];

}
?>




