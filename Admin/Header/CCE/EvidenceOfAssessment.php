<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php'
?>
<?php
$Class=$_REQUEST["txtClass"];
	$ssql="SELECT distinct `subject` FROM `report_card` where `sclass`='$Class' and `subject` !='ICT'";
		$rs= mysql_query($ssql);
		if(mysql_num_rows($rs)>0)
		{
			$cnt=1;
			while($row = mysql_fetch_array($rs))
			  {
			  	$arrSubject[$cnt]=$row[0];
			  	$cnt=$cnt+1;
			  }
			  
		}
		$SubjectCount=$cnt-1;
		
	$sql="SELECT `srollno` FROM `report_card`";
		$rsl1= mysql_query($sql);
			$RollNo="";
			while($row = mysql_fetch_array($rsl1))
			  {
			  	$RollNo=$RollNo . $row[0].",";
			  }
			  $AllRollNos=substr($RollNo,0,strlen($RollNo)-1);
		
		$ssql="SELECT distinct `sname`,`sclass`,`srollno` FROM `report_card` where `sclass`='$Class' and `srollno` in ($AllRollNos)";
		$rs1= mysql_query($ssql);

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Roll</title>
</head>
<style>
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
.style1 {
	text-align: center;
}
.style2 {
	border-width: 1px;
}
</style>
<body>
<p><b><font size=3 face="Cambria">Evidence Of CCE Assessment</font></b></p>
<hr>
<p><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></p>
<p>&nbsp;</p>
<table border="1" style="border-collapse: collapse">
<tr>
<td colspan="123" class="style1"><font face="Cambria"><b>All Students (Class: <?php echo $Class;?>)</b></font></td>
</tr>
<tr>
<th rowspan="3"><font face="Cambria" style="font-size: 11pt">Roll.No.</font></th>
<th rowspan="3"><font face="Cambria" style="font-size: 11pt">Name</font></th>
<th rowspan="3"><font face="Cambria" style="font-size: 11pt">Father Name</font></th>
<?php
	for($i=1;$i <= count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
			$Style="";
			if($i%2==0)
			{
				//$Style='class="style3"';
			}
?>
<th colspan="8" style="width: 20px" <?php echo $Style;?>><font face="Cambria" style="font-size: 11pt"><?php echo $Subject;?></font></th>
	<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i <= count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
?>
<th colspan="2" style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">FA1</font></th>
<th colspan="2" style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">FA2</font></th>
<th colspan="2" style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">SA1</font></th>
<th colspan="2" style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">Term1</font></th>
<!--
<th colspan="3"><font face="Cambria" style="font-size: 11pt">FA3</font></th>
<th colspan="3"><font face="Cambria" style="font-size: 11pt">FA4</font></th>
<th colspan="3"><font face="Cambria" style="font-size: 11pt">SA2</font></th>
<th colspan="3"><font face="Cambria" style="font-size: 11pt">Term2</font></th>
-->
<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i <= count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
			
?>
<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">M</font></th>
<!--<th><font face="Cambria" style="font-size: 11pt">%</font></th>-->
<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">G</font></th>
<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">M</font></th>

<!--<th><font face="Cambria" style="font-size: 11pt">%</font></th>-->

<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">G</font></th>
<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">M</font></th>

<!--<th><font face="Cambria" style="font-size: 11pt">%</font></th>-->

<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">G</font></th>
<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">M</font></th>
<!--<th><font face="Cambria" style="font-size: 11pt">%</font></th>-->

<th style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">G</font></th>
<!--
<th><font face="Cambria" style="font-size: 11pt">M</font></th>
<th><font face="Cambria" style="font-size: 11pt">%</font></th>
<th><font face="Cambria" style="font-size: 11pt">G</font></th>
<th><font face="Cambria" style="font-size: 11pt">M</font></th>
<th><font face="Cambria" style="font-size: 11pt">%</font></th>
<th><font face="Cambria" style="font-size: 11pt">G</font></th>
<th><font face="Cambria" style="font-size: 11pt">M</font></th>
<th><font face="Cambria" style="font-size: 11pt">%</font></th>
<th><font face="Cambria" style="font-size: 11pt">G</font></th>
<th><font face="Cambria" style="font-size: 11pt">M</font></th>
<th><font face="Cambria" style="font-size: 11pt">%</font></th>
<th><font face="Cambria" style="font-size: 11pt">G</font></th>
-->
<?php } ?>
</tr>
<?php
//mysql_query("truncate table `report_card_rank`") or die(mysql_error());
while($row = mysql_fetch_array($rs1))
  {
  	$StudentName=$row[0];
  	$StudetnClass=$row[1];
  	$StudetnRollNo=$row[2];
  	$rsFName= mysql_query("select `sfathername` from `student_master` where `sclass`='$StudetnClass' and `srollno`='$StudetnRollNo'");
  	while($rowF=mysql_fetch_array($rsFName))
  	{
  		$FatherName=$rowF[0];
  		break;
  	}  			
?>
<tr>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $StudetnRollNo;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $StudentName;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FatherName;?></font></td>
	<?php
		$FA1_MarksObtained=0;
		$FA2_MarksObtained=0;
		$FA3_MarksObtained=0;
		$FA4_MarksObtained=0;
		$SA1_MarksObtained=0;
		$SA2_MarksObtained=0;
		$FA1_convertedmarks=0;
		$FA2_convertedmarks=0;
		$SA1_convertedmarks=0;
		$SumOfMaxMarks=0;
		$SumOfObtainedMarks=0;
		
		for($i=1;$i <= count($arrSubject);$i++)
			{
				$FA1ObtainedMarks=0;
				$FA2ObtainedMarks=0;
				$FA3ObtainedMarks=0;
				$SA1ObtainedMarks=0;
				$SA2ObtainedMarks=0;
				$FA1_UT="";
				$FA1_A1="";
				$FA1_A2="";
				$FA1_A3="";
				$FA1_OTBA="";
				$FA1_ASL="";
				$FA2_UT="";
				$FA2_A1="";
				$FA2_A2="";
				$FA2_A3="";
				$FA2_OTBA="";
				$FA2_ASL="";
				
				$SA1_UT="";
				$SA1_A1="";
				$SA1_A2="";
				$SA1_A3="";
				$SA1_OTBA="";
				$SA1_ASL="";
				$FA1_Grade="";
				$FA2_Grade="";
				$SA1_Grade="";
				$FA1_MarksObtained="";
				$FA2_MarksObtained="";
				$SA1_MarksObtained="";

				
				$Subject = $arrSubject[$i];
				$rsFA1= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA1'");
				$rsFA2= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA2'");
				$rsFA3= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA3'");
				$rsFA4= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA4'");
				$rsSA1= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA1'");
				$rsSA2= mysql_query("select `marks`,`Grade`,`MaxMarks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` from `report_card` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA2'");
				while($row1 = mysql_fetch_array($rsFA1))
  				{
  					$FA1_MarksObtained=$row1[0];
  					//$FA1_Grade=$row1[1];
  					$FA1MaxMarks=$row1[2];
  					
					$FA1_UT=$row1[3];
					$FA1_A1=$row1[4];
					$FA1_A2=$row1[5];
					$FA1_A3=$row1[6];
					$FA1_OTBA=$row1[7];
					$FA1_ASL=$row1[8];
					$SumFA1=number_format(($FA1_UT+$FA1_A1+$FA1_A2+$FA1_A3)/3,1);
					$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $FA1MaxMarks . " and " . $SumFA1 . " >= `RangeFrom` and " . $SumFA1 . "<=`RangeTo`";
					$rs= mysql_query($ssql);
					while($row = mysql_fetch_row($rs))
					{
						$FA1_Grade= $row[0];
						//$FA1_Grade= $row[0]."-(".($FA1_UT+$FA1_A1+$FA1_A2+$FA1_A3)."/3)"."/".$FA1MaxMarks;
						$FA1GradePoint = $row[1];
					}
					
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row1[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row1[0];
  					break;
  				}
  				while($row2 = mysql_fetch_array($rsFA2))
  				{
  					$FA2_MarksObtained=$row2[0];
  					//$FA2_Grade=$row2[1];
  					
  					$FA2MaxMarks=$row2[2];
  					$FA2_UT=$row2[3];
					$FA2_A1=$row2[4];
					$FA2_A2=$row2[5];
					$FA2_A3=$row2[6];
					$FA2_OTBA=$row2[7];
					$FA2_ASL=$row2[8];
					$SumFA2=number_format(($FA2_UT+$FA2_A1+$FA2_A2+$FA2_A3)/3,1);
					$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $FA2MaxMarks . " and " . $SumFA2 . " >= `RangeFrom` and " . $SumFA2 . "<=`RangeTo`";
					$rs= mysql_query($ssql);
					while($row = mysql_fetch_row($rs))
					{
						$FA2_Grade= $row[0];
						//$FA2_Grade= $row[0]."-(".($FA2_UT+$FA2_A1+$FA2_A2+$FA2_A3)."/3)"."/".$FA2MaxMarks;
						$FA2GradePoint = $row[1];
					}
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row2[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row2[0];
  					break;
  				}
  				while($row3 = mysql_fetch_array($rsFA3))
  				{
  					$FA3_MarksObtained=$row3[0];
  					$FA3_Grade=$row3[1];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row3[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row3[0];
  					break;
  				}
  				while($row4 = mysql_fetch_array($rsFA4))
  				{
  					$FA4_MarksObtained=$row4[0];
  					$FA4_Grade=$row4[1];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row4[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row4[0];
  					break;
  				}
  				while($row5 = mysql_fetch_array($rsSA1))
  				{
  					$SA1_MarksObtained=$row5[0];
  					//$SA1_Grade=$row5[1];
  					if($Subject=="Information Technologies (IT)")
					{
  						$SA1MaxMarks=$row5[2];
  					}
  					else
  					{
  						$SA1MaxMarks=$row5[2]/3;
  					}
  					$SA1_UT=$row5[3];
					$SA1_A1=$row5[4];
					$SA1_A2=$row5[5];
					$SA1_A3=$row5[6];
					$SA1_OTBA=$row5[7];
					$SA1_ASL=$row5[8];
					if($Subject=="Information Technologies (IT)")
					{
  						$SumSA1=number_format(($SA1_UT+$SA1_A1+$SA1_A2+$SA1_A3),1);
  					}
  					else
  					{
						$SumSA1=number_format(($SA1_UT+$SA1_A1+$SA1_A2+$SA1_A3)/3,1);
					}
					
					$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $SA1MaxMarks . " and " . $SumSA1. " >= `RangeFrom` and " . $SumSA1. "<=`RangeTo`";
					$rs= mysql_query($ssql);
					while($row = mysql_fetch_row($rs))
					{
						$SA1_Grade= $row[0];
						//$SA1_Grade= $row[0]."-(".($FA2_UT+$FA2_A1+$FA2_A2+$FA2_A3)."/3)"."/".$FA2MaxMarks;
						$SA1GradePoint = $row[1];
					}
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row5[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row5[0];
  					break;
  				}
  				while($row6 = mysql_fetch_array($rsSA2))
  				{
  					$SA2_MarksObtained=$row6[0];
  					$SA2_Grade=$row6[1];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row6[2];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row6[0];
  					break;
  				}
  				//$Term1ObtainedMarks=$FA1_MarksObtained + $FA2_MarksObtained + number_format($SA1_MarksObtained/3,1);
  				$Term1ObtainedMarks=number_format($SumFA1+$SumFA2+$SumSA1,1);
  				$PercentTerm1=($Term1ObtainedMarks/$SumOfMaxMarks)*100;
	?>
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo $FA1_MarksObtained;?></font></td>
<!--<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA1_convertedmarks;?></font></td>-->
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo $FA1_Grade;?></font></td>
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo $FA2_MarksObtained;?></font></td>
<!--<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA2_convertedmarks;?></font></td>-->
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo $FA2_Grade;?></font></td>
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt">
<?php 
if($Subject=="Information Technologies (IT)")
{
	echo number_format($SA1_MarksObtained,1);
}
else
{
	echo number_format($SA1_MarksObtained/3,1);
}
?>
</font></td>
<!--<td><font face="Cambria" style="font-size: 11pt"><?php echo $SA1_convertedmarks;?></font></td>-->
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo $SA1_Grade;?></font></td>
<td style="width: 20px" class="style2"><font face="Cambria" style="font-size: 11pt"><?php echo number_format(($FA1_MarksObtained+$FA2_MarksObtained+$SA1_MarksObtained/3),1); ?></font></td>
<!--<td><font face="Cambria" style="font-size: 11pt"><?php echo number_format(($FA1_MarksObtained+$FA2_MarksObtained+$SA1_MarksObtained/3),1); ?>s</font></td>-->
	<td style="width: 20px" class="style2">
		<font face="Cambria" style="font-size: 11pt">
		<?php 
		
		//*********************
				
				$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='50' and ".$Term1ObtainedMarks.">=`RangeFrom` and ".$Term1ObtainedMarks."<=`RangeTo`");
				while($rowTerm1Grade = mysql_fetch_array($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
  					break;
  				}
  				
  				
  			//*************  			
	
  				
  				
  				echo $Term1Grade;			
		?>
		</font></td>
<!--	
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA3_MarksObtained;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA3_convertedmarks;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA3_Grade;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA4_MarksObtained;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA4_convertedmarks;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $FA4_Grade;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $SA2_MarksObtained;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $SA2_convertedmarks;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo $SA2_Grade;?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo ($FA3_MarksObtained+$FA4_MarksObtained+$SA2_MarksObtained); ?></font></td>
<td><font face="Cambria" style="font-size: 11pt"><?php echo ($FA3_MarksObtained+$FA4_MarksObtained+$SA2_MarksObtained); ?></font></td>
<td>
		<font face="Cambria" style="font-size: 11pt">
		<?php 
			$Term2TotalObtainedPercent= 2*($FA3_convertedmarks+$FA4_convertedmarks+$SA2_convertedmarks);
			$rsTerm2Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term2TotalObtainedPercent.">=`RangeFrom` and ".$Term2TotalObtainedPercent."<=`RangeTo`");
			while($rowTerm2Grade = mysql_fetch_array($rsTerm2Grade))
  				{
  					$Term2Grade=$rowTerm2Grade[0];
  					break;
  				}
  				echo $Term2Grade;			
		?>
</font>
</td>
-->
	<?php 
	} //End of for loop for all subject completed
	

	?>
</tr>
<?php
}//end of while loop for Student detail
?>
</table>
</body>

</html>
