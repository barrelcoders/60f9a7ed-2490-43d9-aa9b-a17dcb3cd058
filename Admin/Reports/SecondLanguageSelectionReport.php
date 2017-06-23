<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if($_REQUEST["isSubmit"]=="yes")
{
		$OptionalSubject=$_REQUEST["OptionalSubject"];
	
	

	$ssql="SELECT `srno`, `sadmission`, `sname`, `sclass`, `sfathername`, `smothername`, `smobile`, `email`, `OptionalSubject`, `Address` FROM `StudentInfo_Class8` WHERE 1=1";

	//echo $ssql;
	//exit();
	
	if($OptionalSubject!="Select One")

	{

		$ssql=$ssql." and `OptionalSubject`='".$OptionalSubject."'";

	}
	
	
$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Second LanguageSelection Report</title>
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
	text-align: left;
}
.style3 {
	font-family: Cambria;
}


.style4 {
	text-align: right;
}
.style5 {
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


.style6 {
	text-align: right;
	border-top-style: solid;
	border-top-width: 1px;
	border-left-color: #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style10 {
	border-style: solid;
	border-width: 1px;
	text-align: right;
	}


.style12 {
	border-left: 1px solid #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style13 {
	border-style: solid;
	border-width: 1px;
}
.style14 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right: 1px solid #A0A0A0;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Second Language Selection Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="SecondLanguageSelectionReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p align="left">
<font face="Cambria">Optional Subject :</font></td>
<td style="width: 278px">	<font face="Cambria">
	 <select name="OptionalSubject" id="OptionalSubject" style="float: left" ; ">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `OptionalSubject` FROM `StudentInfo_Class8`";
							

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
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">	&nbsp;</td>
</tr>
<tr>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<tr>
<td style="width: 278px"><p class="style2">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
<td style="width: 278px"><p align="center">&nbsp;</td>
<td style="width: 278px">&nbsp;</td>
</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
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

<table width="94%" style="border-collapse: collapse;" border="0" class="CSSTableGenerator" cellspacing="0" cellpadding="0">
<tr>
		   <td class="style3" color="#FFFFFF" colspan="8" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #A0A0A0; border-right-width: 1px">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"></img></font><br>
			<?php echo $SchoolAddress; ?><font size="4"><img src="../images/logo.png" width=250 height="70"></font></span></b><p style="text-align: center">
			<span class="style4"><b>Second Language Selection Report</b></span><b></td>
		   

		   			   
   	</tr>

<tr>
<td height="22" align="center" class="style12" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Admission No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Father&#39;s Name</font></b></td>
		
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Mother&#39;s Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Mobile No</font></b></td>
		<td height="22" align="center" class="style14">
		<b><font face="Cambria">Optional Subject</font></b></td>
		

		
				
		
</tr>
<?php
$recno=1;
$DOB=0;

	while($row = mysql_fetch_row($rs))
	{
		
      
        $DOB1=$DOB=date("d-m-Y");

		
?>
<tr>
<td style="width: 59px" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 104px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[1]?></font></td>
<td style="width: 90px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 90px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[3];?></font></td>
<td style="width: 126px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 124px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 152px" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[6];?></font></td>
<td style="width: 226px" font="Cambria" class="style10"><font face="Cambria"><?php echo $row[8];?></font></td>


<?php
$recno=$recno+1;
	}
?>
</table>
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

<font face="Cambria">
<?php
}
?>
</font>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>