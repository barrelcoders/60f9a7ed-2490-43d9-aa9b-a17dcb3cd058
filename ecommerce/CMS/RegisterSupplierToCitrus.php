<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seller Name</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style2 {
	border: 1px solid #000000;
}
.style3 {	
	font-family: Cambria;
	border: 1px solid #000000;
}
.style4 {
	border: 1px solid #000000;
	text-align: center;
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
<form name="frmSeller" id="frmSeller" method="post" action="SubmitRegisterSupplier.php">	
	<tr>
		<td class="style3" style="width: 620px"><strong>Seller Name</strong></td>
		<td class="style2" style="width: 621px">
		<input name="sellername" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Address1</strong></td>
		<td class="style2" style="width: 621px">
		<input name="address1" type="text" style="height: 22px" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Address2</strong></td>
		<td class="style2" style="width: 621px">
		<input name="address2" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>City</strong></td>
		<td class="style2" style="width: 621px">
		<input name="city" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>State</strong></td>
		<td class="style2" style="width: 621px">
		<input name="state" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Country</strong></td>
		<td class="style2" style="width: 621px">
		<input name="country" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Zip</strong></td>
		<td class="style2" style="width: 621px"><input name="zip" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Seller Mobile</strong></td>
		<td class="style2" style="width: 621px">
		<input name="sellermobile" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>IFSC Code</strong></td>
		<td class="style2" style="width: 621px">
		<input name="ifsccode" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Account No</strong></td>
		<td class="style2" style="width: 621px">
		<input name="accountnumber" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Seller Email</strong></td>
		<td class="style2" style="width: 621px">
		<input name="selleremail" type="text" /></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Payout Mode</strong></td>
		<td class="style2" style="width: 621px"><select name="payoutmode">
		<option selected="selected" value="NEFT">NEFT</option>
		<option value="WALLET">WALLET</option>
		<option value="IMPS">IMPS</option>
		</select></td>
	</tr>
	<tr>
		<td class="style3" style="width: 620px"><strong>Active</strong></td>
		<td class="style2" style="width: 621px"><select name="active">
		<option selected="selected" value="1">Active</option>
		<option value="0">Not Active</option>
		</select></td>
	</tr>
	<tr>
		<td class="style4" colspan="2">
		<input name="Submit1" type="submit" value="submit" /></td>
	</tr>
	</form>
</table>

</body>

</html>
