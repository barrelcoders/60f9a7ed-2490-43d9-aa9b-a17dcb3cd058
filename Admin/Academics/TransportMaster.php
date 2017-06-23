<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php

session_start();



//$ssql="SELECT `srno` , `sname`,`srollno`,`sclass`,`routeno`,`bus_no`,`timing`,`driver_name`,`driver_mobile` FROM `transport` order by `srno`";

//$ssql="SELECT `srno` , `sname`,`srollno`,`sclass`,`routeno`,(select `bus_no` from `RouteMaster` where `routeno`=a.`routeno`) as `bus_no`,(select `timing` from `RouteMaster` where `routeno`=a.`routeno`) as `timing`,(select `driver_name` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_name`,(select `driver_mobile` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_mobile` FROM `transport` a order by `srno`";
$ssql="SELECT `srno` , `sname`,`srollno`,`sclass`,`routeno`,(select `bus_no` from `RouteMaster` where `routeno`=a.`routeno`) as `bus_no`,(select `timing` from `RouteMaster` where `routeno`=a.`routeno`) as `timing`,(select `driver_name` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_name`,(select `driver_mobile` from `RouteMaster` where `routeno`=a.`routeno`) as `driver_mobile` FROM `student_master` a order by `srno`";

$rs= mysql_query($ssql);$num_rows=0;

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

?>


<script language="javascript">

function Validate()
{

	if (document.getElementById("txtNotice").value=="")
	{
		alert("Please enter section");
		return;

	}

	

	document.getElementById("frmTransport").submit();

	

}

function ShowEdit(SrNo)

{

	//window.open "EditHoliday.php?srno" . SrNo;

	var myWindow = window.open("EditTransport.php?srno=" + SrNo ,"","width=300,height=400");

}

function ShowDelete(SrNo)

{

	var r = confirm("Do you really want to delete the entry?");

	if (r == true)

 	 {

  		var myWindow = window.open("DeleteNotice.php?srno=" + SrNo ,"","width=300,height=400");

  	 }

	else

  	{

	  	return;

  	}

  

	

}

function FillName()
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

			        	

			        	//removeAllOptions(document.frmTransport.cboRollNo);
						if (document.getElementById("cboRollNo").value=="All")
						{
			        		document.getElementById("txtName").value="All";
						}
						else
						{
							document.getElementById("txtName").value="";
							document.getElementById("txtName").value=rows;
						}
			        	//addOption(document.frmTransport.cboRollNo,"All","All")

			        	

			        	/*

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        			//addOption(document.frmTransport.cboRollNo,arr_row[0],arr_row[0])			        			 

			        			document.getElementById("txtName").value=rows;

			        	}*/

						//alert(rows);														

			        }

		      }

			

								

			if (document.getElementById("cboClass").value=="All")

			{

				removeAllOptions(document.frmTransport.cboRollNo);

				addOption(document.frmTransport.cboRollNo,"All","All")

					

			}

			else

			{

			var submiturl="GetName.php?Class=" + document.getElementById("cboClass").value + "&rollno=" + document.getElementById("cboRollNo").value;



			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);

			}

}

function FillRollNo()
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


			        	removeAllOptions(document.frmTransport.cboRollNo);

			        	if (document.getElementById("cboClass").value=="Select One")
			        	{
			        		document.getElementById("txtName").value="";
			        	}
			        	else
			        	{
			        		document.getElementById("txtName").value="";
			        	}

			        	addOption(document.frmTransport.cboRollNo,"Select One","Select One")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{

			        			//addOption(document.frmTransport.cboRollNo,arr_row[0],arr_row[0])			        			 
			        			addOption(document.frmTransport.cboRollNo,arr_row[row_count],arr_row[row_count])			        			 

			        	}

						//alert(rows);														

			        }

		      }

			

								

			if (document.getElementById("cboClass").value=="Select One")
			{

				removeAllOptions(document.frmTransport.cboRollNo);

				document.getElementById("txtName").value="";

				addOption(document.frmTransport.cboRollNo,"Select One","Select One")

					

			}

			else

			{

			var submiturl="GetRollNo.php?Class=" + document.getElementById("cboClass").value + "";



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

</script>
<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Transport Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style1 {

	font-family: Cambria;
font-color:#000000
	

	

	color: #000000;

}

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

}

.style3 {

	text-decoration: none;

}

.style4 {

	font-family: Cambria;

	font-size: 15px;

	color: #000000;

	font-weight: bold;

}

.style5 {

	border-right-style: solid;

	border-right-width: 1px;

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
        font-family: Cambria;
        font-weight:bold;
}
</style>

</head>



<body>

<p>&nbsp;</p>

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="style2">
	<tr>
		<td width=50% bgcolor="#FFFFFF">
		<span style="; font-weight: 700; font-size: 18px; ">Transport Master</span>
		</td>
		
</table>

<table width="100%" cellspacing="1"  id="table_19" class="style5">
	
	<tr>
		<td>&nbsp;<p>
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		<input type="submit" value="Allot Transport" name="btnExportToExcel" style="color: #000000; font-weight: bold; width: 110;height:26"></span></td>
		</tr>
		
		
		<table>
		<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style2">
	<form name="frmTransport" id="frmTransport" method="post" action="TransportMaster.php">
		
		<tr>
		<td style="width: 157px; height: 29px;">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Student Class:</span></td>
		<td style="width: 158px; height: 29px;">
		<select name="cboClass" id="cboClass" style="height: 22px" onchange="Javascript:FillRollNo();">



		<option selected="" value="Select One">Select One</option>

		<?php

		while($row1 = mysql_fetch_row($rsClass))

		{

					$Class=$row1[0];

		?>

		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>

		<?php 

		}

		?>



		</select>
		</td>
		
		
		<td style="width: 157px; height: 29px;">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Student Roll. No:</span>
		</td>
		<td style="width: 157px; height: 29px;">



		<select name="cboRollNo" id="cboRollNo" style="height: 22px" onchange="FillName();">

		<option selected="" value="Select One">Select One</option>

		</select></td>
		
		
		<td style="width: 157px; height: 29px;">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Student Name</span></span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtName" id="txtName" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		<td style="width: 157px; height: 29px;">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #000000">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Bus Route</span></span>:</span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtRoute" id="txtRoute" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		</tr>
		<tr>
		<td height="10">
		</td>
		</tr>
		<tr>
		<td style="width: 157px; height: 29px;">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #000000">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Bus No</span></span></span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtBusNo" id="txtBusNo" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		
		<td style="width: 157px; height: 29px;">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #000000">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Time Of Arrival of Bus at Stop:</span></span></span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtTime" id="txtTime" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		<td style="width: 157px; height: 29px;">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #000000">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Driver Name</span></span></span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtDriverName" id="txtDriverName" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		<td style="width: 157px; height: 29px;">
		<span class="style1">
		<span style="font-family: Cambria; font-weight: 700; font-size: 18px; color: #000000">
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">
		Driver Mobile No. </span></span></span></td>
		<td style="width: 157px; height: 29px;">

		<input type="text" name="txtMobileNo" id="txtMobileNo" size="15" style="font-family: 'Cambria; color: #FFFFFF">
		</td>
		
		</tr>
		<tr>
		<td style="width: 158px; height: 29px;">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();"></td>
	</tr>
	</form>
</table>
	
<table border="1" width="100%" cellspacing="1" style="border-collapse: collapse" height="80" bordercolor="#000000" id="table1" border="1">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" style="border-collapse: collapse; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px" bordercolor="#000000">			<tr>				<td height="35" style="border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">				<p align="Left">				
			&nbsp;</td>			</tr>		</table>

		<table width="100%" bordercolor="#000000" id="table3" class="style2" border="1">			
		
		<tr>				 
		<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px">				
		<span style="font-family: Cambria; font-weight: 700; font-size: 15px; ">				Sr. No.</span></td>	


		<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Student Name</td>	

		<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Student Roll No</td>	

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Student Class</td>	

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Bus Route No</td>	

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Bus No</td>	

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Time of Bus Arrival at Stop</td>	

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Driver Name</td>		

<td height="35" bgcolor="#FFFFFF" align="center" style="width: 79px" class="style4">				Driver Mobile No</td>		
				
				<!--
				<td height="35" bgcolor="#FFFFFF" align="center" style="width: 80px">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #FFFFFF">Edit</span></td>
				-->

				

			<?php

				while($row = mysql_fetch_row($rs))
				{

					$srno=$row[0];					
					$sname=$row[1];					
					$srollno=$row[2];					
					$sclass=$row[3];					
					$routeno=$row[4];	
					$bus_no=$row[5];					
					$timing=$row[6];					
					$driver_name=$row[7];					
					$driver_mobile=$row[8];					
					$num_rows=$num_rows+1;
					

			?>

			<tr>
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $srno; ?></span>				
				</td>				
				
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $sname; ?></span>				
				</td>		
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $srollno; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $sclass; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $routeno; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $bus_no; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $timing; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $driver_name; ?></span>				
				</td>	
				
				<td height="35" align="center" style="width: 79px">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">				
				<?php echo $driver_mobile; ?></span>				
				
				</td>	


				
						
				<!--
				<td height="35" align="center" style="width: 80px">
				<a href="Javascript:ShowEdit('<?php //echo $srno ?>');" class="style3">Edit</a></td>
				-->

				

			</tr>

			<?php

			}

			?>
<!--
			<tr>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 79px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

				<td height="35" align="center" style="width: 80px">&nbsp;</td>

			</tr>
			
			-->

		</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>