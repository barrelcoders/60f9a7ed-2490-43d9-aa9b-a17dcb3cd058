<?php
session_start();
include '../../connection.php'; 
include '../Header/Header3.php';

$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

//if ($_REQUEST["lstAddedStudent"] !="" || $_REQUEST["lstAddedEmployee"] !="")
if ($_REQUEST["lstAddedStudent"] !="")
{
	
	$HeadName=$_REQUEST["txtHeadName"];
	$HeadAmount=$_REQUEST["txtHeadAmount"];
	
	$LastDate=$_REQUEST["txtLastDate"];
	$arr=explode('/',$LastDate);
	$LastDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$Remarks=$_REQUEST["txtRemarks"];
	
	$StrStudent= substr($_REQUEST["txtSelectedStudent"],0,strlen($_REQUEST["txtSelectedStudent"])-1);
	$ArrClass = explode(",", $StrStudent);

	//$StrEmp= substr($_REQUEST["txtSelectedEmployee"],0,strlen($_REQUEST["txtSelectedEmployee"])-1);
	//$ArrEmp = explode(",", $StrEmp);
	
	foreach ($ArrClass as $value) 
	{
		$sclass=$value;
    	//echo "$value";
    	//$ssql="select * from `Comms_Groups` where `GroupName`='$GroupName' and `MemberId`='$value'";
    	//$rsChk= mysql_query($ssql);
    	//if (mysql_num_rows($rsChk) == 0)
    	//{
	    	$ssql="insert into `fees_misc_announce` (`HeadName`,`HeadAmount`,`sclass`,`LastDate`,`Remarks`) values ('$HeadName','$HeadAmount','$sclass','$LastDate','$Remarks')";
			mysql_query($ssql) or die(mysql_error());
			$Msg="Submitted Successfully!";
		//}
	}
	/*
	foreach ($ArrEmp as $value) 
	{
    	//echo "$value";
    	$ssql="select * from `Comms_Groups` where `GroupName`='$GroupName' and `MemberId`='$value'";
    	$rsChk= mysql_query($ssql);
    	if (mysql_num_rows($rsChk) == 0)
    	{
	    	$ssql="insert into `Comms_Groups` (`GroupName`,`MemberType`,`MemberId`,`MemberName`,`MobileNo`,`EmailId`) select '$GroupName','Employee',`EmpId`,`Name`,`MobileNo`,`email` from `employee_master` where `EmpId`='$value'";
			mysql_query($ssql) or die(mysql_error());
		}
	}
	*/
}

$ssql="SELECT distinct `EmpId`,`Name` FROM `employee_master` order by `Name`";
$rsEmp= mysql_query($ssql);

$ssql="SELECT `srno`,`GroupName`,`MemberType`,`MemberId`,`MemberName`,`MobileNo`,`EmailId` FROM `Comms_Groups` order by `GroupName`";
$rsGrp= mysql_query($ssql);
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Sell Registration Form</title>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

<script language="javascript">
	function listbox_moveacross(sourceID, destID) 
	{
		var src = document.getElementById(sourceID);
		var dest = document.getElementById(destID);
	
		for(var count=0; count < src.options.length; count++) 
		{
	
			if(src.options[count].selected == true) 
			{
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
	function listbox_moveacross1(sourceID, destID) 
	{
		var src = document.getElementById(sourceID);
		var dest = document.getElementById(destID);
	
		for(var count=0; count < src.options.length; count++) 
		{
	
			if(src.options[count].selected == true) 
			{
					var option = src.options[count];
	
					var newOption = document.createElement("option");
					newOption.value = option.value;
					newOption.text = option.text;
					newOption.selected = true;
					try {
							 //dest.add(newOption, null); //Standard
							 src.remove(count, null);
					 }catch(error) {
							 //dest.add(newOption); // IE only
							 src.remove(count);
					 }
					count--;
			}
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
	function fnlGetClass()
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
			        	//alert(rows);
			        	removeAllOptions(document.frmCommGroup.lstStudent);
			        	//removeAllOptions(document.frmCommGroup.lstAddedStudent);
			        	 
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        		//arrAdmissionIdName=arr_row[row_count].split("~");
			        		addOption(document.frmCommGroup.lstStudent,arr_row[row_count],arr_row[row_count])			        			 
			        		//addOption(document.frmCommGroup.lstStudent,arr_row[row_count],arr_row[row_count])			        			 
			        		//addOption(document.frmEmpRoleMaster.lstMenu,arr_row[row_count],arr_row[row_count])			        			 
			        	}													
			        }
		      }
			//document.getElementById("txtSelectedClass").value=document.getElementById("lstStudentClass").value;
			var submiturl="GetClassSectionWise.php?MasterClass=" + document.getElementById("lstStudentClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	function Validate()
	{
		if(document.getElementById("txtHeadName").value == "")
		{
			alert("Please enter Head name!");
			return;
		}
		if(document.getElementById("txtHeadAmount").value == "")
		{
			alert("Please enter Head Amount!");
			return;
		}
		if(document.getElementById("txtRemarks").value == "")
		{
			alert("Please enter Remarks!");
			return;
		}
		if(document.getElementById("txtLastDate").value == "")
		{
			alert("Please enter Last Date!");
			return;
		}

		if(document.getElementById("lstAddedStudent").value =="")
		{
			alert ("Please select Student / Employee for creating group!");
			return;
		}
		var src = document.getElementById("lstAddedStudent");
		var SelectedItem="";
		for(var count=0; count < src.options.length; count++) 
		{
			if(src.options[count].selected == true) 
			{
					var option = src.options[count];
					SelectedItem=SelectedItem + option.value + ",";					
			}
		}
		document.getElementById("txtSelectedStudent").value =SelectedItem;
		
		/*
		var src = document.getElementById("lstAddedEmployee");
		var SelectedItem="";
		for(var count=0; count < src.options.length; count++) 
		{
			if(src.options[count].selected == true) 
			{
					var option = src.options[count];
					SelectedItem=SelectedItem + option.value + ",";					
			}
		}
		
		document.getElementById("txtSelectedEmployee").value =SelectedItem;
		*/
		document.getElementById("frmCommGroup").submit();		
	}
	function ShowDelete(SrNo)
	{
		//window.open "EditHoliday.php?srno" . SrNo;
		var myWindow = window.open("DeleteGroupMember.php?srno=" + SrNo ,"","width=400,height=350");
	}

</script>	

<style>
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

        font-family: Calibri;

        font-weight:bold;


}
.style1 {
	color: #CC3300;
}


</style>

<link rel="stylesheet" type="text/css" href="../css/style.css" />


</head>

<body>
		<p>&nbsp;</p>
<form name="frmCommGroup" id="frmCommGroup" method="post" action="">
<font face="Cambria">
<input type="hidden" name="txtSelectedStudent" id="txtSelectedStudent" value="">
<input type="hidden" name="txtSelectedEmployee" id="txtSelectedEmployee" value="">

		</font>

		<table style="width: 100%; " class="style3" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; height: 10px; background-color:#FFFFFF; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;<p><strong><font face="Cambria">Define A Miscellaneous 
				Fees For Classes</font></strong></p>
				<hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<table cellpadding="0" style="width: 100%; border-collapse:collapse" height="301" class="style1" border="1">
					<tr>
						<td align="center" style="border-style: solid; border-width: 1px" class="style1" colspan="8">
						<strong><?php echo $Msg;?></strong></td>
					</tr>
					<tr>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px" class="style2">
						<font face="Cambria"><strong>Fees Head Name</strong></font></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px" class="style2">
						<font face="Cambria">
							<input name="txtHeadName" id="txtHeadName" type="text" class="text-box"></font></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px">
							<b><font face="Cambria">Fee Head Amount</font></b></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px">
							<font face="Cambria">
							<input name="txtHeadAmount" id="txtHeadAmount" type="text" class="text-box" style="height: 22px"></font></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px">
						<font face="Cambria"><b>Remarks</b></font></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px">
						<textarea rows="2" name="txtRemarks" id="txtRemarks" cols="20" class="text-address"></textarea></td>
						<td width="146" align="center" height="44" style="border-style: solid; border-width: 1px">
						<font face="Cambria"><b>Last Date</b></font></td>
						<td width="147" align="center" height="44" style="border-style: solid; border-width: 1px">
						<font face="Cambria">
							<input name="txtLastDate" id="txtLastDate" type="text" class="tcal"></font></td>
					</tr>
					<tr>
						<td width="1281" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="8">
						&nbsp;</td>
					</tr>
					<tr>
						<td bgcolor="#95C23D" width="312" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="2">
						<b><font face="Cambria">Select Class</font></b></td>
						<td bgcolor="#95C23D" width="315" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="2">
						<b><font face="Cambria">Select Section</font></b></td>
						<td bgcolor="#95C23D" width="344" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="2">
						<b><font face="Cambria">Add / Remove</font></b></td>
						<td bgcolor="#95C23D" width="310" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="2">
						<b><font face="Cambria">Added to Group</font></b></td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" width="312" align="center" style="border-style: solid; border-width: 1px" colspan="2">
		<font face="Cambria">
		<select size="10" name="lstStudentClass" id="lstStudentClass" style="width: 210; height:215";" onclick="Javascript:fnlGetClass();">
		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></font></td>
						<td bgcolor="#FFFFFF" width="315" align="center" style="border-style: solid; border-width: 1px" colspan="2">
		<font face="Cambria">
		<select size="10" name="lstStudent" id="lstStudent" style="width: 210; height:215";" multiple="multiple">
	
		</select></font></td>
						<td bgcolor="#FFFFFF" width="344" align="center" style="border-style: solid; border-width: 1px" colspan="2">
		<font face="Cambria">
		<input type="button" value="Add --&gt;" name="btnAdd" onclick="javascript:listbox_moveacross('lstStudent', 'lstAddedStudent');" style="font-weight: 700"></font><p>
		&nbsp;</p>
						<p>
		<font face="Cambria">
		<input type="button" value="&lt;-- Delete" name="btnDeleteApprover" style="width: 83; height:25; font-weight:700" onclick="javascript:listbox_moveacross1('lstAddedStudent','lstStudent');"></font></td>
						<td bgcolor="#FFFFFF" width="310" align="center" style="border-style: solid; border-width: 1px" colspan="2">
		<font face="Cambria">
		<select size="10" name="lstAddedStudent" id="lstAddedStudent" style="width: 210; height:215";" multiple="multiple">
	
		</select></font></td>
					</tr>
				</table>

				</td>





			</tr>

</table>

		<p align="center">
		<font face="Cambria">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></font></p>
		</form>
		<p><font face="Cambria" style="font-size: 12pt"><u><b>Fees Details:</b></u></font></p>
				<table cellspacing="0" cellpadding="0" style="width: 100%;" height="62" class="style1">
					<tr>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 151px;">
						<b><font face="Cambria">Sr.No.</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 151px;">
						<b><font face="Cambria">Fees Head Name</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 151px;">
						<b><font face="Cambria">Fees Head Amount</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 151px;">
						<b><font face="Cambria">Remarks</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 152px;">
						<b><font face="Cambria">Last Date</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 152px;">
						<b><font face="Cambria">Applies to Class</font></b></td>
						<td bgcolor="#95C23D" align="center" height="31" style="border-style: solid; border-width: 1px; width: 152px;">
						<b><font face="Cambria">Delete</font></b></td>
					</tr>
					<?php
						while($row = mysql_fetch_row($rsGrp))
						{
							$srno=$row[0];
							$GroupName=$row[1];
							$MemberType=$row[2];
							$MemberId=$row[3];
							$MemberName=$row[4];
							$MobileNo=$row[5];
							$EmailId=$row[6];
					?>
					<tr>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 151px;">
						<font face="Cambria"><?php echo $srno;?>
		</font>
		</td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 151px;">
						<font face="Cambria">
						<?php echo $GroupName;?></font></td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 151px;">
						<font face="Cambria">
						<?php echo $MemberType;?></font></td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 151px;">
						<font face="Cambria">
						<?php echo $MemberId;?></font></td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 152px;">
						<font face="Cambria">
						<?php echo $MemberName;?></font></td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 152px;">
						<font face="Cambria">
						<?php echo $MobileNo;?></font></td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 152px;">
						<font face="Cambria">
						<a href="Javascript:ShowDelete(<?php echo $srno ?>);" class="style14">Delete</a></font></td>
					</tr>
					<?php
					}
					?>
				</table>

				<p>&nbsp;</p>
		<p>&nbsp;</p>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

		</body>

</html>