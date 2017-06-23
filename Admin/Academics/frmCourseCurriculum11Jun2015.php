<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php

   
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectedMonth = $_REQUEST["cboMonth"];
	
	$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class'";
	
	$rs= mysql_query($ssql);	
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmCourseCurriculum").submit();
	
}
function Validate()
{
	var totalSubject = document.getElementById("totalSubject").value;
	
	/*
	for (i=1;i<totalSubject;i++)
	{
		varCtrlName = "txtCurriculam" + i;
		varCtrlSubjectName = "txtName" + i;
		//alert(document.getElementById(varCtrlName).value);
		//return;
		if (document.getElementById(varCtrlName).value=="")
		{
			SubjectName = document.getElementById(varCtrlSubjectName).value;
			//alert (SubjectName);
			alert("Please enter curriculam detail in subject :" + SubjectName);
			return;
		}
		
	}
	*/
	
	document.getElementById("frmCourseCurriculum").action="SubmitfrmCourseCurriculum.php";
	document.getElementById("frmCourseCurriculum").submit();
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
			        	removeAllOptions(document.frmCourseCurriculum.cboSubject);
			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmCourseCurriculum.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmCourseCurriculum.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
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
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Class Work Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
}
.style6 {
	border-collapse: collapse;
}
.style7 {
	text-align: right;
}
.style8 {
	text-align: center;
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="style4" colspan="4">Enter Course Curriculum Details</td>
		<td class="style4" colspan="4"><a href="PreviousCourseCurriculam.php">View Previous uploaded Course Curriculum Details</a></td>
	</tr>
	
	</table>
	
	<table>
	
	<form name="frmCourseCurriculum" id="frmCourseCurriculum" method="post" action="frmCourseCurriculum.php">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<tr>
		<td class="style3" style="width: 318px">Class: </td>
		<td class="style2" style="width: 319px">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			<?php
			if($_REQUEST["SubmitType"]=="ReloadWithSubject") 
			{ 
			?>
			<input type="text" name="cboClass" id="cboClass" value="<?php echo $SelectedClass ?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
			
			<select name="cboClass" id="cboClass">
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
			<?php
			}
			?>
		</td>
		<td class="style3" style="width: 319px">Month:</td>
		<td class="style2" style="width: 319px">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
		<?php 
			if($_REQUEST["SubmitType"]=="ReloadWithSubject") 
			{ 
			?>
			<input type="text" name="cboMonth" id="cboMonth" value="<?php echo $SelectedMonth ?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
		<select name="cboMonth" id="cboMonth" onchange="ReloadWithSubject();">
		<option selected="" value="Select One">Select One</option>
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		
		</select>
		<?php
			}
		?>
		</td>
	</tr>
	
	<tr>
		<td class="style3" colspan="4">
		<table width="100%" border="1" cellpadding="0" class="style6">
			
			<tr>
				<td style="width: 196px; height: 36px;" class="style7"></td>
				<td style="width: 197px; height: 36px;" class="style8">
				Subject</td>
				<td style="width: 197px; height: 36px;" class="style8">
				Curriculum Detail</td>
				<td style="width: 197px; height: 36px;">
				&nbsp;</td>
				<td style="width: 197px; height: 36px;" class="style7">
				&nbsp;</td>
				<td style="width: 197px; height: 36px;">
				&nbsp;</td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   				
   					$Subject=$row['subject'];
   					
   					
   					$ssql="SELECT `syllabus` FROM `course_curriculam` a  where  `sclass`='$class' and `subject`='$Subject' and `month`='$SelectedMonth'";
   					$rsSyllabus= mysql_query($ssql);
   					while($rowC = mysql_fetch_assoc($rsSyllabus))
   					{
   						$EneteredSyllabus=	$rowC['syllabus'];
   					}
   					
			?>
			<tr>
				<td style="width: 196px; height: 36px;" class="style7"></td>
				<td style="width: 197px; height: 36px;" class="style8">
				<input name="txtName<?php echo $Cnt; ?>" id="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Subject; ?>" readonly="readonly"></td>
				<td style="width: 197px; height: 36px;" class="style8">		
		<textarea name="txtCurriculam<?php echo $Cnt; ?>" id="txtCurriculam<?php echo $Cnt; ?>" cols="20" rows="2"><?php echo $EneteredSyllabus; ?></textarea></td>
				<td style="width: 197px; height: 36px;">&nbsp;</td>
				<td style="width: 197px; height: 36px;" class="style7">
				</td>
				<td style="width: 197px; height: 36px;">
				&nbsp;</td>
			</tr>
			<?php
				$Cnt = $Cnt+1;
			}
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>">
			<tr>
				<td style="width: 196px">&nbsp;</td>
				<td style="width: 197px">&nbsp;</td>
				<td style="width: 197px">&nbsp;</td>
				<td style="width: 197px">&nbsp;</td>
				<td style="width: 197px">&nbsp;</td>
				<td style="width: 197px">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td class="style5" colspan="4">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

</body>

</html>
