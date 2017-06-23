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
		
		$ssqltmp="truncate table tmp_attendance";
		mysql_query($ssqltmp) or die(mysql_error());
		
		$success_count=0;
		$reject_count=0;

		for ($CurrentRow=1;$CurrentRow<=$TotalRows;$CurrentRow++)
		{
				$sname=$data->val($CurrentRow,2);
				$srollno=$data->val($CurrentRow,3);
				$sclass=$data->val($CurrentRow,4);
				$attendancedate=$data->val($CurrentRow,5);
				
				//echo $data->type($CurrentRow,5) . "<br>";
				
				//$oldDate = '2010-03-20'
				$arr = explode('/', $attendancedate);
				$attendancedate = $arr[2].'-'.$arr[0].'-'.$arr[1];
				//echo $attendancedate . "<br>";
		
				$attendance=$data->val($CurrentRow,6);
				
				$sql = "SELECT * FROM `attendance` where  `sname`='$sname' and `srollno`='$srollno' and `sclass`='$sclass' and `attendancedate`='$attendancedate'";
						$result = mysql_query($sql,$Con);
						
						if (mysql_num_rows($result)==0)
						{
							$ssql="INSERT INTO `attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) VALUES('$sname','$srollno','$sclass','$attendancedate','$attendance')";
							$success_count= $success_count + 1;
							mysql_query($ssql) or die(mysql_error());
						}
						
						else
						{
						$ssql="INSERT INTO `tmp_attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) VALUES('$sname','$srollno','$sclass','$attendancedate','$attendance')";
						$reject_count=$reject_count + 1;
							mysql_query($ssql) or die(mysql_error());
							
						//echo $ssql . "<br>";
						mysql_query($ssql) or die(mysql_error());
						
						}
						if ($CurrentRow>=5000)
						{
							exit();
						}
		}

	

	fclose($file_handle);

	mysql_query("delete from `update_track` where `Activity`='attendance'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('attendance')") or die(mysql_error());



	    	 echo "<br><center><b> File Uploaded Successfully!";



?> 
<?php
mysql_select_db("mobilise_school", $Con);
$ssql="SELECT `srno` , `sname`,`srollno`,`sclass` ,`attendancedate`,`attendance`,`datetime` FROM `tmp_attendance` order by `attendancedate`";
$rs= mysql_query($ssql);
?>

<table style="width: 100%" class="style1">

	<tr>
		<td class="style3" style="width: 43px"><strong>Sr.No.</strong></td>
		<td class="style3" style="width: 212px"><strong>Name</strong></td>
		<td class="style3" style="width: 212px"><strong>RollNo</strong></td>
		<td class="style3" style="width: 213px"><strong>Class</strong></td>
		<td class="style3" style="width: 213px"><strong>Attendance Date</strong></td>
		<td class="style3" style="width: 213px"><strong>Attendance</strong></td>
		<td class="style3" style="width: 213px"><strong>Upload Date and Time</strong></td>
	</tr>

	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sname=$row[1];
					$srollno=$row[2];
					$sclass=$row[3];
					$attendancedate=$row[4];
					$attendance=$row[5];
					$datetime=$row[6];
	?>

	<tr>
		<td class="style2" style="width: 43px"><?php echo $srno;?></td>
		<td class="style2" style="width: 212px"><?php echo $sname;?></td>
		<td class="style2" style="width: 212px"><?php echo $srollno;?></td>
		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 212px"><?php echo $attendancedate;?></td>
		<td class="style2" style="width: 213px"><?php echo $attendance;?></td>
		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>
	</tr>
<?php

	}

	?>

</table>

