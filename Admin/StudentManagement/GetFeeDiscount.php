<?php
include '../../connection.php';
?>


<?php




$discounttype=$_REQUEST["discounttype"];

$financialyear=$_REQUEST["financialyear"];

$discountreason=$_REQUEST["discountreason"];



if ($discountreason == "admissionfees")

{

	$ssqlFY="SELECT `percentage` FROM `discounttable` where `head`='$discounttype' and `financialyear`='$financialyear' and `discounttype`='admissionfees'";

	$rsFY= mysql_query($ssqlFY);

	if (mysql_num_rows($rsFY) > 0)

	{

		while($rowFY = mysql_fetch_row($rsFY))

		{

			$DiscountPercent=$rowFY[0];

		}

	}

	else

	{

		$DiscountPercent=0;

	}

	echo $DiscountPercent;

	exit();

}

if ($discountreason == "annualfees")

{

	$ssqlFY1 = "SELECT `percentage` FROM `discounttable` where `head`='$discounttype' and `financialyear`='$financialyear' and `discounttype`='annualcharges'";

	

	$rsFY1= mysql_query($ssqlFY1);

	if (mysql_num_rows($rsFY1) > 0)

	{

		while($row = mysql_fetch_row($rsFY1))

		{

			$DiscountPercent=$row[0];

		}

	}

	else

	{

		$DiscountPercent=0;

	}

	echo $DiscountPercent;

	exit();

}





?>