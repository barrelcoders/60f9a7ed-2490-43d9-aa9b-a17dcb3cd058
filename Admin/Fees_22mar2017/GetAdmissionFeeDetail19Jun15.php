<?php include '../../connection.php';?>

<?php
$BalanceAmt="";
$Class=$_REQUEST["Class"];
$Quarter=$_REQUEST["Quarter"];
$sAdmission = $_REQUEST["sadmission"];
$FinancialYear = $_REQUEST["financialyear"];

		$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `quarter`='$Quarter' and `feeshead`='tuitionfees' and `financialyear`='$FinancialYear'";
		$rstution = mysql_query($ssql);
		while($row = mysql_fetch_row($rstution))
				{
					$TutionFee=$row[0];					
				}
				
		$ssql = "SELECT distinct `routecharges` FROM `RouteMaster` where `routeno`=(SELECT `routeno` FROM `student_master` WHERE `sadmission`='$sAdmission')";
		$rsTransport = mysql_query($ssql );
		while($row1 = mysql_fetch_row($rsTransport))
				{
					$TransportFee=$row1[0];					
				}
				
		
		$rsSecurity = mysql_query("select `amount` from `fees_master` where `class`='$Class' and `feeshead`='Security'  and `financialyear`='$FinancialYear'");
		while($row = mysql_fetch_row($rsSecurity))
				{
					$SecurityFee = $row[0];					
					break;
				}
				
		$rsLab = mysql_query("select `amount` from `fees_master` where `class`='$Class' and `feeshead`='Lab Charge'  and `financialyear`='$FinancialYear'");
		while($row = mysql_fetch_row($rsLab))
				{
					$LabFee = $row[0];					
					break;
				}
		
		
		if ($Quarter =="")
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `feeshead`='admissionfees'  and `financialyear`='$FinancialYear'";
		}
		else
		{
			$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `feeshead`='admissionfees' and `financialyear`='$FinancialYear'";
		}
		$rsAdmission = mysql_query($ssql);
		while($row = mysql_fetch_row($rsAdmission))
				{
					$AdmissionFee=$row[0];					
				}
		
		$ssql = "SELECT distinct `amount` FROM `fees_master` where `class`='$Class' and `feeshead`='annualcharges'  and `financialyear`='$FinancialYear'";
		
		$rsAnnual = mysql_query($ssql);
		while($row1 = mysql_fetch_row($rsAnnual))
				{
					$AnnualFee = $row1[0];					
				}
		
		
		if ($Quarter=="Q1")
		{
			 $now = time(); // or your date as well
		     //$now = date("Y-m-d");
		     
		     $your_date = strtotime("2014-04-15");
		     $datediff = $now - $your_date;
		     $days = floor($datediff/(60*60*24));
			 if ($days<0) {$days=0;}
			 $LateDaysFinal=$days;
		}
		
		if ($Quarter=="Q2")
		{
			$now = time(); // or your date as well
		     //$now = date("Y-m-d");
		     
		     $your_date = strtotime("2014-07-15");
		     $datediff = $now - $your_date;
		     $days = floor($datediff/(60*60*24));
		     if ($days<0) {$days=0;}
			 $LateDaysFinal=$days;		
			
		}
		if ($Quarter=="Q3")
		{
			 $your_date = strtotime("2014-10-15");
		     $datediff = $now - $your_date;
		     $days = floor($datediff/(60*60*24));
		     if ($days<0) {$days=0;}
			 $LateDaysFinal=$days;
			
		}
		if ($Quarter=="Q4")
		{
			 $your_date = strtotime("2015-1-15");
		     $datediff = $now - $your_date;
		     $days = floor($datediff/(60*60*24));
			 if ($days<0) {$days=0;}
			 $LateDaysFinal=$days;
			
		}//END OF MAIN IF QUARTER Q4

		echo $TutionFee . "," . $TransportFee . "," . $BalanceAmt . "," . $LateDaysFinal . "," . $AdmissionFee . "," . $AnnualFee . "," . $SecurityFee . "," . $LabFee;
		exit();
?>