<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>

<?php include '../../AppConf.php';?>
<?php


   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   if ($_REQUEST["cboClass"] != "")
   {
   	$class = $_REQUEST["cboClass"];
	$SelectedMonth = $_REQUEST["cboMonth"];
	$CourseCurr= $_REQUEST["txtCourseCurr"];
	
   		$rslt = mysql_query("SELECT * FROM `course_curriculam` a  where  `sclass`='$class' and `month`='$SelectedMonth'");
		if(mysql_num_rows($rslt) > 0 )
		{
			$ssql = "UPDATE `course_curriculam` SET `syllabus`='$CourseCurr' WHERE `sclass`='$class' AND `month`='$SelectedMonth'";
		}
		else
		{
			$ssql = "INSERT INTO `course_curriculam` (`sclass`,`syllabus`,`month`) values ('$class','$CourseCurr','$SelectedMonth')";
		}
		//echo $ssql . "<br>";
		mysql_query($ssql) or die(mysql_error());
		$Message = "Course Curriculam has been inserted successfull!";
		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Course_Curriculam'";

   		$reslt = mysql_query($ssqlActivity , $Con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		

		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `sclass`='$Class'";
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass`='$class'";


   		$result = mysql_query($ssqlGCM , $Con);

    while($row = mysql_fetch_assoc($result))
	   {
	   		$registrationIDs = $row['GCMAccountId'];
		    //$url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
    		$url1 = 'http://aravalisisgcm.in/school/SendGCMAIS43.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;

		    //Class work message---------------------------------------

		    // create a new cURL resource

				$ch = curl_init();

				

				// set URL and other appropriate options

				curl_setopt($ch, CURLOPT_URL, $url1);

				curl_setopt($ch, CURLOPT_HEADER, 0);

				

				// grab URL and pass it to the browser

				curl_exec($ch);

				

				// close cURL resource, and free up system resources

			

			if(curl_errno($ch))

			{ 

				echo 'Curl error: ' . curl_error($ch); 

			}

			curl_close($ch);

	   }
		
   }
   
?>   

<script language="javascript">
function Validate()
{
	document.frmCourseCurriculum.txtCourseCurr.value = tinyMCE.get('elm1').getContent();
	
	
	if (document.getElementById("cboClass").value =="Select One")
	{
		alert("Please select class!");
		return;
	}
	if (document.getElementById("cboMonth").value =="Select One")
	{
		alert("Please select month!");
		return;
	}
	if (document.frmCourseCurriculum.txtCourseCurr.value =="")
	{
		alert ("Please enter course curriculum!");
		return;
	}
		
	
	//document.getElementById("frmCourseCurriculum").action="SubmitfrmCourseCurriculum.php";
	document.getElementById("frmCourseCurriculum").submit();
}


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
			        	removeAllOptions(document.frmCourseCurriculum.cboMonth);

			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmCourseCurriculum.cboMonth,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmCourseCurriculum.cboMonth,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
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
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce_dev.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<title>Enter Class Work Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #CD222B;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
}
.style6 {
	border-style: solid;
	border-width: 1px;
	border-collapse: collapse;
}
.style7 {
	text-align: right;
}
.style9 {
	text-align: left;
}
.style10 {
	text-align: center;
	color: #CC0033;
}
</style>
</head>

<body>

<div class="style9">

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="style4" colspan="4">Enter Course Curriculum Details</td>
		<td class="style4" colspan="4"><a href="PreviousCourseCurriculam.php">View Previous uploaded Course Curriculum Details</a></td>
	</tr>
	
	</table>
	
	<table>
	
	<form name="frmCourseCurriculum" id="frmCourseCurriculum" method="post" action="frmCourseCurriculum1.php">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<input type="hidden" name="txtCourseCurr" id="txtCourseCurr" value="">
	<tr>
		<td class="style3" style="width: 318px">Class: </td>
		<td class="style2" style="width: 319px">
			<!--<select name="cboClass" id="cboClass" onchange="Javascript:FillSubject();">-->
			<select name="cboClass" id="cboClass">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>"><?php echo $class; ?></option>
			<?php
				}
			?>
			</select>
			
		</td>
		<td class="style3" style="width: 319px">Month:</td>
		<td class="style2" style="width: 319px">
		
		<select name="cboMonth" id="cboMonth">
		<option selected="" value="Select One">Select One</option>
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		</select>
		
		</td>
	</tr>
	
	<tr>
		<td class="style3" colspan="4">
		<table width="100%" cellpadding="0" class="style6">
			
			<tr>
				<td style="width: 238px; height: 36px;" class="style7">Curriculum Detail</td>
				<td style="height: 36px;" class="style9">
		&nbsp;<textarea id="elm1" name="elm1" rows="9" style="width: 84%" class="auto-style23">
				
			</textarea>
		</td>
			</tr>
			
			</table>
		</td>
	</tr>
	<tr>
		<td class="style5" colspan="4">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

</div>

<p class="style10"><strong><?php echo $Message; ?></strong></p>

</body>

</html>
