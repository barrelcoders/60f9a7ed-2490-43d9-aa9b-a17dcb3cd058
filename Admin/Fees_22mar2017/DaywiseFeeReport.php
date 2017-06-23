<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

if ($_REQUEST["isSubmit"]=="yes")
{	
	//$ssql="SELECT `sadmission`,`sname`,`sclass`,`srollno` ,`amountpaid`,`SecurityAmtPaid`,`Discount`,`TotalAmtPaid`,`quarter`,`receipt`,`refundamount`,`refunddate`,`cancelamount`,`canceldate`,`status` FROM `AdmissionFees` where 1=1";	
	
		$Dt = $_REQUEST["txtStartDate"];
		$arr=explode('/',$Dt);
		$StartDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		
		$Dt = $_REQUEST["txtEndDate"];
		$arr=explode('/',$Dt);
		$EndDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	
	$ssql="select distinct DATE_FORMAT(y.`datetime`,'%d-%m-%Y') as `datetime`,sum(y.`fees_amount`) as `AmtPayable`,sum(y.`amountpaid`) as `AmtPaid`,sum(y.`BalanceAmt`) as `BalanceAmt` from";
	$ssql=$ssql . " (";
	$ssql=$ssql . "select x.* from ";
	$ssql=$ssql . "(";
	$ssql=$ssql . "SELECT `receipt`,`fees_amount`,`amountpaid`,`BalanceAmt`,`date` as `datetime` FROM `fees` where DATE_FORMAT(`date`,'%Y-%m-%d') >= '$StartDate' and DATE_FORMAT(`date`,'%Y-%m-%d') <='$EndDate' ";
	$ssql=$ssql . ") as `x`";
	$ssql=$ssql . ") as `y` group by DATE_FORMAT(y.`datetime`,'%Y-%m-%d')";
	
	$rs= mysql_query($ssql);
}




$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);


?>
<SCRIPT language="javascript">
function FillSubject()
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


			        	removeAllOptions(document.frmAdmissionFeeRpt.cboSubject);


			        	addOption(document.frmAdmissionFeeRpt.cboSubject,"All","All")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{

			        			//addOption(document.frmAdmissionFeeRpt.cboRollNo,arr_row[0],arr_row[0])			        			 
			        			addOption(document.frmAdmissionFeeRpt.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        }

		      }

			if (document.getElementById("cboClass").value=="All")
			{

				removeAllOptions(document.frmAdmissionFeeRpt.cboSubject);

				addOption(document.frmAdmissionFeeRpt.cboSubject,"All","All")
			}

			else
			{
			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			}
}

function removeAllOptions(selectbox)
	{

	

		var i;

		for(i=selectbox.options.length-1;i>=0;i--)

		{

			selectbox.remove(i);

		}

	}

	function removeOption(selectbox,indx)
	{
		var i;

		i=indx;

			selectbox.remove(i);
	}

	function addOption(selectbox,text,value )
	{
		var optn = document.createElement("OPTION");

		optn.text = text;

		optn.value = value;

		selectbox.options.add(optn);

	}
function Validate2()
{
	if (document.getElementById("txtStartDate").value != "")
	{
		if (document.getElementById("txtEndDate").value == "")
		{alert("Please select To-Date!"); return;}
	}
	if (document.getElementById("txtEndDate").value != "")
	{
		if (document.getElementById("txtStartDate").value == "")
		{alert("Please select From-Date!"); return;}
	}
	document.getElementById("frmAdmissionFeeRpt").submit();
}

</SCRIPT>
<script language="javascript">
	function fnRedirect()
	{
		var FileLocation="http://emeraldsis.com/Admin/StudentManagement/PDFInvoices/" + document.getElementById("FileName").value ;
		//alert (FileLocation);	
		window.location.assign(FileLocation);
	}
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

<html>

<head>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
	<script type="text/javascript" src="tcal.js"></script>





</head>

<body>
<font="Cambria">
<p>&nbsp;</p>
<table style="width: 100%" class="style4">


	<tr>

		<td class="style4"><b><font face="Cambria">View Daywise Fee Collection Report</font></b><hr><p>&nbsp;</td>

	</tr>
</table>
<table>
<tr>
<td>
	
	<table class="auto-style7" style="width: 100%">
	<form name="frmAdmissionFeeRpt"	id="frmAdmissionFeeRpt" method="post" action="DaywiseFeeReport.php">
		<font face="Cambria">
		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
		</font>
	<td class="auto-style6">
				<font face="Cambria">Start Date:</font></td>
	
	<td class="auto-style10" style="width: 139px">
				<font face="Cambria">
				<input name="txtStartDate" id="txtStartDate" type="text" class="tcal" readonly="readonly"></font></td>
	
	<td style="width: 156px" class="style7">
				<font face="Cambria">End Date</font></td>
	
	<td style="width: 152px" class="auto-style9">
				<font face="Cambria">
				<input name="txtEndDate" id="txtEndDate" type="text" class="tcal" readonly="readonly"></font></td>
	
	<td style="width: 130px" class="auto-style8">
				<font face="Cambria">
				<img border="0" src="images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate2();"></font></td>
				</form>
	</table>
	
		</td></tr></table>
<font face="Cambria">
<p>&nbsp;</p>
<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left">



<tr valign="top">

<th scope="row" valign="middle">

<p><font face="wp_bogus_font">Upload Attendance</font></p></th>

<td width="67%" valign="middle">

<form action="upload_attendance.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload Attendance:<input type="file" name="file" id="file" /><br />

<input type="submit" name="submit" value="Submit" /></font></form>

<p><font face="wp_bogus_font">Click <a target="_blank" href="Attendance.xls"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />

</font></td>

</tr>



</table>

-->
<div id="MasterDiv">
<style type="text/css">
.style1 {
	text-align: right;
	font-family: Cambria;
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
.style2 {
	font-family: Cambria;
}
</style>

<?php
if ($_REQUEST["isSubmit"]=="yes")
{
			if(mysql_num_rows($rs)>0)
			{
							$Cnt=1;
		?>
		</font>
		<table width="100%" cellpadding="0" class="CSSTableGenerator">
			<tr>
				<td style="border-style:solid; border-width:1px; " class="style2" align="center" colspan="4">
				<strong>Day - Book</strong></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 94px" class="style8" align="center"><font face="Cambria"><strong>SrNo</strong></font></td>
				<td style="border-style:solid; border-width:1px; width: 272px" class="style8" align="center"><font face="Cambria"><strong>Date</strong></font></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style8" align="center"><font face="Cambria"><strong>Amt. Payable</strong></font></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px" class="style8" align="center"><font face="Cambria"><strong>Amt. Paid</strong></font></td>
				
			</tr>
			<?php
				$ccnt=1;
					$TotalPayable=0;
   					$TotalPaid=0;
   					$TotalBalance=0;
   					
				while($row1 = mysql_fetch_assoc($rs))
   				{	
					$datetime=$row1['datetime'];
					$AmtPayable=$row1['AmtPayable'];
					$AmtPaid=$row1['AmtPaid'];
					$BalanceAmt=$row1['BalanceAmt'];
					
					$TotalPayable=$TotalPayable+$AmtPayable;
					$TotalPaid=$TotalPaid+$AmtPaid;
					$TotalBalance=$TotalBalance+$BalanceAmt;
					
			?>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 94px" class="style9"><font face="Cambria"><?php echo $ccnt; ?></font></td>
				<td style="width: 272px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; text-align:right" class="style9"><font face="Cambria"><?php echo $datetime; ?></font></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px; text-align:right" class="style9"><font face="Cambria"><?php echo $AmtPayable;?></font></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px; text-align:right" class="style9"><font face="Cambria"><a href="ShowDayWiseFeeDetail.php?datetime=<?php echo $datetime; ?>" target="_blank"><?php echo $AmtPaid; ?></a></font></td>
				
			</tr>
			<?php
			$ccnt = $ccnt+1;
				}
			?>
			
			<tr>
				<td class="style1" colspan="2" style="border-style: solid; border-width: 1px"><strong>Total:</strong></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px; text-align:right" class="style9"><strong><?php echo $TotalPayable; ?></strong></td>
				
				<td style="border-style:solid; border-width:1px; width: 273px; text-align:right" class="style9"><strong><?php echo $TotalPaid; ?></strong></td>
				
			</tr>
						
		</table>
		<font face="Cambria">
		<?php
	}
}
?>
</font>
</div>
<div id="divPrint">
	
	<p align="center"><br><br>
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 
</font> 
	
</div>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>

</html>