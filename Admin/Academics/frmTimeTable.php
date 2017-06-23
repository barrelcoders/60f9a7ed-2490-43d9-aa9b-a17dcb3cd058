<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>

<?php include '../../AppConf.php';?>

<?php

   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectWeekDay = $_REQUEST["cboWeekday"];
	$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class'";
	
	$rs= mysql_query($ssql);	
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	if (document.getElementById("cboWeekday").value=="Select One")
	{
		alert ("Please select Weekday!");
		document.getElementById("cboClass").value="Select One";
		return;
	}
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
	
}
function Validate()
{
	var totalSubject = document.getElementById("totalSubject").value;
	if (document.getElementById("cboClass").value=="Select One")
	{
		alert("Please select Class !");
		return;
	}
	if (document.getElementById("cboWeekday").value=="Select One")
	{
		alert("Please select Week day !");
		return;
	}
	
	for (i=1;i<totalSubject;i++)
	{
		varCtrlName = "txtDayTime" + i;
		varCtrlSubjectName = "txtName" + i;
		//alert(document.getElementById(varCtrlName).value);
		//return;
		if (document.getElementById(varCtrlName).value=="")
		{
			SubjectName = document.getElementById(varCtrlSubjectName).value;
			//alert (SubjectName);
			alert("Please enter Date Time in Subject :" + SubjectName);
			return;
		}
		
	}
	
	document.getElementById("frmClassWork").action="SubmitfrmTimeTable.php";
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

			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
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
	function SetDayTime(cnt)
	{
		//alert(cnt);
		varCtrlName = "txtDayTime" + cnt;
		varCtrlHrName = "cboHr" + cnt;
		varCtrlMinName = "cboMin" + cnt;
		
		var SelectedHrs=document.getElementById(varCtrlHrName).value;
		var SelectedMin=document.getElementById(varCtrlMinName).value;
		
		if (document.getElementById(varCtrlHrName).value=="Hr.")
		{
			alert ("Please select Hrs.!");
			document.getElementById(varCtrlMinName).value="Min";
			return;
		}
		if (document.getElementById(varCtrlMinName).value=="Min")
		{
			alert ("Please select Min.!");
			return;
		}
		
		if (SelectedHrs.length==1)
		{
			SelectedHrs="0" + SelectedHrs;
		}
		if (SelectedMin.length==1)
		{
			SelectedMin="0" + SelectedMin;
		}
		
		//document.getElementById(varCtrlName).value=document.getElementById(varCtrlHrName).value;
		document.getElementById(varCtrlName).value=SelectedHrs + ":" + SelectedMin;
		
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Time Table Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">


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
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;		font-family: Cambria;
	}
.style2 {
	border-style: solid;
	border-width: 1px;		font-family: Cambria;
}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;		font-family: Cambria;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #000000;	font-family: Cambria;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;		font-family: Cambria;
}
.style6 {
	border-collapse: collapse;		font-family: Cambria;
}
.style7 {
	text-align: right;		font-family: Cambria;
}
.style8 {
	text-align: center;		font-family: Cambria;
}
.style9 {
	text-align: center;
}
.auto-style1 {
	text-align: left;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style2 {
	text-align: center;
	background-color: #DCBA7B;
	color: #000000;
	font-family: Cambria;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.auto-style3 {
	color: #000000;
}
.auto-style21 {
	text-align: left;
}
.auto-style22 {
	text-align: center;
	color: #000000;
}
.auto-style23 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
}
.auto-style24 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	color: #000000;
}
.auto-style25 {
	text-align: center;
	background-color: #DCBA7B;
	color: #000000;
	font-family: Cambria;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
</style>
</head>

<body>

<p>&nbsp;</p>

<table style="width: 100%" class="style1">

	<tr>
		<td class="auto-style1" colspan="2">

				<div class="auto-style21">

				<strong>Upload Timetable</strong><hr class="auto-style3" style="height: -15px">
					<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></div>
		</td>
	</tr>

	<tr>
		<td class="auto-style25" style="background-color: #95C23D" width="620"><strong>Upload Class Time - Table Details</strong></td>
		<td class="auto-style2" style="background-color: #FFFFFF" width="621">
		<a href="PreviousUploadedTimeTable.php">
		<span class="auto-style3"><strong>Uploaded Timetable Report</strong></span></a></td>
	</tr>
	</table>
	
	<table width="100%" style="border-collapse: collapse; border-width: 1px">
		<form name="frmClassWork" id="frmClassWork" method="post" action="frmTimeTable.php">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<tr>
		<td class="auto-style24" colspan="2">&nbsp;</td>
	</tr>
	
	<tr>
		<td class="auto-style24" style="text-align:center">Week-day:
		<span class="auto-style3">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			<?php 
			if($_REQUEST["SubmitType"]=="ReloadWithSubject") 
			{ 
			?>
			</span>
			<input name="cboWeekday" id="cboWeekday" type="text" readonly="readonly" value="<?php echo $SelectWeekDay; ?>" class="auto-style3">
			<span class="auto-style3">
			<?php
			}
			else
			{ 
			?>
			</span>
			<select name="cboWeekday" id="cboWeekday" class="auto-style3">
		<option selected="" value="Select One">Select One</option>
		<option value="Monday" <?php if (SelectWeekDay == "Monday") {echo "selected";} ?>>Monday</option>
		<option value="Tuesday" <?php if (SelectWeekDay == "Tuesday") {echo "selected";} ?>>Tuesday</option>
		<option value="Wednesday" <?php if (SelectWeekDay == "Wednesday") {echo "selected";} ?>>Wednesday</option>
		<option value="Thursday" <?php if (SelectWeekDay == "Thursday") {echo "selected";} ?>>Thursday</option>
		<option value="Friday" <?php if (SelectWeekDay == "Friday") {echo "selected";} ?>>Friday</option>
		<option value="Saturday" <?php if (SelectWeekDay == "Saturday") {echo "selected";} ?>>Saturday</option>
		
			</select>
			<span class="auto-style3">
			<?php
			}
			?>
			</span>
			</td>
		<td class="auto-style24" width="50%">
		<span class="auto-style3">
		<p style="text-align: center">Class:<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		--><?php 
			if($_REQUEST["SubmitType"]=="ReloadWithSubject") 
			{ 
			?>
			</span>
			<input type="text" name="cboClass" id="cboClass" value="<?php echo $SelectedClass ;?>" readonly="readonly" class="auto-style3">
			<span class="auto-style3">
			<?php
			}
			else
			{
			?>
			</span>
			<select name="cboClass" id="cboClass" onchange="ReloadWithSubject();" class="auto-style3">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>" <?php if ($class==$SelectedClass) { echo "selected"; } ?> ><?php echo $class; ?></option>
			<?php
				}
			?>
			</select>
			<span class="auto-style3">
			<?php 
			}
			?>
			</span></td>
	</tr>
	
	<tr>
		<td class="style3" colspan="2" style="border-bottom-style: none; border-bottom-width: medium">
		<table width="100%" border="1" cellpadding="0" class="style6" style="border-width: 0px" height="73">
			
			<tr>
				<td style="height: 24px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium" class="auto-style23" colspan="3">
				&nbsp;</td>
			</tr>
			
			<tr>
				<td style="width: 410px; height: 20px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium" class="auto-style23" bgcolor="#95C23D">
				<strong>Subject</strong></td>
				<td style="width: 410px; height: 20px; border-top-style:none; border-top-width:medium" class="auto-style23" bgcolor="#95C23D">
				<strong>Day Time</strong></td>
				<td style="width: 411px; height: 20px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium" class="auto-style22" bgcolor="#95C23D">
				<strong>Hr. Min.</strong></td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   				
   					$Subject=$row['subject'];
   					
   					$ssql="SELECT `daytime` FROM `time_table` a  where  `sclass`='$SelectedClass' and `subject`='$Subject' and `weekday`='$SelectWeekDay'";
					$rsDayTime= mysql_query($ssql);
   					while($rowC = mysql_fetch_assoc($rsDayTime))
   					{
   						$EneteredDayTime =$rowC['daytime'];
   					}
   					
			?>
			<tr>
				<td style="width: 410px; height: 30px; border-left-style:none; border-left-width:medium" class="style8">
				<input name="txtName<?php echo $Cnt; ?>" id="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Subject; ?>" readonly="readonly" class="auto-style3"></td>
				<td style="width: 410px; height: 30px" class="style8">		
				<input name="txtDayTime<?php echo $Cnt; ?>" id="txtDayTime<?php echo $Cnt; ?>" type="text" value="<?php echo $EneteredDayTime; ?>" class="auto-style3"></td>
				<td style="width: 411px; height: 30px; border-right-style:none; border-right-width:medium" class="style9">
				<select name="cboHr<?php echo $Cnt; ?>" id="cboHr<?php echo $Cnt; ?>" class="auto-style3">
				<option selected="" value="Hr.">Hr.</option>
				<?php 
				
				for ($Hr=6;$Hr<=15;$Hr++)
				{
				?>
				<option value="<?php echo $Hr; ?>"><?php echo $Hr; ?></option>
				<?php
				}
				?>
				</select>
				<select name="cboMin<?php echo $Cnt; ?>" id="cboMin<?php echo $Cnt; ?>" style="height: 22px" onchange="SetDayTime('<?php echo $Cnt; ?>')" class="auto-style3">
				<option selected="" value="Min">Min</option>
				<?php
				for ($Mi=0;$Mi<=60;$Mi++)
				{
				?>
				<option value="<?php echo $Mi; ?>"><?php echo $Mi; ?></option>
				<?php
				}
				?>
				
				</select><span class="auto-style3"> </span>
				</td>
			</tr>
			<?php
				$Cnt = $Cnt+1;
			}
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>">
			
		</table>
		</td>
	</tr>
	<tr>
		<td class="style5" colspan="2" style="border-style:none; border-width:medium; background-color: #FFFFFF">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>

</html>
