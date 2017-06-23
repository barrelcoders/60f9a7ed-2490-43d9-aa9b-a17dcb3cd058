<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$ssql="SELECT `srno`,`class`,`feeshead`, `amount`,`quarter`,`financialyear`,`datetime` FROM `fees_master` order by `srno`";
$rs= mysql_query($ssql);$num_rows=0;
if($_REQUEST["cboMasterClass"] !="")
{

  $MasterClass=$_POST["cboMasterClass"];
  $FeesHead=$_POST["cboFeesHead"];
  $Amount=$_POST["txtAmount"];
  $FYYear=$_POST["cboFinancialYear"];
 //echo "INSERT INTO `fees_master`(`feeshead`, `class`, `amount`, `quarter`, `financialyear`) VALUES ('$FeesHead','$MasterClass','$Amount','','$FYYear')";
 //exit();
 $rsFeeHead=mysql_query("INSERT INTO `fees_master`(`feeshead`, `class`, `amount`, `quarter`, `financialyear`) VALUES ('$FeesHead','$MasterClass','$Amount','','$FYYear')");
 echo "<br><br><center><b>Fee for Class ".$MasterClass." defined successfully!<b>";

 }  
?>
<script language="javascript">

function Validate()
{

	if (document.getElementById("cboMasterClass").value == "Select One")
	{
		alert ("CLass is mandatory!");
		return;
	}
	if(document.getElementById("cboFeesHead").value=="Select One")
	{
		alert("Fee Head is mandatory!");
		return;
	}
	
	document.getElementById("frmFeeMaster").submit();

}




function ShowEdit(SrNo)
{	
	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
}


</script>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Fees Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">

.style1 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 18px;

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

.style4 {

	font-family: Cambria;

	font-size: 15px;

	color: #000000;

	font-weight: bold;

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

.style5 {

	border-right-style: solid;

	border-right-width: 1px;

}

.style6 {

	border-left-style: solid;

	border-left-width: 1px;

}

.style7 {

	border-left-style: solid;

	border-left-width: 1px;

	text-align: center;

}

.style8 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

}

.style9 {

	font-family: Cambria;

	font-size: 15px;

	color: #FFFFFF;

}

.style10 {

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.style11 {

	border-right-style: solid;

	border-right-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.style12 {

	border-left-style: solid;

	border-left-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style20 {
	border-collapse: collapse;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	color: #000000;
}
.auto-style23 {
	border: medium none #FFFFFF;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-align: left;
	background-color: #FFFFFF;
}

.auto-style3 {
	border-style: solid;
	border-width: 0px;
	text-align: center;
	color: #000000;
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

</style>

</head>
<body>
<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style25">
	<tr>
		<td  bgcolor="#000000" bordercolor="#FFFFFF" bordercolordark="#FFFFFF" bordercolorlight="#FFFFFF" class="auto-style24">

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_11" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td class="auto-style23" style="border-style: none; border-width: medium">
		
		<span class="auto-style22">
		
		<strong>Fees Master</strong><hr class="auto-style3" style="height: 0px" noshade="noshade">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>


	
	
	
		</td>
		
</table>
<table width="100%" border="1" style="border-collapse: collapse">
<form name="frmFeeMaster" id="frmFeeMaster" method="post" action="FeesMaster.php">
<tr>
<td><font face="Cambria">Class</font></td>

<td><font face="Cambria"><select name="cboMasterClass" id="cboMasterClass" style="float: left" ; required  class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `MasterClass` FROM `class_master`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 
						 <?php 
							}
							?>
			</select></font></td>
<td><font face="Cambria">Fees Head</font></td>
<td><font face="Cambria"><select name="cboFeesHead" id="cboFeesHead" style="float: left"  required  class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `feeshead` FROM `fees_head` where `status`='Active'";
                                                      //  echo $ssqlName;die;
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						

						 <?php 
							}
							?>
			</select></font></td>
<td><font face="Cambria">Amount</font></td>
<td><font face="Cambria"><input type="text" name="txtAmount" id="txtAmount" size="20" class="text-box"></font></td>


</tr>




<tr>
<td><font face="Cambria">Financial Year</font></td>

<td><font face="Cambria"><select name="cboFinancialYear" id="cboFinancialYear" style="float: left" ; required  class="text-box">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `financialyear` FROM `FYmaster`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						

						 <?php 
							}
							?>
			</select></font></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>


</tr>




<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

<td>
							<font face="Cambria">
							<input type=button name="btnSubmit" value="Submit " style="font-weight: 700" onclick="javascript:Validate();"></font></td>
<td>&nbsp;</td>
<td>&nbsp;</td>

</tr>




</form>


</table>
<br><br><br><br>
	
	
	<br>
	 
<table cellspacing="1" id="table1" align=center>

		<tr>

		<td>

		<table class="CSSTableGenerator"  id="table3" >			
		<tr>				
		
		<td height="28" align="center" style="width: 188px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		<td height="28" align="center" style="width: 188px" class="style4">				
		Class</td>				
		<td height="28" align="center" style="width: 189px" class="style4">				
		Fees Head</td>
		<td height="28" align="center" style="width: 189px" class="style4">				
		Amount</td>				
				
		<td height="28" align="center" style="width: 189px" class="style4">				
		Quarter</td>						
		<td height="28" align="center" style="width: 189px" class="style4">						Financial Year</td>				
				
			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$class=$row[1];					
					$quarter=$row[2];
					$feeshead=$row[3];
					$amount=$row[4];											$financialyear=$row[5];						
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="30" align="center" style="width: 188px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $srno; ?></span><font face="Cambria"> </font>				</td>				
				
				<td height="30" align="center" style="width: 188px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $class; ?></span><font face="Cambria"> </font>				</td>		
				
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $quarter; ?></span><font face="Cambria"> </font>				</td>			
				
				
				
				
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $feeshead; ?></span><font face="Cambria"> </font>				</td>
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $amount; ?></span><font face="Cambria"> </font>				</td>								
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">								<?php echo $financialyear; ?></span><font face="Cambria">
				</font>				</td>

				
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