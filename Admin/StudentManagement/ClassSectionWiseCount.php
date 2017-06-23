<?php
//session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
//$ssql="select DISTINCT if(LOCATE('PREP',`sclass`)>=1,REPLACE(`sclass`,'PREP',''),if(LOCATE('NURSERY',`sclass`)>=1,REPLACE(`sclass`,'NURSERY',''),IF( LENGTH(`sclass` ) =2, SUBSTR(`sclass` , 2, 1 ) , IF( LENGTH(`sclass` ) =3, SUBSTR(`sclass` , 3, 1 ) , IF(LENGTH(`sclass`) >3,SUBSTR(`sclass` , 3, LENGTH(`sclass`)),`sclass`) ) ) )) as `sectionname` from `student_master`";
$ssql="SELECT DISTINCT SUBSTR(`class`,LENGTH(`class`),1) as `sectionname` FROM `class_master`";
$rsSection=mysql_query($ssql);
		if(mysql_num_rows($rsSection)>0)
		{
			$cnt=1;
			while($row = mysql_fetch_array($rsSection))
			  {
			  	$arrSection[$cnt]=$row[0];
			  	$cnt=$cnt+1;
			  }
			  
		}
		$SectionCount=$cnt-1;

$rsMasterClass=mysql_query("select distinct `MasterClass` from `class_master` order by length(`MasterClass`)");
//$rsMasterClass=mysql_query("select distinct `MasterClass` from `class_master` order by `MasterClass`");		
		
		/*
		for($i=1;$i <= count($arrSubject);$i++)
		{
			$Section = $arrSubject[$i];
		}
		*/
		
?>
<html xmlns="http://www.w3.org/1999/xhtml">



<script language="javascript">
function printDiv() 
{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 }
</script>


<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Class</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	text-align: center;
}
</style>

</head>

<body>

<p>

<font face="Cambria" size="3"><br><br><b>Section wise Student Strength</b></font>
<hr>
<div id="MasterDiv">
<p align="center"><img src="../images/logo.png" height="90" width="310"><br><?php echo $SchoolAddress; ?><br><br>
<font face="Cambria"><b>Class - Section wise Student Strength</b><br></font><br></p>

</p>
<table class="CSSTableGenerator">
	<tr>
		<td class="style2"><strong>Class</strong></td>
		<?php
		for($i=1;$i <= count($arrSection);$i++)
		{
			$Section = $arrSection[$i];
		?>
		<td class="style2"><strong><?php echo $Section;?></strong></td>
		<?php
		}
		?>
	</tr>
	
	<?php
	$TotalStrength=0;
	while($row=mysql_fetch_row($rsMasterClass))
	{
		$MasterClass=$row[0];
	?>
		<tr>
			<td class="style2"><strong><?php echo $MasterClass;?></strong></td>
			<?php
			for($i=1;$i <= count($arrSection);$i++)
			{
				$Section = $arrSection[$i];
				$ClassName=$MasterClass.$Section;
				$SectionWiseCount="";
				$rsCount=mysql_query("select count(*) as `cnt` from `student_master` where `sclass`='$ClassName' order by sclass");
				while($row1=mysql_fetch_row($rsCount))
				{
					if($row1[0]==0)
					{
					$SectionWiseCount="";
					}
					else
					{
					$SectionWiseCount=$row1[0];
					}
					$TotalStrength=$TotalStrength+$SectionWiseCount;
				}
			?>
			<td><b><?php echo $SectionWiseCount;?></b></td>
			<?php
			}
			?>
		</tr>
	<?php
	}
	?>
	</table>
	
	<p>&nbsp;</p>
<p align="Left"><u><font face="Cambria" style="font-size: 12pt"><b>School Strength Summary</b></font></u></p>
<p align="Left">&nbsp;</p>
	
	<table width="304" style="border-collapse: collapse" border="1">
	
	<tr>
	
	

			<td width="237"><font face="Cambria"><b>Total School Strength</b></b></font></td>
	
	

			<td width="60" class="style1"><?php echo $TotalStrength;?></td>
	</tr>
	<tr>
			<td width="237"><font face="Cambria"><b>New Admission for Session</b></font></td>
			<td width="60">&nbsp;</td>
	</tr>
	<tr>
			<td width="237"> <font face="Cambria"><b>New Strength</b></font></td>
			<td width="60"> &nbsp;</td>
	</tr>
	<tr>
			<td width="237"><font face="Cambria"><b>Student Expected To Leave</b></font></td>
			<td width="60">&nbsp;</td>
	</tr>
	<tr>
			<td width="237"><font face="Cambria"><b>Final Strength</b></font></td>
			<td width="60">&nbsp;</td>
	</tr>		


	</tr>
	
	
</table>


</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span ><br><br></b>PRINT</span></a>

	</font>

	</div>




</body>
<?php include "footer.php";?>

</html>