<?php include '../../connection.php';?>

<?php

$Qry=$_REQUEST["Qry"];
//echo $Qry;

if ($Qry !="")
{
   						if (!$result = mysql_query($Qry))     die("Record Not Found in Quarter:" . $Quarter1);
						
						if(mysql_num_rows($result)>0)
						{
							header("Content-type: application/vnd.ms-excel");
							$SSTR="<TABLE>";
							$SSTR=$SSTR . "<TR>";
							$SSTR=$SSTR . "<TD>SR.NO.</TD>";
							$SSTR=$SSTR . "<TD>Admission Id</TD>";
							$SSTR=$SSTR . "<TD>Class</TD>";
							$SSTR=$SSTR . "<TD>Roll No.</TD>";
							$SSTR=$SSTR . "<TD>Name</TD>";
							$SSTR=$SSTR . "<TD>Rout No.</TD>";
							$SSTR=$SSTR . "<TD>Quarter</TD>";
							$SSTR=$SSTR . "<TD>Pending Tuition Fee</TD>";
							$SSTR=$SSTR . "<TD>Pending Transport Fee</TD>";
							$SSTR=$SSTR . "<TD>Pending Total Fee</TD>";
							$SSTR=$SSTR . "</TR>";
							
							$Cnt=1;
							while($row = mysql_fetch_assoc($result))
			   				{
			   					$sadmission=$row['sadmission'];
			   					$sclass=$row['sclass'];
			   					$srollno=$row['srollno'];
			   					$sname=$row['sname'];
			   					$routeno=$row['routeno'];
			   					$Qtr=$row['Quarter'];
			   					
			   					if ($row['PendingTution_Fee'] !='NULL')
			   					{
			   						$PendingTution_Fee=$row['PendingTution_Fee'];
			   					}
			   					else
			   					{
			   						$PendingTution_Fee=0;
			   					}
			   					if ($row['PendingTranportFee'] !='NULL')
			   					{
			   						$PendingTranportFee=$row['PendingTranportFee'];
			   					}
			   					else
			   					{
			   						$PendingTranportFee=0;
			   					}
			   					$Total=$PendingTution_Fee + $PendingTranportFee;
			   					
			   					$SSTR=$SSTR . "<TR>";
								$SSTR=$SSTR . "<TD>" . $Cnt . "</TD>";
								$SSTR=$SSTR . "<TD>" . $sadmission . "</TD>";
								$SSTR=$SSTR . "<TD>" . $sclass . "</TD>";
								$SSTR=$SSTR . "<TD>. $srollno .</TD>";
								$SSTR=$SSTR . "<TD>" . $sname . "</TD>";
								$SSTR=$SSTR . "<TD>" . $routeno . "</TD>";
								$SSTR=$SSTR . "<TD>" . $Qtr . "</TD>";
								$SSTR=$SSTR . "<TD>" . $PendingTution_Fee . "</TD>";
								$SSTR=$SSTR . "<TD>" . $PendingTranportFee . "</TD>";
								$SSTR=$SSTR . "<TD>" . $Total . "</TD>";
								$SSTR=$SSTR . "</TR>";
								
   							} //END OF WHILE LOOP
   							$SSTR=$SSTR . "</TABLE>";
   							echo $SSTR;
   						} // ENDO OF IF CONDITION
}

?>
