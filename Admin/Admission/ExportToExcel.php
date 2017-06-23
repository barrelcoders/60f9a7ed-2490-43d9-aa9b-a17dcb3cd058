<?php
$htmlcode=$_REQUEST["htmlCode"];
$filename = "Report.xls";      
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
echo $htmlcode;
?>
