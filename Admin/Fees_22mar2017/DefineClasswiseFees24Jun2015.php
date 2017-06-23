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
		
   
   $rsStudent=mysql_query("select `sadmission`,`sclass`,`srollno`,`sname`,`FinancialYear`,`routeno`,`Hostel` From `student_master` where `sclass`='$Class'");
   while($row = mysql_fetch_row($rsStudent))
		{
					$sadmission=$row[0];
					$sclass=$row[1];
					$srollno=$row[2];
					$sname=$row[3];
					$FinancialYear=$row[4];
					$routeno=$row[5];
					$Hostel=$row[6];
					if($FinancialYear==$CurrentFinancialYr)
					{
						$StudentType="new";
					}
					else
					{
						$StudentType="old";
					}
						
					
					
					if ($StudentType=="new")
					{
						$ssql="select `feeshead`,`amount`,`quarter`,`financialyear` from `fees_master_Q4` where `StudentType` in ('old','new') and `class`='$MasterClass'";
						$ssqlHostel="select `feeshead`,`amount`,`quarter`,`financialyear` from `fees_hostelmaster` where `StudentType`='new'";
					}
					else
					{
						$ssql="select `feeshead`,`amount`,`quarter`,`financialyear` from `fees_master_Q4` where `StudentType`= '$StudentType' and `class`='$MasterClass'";
						$ssqlHostel="select `feeshead`,`amount`,`quarter`,`financialyear` from `fees_hostelmaster` where `StudentType`='old'";
					}
					
				$rsFeeComponent=mysql_query($ssql);
				while($row1 = mysql_fetch_row($rsFeeComponent))
					{
						$feeshead=$row1[0];
						$amount=$row1[1];
						$quarter=$row1[2];
						$financialyear=$row1[3];
						mysql_query("INSERT INTO `fees_student` (`sadmission`,`class`,`feeshead`,`amount`,`quarter`,`financialyear`,`StudentType`,`FeesType`) VALUES ('$sadmission','$Class','$feeshead','$amount','$quarter','$financialyear','$StudentType','Regular')");
					}
				
				if($Hostel=="Yes")
				{
					$rsHostel=mysql_query($ssqlHostel);
					while($row2 = mysql_fetch_row($rsHostel))
					{
							$feeshead=$row2[0];
							$amount=$row2[1];
							$quarter=$row2[2];
							$financialyear=$row2[3];
							mysql_query("INSERT INTO `fees_student` (`sadmission`,`class`,`feeshead`,`amount`,`quarter`,`financialyear`,`StudentType`,`FeesType`) VALUES ('$sadmission','$Class','$feeshead','$amount','$quarter','$financialyear','$StudentType','Hostel')");
					}
				}
				if($routeno !="")					
				{
				
				
					$rsTransport=mysql_query("select `Route`,`RouteCharges`,`Quarter`,`financialyear`,`feeshead` from `fees_transportmaster` where `Route`='$routeno'");
					while($row2 = mysql_fetch_row($rsTransport))
					{
						$Route=$row2[0];
						//$BusStop=$row2[1];
						$amount=$row2[1];
						$Quarter=$row2[2];
						$financialyear=$row2[3];
						$feeshead=$row2[4];
						mysql_query("INSERT INTO `fees_student` (`sadmission`,`class`,`feeshead`,`amount`,`quarter`,`financialyear`,`StudentType`,`FeesType`) VALUES ('$sadmission','$Class','$feeshead','$amount','$Quarter','$financialyear','$StudentType','Transport')");
					}

				}
		}
echo "<br><br><center><b> Fee has been defined successfully!,<br>Click <a href='javascript:window.close();'>here</a> to close window!";			
?> 