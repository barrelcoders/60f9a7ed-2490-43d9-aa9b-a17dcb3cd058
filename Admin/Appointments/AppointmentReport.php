<?php
session_start();
include '../../connection.php';
include '../../AppConf.php'; 
include '../Header/Header3.php';
?>
<?php
$currentdate1=date("d-m-Y");
if($_REQUEST["DateFrom"] !="")
{
		$DateFrom = $_REQUEST["DateFrom"];
	

	$DateTo = $_REQUEST["DateTo"];
	
	
$rs=mysql_query("SELECT `srno`, `Name`, `Designation`, `CompanyName`,`VisitorMobile`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, `DateofAppointment`, `FromTimeOfAppointment`, `ToTimeOfAppointment`, `Remarks` FROM `appointment` WHERE `DateofAppointment` BETWEEN '$DateFrom' and '$DateTo'");
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Appointment  Report</title>
<script language="javascript">
function fnlFillClass()
{
			try
		    {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
			}
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
			        	//rows=rows.substr(3,rows.length);
			        	//alert(rows);
			        	
			        	removeAllOptions(document.frmRpt.cboClass1);
			        	 
			        	//document.getElementById("txtStudentName").value="";
			        	addOption(document.frmRpt.cboClass1,"Select One","Select One")
			        	arr_row=rows.split(',');
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmRpt.cboClass1,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        	//alert(rows);														
			        }
		      }

			var submiturl="GetClassWithSection.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
function Validate()
{
document.getElementById("frmReport").submit();
}

</script>
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


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Appointment Report</font></b></p>

<hr>
<p><font face="Cambria"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></font></p>
<font face="Cambria">
<p>
<br>
<br>
</font>
</p>
<table id="table3" class="style1" style="width:100%; " cellspacing="0" cellpadding="0">
<form method="post" action="" name="frmReport" id="frmReport">
    	
    		<tr>
   	<td width="50%">
   	<font face="Cambria">Date From :&nbsp; <input type="date" name="DateFrom" id="DateFrom" size="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
To Date : <input type="date" name="DateTo" id="DateTo" size="20"></font></td>

<td width="562">

<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" class="text-box" onclick="Javascript:Validate();" style="font-weight: 700"></font></td>

</tr>
</form>

</table>

<div id="MasterDiv">
<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator">
	<tr>
		   <td class="style3" color="#FFFFFF" colspan="10">
			<p style="text-align: center"><b>
			<span class="style4"><font size="4"><img src="../images/logo.png" width=250 height="70"></img></font><br>
			<?php echo $SchoolAddress; ?></span></b><p style="text-align: center"><b>
         	<span class="style4"><span style="font-size: 12pt">Appointment Report<br></strong></span></span><strong><font style="font-size: 12pt"> </font> </strong></td>
		   

		   			   
   	</tr>


<tr>
<td height="22" align="center" style="border-style: solid; border-width: 1px" ><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" style="border-style: solid; border-width: 1px" >
		<b><font face="Cambria">Date</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Start Time</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">End Time</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Organization</font></b></td>
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Contact No</font></b></td>
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Remarks</font></b></td>
				
		
		
		<td height="22" align="center" style="border-style: solid; border-width: 1px">
		<b><font face="Cambria">Employee Name</font></b></td>
				
		
		
</tr>
<?php
$recount=1;
	while($row = mysql_fetch_row($rs))
	{
	$srno=$row[0];
?>
<tr>
<td style="width: 45px" font="Cambria"><font face="Cambria"><?php echo $recount;?></font></td>
<td style="width: 40px" font="Cambria"><font face="Cambria"><?php echo $row[8];?></font></td>
<td style="width: 31px" font="Cambria"><font face="Cambria"><?php echo $row[9];?></font></td>
<td style="width: 31px" font="Cambria"><font face="Cambria"><?php echo $row[10];?></font></td>
<td style="width: 225px" font="Cambria"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 199px" font="Cambria"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 46px" font="Cambria"><font face="Cambria"><?php echo $row[3];?></font></td>
<td style="width: 78px" font="Cambria"><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 57px" font="Cambria"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 57px" font="Cambria"><font face="Cambria"><?php echo $row[6];?></font></td>


</tr>
<?php
	
	$recount++;
	}
?>
</table></div>
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
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html>