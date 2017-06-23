<?php
error_reporting(0);
session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php
$currentdate=date("Y-m-d");
if ($_REQUEST["isSubmit"] != "")
{
	$SelectedDepartment=$_REQUEST["cboEmployee"];
	$notice=$_REQUEST["txtNotice"];
	
	//$Noticetitle=$_REQUEST["txtNoticetitle"];
	//$Date=$_REQUEST["txtDate"];
	$Dt = $_REQUEST["txtDate"];
	$arr=explode('/',$Dt);
	$NoticeDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
			
	
	//***********SENDING SMS**************
	
		$ssqlMsg="SELECT `Name`,`MobileNo`,`EmpId` from `employee_master` where `MobileNo` !='' and `Department`='$SelectedDepartment'";		
	
	
	if ($ssqlMsg !="")
	{
		$rsMsg= mysql_query($ssqlMsg);
		while($row1 = mysql_fetch_row($rsMsg))
		{
					$Name=$row1[0];
					$MobileNo=$row1[1];
					$EmpId=$row1[2];
					
					$MobileNo="9818243377";
					echo "$Name" . "-" . $MobileNo . "<br>";
					//Sending SMS
					//$notice=%20
					$notice=strip_tags($notice);
					
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
										
					$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $MobileNo . "&sms=" . $notice . "&senderid=SCHOOL";
					//echo $url;
					//exit();
					 // create a new cURL resource
					$ch = curl_init();
					// set URL and other appropriate options
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					// grab URL and pass it to the browser
					
					//curl_exec($ch);
					
					// close cURL resource, and free up system resources
					if(curl_errno($ch))
					{ 
						echo 'Curl error: ' . curl_error($ch); 
					}
					curl_close($ch);
					
					$ssql=" insert into `Employee_sms_logs` (`sname`,`EmpId`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$Name','$EmpId','EmployeeSMS','$MobileNo','$notice','$NoticeDt')";
					mysql_query($ssql) or die(mysql_error());

		}
		echo "SMS/es has been sent to Employee mentioned above !<br>Click <a href='Javascript:window.close();'>here</a> to Go Back";
		//exit();
	}//SENDING SMS
	exit();
}
$num_rows=0;
$ssql="SELECT distinct `Department` FROM `employee_master`";
$rsEmp= mysql_query($ssql)

?>



<script language="javascript">
function Validate()
{
//document.frmNotice.txtNotice.value = tinyMCE.get('elm1').getContent();

	if (document.getElementById("txtNotice").value=="")
	{
		alert("Please enter Notice");
		return;
	}

	if (document.getElementById("txtDate").value=="")
	{
		alert ("Please select Date !");
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
						if (document.getElementById("cboRollNo").value=="All")
						{
			        		document.getElementById("txtName").value="All";
						}
						else
						{
							document.getElementById("txtName").value="";
							document.getElementById("txtName").value=rows;
						}
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



			        	if (document.getElementById("cboClass").value=="All")

			        	{

			        		document.getElementById("txtName").value="All";

			        	}

			        	else

			        	{

			        		document.getElementById("txtName").value="";

			        	}



			        	addOption(document.frmNotice.cboRollNo,"All","All")



			        	arr_row=rows.split(",");



			        	for(var row_count=0;row_count<arr_row.length;++row_count)

			        	{



			        			//addOption(document.frmNotice.cboRollNo,arr_row[0],arr_row[0])			        			 

			        			addOption(document.frmNotice.cboRollNo,arr_row[row_count],arr_row[row_count])			        			 



			        	}



						//alert(rows);														



			        }



		      }



			



								



			if (document.getElementById("cboClass").value=="All")



			{



				removeAllOptions(document.frmNotice.cboRollNo);



				document.getElementById("txtName").value="All";



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

function DisplayMessageDetail()
{
	var FinalMsg="";
	var Message=document.getElementById("txtNotice").value;
	var NoOfMsg=Math.ceil(Message.length/160);
	
	document.getElementById("MsgDetail").innerHTML="Total Word Count:" + Message.length + " , No of Messages:" + NoOfMsg;
	
}

	function getDropdownElements() 
	{
            var dropDownBox = document.getElementById("cboEmployee");
            var selIndex = dropDownBox.selectedIndex;
            var selValue = dropDownBox.options[selIndex].value;
            var selText = dropDownBox.options[selIndex].text;
            document.getElementById("txtName").value=selValue;
            document.getElementById("SelectedEmployeeId").value=selText;
            //alert("Selected Text : " + selText);
            //alert("Selected Value : " + selValue);
            //alert("Selected Item Index : " + selIndex);
            //alert(document.getElementById("SelectedEmployeeId").value);
     }
</script>



<html>







<head>

<title>Upload New Notice</title>



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

.style2 {



	border-collapse: collapse;



	border-style: solid;



	border-width: 1px;



}



.style5 {



	font-family: Cambria;



	border-style: solid;

	

	text-align: left;  

	

	background-color: #FFFFFF;

	

	font-size: 15px;



	color: #000000;



	text-align: center;

	

	border-width: 1px;

	

	border-color: #808080;



}



.auto-style1 {
	color: #000000;
	font-weight: bold;
	font-size: default (size);
}



.auto-style21 {
	text-align: left;
	font-family: Cambria;
	font-size: default (size);
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #CEAA9E;
}
.auto-style6 {
	color: #DAB9C1;
}



.auto-style22 {
	color: #000000;
}



.auto-style23 {
	font-size: default (size);
}
.auto-style24 {
	font-family: Cambria;
	font-size: default (size);
	color: #CC3300;
}
.auto-style25 {
	text-align: center;
}
.auto-style26 {
	text-align: center;
	color: #CC3300;
	text-decoration: underline;
}



.style6 {
	font-family: Cambria;
	font-size: default (size);
}
.style7 {
	text-align: center;
	color: #000000;
	text-decoration: underline;
}



</style>



</head>







<body>



				<div class="auto-style21">

					&nbsp;<table style="width: 100%">
						<tr>
							<td class="style7" style="text-align: left">

					<strong>Send SMS to Employees</strong></td>
						</tr>
					</table>
					<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></div>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right" class="auto-style23"></a><br class="auto-style23"></p>



	

<table width="100%" cellspacing="1" bordercolor="#000000" id="table_1" class="style2">	
	<form name="frmNotice" id="frmNotice" method="post" action="">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

	<tr>

		<td style="width: 157px; height: 29px;" class="style6">



		Select Date</td>



		

		

		<td style="width: 157px; height: 29px;">



		<input type="text" name="txtDate" id="txtDate" size="15" value="Select Date" class="tcal" style="font-family: Cambria; color: #000000"></td>



		<td style="width: 157px; height: 29px;" class="auto-style23">



		&nbsp;</td>



		<td style="width: 157px; height: 29px;" class="auto-style23">







		&nbsp;</td>



		<td style="width: 157px; height: 29px;" class="auto-style23">



		&nbsp;</td>



		<td style="width: 115px; height: 29px;" class="auto-style23">



		&nbsp;</td>



		<td style="width: 158px; height: 29px;" class="auto-style23">



		&nbsp;</td>



	</tr>



	<tr>

		<br class="auto-style23">

		<td style="width: 157px; height: 29px;">



		<span class="style6">Select Department</span></td>



		

		

		<td style="width: 157px; height: 29px;">



		<select name="cboEmployee" id="cboEmployee" style="height: 22px" class="auto-style23">
		<option selected="" value="All">All</option>
		<?php
		while($row1 = mysql_fetch_row($rsEmp))
		{
					$Department=$row1[0];					
		?>
		<option value="<?php echo $Department; ?>"><?php echo $Department; ?></option>
		<?php
		}
		?>

		</select><span class="auto-style23"> </span>



		</td>



		<td style="height: 29px" colspan="2">



		&nbsp;</td>



		<td style="width: 157px; height: 29px;">



		&nbsp;</td>



		<td style="width: 115px; height: 29px;">



		&nbsp;</td>



		<td style="width: 158px; height: 29px;" class="auto-style23">



		&nbsp;</td>



	</tr>


<!--
	<tr>

		<td style="width: 157px; height: 29px;">



		<span class="style6">Notice Title</span><span style="font-family: Cambria; font-weight: 700; " class="auto-style23">:</span><span class="auto-style23">
		</span>



		</td>



		

		

		<td style="height: 29px;" colspan="5">



		<input name="txtNoticetitle" style="width: 714px; height: 50px" type="text" class="auto-style23"></td>



		<td style="width: 158px; height: 29px;" class="auto-style23">



		&nbsp;</td>



	</tr>
	-->



	<tr>



		<td style="width: 157px; height: 23px;" class="style6">



		Type SMS here:</td>



		<td style="height: 23px;" colspan="6">



		<span class="auto-style23">

		<textarea name="txtNotice" id="txtNotice" style="width: 784px; height: 92px;" onkeyup="Javascript:DisplayMessageDetail();"></textarea>
		
		
		</span>
		
		

		</td>



	</tr>



	<tr>



		<td style="width: 157px; height: 23px;" class="style6">



		&nbsp;</td>



		<td style="height: 23px;" colspan="6" id="MsgDetail">
		</td>



	</tr>



	<tr>



		<td style="height: 29px;" class="style5" colspan="7">



		<strong>



		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" class="auto-style1"></strong></td>

<?php



//***********SENDING GCM**************

		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Notice'";

   		$reslt = mysql_query($ssqlActivity , $con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		

		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `sclass`='$Class'";

   		$result = mysql_query($ssqlGCM , $con);

    while($row = mysql_fetch_assoc($result))

	   {

	   		$registrationIDs = $row['GCMAccountId'];

		    

		    $url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;



		    

		    

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



	?>



	</tr>



	</form>



</table><br class="auto-style23"></br>	


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>
</body>







</html>