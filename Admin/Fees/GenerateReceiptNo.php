<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
		$ssql="select *  from `fees` where `receipt`=''";
			$rs2= mysql_query($ssql);
			$cnt=1;			
				while($row = mysql_fetch_row($rs2))
				{
					$SRNO=$row[0];
					$Receiptno = "TF" . $cnt;
					//echo $Receiptno . "<br>";
					$cnt=$cnt +1;
					$ssql="UPDATE `fees` set `receipt`='$Receiptno' where `srno`='$SRNO'";
					//echo $ssql . "<br>";
					mysql_query($ssql) or die(mysql_error());
			
					
				}
			
?>