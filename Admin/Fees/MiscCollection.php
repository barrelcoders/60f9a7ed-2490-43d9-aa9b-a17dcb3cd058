<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
/*
if(isset($_POST['submit']))
{
   $sadmission=$_POST['sadmission'];
   $studentname=$_POST['studentname'];
   $class=$_POST['class'];
   $rollno=$_POST['rollno'];
   $feetype=$_POST['feetype'];
   $feeamount=$_POST['feeamount'];
   $feemode=$_POST['feemode'];
   $bankname=$_POST['bankname'];
   $chequedate=$_POST['chequedate'];
   $remark=$_POST['remark'];
   $currentdate=date("Y-m-d");
   mysql_query("INSERT INTO fee_misc_collection(`sadmission`,`sname`,`sclass`,`srollno`,`feetype`,`feeamount`,`feemode`,`bankname`,`chequedate`,`remark`,`collectiondate`)VALUES('$sadmission','$studentname','$class','$rollno','$feetype','$feeamount','$feemode','$bankname','$chequedate','$remark','$currentdate')");
}
*/
$ssql="select distinct `feeshead` from `fees_master`";
$rs=mysql_query($ssql);

$ssqlFY="SELECT distinct `year`,`financialyear` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Miscelleneous Fees Collection</title>
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
<center>
<script language="javascript" type="text/javascript">

function itmcode()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
		 	}
		}
	}
	
	var ch = document.getElementById('itm_cd').value;
	
	var string = "?ch=" + ch;
	itm.open("GET","StudentName.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{
			document.getElementById('studentname').value=itm.responseText;
		}
	}
	
}

function sub_cat()
{
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	var cat = document.getElementById('itm_cd').value;
	
	var string = "?sub_cat=" + cat;
	itm.open("GET","StudentClass.php"+string,true);
	itm.send(null);
	
	itm.onreadystatechange = function()
	{
		if(itm.readyState==4)
		{
			document.getElementById('class').value=itm.responseText;
		}
	}
	
}

function GetDetail()
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
			        	arr_row=rows.split(",");
			        	document.getElementById("studentname").value=arr_row[0];
						document.getElementById("class").value=arr_row[1];
						document.getElementById("rollno").value=arr_row[2];
			        	//alert(rows);														
			        }
		      }
			var submiturl="GetStudentDetail.php?AdmissionId=" + document.getElementById("sadmission").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
function fnlChk()
{
	if(document.getElementById("feemode").value=="Cheque" || document.getElementById("feemode").value=="DD")
	{
		document.getElementById("bankname").disabled=false;
		document.getElementById("chequedate").disabled=false;
		document.getElementById("txtChequeNo").disabled=false;
		
	}
	else
	{
		document.getElementById("bankname").value="";
		document.getElementById("chequedate").value="";
		document.getElementById("txtChequeNo").value="";
		document.getElementById("bankname").disabled=true;
		document.getElementById("chequedate").disabled=true;
		document.getElementById("txtChequeNo").disabled=true;
	}
}
function validate()
{
	if(document.getElementById("cboQuarter").value=="")
	{
		alert("Please select quarter!");
		return;
	}
	document.getElementById("frmMisc").submit();
}
</script>
<form namr="frmMisc" id="frmMisc" method="post" action="MiscFeeCollectionReceipt.php">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">MISC Fees Collection  </p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
<font face="Cambria"> 
<br /><br />
</font>
<table class="name" width="100%"> 
    <tr>
       <td>	
           <font face="Cambria">	
           <label>Admission No.:</label>
        </font>
        </td>
            <td>
        	<!--
        	<select name="sadmission"  class="input" onclick="itmcode(),sub_cat()" id="itm_cd" >
            	<option>Select</option>
            	<?php
					$code=mysql_query("select sadmission from student_master ORDER BY sadmission ASC");
					while($cd=mysql_fetch_array($code))
					{
						echo '<option>'.$cd['sadmission'].'</option>';
					}
				?>
            </select>
            -->
            <input name="sadmission" id="sadmission" type="text" onkeyup="Javascript:GetDetail();"></td>
			<td><font face="Cambria"><label>Student Name:</label></font></td>
			<td><input type="text" name="studentname" class="input"  id="studentname"/></td>
			<td><font face="Cambria"><label>Class:</label></font></td>
			<td><input type="text" name="class" class="input" id="class" /></td>
			<td><font face="Cambria"><label>Roll No.:</label></font></td>
			<td><input type="text" name="rollno" class="input" id="rollno" /></td>
     </tr>
</table>
<br>
<table class="name" width="100%"> 
		  <tr>
			<td align="left"><font face="Cambria">Fee Type:</font></td>
			<td style="padding:0px 300px 0px 0px">
			<select name="feetype" id="feetype">
			<option value="Late Fees" selected="selected">Late Fees</option>
			</select></td>
		  </tr>
		  <tr>
			<td align="left">&nbsp;</td>
			<td style="padding:0px 300px 0px 0px">&nbsp;</td>
		 </tr>
  
		  <tr>
			<td align="left">Quarter</td>
			<td style="padding:0px 300px 0px 0px"><select name="cboQuarter">
			<option selected="" value="Select One">Select One</option>
			<option value="Q1">Q1</option>
			<option value="Q2">Q2</option>
			<option value="Q3">Q3</option>
			<option value="Q4">Q4</option>
			</select></td>
		 </tr>
  
		  <tr>
			<td align="left">&nbsp;</td>
			<td style="padding:0px 300px 0px 0px">&nbsp;</td>
		 </tr>
  
		  <tr>
			<td align="left">Financial Year</td>
			<td style="padding:0px 300px 0px 0px">
			<select name="cboFinancialYear">
			<?php
				while($rowFY = mysql_fetch_row($rsFY))
				{
							$Year=$rowFY[0];
							$FYear=$rowFY[1];
				?>
				<option value="<?php echo $Year; ?>"><?php echo $FYear; ?></option>
				<?php 
				}
				?>
			</select></td>
		 </tr>
  
		  <tr>
			<td align="left">&nbsp;</td>
			<td style="padding:0px 300px 0px 0px">&nbsp;</td>
		 </tr>
  
		  <tr>
			<td align="left"><font face="Cambria">Fee Amount:</font></td>
			<td style="padding:0px 300px 0px 0px"><font face="Cambria">
			<input name="feeamount" style="float: left" /></font></td>
		 </tr>
  
          <tr>
			<td align="left">&nbsp;</td>
			<td style="padding:0px 300px 0px 0px">&nbsp;</td>
          </tr>
  
          <tr>
			<td align="left"><font face="Cambria">Fee Payment Mode:</font></td>
			<td style="padding:0px 300px 0px 0px"><font face="Cambria">
			<select name="feemode" id="feemode" onchange="Javascript:fnlChk();">
					<option value="selectmade:">Select Mode:</option>
					<option value="cash">Cash</option>
					<option value="Cheque">Cheque</option>
					<option value="DD">DD</option>			
			</select></font></td>
          </tr>
          <tr>
				<td align="left">&nbsp;</td>
				<td style="padding:0px 300px 0px 0px">&nbsp;</td>
		  </tr>
          <tr>
				<td align="left"><font face="Cambria">Bank Name:</font></td>
				<td style="padding:0px 300px 0px 0px"><font face="Cambria">
				<input name="bankname" id="bankname" style="float: left" disabled="disabled" /></font></td>
		  </tr>
          <tr>
				<td align="left">&nbsp;</td>
				<td style="padding:0px 300px 0px 0px">
				&nbsp;</td>
          </tr>
          <tr>
				<td align="left"><font face="Cambria">Cheque No:</font></td>
				<td style="padding:0px 300px 0px 0px">
				<input name="txtChequeNo" id="txtChequeNo" type="text" disabled="disabled"></td>
          </tr>
          <tr>
				<td align="left">&nbsp;</td>
				<td style="padding:0px 300px 0px 0px">&nbsp;</td>
          </tr>
          <tr>
				<td align="left"><font face="Cambria">Cheque Date:</font></td>
				<td style="padding:0px 300px 0px 0px"><font face="Cambria">
				<input name="chequedate" id="chequedate" type="date" style="float: left" disabled="disabled" /></font></td>
          </tr>
          <tr>
				<td align="left">&nbsp;</td>
				<td style="padding:0px 300px 0px 0px">&nbsp;</td>
		</tr>
          <tr>
				<td align="left"><font face="Cambria">Remark:</font></td>
				<td style="padding:0px 300px 0px 0px"><font face="Cambria">
				<textarea rows="2" cols="13" placeholder="Enter text here...." style="float: left" name="remark"></textarea></font></td>
		</tr>
</table>
<table align="center">
  <tr>  
    <td>
	<p style="padding:0px 900px 0px 0px"><font face="Cambria">
	<input name="submit" type="button" value="Submit" style="font-weight: 700" onclick="javascript:validate();" ></font></td>
  </tr>
</table>
</form>

<div align="center">
<table border=1 style="width:100%; border-collapse:collapse" cellspacing="0" cellpadding="0">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		SNo.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Roll No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Fee type</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Fee Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Fee Mode</font></b></td>
	    <td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Bank Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Cheque Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Remark</font></b></td>
   	</tr>';
<?php
$result=mysql_query("select * from fee_misc_collection");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sadmission"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sname"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["sclass"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["srollno"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["feetype"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["feeamount"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["feemode"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["bankname"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["chequedate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["remark"];?></font></td>
</tr>
<?php   	 
}
?>
</table>

</div>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies 
LLP</font></div>
</div>
</body>
</html>