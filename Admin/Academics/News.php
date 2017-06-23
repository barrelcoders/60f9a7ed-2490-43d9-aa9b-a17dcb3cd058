<?php
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
session_start();
?>

<?php
if ($_REQUEST["txtNews"] != "")
{

	$News=$_REQUEST["txtNews"];

	$NewsTitle=$_REQUEST["txtNewstitle"];

	



		$Dt = $_REQUEST["txtDate"];



		$arr=explode('/',$Dt);



		$DtateDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];



		



	move_uploaded_file($_FILES["file"]["tmp_name"],"NewsImage/" . $_FILES["file"]["name"]);



	


 
	//$FileURL = "http://emeraldsis.com//Admin/Academics/NewsImage/" . $_FILES["file"]["name"];
	$FileURL = $BaseURL."/Admin/Academics/NewsImage/" . $_FILES["file"]["name"];



	



	$ssql="INSERT INTO `school_news` (`date`,`news`,`imageurl`,`newstitle`) VALUES('$DtateDt','$News','$FileURL','$NewsTitle')";



	mysql_query($ssql) or die(mysql_error());



	



	mysql_query("delete from `update_track` where `Activity`='News'") or die(mysql_error());



	mysql_query("insert into `update_track` (`Activity`) values ('News')") or die(mysql_error());





//******SENDING EMAIL*****************



	

	$strMailBody = '';

	$strMailBody = $strMailBody . '<style type="text/css">';

	$strMailBody = $strMailBody . '.style1 {';

	$strMailBody = $strMailBody . 'border-collapse: collapse;';

	$strMailBody = $strMailBody . 'border: 1px solid #000000;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '.style3 {';

	$strMailBody = $strMailBody . 'border-style: solid;';

	$strMailBody = $strMailBody . 'border-width: 1px;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '.style4 {';

	$strMailBody = $strMailBody . 'border-style: solid;';

	$strMailBody = $strMailBody . 'border-width: 1px;';

	$strMailBody = $strMailBody . 'text-align: center;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '.style5 {';

	$strMailBody = $strMailBody . 'font-size: 24pt;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '.style6 {';

	$strMailBody = $strMailBody . 'background-color: #FFFFFF;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '.style7 {';

	$strMailBody = $strMailBody . 'font-family: arial, sans-serif;';

	$strMailBody = $strMailBody . 'font-size: 13px;';

	$strMailBody = $strMailBody . 'color: #222222;';

	$strMailBody = $strMailBody . '}';

	$strMailBody = $strMailBody . '</style>';

	

	$strMailBody = $strMailBody . '<table style="width: 100%" class="style1">';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style4" align="center">';

	$strMailBody = $strMailBody . '<span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);" class="style5">';

	$strMailBody = $strMailBody . '<span class="style6">'.$SchoolName.'</span></span>&nbsp;</td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style4" align="center"><img border="0" src="'.$SchoolLogo.'"></td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style3" align="center">';

	$strMailBody = $strMailBody . '<span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">';

	$strMailBody = $strMailBody . 'Student Information System - News</span>&nbsp;</td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style3" style="height: 22px"><strong>Title:- </strong>';

	$strMailBody = $strMailBody . '<span class="style7">' . $NewsTitle. '</span></td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style3"><strong><img border="0" src="' . $FileURL . '"></strong>&nbsp;</td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '<tr>';

	$strMailBody = $strMailBody . '<td class="style3">';

	$strMailBody = $strMailBody . '<span style="color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">' . $News . '</span>&nbsp;</td>';

	$strMailBody = $strMailBody . '</tr>';

	$strMailBody = $strMailBody . '</table>';

	



	$ssqlMsg="select `email`,`sname`,`sclass`,`srollno`,`sadmission` from `student_master` where `email` !=''";	
	

	$rsMsg= mysql_query($ssqlMsg);

		

		$headers = "MIME-Version: 1.0" . "\r\n";

		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



		// More headers

		//$headers .= 'From: communication@emeraldsis.com' . "\r\n";
		$headers .= 'From: '.$CommunicationEmailId. "\r\n";	
		while($row1 = mysql_fetch_row($rsMsg))
		{
					$EmailID=$row1[0];
					$StudentName=$row1[1];
					$to = $EmailID;
					
					$EmailID=$row1[0];
					$StudentName=$row1[1];
					$MyClass=$row1[2];
					$MyRollNo=$row1[3];
					$MyAdmission=$row1[4];
					
					//$to = "inderprakash@gmail.com";
					$subject=$NewsTitle;
					//mail($to,$subject,$strMailBody,$headers);
					//echo "To:" . $to . "Subject:" . $subject;
					
					$ssql="INSERT INTO `email_delivery` (`sadmission`,`ToEmail`,`htmlcode`,`FromEmail`,`Subject`) VALUES ('$MyAdmission','$to','$strMailBody','$CommunicationEmailId','$subject')";
					mysql_query($ssql) or die(mysql_error());
					echo "To:" . $to . ",Class:" . $MyClass . ",RollNo:" . $MyRollNo . "<br>";
		}





//*******END OF SENDING EMAIL*********	

//***********SENDING GCM**************
		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='News'";

   		$reslt = mysql_query($ssqlActivity , $Con);
     while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$message1=$rowa['gcm_message'];
	   		$message1=str_replace(" ","%20",$message1);    
	   }
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !=''";
   		$result = mysql_query($ssqlGCM , $Con);
	    while($row = mysql_fetch_assoc($result))
	   {
	   		$registrationIDs = $row['GCMAccountId'];

		    //$url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
			$url1 = 'http://aravalisisgcm.in/school/SendGCMAIS43.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
			
		    //Notice GCM message---------------------------------------
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
}//END OF IF BLOCK

$ssql="SELECT `srno` , `news`,DATE_FORMAT(`date`,'%d-%b-%y') as `datetime`,`imageurl`,`newstitle` FROM `school_news` a  order by `date` desc";
$rs= mysql_query($ssql);
$num_rows=0;
?>







<script language="javascript">







function Validate()
{



	document.frmNotice.txtNews.value = tinyMCE.get('elm1').getContent();



	 



	//alert(document.frmNotice.txtNews.value);



	//return;



	if (document.getElementById("txtDate").value=="Select Date")



	{



		alert ("Please select Date !");



		return;



	}



	if (document.getElementById("txtNewstitle").value=="")

	{

		alert("Please enter title!");

		return;

	}



	if (document.getElementById("txtNews").value=="")



	{



		alert("Please enter News");



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



function ShowNews(SrNo)

	{

  		//var myWindow = window.open("ShowNotice.php?srno=" + SrNo ,"","width=600,height=700");

  		var myWindow = window.open("ShowNews.php?srno=" + SrNo ,"","fullscreen=yes,location=no");

	}



</script>







<html>















<head>







<meta http-equiv="Content-Language" content="en-us">







<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">







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







<title>Upload News</title>







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







	font-family: Cambria;







	font-weight: bold;







	font-size: 18px;







	color: #000000;







}







.style2 {







	border-collapse: collapse;







	border-style: solid;







	border-width: 1px;







}







.style4 {







	font-family: Cambria;







	font-size: 15px;







	color: #FFFFFF;







	font-weight: bold;







}







.style5 {







	font-family: Cambria;







	font-weight: bold;







	font-size: 18px;







	color: #000000;







	text-align: center;







}







.style6 {



	border-color: #000000;

	border-width: 0px;

	border-collapse: collapse;



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



}







.style9 {

	border-style: solid;

	border-width: 1px;

	text-align: center;

}







.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style4 {
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
}
.auto-style5 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
	color: #000000;
	font-weight: bold;
}
.auto-style6 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
}
.auto-style7 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
	color: #000000;
}
.auto-style8 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
	color: #FFFFFF;
	background-color: #CC0033;
}
.auto-style9 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style10 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-weight: bold;
	font-size: small;
	color: #000000;
}
.auto-style11 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
}
.auto-style13 {
	border-collapse: collapse;
	border-left-style: solid;
	border-left-width: 0px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 0px;
	border-bottom-style: solid;
	border-bottom-width: 0px;
}
.auto-style14 {
	border-left-style: none;
	border-left-width: medium;
}







.auto-style15 {
	font-size: default (size);
}
.auto-style16 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-weight: bold;
	font-size: default (size);
	color: #000000;
}
.auto-style17 {
	color: #000000;
}
.auto-style18 {
	border-style: solid;
	border-width: 1px;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: default (size);
	color: #000000;
}







</style>







</head>















<body>







<p>&nbsp;</p>







<table width="100%" cellspacing="1" bordercolor="#000000" id="table_10" class="auto-style13">







	



	<tr>



		<td width=100% class="auto-style4">



		<span class="auto-style5">Send News to Students</span><span style="; font-weight: 700; font-size: 18px; color: #000000">
<hr class="auto-style3" style="height: -15px">
		</span>
		<span style="; font-weight: 700; color: #000000" class="auto-style15"> 



		<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right" class="auto-style9"></a><br class="auto-style9"> 



		<td class="auto-style14" style="border-top-color: #000000; border-top-width: 1px; border-bottom-color: #000000; border-bottom-width: 1px">



		</tr>



</table>







	



<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style2">	







	<form name="frmNotice" id="frmNotice" method="post" action="News.php" enctype="multipart/form-data">



	<input type="hidden" name="txtNews" id="txtNews" value="" class="auto-style11">



	<tr>







		<td style="width: 154px; height: 23px" class="auto-style10">







		Select Date</td>







		<td style="height: 23px; width: 88%;">







		<input type="text" name="txtDate" id="txtDate" size="15" value="Select Date" class="tcal" style="font-family: Arial; color: #000000"></td>







	</tr>



	



	<tr>



		<td style="width: 154px; height: 29px">

		<span class="auto-style16">News Title</span><span style="font-weight: 700; color: #000000" class="auto-style11">:</span><span class="auto-style11">
		</span>

		</td>

		<td style="height: 29px;">

		<input name="txtNewstitle" id="txtNewstitle" style="width: 818; height: 31" type="text" class="auto-style11"></td>

	</tr>



	



	<tr>







		<td style="width: 154px; height: 23px" class="auto-style16">







		Add News:</td>







		<td style="height: 23px; width: 88%;">



		<span class="auto-style11">



		<!--



		<textarea name="txtNews" id="txtNews" style="width: 1056px; height: 153px;"></textarea>



		-->



		



		</span>



		



		<textarea id="elm1" name="elm1" rows="9" style="width: 823; height:139" class="auto-style11">

		</textarea><span class="auto-style11"> </span>



		</td>







	</tr>



	<tr>



	



	<td style="width: 154px">



	



	<font face="Cambria, Cochin, Georgia, Times, Times New Roman, serif"><b>News 
	Image URL</b></font></td>



	



	<td style="width: 88%">



	



	<input type="file" name="file" id="file" class="auto-style11" /></td>



	</tr>







	<tr>







		<td style="height: 31px;" class="style5" colspan="2">







		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style11" style="font-weight: 700"></td>







	</tr>







	</form>







</table><br class="auto-style11"><br class="auto-style15"></br>



<table style="width: 100%" class="style6">



	<tr>



		<td class="auto-style8" style="width: 86px; height: 24px; background-color:#48AC2E"><strong>Sr.No.</strong></td>



		<td class="auto-style8" style="width: 110px; height: 24px; background-color:#48AC2E"><strong>Date Time</strong></td>



		<td class="auto-style8" style="width: 414px; height: 24px; background-color:#48AC2E"><strong>News Title</strong></td>



		<td class="auto-style8" style="width: 207px; height: 24px; background-color:#48AC2E"><strong>
		Preview </strong></td>



		<td class="auto-style8" style="width: 207px; height: 24px; background-color:#48AC2E"><strong>Image</strong></td>



	</tr>



	<?php



				$num_rows=0;



				while($row = mysql_fetch_row($rs))



				{



					$srno=$row[0];



					$news=$row[1];



					$datetime=$row[2];

					$NewTitle=$row[4];



					if ($row[3] !="")



					{



						$imageurl=$row[3];



					}



					else



					{



						$imageurl='#';



					}



					$num_rows=$num_rows+1;



	?>



	<tr>



		<td style="width: 86px" class="auto-style18"><?php echo $num_rows; ?></td>



		<td style="width: 110px" class="auto-style7"><?php echo $datetime; ?></td>



		<td style="width: 414px" class="auto-style18"><?php echo $NewTitle; ?></td>



		<td class="auto-style6" style="width: 207px" align="left">

				<p align="center">

				<a href="Javascript:ShowNews(<?php echo $srno; ?>);">
				<span class="auto-style17">Preview</span></a></td>		



		<td class="auto-style6" style="width: 207px" align="left">
		<p align="center"><a href='<?php echo $imageurl; ?>' target="_blank">
		<span class="auto-style17">Show Image</span></a></td>		



	</tr>



	<?php 



	}



	?>



</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>







</body>















</html>