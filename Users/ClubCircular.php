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

$rsChk=mysql_query("select * from `Student_Club_Activities` where `sadmission`='$sadmission'");
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
<form name="frmNewStudent" id="frmNewStudent" method="post" action="SubmitClubActivities.php" enctype="multipart/form-data">

<table width="70%" align="center"><tr>
<td colspan="2">
<pre><font face="Cambria">Dear Parent,</font></pre>
<pre><font face="Cambria">
As a premier institute of Faridabad,  we feel duty bound to ensure not only the scholastic enhancement of each child in our care,but also to hone the latent talent which may</font></pre>
 <pre><font face="Cambria">manifest itself as a hobby and needs nurturing to realize its optimum potential.Who knows in what field the child may excel in the future!</font></pre>
<pre><font face="Cambria">With this in view, the school has introduced club activities for classes VI to X. If your child is interested in any of the following clubs, then he/she can enroll himself/herself.</font></pre>
<pre><font face="Cambria">The clubs will meet on Friday from 1.30 p.m. to 3.00 p.m. as per the schedule mentioned in the almanac. Participation in these clubs is voluntary and free of cost. </font></pre>
<pre><font face="Cambria">Kindly fill in the acknowledgement slip and return it to the class teacher by April 12, 2016.
</font></pre>

</td>
</tr>
<tr>
<td colspan="2">
<font face="Cambria">
<b>
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


</b></font></td>
</tr>
<tr>
<td><font face="Cambria">List of Clubs </font> </td>
<td> 
<p align="left"><font face="Cambria">Please fill in order of preference</font></td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>

<tr><td><font face="Cambria">1.Physics /Automobile Designing</font></td>
<td> 
		<font face="Cambria">
		<select name="txtPreference1" id="txtPreference1" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">2. Green Solutions/ Chemistry</font></td>
<td>
		<font face="Cambria">
		<select name="txtPreference2" id="txtPreference2" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">3. Biology / Conservation / Waste Recycling </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference3" id="txtPreference3" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">4. Maths / Mental Ability </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference4" id="txtPreference4" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">5. Quiz Club </font> </td><td>
		<font face="Cambria">
		<select name="txtPreference5" id="txtPreference5" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">6. First Aid / Medical </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference6" id="txtPreference6" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">7. MUN</font></td><td>
		<font face="Cambria">
		<select name="txtPreference7" id="txtPreference7" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">8. Life Skills </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference8" id="txtPreference8" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">9. Dramatics (Hindi / English) </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference9" id="txtPreference9" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">10. Debating (Hindi / English) </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference10" id="txtPreference10" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">11. Drafting and Compiling (School Magazine / Newsletter) 
	</font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference11" id="txtPreference11" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">12. Dance (Western / Classical) </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference12" id="txtPreference12" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">13. Music (Vocal / Instrumental) </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference13" id="txtPreference13" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">14. Music (Western) </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference14" id="txtPreference14" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">15.  Foreign Language (French / German)</font></td
><td>
		<font face="Cambria">
		<select name="txtPreference15" id="txtPreference15" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">16. Physical Fitness : Yoga / Aerobics / Self defence / Meditation / Martial Art 
	</font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference16" id="txtPreference16" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">17. Art & Craft </font> </td>
<td>
		<font face="Cambria">
		<select name="txtPreference17" id="txtPreference17" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>
<tr><td><font face="Cambria">18. Robotics Club</font></td>
<td>
		<font face="Cambria">
		<select name="txtPreference18" id="txtPreference18" class="text-box">
		<option value="">Select One</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
				</select></font></td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2"><font face="Cambria">I would like my ward&nbsp;&nbsp;</font><input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" class="text-box"><font face="Cambria"> <b></b> of class&nbsp;<input name="txtClass" id="txtClass" type="text" value="<?php echo $class; ?>" class="text-box">&nbsp;
	to join a club at School.<br>
&nbsp;</font></td></tr>

<tr><td colspan="2">
	<p align="center"><font face="Cambria"><input name="BtnSubmit" type="button" value="I Agree &amp; Submit" onclick="Validate();" style="font-weight: 700" class="text-box">
	</font>
</td></tr>

</table></form>

</body>

</html>