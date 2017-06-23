<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Communications to Students</title>
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
</style>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>
<script language="JavaScript1.2" fptype="dynamicanimation" src="file:///C:/Program%20Files/Microsoft%20Office/OFFICE11/fpclass/animate.js">
</script>
</head>

<body onLoad="dynAnimation()" language="Javascript1.2">


<div style="position: absolute; width: 603px; height: 238px; z-index: 1; left: 14px; top: 676px" id="layer5">
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td colspan="3" height="35" bgcolor="#666633"><b>
			<font face="Cambria" color="#FFFFFF">Communications to Students</font></b></td>
		</tr>
		<tr>
			<td width="70" align="center"><font face="Cambria">Class</font></td>
			<td width="127" align="center"><font face="Cambria">Notice Sent To</font></td>
			<td width="288" align="center"><font face="Cambria">Message</font></td>
		</tr>
		<tr>
			<td width="70">&nbsp;</td>
			<td width="127">&nbsp;</td>
			<td width="288">&nbsp;</td>
		</tr>
	</table>
</div>
<div style="position: absolute; style=overflow-y:hidden;overflow-y:hidden; width: 625px; height: 238px; z-index: 1; left: 625px; top: 430px" id="layer1">
	<div align="center">
	<table width="100%" border="1" style="border-collapse: collapse">
<?php
$ssqlClass="SELECT distinct `sclass` FROM `student_master`";
$rsClass= mysql_query($ssqlClass);

?>

<form name="frmRpt" method="post" action="Student_Landing.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
 <tr>
			<td colspan="4" height="35" bgcolor="#CC3300"><b>
			<font face="Cambria" color="#FFFFFF">Students</font></b></td>
 </tr> 
 <tr>
			<td width="81" align="center"><font face="Cambria">Class</font></td>
			<td width="81" align="center"><font face="Cambria">Boys</font></td>
			<td width="81" align="center"><font face="Cambria">Girls</font></td>
			<td width="81" align="center"><font face="Cambria">Total</font></td>
 </tr>
		
  
<?php
$query="select distinct `sclass` from `student_master` ";
$query1=mysql_query($query);

while($result=mysql_fetch_array($query1))
{
           echo"<tr><td style='text-align:center;' ><input type='text'  name='sclass' value='".$result['sclass']."' readonly                          style='text-align:center;width:81px;''/>
		            </td>";
   
            $fem="select `sname` from `student_master` where `sclass`='$result[sclass]' and `Sex`='M' ";
            $fem1= mysql_query($fem);

			
		    $r1=mysql_num_rows($fem1);
   
			echo"<td style='text-align:center;' ><input type='text'  name='sclass' value='".$r1."' readonly                                 
			          style='text-align:center;width:81px;''/>
			     </td>";
			
			
            $mal="select `sname` from `student_master` where `sclass`='$result[sclass]' and `Sex`='F' ";
            $mal1= mysql_query($mal);

			
		    $r12=mysql_num_rows($mal1);
			
			echo"<td style='text-align:center;' ><input type='text'  name='sclass' value='".$r12."' readonly                      style='text-align:center;width:81px;''/>
			     </td>";
				 
			$tol=$r1+$r12;
			
			echo"<td style='text-align:center;' ><input type='text' name='sclass' value='".$tol."' readonly                      style='text-align:center;width:81px;''/>
			     </td>
	       </tr>";
}
		?>	
			
  
</table>
	</div>
</div>
<div style="position: absolute; width: 625px; height: 238px; z-index: 1; left: 625px; top: 675px" id="layer2">
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td colspan="4" height="35" bgcolor="#0093A7"><b>
			<font face="Cambria" color="#FFFFFF">Upcoming Students Birthdays</font></b></td>
		</tr>
		<tr>
			<td width="128" align="center"><font face="Cambria">Student Name</font></td>
			<td width="113" align="center"><font face="Cambria">Class</font></td>
			<td width="115" align="center"><font face="Cambria">Date Of Birth</font></td>
			<td width="138" align="center"><font face="Cambria">Send Birthday 
			Wish</font></td>
		</tr>
		<tr>
			<td width="128">&nbsp;</td>
			<td width="113">&nbsp;</td>
			<td width="115">&nbsp;</td>
			<td width="138">&nbsp;</td>
		</tr>
	</table>
</div>
<div style="position: absolute; width: 625px; height: 274px; z-index: 1; left: 625px; top: 145px" id="layer3">
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="35" bgcolor="#00CC66"><b>
			<font face="Cambria" color="#FFFFFF">Staff Circulars</font></b></td>
		</tr>
		<tr>
			<td width="494"><font face="Cambria">Date : Circular</font><p></td>
		</tr>
		
	</table>
</div>
<div style="position: absolute; width: 625px; height: 26px; z-index: 1; left: 624px; top: 114px; background-color: #48AC2E" id="layer9">
	<b><font face="Cambria" color="#FFFFFF" style="font-size: 12pt">School News:</font></b></div>
<div style="position: absolute; width: 616px; height: 26px; z-index: 1; left: 1px; top: 114px; background-color: #48AC2E" id="layer8">
	<b><font color="#FFFFFF" face="Cambria" size="3">Upcoming Holidays : </font></b></div>
<div style="position: absolute; width: 603px; height: 276px; z-index: 1; left: 13px; top: 144px" dynamicanimation="fpAnimformatRolloverFP1" fprolloverstyle="background-color: #C0C0C0" onMouseOver="rollIn(this)" onMouseOut="rollOut(this)" language="Javascript1.2">
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="35" bgcolor="#0000FF" width="404" colspan="4"><b>
			<font face="Cambria" color="#FFFFFF">Dashboard</font></b></td>
		</tr>
		<tr>
			<td height="35" width="162" align="center"><font face="Cambria">
			Class</font></td>
			<td height="35" width="162" align="center"><font face="Cambria">
			Total No. of Student</font></td>
			<td height="35" width="163" align="center"><font face="Cambria">
			Total Present</font></td>
			<td height="35" width="163" align="center"><font face="Cambria">
			Total Absent</font></td>
		</tr>
	</table>
</div>
<div style="position: absolute; width: 603px; height: 238px; z-index: 1; left: 13px; top: 430px" id="layer4">
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td colspan="4" height="35" bgcolor="#5B3AB6"><b>
			<font face="Cambria" color="#FFFFFF">Admission Summary</font></b></td>
		</tr>
		<tr>
			<td width="122" align="center"><font face="Cambria">Class</font></td>
			<td width="122" align="center"><font face="Cambria">Total Inquiries</font></td>
			<td width="122" align="center"><font face="Cambria">Total 
			Registrations</font></td>
			<td width="122" align="center"><font face="Cambria">Total Admissions</font></td>
		</tr>
		<tr>
			<td width="122">&nbsp;</td>
			<td width="122">&nbsp;</td>
			<td width="122">&nbsp;</td>
			<td width="122">&nbsp;</td>
		</tr>
	</table>
</div>

<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>

</html>