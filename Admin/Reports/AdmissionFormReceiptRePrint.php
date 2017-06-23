<?php 

include '../../connection.php'; 

include '../Header/Header3.php';

include '../../AppConf.php'; 

?>

<?php 

if ($srno!= "")
{
			$srno=$_REQUEST["srno"];
			$currentdate=date("d-m-Y");
			$ssqlRegi="SELECT `sname`,`slastname`,`RegistrationNo`,`sclass`,`TxnAmount`,`smobile`,`email`,`AdmissionFeeReceipt`,`sadmission` FROM `NewStudentAdmission` as `a` where `srno`='$srno'";
			$rsRegiNo1= mysql_query($ssqlRegi);
			if (mysql_num_rows($rsRegiNo1) > 0)
			{
				while($row2 = mysql_fetch_row($rsRegiNo1))
				{
							$sname=$row2[0];
							$slastname=$row2[1];
							$StudentName=$sname." ".$slastname;
							$RegistrationNo=$row2[2];
							$sclass=$row2[3];
							$TxnAmount=$row2[4];	
							$smobile=$row2[5];						
							$email=$row2[6];
							$ReceiptNo=$row2[7];
							$sadmission=$row2[8];
							break;						
				}
			}
}
else
{
	exit();
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

        var FileLocation="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);

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



<title><?php echo $SchoolName; ?> </title>







	







<style type="text/css">

.style1 {

	border-collapse: collapse;

}

.style2 {

	font-family: Cambria;

}

.style3 {

	font-weight: bold;

	text-decoration: underline;

}

</style>







	







</head>



<!--<body onload="Javascript:CreatePDF();">-->

<body>



<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >



	<div align="center">

<table style="width: 61%">

<tr>

<td>

<h1 align="center"><b><font face="cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>

</td>

</tr>

<tr>

<td align="center">

<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>

</td>

</tr>

<tr>

<td align="center">

<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>

</td>

</tr>

<tr>

<td align="center">

<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>

</td>

</tr>

</table>

</div>



	

	<p align="center" class="style3" ><font face="Cambria">Admission Fees Receipt</font></p>

	<br>

	<p align="center"><b><span class="style2">Receipt No. <?php echo $ReceiptNo; ?>

	</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<span class="style2">Date: 	</span><?php echo date("d-m-Y"); ?></b></p>

	

										
<br>


	<div align="center">



		<table cellpadding="0" style="border-style:dotted; border-width:1px; width: 61%; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >



			<tr>



				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 277px">



				<font face="Cambria">Student Name</font></td>



				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 278px">



				<font face="Cambria">



				<?php echo $StudentName; ?>

				</font></td>



			</tr>



			<tr>



				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 277px" >



				<span class="style2">Admission</span><font face="Cambria"> No</font></td>



				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 278px">



				<font face="Cambria">



				<?php echo $sadmission; ?>



				</font></td>



			</tr>



			<tr>



				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 277px" >



				<font face="Cambria">Student Class</font></td>



				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 278px">



				<font face="Cambria">



				<?php echo $sclass; ?>



				</font></td>



			</tr>



			<tr>



				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 277px" >



				<span class="style2">Admission</span><font face="Cambria"> Fees Amount</font></td>



				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 278px">



				<font face="Cambria">



				<?php echo $TxnAmount; ?>



				</font></td>



			</tr>



			<tr>



				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 277px" >



				<b>



				<font face="Cambria">Total Fees Paid</font></b></td>



				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 278px">



				<b><font face="Cambria">



				<?php echo $TxnAmount; ?></font></b></td>



			</tr>



		</table><br>

		<table style="width: 62%" class="style1">

			<tr>

				<td>

				<ul>

					<li><font face="Cambria"><em>Admission Fee refund is subject 
					to School admission guidelines &amp; declaration</em></font> </li>

				</ul>

				</td>

			</tr>

		</table>

&nbsp;</div>



	<p align="center"><font face="Cambria"><strong>This is an electronically 

	generated receipt and does not require any signature.</strong></font></p>

<form name="frmPDF" id="frmPDF" method="post" action="..Admin/StudentManagement/CreatePDF.php">

		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">

		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">

		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">

		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">

</form>	

</div>

	

<div id="divPrint">

	

	<p align="center">

	<font face="Cambria">

	<a href="Javascript:printDiv();">PRINT</a>	| <a href="Registration.php">HOME</a>

</font> 

	

</div>

</body>



</html>

