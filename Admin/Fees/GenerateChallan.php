<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
   //$sql = "SELECT distinct `MasterClass` FROM `class_master`";
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   $sql = "SELECT distinct `year`,`financialyear` FROM `fymaster`";
   $rsFy = mysql_query($sql, $Con);
   
?>  
<script language="javascript">
function fnlGenerate(cnt)
{
    
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	//alert(SelectedClass);
	var myWindow = window.open("DefineClasswiseFees.php?Class=" + SelectedClass ,"","width=100%,height=100%");
}

function fnlGenerateHostel(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	//alert(SelectedClass);
	//var myWindow = window.open("GenChallanHostelDPS.php?Class=" + SelectedClass ,"","width=100%,height=100%");
	var myWindow = window.open("DefineClasswiseHostelFees.php?Class=" + SelectedClass ,"","width=100%,height=100%");
}

function fnlPrint(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	//alert(SelectedClass);
	//var myWindow = window.open("DisplayClassWiseChallan.php?Class=" + SelectedClass ,"","width=100%,height=100%");
	var myWindow = window.open("FeesBill.php?Class=" + SelectedClass ,"","width=100%,height=100%");
}

function fnlPrintHostel(cnt)
{
	var ctrlClass="txtClass" + cnt;
	var SelectedClass=document.getElementById(ctrlClass).value;
	//alert(SelectedClass);
	var myWindow = window.open("FeesBillHostel.php?Class=" + SelectedClass ,"","width=100%,height=100%");
}


</script> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Upload Student Attendance Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="../Admin/Academics/tcal.css" />
	<script type="text/javascript" src="../Admin/Academics/tcal.js"></script>
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
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria;
	}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.style6 {
	border-collapse: collapse;
	font-family: Cambria;
}
.auto-style21 {
	text-align: left;
}
.auto-style6 {
	color: #DAB9C1;
}
.auto-style22 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}
.auto-style23 {
	color: #000000;
}
.auto-style24 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
	text-decoration: underline;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style25 {
	text-align: right;
	font-family: Cambria;
	color: #000000;
}
.auto-style26 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	color: #000000;
}
.style7 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
}
.style8 {
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



					<strong><u>Generate Fees Challan</u></strong></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>

				

				</td>		

	</tr>

</table>

<table cellspacing="0" cellpadding="0" width="1327" class="CSSTableGenerator">	
	<form name="frmChallan" id="frmChallan" method="post" action="GenerateChallan.php">	
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes" >
	
	

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; ">
		<p style="text-align: left"><b>Financial Year :</b><span >&nbsp;&nbsp;

		

		<select size="1" name="cboFy" id="cboFy">
		<option value="Select One">Select One</option>
		<?php
		while($row = mysql_fetch_assoc($rsFy))
   				{
   					$FinancialYearName=$row['financialyear'];
   					$FinancialYearValue=$row['year'];
   		?>
   					
		<option value="<?php echo $FinancialYearValue;?>"><?php echo $FinancialYearName;?></option>
		<?php
		}
		?>
		</select>
		</span></td>

	</tr>

	

			
			

			
			<tr>

				<td style="width: 265px; height: 24px; text-align:center; border-left-style:solid; border-left-width:1px; border-top-style:solid; border-top-width:1px" class="style7" bgcolor="#95C23D"><strong>Class</strong></td>

				<td style="width: 265px; height: 24px; text-align:center; border-top-style:solid; border-top-width:1px" class="style8" bgcolor="#95C23D">

				<strong>Define Fees</strong></td>

				<td style="width: 265px; height: 24px; text-align:center; border-top-style:solid; border-top-width:1px" class="style8" bgcolor="#95C23D">

				<strong>Print Regular Fees Bill</strong></td>

				<td style="width: 265px; height: 24px; text-align:center; border-top-style:solid; border-top-width:1px" class="style8" bgcolor="#95C23D">

				<strong>Define Hostel Fees</strong></td>

				<td style="width: 265px; height: 24px; text-align:center; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" class="style8" bgcolor="#95C23D">

				<strong>Print Hostel Fees Bill</strong></td>

			</tr>
			<?php
				$Cnt=0;
				while($row = mysql_fetch_assoc($result))
   				{
   					$Class=$row['class'];  
   					$Cnt = $Cnt+1;   					 					
			?>
			<tr>

				<td style="width: 265px; height: 48px; border-left-style:solid; border-left-width:1px; border-bottom-style:solid; border-bottom-width:1px" class="style7">

				<input name="txtClass<?php echo $Cnt;?>" id="txtClass<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Class; ?>" class="text-box" readonly ></td>
				<td style="width: 265px; height: 48px; border-bottom-style:solid; border-bottom-width:1px">
				<p align="center">
				<input name="Generate <?php echo $Cnt;?>" type="button" value="Define Student Fees" onclick="Javascript:fnlGenerate(<?php echo $Cnt;?>);"  style="font-weight: 700" class="text-box"></font></td>
				<td style="width: 265px; height: 48px; border-bottom-style:solid; border-bottom-width:1px">
				<p align="center">
				
				<input name="PrintChallan <?php echo $Cnt;?>" type="button" value="Print Regular Fees Bill" onclick="Javascript:fnlPrint(<?php echo $Cnt;?>);"  style="font-weight: 700" class="text-box"></td>
				<td style="width: 265px; height: 48px; border-bottom-style:solid; border-bottom-width:1px" class="style8">
				<input name="GenerateHostel<?php echo $Cnt;?>" type="button" value="Define Hostel Fees" onclick="Javascript:fnlGenerateHostel(<?php echo $Cnt;?>);"  style="font-weight: 700; width: 188px;" class="text-box">
				</td>
				<td style="width: 265px; height: 48px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" class="style8">
				<input name="PrintHostelChallan <?php echo $Cnt;?>" type="button" value="Print Hostel Fees Bill" onclick="Javascript:fnlPrintHostel(<?php echo $Cnt;?>);"  style="font-weight: 700" class="text-box">
				</td>
			</tr>
			<?php				
			}
			?>
			<br><br>
			<input type="hidden" name="totalClass" id="totalClass" value="<?php echo $Cnt; ?>">

			</table>

		</td>

	</tr>

	

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" style="font-size: 11pt">Powered by 
		Online School Planet</font></div>

</div>





</body>



</html>