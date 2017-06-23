<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';
?>
<?php

if ($_REQUEST["txtSection"] != "")
{
	$Section=$_REQUEST["txtSection"];
	$Phone=$_REQUEST["txtPhone"];
	$Email=$_REQUEST["txtEmailId"];
	
	$sql = "SELECT `srno` , `section` , `phoneno` ,`email_id` FROM `school_directory` where  `section`='$Section' and `phoneno`='$Phone'";
		$result = mysql_query($sql,$Con);
		if (mysql_num_rows($result)==0)
		{
			$ssql="INSERT INTO `school_directory` (`section` , `phoneno` ,`email_id`) VALUES('$Section','$Phone','$Email')";
			mysql_query($ssql) or die(mysql_error());
		}
		
		//***********SENDING GCM**************
		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Directory'";
   		$reslt = mysql_query($ssqlActivity , $Con);
    while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$message1=$rowa['gcm_message'];
	   		$message1=str_replace(" ","%20",$message1);    
	   }
		
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !=''";
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
	mysql_query("delete from `update_track` where `Activity`='schooldirectory'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('schooldirectory')") or die(mysql_error());


}


$ssql="SELECT `srno` , `section` , `phoneno` ,`email_id` FROM `school_directory` a  order by `srno`";
$rs= mysql_query($ssql);
$num_rows=0;



?>
<script language="javascript">
function Validate()
{
	if (document.getElementById("txtSection").value=="")
	{
		alert("Please enter section");
		return;
	}
	if (document.getElementById("txtPhone").value=="")
	{
		alert("Please enter phone");
		return;
	}
	if (document.getElementById("txtEmailId").value=="")
	{
		alert("Please enter Email");
		return;
	}
	document.getElementById("frmDirectory").submit();
	
}
function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditDirectory.php?srno=" + SrNo ,"","width=300,height=400");
}
function ShowDelete(SrNo)
{
	var myWindow = window.open("DeleteDirectory.php?srno=" + SrNo ,"","width=300,height=400");
}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>School Directory</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>
	

</head>
<style>



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

<body>
<p>&nbsp;</p>
<p><b><font face="Cambria">Update School Directory</font></b></p>
<hr>
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a>

<table width="100%" cellspacing="1"  id="table_1" >
	<form name="frmDirectory" id="frmDirectory" method="post" action="Directory.php">
	<tr>
		<td style="height: 29px" colspan="7" align="left">
		<font face="Cambria"><u><b>New Entry To School Directory</b></u></font></td>
	</tr>
	<tr>
		<td style="width: 157px; height: 29px;">
		<p align="center">
		<span style="font-family: Cambria; font-weight: 700; font-size: 12pt; color: #000000">
		Section:</span><b><font face="Cambria"> </font></b>
		</td>
		<td style="width: 157px; height: 29px;"><font size="3" face="Cambria">
		<input name="txtSection" id="txtSection" style="font-weight: 700"></font></td>
		<td style="width: 157px; height: 29px;">
		<p align="center">
		<b><font face="Cambria">
		<span class="style1">Phone</span></font></b><span style="font-family: Cambria; font-weight: 700; font-size: 12pt; color: #000000">:</span></td>
		<td style="width: 157px; height: 29px;">

		<font size="3">

		<input name="txtPhone" id="txtPhone" size="15" style="font-family: Cambria; font-weight:700"></font><b><font face="Cambria">
		</font></b>
		</td>
		<td style="width: 157px; height: 29px;">
		<p align="center">
		<span style="font-family: Cambria; font-weight: 700; font-size: 12pt; color: #000000">
		Email:</span></td>
		<td style="width: 158px; height: 29px;"><font size="3" face="Cambria">
		<input name="txtEmailId" id="txtEmailId" style="font-weight: 700"></font></td>
		<td style="width: 158px; height: 29px;">
		<p align="center">
		<font size="3" face="Cambria">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700"></font></td>
	</tr>
	</form>
</table><font face="Cambria"></br>	
</font>	
<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">
	<tr>
		<td>
		<table width="100%" id="table3"  cellpadding="0" style="border-collapse: collapse">
			<tr>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 173px">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Sr. No.</span></td>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 173px">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Section</span></td>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 173px" class="style4">
				<b><font face="Cambria">Phone</font></b></td>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<b><font face="Cambria">
				<span class="style4">Email</span></font></b></td>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Edit</span></td>
				<td height="26" bgcolor="#95C23D" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">
				Delete</span></td>
			</tr>
			<?php
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$section=$row[1];
					$phoneno=$row[2];
					$email=$row[3];
					
					$num_rows=$num_rows+1;
			?>
			<tr>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 173px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $srno; ?></span></td>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 173px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $section; ?></span></td>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 173px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $phoneno; ?></span></td>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $email; ?></span></td>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<font face="Cambria">
				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></td>
				<td height="21" align="center" style="border-style:solid; border-width:1px; width: 174px">
				<font face="Cambria">
				<a href="Javascript:ShowDelete(<?php echo $srno ?>);" class="style3">Delete</a></font></td>
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