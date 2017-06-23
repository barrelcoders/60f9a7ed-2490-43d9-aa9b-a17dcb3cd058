<?php
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
	$StudentClass = $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	//$ssqlClass="SELECT distinct `class` FROM `class_master`";
	$EmpId=$_SESSION['userid'];
	$ssqlClass = "SELECT distinct `class` FROM `class_master` where `class` in (select distinct `Class` from `teacher_class_mapping` where `EmpID`='$EmpId') order by `class`";
	$rsClass= mysql_query($ssqlClass);


if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$SelectDate = $_REQUEST["txtDate"];

	//$arr=explode('/',$SelectDate);
	//$SearchDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	//$SelectedClass = $_REQUEST["cboClass"];
	$SelectedClasses = $_REQUEST["txtSelectedClass"];


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



	$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class` in (" . $SelectedClasses . ")";
	
	
	$rs= mysql_query($ssql);

}
if ($_REQUEST["SubmitType"]=="SubmitAssignment")
{
	$Class = $_REQUEST["cboClass"];

	$Dt = $_REQUEST["txtStartDate"];
	$arr=explode('/',$Dt);
	$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$Dt = $_REQUEST["txtFinishDate"];
	$arr=explode('/',$Dt);
	$EndDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$TotalSubject = $_REQUEST["totalSubject"]-1;

	$SelectedClasses= $_REQUEST["txtSelectedClass"];
		
	$ssqlMsg="select distinct `sclass` from `student_master` where `sclass` in (". $SelectedClasses . ")";
	//echo $ssqlMsg."<br>";
	$result = mysql_query($ssqlMsg, $Con);
	while($row = mysql_fetch_assoc($result))
   	{
   		$Tclass=$row['sclass'];
		for ($i=1;$i<=$TotalSubject;$i++)
		{
	
			$SubjectCtrlName="txtSubject" . $i;
			
			$RemarkCtrlName = "txtRemark" . $i;
			
			$FileCtrlName = "File" . $i;

			
	
			$Subject = $_REQUEST[$SubjectCtrlName];
	
			$Remarks = $_REQUEST[$RemarkCtrlName];
			
				  $extension = end(explode(".", $_FILES[$FileCtrlName]["name"]));
				  
				  if ($_FILES[$FileCtrlName]["tmp_name"] != "")
				  {
				  	$NewFileName=Date(Dmyhis).$_FILES[$FileCtrlName]["name"];
			      	//move_uploaded_file($_FILES[$FileCtrlName]["tmp_name"],"AssignmentFiles/" . $_FILES[$FileCtrlName]["name"]);
			      	move_uploaded_file($_FILES[$FileCtrlName]["tmp_name"],"AssignmentFiles/" . $NewFileName);
			      	
			      	
			      	//$AssignmentURL = $BaseURL."Admin/Academics/AssignmentFiles/" . $_FILES[$FileCtrlName]["name"];
			      	$AssignmentURL = $BaseURL."Admin/Academics/AssignmentFiles/" . $NewFileName;
			      	
			      	$ssql="INSERT INTO `assignment` (`class`,`subject`,`assignmentdate`,`assignmentcompletiondate`,`remark`,`assignmentURL`,`status`) VALUES ('$Tclass','$Subject','$StartDt','$EndDt','$Remarks','$AssignmentURL','Active')";
			      	//echo $ssql."<br>";
			      	mysql_query($ssql) or die(mysql_error());
			      }
	
	
			//echo $_REQUEST[$ClassworkCtrlName] . "<br>";
			$Message="Assignment submitted successfully!";
	
		}//Ebd of For Loop
	}//End of While Loop
	
	//***********SENDING GCM**************
		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Assignment'";
   		$reslt = mysql_query($ssqlActivity , $Con);
    while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$message1=$rowa['gcm_message'];
	   		$message1=str_replace(" ","%20",$message1);    
	   }
		
		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass`='$SelectedClass'";
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass` in (". $SelectedClasses . ")";
		
		
		
   		$result = mysql_query($ssqlGCM , $Con);
    while($row = mysql_fetch_assoc($result))
	   {
	   		$registrationIDs = $row['GCMAccountId'];
		    
		    //$url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
			$url1 = 'http://aravalisisgcm.in/school/SendGCMAIS43.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
		    
		    //Class work message---------------------------------------
		    // create a new cURL resource
				$ch = curl_init();
				
				// set URL and other appropriate options
				curl_setopt($ch, CURLOPT_URL, $url1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				
				// grab URL and pass it to the browser
				curl_exec($ch);
				
				// close cURL resource, and free up system resources
			
			if(curl_errno($ch))
			{ 
				echo 'Curl error: ' . curl_error($ch); 
			}
			curl_close($ch);
			
	   }
}

$ssql="select `subject`,`class`,`remark`,`assignmentdate`,`assignmentcompletiondate`,`assignmentURL` ,`srno` from  `assignment` where `class` in (select distinct `Class` from `teacher_class_mapping` where `EmpID`='$EmpId') order by `datetime` desc";
$reslt = mysql_query($ssql , $Con);
    
	
?>

<script language="javascript">

function Validate()
{
	if(document.getElementById("txtStartDate").value == "Select Date")
	{
		alert("Assignment Start Date is mandatory!");
		return;
	}
	if(document.getElementById("txtFinishDate").value == "Select Date")
	{
		alert("Assignment End Date is mandatory!");
		return;
	}
	
	if(document.getElementById("txtStartDate").value != "Select Date" && document.getElementById("txtFinishDate").value != "Select Date")
	{
			if (Date.parse(document.getElementById("txtStartDate").value) > Date.parse(document.getElementById("txtFinishDate").value))
			{
				alert ("Assignment Start Date can not be after then Finish Date!");
				return;
			}
	}
	
	//document.getElementById("frmAssignment").action = "SubmitUploadAssignment.php";
	document.getElementById("SubmitType").value="SubmitAssignment";
	document.getElementById("frmAssignment").submit();
	
	
}


function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("DeleteAssignment.php?srno=" + SrNo ,"","width=400,height=350");
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

function ReloadWithSubject()
{
	if (document.getElementById("cboClass").value=="Select One")
	{
		alert ("Please select class!");
		return;
	}
	//document.getElementById("txtSelectedClass").value = document.getElementById("cboClass").value;
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmAssignment").submit();
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

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Upload Extra Curricular Activity</title>

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

	font-family: Cambria;

	font-weight: bold;

	font-size: 15px;

	color: #000000;
	
	border-width: 1px;

}

.style8 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}

.auto-style5 {
	text-align: left;
	font-family: Calibri;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}
.auto-style3 {
	color: #000000;
}
.auto-style6 {
	font-size: small;
}



.auto-style31 {
	font-family: Calibri;
}
.auto-style32 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria;
}
.auto-style33 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	font-size: 15px;
	color: #FFFFFF;
}
.auto-style34 {
	color: #000000;
}
.auto-style35 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
	text-align: center;
}
.auto-style36 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	font-size: 15px;
}
.auto-style37 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
}

.style9 {
	border-style: solid;
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
	border-width: 1px;
}

.style10 {
	color: #000000;
}
.style11 {
	text-align: center;
}

.auto-style22 {
	color: #000000;
}

</style>

</head>



<body>

<p>&nbsp;</p>

<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3"><b>Assignment Upload</b></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px">
<a href="javascript:history.back(1)">
<font face="Cambria">
<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>
<form name="frmAssignment" id="frmAssignment" method="post" action="UploadAssignmentOld.php" enctype="multipart/form-data">
	<font face="Cambria">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="<?php echo $SelectedClasses; ?>">
	</font>
<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style9">

	
	
	<tr>

		<td style="width: 118px; height: 47px" class="style1">

		
		Select Class</td>

		<td style="width: 265px; height: 47px" class="style1">

		<?php
			if ($SelectedClass !="")
			{
		?>
		<font face="Cambria">
		<input type="text" name="MyClass" id="MyClass" value="<?php echo $SelectedClass; ?>" readonly="readonly"></font>
		<?php 
		}
		else
		{
		?>
		<font face="Cambria">
		<select name="cboClass" id="cboClass" size="7" multiple style="width: 174px" onclick="Javascript:GetSelectedValue();" class="auto-style22">
			<option selected="" value="Select One">Select One</option>
			<?php
			while($row1 = mysql_fetch_row($rsClass))
			{
					$Class=$row1[0];
		?>
			<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
			<?php
				}
			?>
			</select></font>
		<?php 
		}
		?>
		</td>

		<td style="width: 188px; height: 47px;" class="style1">

		
		Assignment Start Date</td>

		<td style="height: 47px; width: 188px;">

		<font face="Cambria">

		<input type="text" name="txtStartDate" id="txtStartDate" size="15" value="Select Date" class="tcal" style="color: #000000"></font>				
		</td>

		<td style="height: 47px; width: 188px;">
		
		Assignment Finish Date</td>

		<td style="height: 47px; width: 188px;">
		
		<font face="Cambria">
		
		<input type="text" name="txtFinishDate" id="txtFinishDate" size="15" value="Select Date" class="tcal" style="color: #000000"></font></td>

		<td style="height: 47px; width: 62px;">		
		<font face="Cambria">		
		<input name="btnSubmit" id="btnSubmit" type="button" value="Submit" onclick="ReloadWithSubject();" style="font-weight: 700"></font></td>
	</tr>
	
	

</table><font face="Cambria"><br>
	</font>
<table class="auto-style32" style="width: 100%">
	<tr>
		<td class="auto-style35" style="width: 397px"><b><span class="auto-style34">Subject</span></b></td>
		<td class="auto-style35" style="width: 398px"><b>Remarks</b></td>
		<td  class="auto-style35" style="width: 398px"><b>Select URL</b></td>
	</tr>
	<?php

				$Cnt=1;

				while($row = mysql_fetch_assoc($rs))
   				{

   					$subject=$row['subject'];

	?>
	<tr>
		<td class="auto-style35" style="width: 397px"><font face="Cambria"><input name="txtSubject<?php echo $Cnt; ?>" id="txtSubject<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $subject; ?>" readonly></font></td>
		<td class="auto-style35" style="width: 398px">
		<font face="Cambria">
		<textarea name="txtRemark<?php echo $Cnt; ?>" id="txtRemark<?php echo $Cnt; ?>" rows="3" style="width: 313px"><?php echo $EneteredClassWork; ?></textarea></font>
		</td>
		<td  class="auto-style35" style="width: 398px">		
			<font face="Cambria">		
			<input name="File<?php echo $Cnt; ?>" id="File<?php echo $Cnt; ?>" type="file" style="font-weight: 700"></font>
		</td>
	</tr>
	<?php

				$Cnt = $Cnt+1;
				ob_end_flush(); 
    				ob_flush(); 
    				flush(); 
    				ob_start();

			}

	?>
	<font face="Cambria">
	<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>">
	</font>
</table>

	<p align="center"><font face="Cambria">

		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700"><br>
	</font></p>
</form>
<div class="style11">
<font face="Cambria">
<br>
<br><span class="style10"><strong><?php echo $Message; ?></strong></span> </font> </div>
<table class="auto-style32" style="width: 100%">
	
	<tr>
		<td class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Subject</strong></td>
		<td class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Class</strong></td>
		<td class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Remarks</strong></td>
		<td  class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Assignment Start Date</strong></td>
		<td  class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Assignment Finish Date</strong></td>
		<td class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Download Doc.</strong></td>	
		<td class="auto-style35" style="width: 199px" bgcolor="#95C23D"><strong>Delete</strong></td>		
	</tr>
	
	<?php
		while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$srno=$rowa['srno'];

	   		$subject=$rowa['subject'];
	   		$class=$rowa['class'];
	   		$remark=$rowa['remark'];
	   		$assignmentdate=$rowa['assignmentdate'];
	   		$assignmentcompletiondate=$rowa['assignmentcompletiondate'];
	   		$assignmentURL=$rowa['assignmentURL'];   		
	?>
	<tr>
		<td class="style8" style="width: 199px"><?php echo $subject; ?></td>
		<td class="style8" style="width: 199px"><?php echo $class; ?></td>
		<td class="style8" style="width: 199px"><?php echo $remark; ?></td>
		<td  class="style8" style="width: 199px"><?php echo $assignmentdate; ?></td>
		<td  class="style8" style="width: 199px"><?php echo $assignmentcompletiondate; ?></td>
		<td class="style8" style="width: 199px"><a href="<?php echo $assignmentURL; ?>" target="_blank">Download</a></td>	
		<td class="style8" style="width: 199px"><a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style14">Remove</a></td>		
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