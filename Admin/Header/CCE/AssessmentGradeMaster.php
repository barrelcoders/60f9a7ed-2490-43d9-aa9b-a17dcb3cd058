<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>


<?php
$ssql="SELECT `srno`,`class`,`examtype`,`MaxMarks`, `datetime` FROM `exam_master` order by `srno`";		
$rs= mysql_query($ssql);$num_rows=0;
?>

<script language="javascript">

function ShowEdit(SrNo)
{	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditExamMaster.php?srno=" + SrNo ,"","width=300,height=400");
}

</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Exam Master</title>

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

<table width="100%" bordercolor="#000000" id="table_10" style="border-width:0px; border-collapse: collapse" border="1" >
	<tr>
		<td width=50% style="border-style: none; border-width: medium" >
		<font face="Cambria">
		<span style="; font-weight: 700; font-size: 12pt; " > Assessment Marks &amp; Grades</span></font><hr  style="height: -15px">
		<font face="Cambria">
		<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right" ></a></font></td>
		
</table>


	
<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table1">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" style="border-collapse: collapse; border-left-width:0px; border-right-width:0px; border-top-width:0px" bordercolor="#000000"border="1">			<tr>				
			<td height="35" style="border-style:none; border-width:medium; ">								
			&nbsp;</td>			</tr>				<tr>				
			<td height="35" style="border-right:medium none #000000; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">								
			<font face="Cambria">								
			<span ><strong>Add New Exam Type</strong></span></font><table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style2" style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-bottom-width: 0px" border="1">
	<form name="frmSubjectMaster" id="frmSubjectMaster" method="post" action="SubjectMaster.php">
		
		<tr>
		<td style="width: 153px; height: 29px; border-left-color:#000000; border-left-width:1px; border-bottom-style:solid; border-bottom-width:1px" >
		<p align="center"><font face="Cambria">Select Class</font></td>
		<td style="width: 154px; height: 29px">
		<p align="center">
		<font face="Cambria">
		<input name="txtClass" id="txtClass" type="text"  style="width: 109; height:25" value="Select Class"></font></td>
		
		
		<td style="width: 154px; height: 29px" >
		<p align="center"><font face="Cambria">Enter Exam Type</font></td>
		<td style="width: 154px; height: 29px">
		<p align="center">
		<font face="Cambria">
		<input name="txtExamType" id="txtSubject" type="text"  style="width: 127; height:22"></font></td>
		
		
		<td style="width: 154px; height: 29px" >
		<p align="center"><font face="Cambria">Maximum Marks</font></td>
		<td style="width: 154px; height: 29px">

		<p align="center">

		<font face="Cambria">

		<input name="txtMaxMarks" id="txtStream" size="15" style="color: #CC0033; width: 100px; float:left" ><span >
		</span>
		</font>
		</td>
		
		<td style="width: 154px; height: 29px" >
		<p align="center">
		<font face="Cambria">Status</font></td>
		<td style="width: 154px; height: 29px; border-right-color:#000000; border-right-width:1px" >

		<p align="center">

		<font face="Cambria">

		<select name="Status" style="width: 64px" >
		<option>1</option>
		<option>0</option>
		</select><span > </span> 
		</font> 
		</td>
		
		</tr>
		<tr>
		<td style="width: 153px; height: 29px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">
		<font face="Cambria">
		<br >
		<input name="BtnSubmit" type="submit" value="Submit" onclick="Validate();" style="font-weight: 700" ><br >
		</font></td>
	</tr>
	</form>
</table>
	
			</td>			</tr>		</table>

		<table width="100%" bordercolor="#000000" id="table3" class="style2" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top-width:0px" height="46">
		<tr>				
		<td height="21"  align="center" style="width: 169px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >

		<b>

		<font face="Cambria">Sr. No.</font></b></td>				
		
		<td height="21"  align="center" style="width: 184px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >				
		<b>				
		<font face="Cambria">Class</font></b></td>				
		
		<td height="21"  align="center" style="width: 262px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >

		<b>

		<font face="Cambria">Exam Type</font></b></td>		

<td height="21"  align="center" style="width: 206px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >

		<b>

		<font face="Cambria">Maximum Marks</font></b></td>				
		
		<td height="21"  align="center" style="width: 206px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >				
		
		<b>				
		
		<font face="Cambria">Date Time</font></b></td>
				
						
				<td height="21"  align="center" style="width: 206px; border-top-style:none; border-top-width:medium" bgcolor="#95C23D" >
				<b>
				<font face="Cambria">Edit</font></b></td>

				
			</tr>

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];
					$class=$row[1];					
					$examtype=$row[2];					
					$MaxMarks=$row[3];	 		
					$datetime=$row[4];
					$num_rows=$num_rows+1;

			?>

			<tr>
				<td height="26" align="center" style="width: 169px" >				
				<font face="Cambria">				
				<?php echo $srno; ?>
				</font>
				</td>				
				
				<td height="26" align="center" style="width: 184px" >	
				
				<font face="Cambria">	
				
				<?php echo $class; ?>				
				</font>				
				</td>		
				
				<td height="26" align="center" style="width: 262px" >
				<font face="Cambria">
				<?php echo $examtype; ?>
				</font>
				</td>			
				
				
				<td height="26" align="center" style="width: 206px" >
				<font face="Cambria">
				<?php echo $MaxMarks; ?>
				</font>
				</td>	
				
				
				<td height="26" align="center" style="width: 206px" >
				<font face="Cambria">
				<?php echo $datetime; ?>				
				</font>				
				</td>
			

				<td height="26" align="center" style="width: 206px" >
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

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>


</body>



</html>