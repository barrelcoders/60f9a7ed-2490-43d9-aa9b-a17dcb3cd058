<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$MasterClass=$_REQUEST["MasterClass"];
$rsFy=mysql_query("select * from ");
$ssql="select distinct x.`feeshead` from (SELECT distinct `feeshead`,(select `order` from `fees_head_order` where `feeshead`=a.`feeshead`) as `order` FROM `fees_student` as `a` where `feeshead` not in ('TOTAL RECEIVED')) as `x` order by `order`";
$rsFeeHead=mysql_query($ssql);
$cnt=0;
	while($row = mysql_fetch_array($rsFeeHead))
   	{
   		$cnt=$cnt+1;
  		$arrFeeHead[$cnt]=$row[0];	
    } 
  $TotalFeeHead=$cnt;
 
if($MasterClass == "All")
{
	$ssql="select distinct distinct `MasterClass` from `class_master`";
}
else
{
	$ssql="select distinct distinct `MasterClass` from `class_master` where `MasterClass`='$MasterClass'";
} 
$rsClass=mysql_query($ssql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Sr</title>
<style type="text/css">

.style1 {
	font-family: Cambria;
}

.style3 {
	text-align: right;
	font-family: Cambria;
}

.style4 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}

</style>
</head>

<body>
<div id="MasterDiv">

<p>&nbsp;</p>
<p align="center"><img src="../images/logo.png" height="100" width="400"><br><b><font face="cambria" size="2"><?php echo $SchoolAddress; ?></font></b><br><br></p>

<hr>

<br>
<table style="width: 100%;" class="style4">
	<tr>
		<th style="border-style: solid; border-width: 1px; width: 44px;"><font face="Cambria">Sr.No.</font></th>
		<th style="border-style: solid; border-width: 1px; width: 390px;"><font face="Cambria">Class</font></th>
		<th style="border-style: solid; border-width: 1px; width: 391px;">
		<font face="Cambria">Strength</font></th>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName=$arrFeeHead[$i];
		?>
		<th style="border-style: solid; border-width: 1px; width: 391px;"><font face="Cambria"><?php echo $FeeHeadName;?></font></th>
		<?php
		}
		?>
		
		
	</tr>
	<?php
	for($i=1;$i <= count($arrFeeHead);$i++)
	{
			$arrTotal[$i]=0;
	}
	$Q3TotalAmount=0;
	$Q4TotalProjectedAmt=0;
	$Q3TotalLateFee=0;
	$Q3TotalChequeBounceAmt=0;
	$Q4PaidAmount=0;
	
	$srno=1;
	$StudentStrength=0;
	$StudentStrengthTotal=0;
	while($rowSt=mysql_fetch_row($rsClass))
	{
		$MasterClass=$rowSt[0];
		$rsStrength=mysql_query("select count(*) from `student_master` where `sclass` in (select `class` from `class_master` where `MasterClass`='$MasterClass')");
		$rowStrength=mysql_fetch_row($rsStrength);
		$StudentStrength=$rowStrength[0];
		$StudentStrengthTotal=$StudentStrengthTotal+$StudentStrength;
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 44px;" >
		<font face="Cambria"><?php echo $srno;?>.</font></td>
		<td style="border-style: solid; border-width: 1px; width: 390px;" >
		<font face="Cambria"><?php echo $MasterClass;?></font></td>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php echo $StudentStrength;?></font></td>
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
			$FeeHeadName1=$arrFeeHead[$i];
			$FeeHeadValue="";
			$rsFeeHeadValue=mysql_query("select sum(`amount`) from `fees_student` where `class` in (select distinct `class` from `class_master` where `MasterClass`='$MasterClass') and `feeshead`='$FeeHeadName1'");
			while($rowF=mysql_fetch_row($rsFeeHeadValue))
			{
				$FeeHeadValue=$rowF[0];
				$arrTotal[$i]=$arrTotal[$i]+$FeeHeadValue;
				break;
			}
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" >
		<font face="Cambria"><?php echo $FeeHeadValue;?></font></td>
		<?php
		}
		?>
		</tr>
	<?php
	$Q4PaidAmount=0;
	$srno=$srno+1;
	}
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; " colspan="2" class="style3" >
		<strong>Total:</strong></td>
		
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php echo $StudentStrengthTotal;?>
		</td>
		
		<?php
		for($i=1;$i <= count($arrFeeHead);$i++)
		{
		?>
		<td style="border-style: solid; border-width: 1px; width: 391px;" class="style1" >
		<?php
		echo $arrTotal[$i];
		?></td>
		<?php
		}
		?>

	

	</tr>
	</table>
<br>
<br>

</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>


</body>

</html>