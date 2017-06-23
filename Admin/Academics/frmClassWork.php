<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$EmpId=$_SESSION['userid'];
   //$sql = "SELECT distinct `class` FROM `class_master` order by `class`";
   $sql = "SELECT distinct `class` FROM `class_master` where `class` in (select distinct `Class` from `teacher_class_mapping` where `EmpID`='$EmpId') order by `class`";
   $result = mysql_query($sql, $Con);
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	//$class = $_REQUEST["cboClass"];
	$SelectDate = $_REQUEST["txtDate"];
	$arr=explode('/',$SelectDate);
	$SearchDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		$SelectedClasses = $_REQUEST["txtSelectedClass"];
		//echo $SelectedClasses;
		//exit();
		$arrClass=explode(',',$SelectedClasses);

		$CoutOfSelectedClass=sizeof($arrClass);
		
		//DISABLED ON 9-APR-2015
		/*
		if ($CoutOfSelectedClass > 1)
		{
			$ssql="select y.* from (select distinct x.subject,count(*) cnt from (SELECT `class`,`subject` FROM `subject_master` WHERE `class` in (" . $SelectedClasses . "))x group by x.subject) y where y.cnt !=$CoutOfSelectedClass";
			
			if (!$result = mysql_query($ssql))     die("Record Not Found");

			if(mysql_num_rows($result)>0)
			{
	
				echo "<br><br><center><b>There are different subjects in selected classes";
	
				exit();
	
			}
		}
		*/

			$ssql="SELECT COUNT(DISTINCT `MasterClass`) as `MasterClass` FROM `class_master` WHERE `class` in (" . $SelectedClasses . ")";			
			if (!$rsChk = mysql_query($ssql))  die("Record Not Found");
			if(mysql_num_rows($rsChk)>0)
			{
				while($row = mysql_fetch_assoc($rsChk))
   				{
   					$CountOfMasterClass=$row['MasterClass'];
   					break;
   				}
			}
			
			if ($CountOfMasterClass > 1 )
			{
				echo "<br><br><center><b>Different master classes have been selected!";
				exit();
			}
		

	

	//$SelectedClass = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["txtSelectedClass"];


	//$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class'";

	$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class` in (" . $SelectedClasses . ")";
	//echo $ssql;
	//exit();
	

	$rs= mysql_query($ssql);	

}   

   

?>   



<script language="javascript">

function ReloadWithSubject()
{

	//alert(document.getElementById("txtSelectedClass").value);

	//return;

	

	var x=document.getElementById("cboClass");

		var sstr="'";

		var selectedValue="";
		var NewValue="";

		  for (var i = 0; i < x.options.length; i++) 
		  {

		     if(x.options[i].selected ==true)
		     {

		          //alert(x.options[i].value);

		          NewValue = x.options[i].value;

		          NewValue=NewValue.substr(0,1);

		          

		          if (selectedValue!="")
		          {

		          	if(NewValue != selectedValue)

		          	{

		          		alert("Please select only one class!");

		          		return;

		          	}

		          	selectedValue=NewValue;

		          }

		          else

		          {

		          	selectedValue=NewValue;

		          }

		          //sstr = sstr + x.options[i].value + "','";

		      }

		  }



	

	if (document.getElementById("txtDate").value=="Classwork Date")
	{

		document.getElementById("cboClass").value="Select One";

		alert("Please select Date!");		

		return;

	}

	document.getElementById("SubmitType").value="ReloadWithSubject";

	document.getElementById("frmClassWork").submit();

	

}

function Validate()
{
	var totalSubject = document.getElementById("totalSubject").value;

	var currentTime = new Date();

	var month = currentTime.getMonth() + 1;

	var day = currentTime.getDate();

	var year = currentTime.getFullYear();

	var CurrentDate= month + "/" + day + "/" + year;


	if ((Date.parse(CurrentDate)==Date.parse(document.getElementById("txtDate").value))==false)
	{
		alert ("Classwok / Homework can be inserted only for today !");
	}
	
	if (document.getElementById("txtSelectedClass").value=="Select One")
	{
		alert("Please select Class !");
		return;
	}
	
	if (document.getElementById("txtDate").value=="Classwork Date")
	{
		alert("Please select Date !");
		return;
	}
	
	document.getElementById("SubmitType").value="SaveAsDraft";
	document.getElementById("frmClassWork").action="SubmitfrmClassWork.php";
	document.getElementById("frmClassWork").submit();
}
function Validate1()
{
	var totalSubject = document.getElementById("totalSubject").value;

	var currentTime = new Date();

	var month = currentTime.getMonth() + 1;

	var day = currentTime.getDate();

	var year = currentTime.getFullYear();

	var CurrentDate= month + "/" + day + "/" + year;

	if ((Date.parse(CurrentDate)==Date.parse(document.getElementById("txtDate").value))==false)
	{
		alert ("Classwok / Homework can be inserted only for today !");
	}
	
	if (document.getElementById("txtSelectedClass").value=="Select One")
	{
		alert("Please select Class !");
		return;
	}
	
	if (document.getElementById("txtDate").value=="Classwork Date")
	{
		alert("Please select Date !");
		return;
	}
	
	document.getElementById("SubmitType").value="FinalSubmit";
	document.getElementById("frmClassWork").action="SubmitfrmClassWork.php";
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

	function GetSelectedValue()
	{
		document.getElementById("txtSelectedClass").value="";
		var x=document.getElementById("cboClass");

		var sstr="'";

		  //for (var i = 0; i < x.options.length; i++) 
		  for (var i = 0; i < document.getElementById("cboClass").options.length; i++) 
		  {

		     if(x.options[i].selected ==true)
		     {

		          //alert(document.getElementById("cboClass").options[i].value);
		          sstr = sstr + x.options[i].value + "','";

		      }

		  }

		  if (sstr !="'")
		  {
			sstr=sstr.substr(0,sstr.length-2);
			document.getElementById("txtSelectedClass").value = sstr;
			alert (document.getElementById("txtSelectedClass").value);
		  }



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

	font-family: Cambria;

	color: #000000;

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

	text-align: Left;

	font-family: Cambria;

}

.style7 {

	text-align: Left;

	

	text-align: right;

	font-family: Cambria;

}

.style8 {

	border-style: solid;

	border-width: 1px;

	text-align: left;

	font-family: Cambria;

}

.style9 {

	text-align: left;

}

.auto-style21 {
	text-align: left;
}
.auto-style6 {
	color: #FFFFFF;
}
.auto-style22 {
	color: #000000;
}

.auto-style23 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style26 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
	font-size: default (size);
}
.auto-style27 {
	text-align: left;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style28 {
	text-align: left;
	border-style: solid;
	border-width: 0px;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style30 {
	color: #000000;
	font-size: default (size);
}
.auto-style31 {
	text-align: Left;
	text-align: right;
	font-family: Cambria;
	color: #000000;
}
.auto-style32 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}

</style>

</head>



<body>



<div class="style9">



&nbsp;<p>&nbsp;</p>
<table style="border-width:1px; width: 100%; border-collapse:collapse" class="auto-style28" cellpadding="0"><tr>		
	<td class="auto-style27" colspan="3" style="height: 22px; width: 66%;">

				<div class="auto-style21">

					<b>Upload Daily Classwork &amp; Homework</b></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
				
				</td>		</tr>		<tr>		
		<td class="auto-style26" width="33%" style="height: 22; background-color:#95C23D">Upload Class Work and Homework Details</td>		
		<td class="auto-style23" width="33%" style="height: 22"><a href ="UploadClasswork.php">
		<span class="auto-style30">View Previous Uploaded Class Work</span></a></td>		
		<td class="auto-style23" width="33%" style="height: 22"><a href ="UploadHomework.php">
		<span class="auto-style30">View Previous Uploaded Home Work</span></a></td>	</tr>		</table>		

	<table style="width: 100%; border-collapse:collapse" cellpadding="0" border="1">		<tr>	

	<form name="frmClassWork" id="frmClassWork" method="post" action="frmClassWork.php">

	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style22">

	<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClasses; ?>" class="auto-style22">

	

	<tr>

		<td class="style3" width="98%" colspan="5">&nbsp;</td>

	</tr>

	

	<tr>

		<td class="style3" width="15%">&nbsp;<span class="auto-style22">Class-work Date:</span></td>

		<td class="style8" width="17%">

			<span class="auto-style22">&nbsp;

			</span>

			<input type="text" name="txtDate" id="txtDate" size="15" <?php if($_REQUEST["SubmitType"]=="ReloadWithSubject") { ?> value="<?php echo $SelectDate ?>" readonly <?php } else {?>value="Classwork Date" <?php }?> <?php if($_REQUEST["SubmitType"]!="ReloadWithSubject") { ?>class="tcal" <?php }?> style="font-family: Arial; " class="auto-style22"><span class="auto-style22">
			</span>

			</td>

		<td class="auto-style32" width="8%">Class:</td>

		<td class="style8" width="40%">

		<span class="auto-style22">

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

			</span>

			<input type="text" name="txtClass" id="txtClass" value="<?php echo $SelectedClass ?>" readonly="readonly" class="auto-style22">

			<span class="auto-style22">

			<?php

			}

			else

			{

			?>

			</span>

			<select name="cboClass" id="cboClass" size="7" multiple style="width: 174px" onclick="Javascript:GetSelectedValue();" class="auto-style22">

			<option selected="" value="Select One">Select One</option>

			<?php

				while($row = mysql_fetch_assoc($result))
   				{

   					$class=$row['class'];

			?>

			<option value="<?php echo $class; ?>"><?php echo $class; ?></option>

			<?php

				}

			?>

			</select>

			<span class="auto-style22">

			<?php

			}

			?>

			</span>

			</td>

		<td class="style8" width="18%">		

			<input name="btnShowSubject" type="button" value="Show Subject" onclick="ReloadWithSubject();" class="auto-style22"><span class="auto-style22">
			</span>

			</td>

	</tr>

	

	<tr>

		<td class="style3" colspan="5">

		<table width="100%" cellpadding="0" class="style6" cellspacing="1" border="0">

			<?php

				$Cnt=1;

				while($row = mysql_fetch_assoc($rs))
   				{
   					$subject=$row['subject'];
   					$ssql="SELECT distinct `classwork` FROM `classwork_master` a  where  `sclass` in (" . $SelectedClasses . ") and `subject`='$subject' and `classworkdate`='$SearchDate'";
					$rsClassWork= mysql_query($ssql);
   					while($rowC = mysql_fetch_assoc($rsClassWork))
   					{
   						$EneteredClassWork=	$rowC['classwork'];
   					}
   					
   					//$ssqlH="SELECT `homework` FROM `homework_master` a  where  `sclass`='$class' and `subject`='$subject' and `homeworkdate`='$SearchDate'";
   					$ssqlH="SELECT distinct `homework` FROM `homework_master` a  where  `sclass` in (" . $SelectedClasses . ") and `subject`='$subject' and `homeworkdate`='$SearchDate'";
					
					$rsHomeWork= mysql_query($ssqlH);

   					$EneteredHomeWork="";
   					while($rowH = mysql_fetch_assoc($rsHomeWork))
   					{
   						$EneteredHomeWork=$rowH['homework'];
   					}

   					

			?>

			<tr>

				<td style="height: 36px" class="auto-style31" colspan="6">&nbsp;</td>

			</tr>

			<tr>

				<td style="width: 196px; height: 36px;" class="auto-style31">
				<p style="text-align: center">Subject:</td>

				<td style="width: 197px; height: 36px;">

				<input name="txtSubject<?php echo $Cnt; ?>" id="txtSubject<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $subject; ?>" readonly class="auto-style22"></td>

				<td style="width: 197px; height: 36px;" class="auto-style31">
				<p style="text-align: center">Class work:</td>

				<td style="width: 197px; height: 80px;">

				<textarea name="txtClassWork<?php echo $Cnt; ?>" id="txtClassWork<?php echo $Cnt; ?>" cols="20" rows="3" class="auto-style22"><?php echo $EneteredClassWork; ?></textarea></td>

				<td style="width: 197px; height: 36px;" class="auto-style31">
				<p style="text-align: center">Homework</td>

				<td style="width: 197px; height: 80px;">

				<textarea name="txtHomeWork<?php echo $Cnt; ?>" id="txtHomeWork<?php echo $Cnt; ?>" cols="20" rows="3" class="auto-style22"><?php echo $EneteredHomeWork; ?></textarea></td>

			</tr>

			<?php

				$Cnt = $Cnt+1;
				ob_end_flush(); 
    				ob_flush(); 
    				flush(); 
    				ob_start();
    				$EneteredHomeWork="";
    				$EneteredClassWork="";

			}

			?>

			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style22">

			<tr>

				<td style="width: 196px" class="auto-style22">&nbsp;</td>

				<td style="width: 197px" class="auto-style22">&nbsp;</td>

				<td style="width: 197px" class="auto-style22">&nbsp;</td>

				<td style="width: 197px" class="auto-style22">&nbsp;</td>

				<td style="width: 197px" class="auto-style22">&nbsp;</td>

				<td style="width: 197px" class="auto-style22">&nbsp;</td>

			</tr>

		</table>

		</td>

	</tr>
<?php
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
?>
	<tr>

		<td class="style5" colspan="5">

		<input name="btnSubmit" type="button" value="Save as draft" onclick="Javascript:Validate();" class="auto-style22" style="font-weight: 700">
		<input name="btnFinalSubmit" type="button" value="Submit" onclick="Javascript:Validate1();" class="auto-style22" style="font-weight: 700">
		</td>

	</tr>
<?php
}
?>
	</form>

</table>



	</div>
	<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>




</body>



</html>

