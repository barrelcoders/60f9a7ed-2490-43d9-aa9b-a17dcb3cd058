<?php include '../../connection.php';?>

<?php
session_start();

if ($_SESSION['sadmission'] == "")
{
	$_SESSION['sadmission']=$_REQUEST["txtAdmissionId"];
	$_SESSION['Name']=$_REQUEST["txtStudentName"];
	$_SESSION['Class']=$_REQUEST["cboClass"];
	$_SESSION['RollNo']=$_REQUEST["txtRollNo"];

}

//echo $_SESSION['sadmission']."/".$_SESSION['Name']."/".$_SESSION['Class']."/".$_SESSION['RollNo'];

	//$AdmissionId = $_REQUEST["txtAdmissionId"];
	$AdmissionId =$_SESSION['sadmission'];
$ssqlChk="select * from `reportcard_interim` where `sadmission`='$AdmissionId' and `indicatortype`='Scholastic Areas'";
$rsChk = mysql_query($ssqlChk);
if (mysql_num_rows($rsChk) > 0)
{
	$Msg="<br><br><center>Step 1 (Scholastic Areas) has been uploaded!";
}

	$sclass=$_SESSION['Class'];
	$sqlRcpt = "SELECT distinct `DescriptiveIndicator` FROM  `reportcard_education_visual_arts` where `status`='1' and `indicatortype`='Scholastic Areas' and `class`='$sclass'";
	
	
	$rs = mysql_query($sqlRcpt);

?>

<script language="javascript">
	function fnlGetGrade(cnt)
	{

		//alert(cnt);
		ctrlname="txtPoint" + cnt;
		Gradectrl="txtGrade" + cnt;
		ctrlDescOther="txtDescriptionOther" + cnt;
		ctrlSuggestiveActivities="cboSuggestiveActivities" + cnt;

		
		ctrlDescription="cboDescription" + cnt;
		cboDescriptionVarName = "document.frmLifeSkill.cboDescription" + String(cnt);

		//alert(document.getElementById(ctrlname).value);
		if(document.getElementById(ctrlname).value=="")
		{
			document.getElementById(ctrlSuggestiveActivities).value="Select One";
			document.getElementById(ctrlDescOther).value="";
			document.getElementById(ctrlDescOther).style.display="none";
			removeAllOptions(cnt);
			addOption(cnt,"Select One","Select One")
			
		}
		if(isNaN(document.getElementById(ctrlname).value)==true)
		{
			alert("Only numberic value is accepted!");
			document.getElementById(ctrlname).value="";
			document.getElementById(ctrlSuggestiveActivities).value="Select One";
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
				removeAllOptions(cnt);
				addOption(cnt,"Select One","Select One")
				document.getElementById(ctrlSuggestiveActivities).value="Select One";
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
							removeAllOptions(cnt);
							//removeAllOptions(document.frmLifeSkill.cboDescription1);
							
							addOption(cnt,"Select One","Select One")
							for(var row_count=1;row_count<arr_row.length;++row_count)
			        		{
			        			addOption(cnt,arr_row[row_count],arr_row[row_count])			        			 
			        		}
			        		addOption(cnt,"Type your own","Type your own")
						}
						else
						{
							document.getElementById(Gradectrl).value="";
							removeAllOptions(cnt);
							addOption(cnt,"Select One","Select One")
							document.getElementById(ctrlSuggestiveActivities).value="Select One";
							
						}
			        }
		      }
			var submiturl="GetGradePart2LifeSkill.php?Point=" + escape(document.getElementById(ctrlname).value) + "&indicater_type=ScholasticAreas&class=" + document.getElementById("txtClass").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	
	function fnlShowHideOtherTextBox(cnt)
	{
		ctrlName="txtDescriptionOther" + cnt;
		ctrlName1="cboDescription" + cnt;
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
	
	function removeAllOptions(cnt)
	{
		ctrlName="cboDescription" + cnt;
		
		//selectbox="document.frmLifeSkill.cboDescription" + selectbox;

		var i;
		for(i=document.getElementById(ctrlName).options.length-1;i>=0;i--)
		{
			document.getElementById(ctrlName).remove(i);
		}
	}
	function addOption(cnt,text,value )
	{
		ctrlName="cboDescription" + cnt;
		
		var optn = document.createElement("OPTION");
		optn.text = text;
		optn.value = value;
		document.getElementById(ctrlName).options.add(optn);
	}
	function Validate()
	{
		//alert(document.getElementById("TotalCnt").value);
		TotalControl=document.getElementById("TotalCnt").value;
		
		var selectedcounter=0;
		for(var cnt=1;cnt <= TotalControl;cnt++)
		{
			ctrlname="txtPoint" + cnt;
			ctrlDesc="cboDescription" + cnt;
			ctrlDescOther="txtDescriptionOther" + cnt;
			ctrlSuggestiveActivities="cboSuggestiveActivities" + cnt;
			
			/*
			if(document.getElementById(ctrlname).value == "")
			{
				alert("All the Descriptive Indicators are mandatory!");
				return;
			}
			*/
			if(document.getElementById(ctrlname).value != "")
			{
				if(isNaN(document.getElementById(ctrlname).value)==true)
				{
					alert("All the points should be numeric");
					return;
				}
				if (document.getElementById(ctrlSuggestiveActivities).value=="Select One")
				{
					alert ("Please select suggestive activities if you entered point!");
					return;
				}
				if(document.getElementById(ctrlDesc).value=="Select One")
				{
					alert("Descriptive Indicators's Descriptions are mandatory!");
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
				selectedcounter=selectedcounter+1;
			}					
		}
		if (selectedcounter>2)
		{
			alert("As per C.B.S.E.(CCE) guidelines health and physical education can be assessed only on two parameters!Please check");
			return;
		}
		document.getElementById("frmLifeSkill").submit();
		return;
	}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Part - 1 Academic Performance</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style7 {
	font-size: small;
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style13 {
	font-family: Cambria;
}
.style15 {
	font-size: 12pt;
}
.style16 {
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #9CE79C;
}
.style18 {
	font-family: Cambria;
	text-decoration: underline;
}
.style19 {
	text-decoration: underline;
}
.style20 {
	text-decoration: none;
}
.style21 {
	color: #000000;
}
.style23 {
	border: 1px solid #000000;
}
.style24 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
}
.style25 {
	text-align: center;
	border: 1px solid #000000;
}
.style26 {
	text-align: center;
	border: 1px solid #000000;
	font-family: Cambria;
}
</style>
</head>

<body>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style16" style="width: 184px">Step 1 <br>
		(Scholastic Areas)</td>
		<td class="style12" style="width: 185px">
		<a href="frmPart2ALifeSkill.php" class="style20"><span class="style21">
		Step 2 <br>
		(Co-Scholastic -Life Skills)</span></a></td>
		<td class="style12" style="width: 185px">
		<a href="frmPart2DAttitudeAndValues.php" class="style20">
		<span class="style21">Step 3 <br>
		(Co-Scholastic- Attitude)</span></a></td>
		<td class="style12" style="width: 185px">
		<a href="frmPart3ACoScholasticActivities.php" class="style20">
		<span class="style21">Step 4 <br>
		Co-Scholastic Activities</span></a></td>
		<td class="style12" style="width: 185px">
		<a href="frmPart3BHealthAndPhysical.php" class="style20">
		<span class="style21">Step 5 <br>
		Health &amp; Physical Edu.</span></a></td>
		<td class="style12" style="width: 185px">Step 6 <br>
		Self Awareness</td>
	</tr>
</table>
<?php
//if ($Msg !="")
//{
//	echo $Msg;
//	exit();
//}

?>
<br>
<table style="width: 100%" class="style24">
	<tr>
		<td class="style23" colspan="6"><strong>
		<span class="style15">Part - 1(B) 
		Scholastic Areas</span><span class="style7">
		</span></strong><span class="style7">(any two be assessed on a 5 point scale 
		once in a session)</span></td>
	</tr>
	<tr>
		<td class="style25" style="width: 88px"><strong>S. No.</strong></td>
		<td class="style25" style="width: 230px"><strong>Descriptive Indicators</strong></td>
		<td class="style25" style="width: 230px"><strong>	Suggestive Activities</strong></td>
		<td class="style25" style="width: 230px"><strong>Point</strong></td>
		<td class="style25" style="width: 230px"><strong>Grade</strong></td>
		<td class="style25" style="width: 230px"><strong>Description</strong></td>
	</tr>
	<form name="frmLifeSkill" id="frmLifeSkill" method="post" action="SubmitfrmLifeSkill.php">
	<input type="hidden" name="txtClass" id="txtClass" value="<?php echo $sclass; ?>">
	<input type="hidden" name="txtIndicaterType" id="txtIndicaterType" value="Scholastic Areas">
	<?php
		$ccnt=1;
		
		while($row = mysql_fetch_row($rs))
		{
			$descriptiveIndicater=$row[0];
				
				$sql1 = "SELECT distinct `subindicator` FROM  `reportcard_education_visual_arts` where `status`='1' and `indicatortype`='Scholastic Areas' and `class`='$sclass' and `DescriptiveIndicator`='$descriptiveIndicater'";
				$rs1 = mysql_query($sql1);
		
	?>
	<input type="hidden" name="txtDescriptiveIndicater<?php echo $ccnt;?>" id="txtDescriptiveIndicater<?php echo $ccnt;?>" value="<?php echo $descriptiveIndicater;?>">
	<tr>
		<td class="style26" style="width: 88px"><?php if($ccnt<10) {?>0<?php }?><?php echo $ccnt; ?></td>
		<td class="style23" style="width: 230px"><font size="3"><?php echo $descriptiveIndicater;?> :</font></td>
		<td class="style23" style="width: 230px">
		<select name="cboSuggestiveActivities<?php echo $ccnt;?>" id="cboSuggestiveActivities<?php echo $ccnt;?>">
		<option selected="" value="Select One">Select One</option>
		<?php
			while($row1 = mysql_fetch_row($rs1))
			{
				$SubIndicater=$row1[0];
		?>
		<option value="<?php echo $SubIndicater;?>"><?php echo $SubIndicater;?></option>
		<?php
			}
		?>
		</select>
		</td>
		<td class="style23" style="width: 230px"><input name="txtPoint<?php echo $ccnt;?>" id="txtPoint<?php echo $ccnt;?>" type="text" onkeyup="Javascript:fnlGetGrade('<?php echo $ccnt;?>');"></td>
		<td class="style23" style="width: 230px"><input name="txtGrade<?php echo $ccnt;?>" id="txtGrade<?php echo $ccnt;?>" type="text" readonly="readonly"></td>
		<td class="style23" style="width: 230px"><select name="cboDescription<?php echo $ccnt;?>" id="cboDescription<?php echo $ccnt;?>" onchange="Javascript:fnlShowHideOtherTextBox('<?php echo $ccnt;?>');">
		<option selected="" value="SelectOne">SelectOne</option>
		</select>
		<input type="text" name="txtDescriptionOther<?php echo $ccnt;?>" id="txtDescriptionOther<?php echo $ccnt;?>" value="" style="display: none;"></td>
	</tr>
	<?php
		$ccnt=$ccnt+1;
	  }
	?>
	<input type="hidden" name="TotalCnt" id="TotalCnt" value="<?php echo $ccnt-1;?>">	
	<tr>
		<td class="style25" colspan="6">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

<p class="style18"><strong>Suggestive Activities:</strong></p>
<p class="style13"><span class="style19"><strong>Work Education:</strong></span> 
Cookery Skills, Preparation of stationary items, Tie &amp; Dye and screen printing, 
preparing paper out of waste paper, Hand Embroidery, Running a book bank, Repair 
and maintenance of domestic electrical gadgets, Computer operation and 
maintenance, Photography etc.</p>
<p class="style13"><span class="style19"><strong>Visual &amp; Performing Arts:
</strong></span>Music (Vocal, Instrumental), Dance, Drama, Drawing, Painting 
Craft,Puppetary </p>

</body>

</html>