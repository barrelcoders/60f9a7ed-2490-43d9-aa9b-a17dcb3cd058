<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
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
   $ChequeNo=$_POST['txtChequeNo'];
   $chequedate=$_POST['chequedate'];
   
   $Quarter=$_POST['cboQuarter'];
   $FinancialYear=$_POST['cboFinancialYear'];
   
   $remark=$_POST['remark'];
   $currentdate=date("Y-m-d");
   
   $rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'FR/2015-2016/','') as UNSIGNED))+1 FROM `fees`");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			$ReceiptNo='FR/2015-2016/'.$rowRcpt[0];
			break;
		}
	}
	else
	{
		$ReceiptNo='FR/2015-2016/1';
	}
	
	
	
   //mysql_query("INSERT INTO `fee_misc_collection` (`sadmission`,`sname`,`sclass`,`srollno`,`feetype`,`feeamount`,`feemode`,`bankname`,`ChequeNo`,`chequedate`,`remark`,`collectiondate`,`receipt`)VALUES('$sadmission','$studentname','$class','$rollno','$feetype','$feeamount','$feemode','$bankname','$ChequeNo','$chequedate','$remark','$currentdate','$ReceiptNo')");
   mysql_query("INSERT INTO `fees` (`sadmission`,`sname`,`sclass`,`srollno`,`feetype`,`feeamount`,`PaymentMode`,`bankname`,`ChequeNo`,`cheque_date`,`Remarks`,`date`,`receipt`,`quarter`,`FinancialYear`,`FeesType`)VALUES('$sadmission','$studentname','$class','$rollno','$feetype','$feeamount','$feemode','$bankname','$ChequeNo','$chequedate','$remark','$currentdate','$ReceiptNo','$Quarter','$FinancialYear','$feetype')");

}
?>

<script language="javascript">

function printDiv() 
{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + 

          divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 }

function CreatePDF() 
{
		
        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

		document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";

		//document.frmPDF.txtprintdiv.value =document.getElementById("divPrint").innerHTML;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
 
        //Print Page
		
        //window.print();
        var FileLocation="http://emeraldsis.com/Admin/StudentManagement/CreateMiscPDF.php?htmlcode=" + escape(document.body.innerHTML);
		window.location.assign(FileLocation);
		return;


        //Restore orignal HTML

        //document.body.innerHTML = oldPage;

 }

function CreatePDF1() 
{
		var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body></html>";

		
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
						alert(rows);
			        	//document.getElementById("txtAnnualFeeDiscount").value=rows;
						//alert(rows);														
			        }

		      }

			var submiturl="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML) + "&receiptno=" + document.getElementById("receiptno").value;
			xmlHttp.open("POST", submiturl,true);
			xmlHttp.send(null);
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName ?> </title>

</head>

<body onload="Javascript:CreatePDF();">

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<style type="text/css">
.style4 {
	text-align: left;
}
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
</style>

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../images/logo.png"  height="81" width="288"></font></p>
	<p align="center" ><font face="Cambria"><span class="style5"><?php echo $SchoolName; ?><br><?php echo $SchoolAddress; ?></span></font><br><b><font face="Cambria">
	(MISC. Fees Receipt)</font></b></p>
	
	
	<p align="center"><b>Receipt No.<?php echo $ReceiptNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:<?php echo date("d-m-Y"); ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 672px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px">

				<font face="Cambria">Student Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $studentname; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Admission No</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sadmission; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $class; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria"> Fees Type</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $feetype; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<font face="Cambria"> Payment Mode</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">
				<font face="Cambria">
				<?php echo $feemode;?>
				</font>
				</td>

			</tr>

			<?php
			if ($ChequeNo !="")
			{
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<font face="Cambria"> Cheque No </font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">
<font face="Cambria">
				<?php echo $ChequeNo;?></font></td>

			</tr>
			<?php
			}
			?>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Fees Paid</td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $feeamount; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Quarter</td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Financial Year </td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				</td>

			</tr>

			</table><br>
&nbsp;</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
<form name="frmPDF" id="frmPDF" method="post" action="CreateMiscPDF.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $ReceiptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> || <a href="FinanceLandingPage.php">HOME</a> 	
</font> 
	
</div>
</body>

</html>

