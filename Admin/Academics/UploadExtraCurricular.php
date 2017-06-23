<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
session_start();

if ($_REQUEST["txtActivity"] != "")
{

	$activitytype=$_REQUEST["txtActivityType"];
	$activity=$_REQUEST["txtActivity"];
	
	move_uploaded_file($_FILES["file"]["tmp_name"],"extracurriculumImg/" . $_FILES["file"]["name"]);
	
	$FileURL = "http://aravalisis.com/Admin/extracurriculumImg/" . $_FILES["file"]["name"];
	
	$ssql="INSERT INTO `extra_curricular` (`activitytype`,`activity`,`imageurl`) VALUES('$activitytype','$activity','$FileURL')";
	mysql_query($ssql) or die(mysql_error());

	mysql_query("delete from `update_track` where `Activity`='extracurricular'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('extracurricular')") or die(mysql_error());
}
$ssql="SELECT `srno` , `activitytype`,`activity` ,`imageurl`,`datetime` FROM `extra_curricular` a order by `datetime`";

$rs= mysql_query($ssql);
$num_rows=0;
?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtActivity").value=="")
	{
		alert("Please enter Activity Details");
		return;	
	}

	document.getElementById("frmNotice").submit();
}

function ShowEdit(SrNo)

{

	var myWindow = window.open("EditNotice.php?srno=" + SrNo ,"","width=300,height=400");

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

			        	

			        	//removeAllOptions(document.frmNotice.cboRollNo);

			        	document.getElementById("txtName").value="";

			        	//addOption(document.frmNotice.cboRollNo,"All","All")

			        	document.getElementById("txtName").value=rows;

			        	/*

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        			//addOption(document.frmNotice.cboRollNo,arr_row[0],arr_row[0])			        			 

			        			document.getElementById("txtName").value=rows;

			        	}*/

						//alert(rows);														

			        }

		      }

			

								

			if (document.getElementById("cboClass").value=="All")

			{

				removeAllOptions(document.frmNotice.cboRollNo);

				addOption(document.frmNotice.cboRollNo,"All","All")

					

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

			        	

			        	removeAllOptions(document.frmNotice.cboRollNo);

			        	document.getElementById("txtName").value="";

			        	addOption(document.frmNotice.cboRollNo,"All","All")

			        	arr_row=rows.split(",");

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        			addOption(document.frmNotice.cboRollNo,arr_row[0],arr_row[0])			        			 

			        		}

						//alert(rows);														

			        }

		      }

			

								

			if (document.getElementById("cboClass").value=="All")

			{

				removeAllOptions(document.frmNotice.cboRollNo);

				document.getElementById("txtName").value="";

				addOption(document.frmNotice.cboRollNo,"All","All")

					

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

<title>Upload Extra Curricular Activity</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style1 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 15px;

	color: #000000;
	
	border-width: 1px;

}

.style2 {
	text-align: left;	border-style: solid;	border-width: 1px;
	border-collapse: collapse;	background-color: #DCBA7B;
}

.style5 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

	text-align: center;

}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	font-family: Cambria;
	color: #CD222B;
}
.style6 {
	border-collapse: collapse;
	border: 0px solid #000000;
	font-family: Cambria;
}

.style7 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
	font-size: 15px;
	color: #FFFFFF;
	background-color: #CC0033;
}

.style8 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}

.style9 {
	font-family: Cambria;
	font-size: 15px;
	color: #FFFFFF;
}

</style>

</head>



<body>

<table width="100%" cellspacing="1" id="table_10" class="style4">

	
	<tr>
		<td width=100%>
		<span style="; font-weight: 700; "> 
		Upload Extra Curricular Activity for Students
		<td>
		</tr>
</table>

	
<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style1">	

	<form name="frmNotice" id="frmNotice" method="post" action="UploadExtraCurricular.php" enctype="multipart/form-data">
	
	<tr>

		<td style="width: 500px; height: 23px;" class="style1">

		
		Select Activity Date</td>

		<td style="height: 23px;">
		
		<input type="text" name="txtDate<?php echo $Cnt; ?>" id="txtDate<?php echo $Cnt; ?>" size="15" value="Select Date" class="tcal" style="font-family: Arial; color: #CC0033"></td>

	</tr>
	
	<tr>

		<td style="width: 500px; height: 23px;" class="style1">

		Activity Types</td>

		<td style="height: 23px;">

		<input name="txtActivityType" type="text" style="width: 245px"></td>

	</tr>
	
	<tr>

		<td style="width: 500px; height: 23px;" class="style1">

		Add Extra Curricular Activity:</td>

		<td style="height: 23px;">

		<textarea name="txtActivity" id="txtActivity"; height: 153px;"></textarea></td>

	</tr>
	<tr>
	
	<td style="width: 500px">
	
	Select Photograph of Activity Event
	</td>
	
	<td>
	
	<input type="file" name="file" id="file" /></td>
	<br>
	<br>
	</tr>

	<tr>

		<td style="height: 29px;" class="style5" colspan="2">

		<input name="BtnSubmit" type="button" value="submit" onclick="Validate();"></td>

	</tr>

	</form>

</table></br>
<table class="style6">
	<tr>
		<td class="style7" ">Sr.No.</td>
		<td class="style7" ">Activity Type</td>
		<td class="style7" ">Activity</td>
		<td class="style7" ">Image Of Event</td>
		<td class="style7" ">Date Time</td>
	</tr>
	<?php
				$num_rows=1;
				$ssql="SELECT `srno` , `activitytype`,`activity` ,`imageurl`,`datetime` FROM `extra_curricular` a order by `datetime`";
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$activitytype=$row[1];
					$activity=$row[2];
					$imageurl=$row[3];
					$datetime=$row[4];
					$num_rows=$num_rows+1;
	?>
	<tr>
		<td class="style8"><?php echo $srno; ?></td>
		<td class="style8"><?php echo $activitytype; ?></td>
		<td  class="style8"><?php echo $activity; ?></td>
		<td  class="style8"><?php echo $imageurl; ?></td>
		<td class="style8"><?php echo $datetime; ?></td>		
	</tr>
	<?php 
	}
	?>
</table>

</body>



</html>