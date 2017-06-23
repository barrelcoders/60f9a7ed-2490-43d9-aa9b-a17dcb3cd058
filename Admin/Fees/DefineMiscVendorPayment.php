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
	$SelectedClass=$_REQUEST["txtSelectedClass"];
	
	$LastDate=$_REQUEST["txtLastDate"];
	$arr=explode('/',$LastDate);
	$LastDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	$LastDate1= $arr[1] . "-" . $arr[0] . "-" . $arr[2];

	$Remarks=$_REQUEST["txtRemarks"];
	
	$StrStudent= substr($_REQUEST["txtSelectedStudent"],0,strlen($_REQUEST["txtSelectedStudent"])-1);
	$ArrClass = explode(",", $StrStudent);

	//$StrEmp= substr($_REQUEST["txtSelectedEmployee"],0,strlen($_REQUEST["txtSelectedEmployee"])-1);
	//$ArrEmp = explode(",", $StrEmp);
	
	foreach ($ArrClass as $value) 
	{
		$arrValue=explode("-", $value);
		$selectedAdmission=$arrValue[0];
		$selectedName=$arrValue[1];
		$AnnouncementId=$selectedAdmission.Date(YmdHis);
		//echo $AnnouncementId;
		//exit();
		
		$rsStudentDetail=mysql_query("select `smobile`,`AlternateMobile`,`email`,`spassword`,`sclass` from `student_master` where `sadmission`='$selectedAdmission'");
		while($row = mysql_fetch_row($rsStudentDetail))
		{
			$smobile=$row[0];
			$AlternateMobile=$row[1];
			$email=$row[2];
			$spassword=$row[3];
			$StudentClass=$row[4];
			break;
		}
			
	    	$ssql="insert into `fees_misc_announce` (`AnnouncementID`,`HeadName`,`HeadAmount`,`sclass`,`sadmission`,`sname`,`LastDate`,`Remarks`) values ('$AnnouncementId','$HeadName','$HeadAmount','$StudentClass','$selectedAdmission','$selectedName','$LastDate','$Remarks')";
			//echo $ssql."<br>";
			//temp commented
			mysql_query($ssql) or die(mysql_error());
			$Msg="Submitted Successfully!";
			
			/*
			
			$SmsMsg='Dear Parents, You are requested to pay Rs '.$HeadAmount.'/- for  '.$HeadName.', online through My Fees Section in SIS portal using the student Id '. $selectedAdmission . '  and password '.$spassword.' before '.$LastDate1;
			if(strlen($smobile) ==10)
			{
				mysql_query("insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`smstype`,`mobileno`,`message`) values ('$selectedName','$selectedAdmission','$SelectedClass','SMS Communication','$smobile','$SmsMsg')") or die(mysql_error());
			}
			if(strlen($AlternateMobile) ==10)
			{
				mysql_query("insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`smstype`,`mobileno`,`message`) values ('$selectedName','$selectedAdmission','$SelectedClass','SMS Communication','$AlternateMobile','$SmsMsg')") or die(mysql_error());
			}
			
			*/
			
			
			if($email !="")
			{
				$MailSubject="DPS Online Fees Payment Notice:".$HeadName;
				mysql_query("insert into `email_delivery` (`sadmission`,`ToEmail`,`htmlcode`,`FromEmail`,`Subject`) values('$selectedAdmission','$email','$SmsMsg','communication@dpsfsis.com','$MailSubject')") or die(mysql_error());
			}
				
		
	}
	
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
			        	removeAllOptions(document.frmCommGroup.lstStudent2);
			        	//removeAllOptions(document.frmCommGroup.lstAddedStudent);
			        	 
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        		//arrAdmissionIdName=arr_row[row_count].split("~");
			        		addOption(document.frmCommGroup.lstStudent2,arr_row[row_count],arr_row[row_count])			        			 
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
	
	function fnlGetStudent()
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
			        	removeAllOptions(document.frmCommGroup.lstStudent1);
			        	//removeAllOptions(document.frmCommGroup.lstAddedStudent);
			        	 
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        		arrAdmissionIdName=arr_row[row_count].split("-");
			        		admissionid=arrAdmissionIdName[0];
			        		myname=arrAdmissionIdName[1];
			        		//addOption(document.frmCommGroup.lstStudent1,arr_row[row_count],arr_row[row_count])			        			 
			        		addOption(document.frmCommGroup.lstStudent1,arr_row[row_count],arr_row[row_count])			        			 
			        		
			        	}													
			        }
		      }
			document.getElementById("txtSelectedClass").value=document.getElementById("lstStudent2").value;
			//alert(document.getElementById("txtSelectedClass").value);
			var submiturl="GetStudent.php?Class=" + document.getElementById("lstStudent2").value + "";
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
<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="">


		</font>

		<table style="width: 100%; " class="style3" cellpadding="0" border="1">



			<tr>



				<td class="auto-style49" colspan="5" style="border-left:medium none #C0C0C0; border-right:medium none #808080; border-top:medium none #C0C0C0; height: 10px; background-color:#FFFFFF; border-bottom-style:none; border-bottom-width:medium">







				&nbsp;<p><strong><font face="Cambria">Define A Miscellaneous 
				Payment For Vendors</font></strong></p>
				<hr>
				
				<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">

<font face="Cambria">

<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></font></a></p>

				<table cellpadding="0" style="width: 100%; border-collapse:collapse" height="192" class="style1" border="1">
					<tr>
						<td align="center" style="border-style: solid; border-width: 1px" class="style1" colspan="4">
						<strong><?php echo $Msg;?></strong></td>
					</tr>
					<tr>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px" class="style2" bgcolor="#95C23D">
						<font face="Cambria"><strong>Head Name</strong></font></td>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px" bgcolor="#95C23D">
							<b><font face="Cambria">Head Amount</font></b></td>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px" bgcolor="#95C23D">
						<font face="Cambria"><b>Remarks</b></font></td>
						<td width="279" align="center" height="44" style="border-style: solid; border-width: 1px" bgcolor="#95C23D">
						<font face="Cambria"><b>Last Date</b></font></td>
					</tr>
					<tr>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px" class="style2">
						<font face="Cambria">
							<select name="txtHeadName" id="txtHeadName" required="true">
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `HeadName` FROM `fees_misc_head`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></font></td>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px">
							<font face="Cambria">
							<input name="txtHeadAmount" id="txtHeadAmount" type="text" class="text-box" style="height: 22px"required="true"></font></td>
						<td width="278" align="center" height="44" style="border-style: solid; border-width: 1px">
						<textarea rows="2" name="txtRemarks" id="txtRemarks" cols="20" class="text-address"required="true"></textarea></td>
						<td width="279" align="center" height="44" style="border-style: solid; border-width: 1px">
						<font face="Cambria">
							<input name="txtLastDate" id="txtLastDate" type="text" class="tcal"required="true"></font></td>
					</tr>
					<tr>
						<td width="1329" align="center" height="22" style="border-style: solid; border-width: 1px" colspan="4">
						&nbsp;</td>
					</tr>
					<tr>
						<td bgcolor="#95C23D" width="278" align="center" height="22" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Enter Vendor Name</font></b></td>
						<td bgcolor="#95C23D" width="278" align="center" height="22" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Enter Vendor Mail Id</font></b></td>
						<td bgcolor="#95C23D" align="center" height="22" style="border-style: solid; border-width: 1px; width: 278px;">
						<b><font face="Cambria">Enter Vendor Phone No</font></b></td>
						<td bgcolor="#95C23D" width="279" align="center" height="22" style="border-style: solid; border-width: 1px">
						<b><font face="Cambria">Last Date Of Payment</font></b></td>
					</tr>
					<tr>
						<td bgcolor="#FFFFFF" width="278" align="center" style="border-style: solid; border-width: 1px">
		&nbsp;</td>
						<td bgcolor="#FFFFFF" width="278" align="center" style="border-style: solid; border-width: 1px">
		&nbsp;</td>
						<td bgcolor="#FFFFFF" align="center" style="border-style: solid; border-width: 1px; width: 278px;">
		&nbsp;</td>
						<td bgcolor="#FFFFFF" width="279" align="center" style="border-style: solid; border-width: 1px">
		&nbsp;</td>
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

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>

		</body>

</html>