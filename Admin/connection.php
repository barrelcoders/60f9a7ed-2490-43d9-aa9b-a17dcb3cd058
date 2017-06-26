<?php


require_once('../classes/MySQLiDB.php');


$db=null;

if(MySQLiDB::getInstance()){
    $db = MySQLiDB::getInstance()
}
else{
    $db = new MySQLiDB ('localhost', 'root', '', 'barrel_schoolerp');
}

$manager = new QueryManager();

?>