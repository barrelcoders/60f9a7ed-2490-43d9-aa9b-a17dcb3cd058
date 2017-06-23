<?php
include '../../connection.php';

?>

<?php



$Class=$_REQUEST["Class"];



		

			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `feeshead`='registrationfees' and `financialyear`='2014'";

		

		$rsAdmission = mysql_query($ssql);

		while($row = mysql_fetch_row($rsAdmission))

				{

					$AdmissionFee=$row[0];					

				}

		

		

		echo $AdmissionFee;

		exit();

?>