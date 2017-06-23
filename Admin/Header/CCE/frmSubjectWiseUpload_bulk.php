<?php 
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
	session_start();
	$sclass= $_REQUEST['Class'];
	$Subject=$_REQUEST["Subject"];
	$ExamType=$_REQUEST["txtTestType"];

	$rsSt=mysql_query("select `sadmission`,`sname`,`sclass`,`srollno` from `student_master` where `sclass`='$sclass' order by CAST(`srollno` AS UNSIGNED)");
	
	
	
	$rs= mysql_query($ssql);
	
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
	
	
	$sqlRcpt = "SELECT distinct `Indicator` FROM  `reportcard_indicators_1to5` where `Status`='1' and `Subject`='".$Subject."' and `Class` in (select `MasterClass` from `class_master` where `class`='$sclass')";
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
		cboDescriptionVarName = "document.frmLifeSkill.cboDescription" + String(cnt) + "_" + String(colno);

		//alert(document.getElementById(ctrlname).value);
					
					if (parseInt(document.getElementById(ctrlname).value) < 1 || parseInt(document.getElementById(ctrlname).value)>5)
					{
						alert ("Only values from 1 to 5 is acceptable in point");
						document.getElementById(Gradectrl).value="";
						document.getElementById(ctrlname).value="";
						//alert(document.getElementById(ctrlDescription).value);
						//document.getElementById(ctrlDescOther).value="";
						//document.getElementById(ctrlDescOther).style.display="none";
						//removeAllOptions(cnt);
						//addOption(cnt,"Select One","Select One")
						
						return;
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
			        	
						arr_row=rows.split("~");
						
						if (arr_row[0] != 0)													
						{
							Grade=arr_row[0];
							
							//GradeDescription=arr_row[1];
							document.getElementById(Gradectrl).value =Grade.replace("﻿","");
							
							removeAllOptions(cnt,colno);
							addOption(cnt,colno,"Select One","Select One")
							for(i=1;i<arr_row.length;i++)
							{
								addOption(cnt,colno,arr_row[i],arr_row[i])
							}
							
							var rendno=Math.floor((Math.random() * arr_row.length) + 1);
							document.getElementById("cboDescription" + cnt + "_" + colno).selectedIndex=rendno;
							//document.getElementById(ctrlDescription).value=GradeDescription;
			        		//addOption(cnt,colno,"Type your own","Type your own")
						}
						else
						{
							document.getElementById(Gradectrl).value="";
							
						}
			        }
		      }
		    
			var submiturl="GetGradeSubjectWiseUpload.php?Point=" + escape(document.getElementById(ctrlname).value) + "&Subject=" + escape(document.getElementById("txtSubject").value) + "&class=" + document.getElementById("txtClass").value;
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
		//alert(optn.value);
		document.getElementById(ctrlName).options.add(optn);
	}
	function Validate()
	{	
		var TotalRows=document.getElementById("TotalCnt").value;

		var TotalStudentColumn=document.getElementById("hTotalStudentCount").value;
		//alert(document.getElementById("txtPoint1_1").value);
		for(var cnt=1;cnt <= parseInt(TotalRows);cnt++)
		{
			for(var colnum=1;colnum <= parseInt(TotalStudentColumn);colnum++)
			{
				ctrlname="txtPoint" + cnt + "_" + colnum;
				ctrlDesc="cboDescription" + cnt + "_" + colnum;
				ctrlDescOther="txtDescriptionOther" + cnt + "_" + colnum;
				
				/*
					if(isNaN(document.getElementById(ctrlname).value)==true)
					{
						alert("Only numberic value is accepted!");
						document.getElementById(ctrlname).value="";
						return;
					}				
		

				
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
				*/
				if(isNaN(document.getElementById(ctrlname).value)==true)
				{
					alert("All the points should be numeric");
					return;
				}
				
			}
		}
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
	font-size: small;
	border: 1px solid #000000;
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
		<b>Subject wise marks upload</b></td>
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
		<td class="style6" style="height: 24px" colspan="<?php echo $TotalStudentCount+3;?>">(To be assessed on a 5 point scale 
		once in a session)</td>
	</tr>
	<form name="frmLifeSkill" id="frmLifeSkill" method="post" action="SubmitfrmLifeSkill.php">
	<input type="hidden" name="hTotalStudentCount" id="hTotalStudentCount" value="<?php echo $TotalStudentCount;?>">
	<input type="hidden" name="hExamType" id="hExamType" value="<?php echo $ExamType;?>">
	<input type="hidden" name="txtTestType" id="txtTestType" value="<?php echo $ExamType;?>">

	<span class="style22">
	<input type="hidden" name="txtClass" id="txtClass" value="<?php echo $sclass; ?>">
		<input type="hidden" name="txtSubject" id="txtSubject" value="<?php echo $Subject; ?>">
		<input type="hidden" name="txtIndicaterType" id="txtIndicaterType" value="<?php echo $Subject; ?>">
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
			$rsSubmittedDetail=mysql_query("select `gradepoint`,`grade`,`indicatordescription` from `reportcard_interim` where `sadmission`='$StAdmissionID' and `indicatortype`='$Subject' and `descriptiveindicator`='$descriptiveIndicater'");
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
			if($Submittedgrade !="")
			{
				$ssql="SELECT distinct `Description` FROM `reportcard_indicator_GradeDescription_1to5` a  where `status`='1' and `Grade`='$Submittedgrade' and `Subject`='$Subject'";
				//echo $ssql;
				//exit();
				$rsGD= mysql_query($ssql);				
			}

		?>
		<td class="style4" style="width: 797px; height: 50px; border-right-color:#000000; border-right-width:1px" valign="top">
		<p style="text-align: left"><font face="Cambria"><b>Point</b> :
		<input name="txtPoint<?php echo $ccnt;?>_<?php echo $i;?>" id="txtPoint<?php echo $ccnt;?>_<?php echo $i;?>" type="text" value="<?php echo $Submittedgradepoint;?>" class="text-box" onkeyup="Javascript:fnlGetGrade('<?php echo $ccnt;?>','<?php echo $i;?>');"">&nbsp;&nbsp;&nbsp;
		<b>Grade:</b>&nbsp;
		<input name="txtGrade<?php echo $ccnt;?>_<?php echo $i;?>" id="txtGrade<?php echo $ccnt;?>_<?php echo $i;?>" type="text" value="<?php echo $Submittedgrade;?>" readonly="readonly" class="text-box"></font></p>
		<p class="style22" style="text-align: left">&nbsp;<p class="style22" style="text-align: left">
		<font face="Cambria"><b>Indicator</b>&nbsp;&nbsp; 
		<select name="cboDescription<?php echo $ccnt;?>_<?php echo $i;?>" id="cboDescription<?php echo $ccnt;?>_<?php echo $i;?>" class="text-box">
		<option selected="" value="Select One">Select One</option>
		<?php
		if($Submittedgradepoint !="")
		{
			while($rowGD = mysql_fetch_row($rsGD))
				{
					$GradeDesc=$rowGD[0];
		?>
		<option <?php if($Submittedindicatordescription==$GradeDesc) {?>selected="" <?php } ?> value="<?php echo $GradeDesc;?>"><?php echo $GradeDesc;?></option>
		<?php
				}
		}
		?>
		</select>
		</font> <font face="Cambria">
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