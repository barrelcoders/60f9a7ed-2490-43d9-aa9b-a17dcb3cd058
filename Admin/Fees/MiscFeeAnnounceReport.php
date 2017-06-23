<?php
session_start();
include '../../connection.php';
include '../../AppConf.php'; 
include '../Header/Header3.php';
?>

<?php

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadmission=$_REQUEST["txtadmission"];
	$Selectedheadname=$_REQUEST["headname"];
	//$Selectedheadamount=$_REQUEST["txtheadamount"];
	$SelectedPaymentStatus=$_REQUEST["cboPaymentStatus"];
	$SelectedClass=$_REQUEST["cboClass"];
	
	
/*
	$ssql="SELECT `srno`,`sadmission`,`sname`,`sclass`,`HeadName`,`HeadAmount`,
(select IFNULL(`TxnStatus`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`) as `PaymentStatus`,
(select IFNULL(`PGTxnId`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`) as `PG Transaction Id`,
(select IFNULL(`TxnId`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`) as `TxnId`,
(select IFNULL(`FeeReceipt`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`) as `ReceiptNo`

FROM `fees_misc_announce` as `a` where `sadmission`!=''";
*/

$ssql="select `srno`,`sadmission`,`sname`,`sclass`,`HeadName`,`HeadAmount`,IFNULL(`PaymentStatus`,''),IFNULL(`PG Transaction Id`,''),IFNULL(`TxnId`,''),IFNULL(`ReceiptNo`,'') from (SELECT `srno`,`sadmission`,`sname`,`sclass`,`HeadName`,`HeadAmount`,
(select IFNULL(`TxnStatus`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass` limit 1) as `PaymentStatus`,
(select IFNULL(`PGTxnId`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`  limit 1) as `PG Transaction Id`,
(select IFNULL(`TxnId`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`  limit 1) as `TxnId`,
(select IFNULL(`FeeReceipt`,'') from `fees_misc_collection` where `sadmissionno`=a.`sadmission` and `HeadName`=a.`HeadName` and `sclass`=a.`sclass`  limit 1) as `ReceiptNo`

FROM `fees_misc_announce` as `a` where `sadmission`!='') as `x` where 1=1";

	
	if($Selectedheadname!="Select One")
	{
		$ssql=$ssql." and `HeadName`='$Selectedheadname'";
	
	
   }
   

	if($Selectedadmission!="")

	{

		$ssql=$ssql." and `sadmission`='".$Selectedadmission."'";

	}
	if($SelectedClass!="Select One")
	{
		$ssql=$ssql." and `sclass`='$SelectedClass'";
	
	
   }
	
	
$rs= mysql_query($ssql);
}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Misc Fee Announce Report</title>
<script language="javascript">
function fnlFillClass()
{
			try
		    {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
			}
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
			        	//rows=rows.substr(3,rows.length);
			        	//alert(rows);
			        	
			        	removeAllOptions(document.frmRpt.cboClass1);
			        	 
			        	//document.getElementById("txtStudentName").value="";
			        	addOption(document.frmRpt.cboClass1,"Select One","Select One")
			        	arr_row=rows.split(',');
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmRpt.cboClass1,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        	//alert(rows);														
			        }
		      }

			var submiturl="GetClassWithSection.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
</script>
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
<p><b><font face="Cambria">Misc Fee Announce Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table width="100%" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="MiscFeeAnnounceReport.php">

<font face="Cambria">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
</font>
<tr>
<td style="width: 278px">
<p align="left"><font face="Cambria">Admission No.</font></td>
<td style="width: 278px"><font face="Cambria">
<input name="txtadmission" type="text" class="text-box"> </font>
</td>
<td style="width: 278px"><font face="Cambria">Class</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="cboClass" id="cboClass" style="float: left" class="text-box">
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
<td style="width: 278px"><p align="left"><font face="Cambria">Head Name</font></td>
<td style="width: 278px"><font face="Cambria">
	 <select name="headname" id="headname" style="float: left" ; required onchange="Javascript:GetSubHead();" class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_announce`";
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
		   <td colspan="10">
			<p style="text-align: center"><b>
			<font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>

			<font face="Cambria">Announce Report</font><br> <?php 
         	if($Selectedheadname=="Select One")
         	{
         	$Selectedheadname="";
         	}
         	
         	
         	
         	echo $Selectedheadname;?></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>


<tr>
<td height="22" align="center" class="style10" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Admission No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Student Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Head Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Head Amount</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Transaction Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">PG Transaction Id</font></b></td>
		
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Payment Status</font></b></td>
				
		
		
		<td height="22" align="center" class="style11">
		<b><font face="Cambria">Receipt No</font></b></td>
				
		
		
</tr>
<?php
$recno=1;
$TotalAmt=0;
	while($row=mysql_fetch_row($rs))
	{
	     $sadmission=$row[1];
	     $sname=$row[2];
	     $sclass=$row[3];
	     $HeadName=$row[4];
	     $HeadAmount=$row[5];
	     $TxnStatus=$row[6];
	     $PGTxnId=$row[7];
	     $TxnId=$row[8];
	     $ReceiptNo=$row[9];
	$TotalAmt=$TotalAmt+$HeadAmount;
?>
<tr>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $sadmission;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $sname;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $sclass;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $HeadName;?></font></td>
<td style="width: 122px" font="Cambria" class="style7"><font face="Cambria"><?php echo $HeadAmount;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $TxnId;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $PGTxnId;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $TxnStatus;?></font></td>
<td style="width: 122px" font="Cambria" class="style13"><font face="Cambria"><?php echo $ReceiptNo;?></font></td>


</tr>
<?php
$recno=$recno+1;
	}
?>
<tr>
<td font="Cambria" colspan="5" class="style2"><b><font face="Cambria">Total:</font></b></td>
<td style="width: 122px" font="Cambria" class="style7"><b><font face="Cambria"><?php echo $TotalAmt;?></font></b></td>
<td style="width: 122px" font="Cambria" class="style13">&nbsp;</td>
<td style="width: 122px" font="Cambria" class="style13">&nbsp;</td>
<td style="width: 122px" font="Cambria" class="style13">&nbsp;</td>
<td style="width: 122px" font="Cambria" class="style11">&nbsp;</td>


</tr>
</table></div>
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
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>
</div>
</body>
</html>
