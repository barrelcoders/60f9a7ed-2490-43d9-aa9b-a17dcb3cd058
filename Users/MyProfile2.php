
<html>
<head>

<title>My Profile</title>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="Users/layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="Users/layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="Users/layout/scripts/jquery.slidepanel.setup.js"></script>

<style>
<!--
.auto-style32 {

	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;

	font-family: Cambria;

}

.auto-style35 {

	border-style: solid;

	border-width: 1px;

	font-family: Cambria;

	text-align: center;

}





.auto-style1 {
	border-width: 1px;
	color: #000000;
	font-family: Cambria;
	font-size: 15px;
}

.auto-style2 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	font-style: normal;
	text-decoration: none;
	color: #000000;
}

.auto-style3 {
	color: #000000;
}
-->
</style>

</head>

<body>

<!--
<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Nullamlacus dui ipsum</h2>
        <p>Nullamlacus dui ipsum conseque loborttis non euisque morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque congue magnis vestibulum quismodo nulla et feugiat. Adipisciniapellentum leo ut consequam ris felit elit id nibh sociis malesuada.</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>
      <div class="topbox">
        <h2>Teachers Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Pupils Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="pupilname" id="pupilname" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="pupilpass" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Log In Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display:none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
-->
<table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
<div class="wrapper col1">
  <div id="header">
    <?php include("includes/logo.php");?>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="Notices.php">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
</div>


    
<!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>»</li>
      <li><a href="Notices.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">Homework</a></li>
    </ul>
  </div>
</div>


<!-- ######################################Div for News ################################################################# -->

<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->

</td>

</tr>

</table>

<table width="100%" border="0">
			<tr>
				<td>
				
	 <div id="column"><?php include 'SideMenu.php'; ?></div>
    </td>
    


<div class="wrapper">
<table border="1px" align="center" width="61%" height="70%" >
<tr style="background:green; ">
<td colspan=3 align="center" padding="0px" margin="0px"><font size=4 color=white><b>Student Details</b></font></td>
</tr>

<tr style="border:none">
<td style="width:10%; border:none; padding-left:1%;">Name</td>
<td style="width:57%; border:none;"><input type="text" name="textname" id="textname" size="30"></td>
<td rowspan="7" style="width:33%; border:none;">
<img src="Users/images/new.jpg" class="round"><br>Student Image
</td>
</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Address</td>
<td style=" border:none;"><input type="text" name="personaladdress" id="personaladdress" size="30"></td>
</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Roll No</td>
<td style=" border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Category</td>
<td style=" border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>


<tr style="border:none">
<td style=" border:none; padding-left:1%;">Nationality</td>
<td style=" border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>


<tr style="border:none">
<td style=" border:none; padding-left:1%;">Gender</td>
<td style="border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Class</td>
<td style=" border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>

</table>
</div>




<div class="wrapperSecond">
<table border="1px" align="center" width="61%">

<tr style="background:green;">
<td colspan=6 ><center><font size=4 color=white><b>Family Details</b></font></center>
</td>
</tr>



<tr style="border:none">
<td style=" border:none; padding-left:1%; width:23%;">	Father Name</td>
<td style="border:none;"><input type=text name=textnames id="textname" size="30"></td>
<td rowspan="3" style="width:23%; border:none;">
<img src="../../../Users/ankit chaudhary/Downloads/images/new.jpg" class="roundFather"><br><p style="margin-left:10%;">Father Image</p>
</td>
<td style=" border:none; padding-left:1%;width:23%;">Mother Name</td>
<td style="border:none;"><input type=text name=textnames id="textname" size="30"></td>
<td rowspan="3" style="width:23%; border:none;">
<img src="../../../Users/ankit chaudhary/Downloads/images/new.jpg" class="roundFather"><br><p style="margin-left:10%;">Mother Image</p>
</td>



</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Father Occupation </td>
<td style="border:none;"><input type="text" name="personaladdress"
id="personaladdress" size="30"></td>


<td style=" border:none; padding-left:1%;">Mother Occupation </td>
<td style="border:none;"><input type="text" name="personaladdress"
id="personaladdress" size="30"></td>

</tr>

<tr style="border:none">
<td style=" border:none; padding-left:1%;">Father Education </td>
<td style="border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>



<td style=" border:none; padding-left:1%;">Mother Education </td>
<td style="border:none;"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>

</table>
</div>





<div class="wrapperThird">
<table border="1px" align="center" width="61%">

<tr style="background:green;">
<td colspan=5 ><center><background colour=#fjdd0><font size=4 color=white><b>Mobile App Details</b></font><background/></center>
</td>
</tr>



<tr style="border:none">
<td style="border:none">Mobile No</td>
<td style="border:none"><input type=text name=textnames id="textname" size="30"></td>


<tr style="border:none">
<td style="border:none">IMEI</td>
<td style="border:none"><input type="text" name="personaladdress"
id="personaladdress" size="30"></td>




</tr>

<tr style="border:none">
<td style="border:none">Email Id </td>
<td style="border:none"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>

<tr style="border:none">
<td style="border:none">Password</td>
<td style="border:none"><input type="text" name="roll no" id="roll no" size="30"></td>
</tr>


</table>

</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 1347px; height: 32px">
    
    <p align="center"><font color="#FFFFFF">Powered By Online School Planet 
	|
	</font>   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	<font color="#FFFFFF">Education ERP Platform</font></a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>