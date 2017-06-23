<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
$currentdate1=date("d-m-Y");
if($_REQUEST["DateFrom"] !="")
{
		$Dt = $_REQUEST["DateFrom"];
		$arr=explode('/',$Dt);
		$DateFrom= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		$DisplayDateFrom=$arr[1] . "-" . $arr[0] . "-" . $arr[2];

	$Dt = $_REQUEST["DateTo"];
	$arr=explode('/',$Dt);
	$DateTo= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$DisplayDateTo=$arr[1] . "-" . $arr[0] . "-" . $arr[2];
	
	$School=$_REQUEST["cboSchool"];

$ssql="select `srno`,`RegistrationNo`,`sadmission`,`sname`,`sclass`,`sfathername`,DATE_FORMAT(`AdmissionDate`,'%d-%m-%Y') as `AdmissionDate`,`SchoolId` from  `NewStudentAdmission` where 1=1 and `RegistrationNo` !=''";
if($DateFrom!="")
{
	$ssql=$ssql." and `AdmissionDate`>='$DateFrom' and `AdmissionDate`<='$DateTo'";
}

if($SchoolId !="All")
	{
		$ssql=$ssql. " and `SchoolId`='$SchoolId'";
	}

$result=mysql_query($ssql);				
}
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("DateFrom").value=="")
	{
		alert("Please select date from!");
		return;
	}
	if(document.getElementById("DateTo").value=="")
	{
		alert("Please select date to!");
		return;
	}
	document.getElementById("frmReport").submit();
	
}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" />

<title>Daily Admission Report</title>



<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	
<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

</head>



<body>

				<div>

					<strong><font face="Cambria" size="3"><br>Daily Admission Report</font></strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria" size="3"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></body></html><?php

?><br>	
   	
    </font></p>	
   	
    <table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
<form method="post" action="" name="frmReport" id="frmReport">
    	
    		<tr>
   	<td width="50%">
   	<font face="Cambria">Date From :&nbsp; <input type="text" name="DateFrom" id="DateFrom" size="20" class="tcal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
To Date : <input type="text" name="DateTo" id="DateTo" size="20" class="tcal"><br><br></font><p>
	<font face="Cambria">Select School : 
		






				<select name="cboSchool" id="cboSchool" class="text-box">
				<option selected="" value="All">All</option>
				<?php
				while($row = mysql_fetch_row($rsSchool))
				{
				?>
				<option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php
				}
				?>
				</select><br>	
	</font>	

</td>

<td width="562">

<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" class="text-box" onclick="Javascript:Validate();"></font></td>

</tr>
</form>

</table>
<br><br>
<div align="center" id="MasterDiv">
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size:12;
	align: center;
}


.style3 {
	border-style: solid;
	border-width: 1px;
	font-face: Cambria;
	font-size: 12;
	align: center;
	text-align: center;
}


.style4 {
	font-family: Cambria;
	font-size: small;
}
</style>
 <table id="table3" class="CSSTableGenerator" cellspacing="0" cellpadding="0" >

   	<tr>
		   <td class="style3" colspan="7">
			<span class="style4"><strong><span style="font-size: 14pt"><?php echo $SchoolName; ?><br>
			</span>Daily Admission Summary Report<br>Report Date:&nbsp; <?php echo $DisplayDateFrom; ?> to &nbsp; <?php echo $DisplayDateTo; ?></strong></span><strong> </strong></td>
		   

		   			   
   	</tr>

   	<tr>
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">Sr No</font></td>
		   <!--
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">Registration No</font></td>
			-->
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">School</font></td>
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">Admission No</font></td>
		   <td   align="center" width="189" class="style2"   bgcolor="#95C23D">
			<font face="Cambria" size="3">Student Name</font>
			</td>
			<td   align="center"   width="189" class="style2" bgcolor="#95C23D">
			<font face="Cambria" size="3">Admission Class</font></td>
   		   <td   align="center" width="189" class="style2" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Father&#39;s Name</font></td>
   		   
   		   <td   align="center" width="190" class="style2" bgcolor="#95C23D" >
			<font face="Cambria" size="3">Date of Admission</font></td>
		   
		   

		   			   
   	</tr>
<?php
$RecCount=1;
while($cnt = mysql_fetch_row($result))
{
?>

   	<tr>
		   <td   align="center" width="189" class="style2"   >
			<font face="Cambria" size="3"><?php echo $RecCount;?></font></td>
		   <!--
		   <td   align="center" width="189" class="style2"   >
			<font face="Cambria" size="3"><?php //echo $cnt[1];?></font></td>
			-->
			
		   <td   align="center" width="189" class="style2">
			<font face="Cambria" size="3"><?php echo $cnt[7];?></font></td>
			
		   <td   align="center" width="189" class="style2">
			<font face="Cambria" size="3"><?php echo $cnt[2];?></font>
			</td>
			<td   align="center"   width="189" class="style2" >
			<font face="Cambria" size="3"><?php echo $cnt[3];?></font></td>
   		   <td   align="center" width="189" class="style2"  >
			<font face="Cambria" size="3"><?php echo $cnt[4];?></font></td>
   
   		   <td   align="center" width="190" class="style2"  >
			<font face="Cambria" size="3"><?php echo $cnt[5];?></font></td>
			  <td   align="center" width="190" class="style2"  >
			<font face="Cambria" size="3"><?php echo $cnt[6];?></font></td>
		  
		  
		   

		   			   
   	</tr>
   	<?php
   		$RecCount=$RecCount+1;
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
   		