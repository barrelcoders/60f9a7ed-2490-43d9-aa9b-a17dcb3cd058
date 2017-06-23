<?php

session_start();

include '../../../connection.php';

include 'header.php';

?>
<?php

if ($_REQUEST["txtDate"] != "")

{

	$HolidayName=$_REQUEST["txtHolidayName"];

	$HDate=$_REQUEST["txtDate"];

	$Class=$_REQUEST["cboClass"];

	

	//$arr = explode('/', $HDate);

	//$HDate= $arr[2].'-'.$arr[0].'-'.$arr[1];

				

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

   



$ssql="SELECT `srno` , `holiday` ,DATE_FORMAT(`HolidayDate`,'%d-%m-%Y') as  `HolidayDate` ,DATE_FORMAT(`HolidayDate`,'%W') as  `HolidayDay`, `class` FROM `school_holidays` a  order by `HolidayDate`";

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
	<link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>
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

	color: #000; 

	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;

	margin-left: 10px;

}

.auto-style26 {

	font-weight: 700;

	font-size: medium;

	color: #fff;

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

	color: #fff;

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
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

</head>



<body>
<div id="container">
<!----Header--------->
<!---------containt---------->

<div class="row c leave">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="NewLeave.php"><button class="btnmanu">New Leave</button></a></li>
   <li><a href="MyLeave.php"><button class="btnmanu">My Leave</button></a></li>
   <li class="active"><a href="ViewHoliday.php"><button class="btnmanu">Holiday List</button></a></li>
  </ul> 
 </div>
 <!------------------------->
  <div class="col-md-10">
	<div style="width:100%">&nbsp;<p><font face="Cambria"><strong>Holiday Management</strong></font></p></div>

<font face="Cambria">
	
<table border="1" width="100%" cellspacing="1" class="CSSTableGenerator" style="border-collapse: collapse" height="80" >
	<tr>
		<td style="border-style:solid; border-width:1px;" align="center">
		<p class="auto-style25">
		<font face="Cambria" size="3">Holiday List</font></p></td>
	</tr>
	<tr>
		<td style="border-style:solid; border-width:1px; ">
		<table width="100%" border="1"  class="CSSTableGenerator"   height="48">
			<tr>
				<td height="24" bgcolor="#0b462d" align="center" style="border-style:solid; border-width:1px; width: 47px" class="auto-style26">
				<font face="Cambria" size="3">SrNo</font></td>
				<td height="24" bgcolor="#0b462d" align="center" style="border-style:solid; border-width:1px; width: 322px" class="auto-style26">
				<font face="Cambria" size="3">Holiday</font></td>
				<td height="24" bgcolor="#0b462d" style="border-style:solid; border-width:1px; width: 173px" class="auto-style35">
				<font face="Cambria" size="3">Holiday Day</font></td>
				<td height="24" bgcolor="#0b462d" style="border-style:solid; border-width:1px; width: 173px" class="auto-style35">
				<font face="Cambria" size="3">Date</font></td>
			</tr>
			<?php
			 $recno=1;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$holiday=$row[1];
					$HolidayDate=$row[2];
					$HolidayDay=$row[3];
					$class=$row[4];
					$num_rows=$num_rows+1;
			?>
			<tr>
				<td height="25" align="center" style="border-style:solid; border-width:1px; width: 47px" class="auto-style27">
				<font face="Cambria">
				<?php echo $recno; ?></font></td>
				<td height="25" style="border-style:solid; border-width:1px; width: 322px" class="auto-style36">
				<font face="Cambria">
				<?php echo $holiday; ?></font></td>
				<td height="25" align="center" style="border-style:solid; border-width:1px; width: 173px" class="auto-style27">
				<font face="Cambria">
				<?php echo $HolidayDay; ?></font></td>
				<td height="25" align="center" style="border-style:solid; border-width:1px; width: 173px" class="auto-style27">
				<font face="Cambria">
				<?php echo $HolidayDate; ?></font></td>
			</tr>
			<?php
            $recno=$recno+1;
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
</div>
</div>
</div>
</body>



</html>