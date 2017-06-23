<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$ssql="SELECT `SrNo`,`ExamName`,`ExamFee`, `WorkBook`,`TextBook`,`sclass` FROM `fees_exam_master` order by `srno`";
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



</style>

</head>



<body>

<p>&nbsp;</p>

<table width="100%">
	

	

	
	<tr>
		<td>
		
				<font face="Cambria">
		
		<strong>Exam Fees Master</strong></font><hr class="auto-style3" style="height: 0px" noshade="noshade">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				
</table>


	
	
	
<table width="100%" cellspacing="1" style="border-collapse: collapse" height="80" id="table1">

		<tr>

		<td>

		<table width="100%" bordercolor="#000000" id="table3" class="style2" border="1" height="57">			
		<tr>				
		
		<td height="28" align="center" style="width: 188px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				
		Sr. No.</span></td>				
		<td height="28" align="center" style="width: 188px" class="style4">				
		Exam Name</td>				
		<td height="28" align="center" style="width: 189px" class="style4">				
		Exam Fees</td>
		<td height="28" align="center" style="width: 189px" class="style4">				
		Work Book (Optional)</td>				
				
		<td height="28" align="center" style="width: 189px" class="style4">				
		Text Book (Optional)</td>						
		<td height="28" align="center" style="width: 189px" class="style4">						
		Class</td>				
				
				

			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$ExamName=$row[1];					
					$ExamFee=$row[2];
					$WorkBook=$row[3];
					$TextBook=$row[4];
					$sclass=$row[5];						
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="30" align="center" style="width: 188px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">				
				<?php echo $SrNo; ?></span><font face="Cambria" style="font-size: 11pt"> </font>				</td>				
				
				<td height="30" align="center" style="width: 188px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">				
				<?php echo $ExamName; ?></span><font face="Cambria" style="font-size: 11pt"> </font>				</td>		
				
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">				
				<?php echo $ExamFee; ?></span><font face="Cambria" style="font-size: 11pt"> </font>				</td>			
				
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">				
				<?php echo $WorkBook; ?></span><font face="Cambria" style="font-size: 11pt"> </font>				</td>
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">				
				<?php echo $TextBook; ?></span><font face="Cambria" style="font-size: 11pt"> </font>				</td>								
				
				
				<td height="30" align="center" style="width: 189px">				
				<span style="font-family: Cambria; font-size: 11pt; font-weight: normal; font-style: normal; text-decoration: none">								<?php echo $financialyear; ?></span><font face="Cambria" style="font-size: 11pt">
				<?php echo $sclass; ?></font>				</td>

				
				

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