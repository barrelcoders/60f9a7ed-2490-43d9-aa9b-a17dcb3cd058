<?php
error_reporting(E_ALL);

require_once(__DIR__.'/../classes/MySQLiDB.php');
require_once(__DIR__.'/../classes/QueryManager.php');
require_once(__DIR__.'/config.php');

$db= MySQLiDB::getInstance();

if(!$db){
    $db = new MySQLiDB ('localhost', 'root', '', 'barrel_schoolerp');
}

$manager = new QueryManager();

$SchoolName="Delhi Public School";
$SchoolIncidentMailId="incident@dpsfbd.info";
$PrincipalMailId="principal@dpsfbd.info";
$AccountsMailId="accounts@dpsfbd.info";
$BaseURL="http://dpsfbd.info/";
date_default_timezone_set('Asia/Calcutta');
?>