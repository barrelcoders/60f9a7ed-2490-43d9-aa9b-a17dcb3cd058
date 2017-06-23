<?php
error_reporting(0);
$Con = mysql_connect("localhost","dpsfbd_info","b_l=-!&(B_g9");
if (!$Con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dpsfbd_db", $Con);
$SchoolName="Delhi Public School";
$SchoolIncidentMailId="incident@dpsfbd.info";
$PrincipalMailId="principal@dpsfbd.info";
$AccountsMailId="accounts@dpsfbd.info";
$BaseURL="http://dpsfbd.info/";
date_default_timezone_set('Asia/Calcutta');
?>