<?php 
include 'connection.php';

$selectOption = $_POST['my_selection'];

$sql = "SELECT * FROM `module_master` WHERE `ModuleName`='$selectOption' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$Base = $row['PageUrl'];
		//ob_start();
   //echo '<meta http-equiv="refresh" content="1;'.$Base.'" />';
   //ob_flush();
   ob_start();
   header("Location: $Base?mn=$selectOption");
   ob_flush();
    }

}
?>