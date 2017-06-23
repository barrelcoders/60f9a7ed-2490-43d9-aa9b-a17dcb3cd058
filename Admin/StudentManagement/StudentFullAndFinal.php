<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>


<?php


$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);


if ($_REQUEST["txtAdmissionNo"] != "")
{
	$AdmissionNo=$_REQUEST["txtAdmissionNo"];

		$ssql = "SELECT `sname` , `sclass` , `srollno` FROM `Almuni` where  `sadmission`='$AdmissionNo'";
		$rsChk = mysql_query($ssql);
		
		if (mysql_num_rows($rsChk) > 0)
		{
					while($row = mysql_fetch_row($rsChk))
							{
								$sname=$row[0];
								$class=$row[1];					
								$RollNo=$row[2];
								break;					
							}
			
			$sql="select `LibraryClearance`,`AccountClearance`,`AcademicClearance`,`TransportClearance` from `fnfdetails` where `sadmission`='$AdmissionNo'";
			$rsChk1 = mysql_query($sql);
		
			$LibraryClearance="no";
			$AccountClearance="no";
			$AcademicClearance="no";
			$TransportClearance="no";
							
			if (mysql_num_rows($rsChk1) > 0)
			{
				while($row = mysql_fetch_row($rsChk1))
						{
							$LibraryClearance=$row[0];
							$AccountClearance=$row[1];
							$AcademicClearance=$row[2];
							$TransportClearance=$row[3];				
							break;
						}
					
					$FinalStatus="no";
					if($LibraryClearance=="yes" && $AccountClearance=="yes" && $AcademicClearance=="yes" && $TransportClearance=="yes")
					{
						$FinalStatus="yes";
					}
			}
			
			
			
			/*
			if ($FinalStatus=="no")
			{
				$sqlStudentDetail = "SELECT `sname` , `sclass` , `srollno` FROM `Almuni` where  `sadmission`='$AdmissionNo'";
				$rs = mysql_query($sqlStudentDetail);
				if (mysql_num_rows($rs) > 0)
				{
					while($row = mysql_fetch_row($rs))
							{
								$sname=$row[0];
								$class=$row[1];					
								$RollNo=$row[2];					
							}
				}
			}
			*/
			if ($FinalStatus=="yes")
			{
				$ErrMsg="<br><center><b>FNF of this student has been already completed!";
			}
			
		}
		else
		{
			$ErrMsg="<br><center><b>FNF can not be intiated because student has not been de-activated from student master!<br>Please contact academic coordinator or IT-Admin. to de-activate the student.";
		}
		
			
}
?>

<script language="javascript">
function Validate(SubmitType)
{
	if(document.getElementById("ChkLibrary").value == "")
	{
		alert("Please check library clearance");
		return;
	}
	if(document.getElementById("ChkAccount").value == "")
	{
		alert("Please check account clearance");
		return;
	}
	if(document.getElementById("ChkAcademic").value == "")
	{
		alert("Please check Academic clearance");
		return;
	}
	
	if(document.getElementById("ChkAccount").value == "")
	{
		alert("Please check Transport clearance");
		return;
	}
	
	document.getElementById("frmFees").action="FNFSubmit.php";
	
	document.getElementById("frmFees").submit();	
	
}

function Validate1()
{
	//alert("Hello");
	if (document.getElementById("txtAdmissionNo").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	document.getElementById("frmFees").submit();
	
}

function GetFeeDetail()
{
	if (document.getElementById("cboQuarter").value =="Q1")
	{
		if (document.getElementById("Q1Fee").value !="")
		{
			alert ("Fee for Quarter Q1 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q2")
	{
		if (document.getElementById("Q2Fee").value !="")
		{
			alert ("Fee for Quarter Q2 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q3")
	{
		if (document.getElementById("Q3Fee").value !="")
		{
			alert ("Fee for Quarter Q3 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
		if (document.getElementById("cboQuarter").value =="Q4")
	{
		if (document.getElementById("Q4Fee").value !="")
		{
			alert ("Fee for Quarter Q4 is already paid !");
			document.getElementById("cboQuarter").value="Select One";
			return;
		}
	}
	
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
			        	//alert(rows);
			        	var arrStr=rows.split(",");
			        	var TutionFee=arrStr[0];
			        	var TransportFee=arrStr[1];
			        	var BalanceAmt=arrStr[2];
			        	var LateDays=arrStr[3];
			        	
			        	document.getElementById("txtTuition").value=TutionFee;
			        	document.getElementById("txtTransportFees").value=TransportFee;
			        	document.getElementById("txtPreviousBalance").value=BalanceAmt;
			        	document.getElementById("txtLateDays").value =LateDays;
			        	if (LateDays !="")
			        	{
			        		document.getElementById("txtLateFee").value=50*LateDays;
			        		document.getElementById("txtAdjustedLateFee").value=50*LateDays;
			        		
			        	}
			        	document.getElementById("txtAdjustedLateDays").value =LateDays;
			        	CalculatTotal();
			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);
			        	//document.getElementById("txtStudentName").value=rows;
			        	
			        	//ReloadWithSubject();
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value + "&FinancialYear=" + document.getElementById("txtFinancialYear").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function CalculateLateFee()
{
	if(isNaN(document.getElementById("txtAdjustedLateDays").value)==true)
	{
		document.getElementById("txtAdjustedLateFee").value=0;
	}
	else
	{
		document.getElementById("txtAdjustedLateFee").value=50*document.getElementById("txtAdjustedLateDays").value;
	}
	CalculatTotal();
}

function CalculatTotal()
{
	if (isNaN(document.getElementById("txtTuition").value)==true || document.getElementById("txtTuition").value=="")
	{
		TutionFee=0;
	}
	else
	{
		TutionFee=document.getElementById("txtTuition").value;
	}
	if (isNaN(document.getElementById("txtTransportFees").value)==true || document.getElementById("txtTransportFees").value=="")
	{
		TransportFees=0;
	}
	else
	{
		TransportFees=document.getElementById("txtTransportFees").value;
	}
	if (isNaN(document.getElementById("txtAdjustedLateFee").value)==true || document.getElementById("txtAdjustedLateFee").value=="")
	{
		AdjustedLateFee=0;
	}
	else
	{
		AdjustedLateFee=document.getElementById("txtAdjustedLateFee").value;
	}
	if (isNaN(document.getElementById("txtPreviousBalance").value)==true || document.getElementById("txtPreviousBalance").value=="")
	{
		PreviousBalance=0;
	}
	else
	{
		PreviousBalance=document.getElementById("txtPreviousBalance").value;
	}
	if (isNaN(document.getElementById("txtDiscount").value)==true || document.getElementById("txtDiscount").value=="")
	{
		Discount=0;
	}
	else
	{
		TotalAmt1=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance);
		if (parseInt(document.getElementById("txtDiscount").value) > TotalAmt1)
		{
			document.getElementById("txtDiscount").value="0";
			Discount=0;
			alert ("Discount Amount can not be more then total amount !");
			
		}
		else
		{
			Discount=document.getElementById("txtDiscount").value;
		}
	}
	
	
	TotalAmt=parseInt(TutionFee)+parseInt(TransportFees)+parseInt(AdjustedLateFee)+parseInt(PreviousBalance)-parseInt(Discount);
	document.getElementById("txtTotal").value=parseInt(TotalAmt);
	
}

function fnlPaymentMode()
{
	if (document.getElementById("cboPaymentMode").value!="Cash")
	{
		document.getElementById("txtChequeNo").readOnly=false;
		document.getElementById("txtBank").readOnly=false;
	}
	else
	{
		document.getElementById("txtChequeNo").value="";
		document.getElementById("txtBank").value=""
		
		document.getElementById("txtChequeNo").readOnly=true;
		document.getElementById("txtBank").readOnly=true;
	}
}
function fnlLibraryClearance(ClearanceType)
{
	if(ClearanceType=="Library")
	{
		if(document.getElementById("ChkLibrary").checked==true)
		{
			//alert("Library clearance is checked!");
			document.getElementById("LibraryClearance").value="yes";			
		}
		else
		{
			document.getElementById("LibraryClearance").value="no";			
		}
	}
	if(ClearanceType=="Account")
	{
		if(document.getElementById("ChkAccount").checked==true)
		{
			//alert("Account clearance is checked!");
			document.getElementById("AccountClearance").value="yes";
			//return;
		}
		else
		{
			document.getElementById("AccountClearance").value="no";
		}
	}
	if(ClearanceType=="Academic")
	{
		if(document.getElementById("ChkAcademic").checked==true)
		{
			//alert("Academic clearance is checked!");
			document.getElementById("AcademicClearance").value="yes";
			//return;
		}
		else
		{
		document.getElementById("AcademicClearance").value="no";
		}
	}
	if(ClearanceType=="Transport")
	{
		if(document.getElementById("ChkTransport").checked==true)
		{
			//alert("Transport clearance is checked!");
			//return;
			document.getElementById("TransportClearance").value="yes";
		}
		else
		{
		document.getElementById("TransportClearance").value="no";
		}
	}
	
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Student Full And Final</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	



</head>



<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td class="auto-style14">
		<span class="auto-style37"><font face="Cambria">Full and Final Clearance</font></span><hr class="auto-style3" style="height: 0">
		<p class="auto-style6" style="height: 7px"><font face="Cambria">
		<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
				
				</table>


	
	<form name="frmFees" id="frmFees" method="post" action="StudentFullAndFinal.php">
	<div class="style2">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<input type="hidden" name="LibraryClearance" id="LibraryClearance" value="<?php echo $LibraryClearance;?>">
	<input type="hidden" name="AccountClearance" id="AccountClearance" value="<?php echo $AccountClearance;?>">
	<input type="hidden" name="AcademicClearance" id="AcademicClearance" value="<?php echo $AcademicClearance;?>">
	<input type="hidden" name="TransportClearance" id="TransportClearance" value="<?php echo $TransportClearance;?>">
		<span class="style3"><strong><?php echo $ErrMsg;?></strong></span> </div>
<div align="center" id="MasterDiv">	
<style type="text/css">

.auto-style1 {
	font-size: 11pt;
	font-family: Calibri;
}
.auto-style2 {
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style5 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}

.auto-style12 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-size: 11pt;
	color: #000000;
	text-decoration: underline;
	text-align: center;
}

.auto-style14 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style15 {
	font-size: 11pt;
	font-weight: bold;
	font-family: Calibri;
}
.auto-style18 {
	margin-left: 0px;
	font-family: Calibri;
	font-size: 11pt;
	color: #CC0033;
}

.auto-style20 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style23 {
	border-style: none;
	border-width: medium;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}

.auto-style35 {
	font-size: 11pt;
	font-family: Calibri;
	color: #CC0033;
}

.auto-style3 {
	font-family: Cambria;
	}
.auto-style6 {
	
	font-family: Calibri;
	color: #CD222B;
}

.auto-style37 {
	font-family: Calibri;
}
.auto-style38 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
	font-weight: bold;
	font-size: 11pt;
	color: #000000;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Calibri;
}

.style1 {
	border-style: solid;
	border-width: 1px;
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
        font-family: Calibri;
        font-weight:bold;

}

.style2 {
	text-align: center;
}

.style3 {
	color: #CD222B;
}

</style>
	<table border="1px" width="100%" height="66">
	
	
		<tr>
		
		<td style="width: 281px; height: 29px;" class="auto-style23">

		<span class="auto-style2"><font face="Cambria">Student Admission No. 
		</font> </span>
		<span style="font-weight: 700; color: #000000" class="auto-style1">
		<font face="Cambria">:</font></span></td>

		<td style="width: 157px; height: 29px;" class="auto-style23">

		<font face="Cambria">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" class="text-box" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>"></font></td>

		<td style="width: 157px; height: 29px;" class="auto-style26">



		<font face="Cambria">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="text-box"></font>
		</td>
		<td class="auto-style23"></td>
		<td class="auto-style23"></td>
		<td class="auto-style23"></td>
		<td class="auto-style23"></td>
	</tr>
	
	
	<tr>
	
	
	
		<td style="width: 281px; height: 28px;" class="auto-style23">

		<span class="auto-style2"><font face="Cambria">Student Name</font></span><span class="auto-style1"><font face="Cambria">
		</font>
		</span>

		</td>

		<td style="width: 157px; height: 28px;" class="auto-style23">

		<font face="Cambria">

		<input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $sname;?>" readonly="readonly" ></font></td>
	
		
		
		
	
		<td style="width: 157px; height: 28px;" class="auto-style41">

		&nbsp;</td>
	
		
		
		
	
		<td style="width: 179px; height: 28px;" class="auto-style38">

		<font face="Cambria">Class</font></td>

		<td style="height: 28px;" class="auto-style23">

		<font face="Cambria">

		<input name="txtClass" id="txtClass" type="text" class="text-box" value="<?php echo $class;?>" readonly="readonly"></font></td>
		
		
	
		<td style="width: 191px; height: 28px;" class="auto-style26">

		<span style="font-weight: 700; color: #000000" class="auto-style1">
		<font face="Cambria">Roll No</font></span><span class="auto-style1"><font face="Cambria">
		</font>
		</span>

		</td>
		
		

		<td style="height: 28px;" class="auto-style23">

		<font face="Cambria">

		<input name="txtRollNo" id="txtRollNo" type="text" class="text-box" value="<?php echo $RollNo; ?>" readonly="readonly" ></font></td>
		<font face="Cambria">
		<br class="auto-style1">
		
		<br class="auto-style1">
		</font>
		</tr>
		
		
		</table>
		
		<font face="Cambria"><span class="style3"><strong><?php //echo $ErrMsg;?></strong></span>
			<br class="auto-style37">


	
	
	
	</font>

<table class="style1" style="width: 100%">

<tr>			
		

		<td class="auto-style12" colspan="2">

		<font face="Cambria">

		<strong>Clearance Heads</strong></font></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<font face="Cambria">

		<span style="font-style: normal; font-variant: normal; font-weight: bold; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Library Clearance</strong></span></font></td>


		<td class="auto-style22" style="height: 22px">

		<font face="Cambria">

		<input name="ChkLibrary" id="ChkLibrary" type="checkbox" value="1" style="float: left" onclick="Javascript:fnlLibraryClearance('Library');" <?php if ($LibraryClearance=="yes") {?>checked="checked"<?php }?>></font></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<font face="Cambria">

		<span style="font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Account Clearance</strong></span></font></td>


		<td class="auto-style22" style="height: 25px">

		<font face="Cambria">

		<input name="ChkAccount" id="ChkAccount" type="checkbox" value="1" style="float: left" onclick="Javascript:fnlLibraryClearance('Account');"  <?php if ($AccountClearance=="yes") {?>checked="checked"<?php }?>></font></td>

			</tr>
		
<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<font face="Cambria">

		<span style="font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">
		<strong>Academic Clearance</strong></span></font></td>


		<td style="width: 595px; height: 26px;" class="auto-style22">
		<font face="Cambria">
		<input name="ChkAcademic" id="ChkAcademic" type="checkbox" value="1" style="width: 20px; float:left" onclick="Javascript:fnlLibraryClearance('Academic');" <?php if ($AcademicClearance=="yes") {?>checked="checked"<?php }?>></font></td>

			</tr>
		

	<?php 

	if ($Message1 !="")

	{

	?>

	<?php 

	}

	?>

	

	<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<font face="Cambria">Transport</font></td>


		<td style="width: 595px; height: 27px;" class="auto-style22">

		<font face="Cambria">
		<input name="ChkTransport" id="ChkTransport" type="checkbox" value="1" style="float: left" onclick="Javascript:fnlLibraryClearance('Transport');" <?php if ($TransportClearance=="yes") {?>checked="checked"<?php }?>></font></td>

			</tr>
		


	<tr>			
		

		<td style="width: 594px; " class="auto-style40">

		<font face="Cambria">Other Clearance</font></td>


		<td style="width: 595px; height: 27px;" class="auto-style22">

		<input name="txtOtherClearance" id="txtOtherClearance" type="text" class="text-box"></td>

			</tr>
		


	<tr>

		<td colspan="2" class="auto-style5">

		<strong>

		<font face="Cambria">
		<?php 
		if ($FinalStatus !="yes")
			{
		?>
		<input name="BtnSubmit" type="button" value="Submit" onclick="Javascript:Validate('Final');" class="text-box">
		<?php
		}
		?>
		</font><span class="auto-style37"><font face="Cambria">
		</font>
		</span>
		</strong></td>

	</tr>


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
	
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style37">
</form>
<?php include"footer.php";?>
<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>-->

</body>



</html>