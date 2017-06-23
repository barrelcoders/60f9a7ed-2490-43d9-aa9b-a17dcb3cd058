<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php
$rsSubject=mysql_query("select distinct `Subject` from `reportcard_indicators_1to5`");
$rsExamType=mysql_query("select distinct `TestType` from `reportcard_indicators_1to5`");
?>

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	border-style: solid;
	border-width: 1px;
}
.style2 {
	font-family: Cambria;
}
</style>

</head>

<script type="text/javascript">
    window.load = function(){
        location.href=document.getElementById("selectbox").value;
    }       
</script>
<script language="javascript">
function fnlFillClass()
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
			        	//rows=rows.substr(3,rows.length);
			        	//alert(rows);
			        	
			        	removeAllOptions(document.frmIndicator.cboClass1);
			        	 
			        	//document.getElementById("txtStudentName").value="";
			        	addOption(document.frmIndicator.cboClass1,"Select One","Select One")
			        	arr_row=rows.split(',');
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmIndicator.cboClass1,arr_row[row_count],arr_row[row_count])			        			 
			        	}
			        	//alert(rows);														
			        }
		      }

			var submiturl="GetClassWithSection.php?Class=" + document.getElementById("cboClass").value + "";
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
function fnlRedirect()
{
	
		if(document.getElementById("cboClass1").value=="Select One")
		{
			//document.getElementById("SelectSubject").value="Select Subject";
			alert("Please select Class!");
			return;
		}
		if(document.getElementById("selectSubject").value=="Select Subject")
		{
			//document.getElementById("SelectSubject").value="Select Subject";
			alert("Please select Subject!");
			return;
		}
		if(document.getElementById("cboExamType").value=="Select Exam Type")
		{
		alert("Please select exam type");
		return;
		}
					
				location.href = "frmSubjectWiseUpload_bulk.php?Class=" + document.getElementById("cboClass1").value + "&Subject=" + escape(document.getElementById("selectSubject").value) + "&txtTestType=" + escape(document.getElementById("cboExamType").value);
		
}
</script>
<body>


<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><b>Upload Student Report Card</b></font></p>
<p>&nbsp;</p>


<table style="width: 1327px; border-collapse:collapse" cellpadding="0" class="style1">
	<tr>
		<td style="border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" colspan="9">
		&nbsp;</td>
	</tr>	
	
	<form name="frmIndicator" id="frmIndicator" method="post" action="">
	<tr>
		<td style="width =147px; border-top-style:none; border-top-width:medium" align="left" bgcolor="#339933">
		<p style="text-align: right"><font face="Cambria" color="#FFFFFF"><strong>
		Select Class&nbsp;&nbsp;&nbsp;&nbsp; </strong></font></td>
		<td width="147" style="border-top-style: none; border-top-width: medium" align="left" bgcolor="#339933">
		<font face="Cambria">
		
		<select id="cboClass" name="cboClass" class="text-box" value= "Select Class" style="font-weight: 700" size="1" onchange="javascript:fnlFillClass();">
		
		<option selected value="Select Class">Select Class</option>
				<option value="NURSERY">NURSERY</option>
		<option value="K.G.">K.G.</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select></font></td>
		
		 
    
    
		<td width="147" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		<p align="right">
		<font face="Cambria" color="#FFFFFF"><strong>Select Section&nbsp;&nbsp;&nbsp;&nbsp; </strong></font></td>
		
		 
    
    
		<td style="border-top-style: none; border-top-width: medium; width: 147px;" align="center" bgcolor="#339933">
		
			<font face="Cambria">
		
			<select name="cboClass1" id="cboClass1" class="text-box">
			<option value="Select One">Select One</option>
			</select>
		</font>
		</td>
		
		 
    
    
		<td style="border-top-style: none; border-top-width: medium; width: 147px;" align="center" bgcolor="#339933">
		<p align="right">
		<b><font face="Cambria">Select Subject&nbsp;&nbsp; </font></b></td>
		
		 
    
    
		<td width="147" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		<p><font face="Cambria">
		
		<select id="selectSubject" name="selectSubject" class="text-box" value= "Select Subject" style="font-weight: 700" size="1">
		
		<option selected value="Select Subject">Select Subject</option>
		<!--<option value="Life Skills">Life Skills</option>-->
		<?php
		while($row = mysql_fetch_row($rsSubject))
		{
			$Subject=$row[0];
		?>
		<option value="<?php echo $Subject;?>"><?php echo $Subject;?></option>
		<?php
		}
		?>

		</select></font></td>
		
		 
    
    
		<td width="147" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		&nbsp;</td>
		
		 
    
    
		<td width="148" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933" class="style2">
		<b><font color="#FFFFFF">Select Exam type</font></b></td>
		
		 
    
    
		<td width="148" style="border-top-style: none; border-top-width: medium" align="center" bgcolor="#339933">
		<font face="Cambria">
		
		<select id="cboExamType" name="cboExamType" class="text-box" value= "Select Subject" onchange = "javascript:fnlRedirect();" style="font-weight: 700;">
		
		<option selected value="Select Subject">Select Exam Type</option>
		<!--<option value="Life Skills">Life Skills</option>-->
		<?php
		while($rowE = mysql_fetch_row($rsExamType))
		{
			$ExamType=$rowE[0];
		?>
		<option value="<?php echo $ExamType;?>"><?php echo $ExamType;?></option>
		<?php
		}
		?>

		</select></font></td>
		
		 
    
    
	</tr>	
	</form>
	</table>	
<font face="Cambria">	
<br><br><br>

</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>

</div>
</body>

</html>