
<?php require '../../connection.php'; ?>


<?php

session_start();



$ssql="SELECT `SrNo`,`class`,`indicatortype`,`DescriptiveIndicator`,`status` FROM `reportcard_lifeskills` order by `SrNo`";

$ssql1="SELECT `srno`,`class`,`indicatortype`,`Grade`,`Description`,`status`,`entrydate` FROM `GradeDescriptionMapping` order by `srno`";

$rs= mysql_query($ssql);
$rs1= mysql_query($ssql1);

$num_rows=0;

?>
<script language="javascript">

function ShowEdit(SrNo)
{	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditLifeSkillIndicator.php?srno=" + SrNo ,"","width=300,height=400");
}

</script>


<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Life Skills Indicators</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	


</style>

</head>



<body>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style25">
	<tr>
		<td   bordercolor="#FFFFFF" bordercolordark="#FFFFFF" bordercolorlight="#FFFFFF" class="auto-style24">

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_11" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td >
		
		
		<span ><b><span style="font-size: 13pt">Life Skills Indicators and Grade 
		Description Management</span></b><hr  style="height: -15px">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>


	
	
	
		</td>
		
</table>


	
<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">

		<tr>

		<td>

		<table width="1237" bordercolor="#000000" id="table3" class="style2" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse">			
		<tr>				
		
		<td height="35"  align="center" style="width: 205px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		<td height="35"  align="center" style="width: 206px">				
		<b>Class</b></td>				
		<td height="35"  align="center" style="width: 206px">				
		<b>Indicator Type</b></td>				
		<td height="35"  align="center" style="width: 206px">				
		<b>Indicator Description</b></td>
		<td height="35"  align="center" style="width: 206px">				
		<b>Status</b></td>				
				
		<td height="35"  align="center" style="width: 206px">				
		<b>Entry Date</b></td>		

			
				
		<td height="35"  align="center" style="width: 206px">				
		<b>Edit</b></td>		

			
				
				<p align="center">			
				
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Edit</span><b>
				</b>

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$indicatortype=$row[1];					
					$DescriptiveIndicator=$row[2];
					$status=$row[3];
					$entrydate_name=$row[4];					
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="35" align="center" style="width: 205px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $srno; ?></span>				</td>				
				
				<td height="35" align="center" style="width: 206px">				<?php echo $class; ?></td>		
				
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $indicatortype; ?></span>				</td>		
				
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $DescriptiveIndicator; ?></span>				</td>			
				
				
				
				
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $status; ?></span>				</td>
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $entrydate; ?></span>				</td>
			
				<td height="35" align="center" style="width: 206px">
				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" >Edit</a></td>

			</tr>

			<?php

			}

			?>

			</table>

		</td>

		

	</tr>

</table>
<!--

<br>
<br>
<br>



<p align="Left"><b> Grade Description </b><br>

</p>



<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">

		<tr>

		<td>

		<table width="1237" bordercolor="#000000" id="table3" class="style2" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse">			
		<tr>				
		
		<td height="35"  align="center" style="width: 205px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		<td height="35"  align="center" style="width: 206px">				
		<b>Class</b></td>	
		
		<td height="35"  align="center" style="width: 206px">				
		<b>Indicator Type</b></td>	
		
		<td height="35"  align="center" style="width: 206px">				
		<b>Grade</b></td>
		<td height="35"  align="center" style="width: 206px">				
		<b>Grade Description</b></td>
		<td height="35"  align="center" style="width: 206px">				
		<b>Status</b></td>				
				
		<td height="35"  align="center" style="width: 206px">				
		<b>Entry Date</b></td>		

			
				
		<td height="35"  align="center" style="width: 206px">				
		<b>Edit</b></td>		

	
				
				<p align="center">			
				
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Edit</span><b>
				</b>

			</tr>

			<?php

				while($row = mysql_fetch_row($rs1))
				{

					$srno=$row[0];					
					$class=$row[1];					
					$indicatortype=$row[2];					
					$Grade=$row[3];
					$Description=$row[4]
					$status=$row[5];
					$entrydate_name=$row[6];					
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="35" align="center" style="width: 205px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $srno; ?></span>				</td>				
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $class; ?></span>				</td>
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $indicatortype; ?></span>				</td>		
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $Grade; ?></span>				</td>
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $Description; ?></span>				</td>			
				
				
				
			<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $status; ?></span>				</td>
				
				<td height="35" align="center" style="width: 206px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $entrydate; ?></span>				</td>
			
				<td height="35" align="center" style="width: 206px">
				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" >Edit</a></td>

			</tr>

			<?php

			}

			?>

			</table>

-->

</body>

</html>

</body>



</html>