<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$ssql="SELECT `SrNo`, `sadmisson`, `sname`, `sclass`, `srollno`, `sfathername`, `smothername`, `FYear`, `CGPASem1`, `CGPASem2`, `CGPAOverall`, `ConceptWorkHabits`, `AttitudeBehaviour`, `ExtraCurricular`, `SpecialTalent`, `LongLeaveReason`, `SpecialIncident`, `EmpId`, `DateOfEntry`, `SystemDateTime`,`L1ApprovalStatus` FROM `StudentDossier` where`L1ApprovalStatus`='Approved'";
	//echo $ssql;
	//exit();
	
	
	
	
$rs= mysql_query($ssql);



?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Tournament Of Towns Registration Report</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Cambria;
        font-weight:bold;

}


.style2 {
	text-align: left;
}
.style3 {
	font-family: Cambria;
}


.style4 {
	text-align: right;
}
.style5 {
	border-collapse: collapse;
		border-left-style: solid;
	border-left-width: 0px;
	border-right-style: solid;
	border-right-width: 0px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 0px;
}


.style6 {
	text-align: right;
	border-top-style: solid;
	border-top-width: 1px;
	border-left-color: #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style10 {
	border-style: solid;
	border-width: 1px;
	text-align: right;
	}


.style12 {
	border-left: 1px solid #C0C0C0;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style13 {
	border-style: solid;
	border-width: 1px;
}
.style14 {
	border-left-style: solid;
	border-left-width: 1px;
	border-right: 1px solid #A0A0A0;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}


</style>
<script type="text/javascript" language="javascript">
function fnlApprove(recno,AdmId)
{
	

	ctrlApproveBtn="btnApprove" + recno;
	
	document.getElementById(ctrlApproveBtn).disabled="true";
	
	
	

	var AdmissionId=AdmId;
	var myWindow = window.open("DossierApproveLevel2.php?AdmId=" + AdmissionId+ "&action=approve", "", "width=200, height=100");	
}
</script>
</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Dossier Approve</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<p>&nbsp;</p>

<font face="Cambria">
<br>
<br>
</font>
<div id="MasterDiv">


<table width="94%" style="border-collapse: collapse;" border="0" class="CSSTableGenerator" cellspacing="0" cellpadding="0">
<tr>
		   <td class="style3" color="#FFFFFF" colspan="17" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #A0A0A0; border-right-width: 1px">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"></img></font><br>
			<img src="../images/logo.png" width=250 height="70"></font></span></b><p style="text-align: center"><br><font size="2"><?php echo $SchoolAddress; ?><br>
			<span class="style4"><b>Student Dossier Approval</b></span><b></td>
		   

		   			   
   	</tr>

<tr>
<td height="22" align="center" class="style12" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Admission No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Class</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Roll No</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">CGPA Sem-1</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">CGPA Sem-2</font></b></td>
		<td height="22" align="center" class="style14">
		<b><font face="Cambria">Overall CGPA </font></b></td>
		<td height="22" align="center" class="style14">
		<b><font face="Cambria">Concepts/ Work Habits</font></b></td>
       <td height="22" align="center" class="style14">
		<b><font face="Cambria">Attitude/ Behavior</font></b></td>

         <td height="22" align="center" class="style14">
						<b><font face="Cambria">Extra Curricular Activities</font></b></td>
        <td height="22" align="center" class="style14">
						<b><font face="Cambria">Special Talent</font></b></td>

         <td height="22" align="center" class="style14">
						<b><font face="Cambria">Record for long leave and reason</font></b></td>

            <td height="22" align="center" class="style14">
						<b><font face="Cambria">Any special incident and 
						measures takes</font></b></td>
						 <td height="22" align="center" class="style14">
						<b><font face="Cambria">Level 1 Approval Status</font></b></td>


                <td height="22" align="center" class="style14">
						<b><font face="Cambria">Approve</font></b></td>
						
						  <td height="22" align="center" class="style14">
						<b><font face="Cambria">Edit</font></b></td>



		
				
		
</tr>
<?php
$recno=1;
	while($row = mysql_fetch_row($rs))
	{
		$admission=$row[1];
        $name=$row[2];
        $class=$row[3];
        $roll=$row[4];
        $CGPASem1=$row[8];
        $CGPASem2=$row[9];
        $OverallCGPA=$row[10];
        $WorkHabit=$row[11];
        $Attitude=$row[12];
        $Extracurricular=$row[13];
        $SpecialTalent=$row[14];
        $LongLeave=$row[15];
        $SpecialIncident=$row[16];
        $L1ApprovalStatus=$row[20];                



		 
?>

<tr>
<td style="width: 59px" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 104px" font="Cambria" class="style13"><font face="Cambria"><?php echo $admission;?></font></td>
<td style="width: 90px" font="Cambria" class="style13"><font face="Cambria"><?php echo $name;?></font></td>
<td style="width: 126px" font="Cambria" class="style13"><font face="Cambria"><?php echo $class;?></font></td>
<td style="width: 124px" font="Cambria" class="style13"><font face="Cambria"><?php echo $roll;?></font></td>
<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria"><?php echo $CGPASem1;?></td>
<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria"><?php echo $CGPASem2;?></td>
<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria"><?php echo $OverallCGPA;?></td>
<td style="width: 74px" font="Cambria" class="style13"><font face="Cambria"><?php echo $WorkHabit;?></font></td>
<td style="width: 73px" font="Cambria" class="style10"><font face="Cambria"><?php echo $Attitude;?></font></td>
<td style="width: 71px" font="Cambria" class="style13"><font face="Cambria"><?php echo $Extracurricular;?></font></td>
<td style="width: 161px" font="Cambria" class="style13"><font face="Cambria"><?php echo $SpecialTalent;?></font></td>

<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria"><?php echo $LongLeave;?></td>
<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria"><?php echo $SpecialIncident;?></td>
<td style="width: 113px" font="Cambria"class="style13"><font face="Cambria"><?php echo $L1ApprovalStatus;?></td>

<td style="width: 113px" font="Cambria" class="style13"><font face="Cambria">
</font>
<input name="btnApprove<?php echo $recno;?>" id="btnApprove<?php echo $recno;?>" type="button" value="Approve" onclick="Javascript:fnlApprove('<?php echo $recno;?>','<?php echo $admission;?>');"></td>
<td style="width: 113px" font="Cambria"class="style13"><font face="Cambria"></td>


<?php
$recno=$recno+1;
	}
?>
</table>
</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>

<font face="Cambria">

</font>

<?php include"footer.php";?>
<!--<div class="footer" align="center">
  <!--  <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->

</body>
</html>