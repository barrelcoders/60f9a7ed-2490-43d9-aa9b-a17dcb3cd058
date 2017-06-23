<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>

<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");
if ($_REQUEST["isSubmit"]=="yes")
{
	$Dt=$_REQUEST["txtDate1"];
	$arr=explode('/',$Dt);
	$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate1=$arr[1]."-".$arr[0]."-".$arr[2];
	$Dt=$_REQUEST["txtDate2"];
	$arr=explode('/',$Dt);
	$EndDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$ShowDate2=$arr[1]."-".$arr[0]."-".$arr[2];	

	//$ssql="SELECT `sclass`,`srollno`,`sname`,`noticetitle`,`notice` FROM `student_notice` WHERE `NoticeDate`='$currentdate1' and `sclass` !='Test'";
	$ssql="SELECT `sclass`,`srollno`,`sname`,`noticetitle`,`notice`,`NoticeDate` FROM `student_notice` WHERE `NoticeDate`>='$StartDt' and `NoticeDate`<='$EndDt' and `sclass` !='Test' order by `NoticeDate` desc";
	$rs= mysql_query($ssql);
}

?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("txtDate1").value =="")
	{
		alert ("Please select date!");
		return;
	}
	document.getElementById("frmReport").submit();
}
</script>
<!-- link calendar resources -->

	<head>
	<meta http-equiv="Content-Language" content="en-us">

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>
	<style type="text/css">
.style1 {
	border-color: #FFFFFF;
	border-width: 0px;
	border-collapse: collapse;
	}
.style4 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style5 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
</style>
</head>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Notice Report ('.$ShowDate1.' to '.$ShowDate2.')</font></b></td>';
	$strTable=$strTable.'</tr>';
?>

<?php
	if (mysql_num_rows($rs) > 0)
	{
			$RowCnt=1;
		while($row = mysql_fetch_row($rs))
		{
			$Class=$row[0];
			$RollNo=$row[1];		
			$Name=$row[2];		
			$NoticeTitle=$row[3];		
			$Notice=$row[4];
			$NoticeDate=$row[5];
			$arr=explode('-',$NoticeDate);
			$NoticeDate = $arr[2] . "-" . $arr[1] . "-" . $arr[0];			
?>
<?php
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4" height="20" bgcolor="#3366CC"><b><font face="Calibri" color="#FFFFFF">Notice: '.$RowCnt.'</font></b></td>';
	$strTable=$strTable.'</tr>';
			
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Date:</font></b><font face="Calibri">'.$NoticeDate.'</font></td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Class:</font></b>'.$Class.'</td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">RollNo:</font></b>'.$RollNo.'</td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Name:</font></b>'.$Name.'</td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4"><b><font face="Calibri">Noitce Title:</font></b>'.$NoticeTitle.'</td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="4" align="left"><b><font face="Calibri">Notice:</font></b></td>';
	$strTable=$strTable.'</tr>';
	
	
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="left" colspan="4">'.$Notice.'</td>';
	$strTable=$strTable.'</tr>';

?>
<?php
	$RowCnt=$RowCnt+1;
		}
	}
?>



<?php
	$strTable=$strTable.'</table>';
	echo $strTable;
	exit();
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: communication@emeraldsis.com' . "\r\n";
	//$strMailBody=$_REQUEST["htmlcode"];
	//$to = $EmailID;
	//$to = "inderprakash@gmail.com";
	$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
	$subject="Daily Attandance Report(".$currentdate1.")";
	mail($to,$subject,$strTable,$headers);
}	
?>
<p>&nbsp;</p>
<p><u><b><font face="Cambria">Daily Notice Sent Report</font></b></u></p>
<table style="width: 100%" class="style1">
<form name="frmReport" id="frmReport" method="post" action="DailyNoticeReport.php">
<font face="Cambria">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	</font>
	<tr>
		<td class="style4" style="width: 265px">Start Date:</td>
		<td class="style2" style="width: 265px"><font face="Cambria"><input name="txtDate1" id="txtDate1" class="tcal" style="width: 108px" type="text"></font></td>
		<td class="style4" style="width: 266px">
		End Date:</td>
		<td class="style2" style="width: 266px"><font face="Cambria"><input name="txtDate2" id="txtDate2" class="tcal" style="width: 108px" type="text"></font></td>
	</tr>	
	<tr>
		<td class="style5" colspan="4">
		<font face="Cambria">
		<input name="btnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700"></font></td>
	</tr>	
</form>
</table>


