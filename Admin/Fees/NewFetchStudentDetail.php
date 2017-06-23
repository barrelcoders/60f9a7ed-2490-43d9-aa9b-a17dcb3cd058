<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<script language="javascript">
function Validate1()
{
	//alert("Hello");
	if (document.getElementById("txtAdmissionNo").value=="")
	{
		alert("Please enter student addmission id");
		return;
	}
	
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
						var selectedQtr="";
			        	rows = new String(xmlHttp.responseText);
			        	selectedQtr=rows;
			        	//alert (selectedQtr.toString());
			        	if (parseInt(selectedQtr) == 1)
			        	{
			        		if(document.getElementById("cboFeeType").value=="Hostel")
			        		{
				        		document.getElementById("frmFees").action = "NewHostelFees.php";
				        		document.frmFees.submit();			        		
			        		}
			        		else
			        		{
				        		document.getElementById("frmFees").action = "NewRegularFees.php";
				        		document.frmFees.submit();			        		
			        		}
			        	}
			        	else if (parseInt(selectedQtr) == 0)
			        	{
			        		//document.frmFees.action="FeesPaymentmonthly.php";
			        		document.getElementById("frmFees").action = "FeesPaymentmonthly.php";
			        		document.frmFees.submit();			        		
			        	}
			        	else
			        	{
			        		alert ("The admission no. does not exist, Please try again!");
			        		return;
			        	}
			        	
			        	
						
						//alert(rows);														
			        }
		      }
		      

			var submiturl="GetFeeSubmissionType.php?addmissionid=" + document.getElementById("txtAdmissionNo").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	
	//document.getElementById("frmFees").submit();
	
}

</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Regular Fees Collection</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.auto-style23 {
	border-style: none;
	border-width: medium;
}
.style5 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}

.auto-style1 {
	font-size: 11pt;
	font-family: Cambria;
}

.auto-style26 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}

.auto-style3 {
	font-family: Cambria;
	color: #000000;
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

.style6 {
	border-style: solid;
	border-width: 1px;
}
.style7 {
	border-style: none;
	border-width: medium;
	text-align: center;
	font-family: Cambria;
	font-weight: bold;
	font-size: 11pt;
}

</style>
</head>

<body>

<p class="auto-style5" style="height: 12px">&nbsp;</p>
	<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
	<strong>Regular </strong></font><strong><font face="Cambria">Fees Collection</font></strong></p>
<hr class="auto-style3" style="height: -15px">

	<p class="auto-style5" style="height: 12px">&nbsp;</p>

	<table width="100%" class="style6">
	<form name="frmFees" id="frmFees" method="post" target="_self">
	
		<tr>
		
		<td style="width: 253px; height: 29px" class="auto-style23">

		<p align="center">

		<span class="style5"><font face="Cambria">Student Admission No. </font> </span>
		<span style="font-weight: 700; " class="auto-style1">
		<font face="Cambria">:</font></span></td>

		<td style="width: 253px; height: 29px" class="auto-style23">

		<input type="text" name="txtAdmissionNo" id="txtAdmissionNo" class="text-box" value="<?php echo $_REQUEST["txtAdmissionNo"]; ?>"></td>

		<td style="width: 253px; height: 29px" class="style7">



		<font face="Cambria">Select Fee Type:</font></td>

		<td style="width: 253px; height: 29px" class="auto-style26">



		<select name="cboFeeType" id="cboFeeType" class="text-box">
		<option selected="" value="Regular" class="text-box">Regular</option>
		<option value="Hostel">Hostel</option>
		</select></td>

		<td style="width: 253px; height: 29px" class="auto-style26">



		<input name="btnGo" type="button" value="Fill Detail" onclick="Javascript:Validate1();" class="text-box"></td>
	</tr>
	</form>
	
		</table>
		
</body>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>

</html>