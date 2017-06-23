<?php
include '../../connection.php';
?>
<?php

   $TestType = $_REQUEST["TestType"];
   
   $sql = "SELECT `MaxMarks` FROM `exam_master` WHERE `examtype`='$TestType'";
   $result = mysql_query($sql, $Con);
   while($row = mysql_fetch_assoc($result))
   				{
   					$MaxMarks=$row['MaxMarks'];
   					echo $MaxMarks;
   					exit();
   				}
   
   
?>