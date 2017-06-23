<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php


$ssql="SELECT `srno`,`routeno`,`bus_no`,`timing`, `driver_name`,`driver_mobile`,`route_details`,`routecharges`,`financialyear` FROM `RouteMaster` order by `srno`";

$rs= mysql_query($ssql);

$num_rows=0;



?>

<script language="javascript">



function ShowEdit(SrNo)

{	//window.open "EditHoliday.php?srno" . SrNo;

	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");

}



</script>



<html>







<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Route Master</title>



<!-- link calendar resources -->



	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />



	<script type="text/javascript" src="tcal.js"></script>



	



<style type="text/css">



.style2 {



	border-collapse: collapse;



	border-style: solid;



	border-width: 1px;



}



.style3 {



	text-decoration: none;



}



.style4 {



	font-family: Cambria;



	font-size: 15px;



	color: #FFFFFF;



	font-weight: bold;



}



.auto-style20 {

	border-collapse: collapse;

	border-width: 0px;

	font-size: medium;

}



.auto-style22 {

	color: #CC0033;

}

.auto-style23 {

	border: medium none #FFFFFF;

	font-family: Cambria;

	font-size: 11pt;

	color: #CC0033;

	text-align: left;

	background-color: #FFFFFF;

}



.auto-style6 {

	color: #DAB9C1;

}



.auto-style24 {

	border-style: none;

	border-width: medium;

}

.auto-style25 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 0px;

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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}


.auto-style3 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 15px;

	color: #CEAA9E;

}



.style5 {

	border-right-style: solid;

	border-right-width: 1px;

}



.style1 {

	font-family: Calibri;
font-color:#000000
	

	

	color: #000000;

}

</style>



</head>







<body>



<p>&nbsp;</p>



<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style25">

	<tr>

		<td   bordercolor="#FFFFFF" bordercolordark="#FFFFFF" bordercolorlight="#FFFFFF" class="auto-style24">



<table width="100%" cellspacing="0" bordercolor="#000000" id="table_11" class="auto-style20" style="height: 33px">



	



	

	<tr>

		<td >

		

		

		<span ><font face="Cambria"><b>Route Master</b></font><hr  style="height: -15px">

<p class="auto-style6" style="height: 30px"><font face="Cambria"><a href="javascript:history.back(1)">

<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></font></p><table width="100%" cellspacing="1" id="table_19" class="style5">
			<tr>
				<td style="border-bottom-style: solid; border-bottom-width: 1px">
				<font face="Cambria"><b>Add a New Bus Route</b></font></td>
			</tr>
		</table>
		<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style2" style="border-width: 0px">
			<form name="frmTransport" id="frmTransport" method="post" action="TransportMaster.php">
				<tr>
					<td style="width: 122px; height: 29px; border-left-color: #000000; border-left-width: 1px; border-top-color: #000000; border-top-width: 1px">
					<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
					Route No</span></td>
					<td style="width: 181px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<input type="text" name="txtDiscountHead" id="txtName0" class="text-box">
					</font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<b><font face="Cambria">Bus Number</font></b></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<input type="text" name="txtDiscountHead0" id="txtName1" class="text-box"></font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<span class="style1">
					<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
					Timing</span></span></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<input type="text" name="txtPercentage" id="txtName" class="text-box">
					</font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<span style="font-weight: 700"><font face="Cambria">Driver 
					Name</font></span></td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">
					<font face="Cambria">
					<input type="text" name="txtPercentage0" id="txtName2" class="text-box"></font></td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">
					<font face="Cambria">Driver Mobile No</font></td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">
					<font face="Cambria">&nbsp;<input type="text" name="txtPercentage1" id="txtName3" class="text-box"></font></td>
				</tr>
				<tr>
					<td style="width: 122px; height: 29px; border-left-color: #000000; border-left-width: 1px; border-top-color: #000000; border-top-width: 1px">
					<b><font face="Cambria">Route Details</font></b></td>
					<td style="width: 181px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<input name="txtDiscountHead1" id="txtName4" class="text-box"></font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<b><font face="Cambria">Route Charges</font></b></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<input name="txtDiscountHead2" id="txtName5" class="text-box"></font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<b><font face="Cambria">Financial Year</font></b></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">
					<font face="Cambria">
					<select name="cboRollNo0" id="cboRollNo0" class="text-box" onchange="FillName();">
					<option selected value="Select One">Select One</option>
					</select></font></td>
					<td style="width: 154px; height: 29px; border-top-color: #000000; border-top-width: 1px">&nbsp;</td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">&nbsp;</td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">&nbsp;</td>
					<td style="width: 154px; height: 29px; border-right-color: #000000; border-right-width: 1px; border-top-style: none; border-top-width: medium">&nbsp;</td>
				</tr>
				<tr>
					<td height="10" style="border-left-color: #000000; border-left-width: 1px; border-bottom-style: none; border-bottom-width: medium">
					</td>
				</tr>
				<tr>
					<td style="width: 122px; height: 29px; border-style: none; border-width: medium">
					<font face="Cambria">
					<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="text-box"></font></td>
				</tr>
			</form>
		</table>
		<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-bottom-width: 0px" height="1" bordercolor="#000000" id="table4" border="1">
			<tr>
				<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">&nbsp;</td>
			</tr>
		</table>

				

				</span><font face="Cambria"></a></font></table>





	

	

	

		</td>

		

</table>





	

<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">



		<tr>



		<td>



		<table class="CSSTableGenerator" id="table3" >			

		<tr>				

		

		<td height="24"  align="center" style="width: 123px" bgcolor="#95C23D">				

		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				

		Sr. No.</span></td>				

		<td height="24"  align="center" style="width: 123px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Route No</b></font></td>				

		<td height="24"  align="center" style="width: 123px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Bus Number</b></font></td>

		<td height="24"  align="center" style="width: 123px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Timing</b></font></td>				

				

		<td height="24"  align="center" style="width: 123px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Driver Name</b></font></td>		



<td height="24"  align="center" style="width: 124px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Driver Mobile</b></font></td>		



<td height="24"  align="center" style="width: 124px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Route Details</b></font><td height="24"  align="center" style="width: 124px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Route Charges</b></font><td height="24"  align="center" style="width: 124px" bgcolor="#95C23D">				

		<font face="Cambria">				

		<b>Financial Year</b></font><td bgcolor="#95C23D">			

				

				<p align="center">			

				

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Edit</span><font face="Cambria"><b>

				</b>



				</font>



			</tr>



			<?php



				while($row = mysql_fetch_row($rs))

				{


					$srno=$row[0];					

					$routeno=$row[1];					

					$bus_no=$row[2];

					$timing=$row[3];

					$driver_name=$row[4];					

					$driver_mobile=$row[5];		

					$route_details=$row[6];

					$route_charges=$row[7];

					$financial_year=$row[8];

					

					$num_rows=$num_rows+1;



			?>



			<tr>

				<td height="26" align="center" style="width: 123px">				

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $srno; ?></span><font face="Cambria"> </font>				</td>				

				

				<td height="26" align="center" style="width: 123px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $routeno; ?></span><font face="Cambria"> </font>				</td>		

				

				

				<td height="26" align="center" style="width: 123px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $bus_no; ?></span><font face="Cambria"> </font>				</td>			

				

				

				

				

				

				<td height="26" align="center" style="width: 123px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $timing; ?></span><font face="Cambria"> </font>				</td>

				

				<td height="26" align="center" style="width: 123px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $driver_name; ?></span><font face="Cambria"> </font>				</td>

				

				<td height="26" align="center" style="width: 124px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $driver_mobile; ?></span></td>

				

				<td height="26" align="center" style="width: 124px">				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				

				<?php echo $route_details; ?></span><font face="Cambria"> </font>				</td>



				

				<td height="26" align="center" style="width: 124px">				

				<font face="Cambria">				

				<?php echo $route_charges; ?></font></td>



				

				<td height="26" align="center" style="width: 124px">				

				<font face="Cambria">				

				<?php echo $financial_year; ?></font></td>



				

				<td height="26" align="center" style="width: 124px">

				<font face="Cambria">

				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" >Edit</a></font></td>



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
<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>
</div>

</body>







</html>