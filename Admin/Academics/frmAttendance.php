<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
$EmpId=$_SESSION['userid'];
   //$sql = "SELECT distinct `class` FROM `class_master`";
   $sql = "SELECT distinct `class` FROM `class_master` where `class` in (select distinct `Class` from `teacher_class_mapping` where `EmpID`='$EmpId') order by `class`";
   $result = mysql_query($sql, $Con);
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$ssql="SELECT distinct `sname`,`srollno` FROM `student_master` a  where  `sclass`='$class' ORDER BY CAST(`srollno` AS UNSIGNED )";
	
	$rs= mysql_query($ssql);	
}   
?>   
<script language="javascript">
function ReloadWithSubject()
{
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
}

function Validate()

{

	if (document.getElementById("cboClass").value=="Select One")

	{

		alert("Please select Class !");

		return;

	}

	if (document.getElementById("txtDate").value=="Attendance Date")

	{

		alert("Please select Date !");

		return;

	}

	

	document.getElementById("frmClassWork").action="SubmitfrmAttendance.php";

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

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Upload Student Attendance Details</title>

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

	border-collapse: collapse;

	font-family: Cambria;

	}

.style2 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

}

.style3 {

	text-align: right;

	border-style: solid;

	border-width: 1px;

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

.style5 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #FFFFFF;

	font-family: Cambria;

}

.style6 {

	border-collapse: collapse;

	font-family: Cambria;

}

.style7 {

	text-align: right;

	font-family: Cambria;

}

.auto-style21 {

	text-align: left;

}

.auto-style6 {

	color: #DAB9C1;

}

.auto-style22 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #FFFFFF;

	color: #000000;

	font-family: Cambria;

}

.auto-style23 {

	color: #000000;

}

.auto-style24 {

	text-align: center;

	border-style: solid;

	border-width: 1px;

	background-color: #FFFFFF;

	color: #000000;

	font-family: Cambria;

	text-decoration: underline;

}

.auto-style3 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 15px;

	color: #000000;

}

.auto-style25 {

	text-align: right;

	font-family: Cambria;

	color: #000000;

}

.auto-style26 {

	text-align: right;

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	color: #000000;

}

</style>

</head>



<body>



<p>&nbsp;</p>



<table style="width: 100%" class="style1">

	<tr>

		<td class="style4" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



				<div class="auto-style21">



					<u>



					<strong>Upload Student Attendance</strong></u></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<img height="28" src="images/BackButton.png" width="70" style="float: right"></a></p>

				

				</td>		

	</tr>

	<tr>

		<td class="auto-style24" width="620" style="background-color: #95C23D; border-left-style:none; border-left-width:medium">
		Upload Student Attendance</td>		

		<td class="auto-style22" width="621" style="border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		<a href="UploadAttendance.php">

		<span class="auto-style23">Previous Uploaded Attendance Report</span></a></td>

	</tr></table><table cellspacing="0" cellpadding="0" width="100%">	<form name="frmClassWork" id="frmClassWork" method="post" action="frmAttendance.php">	

	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style23">

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			&nbsp;</td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		&nbsp;</td>

	</tr>

	

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">Class: </td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			<span class="auto-style23">

		

			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->

			</span>

			<select name="cboClass" id="cboClass" onchange="ReloadWithSubject();" class="auto-style23">

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

			</select><span class="auto-style23"> </span>

		</td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">Attendance Date:</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		<span class="auto-style23">

		<!--

		<select name="cboSubject" id="cboSubject">

		<option></option>

		<option selected="" value="Select One">Select One</option>

		</select>

		-->

		</span>

		<input type="text" name="txtDate" id="txtDate" size="21" value="Attendance Date" class="tcal" style="font-family: Arial; "></td>

	</tr>

	

	<tr>

		<td class="style3" colspan="4" style="border-bottom-style: none; border-bottom-width: medium">

		<table width="100%" cellpadding="0" class="style6">

			<?php

				$Cnt=1;

				while($row = mysql_fetch_assoc($rs))

   				{

   				

   					$Name=$row['sname'];

   					$RollNo=$row['srollno'];

			?>

			<tr>

				<td style="width: 196px; height: 36px;" class="auto-style25">&nbsp;</td>

				<td style="width: 197px; height: 36px;">

				&nbsp;</td>

				<td style="width: 197px; height: 36px;" class="auto-style25">&nbsp;</td>

				<td style="width: 197px; height: 36px;">

				&nbsp;</td>

				<td style="width: 197px; height: 36px;" class="auto-style25">

				&nbsp;</td>

				<td style="width: 197px; height: 36px;">

				&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 196px; height: 21px;" class="auto-style25">Student 

				Name:</td>

				<td style="width: 197px; height: 21px;">

				<input name="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Name; ?>" readonly class="auto-style23"></td>

				<td style="width: 197px; height: 21px;" class="auto-style25">Roll No.</td>

				<td style="width: 197px; height: 21px;">

				<input name="txtRollNo<?php echo $Cnt; ?>" type="text" value="<?php echo $RollNo; ?>" readonly class="auto-style23"></td>

				<td style="width: 197px; height: 21px;" class="auto-style25">

				Attendance</td>

				<td style="width: 197px; height: 21px;">

				<select name="cboAttendance<?php echo $Cnt; ?>" class="auto-style23">

				<option selected="" value="P">P</option>

				<option value="A">A</option>

				<option value="L">L</option>
				<option value="ML">ML</option>

              <option value="SR">SR</option>


				</select></td>

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

		<td class="style5" colspan="4" style="border-style: none; border-width: medium">

		<font face="Cambria">

		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" class="auto-style23" style="font-weight: 700"></font></td>

	</tr>

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>





</body>



</html>

