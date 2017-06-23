<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<?php
$ssqlsadmission="SELECT distinct `sadmission` FROM `fees_student`";
$rssadmission= mysql_query($ssqlsadmission);

$rsFeeHeadMaster=mysql_query("select distinct `feeshead` from `fees_student`");

if($_REQUEST["isSubmit"]=="yes")
{	
	$Selectedsadmission=$_REQUEST["admissionno"];
	$AddNewFeeHead	=$_REQUEST["cboAddNewFeeHead"];
	$NewFeeHeadAmount=$_REQUEST["txtNewFeeHeadAmount"];
	if($AddNewFeeHead !="" && $NewFeeHeadAmount !="")
	{
		$rsStudentDetail= mysql_query("select `sclass`,`sname` from `student_master` where `sadmission`='$Selectedsadmission'");
		while($rowS=mysql_fetch_row($rsStudentDetail))
		{
			$sclass=$rowS[0];
			$sname=$rowS[1];
			break;
		}
		$rsChk=mysql_query("select * from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='$AddNewFeeHead'");
		if(mysql_num_rows($rsChk)==0)
		{
			$rsTotalAmt=mysql_query("select `amount` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'");
			$TotalAmout=0;
			if(mysql_num_rows($rsTotalAmt)>0)
			{
				while($rowTot=mysql_fetch_row($rsTotalAmt))
				{
					$TotalAmout=$NewFeeHeadAmount+$rowTot[0];
					break;
				}
			}
			else
			{
				$TotalAmout=$NewFeeHeadAmount;
			}
			
			mysql_query("update `fees_student` set `amount`='$TotalAmout' where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'") or die(mysql_error());
			
			$ssql="insert into `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) values ('$Selectedsadmission','$sclass','$sname','$AddNewFeeHead','$NewFeeHeadAmount','2015','Regular')";
			mysql_query($ssql) or die(mysql_error());	
		}
	}

	
	$ssql="select distinct `feeshead`,`amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`FeesType` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`!='TOTAL BILL AMOUNT' and `FeesType` in ('Regular','Hostel') and `feeshead` not like '%INSTAL%'";
	
	$rs= mysql_query($ssql);
	
	$ssql1="select `amount`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,`class` from `fees_student` as `a` where `sadmission`='$Selectedsadmission' and `feeshead`='TOTAL BILL AMOUNT'";
	
	$rs1= mysql_query($ssql1);
	while($row1=mysql_fetch_row($rs1))
	{
		$TotalExistingBillAmount=$row1[0];
		$sname=$row1[1];
		$discounttype=$row1[2];
		$Class=$row1[3];
		break;
	}
}
?>
<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Fees Head Modification</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>
	
<script language="javascript" type="text/javascript">


function sname()
{
	
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);
			        	arr_row=rows.split(",");
			        	document.getElementById('name').value=arr_row[0];
						document.getElementById('clas').value=arr_row[1];       	 
						document.getElementById('roll').value=arr_row[2];       	 
			        }
		      }
			
			var submiturl="get_info1.php?c=" + document.getElementById('adm').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}


function srollno()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	var adm = document.getElementById('adm').value;

	var string = "?adm=" + adm;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('roll').value=itm.responseText;
		}
	}
	
}


function sclass()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	var clas = document.getElementById('adm').value;

	var string = "?clas=" + clas;
	itm.open("GET","get_info.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{ 
			document.getElementById('clas').value=itm.responseText;
		}
	}
}

function CalculateTotal()
{
	var TotalHead=document.getElementById("txtTotalHead").value;
	var strNewValue="";
	var strNewTotalValue=0;
	for(var i=1;i<=TotalHead;i++)
	{
		//alert(isNaN(document.getElementById("txtNewValue" + i).value));
		if(isNaN(document.getElementById("txtNewValue" + i).value)==false && document.getElementById("txtNewValue" + i).value != "")
		{
			strNewTotalValue=strNewTotalValue + parseInt(document.getElementById("txtNewValue" + i).value);	
			//strNewValue=strNewValue + document.getElementById("txtNewValue" + i).value+",";	
		}
	}
	//alert(strNewTotalValue);
	document.getElementById("txtNewTotalBillAmount").value=strNewTotalValue;
}

function ValidateFrm()
{
	document.getElementById("frmFeeHead").submit();
}

function ValidateAddNew()
{
	if (document.getElementById("cboAddNewFeeHead").value=="Select One")
	{
		alert("Please select Fee Head to be added!");
		return;
	}
	if (document.getElementById("txtNewFeeHeadAmount").value=="")
	{
		alert("Fee head amount is mandatory!");
		return;
	}
	document.getElementById("frmRpt").submit();
}
</script>


	

<style>
<!--

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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}

.style1 {
	text-align: left;
}

.style2 {
	font-weight: bold;
	text-align: center;
	background-color: #C0C0C0;
}

.style3 {
	text-align: center;
}

-->
</style>

	

</head>



<body>
<form name="frmRpt" id="frmRpt" method="post" action="">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Fees Head Modify </p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table>
<font face="Cambria"> 
<br /><br />
</font>  

<table class="name" width="100%">

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Admission No.</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="admissionno" id="adm" onkeyup="javascript:sname();" style="float: left" /></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Student Name</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="name" id="name" style="float: left"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria">
			Class</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;"><font face="Cambria"><input name="class" id="clas" style="float: left"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria">
			Roll No</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;"><font face="Cambria"><input name="rollno" id="roll" style="float: left"/></font></td>
 </tr>

 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">
			Select Fee Head</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2">
			<select name="cboAddNewFeeHead" id="cboAddNewFeeHead">
			<option selected="" value="">Select One</option>
			<?php
			while($rowFe=mysql_fetch_row($rsFeeHeadMaster))
			{
				$FeeHead=$rowFe[0];
			?>
			<option value="<?php echo $FeeHead;?>"><?php echo $FeeHead;?></option>
			<?php
			}
			?>
			</select></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 192px; height: 28px;">
			<font face="Cambria">
			Amount</font></td>
		  <td align="center" style="border-style: solid; border-width: 1px; height: 28px;" colspan="2" class="style1">
			<input name="txtNewFeeHeadAmount" id="txtNewFeeHeadAmount" type="text"></td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			&nbsp;</td>
		  <td align="center" style="border-style: solid; border-width: 1px; width: 193px; height: 28px;">
			&nbsp;</td>
 </tr>

 <tr>
		  <td style="border-style: solid; border-width: 1px; " colspan="8" class="style1"><input name="Submit1" type="submit" value="Search" class="theButton">
		  <!--
		  <input name="btnAddNew" type="button" value="Add New" onclick="javascript:ValidateAddNew();">
		  -->
		  </td>
 </tr>
 </table>
</form>
<font face="Cambria"><br>
</font>

<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>
<br/>
<br/>
<br/>
<br/>
<table class="name" width="100%">


<div align="center">
<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%">
<form name="frmFeeHead" id="frmFeeHead" method="post" action="SubmitFeeHeadModify.php">
<input type="hidden" name="hsadmission" id="hsadmission" value="<?php echo $Selectedsadmission;?>">
<input type="hidden" name="hclass" id="hclass" value="<?php echo $Class;?>">
<input type="hidden" name="hName" id="hName" value="<?php echo $sname;?>">

   <tr>
   		<td height="22" style="width: 641px" >&nbsp;</td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
	</tr>
	<tr>
   		<td height="22" style="width: 641px" ><b><font face="Cambria">
		Admission No.</font></b></td>
   		<td height="22" style="width: 642px" ><?php echo $Selectedsadmission;?></td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
	</tr>
	<tr>
   		<td height="22" style="width: 641px" ><b>
		<font face="Cambria">
		Name</font></b></td>
   		<td height="22" style="width: 642px" ><?php echo $sname;?></td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
	</tr>
	<tr>
   		<td height="22" style="width: 641px" ><b>
		<font face="Cambria">
		Class</font></b></td>
   		<td height="22" style="width: 642px" ><?php echo $Class;?></td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
	</tr>
	<tr>
   		<td height="22" style="width: 641px" ><b>
		<font face="Cambria">
		Discount Type</font></b></td>
   		<td height="22" style="width: 642px" ><?php echo $discounttype;?></td>
   		<td height="22" style="width: 642px" >&nbsp;</td>
	</tr>
	<tr>
		<td height="22" style="width: 641px" class="style2" >
		<font face="Cambria">
		Fees Head Name</font></td>
		<td height="22" style="width: 642px" class="style2" >
		<font face="Cambria">
		Existing Value </font></td>
		<td height="22" style="width: 642px" class="style2" >
		<font face="Cambria">
		Modified Value </font></td>
	</tr>
	<?php 
	$cnt=1;
	while($row=mysql_fetch_row($rs))
	{
		$feeshead=$row[0];
		$amount=$row[1];
		$name=$row[2];
		$discounttype=$row[3];
		$FeeType=$row[4];
	?>
		<tr>
		<td height="22" style="width: 641px" ><?php echo $feeshead;?></td>
		<td height="22" style="width: 642px" class="style3" >
		<input type="hidden" name="txtfeeheadname<?php echo $cnt;?>" id="txtfeeheadname<?php echo $cnt;?>" value="<?php echo $feeshead;?>">
		<input type="hidden" name="txtFeeType<?php echo $cnt;?>" id="txtFeeType<?php echo $cnt;?>" value="<?php echo $FeeType;?>">
		<input name="txtExistingValue<?php echo $cnt;?>" id="txtExistingValue<?php echo $cnt;?>" type="text" value="<?php echo $amount;?>" readonly="readonly">
		</td>
		<td height="22" style="width: 642px" >
		<input name="txtNewValue<?php echo $cnt;?>" id="txtNewValue<?php echo $cnt;?>" type="text" value="<?php echo $amount;?>" onkeyup="javascript:CalculateTotal();"></td>
	</tr>
	<?php
		$cnt=$cnt+1;
	}
	?>

	<input type="hidden" name="txtTotalHead" id="txtTotalHead" value="<?php echo ($cnt-1);?>">
	<tr>

		<td height="22" style="width: 641px" >TOTAL BILL AMOUNT</td>	
		<td height="22" style="width: 642px" class="style3" >
		<input name="txtExistingTotalBillAmount" type="text" value="<?php echo $TotalExistingBillAmount;?>" readonly="readonly"></td>
		<td height="22" style="width: 642px" >
		<input name="txtNewTotalBillAmount" id="txtNewTotalBillAmount" type="text" value="<?php echo $TotalExistingBillAmount;?>"></td>
		
   	</tr>
	<tr>

		<td height="22" style="width: 641px" ><b>
		<font face="Cambria">
		Total</font></b></td>	
		
		<td height="22" style="width: 642px" >&nbsp;</td>
		
		
		<td height="22" style="width: 642px" >&nbsp;</td>
		
   	</tr>
	<tr>

		<td height="22" colspan="3" class="style3" >
		<input name="btnSubmit" type="button" value="Submit" onclick="javascript:ValidateFrm();"></td>	
		
   	</tr>
</form>
</table>
<?php
}
?>
</div>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>