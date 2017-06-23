<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php


if ($_REQUEST["isSubmit"]=="yes")

{

	//$ssql="SELECT `srno` , `sname`,`srollno`,`sclass` ,`attendancedate`,`attendance`,`datetime` FROM `attendance` where 1=1";

	$ssql="SELECT `srno`,`sname`,`sclass`,`srollno`,`subject`,`testtype`,`marks`,`remarks`,`grade`,`position`,`datetime` FROM `report_card` where 1=1";

	

	if ($_REQUEST["cboClass"] != "All")

	{

		$SelectedClass=$_REQUEST["cboClass"];

		$ssql=$ssql . " and `sclass`='$SelectedClass'";

	}

	if ($_REQUEST["cboRollNo"]!= "All")

	{

		$SelectedRollNo=$_REQUEST["cboRollNo"];

				

		$ssql = $ssql . " and `srollno`= '$SelectedRollNo'";

	}

	

	if ($_REQUEST["cboTestType"] != "All")

	{

		$SelectedTestType=$_REQUEST["cboTestType"];

		$ssql=$ssql . " and `testtype`='$SelectedTestType'";

	}

	$ssql=$ssql . " order by `datetime`";

	//echo $ssql;

	//exit();

	$rs= mysql_query($ssql);

}









$ssqlClass="SELECT distinct `class` FROM `class_master`";

$rsClass= mysql_query($ssqlClass);



$ssqlTestType="SELECT distinct `examtype` FROM `exam_master` where `class`='All'";

$rsTestType= mysql_query($ssqlTestType);



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





			        	removeAllOptions(document.frmReportCard.cboRollNo);





			        	addOption(document.frmReportCard.cboRollNo,"All","All")



			        	arr_row=rows.split(",");



			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{



			        			//addOption(document.frmReportCard.cboRollNo,arr_row[0],arr_row[0])			        			 

			        			addOption(document.frmReportCard.cboRollNo,arr_row[row_count],arr_row[row_count])			        			 

			        	}

			        }



		      }



			if (document.getElementById("cboClass").value=="All")

			{



				removeAllOptions(document.frmReportCard.cboRollNo);



				addOption(document.frmReportCard.cboRollNo,"All","All")

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

	document.getElementById("frmReportCard").submit();

}



</SCRIPT>

<html>

<!-- link calendar resources -->



	<link rel="stylesheet" type="text/css" href="tcal.css" />



	<script type="text/javascript" src="tcal.js"></script>



<head>

<style type="text/css">

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

	font-family: Cambria;

}

.style3 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #C0C0C0;

	font-family: Cambria;

}



.style4 {

	text-align: left;

	border-style: solid;

	border-width: 1px;

	background-color: #DCBA7B;

	color: #CD222B;

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

	color: #CD222B;

}

.auto-style1 {

	text-align: right;

	font-family: Cambria;

	color: #CD222B;

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



<!--

<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left">



<tr valign="top">

<th scope="row" valign="middle">

<p><font face="wp_bogus_font">Upload Report Card</font></p></th>

<td width="67%" valign="middle">

<form action="upload_reportcard.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload report card:<input type="file" name="file" id="file" /><br />

<input type="submit" name="submit" value="Submit" /></font></form>

<p><font face="wp_bogus_font">Click <a target="_blank" href="report_card.csv"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />

</font></td>

</tr>



</table>

-->



<table style="width: 100%" class="style4">



	

	<tr>



		<td class="style4" colspan="4"><a href="frmReportCard.php">Upload Student Report Card Details</a></td>  

<td class="style4" colspan="4">View Previous Uploaded Report Card Details</td>

	</tr>



	</table>

	

	<table>

	<tr>

	<td>

	

	

	<table class="auto-style7" style="width: 855px">

	<form name="frmReportCard" id="frmReportCard" method="post" action="UploadReportCard.php">

	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

		

	<td class="auto-style6" style="width: 222px">

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

	

	<td class="auto-style1" style="width: 138px">

				Select Roll No</td>

	

	<td class="auto-style1" style="width: 107px">

				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">

				<select name="cboRollNo" id="cboRollNo" style="height: 22px; width: 79px;">



		<option selected="selected" value="All">All</option>

		</select>

		</span></td>

	

	<td class="auto-style1" style="width: 161px">

				Select Test type</td>

	

	<td style="width: 294px" class="auto-style9">

				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">

				<select name="cboTestType" id="cboTestType" style="height: 22px; width: 79px;">



		<option selected="" value="All">All</option>



		<?php

		while($row2 = mysql_fetch_row($rsTestType))

		{

					$TestType=$row2[0];

		?>

		<option value="<?php echo $TestType; ?>"><?php echo $TestType; ?></option>

		<?php

		}

		?>

		

		</select></span></td>

	

	<td style="width: 130px" class="auto-style8">

				<img border="0" src="images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate2();"></td>

</form>

	</table>

					

		</td></tr></table>

	<table>

	

<table style="width: 100%" class="style1">

	<tr>

		<td class="style3" style="width: 43px">Sr.No.</td>

		<td class="style3" style="width: 212px">Name</td>

		<td class="style3" style="width: 212px">Class</td>

		<td class="style3" style="width: 213px">RollNo</td>

		<td class="style3" style="width: 213px">Subject</td>

		<td class="style3" style="width: 213px">Test Type</td>

		<td class="style3" style="width: 213px">Marks</td>

		<td class="style3" style="width: 213px">Remarks</td>

		<td class="style3" style="width: 213px">Grade</td>

		<td class="style3" style="width: 213px">Position</td>		<td class="style3" style="width: 213px">Upload Date and Time</td>

	</tr>

	<?php

		while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$sname=$row[1];

					$sclass=$row[2];

					$srollno=$row[3];

					$subject=$row[4];

					$testtype=$row[5];

					$marks=$row[6];

					$remarks=$row[7];

					$grade=$row[8];

					$position=$row[9];					$datetime=$row[10];

	?>

	<tr>

		<td class="style2" style="width: 43px"><?php echo $srno;?></td>

		<td class="style2" style="width: 212px"><?php echo $sname;?></td>

		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>

		<td class="style2" style="width: 212px"><?php echo $srollno;?></td> 

		<td class="style2" style="width: 212px"><?php echo $subject;?></td>

		<td class="style2" style="width: 212px"><?php echo $testtype;?></td>

		<td class="style2" style="width: 212px"><?php echo $marks;?></td>

		<td class="style2" style="width: 212px"><?php echo $remarks;?></td>				<td class="style2" style="width: 213px"><?php echo $grade;?></td>

		<td class="style2" style="width: 212px"><?php echo $position;?></td>		<td class="style2" style="width: 350px"><?php echo $datetime;?></td>

	</tr>

	<?php

	}

	?>

</table>





</body>

</html>