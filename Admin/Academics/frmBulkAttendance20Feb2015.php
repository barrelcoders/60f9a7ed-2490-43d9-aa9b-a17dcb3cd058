<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
/*
		if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
		{
			$class = $_REQUEST["cboClass"];
			$SelectedClass = $_REQUEST["cboClass"];
			$ssql="SELECT distinct `sname`,`srollno` FROM `student_master` a  where  `sclass`='$class' ORDER BY CAST(`srollno` AS UNSIGNED )";
			
			$rs= mysql_query($ssql);	
		} 
*/
if ($_REQUEST["isSubmit"]=="yes")
{
	$Dt = $_REQUEST["txtDate"];
	$arr=explode('/',$Dt);
	$AttandanceDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$TotalClass=$_REQUEST["totalClass"];
	for ($i=1;$i<=$TotalClass;$i++)
	{
		
		$ctrlClass="txtClass".$i;
		$ctrlAbsentee="txtAbsentees".$i;
		//$strClass=$strClass.$_REQUEST[$ctrlClass].",";
		$Class =$_REQUEST[$ctrlClass];
		$strAbsentee=$_REQUEST[$ctrlAbsentee];
		$rsCheck=mysql_query("select * from `attendance` where `sclass`='$Class' and `attendancedate`='$AttandanceDt'");
		if (mysql_num_rows($resultchk) == 0)
		{
			if($strAbsentee == "0")
			{
				//ALL THE STUDENTS ARE PRESENT NO ONE IS ABSENT
				$rsStudentDetail=mysql_query("select `sname`,`srollno`,`sclass` from `student_master` where `sclass`='$Class'");
				while($row = mysql_fetch_assoc($rsStudentDetail))
   				{
   					$StudentName=$row['sname'];  
   					$StudentRollNo=$row['srollno'];  
   					$StudentClasss=$row['sclass'];  
   					$ssql="INSERT INTO `attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) VALUES ('$StudentName','$StudentRollNo','$StudentClasss','$AttandanceDt','P')";
   					mysql_query($ssql) or die(mysql_error());	
   				}
				
			}
			elseif ($strAbsentee != "")
			{
				//COMMA SEPERATED ROLL NOs ARE ABSENTS
				$arrAbsent=explode(',',$strAbsentee);
	
				$rsStudentDetail=mysql_query("select `sname`,`srollno`,`sclass` from `student_master` where `sclass`='$Class'");
				while($row = mysql_fetch_assoc($rsStudentDetail))
   				{
   					$StudentName=$row['sname'];  
   					$StudentRollNo=$row['srollno'];  
   					$StudentClasss=$row['sclass'];
   					//$pos= strpos("I love php, I love php too!","I love");
   					//$pos= strpos($strAbsentee,$StudentRollNo);
   					//if ($pos !== false)
					$RollNoFound="no";
						foreach ($arrAbsent as $value) 
						{
							if($value==$StudentRollNo)
							{
	   		 					$RollNoFound="yes";
	   		 				}
						}
					if ($RollNoFound=="yes")	
					{
						//echo "String Found";//ABSENTEES ROLL NO IS FOUND WITH STUDENT ROLL NO
						
							$ssql="INSERT INTO `attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) VALUES ('$StudentName','$StudentRollNo','$StudentClasss','$AttandanceDt','A')";
		   					mysql_query($ssql) or die(mysql_error());	
		   				
					}
					else
					{
						//echo "String Not Found";
						$ssql="INSERT INTO `attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) VALUES ('$StudentName','$StudentRollNo','$StudentClasss','$AttandanceDt','P')";
	   					mysql_query($ssql) or die(mysql_error());	
					}
   				}//END OF WHILE LOOP FOR STUENT_MASTER TABLE
			}//END OF ELSEIF CONDITION WHERE STRING OF ABSENTEE IS NOT BLANK MEANS HAVING COMMA SEPEATED VALUES
			
		}//END OF rsCheck which checks weather attandance for perticular class and date is applied or not previous.		
	}//END OF FOR LOOP WHICH LOOPING FOR FORM CLASSED SUBMITTED
	//echo substr($strClass,0,strlen($strClass)-1);
	exit();
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
	if (document.getElementById("txtDate").value=="Attendance Date")
	{
		alert("Please select Date !");
		return;
	}
	
	/*
	TotalClass=document.getElementById("totalClass").value;
	strClass="";
	for(i=1;i<= TotalClass;i++)
	{
		//ctrlClass= 'txtClass' + i;
		strClass=strClass + document.getElementById('txtClass' + i).value + ',';
		
		//strClass=strClass + document.getElementById(ctrlClass).value + ",";
	}
	strClass=strClass.substr(0,strClass.length-1);
	alert(strClass);
	return;
	*/
	
	//document.getElementById("frmClassWork").action="SubmitfrmAttendance.php";
	document.getElementById("frmAttandance").submit();
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

	</tr></table><table cellspacing="0" cellpadding="0" width="100%">	
	<form name="frmAttandance" id="frmAttandance" method="post" action="frmBulkAttendance.php">	
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes" class="auto-style23">
	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			&nbsp;</td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		&nbsp;</td>

	</tr>

	

	<tr>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 318px">&nbsp;</td>

		<td class="style2" style="border-style:none; border-width:medium; width: 319px">

		

			<span class="auto-style23">

		

			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->

			</span>

			<span class="auto-style23"> &nbsp;</span></td>

		<td class="auto-style26" style="border-style:none; border-width:medium; width: 319px">
		Attendance Date:</td>

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

			
			<tr>

				<td style="width: 353px; height: 36px;" class="style7"><strong>Class</strong></td>

				<td style="width: 353px; height: 36px;" class="style8">

				<strong>Absentees</strong></td>

				<td style="width: 354px; height: 36px;" class="style8">

				<strong>Absentees Name</strong></td>

			</tr>
			<?php
				$Cnt=0;
				while($row = mysql_fetch_assoc($result))
   				{
   					$Class=$row['class'];  
   					$Cnt = $Cnt+1; 					
			?>
			<tr>

				<td style="width: 353px; height: 21px;" class="style7">

				<input name="txtClass<?php echo $Cnt;?>" id="txtClass<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Class; ?>" readonly class="auto-style23"></td>
				<td style="width: 353px; height: 21px;">
				<input name="txtAbsentees<?php echo $Cnt;?>" id="txtAbsentees<?php echo $Cnt;?>" type="text" style="width: 349px"></td>
				<td style="width: 354px; height: 21px;">
				<input name="txtAbsenteesName<?php echo $Cnt;?>" id="txtAbsenteesName<?php echo $Cnt;?>" type="text" style="width: 348px"></td>
			</tr>
			<?php				
			}
			?>
			<br><br>
			<input type="hidden" name="totalClass" id="totalClass" value="<?php echo $Cnt; ?>">

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

