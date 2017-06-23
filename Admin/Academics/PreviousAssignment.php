<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssql="select `subject`,`class`,`remark`,`assignmentdate`,`assignmentcompletiondate`,`assignmentURL` from  `assignment` where `class` in (select distinct `Class` from `teacher_class_mapping` where `EmpID`='$EmpId') order by `assignmentdate` desc";
$reslt = mysql_query($ssql , $Con);
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Previous Uploaded Assignment Report</title>
<style>

</style>
</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Uploaded Assignment Report</font></b></p>
<hr>
<p>&nbsp;</p>
<table class="CSSTableGenerator" style="width: 100%">
	
	<tr>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><strong>Subject</strong></td>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><strong>Class</strong></td>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><b>Topic</b></td>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><b>Sub 
		Topic</b></td>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><strong>Remarks</strong></td>
		<td   style="width: 199px; text-align:center" bgcolor="#95C23D">
		<strong>Start Date</strong></td>
		<td   style="width: 199px; text-align:center" bgcolor="#95C23D">
		<strong>Finish Date</strong></td>
		<td  style="width: 199px; text-align:center" bgcolor="#95C23D"><strong>Download Doc.</strong></td>		
	</tr>
	
	<?php
		while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$subject=$rowa['subject'];
	   		$class=$rowa['class'];
	   		$remark=$rowa['remark'];
	   		$assignmentdate=$rowa['assignmentdate'];
	   		$assignmentcompletiondate=$rowa['assignmentcompletiondate'];
	   		$assignmentURL=$rowa['assignmentURL'];   		
	?>
	<tr>
		<td class="style8" style="width: 199px"><?php echo $subject; ?></td>
		<td class="style8" style="width: 199px"><?php echo $class; ?></td>
		<td class="style8" style="width: 199px">&nbsp;</td>
		<td class="style8" style="width: 199px">&nbsp;</td>
		<td class="style8" style="width: 199px"><?php echo $remark; ?></td>
		<td  class="style8" style="width: 199px"><?php echo $assignmentdate; ?></td>
		<td  class="style8" style="width: 199px"><?php echo $assignmentcompletiondate; ?></td>
		<td class="style8" style="width: 199px">
		<p style="text-align: center">
		<a href="../../../../../../ASHISH~1/AppData/Local/Temp/scp28580/public_html/Admin/Academics/<?php echo $assignmentURL; ?>" target="_blank">
		Preview</a></td>		
	</tr>
	<?php
	}
	?>	
	
	</table>
	
</body>

</html>
