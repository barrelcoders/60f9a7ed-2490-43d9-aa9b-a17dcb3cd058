<?php include '../../connection.php';?>

<?php
	session_start();
	$sclass = $_SESSION['Class'];
	
$AdmissionId =$_SESSION['sadmission'];
$ssqlChk="select * from `reportcard_interim` where `sadmission`='$AdmissionId' and `indicatortype`='selfawareness'";
$rsChk = mysql_query($ssqlChk);
if (mysql_num_rows($rsChk) > 0)
{
	$Msg="<br><br><center>Step 6 Self Awareness has been uploaded!";
}

	//$sclass="1A";
	$sqlRcpt = "SELECT distinct `DescriptiveIndicator` FROM  `reportcard_selfawareness` where `status`='1' and `indicatortype`='selfawareness' and `class`='$sclass'";
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
			var submiturl="GetGradePart2LifeSkill.php?Point=" + escape(document.getElementById(ctrlname).value) + "&indicater_type=HealthAndPhysical&class=" + document.getElementById("txtClass").value;
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
			
			ctrlDesc="txtDescription" + cnt;
			
			if(document.getElementById(ctrlDesc).value == "")
			{
				alert("All Descriptive Indicaters are mandatory!");
				return;			
			}					
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
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 2.06437e+025;
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
	font-size: 2.06437e+025;
}
.style9 {
	font-family: Cambria;
	font-size: 11pt;
	text-align: left;
	border: 1px solid #000000;
}
.style10 {
	text-align: left;
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style13 {
	font-family: Cambria;
}
.style14 {
	font-family: Cambria;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style15 {
	font-size: 12pt;
}
.style16 {
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #9CE79C;
}
.style17 {
	font-family: Cambria;
	font-size: 12pt;
	text-align: center;
	border: 1px solid #000000;
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
.style22 {
	margin-left: 0px;
}
</style>
</head>

<body>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style12" style="width: 184px">
		<a href="frmPart1BScholasticAreas.php" class="style20">
		<span class="style21">Step 1 <br>
		(Scholastic Areas)</span></a></td>
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
		<td class="style16" style="width: 185px">Step 6 <br>
		Self Awareness</td>
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
<table style="width: 100%" class="style1">
	<tbody class="style10">
	<tr>
		<td class="style6" style="height: 24px" colspan="3"><strong>
		<span class="style15">Part - 1(B) 
		Scholastic Areas</span><span class="style7">
		</span></strong><span class="style7">(any two be assessed on a 5 point scale 
		once in a session)</span></td>
	</tr>
	<form name="frmLifeSkill" id="frmLifeSkill" method="post" action="SubmitfrmLifeSkill.php">
	<span class="style13">
	<input type="hidden" name="txtClass" id="txtClass" value="<?php echo $sclass; ?>">
	<input type="hidden" name="txtIndicaterType" id="txtIndicaterType" value="Self Awareness">
	</span>
	<tr>
		<td class="style8" style="height: 18px"><strong>S. No.</strong></td>
		<td class="style3" style="height: 18px; "><strong>Descriptive Indicators</strong></td>
		<td class="style3" style="height: 18px; "><strong>Description</strong></td>
	</tr>
	<?php
		$ccnt=1;
		while($row = mysql_fetch_row($rs))
		{
			$descriptiveIndicater=$row[0];
	?>
	<span class="style13">
	<input type="hidden" name="txtDescriptiveIndicater<?php echo $ccnt;?>" id="txtDescriptiveIndicater<?php echo $ccnt;?>" value="<?php echo $descriptiveIndicater;?>">
	</span>
	<tr>
		<td class="style17" style="height: 50px"><?php if($ccnt<10) {?>0<?php }?><?php echo $ccnt; ?></td>
		<td class="style9" style="height: 50px; "><font size="3"><?php echo $descriptiveIndicater;?> :</font></td>
		<td class="style14" style="height: 50px; ">
		<textarea name="txtDescription<?php echo $ccnt;?>" id="txtDescription<?php echo $ccnt;?>" class="style22" style="width: 352px; height: 71px"></textarea></td>
	</tr>
	<?php
		$ccnt=$ccnt+1;
	}
	?>
	<span class="style13">
	<input type="hidden" name="TotalCnt" id="TotalCnt" value="<?php echo $ccnt-1;?>">
	</span>
	<tr>
		<td class="style14" style="height: 50px" colspan="3">
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