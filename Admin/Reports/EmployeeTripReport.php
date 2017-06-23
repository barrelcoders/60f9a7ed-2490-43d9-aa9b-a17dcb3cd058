

<?php
session_start();
include '../../connection.php';
include '../../AppConf.php'; 
include '../Header/Header3.php';
?>


<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedConsent=$_REQUEST["cboConsent"];
	
	

	$ssql="SELECT `EmpId`, `EmpName`, `EmpType`, `EmpDesig`, `Consent`, `Reason` FROM `Employee_Trip` WHERE 1";

	
	if($SelectedConsent!="Select One")
	{
		$ssql=$ssql." and `Consent`='$SelectedConsent'";
	
	
   }
   

	

//echo $ssql;
//exit();
$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Employee Trip Consent Report</title>
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


.style2 {
	border-left: 1px solid #C0C0C0;
	text-align: right;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style3 {
	border-width: 1px;
}
.style4 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}


.style7 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
.style8 {
	border-collapse: collapse;
	border-left-style: solid;
	border-left-width: 0px;
	border-right-style: solid;
	border-right-width: 0px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 0px;
}
.style10 {
	border-left: 1px solid #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style11 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right: 1px solid #A0A0A0;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style13 {
	border-style: solid;
	border-width: 1px;
}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Employee Trip Consent Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="EmployeeTripReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Select Going/ Not Going.</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboConsent" id="cboConsent" style="float: left" class="text-box">
						<option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Consent` FROM `Employee_Trip`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select> </font> 
</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
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
<table width="100%" class="CSSTableGenerator" style="border-collapse: collapse" border="1">
	<tr>
		   <td colspan="5">
			<p style="text-align: center"><b>
			<font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>

			<font face="Cambria">Employee Trip Consent Report</font><br></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>


<tr>
<td height="22" align="center" class="style10" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Emp Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Employee  Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Consent</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Resson</font></b></td>
		
		
				
		
		
</tr>
<?php
$recno=1;
$TotalAmt=0;
	while($row=mysql_fetch_row($rs))
	{
	     $EmpId=$row[0];
	     $EmpName=$row[1];
	     $Consent=$row[4];
	     $Reason=$row[5];
	     
	     
?>
<tr>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $EmpId;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $EmpName;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $Consent;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $Reason;?></font></td>


</tr>
<?php
$recno=$recno+1;
	}
?>
</table></div>
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
