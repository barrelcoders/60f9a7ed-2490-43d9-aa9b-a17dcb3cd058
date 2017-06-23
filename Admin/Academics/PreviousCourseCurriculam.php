<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';
?>


<?php

if ($_REQUEST["isSubmit"]=="yes")
{
	
	//$ssql="SELECT `srno`,`sname`,`sclass`,`srollno`,`subject`,`testtype`,`marks`,`remarks`,`grade`,`position`,`datetime` FROM `report_card` where 1=1";
	$ssql="SELECT `srno` , `sclass`,`subject`,`syllabus` ,`month`,`datetime` FROM `course_curriculam` where 1=1";

	

	if ($_REQUEST["cboClass"] != "All")
	{
		$SelectedClass=$_REQUEST["cboClass"];
		$ssql=$ssql . " and `sclass`='$SelectedClass'";
	}
	if ($_REQUEST["cboSubject"]!= "All")
	{
		$SelectedSubject=$_REQUEST["cboSubject"];
				
		$ssql = $ssql . " and `subject`= '$SelectedSubject'";
	}
	
	if ($_REQUEST["cboMonth"] != "All")
	{
		$SelectedMonth=$_REQUEST["cboMonth"];
		$ssql=$ssql . " and `month`='$SelectedMonth'";
	}
	$ssql=$ssql . " order by `datetime`";
	//echo $ssql;
	//exit();
	$rs= mysql_query($ssql);
}




$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);






?>
<SCRIPT language="javascript">
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


			        	removeAllOptions(document.frmCourseCurri.cboSubject);


			        	addOption(document.frmCourseCurri.cboSubject,"All","All")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{

			        			//addOption(document.frmCourseCurri.cboRollNo,arr_row[0],arr_row[0])			        			 
			        			addOption(document.frmCourseCurri.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        }

		      }

			if (document.getElementById("cboClass").value=="All")
			{

				removeAllOptions(document.frmCourseCurri.cboSubject);

				addOption(document.frmCourseCurri.cboSubject,"All","All")
			}

			else
			{
			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			}
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
function Validate2()
{
	document.getElementById("frmCourseCurri").submit();
}

</SCRIPT>
<html>

<head>

<style type="text/css">

.style1 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;
font-family: Cambria;
	}

.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	border-left-style: solid;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style10 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}

.auto-style1 {
	text-align: right;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style9 {
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}
.auto-style11 {
	text-align: center;
	border-style: none;
	border-width: medium;
	background-color: #C0C0C0;
	color: #000000;
}
.auto-style12 {
	text-align: center;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
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

</style>

</head>

<body>
<font="Cambria">
<p>&nbsp;</p>
<font face="Cambria">

				<strong>Uploaded Session Plan Report</strong></font><hr class="auto-style3" style="height: -15px">
					<p><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>
<table style="border-width:1px; width: 100%; border-collapse:collapse" class="style4" cellpadding="0">


	<tr>

		<td class="style4" colspan="4" style="text-align: center"><a href="frmCourseCurriculum1.php">
		<span style="text-decoration: none"><font color="#000000">Upload Session 
		Plan</font></span></a></td>
		<td class="style4" colspan="4" width="50%" style="text-align: center; background-color: #95C23D">
		Previous Session Plan Report</td>

	</tr>
</table>
<table width="100%">
<tr>
<td>
	
	<table class="auto-style7" style="width: 100%; border-left-width:0px; border-top-width:0px">
	<form name="frmCourseCurri"	id="frmCourseCurri" method="post" action="PreviousCourseCurriculam.php">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
		<tr>
	<td class="auto-style6" style="border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="7">
				&nbsp;</td>
	
		</tr>
	<td class="auto-style6" style="width: 113px; border-top-style:solid; border-top-width:1px">
				<p align="center">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span></td>
	
	<td class="auto-style10" style="border-top-style: solid; border-top-width: 1px">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboClass" id="cboClass" style="height: 22px; width: 62px;" onchange="FillSubject();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td class="auto-style1" style="width: 161px; border-top-style:solid; border-top-width:1px">
				<p style="text-align: center">Select Subject</td>
	
	<td class="auto-style10" style="width: 139px; border-top-style:solid; border-top-width:1px">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboSubject" id="cboSubject" style="width: 62px;">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $sclass; ?>"><?php echo $sclass; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td style="width: 156px; border-top-style:solid; border-top-width:1px" class="auto-style9">
				<span class="auto-style3">Select Month</span></td>
	
	<td style="width: 152px; border-top-style:solid; border-top-width:1px" class="auto-style9">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboMonth" id="cboMonth" style="height: 22px; width: 79px;">

		<option selected="" value="All">All</option>

				<option>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
		</select></span></td>
	
	<td style="width: 130px; border-top-style:solid; border-top-width:1px" class="auto-style8">
				<input name="Submit" type="button" value="Submit" onclick ="Javascript:Validate2();"></td>
				</form>
	</table>
	
		</td></tr></table>
<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left">



<tr valign="top">

<th scope="row" valign="middle">

<p><font face="wp_bogus_font">Upload Attendance</font></p></th>

<td width="67%" valign="middle">

<form action="upload_attendance.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload Attendance:<input type="file" name="file" id="file" /><br />

<input type="submit" name="submit" value="Submit" /></font></form>

<p><font face="wp_bogus_font">Click <a target="_blank" href="Attendance.xls"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />

</font></td>

</tr>



</table>

-->
<table style="width: 100%" class="style1">
<Font face="Cambria">
	<tr>

		<td class="auto-style11" style="background-color:#FFFFFF" colspan="6">&nbsp;</td>

	</tr>

	<tr>

		<td class="auto-style11" style="width: 43px; background-color:#95C23D">Sr.No.</td>

		<td class="auto-style11" style="width: 212px; background-color:#95C23D">Class</td>

		<td class="auto-style11" style="width: 212px; background-color:#95C23D">Subject</td>

		<td class="auto-style11" style="width: 213px; background-color:#95C23D">Syllabus</td>

		<td class="auto-style11" style="width: 213px; background-color:#95C23D">Month</td>

		<td class="auto-style11" style="width: 213px; background-color:#95C23D">Upload Date 
		&amp; Time</td>

	</tr>

	<?php

		while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$sclass=$row[1];

					$subject=$row[2];

					$syllabus=$row[3];

					$month=$row[4];

					$datetime=$row[5];

	?>

	<tr>

		<td class="auto-style12" style="width: 43px"><?php echo $srno;?></td>

		<td class="auto-style12" style="width: 212px"><?php echo $sclass;?></td>

		<td class="auto-style12" style="width: 212px"><?php echo $subject;?></td>

		<td class="auto-style12" style="width: 212px"><?php echo $syllabus;?></td>

		<td class="auto-style12" style="width: 212px"><?php echo $month;?></td>

		<td class="auto-style12" style="width: 213px"><?php echo $datetime;?></td>

	</tr>

	<?php

	}

	?>

</table>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>


</body>

</html>