<?php
include '../../connection.php';
?>


<?php

	$Class=$_REQUEST["Class"];

	$RollNo=$_REQUEST["RollNo"];

	

   $sql = "SELECT distinct `sname` FROM `student_master` where `sclass`='$Class' and `srollno`='$RollNo'";

   $result = mysql_query($sql, $Con);

				while($row = mysql_fetch_assoc($result))

   				{

   					$StudentName=$row['sname'];

				}

				echo $StudentName;

?>