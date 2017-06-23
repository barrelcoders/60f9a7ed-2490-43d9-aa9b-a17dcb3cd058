<?php

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php include '../../AppConf.php';?>
<?php
$currentdate=date("d-m-Y");
$currentdate1=date("Y-m-d");


if($_REQUEST["isSubmit"]=="yes")
{
	$SchoolId=$_REQUEST["cboSchool"];
	
	$ssql="SELECT distinct `SchoolId`,`sclass`,(select count(*) FROM `student_master` WHERE `sclass` !='Test' and `sclass`=a.`sclass` and `Sex`='M') as `Count_Male`,(select count(*) FROM `student_master` WHERE `sclass` !='Test' and `sclass`=a.`sclass` and `Sex`='F') as `Count_Female` FROM `student_master` as `a` WHERE `sclass` !='Test'";
	if($SchoolId != "All")
	{
		$ssql=$ssql." and `SchoolId`='$SchoolId'";
	}
	$ssql=$ssql." order by `sclass`";
	
	$rs= mysql_query($ssql);
}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
?>
<script language="javascript">
function Validate()
{
document.getElementById("frmRegApp").submit();
}
</script>
<html>

<head>
<title>Classwise Male Female Reort </title>


<link rel="stylesheet" type="text/css" href="../css/style.css" />

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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Cambria;

        font-weight:bold;

}


.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style6 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style5 {
	border: 1px solid #000000;
}
.style7 {
	border: 1px solid #000000;
	text-align: center;
}


</style>
</head>

<body>


		<table style="width: 592px" class="style1">
		<form name="frmRegApp" id="frmRegApp" method="post" action="">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
			<tr>
				<td class="style6" style="width: 196px">School</td>
		<td class="style5" style="width: 197px">







				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="All">All</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>" <?php if($SchoolId==$row[0]) {?>selected="selected" <?php } ?> ><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select></td>
		<td class="style7" style="width: 197px">
		<input name="btnSubmit" type="button" class="text-box" value="submit" onclick="Javascript:Validate();"></td>
		</tr>
		</form>
	</table>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<?php
$strTable='<table class="CSSTableGenerator">';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td colspan="5" align="center"><b><font face="Cambria">Class wise Male/Female Report ('.$currentdate.')</font></b></td>';
$strTable=$strTable.'</tr>';
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">SrNo</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">School</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">Class</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">Male Count</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">Female Count</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">Total Count</td>';
$strTable=$strTable.'</tr>';
?>

<?php
if (mysql_num_rows($rs) > 0)
{
		$RowCnt=1;
		$MaleTotal=0;
		$FemaleTotal=0;
		$GrandTotal=0;
	while($row = mysql_fetch_row($rs))
	{
		$SchoolId=$row[0];
		$Class=$row[1];
		$MaleCount=$row[2];		
		$FemaleCount=$row[3];
		$TotalCount=$MaleCount+$FemaleCount;
		
		$MaleTotal=$MaleTotal+$MaleCount;
		$FemaleTotal=$FemaleTotal+$FemaleCount;
		$GrandTotal=$GrandTotal+$TotalCount;
		
		if (fmod($RowCnt,2)==0)
		{
			$bgcolor="#F3F3F3";
		}
		else
		{
			$bgcolor="#FFFFFF";
		}		
?>
<?php		
$strTable=$strTable.'<tr>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$RowCnt.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$SchoolId.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$Class.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$MaleCount.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$FemaleCount.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="'.$bgcolor.'">'.$TotalCount.'</td>';
$strTable=$strTable.'</tr>';
?>
<?php
	$RowCnt=$RowCnt+1;
	}
}
?>
<?php

$strTable=$strTable.'<tr>';
//$strTable=$strTable.'<td bgcolor="#95E4FF" colspan="1" align="right"><b></b></td>';
//$strTable=$strTable.'<td bgcolor="#95E4FF" colspan="1" align="right"><b></b></td>';
$strTable=$strTable.'<td bgcolor="#95E4FF" colspan="3" align="right"><b>Total</b></td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$MaleTotal.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$FemaleTotal.'</td>';
$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$GrandTotal.'</td>';
$strTable=$strTable.'</tr>';

$strTable=$strTable.'</table>';
echo $strTable;


exit();
?>
<?php
}
?>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>

</html>
<?php
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: communication@emeraldsis.com' . "\r\n";
//$strMailBody=$_REQUEST["htmlcode"];
//$to = $EmailID;
//$to = "inderprakash@gmail.com";
$to = "inderprakash@gmail.com,itismeashishs@gmail.com";
$subject="Class wise Male / Female student count(".$currentdate1.")";
//mail($to,$subject,$strTable,$headers);
?>