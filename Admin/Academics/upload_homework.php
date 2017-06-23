<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>



<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
//$data = new Spreadsheet_Excel_Reader("attendance.xls");

	

			$extension = end(explode(".", $_FILES["file"]["name"]));
		      //move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
		      
		      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
		      
		      
  		//After File Uploaded Successfully This will read File and upload DD Detail
	$file_handle = fopen("upload/" . $_FILES["file"]["name"], "r");
	$data = new Spreadsheet_Excel_Reader("upload/" . $_FILES["file"]["name"]);
	$Cnt=1;
	
	//echo $data->dump(true,true);
		
		$CurrentRow=1;
		$TotalRows=$data->rowcount($sheet_index=0);
		$TotalColumns=$data->colcount($sheet_index=0);	
	
		$ssqltmp="truncate table tmp_homework_master";		
		mysql_query($ssqltmp) or die(mysql_error());		
		$success_count=0;		
		$reject_count=0;
				
			for ($CurrentRow=1;$CurrentRow<=$TotalRows;$CurrentRow++)		
			{		
				$srno=$data->val($CurrentRow,1);
				$sclass=$data->val($CurrentRow,2);
				$subject=$data->val($CurrentRow,3);
				$homeworkworkdate=$data->val($CurrentRow,4);
				$arr = explode('/', $homeworkworkdate);
				$homeworkworkdate= $arr[2].'-'.$arr[0].'-'.$arr[1];
				$homework=$data->val($CurrentRow,5);
				
				//print $line_of_text[0] . "<BR>";
				$sql = "SELECT * FROM `homework_master` where  `sclass`='$sclass' and `subject`='$subject' and `homeworkdate`='$homeworkworkdate'";
				$result = mysql_query($sql,$Con);
				if (mysql_num_rows($result)==0)				
				{					
					if ($srno!="")
					{
						$sql1 = "SELECT * FROM `subject_master` where  `class`='$sclass' and `subject`='$subject'";
						$rslt = mysql_query($sql1,$Con);						
						if (mysql_num_rows($rslt) > 0)
						{							
							$ssql="INSERT INTO `homework_master` (`sclass`,`subject`,`homeworkdate`,`homework`) VALUES('$sclass','$subject','$homeworkworkdate','$homework')";							$success_count= $success_count + 1;
							mysql_query($ssql) or die(mysql_error());
						}
						else
						{
							$ssql="INSERT INTO `tmp_homework_master` (`sclass`,`subject`,`homeworkdate`,`homework`) VALUES('$sclass','$subject','$homeworkdate','$homework')";														$reject_count=$reject_count + 1;							mysql_query($ssql) or die(mysql_error());						
						}
					}
				}
			}

	fclose($file_handle);

	mysql_query("delete from `update_track` where `Activity`='homework'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('homework')") or die(mysql_error());
	    	 	    	 echo "<br><center><b>Your have uploaded $success_count items successfully <br> Rejected count is $reject_count";
?> 
<?php
$ssql="SELECT `srno` , `sclass` , `subject` ,`homeworkdate`,`homework`,`datetime` FROM `tmp_homework_master` order by `homeworkdate`";
$rs= mysql_query($ssql);
?>
<table style="width: 100%" class="style1">	<tr>		<td class="style3" style="width: 43px"><strong>Sr.No.</strong></td>		<td class="style3" style="width: 212px"><strong>Class</strong></td>		<td class="style3" style="width: 212px"><strong>Subject</strong></td>		<td class="style3" style="width: 213px"><strong>Home Work Date</strong></td>		<td class="style3" style="width: 213px"><strong>Home Work</strong></td>		<td class="style3" style="width: 213px"><strong>Date &amp; Time</strong></td>	</tr>	<?php		while($row = mysql_fetch_row($rs))				{					$srno=$row[0];					$sclass=$row[1];					$subject=$row[2];					$homeworkdate=$row[3];					$homework=$row[4];					$datetime=$row[5];	?>	<tr>		<td class="style2" style="width: 43px"><?php echo $srno;?></td>		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>		<td class="style2" style="width: 212px"><?php echo $subject;?></td>		<td class="style2" style="width: 213px"><?php echo $homeworkdate;?></td>		<td class="style2" style="width: 213px"><?php echo $homework;?></td>		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>	</tr>	<?php	}	?></table>