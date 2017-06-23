<?php
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadmission=$_REQUEST["txtadmission"];
	$SelectedClass=$_REQUEST["cboClass"];
		$SelectedExam=$_REQUEST["cboExam"];
	
	$ssql="SELECT distinct `sadmission`,`sname`,`sclass`,`ExamName` from `fees_exam_student` where 1=1";
		
		if($Selectedadmission!="")
		{
			$ssql=$ssql." and `sadmission`='".$Selectedadmission."'";
		}
		
		if($SelectedClass!="Select One")
		{
			$ssql=$ssql." and `sclass`='$SelectedClass'";
		}
		
		if($SelectedExam!="Select One")
		{
			$ssql=$ssql." and `ExamName`='".$SelectedExam."'";
		}
		
	$rs= mysql_query($ssql);	
	
	//echo $ssql;
	//exit();
		
}
?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Fees Bank Deposit Report</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

}

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


</style>
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
</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Exam Fees Deposit Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="ExamFeeDepositReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Admission No:</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtadmission" id="txtadmission"type="text" class="text-box"> </font>
</td>
<td style="width: 278px"><font face="Cambria">Class :</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboClass" id="cboClass" style="float: left" ; required onchange="Javascript:GetSubHead();" class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `class` FROM `class_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						
						 <?php 
							}
							?>
			</select></font> </td>
<td style="width: 278px"><p align="left"><font face="Cambria">Exam Name:</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboExam" id="cboExam" style="float: left" ; required onchange="Javascript:GetSubHead();" class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `ExamName` FROM `fees_exam_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						

						 <?php 
							}
							?>
			</select></font></td>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">
&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=5>&nbsp;</td>

</tr>
<td colspan=6 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<font face="Cambria">
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
</font>
<div id="MasterDiv">
<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator">

     
<tr>
<td style="width: 50px" font="Cambria"><font face="Cambria">SRNO</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">ADMISSION NO</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">NAME</font></td>

<td style="width: 50px" font="Cambria">Date</td>

<td style="width: 50px" font="Cambria"><font face="Cambria">CLASS</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">EXAM NAME</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">Workbook</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">Exam Fee</font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria">Text Book</font></td>
</tr>
<?php
$recno=0;
while($row = mysql_fetch_row($rs))
	{
			$recno=$recno+1;
			$sadmission=$row[0];
			$sname=$row[1];
			$sclass=$row[2];
			$ExamName=$row[3];
			$rsWorkBook=mysql_query("SELECT `Amount`,`ReceiptDate` from `fees_exam_student` where `sadmission`='$sadmission' and `ExamName`='$ExamName' and `FeesType` IN ('Work Book','WorkBook')");
			$rsExamFee=mysql_query("SELECT `Amount`,`ReceiptDate` from `fees_exam_student` where `sadmission`='$sadmission' and `ExamName`='$ExamName' and `FeesType`='ExamFee'");
			$rsTextBook=mysql_query("SELECT `Amount`,`ReceiptDate` from `fees_exam_student` where `sadmission`='$sadmission' and `ExamName`='$ExamName' and `FeesType` IN ('Text Book','TextBook')");
			
			$rowWorkBook=mysql_fetch_row($rsWorkBook);
			$WorkBookFee=$rowWorkBook[0];
			$WorkBookFeeReceiptDate=$rowWorkBook[1];

			
			$rowExamFee=mysql_fetch_row($rsExamFee);
			$ExamFee=$rowExamFee[0];
			$ExamFeeReceiptDate=$rowExamFee[1];
			
			$rowTextBook=mysql_fetch_row($rsTextBook);
			$TextBook=$rowTextBook[0];
			$TextBookReceiptDate=$rowTextBook[1];
			
?>
<tr>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $sadmission;?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $sname;?></font></td>
<td style="width: 50px" font="Cambria"><?php echo $WorkBookFeeReceiptDate; ?></td>

<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $sclass;?></font></td>

<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $ExamName;?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $WorkBookFee;?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $ExamFee;?></font></td>
<td style="width: 50px" font="Cambria"><font face="Cambria"><?php echo $TextBook;?></font></td>
</tr>
<?php
}//End of While Loop
?>
</table>
<font face="Cambria">
<?php
}
?>
</font>
</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a>&nbsp;

	</font>

	</div>
<br>
<br>
<br>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>
</div>
</body>
</html>
