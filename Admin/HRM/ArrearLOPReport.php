<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
 

       $SelectedEmpId=$_REQUEST["txtEmpId"];
	
	$SelectedMOnth=$_REQUEST["cboMonth"];
	

	

	$ssql="SELECT `srno`, `EmpId`, `EmpName`, `Department`, `Designation`, `Month`, `Days`, `FinancialYear`, `Remarks` FROM `Employee_Salary_ArrearDay` WHERE 1";
	
		
	if($SelectedMOnth!="Select One")
	{
		$ssql=$ssql." and `Month`='$SelectedMOnth'  GROUP BY `EmpId`";
	
	
   }
   
	


	//echo $ssql;
	$rs=mysql_query($ssql);

}
?>


<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Loss Of Pay</title>

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

        font-family: Calibri;

        font-weight:bold;

.style1 {
	text-align: center;
}
.style2 {
	color: #000000;
}
.style3 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style5 {
	text-align: center;
	border: 1px solid #000000;
}
.style6 {
	text-decoration: none;
}
}
.style1 {
	text-align: center;
}
</style>
</head>

<body>







		<p>&nbsp;</p>







		<table style="border-width:0px; width: 100%; border-collapse:collapse" class="style14" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; height: 10px; background-color:#FFFFFF; border-bottom-style:none; border-bottom-width:medium">







				<strong><font face="Cambria">Employee&nbsp; Arrear LOP Report</font></strong><hr>
				
			<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="ArrearLOPReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Month</font></td>
<td style="width: 278px"><font face="Cambria">
&nbsp;</font><span style="font-size: 9pt"><font face="Cambria"><select name="cboMonth" id="cboMonth"  class="text-box">
		<option value="" selected="selected" >Select One</option>
		<?php
		$ssql="select distinct `Month` from `Employee_Punching_Detail`";
		$rsBank	= mysql_query($ssql);
		while($row = mysql_fetch_row($rsBank))
		{
			$Month=$row[0];
		?>						
		<option value="<?php echo $Month;?>"><?php echo $Month;?></option>
		<?php
		}
		?>
		</select></font></span></td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="left">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<tr>
<td style="width: 278px" height="29"><p align="center">&nbsp;</td>
<td style="width: 278px" height="29">&nbsp;</td>
<td style="width: 278px" height="29">&nbsp;</td>
<td style="width: 278px" height="29">&nbsp;</td>
<td style="width: 278px" height="29"><p align="center">&nbsp;</td>
<td style="width: 278px" height="29">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="center">
&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"></td>
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
	<table border="1"  cellspacing="0" cellpadding="0" class="CSSTableGenerator" style="border-collapse: collapse">
	<tr>
		<td colspan="6">
		<p align="center"><img src="../images/logo.png" height="68" width="191"></td>
	</tr>

					<tr>
						<td bgcolor="#95C23D" width="75" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">Sr No.</font></b></td>
						<td bgcolor="#95C23D" width="89" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">Employee Id.</font></b></td>
						<td bgcolor="#95C23D" width="137" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">Employee Name</font></b></td>
						<td bgcolor="#95C23D" width="97" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">Month</font></b></td>
						<td bgcolor="#95C23D" width="110" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">LOP Days</font></b></td>
						<td bgcolor="#95C23D" width="110" align="center" height="23" style="border-style: solid; border-width: 1px; text-align:center">
						<b><font face="Cambria">Remark</font></b></td>

					</tr>
				
				
				<?php
				$cnt=1;
				while($row=mysql_fetch_row($rs))
				{
				$EmpId=$row[1];
				$EmpName=$row[2];
				$Month=$row[5];
				$LOPDay=$row[6];
				$Remark=$row[8];
				
				
				?>			
					<tr>
						<td width="75" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $cnt;?></td>
						<td width="89" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $EmpId;?></td>
						<td width="137" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $EmpName;?></td>
						<td width="97" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $Month;?></td>
						<td width="110" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $LOPDay;?></td>
						<td width="110" align="center" height="23" style="border-style: solid; border-width: 1px">
						<?php echo $Remark;?></td>

					</tr>
				<?php
				$cnt=$cnt+1;

				}
				?>	
				</table>

				</td>





			</tr>

</table>

</div>
<br>
<br>
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


<font face="Cambria">
<?php
}
?>
</font>
<p align="center">&nbsp;<p align="center">&nbsp;<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>
