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
	$ShowDate=$arr[1]."-".$arr[0]."-".$arr[2];

	//$ssql="SELECT distinct `sclass`, (select count(*) from `attendance` WHERE `attendancedate`='$currentdate1' and `sclass`=a.`sclass` and `attendance`='P') Present_Count,(select count(*) from `attendance` WHERE `attendancedate`='$currentdate1' and `sclass`=a.`sclass` and `attendance`='A') Absent_Count FROM `attendance` as `a` WHERE `attendancedate`='$currentdate1' order by `sclass`";
	$ssql="SELECT distinct `sclass`, (select count(*) from `attendance` WHERE `attendancedate`='$StartDt' and `sclass`=a.`sclass` and `attendance`='P') Present_Count,
	(select count(*) from `attendance` WHERE `attendancedate`='$StartDt' and `sclass`=a.`sclass` and `attendance`='A') 
	Absent_Count FROM `attendance` as `a` WHERE `attendancedate`='$StartDt' order by `sclass`";
	$rs= mysql_query($ssql);
	
	//echo $ssql;
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

	<link rel="stylesheet" type="text/css" href="../tcal.css" />

	<script type="text/javascript" src="../tcal.js"></script>
<html>
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
</style>
	</head>

<body>

<table style="width: 100%" class="style1">
<form name="frmReport" id="frmReport" method="post" action="DailyAttandanceReport.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td class="style4" style="width: 265px">Start Date:</td>
		<td class="style2" style="width: 265px"><input name="txtDate1" id="txtDate1" class="tcal" style="width: 108px" type="text"></td>
		<td class="style4" style="width: 266px">
		<input name="btnSubmit" type="button" value="Submit" onclick="Validate();"></td>
		<td class="style2" style="width: 266px">&nbsp;</td>
	</tr>	
</form>
</table>

<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$strTable='<table width="100%" border="1" style="border-collapse: collapse">';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Attendance Report ('.$ShowDate.')</font></b></td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="center">SrNo</td>';
	$strTable=$strTable.'<td align="center">Class</td>';
	$strTable=$strTable.'<td align="center">Present Count</td>';
	$strTable=$strTable.'<td align="center">Absent Count</td>';
	$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
		$RowCnt=1;
		
	while($row = mysql_fetch_row($rs))
	{
		$Class=$row[0];
		$PresentCount=$row[1];		
		$AbsentCount=$row[2];		
?>
<html>

<?php		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
$strTable=$strTable.'<td align="center">'.$Class.'</td>';
$strTable=$strTable.'<td align="center">'.$PresentCount.'</td>';
$strTable=$strTable.'<td align="center">'.$AbsentCount.'</td>';
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
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>
</div>
</body>
</html>