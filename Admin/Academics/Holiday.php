<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>

<?php

if ($_REQUEST["txtDate"] != "")

{

	$HolidayName=$_REQUEST["txtHolidayName"];

	$HDate=$_REQUEST["txtDate"];

	$Class=$_REQUEST["cboClass"];

	

	$arr = explode('/', $HDate);

	$HDate= $arr[2].'-'.$arr[0].'-'.$arr[1];

				

	$sql = "SELECT `srno` , `Holiday` , `HolidayDate` ,`class` FROM `school_holidays` where  `Date`='$HDate'";

		$result = mysql_query($sql,$Con);

		if (mysql_num_rows($result)==0)

		{

			$ssql="INSERT INTO `school_holidays` (`Holiday`,`HolidayDate`,`Class`) VALUES('$HolidayName','$HDate','$Class')";

			mysql_query($ssql) or die(mysql_error());										

			mysql_query("delete from `update_track` where `Activity`='holiday'") or die(mysql_error());	

			mysql_query("insert into `update_track` (`Activity`) values ('holiday')") or die(mysql_error());

		}

		//***********SENDING GCM**************

		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Holiday'";

   		$reslt = mysql_query($ssqlActivity , $Con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		

		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !=''";

   		$result = mysql_query($ssqlGCM , $Con);

    while($row = mysql_fetch_assoc($result))

	   {

	   		$registrationIDs = $row['GCMAccountId'];

		    

		    $url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;



		    

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





$sql = "SELECT distinct `class` FROM `class_master`";

$resultHoliday = mysql_query($sql, $Con);

   



$ssql="SELECT `srno` , `holiday` , `HolidayDate` ,`class` FROM `school_holidays` a  order by `HolidayDate`";

$rs= mysql_query($ssql);

$num_rows=0;







?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtHolidayName").value=="")

	{

		alert("Please enter holiday name");

		return;

	}

	if (document.getElementById("txtDate").value=="Holiday Date")

	{

		alert("Please enter holiday date");

		return;

	}

	document.getElementById("frmHoliday").submit();

	

}

function ShowEdit(SrNo)

{

	//window.open "EditHoliday.php?srno" . SrNo;

	var myWindow = window.open("EditHoliday.php?srno=" + SrNo ,"","width=300,height=400");

}

function ShowDelete(SrNo)

{

	var myWindow = window.open("DeleteHoliday.php?srno=" + SrNo ,"","width=300,height=400");

}

</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>School Holidays</title>

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

	font-size: 12px;

	color: #000000;

}

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

}

.style3 {

	text-decoration: none;

}

.auto-style21 {

	text-align: left;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	color: #FFFFFF;

	font-size: medium;

}

.auto-style3 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 12px;

	color: #000000;

}

.auto-style6 {

	color: #000000;

}

.auto-style22 {

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

}

.auto-style23 {

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	font-weight: bold;

	font-size: medium;

	color: #000000;

}

.auto-style24 {

	font-weight: 700;

	font-size: medium;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

}

.auto-style25 {

	font-weight: 700;

	font-size: medium;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	margin-left: 10px;

}

.auto-style26 {

	font-weight: 700;

	font-size: medium;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

}

.auto-style27 {

	font-size: medium;

	font-weight: normal;

	font-style: normal;

	text-decoration: none;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

}

.auto-style28 {

	color: #000000;

	font-size: medium;

}

.auto-style29 {

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	color: #000000;

	font-size: small;

}

.auto-style30 {

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	color: #000000;

	font-weight: bold;

	text-decoration: underline;

}

.auto-style33 {

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	color: #000000;

	font-size: 12px;

}

.auto-style34 {

	font-size: medium;

}

.auto-style35 {

	font-weight: 700;

	font-size: medium;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	text-align: center;

}

.auto-style36 {

	font-size: medium;

	font-weight: normal;

	font-style: normal;

	text-decoration: none;

	color: #000000;

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	text-align: center;

}

</style>

</head>



<body>



				<div>



					&nbsp;<p><font face="Cambria"><strong>Holiday Management</strong></font></div>

<hr class="auto-style3" style="height: -15px">

<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" style="float: right" class="auto-style29"></font></a></p>

				

<table width="1241" cellspacing="1" bordercolor="#000000" id="table_1" class="style2" style="border-width: 0px">

	<form name="frmHoliday" id="frmHoliday" method="post" action="Holiday.php">

	<tr>

		<td class="auto-style30" colspan="7" height="29" style="border-left-color: #000000; border-left-width: 1px; border-right-color: #000000; border-right-width: 1px; border-top-color: #000000; border-top-width: 1px">

		<font face="Cambria">

		<span class="auto-style34"><font size="3">Add A New Holiday</font></span><br class="auto-style34">

		</font>

		</td>

	</tr>

	<tr>

		<td style="border-style:solid; border-width:1px; width: 177px">

		<span style="font-weight: 700; " class="auto-style33">

		<font face="Cambria" size="3">Holiday Name:</font></span><span class="auto-style33"><font face="Cambria" size="3">
		</font> </span>

		</td>

		<td style="border-style:solid; border-width:1px; width: 177px">

		<font face="Cambria">

		<input name="txtHolidayName" id="txtHolidayName" type="text" class="auto-style33"></font></td>

		<td style="border-style:solid; border-width:1px; width: 177px" class="auto-style24">

		<p align="right">

		<font face="Cambria" size="3">Date:</font></td>

		<td style="border-style:solid; border-width:1px; width: 177px">



		<font face="Cambria">



		<input type="text" name="txtDate" id="txtDate" size="15" value="Holiday Date" class="auto-style33"></font><span class="auto-style33"><font face="Cambria">
		</font>

		</span>

		</td>

		<td style="border-style:solid; border-width:1px; width: 177px">
		<p align="right"><span class="auto-style23">
		<font face="Cambria" size="3">Class</font></span><span style="font-weight: 700; " class="auto-style33"><font face="Cambria" size="3">:</font></span></td>

		<td style="border-style:solid; border-width:1px; width: 177px">

		<font face="Cambria">

		<select name="cboClass" style="height: 22px" class="auto-style33">

		<option selected="" value="All">All</option>

			<?php

				while($row = mysql_fetch_assoc($resultHoliday))

   				{

   					$class=$row['class'];

			?>

			<option value="<?php echo $class; ?>" ><?php echo $class; ?></option>

			<?php

				}

			?>

		

		</select></font></td>

		<td style="border-style:solid; border-width:1px; width: 178px">

		<font size="2" face="Cambria">

		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style33" style="font-weight: 700"></font></td>

	</tr>

	</form>

</table><font face="Cambria"><br class="auto-style33"></br>	

				</font>	

<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table1">

	<tr>

		<td style="border-bottom-style: none; border-bottom-width: medium">

		<p class="auto-style25">

		<font face="Cambria" size="3">Holiday List</font></td>

	</tr>

	<tr>

		<td style="border-top-style: none; border-top-width: medium">

		<table width="100%" border="1" bordercolor="#000000" id="table3" class="style2" height="48">

			<tr>

				<td height="24" bgcolor="#95C23D" align="center" style="width: 47px" class="auto-style26">

				<font face="Cambria" size="3">SrNo</font></td>

				<td height="24" bgcolor="#95C23D" align="center" style="width: 322px" class="auto-style26">

				<font face="Cambria" size="3">Holiday</font></td>

				<td height="24" bgcolor="#95C23D" style="width: 173px" class="auto-style35">

				<font face="Cambria" size="3">Date</font></td>

				<td height="24" bgcolor="#95C23D" style="width: 174px" class="auto-style35">

				<font face="Cambria" size="3">Class</font></td>

				<td height="24" bgcolor="#95C23D" style="width: 174px" class="auto-style35">

				<font face="Cambria" size="3">Edit</font></td>


				<td height="24" bgcolor="#95C23D" style="width: 174px" class="auto-style35">

				<font face="Cambria" size="3">Delete</font></td>

				

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$holiday=$row[1];

					$HolidayDate=$row[2];

					$class=$row[3];

					

					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="25" align="center" style="width: 47px" class="auto-style27">

				<font face="Cambria">

				<?php echo $srno; ?></font></td>

				<td height="25" style="width: 322px" class="auto-style36">

				<font face="Cambria">

				<?php echo $holiday; ?></font></td>

				<td height="25" align="center" style="width: 173px" class="auto-style27">

				<font face="Cambria">

				<?php echo $HolidayDate; ?></font></td>

				<td height="25" align="center" style="width: 174px" class="auto-style27">

				<font face="Cambria">

				<?php echo $class; ?></font></td>

				<td height="25" align="center" style="width: 174px" class="auto-style22">

				<font face="Cambria">

				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">

				<span class="auto-style28"><font size="3">Edit</font></span></a></font></td>

				<td height="25" align="center" style="width: 174px" class="auto-style22">

				<font face="Cambria">

				<a href="Javascript:ShowDelete(<?php echo $srno ?>);" class="style3">

				<span class="auto-style28"><font size="3">Delete</font></span></a></font></td>

				

			</tr>

			<?php

			}

			?>

			

		</table>

		</td>

	</tr>

</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>



</body>



</html>