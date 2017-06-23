<?php
include '../../connection.php';
include '../Header/Header3.php';
session_start();
?>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$SelectedClass=$_REQUEST["cboClass"];
	   //For New Students
	   //$ssql="SELECT `srno` , `sadmission`,`sname` ,`sclass`,`srollno` FROM `student_master` where `sclass`='$SelectedClass' and `previous_sclass`='' order by `srollno`";
	   
	   $ssql="SELECT `srno` , `sadmission`,`sname` ,`sclass`,`srollno` FROM `student_master` where `sclass`='$SelectedClass'  order by `srollno`";
	//echo $ssql;
	//exit();
	$rs= mysql_query($ssql);
}


//$ssqlClass="SELECT distinct `class` FROM `class_master`";
$ssqlClass="SELECT distinct `sclass` FROM `student_master`";
$rsClass= mysql_query($ssqlClass);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
?>
<script language="javascript">

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}

function Validate(cnt,sadmission)
{
	var sclass="";
	var RollNo="";

	
		var ctrlClass="cboAllotClass" + cnt;
		//var ctrlRollNo="txtAllotRollNo" + cnt;
		var ctrlCurrentClass="txtCurrentClass" + cnt;
		sclass=document.getElementById(ctrlClass).value;
		var CurrentClass=document.getElementById(ctrlCurrentClass).value;
		var AllotMasterClass=document.getElementById("cboAllotMasterClass" + cnt).value;
		
		
		if(sclass=="Select One")
		{
			alert("Please select class!");
			return;
		}
		if(AllotMasterClass=="Select One")
		{
			alert("Please select Master Class!");
			return;
		}
		var myWindow = window.open("ValidateClassRollNo4.php?Allottedsclass=" + sclass + "&CurrentClass=" + CurrentClass + "&AllottedMasterClass=" + AllotMasterClass + "&sadmission=" + sadmission, "", "width=200, height=100");	
}

function ValidateClassRollNo(sclass,rollNo,cnt)
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
		        		if (rows != "Already Exists")
		        		{
			        		alert(rows);
			        		var ctrlButton="btnAllot" + cnt;
			        		document.getElementById(ctrlButton).disabled="true";
			        		return;
		        		}
		        		else
		        		{
		        			alert(rows);
		        			return;
		        		}
				}
		}
		var submiturl="ValidateClassRollNo.php?Class=" + sclass + "&RollNo=" + rollNo;
		xmlHttp.open("GET", submiturl,true);
		xmlHttp.send(null);
}
</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Promote Students</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style1 {
	
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	}

.style11 {
	border-width: 1px;
}
.style12 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	font-weight: bold;
}

.auto-style10 {
	
	text-align: right;
}

.auto-style11 {
	

	text-align: left;
	font-family: Cambria;
	color: #000000;
}
.auto-style12 {
	
	text-align: left;
}

.auto-style13 {
	color: #000000;
}
.auto-style15 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none underline;
}
.auto-style16 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
}
.auto-style17 {
	border-style: none;
	border-width: medium;
	color: #FFFFFF;
}
.auto-style18 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style19 {
	border-collapse: collapse;
	border-width: 0;
}

.auto-style5 {
	text-align: left;
	font-family: Calibri;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
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
<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">
		<tr>
		<td>
		&nbsp;<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">
			<tr>
				<td class="auto-style17">
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>Promote Students</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="images/BackButton.png" width="70" style="float: right"></a></p>
				
				</table>
	
	<table class="auto-style7" style="width: 100%">
		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="PromoteStudent.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
			<tr>
	
	<td class="auto-style6" width="22%">
				<span style="text-decoration:none; font-weight:700" class="auto-style3">Select 
				Class For Promotion</span></td>
	
	<td class="auto-style13">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box">

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
		</select>&nbsp;&nbsp;&nbsp; </font></span>
				<font face="Cambria">
				<input name="Button1" type="button" value="Proceed" onclick ="Javascript:Validate2();" class="text-box"></font></td>
	
			</tr>
			<tr>
	
	<td class="auto-style6" colspan="2" align="center" height="30">
				&nbsp;</td>
	
			</tr>
	</form>
	</table>
	
	<table  id="table3" class="CSSTableGenerator">
		<form name="frmAllotClassRollNo" id="frmAllotClassRollNo" method="post" action="SubmitAllotClass.php">

			<tr>

				<td height="28" bgcolor="#95C23D" align="center" style="width: 90px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>

				<td height="28" bgcolor="#95C23D" align="center" style="width: 172px" class="style12">

				Admission Id</td>
				
				<td height="28" bgcolor="#95C23D" align="center" style="width: 248px" class="style12">

				Student Name</td>
				
				<td height="28" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Current Class</td>

				<td height="28" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Master Class</td>

				<td height="28" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Promote To

				Class</td>

				<td height="28" bgcolor="#95C23D" align="center" style="width: 238px" class="style12">

				Action</td>

							</tr>

			<?php
				$num_rows=1;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sadmission=$row[1];
					$sname=$row[2];
					$sclass=$row[3];
					$srollno=$row[4];					

			?>

			<tr>

				<td height="38" align="center" style="width: 90px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $num_rows; ?></span></td>

				<td height="38" align="center" style="width: 172px" class="style11">

				<font face="Cambria">

				<?php echo $sadmission;?></font></td>
				
				<td height="38" align="center" style="width: 248px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $sname; ?></span></td>
				
				<td height="38" align="center" style="width: 238px" class="style11">
				
				<input name="txtCurrentClass<?php echo $num_rows; ?>" class="text-box" id="txtCurrentClass<?php echo $num_rows; ?>" type="text" value="<?php echo $SelectedClass;?>" readonly="readonly"></td>
				
				<td height="38" align="center" style="width: 238px" class="style11">
				<select name="cboAllotMasterClass<?php echo $num_rows; ?>" id="cboAllotMasterClass<?php echo $num_rows; ?>">
				<option selected="" value="Select One">Select One</option>
				<?php
					$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
					$rsClass1= mysql_query($ssqlClass);
				while($row1 = mysql_fetch_row($rsClass1))
				{
							$Class=$row1[0];
				?>
				<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
				<?php
				}
				?>
				</select>

				</td>
				
				<td height="38" align="center" style="width: 238px" class="style11">
				
				<font face="Cambria">
				
				<select name="cboAllotClass<?php echo $num_rows; ?>" class="text-box" id="cboAllotClass<?php echo $num_rows; ?>">
				<option selected="" value="Select One">Select One</option>
				<?php
					$ssqlClass="SELECT distinct `class` as `class` FROM `class_master`";
					$rsClass1= mysql_query($ssqlClass);
				while($row1 = mysql_fetch_row($rsClass1))
				{
							$Class=$row1[0];
				?>
				<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
				<?php
				}
				?>
				</select>
				</font></td>
				
				<td height="38" align="center" style="width: 238px" class="style11">
				
				<font face="Cambria">
				
				<input name="btnAllot<?php echo $num_rows; ?>" id="btnAllot<?php echo $num_rows; ?>"  type="button" value="Promote" onclick="Javascript:Validate('<?php echo $num_rows; ?>','<?php echo $sadmission;?>');" ></font></td>
				
				</tr>

			<?php
			$num_rows=$num_rows+1;
			}

			?>
			<font face="Cambria">
			<input type="hidden" name="txtTotalStudent" id="txtTotalStudent" value="<?php echo $num_rows-1;?>">
			</font>
			<tr>

				<td height="39" align="center" class="style11" colspan="6">

				<font face="Cambria">
				<!--
				<input name="btnSubmit" type="button" value="Submit" style="font-weight: 700">
				-->
				</font></td>

				</tr>
		</form>
			
		</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>
<?php include "footer.php";?>
<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>-->

</body>



</html>