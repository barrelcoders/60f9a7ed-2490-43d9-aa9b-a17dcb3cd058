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
   	//$class = $_REQUEST["cboClass"];
   	$SelectedClasses= $_REQUEST["txtSelectedClass"];
   	$arr=explode(',',$SelectedClasses);
	$SelectedSubject = $_REQUEST["cboSubject"];
	$CourseCurr= $_REQUEST["txtCourseCurr"];
	
	   	for($i=0;$i<sizeof($arr);$i++)
	   	{
	   		//echo $i.":".$arr[$i]."<br>";
	   	
	   		//$rslt = mysql_query("SELECT * FROM `course_curriculam` a  where  `sclass`='$class' and `subject`='$SelectedSubject'");
	   		$rslt = mysql_query("SELECT * FROM `course_curriculam` a  where  `sclass` in (".$arr[$i].") and `subject`='$SelectedSubject'");
			if(mysql_num_rows($rslt) > 0 )
			{
				//$ssql = "UPDATE `course_curriculam` SET `syllabus`='$CourseCurr' WHERE `sclass`='$class' AND `subject`='$SelectedSubject'";
				$ssql = "UPDATE `course_curriculam` SET `syllabus`='$CourseCurr' WHERE `sclass` in (".$arr[$i].") AND `subject`='$SelectedSubject'";
			}
			else
			{
				//$ssql = "INSERT INTO `course_curriculam` (`sclass`,`syllabus`,`subject`) values ('$class','$CourseCurr','$SelectedSubject')";
				$ssql = "INSERT INTO `course_curriculam` (`sclass`,`syllabus`,`subject`) values (".$arr[$i].",'$CourseCurr','$SelectedSubject')";
			}
			//echo $ssql."<br>";
			mysql_query($ssql) or die(mysql_error());
		}

		$Message = "Course Curriculam has been inserted successfull!";
		
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
	if (document.getElementById("cboSubject").value =="Select One")
	{
		alert("Please select Subject!");
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
			        	removeAllOptions(document.frmCourseCurriculum.cboSubject);

			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmCourseCurriculum.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmCourseCurriculum.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			//var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
			var submiturl="GetSubject1.php?Class=" + document.getElementById("txtSelectedClass").value + "";
			
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
	
	function GetSelectedValue()
	{
		document.getElementById("txtSelectedClass").value="";
		var x=document.getElementById("cboClass");

		var sstr="'";

		  //for (var i = 0; i < x.options.length; i++) 
		  for (var i = 0; i < document.getElementById("cboClass").options.length; i++) 
		  {

		     if(x.options[i].selected ==true)
		     {

		          //alert(document.getElementById("cboClass").options[i].value);
		          sstr = sstr + x.options[i].value + "','";

		      }

		  }

		  if (sstr !="'")
		  {
			sstr=sstr.substr(0,sstr.length-2);
			document.getElementById("txtSelectedClass").value = sstr;
			alert (document.getElementById("txtSelectedClass").value);
		  }
		  
		  FillSubject();
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
	border-color: #000000;
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
	background-color: #FFFFFF;
	color: #000000;
}
.style5 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
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
	color: #000000;
}

.auto-style21 {
	text-align: left;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}

</style>
</head>

<body>

<div class="style9">

				<div class="auto-style21">

					<font face="Cambria"><b>Session Planning</b></font></div>
<hr class="auto-style3" style="height: -15px">
<p><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>
<table style="width: 100%" class="style1">
	
	<tr>
		<td class="style4" colspan="4" style="background-color: #95C23D; text-align:center; border-bottom-style:none; border-bottom-width:medium">
		<font face="Cambria">Upload Session Plan</font></td>
		<td class="style4" colspan="4" style="background-color: #FFFFFF; text-align:center; border-bottom-style:none; border-bottom-width:medium" width="50%">
		<font face="Cambria"><a href="PreviousCourseCurriculam.php">
		<span style="text-decoration: none"><font color="#000000">Uploaded 
		Session Plan Report</font></span></a></font></td>
	</tr>
	
	</table>
	
	<table style="border-collapse: collapse" width="100%">
	
	<form name="frmCourseCurriculum" id="frmCourseCurriculum" method="post" action="frmCourseCurriculum1.php">
	<font face="Cambria">
	<input type="hidden" name="SubmitType" id="SubmitType" value="">
	<input type="hidden" name="txtCourseCurr" id="txtCourseCurr" value="">
	<input type="hidden" name="txtSelectedClass" id="txtSelectedClass" value="">
	</font>
	<tr>
		<td class="style3" colspan="4">&nbsp;</td>
	</tr>
	
	<tr>
		<td class="style3" style="width: 258px"><font face="Cambria">Class: 
		</font> </td>
		<td class="style2" style="width: 259px" align="center">
			<font face="Cambria">
			<!--<select name="cboClass" id="cboClass" size="7" multiple style="width: 174px" onchange="Javascript:FillSubject();">-->
			<select name="cboClass" id="cboClass" size="7" multiple style="width: 174px" onclick="Javascript:GetSelectedValue();">
			
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
			
		</font>
			
		</td>
		<td class="style3" style="width: 259px; text-align:center"><font face="Cambria">Subject:</font></td>
		<td class="style2" style="width: 259px">
		
		<font face="Cambria">
		
		<select name="cboSubject" id="cboSubject">
		<option selected="" value="Select One">Select One</option>		
		</select>
		
		</font>
		
		</td>
	</tr>
	
	<tr>
		<td class="style3" colspan="4">
		<table width="100%" cellpadding="0" class="style6" style="border-width: 0px">
			
			<tr>
				<td style="width: 238px; height: 36px; border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="style7">
				<font face="Cambria">Session Plan Detail</font></td>
				<td style="height: 36px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="style9">
		<font face="Cambria">&nbsp;<textarea id="elm1" name="elm1" rows="9" style="width: 885; height:148" class="auto-style23">
				
			</textarea>
		</font>
		</td>
			</tr>
			
			</table>
		</td>
	</tr>
	<tr>
		<td class="style5" colspan="4" style="background-color: #FFFFFF">
		&nbsp;</td>
	</tr>
	<tr>
		<td class="style5" colspan="4" style="background-color: #FFFFFF">
		<font face="Cambria">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></font></td>
	</tr>
	</form>
</table>

</div>

<p class="style10"><font face="Cambria"><strong><?php echo $Message; ?></strong></font></p>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>



</body>

</html>