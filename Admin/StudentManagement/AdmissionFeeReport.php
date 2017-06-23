<?php include '../../connection.php';?>








<?php





if ($_REQUEST["isSubmit"]=="yes")

{

	

	$ssql="SELECT `sadmission`,`sname`,`sclass`,`srollno` ,`amountpaid`,`SecurityAmtPaid`,`Discount`,`TotalAmtPaid`,`quarter`,`receipt`,`refundamount`,`refunddate`,`cancelamount`,`canceldate`,`status` FROM `AdmissionFees` where 1=1";	





	if ($_REQUEST["cboClass"] != "All")

	{

		$SelectedClass=$_REQUEST["cboClass"];

		$ssql=$ssql . " and `sclass`='$SelectedClass'";

	}

	

		$Dt = $_REQUEST["txtStartDate"];

		$arr=explode('/',$Dt);

		$StartDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

		

		$Dt = $_REQUEST["txtEndDate"];

		$arr=explode('/',$Dt);

		$EndDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

		

		if ($_REQUEST["txtEndDate"] !="")

		{

			$ssql=$ssql . " and DATE_FORMAT(`datetime`,'%Y-%m-%d') >= '$StartDate' and DATE_FORMAT(`datetime`,'%Y-%m-%d') <='$EndDate'";

		}

	

	$ssql=$ssql . " order by `datetime`";

	//echo $ssql;

	//exit();

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

<html>



<head>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">



.style1 {



	border-color: #000000;



	border-width: 0px;



	border-collapse: collapse;

font-family: Cambria;

	}



.style4 {

	text-align: left;

	border-style: solid;

	border-width: 1px;

	background-color: #DCBA7B;

	color: #000000;

	font-family: Cambria;

}



.auto-style7 {

	border-width: 0px;

}

.auto-style6 {

	border-left-style: solid;

	border-left-width: 1px;

	border-top-style: solid;

	border-top-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style3 {

	font-family: Cambria;

	color: #000000;

}

.auto-style10 {

	text-align: center;

	font-family: Cambria;

	color: #000000;

	font-style: normal;

	text-decoration: none;

	border-top-style: solid;

	border-top-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}



.auto-style1 {

	text-align: right;

	font-family: Cambria;

	color: #000000;

	font-style: normal;

	text-decoration: none;

	border-top-style: solid;

	border-top-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style9 {

	border-top-style: solid;

	border-top-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

	text-align: center;

}

.auto-style8 {

	border-right-style: solid;

	border-right-width: 1px;

	border-top-style: solid;

	border-top-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

	text-align: center;

}

.auto-style11 {

	text-align: center;

	border-style: none;

	border-width: medium;

	background-color: #C0C0C0;

	color: #000000;

}

.auto-style12 {

	text-align: center;

	border-left-style: solid;

	border-left-width: 1px;

	border-right-style: solid;

	border-right-width: 1px;

	border-top-style: none;

	border-top-width: medium;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.style5 {

	background-color: #C0C0C0;

}

.auto-style5 {

	text-align: left;

	font-family: Calibri;

	color: #000000;

	text-decoration: underline;

	font-size: medium;

}

</style>



</head>



<body>

<font="Cambria">



<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>View Student Admission Fee 

Details</strong></font></p>

<hr class="auto-style3" style="height: -15px">

<p style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">

<img height="30" src="images/BackButton.png" width="70" style="float: right"></a></font></p>



<table>

<tr>

<td>

	

	<table class="auto-style7" style="border-width:1px; width: 100%; border-collapse:collapse">

	<form name="frmAdmissionFeeRpt"	id="frmAdmissionFeeRpt" method="post" action="PreviousCourseCurriculam.php">

		<font face="Cambria">

		<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

		</font>

	<td class="auto-style6" style="width: 113px">

				<span style="text-decoration:none;" class="auto-style3">Select 

	Class</span></td>

	

	<td class="auto-style10">

				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">

				<font face="Cambria">

				<select name="cboClass" id="cboClass" style="height: 22px; width: 62px;" onchange="FillSubject();">



		<option selected="" value="All">All</option>



		<?php

		while($row1 = mysql_fetch_row($rsClass))

		{

					$Class=$row1[0];

		?>

		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>

		<?php

		}

		?>

		</select></font></span></td>

	

	<td class="auto-style1" style="width: 161px">

				Start Date:</td>

	

	<td class="auto-style10" style="width: 139px">

				<font face="Cambria">

				<input name="txtStartDate" id="txtStartDate" type="text" class="tcal" readonly="readonly"></font></td>

	

	<td style="width: 156px" class="auto-style9">

				<span class="auto-style3">End Date</span></td>

	

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

<?php

if ($_REQUEST["isSubmit"]=="yes")

{

?>

</font>

<table style="border-width:1px; width: 100%" class="style1">

<Font face="Cambria">

	<tr>



		<td class="auto-style11" style="width: 42px; background-color:#95C23D">Sr.No.</td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Admission Id</td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Name</td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Class</td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Roll N<span class="style5">o.</span></td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Admission Fee</td>



		<td class="auto-style11" style="width: 76px; background-color:#95C23D">Security Fee.<Font face="Cambria">











		</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Discount</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D"><Font face="Cambria">

		Total Amt Paid</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">

<Font face="Cambria">

		Quarter</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Receipt</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Refund Amt.</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Refund Dt.</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Cancel Amt.</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Cancel Dt.</td>



		<td class="auto-style11" style="width: 77px; background-color:#95C23D">Status</td>



	</tr>



	<?php

		$SrNo=1;

		while($row = mysql_fetch_row($rs))

				{



					$sadmission=$row[0];



					$sname=$row[1];



					$sclass=$row[2];



					$srollno=$row[3];



					$AdmissionFeeAmt=$row[4];



					$SecurityAmtPaid=$row[5];

					

					$Discount=$row[5];

					$TotalAmtPaid=$row[6];

					$quarter=$row[7];

					$receipt=$row[8];

					$refundamount=$row[9];

					$refunddate=$row[10];

					$cancelamount=$row[11];

					$canceldate=$row[12];

					$status=$row[13];



	?>



	<tr>



		<td class="auto-style12" style="width: 40px"><?php echo $SrNo;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $sadmission;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $sname;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $sclass;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $srollno;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $AdmissionFeeAmt;?></td>



		<td class="auto-style12" style="width: 76px"><?php echo $SecurityAmtPaid;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $Discount;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $TotalAmtPaid;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $quarter;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $receipt;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $refundamount;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $refunddate;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $cancelamount;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $canceldate;?></td>



		<td class="auto-style12" style="width: 77px"><?php echo $status;?></td>



	</tr>



	<?php



	}



	?>



</table>



<?php

}

?>









</body>



</html>