<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssql="SELECT distinct `ApplicationName` FROM `menu_master`";
$rsApp= mysql_query($ssql);

if ($_REQUEST["lstAddedApproverId"] !="")
{
	$EmpId=$_REQUEST["txtEmpId"];
	$ApplicationName=$_REQUEST["lstApplication"];
	$StrHeader= substr($_REQUEST["txtSelectedHeader"],0,strlen($_REQUEST["txtSelectedHeader"])-1);
	$ArrHeader = explode(",", $StrHeader);
	
	foreach ($ArrHeader as $value) 
	{
    	//echo "$value";
    	$ssql="select * from `user_menu_master` where `EmpId`='$EmpId' and `ApplicationName`='$ApplicationName' and `MasterMenu`='$value'";
    	$rsChk= mysql_query($ssql);
    	if (mysql_num_rows($rsChk) == 0)
    	{
	    	$ssql="insert into `user_menu_master` (`EmpId`,`ApplicationName`,`MasterMenu`,`Menu`,`PageURL`,`BaseURL`) select '$EmpId',`ApplicationName`,`MasterMenu`,`Menu`,`PageURL`,`BaseURL` from `menu_master` where `ApplicationName`='$ApplicationName' and `MasterMenu`='$value'";
			mysql_query($ssql) or die(mysql_error());
		}
	}
	$Msg="Employee roles and responsibility successfully assigned!";
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee ID</title>

<script language="javascript">
	function listbox_moveacross(sourceID, destID) 
	{
		var src = document.getElementById(sourceID);
		var dest = document.getElementById(destID);
	
		for(var count=0; count < src.options.length; count++) {
	
			if(src.options[count].selected == true) {
					var option = src.options[count];
	
					var newOption = document.createElement("option");
					newOption.value = option.value;
					newOption.text = option.text;
					newOption.selected = true;
					try {
							 dest.add(newOption, null); //Standard
							 src.remove(count, null);
					 }catch(error) {
							 dest.add(newOption); // IE only
							 src.remove(count);
					 }
					count--;
			}
		}
	}
	function fnlGetHeader()
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
			        	removeAllOptions(document.frmEmpRoleMaster.lstApproverId);
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmEmpRoleMaster.lstApproverId,arr_row[row_count],arr_row[row_count])			        			 
			        	}													
			        }
		      }
			var submiturl="GetHeader.php?Application=" + document.getElementById("lstApplication").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			
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
	function Validate()
	{
		//alert(document.getElementById("lstAddedApproverId").value);
		
		//var sourceID="lstAddedApproverId";
		if(document.getElementById("txtEmpId").value=="")
		{
			alert("Please select Employee Id!");
			return;
		}
		
		var src = document.getElementById("lstAddedApproverId");
		var SelectedItem="";
		for(var count=0; count < src.options.length; count++) 
		{
			if(src.options[count].selected == true) 
			{
					var option = src.options[count];
					//alert(option.value);	
					SelectedItem=SelectedItem + option.value + ",";
					/*
					var newOption = document.createElement("option");
					newOption.value = option.value;
					newOption.text = option.text;
					newOption.selected = true;
					
					try {
							 dest.add(newOption, null); //Standard
							 src.remove(count, null);
					 }catch(error) {
							 dest.add(newOption); // IE only
							 src.remove(count);
					 }
					count--;
					*/
			}
		}
		//alert(SelectedItem);
		document.getElementById("txtSelectedHeader").value=SelectedItem;
		//alert(SelectedItem.substr(1,SelectedItem.length);
			
		document.getElementById("frmEmpRoleMaster").submit();
	}

</script>

<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 0px solid #FFFFFF;
}
.style2 {
	border-style: none;
	border-width: medium;
}
.style3 {
	font-family: Cambria;
	border-style: none;
	border-width: medium;
}
.style4 {
	text-align: center;
	font-family: Cambria;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
}
.style5 {
	text-align: center;
	border-style: none;
	border-width: medium;
}
.style6 {
	text-align: center;
	font-family: Cambria;
	color: #CC3300;
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

</style>
</head>

<body>

<table style="width: 100%" class="style1">
	<form name="frmEmpRoleMaster" id="frmEmpRoleMaster" method="post" action="">
	<input type="hidden" name="txtSelectedHeader" id="txtSelectedHeader" value="">
	<tr>
		<td class="style3" style="width: 265px"><strong>Employee ID</strong></td>
		<td class="style2" style="width: 265px">
		<input name="txtEmpId" id="txtEmpId" type="text">
			</td>
		<td class="style2" style="width: 266px">&nbsp;</td>
		<td class="style2" style="width: 266px">&nbsp;</td>
	</tr>
	<tr>
		<td class="style4" style="width: 265px"><strong>Application</strong></td>
		<td class="style4" style="width: 265px"><strong>Header</strong></td>
		<td class="style4" style="width: 266px"><strong>Add / Remove</strong></td>
		<td class="style4" style="width: 266px"><strong>Selected Headers</strong></td>
	</tr>
	<tr>
		<td class="style5">
		<select size="10" name="lstApplication" id="lstApplication" style="width: 170" onclick="Javascript:fnlGetHeader();">
		<?php
			while($row = mysql_fetch_row($rsApp))
			{
				$AppName=$row[0];				
		?>
		<option value="<?php echo $AppName;?>"><?php echo $AppName;?></option>
		<?php
			}
		?>
		</select>		
		</td>
		<td class="style5" style="width: 265px">
		<select size="10" name="lstApproverId" id="lstApproverId" multiple="multiple" style="width: 170">				
		</select>
		</td>
		<td class="style5" style="width: 266px">
		<input type="button" value="Add --&gt;" name="btnAdd" onclick="javascript:listbox_moveacross('lstApproverId', 'lstAddedApproverId');">
		<br>
		<input type="button" value="Delete --&gt;" name="btnDeleteApprover" style="width: 154" onclick="javascript:listbox_moveacross('lstAddedApproverId','lstApproverId');">
		</td>
		<td class="style5" style="width: 266px">
		<select size="9" name="lstAddedApproverId" id="lstAddedApproverId" multiple="multiple" style="width: 170">				
		</select>
		</td>
	</tr>
	<tr>
		<td class="style2" style="width: 265px">&nbsp;</td>
		<td class="style2" style="width: 265px">&nbsp;</td>
		<td class="style2" style="width: 266px">&nbsp;</td>
		<td class="style2" style="width: 266px">&nbsp;</td>
	</tr>
	<tr>
		<td class="style5" colspan="4">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

<p class="style6"><strong><?php echo $Msg;?></strong></p>

</body>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>
</div>
</html>
