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
		for ($CurrentRow=1;$CurrentRow<=$TotalRows;$CurrentRow++)
		{
				$sclass=$data->val($CurrentRow,1);
				$subject=$data->val($CurrentRow,2);
				$syllabus=$data->val($CurrentRow,3);
				$month=$data->val($CurrentRow,4);
				$completion_status=$data->val($CurrentRow,5);
				
				
				//print $line_of_text[0] . "<BR>";
				$sql = "SELECT * FROM `course_curriculam` where  `sclass`='$sclass' and `subject`='$subject' and `month`='$month'";
				$result = mysql_query($sql,$Con);
				if (mysql_num_rows($result)==0)
				{
					$ssql="INSERT INTO `course_curriculam` (`sclass`,`subject`,`syllabus`,`month`,`completion_status`) VALUES('$sclass','$subject','$syllabus','$month','$completion_status')";
				}
				//echo $ssql . "<br>";
				if ($sclass!="" && $sclass!="sclass")
				{
					mysql_query($ssql) or die(mysql_error());
				}
		}
	fclose($file_handle);

	mysql_query("delete from `update_track` where `Activity`='coursecarriculam'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('coursecarriculam')") or die(mysql_error());

	    	 echo "<br><center><b> File Uploaded Successfully!";
?> 