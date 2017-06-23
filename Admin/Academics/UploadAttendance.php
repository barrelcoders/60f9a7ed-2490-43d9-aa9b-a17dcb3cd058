<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php




if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `srno` , `sname`,`srollno`,`sclass` ,`attendancedate`,`attendance`,`datetime` FROM `attendance` where 1=1";
	
	if ($_REQUEST["cboClass"] != "All")
	{
		$SelectedClass=$_REQUEST["cboClass"];
		$ssql=$ssql . " and `sclass`='$SelectedClass'";
	}
	if($_REQUEST["txtFromDate"] !="")
          {
		$Dt = $_REQUEST["txtFromDate"];
		$arr=explode('/',$Dt);
		$DateFrom= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

		$Dt = $_REQUEST["txtToDate"];
		$arr=explode('/',$Dt);
		$DateTo= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
					
		$ssql = $ssql . " and `attendancedate` >= '$DateFrom' and `attendancedate` <= '$DateTo'";
	   }
	
	if ($_REQUEST["cboRollNo"] != "All")
	{
		$SelectedRollNo=$_REQUEST["cboRollNo"];
		$ssql=$ssql . " and `srollno`='$SelectedRollNo'";
	}
	$ssql=$ssql . " ORDER BY `sclass`,`attendancedate`, CAST(  `srollno` AS UNSIGNED )";
//echo $ssql;
//exit();
$rs= mysql_query($ssql);
}



$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

?>
<SCRIPT language="javascript">
function FillRollNo()
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


			        	removeAllOptions(document.frmAttandance.cboRollNo);


			        	addOption(document.frmAttandance.cboRollNo,"All","All")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{

			        			//addOption(document.frmAttandance.cboRollNo,arr_row[0],arr_row[0])			        			 
			        			addOption(document.frmAttandance.cboRollNo,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        }

		      }

			if (document.getElementById("cboClass").value=="All")
			{

				removeAllOptions(document.frmAttandance.cboRollNo);

				addOption(document.frmAttandance.cboRollNo,"All","All")
			}

			else
			{
			var submiturl="GetRollNo.php?Class=" + document.getElementById("cboClass").value + "";
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
	if (document.getElementById("txtFromDate").value !="From Date" && document.getElementById("txtToDate").value =="To Date")
	{
		alert("From Date and To Date is missing !");
	}
	if (document.getElementById("txtToDate").value !="To Date" && document.getElementById("txtFromDate").value =="From Date")
	{
		alert("From Date and To Date is missing !");
	}
	
	document.getElementById("frmAttandance").submit();
}

</SCRIPT>

<html>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

<head>

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

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;
font-family: Cambria;
	}

.style2 {

	border-style: solid;

	border-width: 1px;

	text-align: center;

}

.style3 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #FFFFFF;

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
}
.auto-style2 {
	font-family: Cambria;
	font-size: small;
	color: #000000;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
</style>

</head>

<body>
<font="Cambria">
<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><u><b>Previous Uploaded 
Attendance Report</b></u></font></p>
<hr>
<p>

<font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>
<p>&nbsp;</p>
<table style="border-width:1px; width: 100%; " class="style4" cellspacing="0" cellpadding="0">


	<tr>

		<td class="style4" colspan="4" style="border-style:solid; border-width:1px; text-align: center"><a href="frmAttendance.php">
		<span style="text-decoration: none"><font color="#000000">Upload Student Attendance</font></span></a></td>
		<td class="style4" colspan="4" width="50%" style="border-style:solid; border-width:1px; text-align: center; background-color:#95C23D">
		View Previous Uploaded Attendance Report</td>

	</tr>
</table>

<table>
<tr>
<td>
	
	<table class="auto-style7" style="width: 100%; border-left-width:0px; border-top-width:0px">
	<form name="frmAttandance" id="frmAttandance" method="post" action="UploadAttendance.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
	<td class="auto-style6" style="border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="6">
				&nbsp;</td>
	
	</tr>
	<td class="auto-style6" style="width: 179px; border-top-style:solid; border-top-width:1px">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span><span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	<select name="cboClass" id="cboClass" style="height: 22px; width: 62px;" onchange="FillRollNo();">

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
	
	<td class="auto-style1" style="width: 165px; border-top-style:solid; border-top-width:1px">
				Select Roll No</td>

	<td class="auto-style1" style="width: 79px; border-top-style:solid; border-top-width:1px">
	
			<select name="cboRollNo" id="cboRollNo" style="height: 22px; width: 79px;">

			<option selected="selected" value="All">All</option>
			</select>
		</td>
	
	<td class="auto-style1" style="width: 201px; border-top-style:solid; border-top-width:1px">
				Select Date</td>
	
	<td style="width: 319px; border-top-style:solid; border-top-width:1px" class="auto-style9">
				<input type="text" name="txtFromDate" id="txtFromDate" size="15" value="From Date" style="width: 144px;" class="tcal">
				<input type="text" name="txtToDate" id="txtToDate" size="15" value="To Date" style="width: 137px;" class="tcal"></td>
	
	<td style="width: 265px; border-top-style:solid; border-top-width:1px" class="auto-style8">
				<p align="center">
				<input name="Button1" type="button" value="Submit"  onclick ="Javascript:Validate2();" style="font-weight: 700"></td>
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

		<td class="style3" style="width: 43px; background-color:#95C23D">Sr.No.</td>

		<td class="style3" style="width: 212px; background-color:#95C23D">Name</td>

		<td class="style3" style="width: 212px; background-color:#95C23D">Roll No</td>

		<td class="style3" style="width: 213px; background-color:#95C23D">Class</td>

		<td class="style3" style="width: 213px; background-color:#95C23D">Attendance Date</td>

		<td class="style3" style="width: 213px; background-color:#95C23D">Attendance</td>

		<td class="style3" style="width: 213px; background-color:#95C23D">Upload Date and Time</td>

	</tr>

	<?php

		while($row1 = mysql_fetch_row($rs))

				{

					$srno=$row1[0];

					$sname=$row1[1];

					$srollno=$row1[2];

					$sclass=$row1[3];

					$attendancedate=$row1[4];

					$attendance=$row1[5];

					$datetime=$row1[6];

	?>

	<tr>

		<td class="style2" style="width: 43px"><?php echo $srno;?></td>

		<td class="style2" style="width: 212px"><?php echo $sname;?></td>

		<td class="style2" style="width: 212px"><?php echo $srollno;?></td>

		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>

		<td class="style2" style="width: 212px"><?php echo $attendancedate;?></td>

		<td class="style2" style="width: 213px"><?php echo $attendance;?></td>

		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>

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