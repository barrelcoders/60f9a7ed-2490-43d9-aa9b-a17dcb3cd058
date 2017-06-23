<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$ssql="SELECT `srno`,`feeshead`, `amount`,`financialyear`,`datetime` FROM `fees_latefees` order by srno";
$rs= mysql_query($ssql);$num_rows=0;

?>
<script language="javascript">

function ShowEdit(SrNo)
{	
	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
}


</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

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

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style25">
	

	

	
	<tr>
		<td class="auto-style23" ">
		
		<span class="auto-style22">
		
		<strong>Late Fees&nbsp; /Cheque Bounce Master</strong><hr class="auto-style3" style="height: 0px" noshade="noshade">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>


	
	
	
		</td>
		
</table>


	
	
	
<table width="100%" cellspacing="1" class="CSSTableGenerator"  height="80" id="table1">

		<tr>

		<td>

		<table width="100%"  id="table3" class="CSSTableGenerator" border="1" height="46">			
		<tr>				
		
		<td height="22" align="center" style="width: 188px" bgcolor="#95C23D">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		
		<td height="22" align="center" style="width: 189px" class="style4" bgcolor="#95C23D">				
		Fees Head</td>				
				
		<td height="22" align="center" style="width: 189px" class="style4" bgcolor="#95C23D">				
		Fees Amount</td>						
		<td height="22" align="center" style="width: 189px" class="style4" bgcolor="#95C23D">						Financial Year</td>				
				
				<td height="22" align="center" style="width: 189px" bgcolor="#95C23D">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">Edit</span></td>

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$feeshead=$row[1];
					$amount=$row[2];
					$financialyear=$row[3];																	
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="25" align="center" style="width: 188px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $srno; ?></span><font face="Cambria"> </font>				</td>				
				
			
				<td height="25" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $feeshead; ?></span><font face="Cambria"> </font>				</td>
				
				<td height="25" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">				
				<?php echo $amount; ?></span><font face="Cambria"> </font>				</td>								
				<td height="25" align="center" style="width: 189px">				
				<?php echo $financialyear; ?><span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; ">								<?php echo $financialyear; ?></span><font face="Cambria">
				</font>				</td>

				
				<td height="25" align="center" style="width: 189px">
				<font face="Cambria">
				<a href="Javascript:ShowEdit(<?php echo $srno ?>);" class="style3">Edit</a></font></td>

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