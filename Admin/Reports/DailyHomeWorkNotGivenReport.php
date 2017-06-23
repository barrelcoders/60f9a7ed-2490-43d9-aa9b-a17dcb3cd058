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
		
	//$ssql="select x.`class`,x.`subject`,x.`TodayHomeWork` from (SELECT distinct `class`,`subject`,(SELECT `homework` FROM `homework_master` WHERE `sclass`=a.`class` and `subject`=a.`subject` and `homeworkdate`='2014-11-25') as `TodayHomeWork` FROM `subject_master` as `a` WHERE status='1') as `x` where x.`TodayHomeWork`='' or x.`TodayHomeWork` is NULL order by x.`class`";
	$ssql="select x.`class`,x.`subject`,x.`TodayHomeWork` from (SELECT distinct `class`,`subject`,(SELECT `homework` FROM `homework_master` WHERE `sclass`=a.`class` and `subject`=a.`subject` and `homeworkdate`='$StartDt') as `TodayHomeWork` FROM `subject_master` as `a` WHERE status='1') as `x` where x.`TodayHomeWork`='' or x.`TodayHomeWork` is NULL order by x.`class`";
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
<html>
<!-- link calendar resources -->

	<head>
	<title>Daily Homework Not Given Report</title>

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>
	
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
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style4 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Daily Homework Not Given Report</font></b></p>
<hr>
<p>&nbsp;</p>

<table style="width: 100%" class="style1">
<form name="frmReport" id="frmReport" method="post" action="DailyHomeWorkNotGivenReport.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td class="style4" style="width: 105px">Start Date:</td>
		<td class="style2" style="width: 145px"><input name="txtDate1" id="txtDate1" class="tcal" style="width: 108px" type="text"></td>
		<td class="style4" style="width: 758px">
		<input name="btnSubmit" type="button" value="Submit" onclick="Validate();" class="text-box"></td>
		<td class="style2" style="width: 266px">&nbsp;</td>
	</tr>	
</form>
</table>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$strTable='<table class="CSSTableGenerator">';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td colspan="4" align="center"><b><font face="Calibri">Daily Homework Report ('.$ShowDate.')</font></b></td>';
	$strTable=$strTable.'</tr>';
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="center">SrNo</td>';
	$strTable=$strTable.'<td align="center">Class</td>';
	$strTable=$strTable.'<td align="center">Subject</td>';
	$strTable=$strTable.'<td align="center">Status</td>';
	$strTable=$strTable.'</tr>';
?>

	<?php
	if (mysql_num_rows($rs) > 0)
	{
			$RowCnt=1;
			
		while($row = mysql_fetch_row($rs))
		{
			$Class=$row[0];
			$Subject=$row[1];		
	?>
	<?php		
	$strTable=$strTable.'<tr>';
	$strTable=$strTable.'<td align="center">'.$RowCnt.'</td>';
	$strTable=$strTable.'<td align="center">'.$Class.'</td>';
	$strTable=$strTable.'<td align="center">'.$Subject.'</td>';
	$strTable=$strTable.'<td align="center">Not Given</td>';
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
	$subject="Daily Homework not given Report";
	mail($to,$subject,$strTable,$headers);
}	
?>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>