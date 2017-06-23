<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

   $sql = "SELECT distinct `class` FROM `class_master` order by `class`";
   $result = mysql_query($sql, $Con);
   
   $ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
   $rsFY= mysql_query($ssqlFY);
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
		$SelectedFinancialYear = $_REQUEST["cboFinancialYear"];
		$SelectedQuarter = $_REQUEST["txtSelectedQuarter"];
		
		
		$arrQuarter=explode(',',$SelectedQuarter);
		$CoutOfSelectedQuarter=sizeof($arrQuarter);
		
					$ssql="select x.* from (";
					for($i=0;$i<$CoutOfSelectedQuarter;$i++)
					{
						$Quarter1= $arrQuarter[$i];
						$ssql=$ssql . "SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`," . $Quarter1 . " as `Quarter`,a.`FinancialYear`,a.`receipt`,(SELECT `TutionFee` FROM `fees_transaction` WHERE `ReceiptNo`=a.`receipt`) as `CollectedTution_Fee`,(SELECT `TransportFee` FROM `fees_transaction` WHERE `ReceiptNo`=a.`receipt`) as `CollectedTranportFee`,(SELECT `admissionfees` FROM `fees_transaction` WHERE `ReceiptNo`=a.`receipt`) as `CollectedAdmissionFee`,(SELECT `AdjustedLateFee` FROM `fees_transaction` WHERE `ReceiptNo`=a.`receipt`) as `CollectedLateFee`,(SELECT `Discount` FROM `fees_transaction` WHERE `ReceiptNo`=a.`receipt`) as `CollectedDiscount`,a.`finalamount` FROM `fees` as `a` WHERE `quarter`='" . $Quarter1 . "' AND `FinancialYear`='$SelectedFinancialYear'";
						$ssql=$ssql . " union ";
					}				
					$ssql=substr($ssql,0,strlen($ssql)-7);
					$ssql= $ssql . ") as `x` order by `sadmission`,`Quarter`";
					
		
		//$ssql="SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`,(SELECT `amount` FROM `fees_master` WHERE `feeshead`='tuitionfees' and `quarter`='Q1' and `class`=a.`sclass`) as `PendingTution_Fee`,(select `routecharges` from `RouteMaster` where `routeno` =a.`routeno`) as `PendingTranportFee` FROM `student_master` as `a` WHERE `sadmission` not in (select `sadmission` from `fees` where `quarter`='Q1')";
		//echo $ssql;
		//exit();
		
		$ssqlQ = "SELECT distinct `quarter`,sum(`fees_amount`) as `AmtPayable`, sum(`amountpaid`) as `AmtPaid`,sum(`BalanceAmt`) as `BalanceAmt` FROM `fees` group by `quarter`";
		if (!$rslt = mysql_query($ssqlQ))   die("Record Not Found in Quarter:" . $Quarter1);
		
		$ssqlQ = "SELECT distinct `FeeYear`,`FeeMonth` as `Mnth`,sum(`fees_amount`) as `AmtPayable`, sum(`amountpaid`) as `AmtPaid`,sum(`BalanceAmt`) as `BalanceAmt` FROM `fees_monthwise` group by `FeeYear`,`FeeMonth`";
		if (!$rsltMnth = mysql_query($ssqlQ))   die("Record Not Found in Quarter:" . $Quarter1);
	
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	//alert(document.getElementById("txtSelectedQuarter").value);
	//return;
	
	if (document.getElementById("cboFinancialYear").value=="Select One")
	{
		alert("Please select financial year!");
		return;
	}
	
	var x=document.getElementById("cboQuarter");
		var sstr="'";
		var selectedValue="";
		  for (var i = 0; i < x.options.length; i++) 
		  {
		     if(x.options[i].selected ==true)
		     {
		          //alert(x.options[i].value);
		          NewValue = x.options[i].value;
		          NewValue=NewValue.substr(0,1);
		          
		          if (selectedValue!="")
		          {
		          	if(NewValue != selectedValue)
		          	{
		          		alert("Please select only one Quarter!");
		          		return;
		          	}
		          	selectedValue=NewValue;
		          }
		          else
		          {
		          	selectedValue=NewValue;
		          }
		          //sstr = sstr + x.options[i].value + "','";
		      }
		  }

	
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();	
}
function Validate()
{

	document.getElementById("frmClassWork").action = 'ExportToExcel1.php';
	document.getElementById("frmClassWork").submit();
}
function FillSubject()
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
			        	removeAllOptions(document.frmClassWork.cboSubject);
			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmClassWork.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			var submiturl="GetSubject.php?Class=" + document.getElementById("cboQuarter").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			
}

function removeAllOptions(selectbox)

	{

	

		var i;

		for(i=selectbox.options.length-1;i>=0;i--)

		{

			selectbox.remove(i);

		}

	}

	function removeOption(selectbox,indx)

	{

	

		var i;

		i=indx;

			selectbox.remove(i);

		

	}

	function addOption(selectbox,text,value )

	{

		var optn = document.createElement("OPTION");

		optn.text = text;

		optn.value = value;

		selectbox.options.add(optn);

	}
	function GetSelectedValue()
	{
		var x=document.getElementById("cboQuarter");
		var sstr="'";
		  for (var i = 0; i < x.options.length; i++) 
		  {
		     if(x.options[i].selected ==true)
		     {
		          //alert(x.options[i].value);
		          sstr = sstr + x.options[i].value + "','";
		      }
		  }
		  if (sstr !="'")
		  {
		  	
			sstr=sstr.substr(0,sstr.length-2);
			document.getElementById("txtSelectedQuarter").value=sstr;
			//alert (document.getElementById("txtSelectedQuarter").value);
		  }

	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fees Collection Report</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
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
	font-family: Cambria;
	color: #000000;
}
.style6 {
	border-collapse: collapse;
	text-align: Left;
	font-family: Cambria;
}
.style8 {
	border-style: solid;
	border-width: 1px;
	text-align: left;
	font-family: Cambria;
}
.style9 {
	text-align: left;
}
.auto-style1 {
	border-style: none;
	border-width: medium;
	text-align: center;
	background-color: #FFFFFF;
	color: #000000;
}
.auto-style2 {
	text-align: Left;
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	background-color: #FFFFFF;
	color: #000000;
}
.auto-style3 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.auto-style5 {
	color: #000000;
	font-family: Cambria;
}
.auto-style22 {
	text-align: left;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style23 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
}
.auto-style24 {
	color: #000000;
}
.auto-style6 {
	color: #000000;
}
.auto-style25 {
	font-family: Cambria;
}
.auto-style26 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.auto-style27 {
	font-family: Cambria;
	color: #000000;
}
.auto-style28 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style29 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
}
.style10 {
	border-style: none;
	border-width: medium;
	text-align: center;
	color: #000000;
}
.style11 {
	text-align: Left;
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	color: #000000;
}
.style12 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style13 {
	border-style: none;
	border-width: medium;
	text-align: center;
	background-color: #FFFFFF;
}
.style14 {
	text-align: Left;
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	background-color: #FFFFFF;
	color: #000000;
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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;
}
</style>
</head>

<body>

<div class="style9">

<p>&nbsp;</p>

<table style="border-width:0px; width: 100%; border-collapse:collapse" class="style4" cellpadding="0"><tr>		
	<td class="auto-style22" style="border-style:none; border-width:medium; height: 22; width: 66%">
	<b>Fees Collection Report</b><hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>		</tr>		</table>		
	<table style="width: 100%; border-left-width:0px; border-right-width:0px">		<tr>	
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmFeeCollectionRpt.php">
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style25">
	<input type="hidden" name="txtSelectedQuarter" id="txtSelectedQuarter" value="<?php echo $SelectedClasses; ?>" class="auto-style25">
	
	<tr>
		<td class="auto-style26" style="width: 156px; border-bottom-style:none; border-bottom-width:medium">
		
			<span class="auto-style24"> Financial Year:</span></td>
		<td class="style12" style="width: 329px; border-bottom-style:none; border-bottom-width:medium">
		<select name="cboFinancialYear" id="cboFinancialYear" class="text-box">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>"><?php echo $FYear; ?></option>
				<?php 
				}
				?>
				</select>

			</td>
		<td class="auto-style26" style="width: 224px; border-bottom-style:none; border-bottom-width:medium">
		<span class="auto-style24"> Quarter</span>:</td>
		<td class="style8" style="width: 224px; border-bottom-style:none; border-bottom-width:medium">
		<span class="auto-style25">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
			</span>
			<select name="cboQuarter"  multiple  id="cboQuarter" onclick="Javascript:GetSelectedValue();"class="text-box">
			<option selected="" value="All">All</option>
			<option value="Q1">Quarter 1 [April - June]</option>
			<option value="Q2">Quarter 2 [July - September]</option>
			<option value="Q3">Quarter 3 [October - December]</option>
			<option value="Q4">Quarter 4 [ January - March]</option>			
			</select><span class="auto-style25"> </span>
			</td>
		<td class="auto-style23" style="width: 289px; border-bottom-style:none; border-bottom-width:medium">		
			<strong>		
			<input name="btnShowSubject" type="button" value="Show Report" onclick="ReloadWithSubject();" class="text-box"></strong><span class="auto-style25">
			</span>
			</td>
	</tr>
	
	<tr>
		<td class="style3" colspan="5" style="border-style: none; border-width: medium">
		<?php
		if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
		{
			if(mysql_num_rows($rslt)>0)
			{
							$Cnt=1;
		?>
		<table  cellpadding="0" class="CSSTableGenerator">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 94px" class="style14">SrNo</td>
				<td style="border-style:solid; border-width:1px; width: 272px" class="style13">Quarter</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Amt. Payable</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Amt. Paid</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Balance Amt(Rs.)</td>
				
			</tr>
			<?php
				$ccnt=1;
				while($row1 = mysql_fetch_assoc($rslt))
   				{
					$Qtr=$row1['quarter'];
					$AmtPayable=$row1['AmtPayable'];
					$AmtPaid=$row1['AmtPaid'];
					$BalanceAmt=$row1['BalanceAmt'];
					
			?>
			<tr>
				<td style="width: 94px; border-top-style:solid; border-top-width:1px" class="style11"><?php echo $ccnt; ?></td>
				<td style="width: 272px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $Qtr; ?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $AmtPayable;?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $AmtPaid; ?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $BalanceAmt; ?></td>
				
			</tr>
			<?php
			$ccnt = $ccnt+1;
				}
			?>
			
		</table>
		<?php
			}
		}
		?>
		<br>
		<?php
		if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
		{
			if(mysql_num_rows($rslt)>0)
			{
							$Cnt=1;
		?>
		<table width="100%" cellpadding="0" class="style6">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 94px" class="style14">SrNo</td>
				<td style="border-style:solid; border-width:1px; width: 272px" class="style13">Month-Year</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Amt. Payable</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Amt. Paid</td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style13">Balance Amt(Rs.)</td>
				
			</tr>
			<?php
				$ccnt=1;
				while($row1 = mysql_fetch_assoc($rsltMnth))
   				{
					$FeeMonth=$row1['Mnth'];
					$FeeYear=$row1['FeeYear'];
					$MonthYear= $FeeMonth . "-". $FeeYear;
					$AmtPayable=$row1['AmtPayable'];
					$AmtPaid=$row1['AmtPaid'];
					$BalanceAmt=$row1['BalanceAmt'];
					
			?>
			<tr>
				<td style="width: 94px; border-top-style:solid; border-top-width:1px" class="style11"><?php echo $ccnt; ?></td>
				<td style="width: 272px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $MonthYear; ?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $AmtPayable;?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $AmtPaid; ?></td>
				
				<td style="width: 273px; border-top-style:solid; border-top-width:1px" class="style10"><?php echo $BalanceAmt; ?></td>
				
			</tr>
			<?php
			$ccnt = $ccnt+1;
				}
			?>
			
		</table>
		<?php
			}
		}
		?>
		<table class="CSSTableGenerator">
			<tr>
				<td style="border-style:solid; border-width:1px; width: 35px; background-color:#95C23D" class="auto-style2">
				<b>SrNo</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<span class="auto-style25"><b>Admission#</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<b>Class</span></b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style2">
				<b>Roll No</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<span class="auto-style25"><b>Name</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<b>Quarter</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<b>Financial Yr.</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<b>Tuition Fee</b></td>
				<td style="border-style:solid; border-width:1px; width: 101px; background-color:#95C23D" class="auto-style1">
				<b>Transport Fee</b></td>
				<td style="border-style:solid; border-width:1px; width: 102px; background-color:#95C23D" class="auto-style1">
				<b>Admission Fee</b></td>
				<td style="border-style:solid; border-width:1px; width: 102px; background-color:#95C23D" class="auto-style1">
				<b>Late Fee</b></td>
				<td style="border-style:solid; border-width:1px; width: 102px; background-color:#95C23D" class="auto-style1">
				<b>Discount</b></td>
				<td style="border-style:solid; border-width:1px; width: 102px; background-color:#95C23D" class="auto-style1">
				<b>Total Fee (Rs.)</b></td>
				<td style="border-style:solid; border-width:1px; width: 102px; background-color:#95C23D" class="auto-style1">
				<b>Send Reminder</b></td>
			</tr>
			<?php
				if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
				{
						
						//echo $ssql;
						//exit();
						
						if (!$result = mysql_query($ssql))     die("Record Not Found in Quarter:" . $Quarter1);
						if(mysql_num_rows($result)>0)
						{
							$Cnt=1;
							while($row = mysql_fetch_assoc($result))
			   				{
			   					$sadmission=$row['sadmission'];
			   					$sclass=$row['sclass'];
			   					$srollno=$row['srollno'];
			   					$sname=$row['sname'];
			   					$Qtr=$row['Quarter'];
			   					$FinancialYr=$row['FinancialYear'];
			   					$receipt=$row['receipt'];
			   					
			   					//$CollectedTution_Fee=$row['CollectedTution_Fee'];
			   					//$CollectedTranportFee=$row['CollectedTranportFee'];
			   					//$CollectedAdmissionFee=$row['CollectedAdmissionFee'];
			   					//$CollectedLateFee=$row['CollectedLateFee'];
			   					//$CollectedDiscount=$row['CollectedDiscount'];
			   					
			   					
			   					if ($row['CollectedTution_Fee'] !='NULL')
			   					{
			   						$CollectedTution_Fee=$row['CollectedTution_Fee'];
			   					}
			   					else
			   					{
			   						$CollectedTution_Fee=0;
			   					}
			   					
			   					if ($row['CollectedTranportFee'] !='NULL')
			   					{
			   						$CollectedTranportFee=$row['CollectedTranportFee'];
			   					}
			   					else
			   					{
			   						$CollectedTranportFee=0;
			   					}
			   					if ($row['CollectedAdmissionFee'] !='NULL')
			   					{
			   						$CollectedAdmissionFee=$row['CollectedAdmissionFee'];
			   					}
			   					else
			   					{
			   						$CollectedAdmissionFee=0;
			   					}
			   					if ($row['CollectedLateFee'] !='NULL')
			   					{
			   						$CollectedLateFee=$row['CollectedLateFee'];
			   					}
			   					else
			   					{
			   						$CollectedLateFee=0;
			   					}
			   					if ($row['CollectedDiscount'] !='NULL')
			   					{
			   						$CollectedDiscount=$row['CollectedDiscount'];
			   					}
			   					else
			   					{
			   						$CollectedDiscount=0;
			   					}
			   					
			   					//$Total=$CollectedTution_Fee + $CollectedTranportFee + $CollectedAdmissionFee + $CollectedLateFee - $CollectedDiscount;
			   					$Total=$row['finalamount'];
			?>
			
			<tr>
				<td style="border-style:solid; border-width:1px; width: 35px" class="auto-style28"><?php echo $Cnt; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $sadmission; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $sclass; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $srollno; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $sname; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $Qtr; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $FinancialYr; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $CollectedTution_Fee; ?></td>
				<td style="border-style:solid; border-width:1px; width: 101px" class="auto-style28"><?php echo $CollectedTranportFee; ?></td>
				<td style="border-style:solid; border-width:1px; width: 102px" class="auto-style28"><?php echo $CollectedAdmissionFee; ?></td>
				<td style="border-style:solid; border-width:1px; width: 102px" class="auto-style28"><?php echo $CollectedLateFee; ?></td>
				<td style="border-style:solid; border-width:1px; width: 102px" class="auto-style28"><?php echo $CollectedDiscount; ?></td>
				<td style="border-style:solid; border-width:1px; width: 102px" class="auto-style28"><?php echo $Total; ?>
				</span></td>
				<td style="border-style:solid; border-width:1px; width: 102px" class="auto-style29">&nbsp;</td>
			</tr>
			<?php
							$Cnt = $Cnt+1;
							ob_end_flush(); 
		    				ob_flush(); 
		    				flush(); 
		    				ob_start();
							} //END OF WHILE LOOP
						}//END OF IF CONDITION
					
				} // END OF IF CONDITION
			?>			
			
		</table>
		</td>
	</tr>
	<tr>
		<td class="style8" colspan="5" style="border-top-style: none; border-top-width: medium">
		<input type="hidden" name="Qry" id="Qry" value="<?php echo $ssql; ?>" class="auto-style25">
		<input name="Export" type="button" value="Export To Excel" onclick="Javascript:Validate();" class="text-box"></td>
	</tr>
	</form>
</table>

	</div>



<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>

</html>
