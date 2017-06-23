<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<?php
session_start();
$class=$_SESSION['StudentClass'];
$sadmission=$_SESSION['userid'];

if($sadmission== "")
	{
		echo "<br><br><center><b>You are not logged-in!<br>Please click <a href='http://dpsfsis.com/'>here</a> to login into parent portal!";
		exit();
	}

$rsChk=mysql_query("select * from `Student_Club_Activities9` where `sadmission`='$sadmission'");
if(mysql_num_rows($rsChk)>0)
{
	echo "<br><br><center><b>Already Submitted!";
	exit();
}
//$sadmission="10328";
$rsStudentDetail=mysql_query("select `sname`,`DOB`,`PlaceOfBirth`,`Sex`,`sclass`,`LastSchool`,`Address`,`Hostel`,`sfathername`,`FatherEducation`,`FatherOccupation`,`smobile`,`email`,`MotherName`,`MotherEducation` from `student_master` where `sadmission`='$sadmission'");
while($rowS=mysql_fetch_row($rsStudentDetail))
{
	$sname=$rowS[0];
	
	$DOB=$rowS[1];
	
	
}
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Circular</title>

<!-- link calendar resources -->
<script language="javascript">
function Validate()
{
    if(document.getElementById("txtName").value.trim()=="")
	{
		alert ("Name Id Mandatory!");
		return;
	}
	
	document.getElementById("frmNewStudent").submit();
}
</script>

	<link rel="stylesheet" type="text/css" href="../Admin/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../Admin/css/style.css" />

	<script type="text/javascript" src="../Admin/tcal.js"></script>
<style type="text/css">
.style7 {
	border-left-style: none;
	border-left-width: medium;
	text-align: center;
}
.style12 {
	border-left-width: 0px;
}
.auto-style1 {

	border-collapse: collapse;

	border: 0px solid #000000;

}

.auto-style6 {

	font-size: small;

}
.auto-style7 {

	border-collapse: collapse;

	border-width: 0px;

}

.auto-style11 {

	border-style: none;

	border-width: medium;

}

.auto-style16 {

	font-size: 12pt;

	color: #000000;

	margin-left: 13px;

	font-family: Calibri;

}

.auto-style18 {

	font-weight: bold;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style19 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style20 {

	font-weight: normal;

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style21 {

	font-family: Calibri;

	font-weight: normal;

	font-size: 12pt;

	color: #000000;

}

.auto-style23 {

	font-size: 12pt;

}

.auto-style25 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style26 {

	border-style: none;

	border-width: medium;

	font-size: 12pt;

	font-family: Calibri;

}
.auto-style30 {

	border: medium solid #FFFFFF;

	color: #000000;

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

.auto-style31 {

	font-family: Calibri;

}

.auto-style32 {

	font-size: small;

	font-family: Calibri;

	color: #000000;

}

.auto-style33 {

	font-size: 12pt;

	font-family: Calibri;

}

.auto-style34 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

}

.auto-style35 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

}
.auto-style36 {

	border-style: none;

	border-width: medium;

	text-align: right;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style38 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

	font-family: Calibri;

	font-size: medium;

	color: #000000;

}

.auto-style17 {

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style39 {

	border-style: none;

	border-width: medium;

	text-align: left;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

}

.auto-style40 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 11pt;

	color: #000000;

}

.auto-style41 {

	border-style: none;

	border-width: medium;

	text-align: left;

}
.auto-style47 {

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}

.auto-style48 {

	border-style: none;

	border-width: medium;

	color: #000000;

	background-color: #99CCFF;

}

.auto-style49 {

	border-style: none;

	border-width: medium;

	font-family: Calibri;

	font-size: 12pt;

	color: #000000;

	text-decoration: underline;

	background-color: #99CCFF;

}
.style14 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

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
.style15 {
	border-collapse: collapse;
}
.style16 {
	border: 0 solid #FFFFFF;
	color: #000000;
}
.style21 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	text-align: center;
}
.style22 {
	text-align: center;
	background-color: #E4E4E4;
}
.style23 {
	text-align: center;
}
.style24 {
	text-align: center;
	background-color: #E4E4E4;
	font-family: Cambria;
}
.style25 {
	font-family: Cambria;
}
.style26 {
	font-family: Calibri;
	font-size: 12pt;
	color: #CC3300;
}
.style28 {
	font-family: Calibri;
	font-size: 12pt;
	color: #000000;
	background-color: #99CCFF;
}
.style29 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style30 {
	font-family: Cambria;
	font-size: 12pt;
}
.style32 {
	border-style: none;
	border-width: medium;
	text-align: left;
}
.style33 {
	text-decoration: underline;
	font-family: Cambria;
	color: #FF0000;
}
.style34 {
	text-decoration: underline;
}
.style35 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
}
.style36 {
	color: #FF0000;
	text-decoration: underline;
}
</style>
</head>
<body>

<body>

<div align="center">

<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="Cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b><?php echo $SchoolAddress; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
</div>
<form name="frmNewStudent" id="frmNewStudent" method="post" action="SubmitClubActivities9.php" enctype="multipart/form-data">

<table width="81%" align="center"><tr>
<td colspan="2">
<font FACE="Cambria" SIZE="3">
<p ALIGN="LEFT">&nbsp;</p>
<p ALIGN="LEFT">Co-scholastic activities bring out the innate aptitudes of 
children. They encourage and&nbsp; enhance the dimensions of a&nbsp; </p>
<p ALIGN="LEFT">student's life with continuous and comprehensive 
evaluation assisting in channelizing&nbsp; myriad skills of students. With a </p>
<p ALIGN="LEFT">view to hone the intellect, 
talent and artistic skills of the children, the school is conducting specialized activity classes for </p>
<p ALIGN="LEFT">IX. The 
children gain confidence when the outcome of their effort and dexterity is exhibited.</p>
<p ALIGN="LEFT">The following activities have been designed to bring about a 
fine fusion of their analytical and creative aptitudes.</p>
</font>
<pre><font face="Cambria">
</font></pre>

</td>
</tr>
<tr>
<td colspan="2">
<font face="Cambria">
<b>
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
- - - - - - - - - - - - - - - - - - - -- - - - -


</b></font></td>
</tr>
<tr>
<td><font face="Cambria">List of Clubs </font> </td>
<td> 
<p align="left"><font face="Cambria">Please select any two choices from two 
different sections </font></td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>

<tr><td><font face="Cambria">1.</font><font FACE="Cambria" SIZE="3">Scientific 
	Skills</font></td>
<td> 
		<font face="Cambria">
		<select name="txtPreference1" id="txtPreference1" class="text-box">
		<option value="">Select One</option>
		<option value="Science Club">Science Club</option>
		<option value="Math Club">Math Club</option>
		
				</select></font></td></tr>
<tr><td height="35">&nbsp;</td>
<td height="35">
		&nbsp;</td></tr>
<tr><td height="35"><font face="Cambria">2. Organizational and Leadership Skills</font></td>
<td height="35">
		<font face="Cambria">
		<select name="txtPreference2" id="txtPreference2" class="text-box">
		<option value="">Select One</option>
		<option value="Eco Club">Eco Club</option>
		<option value="Health and Wellness Club">Health and Wellness Club</option>
		<option value="Disaster Management Club">Disaster Management Club</option>
				</select></font></td></tr>
<tr><td>&nbsp;</td>
<td>
		&nbsp;</td></tr>
<tr><td><font face="Cambria">3. </font><font FACE="Cambria" SIZE="3">Literary 
	and Creative Skills</font><font face="Cambria"> </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference3" id="txtPreference3" class="text-box">
		<option value="">Select One</option>
		<option value="Debating Society">Debating Society</option>
		<option value="Theatre Club">Theatre Club</option>
		<option value="Art Club">Art Club</option>
				</select></font></td></tr>
<tr><td>&nbsp;</td>
<td>
		&nbsp;</td></tr>

<tr><td><font face="Cambria">4. </font><font FACE="Cambria" SIZE="3">Information and Communication Technology&nbsp;&nbsp; (ICT)</font></td>
<td>
		<font face="Cambria">
		<select name="txtPreference4" id="txtPreference4" class="text-box">
		<option value="">Select One</option>
		<option value="Programming Concepts">Programming Concepts</option>
		<option value="Web Programming">Web Programming</option>
		
				</select></font></td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2"><font face="Cambria">I would like my ward&nbsp;&nbsp;<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" class="text-box"> of class&nbsp;<input name="txtClass" id="txtClass" type="text" value="<?php echo $class; ?>" class="text-box">&nbsp;
	to join a club at School.<br>
&nbsp;</font></td></tr>

<tr><td colspan="2">
	&nbsp;</td></tr>

<tr><td colspan="2">
	<p align="center"><font face="Cambria"><input name="BtnSubmit" type="button" value="I Agree &amp; Submit" onclick="Validate();" style="font-weight: 700" class="text-box">
	</font>
</td></tr>

</table></form>

</body>

</html>