<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_POST["isSubmit"]=="yes")
{
	$txtclass=$_POST["txtClass"];
	$txtSubject=$_POST["txtSubject"];
	$txtChapter=$_POST["txtChapter"];
	$txtTopic=$_POST["txtTopicName"];
	$txtSubTopic=$_POST["txtSubTopic"];
	$rsCheck=mysql_query("select * from `Assignment_SubTopic` where UCASE(`SubTopicName`)=UCASE('$txtSubTopic')");
	if(mysql_num_rows($rsCheck)>0)
	{
		$Msg="SubTopicName:".$txtSubTopic." already Exists!";
	}
	else
	{
		mysql_query("insert into `Assignment_SubTopic` (`sclass`,`Subject`,`ChapterName`,`TopicName`,`SubTopicName`) values ('$txtclass','$txtSubject','$txtChapter','$txtTopic','$txtSubTopic')");
		$Msg="Category submitted successfully!";
	}

}

?>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Create Sub Topic </title>

<script language="javascript">



function GetChapter()

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

						var Chapter="";

			        	rows=new String(xmlHttp.responseText);

			        	//removeAllOptions(document.frmGroupSMS.lstSelectedGroupMember);

			        	removeAllOptions(document.frmDocument.txtChapter);

			        	arr_row=rows.split(",");

			        	addOption(document.frmDocument.txtChapter,"Select One","Select One")

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        		Chapter=arr_row[row_count];

			        			addOption(document.frmDocument.txtChapter,Chapter,Chapter)			        			 			        			 

			        	}													

			        }

		      }

			var submiturl="GetChapter.php?Subject=" + document.getElementById("txtSubject").value + "";

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

	

	

	

	function GetTopic()

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

						var Topic="";

			        	rows=new String(xmlHttp.responseText);

			        	//removeAllOptions(document.frmGroupSMS.lstSelectedGroupMember);

			        	removeAllOptions(document.frmDocument.txtTopicName);

			        	arr_row=rows.split(",");

			        	addOption(document.frmDocument.txtTopicName,"Select One","Select One")

			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{

			        		Topic=arr_row[row_count];

			        			addOption(document.frmDocument.txtTopicName,Topic,Topic)			        			 			        			 

			        	}													

			        }

		      }

			var submiturl="GetTopic.php?ChapterName=" + document.getElementById("txtChapter").value + "";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);			

}



</script>



<style type="text/css">

.style1 {

	text-align: center;

	color: #CC3300;

}

.style2 {

	font-family: Cambria;

}

</style>

</head>



<body>



<p>&nbsp;</p>

<p><b><font face="Cambria">Define Topic</font></b></p>

<hr>

<p class="style1">



<strong><?php echo $Msg;?></strong>

</p>

<table border="1" width="100%" style="border-width:0px; border-collapse: collapse">

<form name="frmDocument" id="frmDocument" method="post" action="CreateSubTopic.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

	<tr>

		<td style="border-style: none; border-width: medium"><b>

		<font face="Cambria">Select Class</font></b></td>

		<td style="border-style: none; border-width: medium" colspan="2">

		

							  <select name="txtClass"  id="txtClass" class="text-box">

								<option selected="" value="Select One">Select One</option>

								 <?php

									$ssqlName="SELECT distinct `class` FROM `class_master`";

									$rsName= mysql_query($ssqlName);

									

									while($row1 = mysql_fetch_row($rsName))

									{

											$Name=$row1[0];

									?>

								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>

								 <?php 

									}

									?>

								</select></td>

		<td style="border-style: none; border-width: medium">

		

			<b><font face="Cambria">Select Subject</font></b></td>

		<td style="border-style: none; border-width: medium">

		

							  <select name="txtSubject"  id="txtSubject" class="text-box" required onchange="Javascript:GetChapter();">

								<option selected="" value="Select One">Select One</option>

								 <?php

									$ssqlName="SELECT distinct `Subject` FROM `subject_master`";

									$rsName= mysql_query($ssqlName);

									

									while($row1 = mysql_fetch_row($rsName))

									{

											$Name=$row1[0];

									?>

								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>

								 <?php 

									}

									?>

								</select></td>

		<td style="border-style: none; border-width: medium" colspan="2">

		

			<b><font face="Cambria">Chapter Name</font></b></td>

		<td style="border-style: none; border-width: medium">

		

							 		

							   <select name="txtChapter" id="txtChapter" style="float: left" class="text-box" required onchange="Javascript:GetTopic();"	>

						 <option selected="" value="Select One">Select One</option>						 

			</select></td>

	</tr>

	<tr>

		<td style="border-style: none; border-width: medium">&nbsp;</td>

		<td style="border-style: none; border-width: medium" colspan="7">

		

			&nbsp;</td>

	</tr>

	<tr>

		<td colspan="2" style="border-style: none; border-width: medium"><b>

		<font face="Cambria">&nbsp;Topic Name</font></b></td>

		<td colspan="2" style="border-style: none; border-width: medium">

		

							 	

							   <select name="txtTopicName" id="txtTopicName" style="float: left" class="text-box"	>

						 <option selected="" value="Select One">Select One</option>						 

			</select></td>

		<td colspan="2" style="border-style: none; border-width: medium"><b>

		<font face="Cambria">Sub Topic Name</font></b></td>

		<td colspan="2" style="border-style: none; border-width: medium">

		

			<input name="txtSubTopic" id="txtSubTopic" type="text" class="text-box"  required="true"></td>

	</tr>

	<tr>

		<td colspan="8" style="border-style: none; border-width: medium">

		<p align="center">

		<input type="submit" value="Submit" name="B1" style="font-weight: 700" class="text-box" ></td>

	</tr>

	</form>

</table>

<p>&nbsp;</p>

<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">

	<tr>

		<td align="center" style="text-align: center" ><font face="Cambria"><b>Sr No</b></font></td>

		<td align="center" style="text-align: center" ><b><font face="Cambria">

		Class</font></b></td>

		<td align="center" style="text-align: center" ><b><font face="Cambria">

		Subject</font></b></td>

		<td align="center" style="text-align: center" ><b><font face="Cambria">

		Chapter Name</font></b></td>



		<td align="center" style="text-align: center"><b><font face="Cambria">

		Topic</font></b></td>

		

	<td align="center" style="text-align: center"><b><font face="Cambria">

		Sub-Topic</font></b></td>



		

	</tr>

	<?php

	$recno=1;

	$rs=mysql_query("select `sclass`,`Subject`,`ChapterName`,`TopicName`,`SubTopicName` from `Assignment_SubTopic`");



	while($row=mysql_fetch_row($rs))

	{

		$CLass=$row[0];

	    $Subject=$row[1];

          $Chapter=$row[2];

          $Topic=$row[3];

           $SubTopic=$row[4];



	?>

	<tr>

		<td align="center" class="style2" width="90"><?php echo $recno;?>.</td>

		<td align="center" class="style2" width="172"><?php echo $CLass;?></td>

			<td align="center" class="style2" width="255"><?php echo $Subject;?></td>



		<td align="center" class="style2" width="341"><?php echo $Chapter;?></td>

	  <td align="center" class="style2"><?php echo $Topic;?></td>

       <td align="center" class="style2"><?php echo $SubTopic;?></td>



	</tr>

	<?php

	$recno=$recno+1;

	}

	?>	

	

</table>



<p>&nbsp;</p>



</body>



</html>