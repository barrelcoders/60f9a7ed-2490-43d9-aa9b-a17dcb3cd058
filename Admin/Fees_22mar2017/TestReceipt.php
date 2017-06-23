<?php include '../../connection.php';?>
<?php
// just insert html code into table
$varhtml = str_replace("'","''",$_REQUEST["htmlcode"]);

//echo $varhtml . $varprintdiv;
$receiptno = $_REQUEST["receiptno"];

		$ssql="select `FeeReceiptCode` from `fees_monthwise` WHERE `receipt`='TF1222'";
		$rs= mysql_query($ssql);
		while($row1 = mysql_fetch_row($rs))
		{
					$varhtml=$row1[0];
					
		}		
		echo $varhtml;
		exit();
?>
