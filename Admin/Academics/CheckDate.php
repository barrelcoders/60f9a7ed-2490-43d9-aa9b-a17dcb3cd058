<?php
date_default_timezone_set("Asia/Calcutta");
//echo date_default_timezone_get();
//echo date('Y-m-d H:i:s');

$dt = new DateTime();
$dt1= $dt->format('Y-m-d H:i:s');
echo $dt1;
?>