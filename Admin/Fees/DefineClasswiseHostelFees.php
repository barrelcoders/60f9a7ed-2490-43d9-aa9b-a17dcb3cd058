<?php
include '../../connection.php';
session_start();
?>
<?php
$Class=$_REQUEST["Class"];

   //$sql = "SELECT distinct `MasterClass` FROM `class_master`";
   $sql = "SELECT distinct `MasterClass` FROM `class_master` where `class`='$Class'";
   $rsClass = mysql_query($sql, $Con);
   while($row = mysql_fetch_row($rsClass))
	{
		$MasterClass=$row[0];
		break;
	}
	
   
   $sql = "SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
   $rsFy = mysql_query($sql, $Con);
   while($row = mysql_fetch_row($rsFy))
		{
			$CurrentFinancialYr=$row[0];
			break;
		}
		
   

 	$rsStudent=mysql_query("select `sadmission`,`sclass`,`srollno`,`sname`,`FinancialYear`,`routeno`,`Hostel`,`DiscontType`,`MasterClass`,`HostelFY`,`Computer` From `student_master` where `sclass`='$Class' and `Hostel`='Yes' and `sadmission` not in (select distinct `sadmission` from `fees_student_hostel` where `financialyear`='$CurrentFinancialYr')");
   while($row = mysql_fetch_row($rsStudent))
		{
					$sadmission=$row[0];
					$sclass=$row[1];
					//$Class=$row[1];
					$srollno=$row[2];
					$sname=$row[3];
					$FinancialYear=$row[4];
					$routeno=$row[5];
					$Hostel=$row[6];
					$DiscountType=$row[7];
					$MasterClass=$row[8];
					$HostelFY=$row[9];
					$Computer=$row[10];
					
					if($FinancialYear==$CurrentFinancialYr)
					{
						$StudentType="new";
					}
					else
					{
						$StudentType="old";
					}
						
					
					
				
					
					
					if($HostelFY==$CurrentFinancialYr)
					{
						//$StudentType="new";
						$ssqlHostel="select `feeshead`,`amount`,`financialyear` from `fees_hostelmaster`";
					}
					else
					{
						$ssqlHostel="select `feeshead`,`amount`,`financialyear` from `fees_hostelmaster` where `StudentType`='old'";
					}
					
					
				
				
			
				if($Hostel=="Yes")
				{
					$rsHostel=mysql_query($ssqlHostel);
					while($row2 = mysql_fetch_row($rsHostel))
					{
							$feeshead=$row2[0];
							$amount=$row2[1];
							$financialyear=$row2[2];
							mysql_query("INSERT INTO `fees_student_hostel` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`amount`,`financialyear`,`StudentType`,`FeesType`) VALUES ('$sadmission','$Class','$sname','$feeshead','$amount','$amount','$financialyear','$StudentType','Hostel')");
					}
				}
				
				
				$rsCloseAmtCreditDebit=mysql_query("select `FeesType`,`amount` from `student_cr_dr_amount` where `sadmission`='$sadmission' and `FeesType` in ('HOSTEL AMOUNT CREDIT','HOSTEL AMOUNT DEBIT')");
				while($rowC=mysql_fetch_row($rsCloseAmtCreditDebit))
				{
					$feeshead=$rowC[0];
					$amount=$rowC[1];
					mysql_query("INSERT INTO `fees_student_hostel` (`sadmission`,`class`,`Name`,`feeshead`,`actualamount`,`amount`,`financialyear`,`StudentType`,`FeesType`) VALUES ('$sadmission','$Class','$sname','$feeshead','$amount','$amount','$financialyear','$StudentType','Regular')");
				}
				
				
		}
echo "<br><br><center><b> Fee has been defined successfully!,<br>Click <a href='javascript:window.close();'>here</a> to close window!";			
?> 