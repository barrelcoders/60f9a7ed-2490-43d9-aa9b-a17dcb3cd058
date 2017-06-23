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

$rsChk=mysql_query("select * from `Student_Sport_Activities` where `sadmission`='$sadmission'");
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
<td align="center" height="6">
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
<form name="frmNewStudent" id="frmNewStudent" method="post" action="SubmitSportActivities.php" enctype="multipart/form-data">

<table width="753" align="center" style="border-left-width: 0px; border-right-width: 0px"><tr>
<td colspan="6">
<p class="MsoNormal" align="center" style="text-align: center"><b>
<span style="font-size: 11.0pt; font-family: Cambria">Games/Sports/Coaching &amp; 
Training Programme Session 2016-2017</span></b><font face="Cambria"><br>
</font>

</td>
</tr>
<tr>
<td colspan="6">
<font face="Cambria">
<b>
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
- - -&nbsp; 


</b></font></td>
</tr>
<tr>
<td colspan="6">
<p align="center"><b><font face="Cambria">Please select one of the Game from the 
given list of the Sports Activities</font></b></td>
</tr>
<tr><td colspan="5">&nbsp;</td><td width="215">&nbsp;</td></tr>
<tr><td colspan="5"></td><td width="215"></td></tr>

<tr><td colspan="5" style="border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
<td width="215" style="border-bottom-style: none; border-bottom-width: medium"> 
		&nbsp;</td></tr>

<tr><td colspan="5" style="border-style: none; border-width: medium">&nbsp;</td>
<td width="215" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium"> 
		&nbsp;</td></tr>

<tr><td style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" colspan="5"><font face="Cambria">1.Name of the Sport/ Game</font></td>
<td width="214" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"> 
		<font face="Cambria">
		<select name="txtGame" id="txtGame" class="text-box">
		<option value="">Select One</option>
		<option value="BasketBallBoys">BasketBall(Boys)</option>
		<option value="BasketBallGirls">BasketBall(Girls)</option>
		<option value="FootballBoys">Football(Boys)</option>
		<option value="TennisBoys">Tennis(Boys)</option>
		<option value="TennisGirls">Tennis(Girls)</option>
		<option value="SelfDefense">Self-Defense</option>
		<option value="CricketBoys">Cricket(Boys)</option>
				</select></font></td></tr>

<tr><td colspan="6" height="43" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td></tr>

<tr><td height="43" style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font face="Cambria">I would like my ward&nbsp;&nbsp;</font><font face="Cambria">&nbsp; <br>
&nbsp;</font></td>
	<td height="43" style="border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" width="154"><input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" class="text-box"></td>
	<td height="43" style="border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" width="14"><font face="Cambria"> 
	of</font></td>
	<td height="43" style="border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" width="37"><font face="Cambria"> class&nbsp;&nbsp; </font></td>
	<td height="43" style="border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" width="154"><font face="Cambria"> <input name="txtClass" id="txtClass" type="text" value="<?php echo $class; ?>" class="text-box"></font></td>
	<td height="43" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font face="Cambria"> 
	to join this Sport at the&nbsp; School.</font></td></tr>

<tr><td colspan="6">
	&nbsp;</td></tr>

<tr><td colspan="6">
	&nbsp;</td></tr>

<tr><td colspan="6">
	<p align="center"><font face="Cambria"><input name="BtnSubmit" type="button" value="I Agree &amp; Submit" onclick="Validate();" style="font-weight: 700" class="text-box">
	</font>
</td></tr>

</table></form>

</body>

</html>