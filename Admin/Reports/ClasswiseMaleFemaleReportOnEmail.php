<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php

$currentdate=date("d-m-Y");

$currentdate1=date("Y-m-d");



$ssql="SELECT distinct `sclass`,(select count(*) FROM `student_master` WHERE `sclass` !='Test' and `sclass`=a.`sclass` and `Sex`='M') as `Count_Male`,(select count(*) FROM `student_master` WHERE `sclass` !='Test' and `sclass`=a.`sclass` and `Sex`='F') as `Count_Female` FROM `student_master` as `a` WHERE `sclass` !='Test' order by `sclass`";

$rs= mysql_query($ssql);







?>

<?php

$strTable='<table width="100%" border="1" style="border-collapse: collapse">';

$strTable=$strTable.'<tr>';

$strTable=$strTable.'<td colspan="5" align="center"><b><font face="Calibri">Class wise Male/Female Report ('.$currentdate.')</font></b></td>';

$strTable=$strTable.'</tr>';

$strTable=$strTable.'<tr>';

$strTable=$strTable.'<td align="center" bgcolor="#95E4FF">SrNo</td>';

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

		$Class=$row[0];

		$MaleCount=$row[1];		

		$FemaleCount=$row[2];

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

$strTable=$strTable.'<td bgcolor="#95E4FF" colspan="2" align="right"><b>Total</b></td>';

$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$MaleTotal.'</td>';

$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$FemaleTotal.'</td>';

$strTable=$strTable.'<td align="center" bgcolor="#95E4FF"><b>'.$GrandTotal.'</td>';

$strTable=$strTable.'</tr>';



$strTable=$strTable.'</table>';

//echo $strTable;
//exit();

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers

$headers .= 'From: communication@emeraldsis.com' . "\r\n";

//$strMailBody=$_REQUEST["htmlcode"];

//$to = $EmailID;

//$to = "inderprakash@gmail.com";

$to = "inderprakash@gmail.com,itismeashishs@gmail.com";

$subject="Class wise Male / Female student count(".$currentdate1.")";

mail($to,$subject,$strTable,$headers);

?>

