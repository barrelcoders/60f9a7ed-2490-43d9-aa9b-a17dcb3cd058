<?php
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
   $sql = "SELECT distinct `class` FROM `class_master` order by `class`";
   $result = mysql_query($sql, $Con);
   $ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
	$rsFY= mysql_query($ssqlFY);
	
	$ssqlCFY="SELECT distinct `year`,`financialyear` FROM `FYmaster` where `Status`='Active'";
	$rsCFY= mysql_query($ssqlCFY);

	while($row = mysql_fetch_row($rsCFY))
	{
		$CurrentFinancialYear = $row[0];
		$CurrentFinancialYearName=$row[1];					
	}

   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	
		//$SelectedQuarter = $_REQUEST["txtSelectedQuarter"];
		$SelectedQuarter = $_REQUEST["cboQuarter"];
		
		$SelectedFinancialYr= $_REQUEST["cboFinancialYear"];
		//$FeeSubmissionType=$_REQUEST["cboFeeSubmissionType"];
		
		$arrQuarter=explode(',',$SelectedQuarter);
		$CoutOfSelectedQuarter=sizeof($arrQuarter);

		if($SelectedQuarter=="Q1")
		{
			$ssql="select x.* from (";
			$ssql=$ssql . "SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`,'$SelectedQuarter' as `Quarter`,(SELECT SUM(`amount`) FROM `fees_student` WHERE `quarter`='" . $SelectedQuarter. "' and `class`=a.`sclass` and `financialyear`='$SelectedFinancialYr') as `PendingTution_Fee`,(select `routecharges` from `RouteMaster` where `routeno` =a.`routeno` and `financialyear`='$SelectedFinancialYr' limit 1) as `PendingTranportFee`,`smobile` FROM `student_master` as `a` WHERE `sclass`!='Test' and `FinancialYear` !='$CurrentFinancialYear' and `DiscontType` not in ('EWS','Staff Child','Freeship') and `sclass` not like '11%' and (`sclass` not like '%z') and `sadmission` not in (select `sadmission` from `fees` where `quarter`='" . $SelectedQuarter . "' and `FinancialYear`='$SelectedFinancialYr')";
			$ssql= $ssql . ") as `x` order by `sadmission`,`Quarter`";
		}
		else
		{
			$ssql="select x.* from (";
			$ssql=$ssql . "SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`," . $Quarter1 . " as `Quarter`,(SELECT SUM(`amount`) FROM `fees_student` WHERE `quarter`=" . $Quarter1 . " and `class`=a.`sclass` and `financialyear`='$SelectedFinancialYr') as `PendingTution_Fee`,(select `routecharges` from `RouteMaster` where `routeno` =a.`routeno` and `financialyear`='$SelectedFinancialYr' limit 1) as `PendingTranportFee`,`smobile` FROM `student_master` as `a` WHERE `sclass`!='Test' and (`sclass` not like '%z') and `DiscontType`='' and `sadmission` not in (select `sadmission` from `fees` where `quarter`=" . $Quarter1 . " and `FinancialYear`='$SelectedFinancialYr')";
			$ssql= $ssql . ") as `x` order by `sadmission`,`Quarter`";
		}
					
					/*
						$ssql="select x.* from (";
						for($i=0;$i<$CoutOfSelectedQuarter;$i++)
						{
							$Quarter1= $arrQuarter[$i];
							
							$ssql=$ssql . "SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`," . $Quarter1 . " as `Quarter`,(SELECT SUM(`amount`) FROM `fees_student` WHERE `quarter`=" . $Quarter1 . " and `class`=a.`sclass` and `financialyear`='$SelectedFinancialYr') as `PendingTution_Fee`,(select `routecharges` from `RouteMaster` where `routeno` =a.`routeno` and `financialyear`='$SelectedFinancialYr' limit 1) as `PendingTranportFee`,`smobile` FROM `student_master` as `a` WHERE `sclass`!='Test' and (`sclass` not like '%z') and `DiscontType`='' and `sadmission` not in (select `sadmission` from `fees` where `quarter`=" . $Quarter1 . " and `FinancialYear`='$SelectedFinancialYr')";
							$ssql=$ssql . " union ";
						}				
						$ssql=substr($ssql,0,strlen($ssql)-7);
						$ssql= $ssql . ") as `x` order by `sadmission`,`Quarter`";
					*/
					
					//echo $ssql;
					//exit();
		
		//$ssql="SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`,(SELECT `amount` FROM `fees_master` WHERE `feeshead`='tuitionfees' and `quarter`='Q1' and `class`=a.`sclass`) as `PendingTution_Fee`,(select `routecharges` from `RouteMaster` where `routeno` =a.`routeno`) as `PendingTranportFee` FROM `student_master` as `a` WHERE `sadmission` not in (select `sadmission` from `fees` where `quarter`='Q1')";
		//echo $ssql;
		//exit();
		
	
	
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	//alert(document.getElementById("txtSelectedQuarter").value);
	//return;
	/*
	if(document.getElementById("cboFeeSubmissionType").value=="Select One")
	{
		alert("Please select fee submission type Quarterly / Monthly!");
		return;
	}
	*/
	if (document.getElementById("cboFinancialYear").value=="Select One")
	{
		alert ("Please select financial year!");
		return;
	}
	
	var y=document.getElementById("cboQuarter");
		var selectedCnt=0;
		  for (var i = 0; i < y.options.length; i++) 
		  {
		     if(y.options[i].selected ==true)
		     {
		     	selectedCnt=selectedCnt+1;
		     }
		   }
		   if (selectedCnt > 1)
		   {
		   	alert("Please select one quarter only!");
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
	function ShowReminder(AdmissionId,Quarter,TuitutionFee,TransportFee,cnt)
	{
		var ctrlButtonName="BtnReminder" + cnt;
		document.getElementById(ctrlButtonName).disabled=true;
		
		var myWindow = window.open("FeesReminder.php?admissionid=" + AdmissionId + "&Quarter=" + Quarter + "&SelectedFinancialYear=" + document.getElementById("txtSelectedFinancialYear").value + "&TueitutionFee=" + TuitutionFee + "&TransportFee=" + TransportFee,"","width=700,height=650");
			
	}
	
	function ShowReminder2(AdmissionId,Quarter,TuitutionFee,TransportFee,cnt)
	{
		var ctrlButtonName="BtnReminder" + cnt;
		document.getElementById(ctrlButtonName).disabled=true;
		
		var myWindow = window.open("FeesReminder.php?admissionid=" + AdmissionId + "&Quarter=" + Quarter + "&SelectedFinancialYear=" + document.getElementById("txtSelectedFinancialYear").value + "&TueitutionFee=" + TuitutionFee + "&TransportFee=" + TransportFee,"","width=700,height=650");
			
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fees Defaulter Report</title>
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
.style8 {
	border-style: solid;
	border-width: 1px;
	text-align: left;
	font-family: Cambria;
}
.auto-style1 {
	text-align: center;
	background-color: #DCBA7B;
	color: #000000;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style2 {
	text-align: Left;
	text-align: center;
	font-family: Cambria;
	background-color: #DCBA7B;
	color: #000000;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style3 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.auto-style5 {
	color: #000000;
}
.auto-style7 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style6 {
	color: #DAB9C1;
}
.auto-style8 {
	text-align: Left;
	text-align: center;
	font-family: Cambria;
	background-color: #FFFFFF;
	color: #000000;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 0px;
}
.auto-style9 {
	text-align: center;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 0px;
	border-top-style: solid;
	border-top-width: 0px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style10 {
	text-align: center;
	background-color: #FFFFFF;
	color: #000000;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style11 {
	text-align: center;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style12 {
	text-align: center;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style10 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
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
.style11 {
	border-left-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
}
</style>
</head>

<body>

&nbsp;<table style="border-width:0px; width: 100%">
	<tr>
		<td class="auto-style7" style="border-style:none; border-width:medium; height: 22; width: 66%">
		<b>Fees Defaulter Report</b><hr class="auto-style3" style="height: -15px">
		<p class="auto-style6" style="height: 30px">
		<a href="javascript:history.back(1)">
		<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
		</td>
	</tr>
</table>
<table style="width: 100%; " class="style11">
	<tr>	
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmFeeDefaulters.php">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<input type="hidden" name="txtSelectedQuarter" id="txtSelectedQuarter" value="<?php echo $SelectedClasses; ?>">
	<input type="hidden" name="txtSelectedFinancialYear" id="txtSelectedFinancialYear" value="<?php echo $SelectedFinancialYr;?>">
		<tr>
			<td class="style3" style="width: 234px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
			<span class="auto-style5">Select Financial Year:</span></td>
			<td class="style8" style="width: 145px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
			<p style="text-align: center">
			<select name="cboFinancialYear" class="text-box" id="cboFinancialYear">
			<option selected="" value="Select One">Select One</option>
				<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>"><?php echo $FYear; ?>
			</option>
				<?php 
				}
				?></select> </td>
			<td class="style3" style="width: 161px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
			<p style="text-align: center">
		
			<!--<select name="cboQuarter" id="cboQuarter" onchange="FillSubject();">-->
			&nbsp;&nbsp; <span class="auto-style5">Select Quarter:</span></td>
			<td class="style8" style="width: 286px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
			<p style="text-align: center">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
			<select name="cboQuarter" size="3" style="width: 255; height: 95;" id="cboQuarter" onclick="Javascript:GetSelectedValue();" class="text-box">
			<option selected="" value="All">All</option>
			<option value="Q1">Quarter 1 [April - June]</option>
			<option value="Q2">Quarter 2 [July - September]</option>
			<option value="Q3">Quarter 3 [October - December]</option>
			<option value="Q4">Quarter 4 [ January - March]</option></select>
			</td>
			<td class="style8" style="width: 239px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
			<p style="text-align: center">
			<input name="btnShowSubject" type="button" class="text-box" value="Show Report" onclick="ReloadWithSubject();">
			</td>
		</tr><br><br>
		<tr>
			<td class="style3" colspan="5" style="border-bottom-style: none; border-bottom-width: medium">
			<table width="100%" cellpadding="0" class="CSSTableGenerator">
				<tr>
					<td style="width: 177px; background-color:#95C23D; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style8">SrNo</td>
					<td style="width: 177px; background-color:#95C23D; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style1">Admission No</td>
					<td style="width: 177px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style1">Class</td>
					<td style="width: 177px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style1">Name</td>
					<td style="width: 177px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">
					Mobile</td>
					<td style="width: 178px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style1">Quarter</td>
					<td style="width: 178px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style10">Send Reminder</td>
					<td style="width: 178px; background-color:#95C23D; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style10">
					Send Reminder2</td>
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
							$TotalTuetionFee = 0;
							$TotalTransportFee = 0;
							$GrandTotal = 0;
							
							while($row = mysql_fetch_assoc($result))
			   				{
			   					$sadmission=$row['sadmission'];
			   					$sclass=$row['sclass'];
			   					$srollno=$row['srollno'];
			   					$sname=$row['sname'];
			   					$routeno=$row['routeno'];
			   					$Qtr=$row['Quarter'];
			   					$smobile=$row['smobile'];			   					
			   					$Display="yes";
			   					/*
			   					if ($Qtr=="Q1")
			   					{
			   						$ssqlChk="select * from `fees` where `sadmission`='$sadmission' and `quarter` in ('Q2','Q3','Q4') and `FinancialYear`='$SelectedFinancialYr'";
			   					}
			   					if ($Qtr=="Q2")
			   					{
			   						$ssqlChk="select * from `fees` where `sadmission`='$sadmission' and `quarter` in ('Q3','Q4') and `FinancialYear`='$SelectedFinancialYr'";
			   					}
			   					if ($Qtr=="Q3")
			   					{
			   						$ssqlChk="select * from `fees` where `sadmission`='$sadmission' and `quarter` in ('Q4') and `FinancialYear`='$SelectedFinancialYr'";
			   					}
			   					$PayableAmtYr=0;
			   					$PaidAmtYr=0;
			   					if ($Qtr=="Q4")
			   					{
			   						$rsPayable=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `feeshead`='TOTAL BILL AMOUNT'");
			   						$rowPayableAmt=mysql_fetch_row($rsPayable);
			   						$PayableAmtYr=$rowPayableAmt[0];
			   						$rsPaid=mysql_query("select sum(`amount`) from `fees_student` where `sadmission`='$sadmission' and `feeshead` in ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT','HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL Third Installment','Advances')");
			   						$rowPaidAmt=mysql_fetch_row($rsPaid);
			   						$PaidAmtYr=$rowPaidAmt[0];
			   					}
			   					$rsChk= mysql_query($ssqlChk);
			   					if(mysql_num_rows($rsChk) > 0)
								{
									$Display="no";		   					
								}
								else
								{
									$Display = "yes";
								}
								
								
								
								
								$ssqlchk="select y.*,(`YearlyHostelPayable`-`HostelFeePaid`-`AdjustedAmtInHostelQ4`) as `HostelPayableInQ4` from
								(
								select x.`sadmission`,x.`YearlyPayable`,x.`YearlyRegularPayable`,x.`RegularFeePaid`,(x.`YearlyRegularPayable`-x.`RegularFeePaid`) as `RegularPayableInQ4`,x.`YearlyHostelPayable`,x.`HostelFeePaid`,x.`Advances`,x.`ConcessionAmt`,IF(`RegularFeePaid`>`YearlyRegularPayable`,(`RegularFeePaid`-`YearlyRegularPayable`),0) as `AdjustedAmtInHostelQ4` from
								(
								SELECT a.`sadmission`,a.`amount` as `YearlyPayable`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `FeesType`='Regular') as `YearlyRegularPayable`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead` in ('FEES FIRST INSTALLMENT','FEES SECOND INSTALLMENT','FEES THIRD INSTALLMENT')) as `RegularFeePaid`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `FeesType`='Hostel') as `YearlyHostelPayable`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead` in ('HOSTEL FIRST INSTALLMENT','HOSTEL SECOND INSTALLMENT','HOSTEL Third Installment')) as `HostelFeePaid`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Advances') as `Advances`,
								(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `FeesType` !='Hostel' and `feeshead`='TOTAL CONCESSION AMOUNT') as `ConcessionAmt`
								FROM `fees_student` as `a` WHERE `sadmission`='$sadmission' and `feeshead`='TOTAL BILL AMOUNT'
								) as `x`
								) as `y`";
								$rsChk1=mysql_query($ssqlchk);
								while($rowCh=mysql_fetch_row($rsChk1))
								{
									$RegularPayableInQ4=$rowCh[4];
									break;
								}
								if($RegularPayableInQ4>0)
								{
									$Display = "yes";
								}
								else
								{
									$Display="no";	
								}
								if($PaidAmtYr >= $PayableAmtYr)
								{
									$Display="no";
								}
			   					
			   					if ($row['PendingTution_Fee'] !='NULL')
			   					{
			   						$PendingTution_Fee=$row['PendingTution_Fee'];
			   					}
			   					else
			   					{
			   						$PendingTution_Fee=0;
			   					}
			   					if ($row['PendingTranportFee'] !='NULL')
			   					{
			   						$PendingTranportFee=$row['PendingTranportFee'];
			   					}
			   					else
			   					{
			   						$PendingTranportFee=0;
			   					}
			   					*/
			   					
			  if ($Display == "yes")
			  {
			   					$TotalTuetionFee = $TotalTuetionFee + $PendingTution_Fee;
			   					$TotalTransportFee = $TotalTransportFee + $PendingTranportFee;
			   					
			   					$Total=$PendingTution_Fee + $PendingTranportFee;
			   					$GrandTotal = $GrandTotal + $Total;
			?>
			
				<tr>
					<td style="border-style:solid; border-width:1px; width: 177px" class="auto-style9"><?php echo $Cnt; ?></td>
					<td style="width: 177px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12"><?php echo $sadmission; ?></td>
					<td style="width: 177px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12"><?php echo $sclass; ?></td>
					<td style="width: 177px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12"><?php echo $sname; ?></td>
					<td style="width: 177px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12">
					<?php echo $smobile; ?></td>
					<td style="width: 178px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12"><?php echo $Qtr; ?></td>
					<td style="width: 178px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" class="style10">
					<input name="BtnReminder<?php echo $Cnt;?>" id="BtnReminder<?php echo $Cnt;?>" type="button" value="Send Remider" onclick="Javascript:ShowReminder('<?php echo $sadmission; ?>','<?php echo $Qtr; ?>','<?php echo $PendingTution_Fee; ?>','<?php echo $PendingTranportFee; ?>','<?php echo $Cnt;?>');">
					</td>
					<td style="width: 178px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" class="style10">
					<input name="BtnReminder1<?php echo $Cnt;?>0" id="BtnReminder1<?php echo $Cnt;?>0" type="button" value="Send Remider" onclick="Javascript:ShowReminder2('<?php echo $sadmission; ?>','<?php echo $Qtr; ?>','<?php echo $PendingTution_Fee; ?>','<?php echo $PendingTranportFee; ?>','<?php echo $Cnt;?>');"></td>
				</tr>
			<?php
			$Cnt = $Cnt+1;
			}
							
							//ob_end_flush(); 
		    				//ob_flush(); 
		    				flush(); 
		    				//ob_start();
							} //END OF WHILE LOOP
			?>
				<!--
				<tr>
					<td class="style11" colspan="5" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">Total (INR)</td>
					<td style="width: 178px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style12"><?php echo $TotalTuetionFee; ?>d</td>
				</tr>
				-->
			<?php				
						}//END OF IF CONDITION
					
				} // END OF IF CONDITION
			?>			
			
			</table></td>
		</tr>
		<!--
		<tr>
			<td class="style8" colspan="5" style="border-style: none; border-width: medium">
			<input type="hidden" name="Qry" id="Qry" value="<?php echo $ssql; ?>">
			<input name="Export" type="button" value="Export To Excel" onclick="Javascript:Validate();" class="text-box"></td>
		</tr>
		-->
	</form>
	</table>
	<p>&nbsp;</p>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>

</body>

</html>