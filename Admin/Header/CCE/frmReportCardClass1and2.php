<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
   $sql = "SELECT distinct `class` FROM `class_master` where `MasterClass` in ('1','2')";
   $result = mysql_query($sql, $Con);
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedExamType = $_REQUEST["examtype"];
	
	//$ssql="SELECT distinct `sname`,`srollno`,`sadmission` FROM `student_master` a  where  `sclass`='$class' ORDER BY CAST(`srollno` AS UNSIGNED ) limit 5";
	$ssql="SELECT distinct `sname`,`srollno`,`sadmission` FROM `student_master` a  where  `sclass`='$class' ORDER BY CAST(`srollno` AS UNSIGNED )";
	
	$rs= mysql_query($ssql);	
}
if($_REQUEST["SubmitType"]=="FinalSubmit")
{
	$SelClass=$_REQUEST["txtClass"];
	//$examtype=$_REQUEST["examtype"];
	$examtype=$_REQUEST["txtexamtype"];
	$TotalStudent=$_REQUEST["totalStudent"];
	for($i=1;$i<=$TotalStudent;$i++)
	{
		$hsadmission=$_REQUEST["hsadmission".$i];
		$txtName=$_REQUEST["txtName".$i];
		$txtRollNo=$_REQUEST["txtRollNo".$i];
		
		$cboAssignmentGrade=$_REQUEST["cboAssignmentGrade".$i];
		$assignmentproject=$_REQUEST["assignmentproject".$i];
		$cboPencilGrade=$_REQUEST["cboPencilGrade".$i];
		$ppassignment=$_REQUEST["ppassignment".$i];
		
		$cboNumeracyGrade=$_REQUEST["cboNumeracyGrade".$i];
		$txtnumeracy=$_REQUEST["txtnumeracy".$i];
		$cboEnvironmentGrade=$_REQUEST["cboEnvironmentGrade".$i];
		$txtEnvironment=$_REQUEST["txtenvironment".$i];
		//$txtSuggestion=$_REQUEST["txtSuggestion".$i];
		
		$EnvGrade=$_REQUEST["cboEnvironmentGrade".$i];
		$EnvIndcatorValue=$_REQUEST["txtselfenv".$i];
		
		$starranking=$_REQUEST["starranking".$i];
		//echo "INSERT INTO `reportcard_Class1and2_values` (`sadmission`,`sname`,`class`,`RollNo`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`StarRating`) VALUES ('$hsadmission','$txtName','$SelClass','$txtRollNo','$examtype','$cboAssignmentGrade','$assignmentproject','$cboPencilGrade','$ppassignment','$starranking')"."<br>";  
		$rsChk=mysql_query("select * from `reportcard_Class1and2_values` where `sadmission`='$hsadmission' and `examtype`='$examtype'");
		if (mysql_num_rows($rsChk) > 0)
		{
			mysql_query("update `reportcard_Class1and2_values` set `AssignmentGrade`='$cboAssignmentGrade',`AssignmentIndicatorValue`='$assignmentproject',`PencilGrade`='$cboPencilGrade',`PenPencilIndicatorValue`='$ppassignment',`NumeracyGrade`='$cboNumeracyGrade',`NumeracyIndicatorValue`='$txtnumeracy',`EnvironmentGrade`='$EnvGrade',`EnvironmentIndicatorValue`='$EnvIndcatorValue',`StarRating`='$starranking' where `sadmission`='$hsadmission' and `examtype`='$examtype'") or die(mysql_error());
		}
		else
		{
			mysql_query("INSERT INTO `reportcard_Class1and2_values` (`sadmission`,`sname`,`class`,`RollNo`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`NumeracyGrade`,`NumeracyIndicatorValue`,`EnvironmentGrade`,`EnvironmentIndicatorValue`,`StarRating`) VALUES ('$hsadmission','$txtName','$SelClass','$txtRollNo','$examtype','$cboAssignmentGrade','$assignmentproject','$cboPencilGrade','$ppassignment','$cboNumeracyGrade','$txtnumeracy','$EnvGrade','$EnvIndcatorValue','$starranking')") or die(mysql_error());
		}	
	}	
echo "<br><br><center><b>Submitted Successfully!";
exit();
 //mysql_query("INSERT INTO `reportcard_Class1and2_values` (`sadmission`,`sname`,`class`,`RollNo`,`examtype`,`AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`StarRating`) VALUES ('$hsadmission','$txtName','$SelClass','$txtRollNo','$examtype','$cboAssignmentGrade','$assignmentproject','$cboPencilGrade','$ppassignment','$starranking')") or die(mysql_error());
}
?>   
<script language="javascript">
function ReloadWithSubject()
{
	if(document.getElementById("cboClass").value=="Select One")
	{
		alert("Class is mandatory!");
		return;
	}
	if(document.getElementById("examtype").value=="Select One")
	{
		alert("Exam Type is mandatory!");
		return;
	}
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
}

function Validate()
{
	if(document.getElementById("txtexamtype").value=="Select One" || document.getElementById("txtexamtype").value=="")
	{
		alert("Exam Type is mandatory!");
		return;
	}
	var TotalSubject=document.getElementById("totalStudent").value;
	for(var i=1;i<=TotalSubject;i++)
	{
		if(document.getElementById("cboAssignmentGrade"+i).value=="Select One")
		{
			alert("Grade for Assignment & Project is mandatory for all student!");
			return;
		}
		if(document.getElementById("cboPencilGrade"+i).value=="Select One")
		{
			alert("Grade for Pencil & Paper is mandatory for all Student!");
			return;
		}
		if(document.getElementById("cboEnvironmentGrade"+i).value=="Select One")
		{
			alert("Grade for Self and Environment is mandatory for all Student!");
			return;
		}
		if(document.getElementById("starranking"+i).value=="Select One")
		{
			alert("Star Ranking is mandatory for all student!");
			return;
		}
	}
	
	document.getElementById("SubmitType").value="FinalSubmit";
	document.getElementById("frmClassWork").submit();
}

function fnlExam()
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
						removeAllOptions(document.frmClassWork.examtype);

			        	//document.getElementById("txtName").value="";

			        	addOption(document.frmClassWork.examtype,"Select One","Select One")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        			addOption(document.frmClassWork.examtype,arr_row[row_count],arr_row[row_count])			        			 

			        	}

						//alert(rows);														

			        }

		      }



			var submiturl="GetExamType.php?Class=" + document.getElementById("cboClass").value + "";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);

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

function getGradDesc(cnt,indicatortype)
{
	var ctrlGrade="cboAssignmentGrade"+cnt;
	//alert(document.getElementById("cboAssignmentGrade"+cnt).value);
	if(indicatortype=="Assignment")
	{
		var ctrlvalue=document.getElementById("cboAssignmentGrade"+cnt).value;
	}
	if(indicatortype=="Pencil")
	{
		var ctrlvalue=document.getElementById("cboPencilGrade"+cnt).value;
	}
	if(indicatortype=="Numeracy")
	{
		var ctrlvalue=document.getElementById("cboNumeracyGrade"+cnt).value;
		
	}
	if(indicatortype=="Environment")
	{
		var ctrlvalue=document.getElementById("cboEnvironmentGrade"+cnt).value;
	}
	
	ctrlvalue=ctrlvalue.replace("+","plus");
	
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
			        	
			        	if(indicatortype=="Assignment")
			        	{
			        		document.getElementById("assignmentproject"+cnt).value=rows;
			        	}
			        	if(indicatortype=="Pencil")
			        	{
			        		document.getElementById("ppassignment"+cnt).value=rows;
			        	}
			        	if(indicatortype=="Numeracy")
						{
							document.getElementById("txtnumeracy"+cnt).value=rows;
						}
						if(indicatortype=="Environment")
						{
							document.getElementById("txtselfenv"+cnt).value=rows;
						}
						//alert(rows);														
			        }
		      }
			var submiturl="GetDescriptiveIndicator.php?Grade=" + escape(ctrlvalue) + "&Class="+ document.getElementById("txtClass").value + "&indicatortype=" + indicatortype;
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

<title>Upload Class 1 and 2 Report Card</title>

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

.style7 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
}

.style8 {
	text-align: center;
}

</style>

</head>



<body>



<div class="style8">



<p>&nbsp;</p>



<table style="width: 100%" class="style1">

	<tr>

		<td class="style4" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">



				<div class="auto-style21">



					<u>



					<strong>Upload Class 1 and 2 Report Card</strong></u></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<img height="28" src="images/BackButton.png" width="70" style="float: right"></a></p>

				

				</td>		

	</tr>

	<tr>

		<td class="auto-style24" width="1241" style="background-color: #95C23D; border-left-style:none; border-left-width:medium">
		<b>Upload Student Report Card</b></td>		

	</tr></table><table cellspacing="0" cellpadding="0" width="100%">	
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmReportCardClass1and2.php">	

	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style23">

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">
		&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			&nbsp;</td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">
		&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		&nbsp;</td>

	</tr>

	

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">
		<b>Class</b>: </td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			<span class="auto-style23">

		

			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->

			</span>
			<?php
			if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
			{
			?>
			<input type="text" name="txtClass" id="txtClass" value="<?php echo $class;?>" readonly="readonly">
			<?php
			}
			else
			{
			?>
			<select name="cboClass" id="cboClass" class="auto-style23" onchange="Javascript:fnlExam();">

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
			<span class="auto-style23"> </span>

		</td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">
		<b>Exam Type:</b></td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		<span class="auto-style23">

		<!--

		<select name="cboSubject" id="cboSubject">

		<option></option>

		<option selected="" value="Select One">Select One</option>

		</select>

		-->

		</span>

				<?php
				if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
				{
				?>
				<input type="text" name="txtexamtype" id="txtexamtype" value="<?php echo $SelectedExamType;?>">
				<?php
				}
				else
				{
				?>
			
				<select name="examtype" id="examtype" onchange="Javascript:ReloadWithSubject();">
						 <option selected="" value="Select One">Select One</option>
						 
			</select>
			<?php
			}
			?>
			</td>

	</tr>

	

	<tr>

		<td class="style3" colspan="4" style="border-bottom-style: none; border-bottom-width: medium; height: 59px;">
	<?php
	if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
	{
	?>

		<table width="100%" cellpadding="0" class="style6" >

			<tr>

				<td style="border-style:solid; border-width:1px; height: 36px; width: 248px" class="style7" bgcolor="#95C23D">
				<b>Student Name:</b></td>

				<td style="border-style:solid; border-width:1px; height: 36px; width: 248px" class="style7" bgcolor="#95C23D">
				<b>Roll No.</b></td>

				<td style="border-style:solid; border-width:1px; height: 36px; width: 248px" class="style7" bgcolor="#95C23D">

				<b>Grade</b></td>

				<td style="border-style:solid; border-width:1px; height: 36px; width: 248px" class="style7" bgcolor="#95C23D">

				<b>Assignment &amp; Project</b></td>
				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Grade</b></td>
				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Pencil &amp; Paper Assessment</b></td>
				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Grade</b></td>

				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Numeracy Concepts</b></td>

				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Grade</b></td>

				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Self and Environment</b></td>

				<td class="style8" style="border-style:solid; border-width:1px; width: 248px" bgcolor="#95C23D">
				<b>Star Ranking</b></td>

			</tr>
			<?php

				$Cnt=0;
				while($row = mysql_fetch_assoc($rs))
   				{
   					$Name=$row['sname'];
   					$RollNo=$row['srollno'];
   					$sadmission=$row['sadmission'];
   					
   					$Cnt = $Cnt+1;
			?>
			<tr>

				<td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">
				<input type="hidden" name="hsadmission<?php echo $Cnt;?>" id="hsadmission<?php echo $Cnt;?>" value="<?php echo $sadmission;?>">
				<input name="txtName<?php echo $Cnt;?>" id="txtName<?php echo $Cnt;?>" type="text" style="width: 148px" value="<?php echo $Name; ?>" readonly class="auto-style23" readonly="readonly"></td>

				<td style="border-style:solid; border-width:1px; height: 21px; width: 248px" class="style7">

				<input name="txtRollNo<?php echo $Cnt;?>" id="txtRollNo<?php echo $Cnt;?>" type="text" value="<?php echo $RollNo; ?>" class="auto-style23"  style=width:60px; readonly="readonly"></td>

				<?php
				$rsGrade1=mysql_query("select distinct `Grade` from `reportcard_Class1and2_indicators`");
				//echo "select distinct `AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`NumeracyGrade`,`NumeracyIndicatorValue`,`EnvironmentGrade`,`EnvironmentIndicatorValue`,`StarRating` from `reportcard_Class1and2_values` where `sadmission`='$sadmission' and `examtype`='$SelectedExamType'";
				//exit();
				$rsDet=mysql_query("select distinct `AssignmentGrade`,`AssignmentIndicatorValue`,`PencilGrade`,`PenPencilIndicatorValue`,`NumeracyGrade`,`NumeracyIndicatorValue`,`EnvironmentGrade`,`EnvironmentIndicatorValue`,`StarRating` from `reportcard_Class1and2_values` where `sadmission`='$sadmission' and `examtype`='$SelectedExamType'");
					$SubmittedAssignmentGrade="";
					$SubmittedAssignmentIndicatorValue="";
					$SubmittedPencilGrade="";
					$SubmittedPenPencilIndicatorValue="";
					$SubmittedNumeracyGrade="";
					$SubmittedNumeracyIndicatorValue="";
					$SubmittedEnvironmentGrade="";
					$SubmittedEnvironmentIndicatorValue="";
					$SubmittedStarRating="";
				while($rowSt = mysql_fetch_row($rsDet))
				{
					$SubmittedAssignmentGrade=$rowSt[0];
					$SubmittedAssignmentIndicatorValue=$rowSt[1];
					$SubmittedPencilGrade=$rowSt[2];
					$SubmittedPenPencilIndicatorValue=$rowSt[3];
					$SubmittedNumeracyGrade=$rowSt[4];
					$SubmittedNumeracyIndicatorValue=$rowSt[5];
					$SubmittedEnvironmentGrade=$rowSt[6];
					$SubmittedEnvironmentIndicatorValue=$rowSt[7];
					$SubmittedStarRating=$rowSt[8];
					break;
				}
				?>
				<td style="border-style:solid; border-width:1px; width: 248px; height: 21px" class="style7">

				<select name="cboAssignmentGrade<?php echo $Cnt;?>" id="cboAssignmentGrade<?php echo $Cnt;?>" onchange="javascript:getGradDesc('<?php echo $Cnt;?>','Assignment');">
				<option selected="" value="Select One">Select One</option>
				<?php
				while($rowG = mysql_fetch_row($rsGrade1))
				{
					$Grade1=$rowG[0];
				?>
				<option value="<?php echo $Grade1; ?>" <?php if($SubmittedAssignmentGrade==$Grade1) {?>selected="selected" <?php } ?> ><?php echo $Grade1; ?></option>
				<?php
				}
				?>
				</select></td>

				<td style="border-style:solid; border-width:1px; width: 248px; height: 21px" class="style7">
				<input name="assignmentproject<?php echo $Cnt;?>" id="assignmentproject<?php echo $Cnt;?>" type="text" readonly="readonly" value="<?php echo $SubmittedAssignmentIndicatorValue; ?>"></td>
				<?php
				$rsGrade2=mysql_query("select distinct `Grade` from `reportcard_Class1and2_indicators`");				
				?>				
				<td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">
				<select name="cboPencilGrade<?php echo $Cnt;?>" id="cboPencilGrade<?php echo $Cnt;?>" style="height: 22px" onchange="javascript:getGradDesc('<?php echo $Cnt;?>','Pencil');">
				<option selected="" value="Select One">Select One</option>
				<?php
							while($rowG2 = mysql_fetch_row($rsGrade2))
							{
									$Grade2=$rowG2[0];
							?>
						 <option value="<?php echo $Grade2; ?>" <?php if($SubmittedPencilGrade==$Grade2) { ?>selected="selected" <?php } ?>><?php echo $Grade2; ?></option>
						 <?php 
							}
							?>
				</select>
				</td>

				<td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">
				<input name="ppassignment<?php echo $Cnt;?>" id="ppassignment<?php echo $Cnt;?>" type="text" readonly="readonly" value="<?php echo $SubmittedPenPencilIndicatorValue;?>"></td>
				<?php
				$rsGrade3=mysql_query("select distinct `Grade` from `reportcard_Class1and2_indicators`");				
				?>
                 <td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">
                <select name="cboNumeracyGrade<?php echo $Cnt;?>" id="cboNumeracyGrade<?php echo $Cnt;?>" style="height: 22px" onchange="javascript:getGradDesc('<?php echo $Cnt;?>','Numeracy');">
				<option selected="" value="Select One">Select One</option>
							<?php
							while($rowG3 = mysql_fetch_row($rsGrade3))
							{
									$Grade3=$rowG3[0];
							?>
						 <option value="<?php echo $Grade3; ?>" <?php if($SubmittedNumeracyGrade==$Grade3) {?>selected="selected" <?php } ?>><?php echo $Grade3; ?></option>
						 <?php 
							}
							?>
				</td>
                 <td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">

				<input name="txtnumeracy<?php echo $Cnt;?>" id="txtnumeracy<?php echo $Cnt;?>" type="text" readonly="readonly" value="<?php echo $SubmittedNumeracyIndicatorValue;?>"></td>
				<?php
				$rsGrade4=mysql_query("select distinct `Grade` from `reportcard_Class1and2_indicators`");				
				?>

                 <td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">

                <select name="cboEnvironmentGrade<?php echo $Cnt;?>" id="cboEnvironmentGrade<?php echo $Cnt;?>" style="height: 22px" onchange="javascript:getGradDesc('<?php echo $Cnt;?>','Environment');">
				<option selected="" value="Select One">Select One</option>
							<?php
							while($rowG4 = mysql_fetch_row($rsGrade4))
							{
									$Grade4=$rowG4[0];
							?>
						 <option value="<?php echo $Grade4; ?>" <?php if($SubmittedEnvironmentGrade==$Grade4) {?>selected="selected" <?php } ?>><?php echo $Grade4; ?></option>
						 <?php 
							}
							?>
				</td>


                 <td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">

				<input name="txtselfenv<?php echo $Cnt;?>" id="txtselfenv<?php echo $Cnt;?>" type="text" readonly="readonly" value="<?php echo $SubmittedEnvironmentIndicatorValue;?>"></td>


                 <td style="border-style:solid; border-width:1px; width: 248px; height: 21px" align="center">

				<select name="starranking<?php echo $Cnt;?>" id="starranking<?php echo $Cnt;?>">
                <option selected="" value="Select One">SelectOne</option>
				<option value="1" <?php if ($SubmittedStarRating=="1") {?>selected="selected" <?php }?>>1</option>
                <option value="2" <?php if ($SubmittedStarRating=="2") {?>selected="selected" <?php }?>>2</option>
				<option value="3" <?php if ($SubmittedStarRating=="3") {?>selected="selected" <?php }?>>3</option>
				<option value="4" <?php if ($SubmittedStarRating=="4") {?>selected="selected" <?php }?>>4</option>
				<option value="5" <?php if ($SubmittedStarRating=="5") {?>selected="selected" <?php }?>>5</option>

				</select></td>


			</tr>
			<?php
			}
			?>

			<input type="hidden" name="totalStudent" id="totalStudent" value="<?php echo $Cnt; ?>">

			</table>
<?php
}//Close of If Block for submit first level
?>

		</td>

	</tr>

	<tr>

		<td class="style5" colspan="4" style="border-style: none; border-width: medium">

		<font face="Cambria">
		<?php
		if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
		{
		?>

		<input name="Submit" type="button" value="Submit"  class="auto-style23" style="font-weight: 700" onclick="javascript:Validate();"></font></td>
		<?php
		}
		?>
	</tr>

	</form>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld 
		Technologies LLP</font></div>

</div>





</div>





</body>



</html>