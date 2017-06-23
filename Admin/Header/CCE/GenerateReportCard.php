<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
   //$sql = "SELECT distinct `MasterClass` FROM `class_master`";
   $sql = "SELECT distinct `sclass` FROM `reportcard_interim`";
   $result = mysql_query($sql, $Con);
   //$result1 = mysql_query("SELECT distinct x.`sclass` FROM (select distinct `sclass` from `report_card` union select distinct `sclass` from `reportcard_interim`) as `x`", $Con);
   
   $result1 = mysql_query("select distinct `sclass` from `report_card`", $Con);
   
   $sql = "SELECT distinct `year`,`financialyear` FROM `FYmaster`";
   $rsFy = mysql_query($sql, $Con);
   
?>  
<script language="javascript">
function fnlGenerate(cnt,MasterClass)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	var SelectedExamType=document.getElementById("cboExamType"+cnt).value;
	//alert(MasterClass);
	
	if(MasterClass==1 || MasterClass==2)
	{
		var myWindow = window.open("FinalReportCard1&2.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType ,"","width=100%,height=100%");
	}
	if(MasterClass==3 || MasterClass==4 || MasterClass==5)
	{
		var myWindow = window.open("FinalReportCard3tTo5.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType ,"","width=100%,height=100%");
	}
	if(MasterClass==6 || MasterClass==7 || MasterClass==8 || MasterClass==9 || MasterClass==10)
	{
		var myWindow = window.open("FinalReportcardTerm1Class6toClass10.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType ,"","width=100%,height=100%");
	}
	if(MasterClass=="NURSERY" || MasterClass=="K.G.")
	{
		var myWindow = window.open("FinalReportCardNur&KG.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType ,"","width=100%,height=100%");
	}
	

	
}
function fnlPrint(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	var SelectedExamType=document.getElementById("cboExamType"+cnt).value;
	//alert(SelectedClass);
	var myWindow = window.open("FinalReportcardClass1and2.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType,"","width=100%,height=100%");
}


function fnlGenerate1(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	var SelectedExamType=document.getElementById("cboExamType"+cnt).value;
	//alert(SelectedClass);
	var myWindow = window.open("FinalReportCardClass11and12.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType ,"","width=100%,height=100%");
}
function fnlPrint1(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	var SelectedExamType=document.getElementById("cboExamType"+cnt).value;
	//alert(SelectedClass);
	var myWindow = window.open("FinalReportCardClass11and12.php?Class=" + SelectedClass + "&ExamType=" + SelectedExamType,"","width=100%,height=100%");
}

</script> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generate Report Card</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="../../tcal.css" />
	<script type="text/javascript" src="../../tcal.js"></script>
<style type="text/css">
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
        font-family: Calibri;
        font-weight:bold;
}

.style1 {
	text-align: center;
}

</style>

</head>



<body>



<p>&nbsp;</p>



<table style="width: 100%" class="style1">

	<tr>

		<td class="style4" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



				<div class="auto-style21">



					<font face="Cambria">



					<u>



					<strong>Generate Classwise Report Card</strong></u></font></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>

				

				</td>		

	</tr>

</table>

<table cellspacing="0" cellpadding="0" width="100%">	
	<form name="frmChallan" id="frmChallan" method="post" action="GenerateChallan.php">	
	<font face="Cambria">	
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes" class="auto-style23">
	
	

	</font>
	
	

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; ">
		<p style="text-align: left">&nbsp;</td>

	</tr>

	

	<tr>

		<td class="style3" style="border-bottom-style: none; border-bottom-width: medium">

		<table width="100%" cellpadding="0" class="style6" height="80" style="border-collapse: collapse" border="1">

			
			<tr>

				<td style="width: 441px; height: 21px" class="style7">&nbsp;</td>

				<td style="width: 442px; height: 21px" class="style8">

				&nbsp;</td>

				<td style="width: 442px; height: 21px" class="style8">

				&nbsp;</td>

				<td style="width: 442px; height: 21px" class="style8">

				&nbsp;</td>

			</tr>

			
			<tr>

				<td style="width: 441px; height: 24px; border-bottom-style:solid; border-bottom-width:1px" class="style7" bgcolor="#95C23D" align="center">
				<font face="Cambria"><strong>Class</strong></font></td>

				<td style="width: 442px; height: 24px; border-bottom-style:solid; border-bottom-width:1px" class="style8" bgcolor="#95C23D" align="center">

				<font face="Cambria"><strong>Exam Type</strong></font></td>

				<td style="width: 442px; height: 24px; border-bottom-style:solid; border-bottom-width:1px" class="style8" bgcolor="#95C23D" align="center">

				<font face="Cambria">

				<strong>Generate Report Card</strong></font></td>

				<td style="width: 442px; height: 24px; border-bottom-style:solid; border-bottom-width:1px" class="style8" bgcolor="#95C23D" align="center">

				<font face="Cambria">

				<strong>Print Report Card</strong></font></td>

			</tr>
			<?php
				$Cnt=0;
				while($row = mysql_fetch_assoc($result))
   				{
   					$Class=$row['sclass'];  
   					$rsMasterClass=mysql_query("select `MasterClass` from `class_master` where `class`='$Class'");
   					$MasterClass="";
   					while($rowMC = mysql_fetch_assoc($rsMasterClass))
   					{
   						$MasterClass=$rowMC['MasterClass'];
   						break;
   					}
   					$Cnt = $Cnt+1;
   					
   					$rsExamType=mysql_query("select distinct `TestType` from `reportcard_interim`");   					 					
   					
			?>
			<tr>

				<td style="border-style:solid; border-width:1px; width: 441px; height: 27px" class="style7">

				<p align="center"><font face="Cambria">

				<input name="txtClass<?php echo $Cnt;?>" id="txtClass<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Class; ?>" readonly class="auto-style23"></font></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px" class="style1">
				<select name="cboExamType<?php echo $Cnt;?>" id="cboExamType<?php echo $Cnt;?>">
				<option selected="" value="">Select One</option>
				<?php
				while($rowE = mysql_fetch_assoc($rsExamType))
   				{
   					$ExamType=$rowE['TestType'];
				?>
				<option value="<?php echo $ExamType;?>"><?php echo $ExamType;?></option>
				<?php
				}
				?>
				</select></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px">
				<p align="center">
				<font face="Cambria">
				<input name="Generate <?php echo $Cnt;?>" type="button" value="Generate Report Card" onclick="Javascript:fnlGenerate('<?php echo $Cnt;?>','<?php echo $MasterClass;?>');" class="auto-style23" style="font-weight: 700"></font></font></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px">
				
				<p align="center">
				
				<font face="Cambria">
				
				<input name="PrintReportCard <?php echo $Cnt;?>" type="button" value="Print Report Card" onclick="fnlGenerate('<?php echo $Cnt;?>','<?php echo $MasterClass;?>');" class="auto-style23" style="font-weight: 700"></font></font></td>
			</tr>
			<?php				
			}
			?>
			<?php
				while($row = mysql_fetch_assoc($result1))
   				{
   					$Class=$row['sclass'];  
   					$rsMasterClass=mysql_query("select `MasterClass` from `class_master` where `class`='$Class'");
   					$MasterClass="";
   					while($rowMC = mysql_fetch_assoc($rsMasterClass))
   					{
   						$MasterClass=$rowMC['MasterClass'];
   						break;
   					}
   					$Cnt = $Cnt+1;
   					$rsExamType=mysql_query("select distinct `testtype` from `report_card` where `sclass`='$Class'");   					 					
   					
			?>
			<tr>

				<td style="border-style:solid; border-width:1px; width: 441px; height: 27px" class="style7">

				<p align="center"><font face="Cambria">

				<input name="txtClass<?php echo $Cnt;?>" id="txtClass<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Class; ?>" readonly class="auto-style23"></font></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px" class="style1">
				<select name="cboExamType<?php echo $Cnt;?>" id="cboExamType<?php echo $Cnt;?>">
				<option selected="" value="">Select One</option>
				<?php
				while($rowE = mysql_fetch_assoc($rsExamType))
   				{
   					$ExamType=$rowE['testtype'];
				?>
				<option value="<?php echo $ExamType;?>"><?php echo $ExamType;?></option>
				<?php
				}
				?>
				</select></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px">
				<p align="center">
				<font face="Cambria">
				<input name="Generate <?php echo $Cnt;?>" type="button" value="Generate Report Card" onclick="Javascript:fnlGenerate('<?php echo $Cnt;?>','<?php echo $MasterClass;?>');" class="auto-style23" style="font-weight: 700"></font></font></td>
				<td style="border-style:solid; border-width:1px; width: 442px; height: 27px">
				
				<p align="center">
				
				<font face="Cambria">
				
				<input name="PrintReportCard <?php echo $Cnt;?>" type="button" value="Print Report Card" onclick="Javascript:fnlGenerate('<?php echo $Cnt;?>','<?php echo $MasterClass;?>');" class="auto-style23" style="font-weight: 700"></font></font></td>
			</tr>
			<?php				
			}
			?>
			<font face="Cambria">
			<br><br>
			<input type="hidden" name="totalClass" id="totalClass" value="<?php echo $Cnt; ?>">

			</font>

			</table>

		</td>

	</tr>

	

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>





</body>



</html>