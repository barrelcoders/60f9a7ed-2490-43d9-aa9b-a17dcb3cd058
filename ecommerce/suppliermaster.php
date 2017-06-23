<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
include '../../Admin/Header/Header3.php';
<?php

//if(isset($_POST['submit']))
if ($_REQUEST["isSubmit"]=="yes")
{
$SupplierCode=$_POST['txtSupplierCode'];
$rsChk=mysql_query("select * from Commerce_supplier_master where `SupplierCode`='$SupplierCode'");
if(mysql_num_rows($rsChk)>0)
{
$ErrMsg="Supplier Code already exists!";
}

$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$mobile=$_POST['Mobile'];
$email=$_POST['Email'];
$description=$_POST['description'];
if($ErrMsg=="")
{
	mysql_query("INSERT INTO Commerce_supplier_master (`SupplierCode`,`suppliername`,`address`,`city`,`state`,`mobileno`,`emailid`,`description`) VALUES ('$SupplierCode','$name','$address','$city','$state','$mobile','$email','$description')");
}	
}

?>

<script language="javascript">
function Validate()
{
	if(document.getElementById("txtSupplierCode").value=="")
	{
		alert("Please enter supplier code!");
		return;
	}
	//document.getElementById("frmSupplier").submit();
	document.frmSupplier.submit;
}
</script>
<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<link rel="stylesheet" type="text/css" href="../../Admin/css/style.css" />


<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Inventory Management</title>


<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
	


<style type="text/css">
.style1 {
	text-align: center;
	color: #CC0000;
}
</style>
	


</head>



<body>
<form name="frmSupplier" id="frmSupplier"  method="post" action="suppliermaster.php">
<font face="Cambria">
<input type="hidden" name="isSubmit" value="yes">

                  </font>

           

					<p>&nbsp;</p>
<p><b><font color="#000000" face="Cambria" style="font-size: 12pt">Add A&nbsp;</font><font face="Cambria" style="font-size: 12pt">New 
Supplier</font></b></p>
</h1>

<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><font face="Cambria"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>

				 <table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse">
				
			 <tr>
			  <td style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0;  border-bottom-style:none; border-bottom-width:medium" colspan="4" class="style1" >

		 
			
				<strong><?php echo $ErrMsg;?></strong></td>

			 </tr>
			 
			 <tr>
			  <td style="width: 662px;  border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				<b><font face="Cambria"><span >Supplier Code&nbsp;:</span></font></b></td>

		      <td style="width: 663px;  border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" >

   <font face="Cambria">

   <input type="text" name="txtSupplierCode" id="txtSupplierCode" class="text-box"  ; value="" /></font></td>

		      <td style="width: 663px;  border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" >

   		 
			
				<b><font face="Cambria"><span >Supplier Name&nbsp;: </span>
				</font></b>

				</td>

		      <td style="width: 663px;  border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" >

   <font face="Cambria">

   <input type="text" name="name" id="textbasic" class="text-box"  ; value="" /></font></td>
			 </tr>
			 
			 <tr>
			  <td style="width: 662px;  border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				&nbsp;</td>

		      <td style="border-style:none; border-width:medium; width: 663px; height: 32px" >

   &nbsp;</td>

		      <td style="border-style:none; border-width:medium; width: 663px; height: 32px" >

		 
			
				&nbsp;</td>

		      <td style="width: 663px;  border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

		  &nbsp;</td>
			 </tr>
			 
			 <tr>
			  <td style="width: 662px;  border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				<b><font face="Cambria"><span>Supplier PAN No.</span></font></b></td>

		      <td style="border-style:none; border-width:medium; width: 663px; height: 32px" >

   <font face="Cambria">

   &nbsp;<input type="text" name="txtPANNo" id="txtPANNo" class="text-box" value="" size="20" /></font></td>

		      <td style="border-style:none; border-width:medium; width: 663px; height: 32px" >

		 
			
				<b><font face="Cambria"><span>Supplier TIN No.</span></font></b></td>

		      <td style="width: 663px;  border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

		  <font face="Cambria">

   <input type="text" name="txtTINNo" id="txtTINNo" class="text-box" value="" size="20" /></font></td>
			 </tr>
			 
			 	 <tr>
			  <td style="width: 662px;  &gt;

		 &lt;font face=; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left">

		 
			
				&nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px;  &gt;&lt;span  style="width: 190px; ;">
		  
   &nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px;  &gt;&lt;span  style="width: 190px; ;">
		  &nbsp;</td>

		<td style="width: 663px;  &gt;&lt;span  style=; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"width: 190px; ;">
		  		  
   &nbsp;</td>
			 </tr>
			 
			 	 <tr>
			  <td style="width: 662px;  &gt;

		 &lt;font face=; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left">

		 
			
				<font face="Cambria"><b>Supplier Service Tax No</b></font></td>

		<td style="border-style:none; border-width:medium; width: 663px;  &gt;&lt;span  style="width: 190px; ;">
		  
   <font face="Cambria">

   <input type="text" name="txtServiceTaxNo" id="txtServiceTaxNo" class="text-box" value="" size="20" /></font></td>
		</span></td>

		<td style="border-style:none; border-width:medium; width: 663px;  &gt;&lt;span  style="width: 190px; ;">
		  
		 
			
				<b>

		 
			
				<font face="Cambria"><span >Supplier Address &nbsp;: </span>

			</font>

				</b></font>
			
				</td>

		<td style="width: 663px;  &gt;&lt;span  style=; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"width: 190px; ;">
		  		  
   		  <font face="Cambria">
		  <textarea placeholder="Enter Supplier Address ...."  font-size="Medium" align="left" name="address" class="text-box-address" rows="1" cols="20"></textarea></font></td>
			 </tr>
			 
			  	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				&nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px" >

     &nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px" >

     		 
			
				&nbsp;</td>

		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

                       &nbsp;</td>
			 </tr>
			 
			  	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				<b><font face="Cambria"><span >State&nbsp;: </span></font></b>

		</td>

		<td style="border-style:none; border-width:medium; width: 663px" >

     <font face="Cambria">

     <select name="state" class="text-box" ;>
                                <option value="-1" selected>Select..</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                            </select></font></td>

		<td style="border-style:none; border-width:medium; width: 663px" >

     		 
			
				<b><font face="Cambria"><span >City :
		 </span></font></b>

				</td>

		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

                       <font face="Cambria">

                       <select name="city" class="text-box" ;>
								<option value="-1" selected>Select..</option>
								<option value="Ambala">AMBALA</option>
								<option value="Bhiwani">BHIWANI</option>
								<option value="Faridabad">FARIDABAD</option>
								<option value="Fatehabad">FATEHABAD</option>
                                <option value="Gurgaon">GURGAON</option>
                                <option value="HISAR">HISAR</option>
                                <option value="Jhajjar">JHAJJAR</option>
                                <option value="Jind">JIND</option>
                                <option value="Kaithal">KAITHAL</option>
                                <option value="Karnal">KARNAL</option>
                                <option value="Kurukshetra">KURUKSHETRA</option>
                                <option value="Mahendragarh">MAHENDRAGARH</option>
                                <option value="Mewat">MEWAT</option>
                                <option value="Palwal">PALWAL</option>
                                <option value="Panchkula">PANCHKULA</option>
                                <option value="Panipat">PANIPAT</option>
                                <option value="Rewari">REWARI</option>
                                <option value="Rohtak">ROHTAK</option>
                                <option value="Sirsa">SIRSA</option>
                                <option value="Sonipat">SONIPAT</option>
                                <option value="Yamuna Nagar">YAMUNA NAGAR</option>
                            </select></font></td>
			 </tr>
			 
			  	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				&nbsp;</td>

		      <td style="border-style:none; border-width:medium; width: 663px" >

                       &nbsp;</td>

		      <td style="border-style:none; border-width:medium; width: 663px" >

                       		 
			
				&nbsp;</td>

		      <td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

                       &nbsp;</td>
			 </tr>
		 
	
		 
		
		 
			  	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				<b><font face="Cambria"><span >Mobile No.&nbsp;: </span></font>
				</b>

		</td>

		      <td style="border-style:none; border-width:medium; width: 663px" >

                       <font face="Cambria">
		 				<span>
		 <input name="Mobile" id="txtChar" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}"  type="text"  required class="text-box"></span></font></td>

		      <td style="border-style:none; border-width:medium; width: 663px" >

                       		 
			
				<b><font face="Cambria"><span >Email Id: </span></font></b>

				</td>

		      <td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >

                       <font face="Cambria">
						<span>
		<input name="Email" id="txtEmail" type="text"  required class="text-box"></span></font></td>
			 </tr>
		 
	
		 
		
		 
		   	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				&nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px" >&nbsp;</td>
		
		
		<td style="border-style:none; border-width:medium; width: 663px" >

		 
			
				&nbsp;</td>
		
		
		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >&nbsp;</td>
		
		
			 </tr>
		 
	
		 
		
		 
		   	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				<b><font face="Cambria">Landline No.</font></b></td>

		<td style="border-style:none; border-width:medium; width: 663px; " ><span  style="width: 157px; ;">

                       <font face="Cambria">
		 				<span>
		 <input name="txtLandLineNo" id="txtLandLineNo" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}"  type="text"  required class="text-box" size="20"></span></font></span></td>
		
		
		<td style="border-style:none; border-width:medium; width: 663px; " >

		 
			
				<b><font face="Cambria"><span >Material Supplier Description:
				</span></font></b>

				</td>
		
		
		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" ><span  style="width: 157px; ;">
		 <font face="Cambria"><span><textarea placeholder="Enter Supplier Description Here ...."  font-size="Medium" align="left" name="description" class="text-box-address"></textarea></span></font></span></td>
		
		
			 </tr>
		 
	
		 
		
		 
		   	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" align="left" >

		 
			
				&nbsp;</td>

		<td style="border-style:none; border-width:medium; width: 663px; " >&nbsp;</td>
		
		
		<td style="border-style:none; border-width:medium; width: 663px; " >

		 
			
				&nbsp;</td>
		
		
		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" >&nbsp;</td>
		
		
			 </tr>
		 
	
		 
		
		 
		   	 <tr>
			  <td style="width: 662px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" align="left" >

		 
			
				<b><font face="Cambria">Bank Account No</font></b></td>

		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" ><span  style="width: 157px; ;">

                       <font face="Cambria">
		 				<span>
		 <input name="txtBankAccountNo" id="txtBankAccountNo" type="text"  required class="text-box" size="20"></span></font></span></td>
		
		
		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" >

		 
			
				<b><font face="Cambria">Bank Name</font></b></td>
		
		
		<td style="width: 663px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" ><span  style="width: 157px; ;">

                       <font face="Cambria">
		 				<span>
		 <input name="txtBankName" id="txtBankName" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}"  type="text"  required class="text-box" size="20"></span></font></span></td>
		
		
			 </tr>
			  	 <tr>
			  <td align="left" colspan="4" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px; border-bottom: medium none #808080" >

		 
			
				<span  style="width: 157px; ;">
				<font face="Cambria">
		&nbsp;
		</font>
		</span>

		</td>

		
			 </tr>
			  	 		 
		 </table>
		
		
        <table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse">
	<tr>

		<td colspan="2" class="auto-style5" style="border-style: none; border-width: medium">

		<p align="center">

		<strong>

		<font face="Cambria">

		<input name="submit" type="submit" value="Submit" class="text-box" onclick="javascript:Validate();" style="font-weight: 700">
		</span>
		</font>
		</strong></td>

	</tr>

		

</table>
</form>

</body>

</html>

<font face="Cambria">

<br>	
	
 </font>	
	
 <div align="center">
	
 <table width="100%" id="table3" class="CSSTableGenerator">
 
 	
	<tr>
		    <td height="35"  align="center" style="width: 165px; text-align:center" class="style11">
			<font face="Cambria">
			<b>Sr No.</b></font></td>
			<td height="35"  align="center" style="width: 165px; text-align:center" >
			<font face="Cambria">
			<b>Supplier Code</b></font></td>
			<td height="35"  align="center" style="width: 165px; text-align:center" >
			<font face="Cambria">
			<b>Supplier Name </b> </font> </td>
			<td height="35"  align="center" style="width: 165px; text-align:center" >
			<font face="Cambria">
			<b>Address</b></font></td>
			<td height="35"  align="center" style="width: 166px; text-align:center" >
			<font face="Cambria">
			<b>City</b></font></td>
			  <td height="35"  align="center" style="width: 166px; text-align:center" >
				<font face="Cambria">
				<b>State</b></font></td>
			  <td height="35"  align="center" style="width: 166px; text-align:center" >
				<font face="Cambria">
				<b>Mobile No.</b></font></td>
			   <td height="35"  align="center" style="width: 166px; text-align:center" >
				<font face="Cambria">
				<b>Email Id</b></font></td>
			    <td height="35"  align="center" style="width: 166px; text-align:center" >
				<b><font face="Cambria">PAN No</font></b></td>
				
				   
			    <td height="35"  align="center" style="width: 166px; text-align:center" >
				<b>TIN No</b></td>
				
				   
			    <td height="35"  align="center" style="width: 166px; text-align:center" >
				<b>Service Tax No</b></td>
				
				   
			    <td height="35"  align="center" style="width: 166px; text-align:center" >
				<font face="Cambria">
				<b>Description</b></font></td>
				
				   
		</tr>
		<?php
		
		$result=mysql_query("select * from Commerce_supplier_master");
		
		while($test= mysql_fetch_array($result))
		{
			echo"<tr>".
			"<td>" .$test["srno"]."</td>".	
			"<td>".$test["SupplierCode"]."</td>".
			"<td>".$test["suppliername"]."</td>".
			"<td>".$test["address"]."</td>".
			"<td>".$test["city"]."</td>".
			"<td>".$test["state"]."</td>".
			"<td>".$test["mobileno"]."</td>".
			"<td>".$test["emailid"]."</td>".
			"<td>".$test["description"]."</td>".
			"<td>".""."</td>".
			"<td>".""."</td>".
			"<td>".""."</td>".
			
			"</tr>";
			
		}
	
	?>
		
		</table>
		</div>

		

 <font face="Cambria">

		

 </table>
	</font>
	