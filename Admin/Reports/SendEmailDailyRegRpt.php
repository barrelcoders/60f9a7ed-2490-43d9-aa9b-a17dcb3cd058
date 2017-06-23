<?php
include '../../AppConf.php
include '../../Connection.php
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: communication@emeraldsis.com' . "\r\n";
$strMailBody=$_REQUEST["htmlcode"];
//$to = $EmailID;
$to = "inderprakash@gmail.com";
$subject="Daily Registration Report";
mail($to,$subject,$strMailBody,$headers);		
?>		