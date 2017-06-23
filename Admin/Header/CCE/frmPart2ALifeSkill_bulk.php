<?php 
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
	session_start();
	//$sclass = $_SESSION['Class'];
	$sclass= $_REQUEST['Class'];
	$IndicatorType=$_REQUEST["IndicatorType"];
	$TestType=$_REQUEST["TestType"];
	
	$rsSt=mysql_query("select `sadmission`,`sname`,`sclass`,`srollno` from `student_master` where `sclass`='$sclass' order by CAST(`srollno` AS UNSIGNED) Limit 2");
	
	$ArrStudent=1;
	$TotalStudentCount=0;
	while($rowSt = mysql_fetch_row($rsSt))
	{
		$TotalStudentCount=$TotalStudentCount+1;
		$ArrSAdmission[$TotalStudentCount]=$rowSt[0];
		$ArrSName[$TotalStudentCount]=$rowSt[1];
		$ArrSClass[$TotalStudentCount]=$rowSt[2];
		$ArrSRollNo[$TotalStudentCount]=$rowSt[3];		
	}
	
	
	$sqlRcpt = "SELECT distinct `Indicator` FROM  `reportcard_indicators_6to10` where `Status`='1' and `Skill`='".$IndicatorType."' and `Class` in (select `MasterClass` from `class_master` where `class`='$sclass')";
	$rs = mysql_query($sqlRcpt);

?>

<script language="javascript">
	function fnlGetGrade(cnt,colno)
	{
		//alert(cnt);
		ctrlname="txtPoint" + cnt + "_" + colno;
		Gradectrl="txtGrade" + cnt + "_" + colno;
		ctrlDescOther="txtDescriptionOther" + cnt + "_" + colno;
		
		ctrlDescription="cboDescription" + cnt + "_" + colno;
		//cboDescriptionVarName = "document.frmLifeSkill.cboDescription" + String(cnt) + "_" + String(colno);

		//alert(document.getElementById(ctrlname).value);
		if(isNaN(document.getElementById(ctrlname).value)==true)
		{
			alert("Only numberic value is accepted!");
			document.getElementById(ctrlname).value="";
			return;
		}
		else
		{
			if (parseInt(document.getElementById(ctrlname).value) < 1 || parseInt(document.getElementById(ctrlname).value)>5)
			{
				alert ("Only values from 1 to 5 is acceptable in point");
				document.getElementById(Gradectrl).value="";
				document.getElementById(ctrlname).value="";
				document.getElementById(ctrlDescOther).value="";
				document.getElementById(ctrlDescOther).style.display="none";
				//removeAllOptions(cnt);
				//addOption(cnt,"Select One","Select One")
				
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
			        	/*
			        	arr_row=rows.split(",");
			        	document.getElementById("txtAdmissionFees").value=arr_row[4];
			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						CalculatTotal();
						*/
						arr_row=rows.split(",");
						
						if (arr_row[0] != 0)													
						{
							Grade=arr_row[0];
							document.getElementById(Gradectrl).value =Grade.replace("﻿","");
							
			        		//addOption(cnt,colno,"Type your own","Type your own")
						}
						else
						{
							document.getElementById(Gradectrl).value="";
							
						}
			        }
		      }
			var submiturl="GetGradePart2LifeSkill.php?Point=" + escape(document.getElementById(ctrlname).value) + "&indicater_type=LifeSkills&class=" + document.getElementById("txtClass").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	
	function fnlShowHideOtherTextBox(cnt,colno)
	{
		ctrlName="txtDescriptionOther" + cnt + "_" + colno;
		ctrlName1="cboDescription" + cnt + "_" + colno;
		if (document.getElementById(ctrlName1).value == "Type your own")
		{
			document.getElementById(ctrlName).style.display="";	
		}
		else
		{
			document.getElementById(ctrlName).value="";
			document.getElementById(ctrlName).style.display="none";
		}		
	}
	
	function removeAllOptions(cnt,colno)
	{
		ctrlName="cboDescription" + cnt + "_" + colno;
		
		//selectbox="document.frmLifeSkill.cboDescription" + selectbox;

		var i;
		for(i=document.getElementById(ctrlName).options.length-1;i>=0;i--)
		{
			document.getElementById(ctrlName).remove(i);
		}
	}
	function addOption(cnt,colno,text,value )
	{
		ctrlName="cboDescription" + cnt + "_" + colno;
		
		var optn = document.createElement("OPTION");
		optn.text = text;
		optn.value = value;
		document.getElementById(ctrlName).options.add(optn);
	}
	function Validate()
	{	
		var TotalRows=document.getElementById("TotalCnt").value;

		var TotalStudentColumn=document.getElementById("hTotalStudentCount").value;

		for(var cnt=1;cnt <= parseInt(TotalRows);cnt++)
		{
			for(var colnum=1;colnum <= parseInt(TotalStudentColumn);colnum++)
			{
				ctrlname="txtPoint" + cnt + "_" + colnum;
				ctrlDesc="cboDescription" + cnt + "_" + colnum;
				ctrlDescOther="txtDescriptionOther" + cnt + "_" + colnum;
				
				if(document.getElementById(ctrlDesc).value=="Select One")
				{
					alert("Indicator Description is mandatory");
					return;
				}
				if(document.getElementById(ctrlname).value == "")
				{
					alert("All the Descriptive Indicators are mandatory!");
					return;
				}
				if(isNaN(document.getElementById(ctrlname).value)==true)
				{
					alert("All the points should be numeric");
					return;
				}
				/*
				if(document.getElementById("txtPoint"+i).value=="")
				{
					document.getElementById("txtPoint"+i).style.borderColor="red";
				}
				if(document.getElementById("txtGrade"+i).value=="")
				{
					document.getElementById("txtGrade"+i).style.borderColor="red";
				}
				*/

			}
		}
		//alert("Ok");
		//return;
		document.getElementById("frmLifeSkill").submit();
		return;
		
		/*
		
		for(var cnt=1;cnt <= parseInt(TotalRows);cnt++)
		{
			for(var colnum=1;colnum <= parseInt(TotalStudentColumn);colnum++)
			{
			ctrlname="txtPoint" + cnt + "_" + colnum;
			ctrlDesc="cboDescription" + cnt + "_" + colnum;
			ctrlDescOther="txtDescriptionOther" + cnt + "_" + colnum;
			
			
			
			if(document.getElementById(ctrlname).value == "")
			{
				alert("All the Descriptive Indicators are mandatory!");
				return;
			}
			if(isNaN(document.getElementById(ctrlname).value)==true)
			{
				alert("All the points should be numeric");
				return;
			}
			
			 //Temporary commented for testing....
			
			if(document.getElementById(ctrlDesc).value=="Select One")
			{
				alert("All the Descriptive Indicators's Descriptions are mandatory!");
				return;
			}
			if(document.getElementById(ctrlDesc).value == "Type your own")
			{
				if (document.getElementById(ctrlDescOther).value == "")
				{
					alert("All the Descriptive Indicators's Descriptions are mandatory!");
					return;
				}
			}				
		}
		*/
		
		
		return;
		document.getElementById("frmLifeSkill").submit();
		return;
	}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">

<link rel="stylesheet" type="text/css" href="../css/style.css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Part - 1 Academic Performance</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
}
.style4 {
	font-family: Arial;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style6 {
	font-family: Cambria;
	font-size: large;
	border: 1px solid #000000;
}
.style7 {
	font-size: small;
}
.style8 {
	border: 1px solid #000000;
	font-family: Cambria;
	font-size: 12pt;
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style22 {
	font-family: Cambria;
}
.style23 {
	font-family: Cambria;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<table style="border-width:0px; width: 100%" class="style1">
	<tr>
		<td class="style12" style="border-style:none; border-width:medium; ">
		<b>Co-Scholastic Indicator Upload</b></td>
	</tr>
</table>
<br>
<?php
if ($Msg !="")
{
echo $Msg;
exit();
}
?>
<hr>
<p>&nbsp;</p>
<div style="width: 100%;overflow: scroll;">
<table style="width: 100%; border-right-width:0px" class="style1">
	<tr>
		<td class="style6" style="height: 24px" colspan="<?php echo $TotalStudentCount+3;?>"><strong>
		<font size="3">Part - 2 Co-Scholastic Areas</font><span class="style7">
		(<?php echo $IndicatorType;?>)
		</span></strong><span class="style7">(to be assessed on a 5 point scale 
		once in a session)</span></td>
	</tr>
	<form name="frmLifeSkill" id="frmLifeSkill" method="post" action="SubmitfrmLifeSkill.php">
	<input type="hidden" name="hTotalStudentCount" id="hTotalStudentCount" value="<?php echo $TotalStudentCount;?>">
	<input type="hidden" name="txtTestType" id="txtTestType" value="<?php echo $TestType;?>">
	<span class="style22">
	<input type="hidden" name="txtClass" id="txtClass" value="<?php echo $sclass; ?>">
		<input type="hidden" name="txtIndicaterType" id="txtIndicaterType" value="<?php echo $IndicatorType; ?>">
	</span>
	<tr>
		<td class="style8" style="width: 212px; height: 14px"><strong>S. No.</strong></td>
		<td class="style3" style="height: 14px; width: 156px;"><strong>Descriptive Indicators</strong></td>
		<?php
		for($i=1;$i<=$TotalStudentCount;$i++)
		{
		?>
		<td class="style3" style="height: 14px; width: 797px; border-right-color:#000000; border-right-width:1px"><b><?php echo $ArrSName[$i];?>-<?php echo $ArrSRollNo[$i];?></b>
		<input type="hidden" name="hsadmission<?php echo $i;?>" id="hsadmission<?php echo $i;?>" value="<?php echo $ArrSAdmission[$i];?>">
		<input type="hidden" name="hstudentname<?php echo $i;?>" id="hstudentname<?php echo $i;?>" value="<?php echo $ArrSName[$i];?>">
		<input type="hidden" name="hstudentclass<?php echo $i;?>" id="hstudentclass<?php echo $i;?>" value="<?php echo $ArrSClass[$i];?>">
		<input type="hidden" name="hstudentrollno<?php echo $i;?>" id="hstudentrollno<?php echo $i;?>" value="<?php echo $ArrSRollNo[$i];?>">
		</td>
		<?php
		}
		?>
		</tr>
	<?php
		$ccnt=1;
		while($row = mysql_fetch_row($rs))
		{
			$descriptiveIndicater=$row[0];
			
	?>
	<span class="style22">
	<input type="hidden" name="txtDescriptiveIndicater<?php echo $ccnt;?>" id="txtDescriptiveIndicater<?php echo $ccnt;?>" value="<?php echo $descriptiveIndicater;?>">
	</span>
	<tr>
		<td class="style23" style="width: 212px; height: 50px; border-right-style:none; border-right-width:medium">&nbsp;</td>
		<td class="style23" style="height: 50px; width: 156px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium">&nbsp;</td>
		<td class="style4" style="width: 797px; height: 50px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" valign="top">
		&nbsp;</td>
		</tr>
	
	<tr>
		<td class="style23" style="width: 212px; height: 50px"><b>
		<font size="3"><?php if($ccnt<10) {?>0<?php }?><?php echo $ccnt; ?></font></b></td>
		<td class="style23" style="height: 50px; width: 156px;"><b>
		<font size="3"><?php echo $descriptiveIndicater;?> :</font></b><font size="3" face="Cambria"><input type="hidden" name="hDiscriptiveIndicator<?php echo $ccnt;?>" id="hDiscriptiveIndicator<?php echo $ccnt;?>" value="<?php echo $descriptiveIndicater;?>" style="font-weight: 700"></font></td>
		<?php
		for($i=1;$i<=$TotalStudentCount;$i++)
		{
			$StAdmissionID=$ArrSAdmission[$i];
			$rsSubmittedDetail=mysql_query("select `gradepoint`,`grade`,`indicatordescription` from `reportcard_interim` where `sadmission`='$StAdmissionID' and `indicatortype`='$IndicatorType' and `descriptiveindicator`='$descriptiveIndicater'");
			$rsDesc=mysql_query("select distinct `Indicator_Description` from `reportcard_indicators_6to10` where `Skill`='$IndicatorType' and `Indicator`='$descriptiveIndicater'");
			
				$Submittedgradepoint="";
				$Submittedgrade="";
				$Submittedindicatordescription="";
			while($rowS = mysql_fetch_row($rsSubmittedDetail))
			{
				$Submittedgradepoint=$rowS[0];
				$Submittedgrade=$rowS[1];
				$Submittedindicatordescription=$rowS[2];
			}

		?>
		<td class="style4" style="width: 797px; height: 50px; border-right-color:#000000; border-right-width:1px" valign="top">
		<p style="text-align: left"><font face="Cambria"><b>Point</b> :
		<input name="txtPoint<?php echo $ccnt;?>_<?php echo $i;?>" id="txtPoint<?php echo $ccnt;?>_<?php echo $i;?>" type="text" value="<?php echo $Submittedgradepoint;?>" class="text-box" onkeyup="Javascript:fnlGetGrade('<?php echo $ccnt;?>','<?php echo $i;?>');"">&nbsp;&nbsp;&nbsp;
		<b>Grade:</b>&nbsp;
		<input name="txtGrade<?php echo $ccnt;?>_<?php echo $i;?>" id="txtGrade<?php echo $ccnt;?>_<?php echo $i;?>" type="text" value="<?php echo $Submittedgrade;?>" readonly="readonly" class="text-box"></font></p>
		<p class="style22" style="text-align: left">&nbsp;<p class="style22" style="text-align: left">
		<font face="Cambria"><b>Indicator</b>&nbsp;&nbsp; <select name="cboDescription<?php echo $ccnt;?>_<?php echo $i;?>" id="cboDescription<?php echo $ccnt;?>_<?php echo $i;?>" class="text-box" onchange="Javascript:fnlShowHideOtherTextBox('<?php echo $ccnt;?>','<?php echo $i;?>');">
		<option selected="" value="Select One">Select One</option>
		<?php
		while($rowD = mysql_fetch_row($rsDesc))
		{
			$IndiDesc=$rowD[0];
		?>
		<option value="<?php echo $IndiDesc;?>" <?php if($Submittedindicatordescription==$IndiDesc) {?>selected="selected" <?php } ?> ><?php echo $IndiDesc;?></option>
		<?php
		}
		?>
		<option value="Type your own" <?php if($Submittedindicatordescription=="Type your own") {?>selected="selected" <?php } ?> >Type your own</option>
		</select></font> <font face="Cambria">
		<input type="text" name="txtDescriptionOther<?php echo $ccnt;?>_<?php echo $i;?>" id="txtDescriptionOther<?php echo $ccnt;?>_<?php echo $i;?>" value="" style="display: none;"></font></td>
		<?php
		}
		?>
		</tr>
	
	<?php
		$ccnt=$ccnt+1;
	}
	?>
	<span class="style22">
	<input type="hidden" name="TotalCnt" id="TotalCnt" value="<?php echo $ccnt-1;?>">
	</span>
	<tr>
		<td class="style23" style="height: 50px" colspan="<?php echo $TotalStudentCount+3;?>">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
	</table>
</div>
</body>

</html>