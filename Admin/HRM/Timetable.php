<?php
include '../../connection.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Time table</title>
<style type="text/css">

.container
{
	
	
	
	
	margin:auto;
	border:groove;
	width:auto;
}


.wrapper
{
	
	
	border-color:#CC3300;
	border-left:solid;
	border-width:1px;
	border-right:solid;
	border-width:1px;
	margin:10px 10px;
	margin-top:10px;
}
.top
{
background-color:#CC3300;
height:20px;

font-size:18px;

}
.reset
{
	border:none; 
	background-color:transparent; 
	color:red;
	margin-left:1000px;
	margin-top:-15px;
}
.nc
{
	margin-left:4px;
}
.mspace
{
padding-left:80px;
padding-right:50px;
}

#mspace1
{
padding-top:25px;
}
.min
{
	font-size:12px;
}

.td
{
	
	border:solid;
	border-width:2px;
	width:100px;
	margin:auto;
	padding:4px;
	
	
	
}
.center
{
	margin:auto;
}
#back
{
	background-color:#76C9F5;
}

.days
{
	margin-top:-15px;
	margin-left:0px;
}
.period
{
	margin-bottom:1.5px;
	margin-left:0px;
}
.da
{
	margin-left:-70px;
	margin-top:-22px;
}
.rarrow
{
margin-top:-13px;
margin-left:50px;
margin-bottom:-7px;
}
.darrow
{
	margin-top:-28px;
	margin-left:-32px;
}
</style>
</head>

<body>

<div class="container">
	<div class="wrapper">
    <form method="post">
     <div class="top">
       <b> TIME TABLE</b>   
     </div>
    <div class="nc">
    <span ><b> Class : &nbsp;&nbsp;&nbsp;</b>
	      <select name="itemcate" id="textbasic"  class="auto-style35" style="height: 22px";>
                        <option selected="" value="Select One">Select One</option>
                        <?php
                           $ssqlclass="SELECT distinct `class` FROM `class_master`";
                           $rsclass= mysql_query($ssqlclass);
                           
                           while($row1 = mysql_fetch_row($rsclass))
                           {
                           		$class=$row1[0];
                           ?>
                        <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                        <?php 
                           }
                           ?>
                     </select>
	</span>
    <span> <input type="reset" class="reset" /></span>
    
 
    
    <table>
    
    <tr>
    <td width="171" id="mspace1">Timings:</td>
    <td width="180" class="mspace"id="mspace1">Start Time</td>
    <td width="279" id="mspace1"><input type="text" name="ss" /><br /><span class="min">(H : M &nbsp;meridiem)</span></td>
    <td width="303" class="mspace" id="mspace1" >Number of Periods</td>
    <td width="243" id="mspace1"><input type="text" name="ptime" /></td><td width="56"></td>
    </tr>
    
    
    <tr>
    <td id="mspace1">Break( 1 ):</td>
    <td class="mspace"id="mspace1">Time Duration</td>
    <td id="mspace1"><input type="text" name="btime1" /><span class="min">Min</span></td>
    <td id="mspace1" class="mspace" >Break after Period </td>
    <td id="mspace1"><input type="text" name="bptime1" /></td></td>
    </tr>
    
    
    <tr>
    <td id="mspace1">Break( 2 ):</td>
    <td class="mspace"id="mspace1">Time Duration</td>
    <td id="mspace1"><input type="text" name="btime2" /><span class="min">Min</span></td>
    <td id="mspace1" class="mspace" >Break after Period</td>
    <td id="mspace1"><input type="text" name="bptime2" /></td></td>
    </tr>
    
   
   
    <tr>
    <td height="63" id="mspace1">Each Period Duration:</td>
    <td class="mspace"id="mspace1"></td>
    <td id="mspace1"><input type="number" name="epd" /><span class="min">Min</span></td>
   
   

    </tr>
    
    </table>
	
    <table align="center">
	
	   <tr>
             <td><input type="submit" name="sub" /></td>
	   </tr>
	</table>
    </form>

    <br />
    <br />
 


<?php

if(isset($_POST['sub']))
{
	$bptime1=$_POST['bptime1'];
	$period=$_POST['ptime'];
	$stime=$_POST['ss'];
	$epd=$_POST['epd'];
	$bptime2=$_POST['bptime2'];
	
	 
     	
	if($period>=$bptime1)
	{
		if($period>=$bptime2)
		{				
			echo'<table border="2" bordercolor="#000000" style="border-collapse:collapse;" cellpadding="5" align="center">';		

#################################################### START FOR BREAK1 #############################################################################		
			
			if($bptime1 != 0 && $bptime2 == 0)
			{
			for($i=1;$i<=7;$i++)
				{
					echo'<tr>';
		######################################################### Start side heading #########################################################					
					for($Z=1;$Z<2;$Z++)
					{
						
						if($i==1 && $Z<2)
						{
							if($i==1 && $Z==1)
														
								echo'<td style="width="130px">
									 <center>
									 <p class="period">Period</p> 
									 <p class="rarrow"> &rarr; </p> 
									 <canvas id="myCanvas" width="120" height="30" style="class="days" ></canvas>
									 <p class="da">Days</p> <p class="darrow"> <b> &darr; </b></p>
					   				 </center>
									 </td>';
							else					
								echo'<td >time</td>';							
						}
						
						else if($i<=7 && $Z==1)
						{
							if($i==2 && $Z==1)
					
								
								echo'<td  style="border:none;">MONDAY</td>';
								
								else if($i==3 && $Z==1)
								echo'<td  style="border:none;">TUESDAY</td>';
								
								else if($i==4 && $Z==1)
								echo'<td  style="border:none;">WEDNESDAY</td>';
								
								else if($i==5 && $Z==1)
								echo'<td  style="border:none;">THURSDAY</td>';
								
								else if($i==6 && $Z==1)
								echo'<td  style="border:none;">FRIDAY</td>';
								
								else if($i==7 && $Z==1)
								echo'<td  style="border:none;">SATURDAY</td>';	
						}
						
						
					}
		######################################################### End side heading #########################################################					
					for($j=1;$j<=$bptime1;$j++)
					{
						if($i==1 && $j<=$bptime1)
						{
							echo"<td><center>";
							echo"</center></td>";
						}
						else
						{	
						 echo'<td><select>
								   <option value="1">SCIENCE</option>
								   <option value="2">MATH</option>
								  </select><br /><br>
								  <select>
									<option value="1">SURESH</option>
									<option value="2">RAM</option>
							      </select>
							  </td>';
						}
		
					}
					
		####################################################### Start break ####################################################################					
					if($bptime1 !=0)
					{
						if($i==4 || $j==$bptime1)
					     echo'<td style="background-color:#CC3300; border:none;">Break</td>';
						else
						 echo'<td  style="background-color:#CC3300;border:none;"></td>';
					}
					
		####################################################### End break ####################################################################					
					 $t=$period-$bptime1;
		################################################## Start period after break ###########################################################					 
					for($k=1;$k<=$t;$k++)
					{
						if($i==1 && $k<=$t)
						{
							echo"<td><center>";
							echo"</center></td>";
						}
						else
						{	
						 echo'<td><select>
								   <option value="1">SCIENCE</option>
								   <option value="2">MATH</option>
								  </select><br /><br>
								  <select>
									<option value="1">SURESH</option>
									<option value="2">RAM</option>
							      </select>
							  </td>';
						}
					}

		################################################## End period after break ###########################################################					
			
				}		
			}
#################################################### END FOR BREAK1 #############################################################################				
			

#################################################### START FOR BREAK2 #############################################################################
			
			else if($bptime1 == 0 && $bptime2 != 0)
			{
				for($i=1;$i<=7;$i++)
				{
					echo'<tr>';
		######################################################### Start side heading #########################################################					
					for($Z=1;$Z<2;$Z++)
					{
						
						if($i==1 && $Z<2)
						{
							if($i==1 && $Z==1)
														
								echo'<td style="background-color:#0B94B0;" width="130px">
									 <center>
									 <p class="period">Period</p> 
									 <p class="rarrow"> &rarr; </p> 
									 <canvas id="myCanvas" width="120" height="30" style="border:none #d3d3d3; " class="days" ></canvas>
									 <p class="da">Days</p> <p class="darrow"> <b> &darr; </b></p>
					   				 </center>
									 </td>';
							else					
								echo'<td style=\"background-color:#0B94B0\">time</td>';							
						}
						
						else if($i<=7 && $Z==1)
						{
							if($i==2 && $Z==1)
					
								
								echo'<td  style="background-color:#0B94B0; border:none;">MONDAY</td>';
								
								else if($i==3 && $Z==1)
								echo'<td  style="background-color:#0B94B0; border:none;">TUESDAY</td>';
								
								else if($i==4 && $Z==1)
								echo'<td  style="background-color:#0B94B0; border:none;">WEDNESDAY</td>';
								
								else if($i==5 && $Z==1)
								echo'<td  style="background-color:#0B94B0; border:none;">THURSDAY</td>';
								
								else if($i==6 && $Z==1)
								echo'<td  style="background-color:#0B94B0; border:none;">FRIDAY</td>';
								
								else if($i==7 && $Z==1)
								echo'<td  style="background-color:#0B94B0; border:none;">SATURDAY</td>';	
						}
						
						
					}
		######################################################### End side heading #########################################################					
					for($j=1;$j<=$bptime2;$j++)
					{
						if($i==1 && $j<=$bptime2)
						{
							echo"<td style=\"background-color:#0B94B0\"><center>";
							echo"</center></td>";
						}
						else
						{	
						 echo'<td><select>
								   <option value="1">SCIENCE</option>
								   <option value="2">MATH</option>
								  </select><br /><br>
								  <select>
									<option value="1">SURESH</option>
									<option value="2">RAM</option>
							      </select>
							  </td>';
						}
		
					}
					
		####################################################### Start break ####################################################################					
					if($bptime2 !=0)
					{
						if($i==4 || $j==$bptime2)
					     echo'<td style="background-color:#0B94B0; border:none;">break</td>';
						else
						 echo'<td  style="background-color:#0B94B0;border:none;"></td>';
					}
					
	################################################ End break ####################################################################					
					 $t1=$period-$bptime2;
	###################################### Start period after break ####################################################################					 
					for($k=1;$k<=$t1;$k++)
					{
						if($i==1 && $k<=$t1)
						{
							echo"<td style=\"background-color:#0B94B0\"><center>";
							echo"</center></td>";
						}
						else
						{	
						 echo'<td><select>
								   <option value="1">SCIENCE</option>
								   <option value="2">MATH</option>
								  </select><br /><br>
								  <select>
									<option value="1">SURESH</option>
									<option value="2">RAM</option>
							      </select>
							  </td>';
						}
						
					}

		################################################## End period after break ###############################################################					
			
				}
			}
			
			
############################################## END FOR BREAK2 #####################################################################################

#################################################### START FOR BOTH BREAK  ########################################################################			
			else if($bptime1 != 0 && $bptime2 != 0)
			{
				echo"h3";
			}
			
#################################################### END FOR BOTH BREAK  #########################################################################			
	
#################################################### START FOR NO BREAK  #########################################################################
			
			else
			{
				echo'';
			}
			
#################################################### END FOR NO BREAK  ###########################################################################			
			
		}
		else
		{
			echo'<h2>OOPs! you have entered Wrong input</h2>';		 
		}
	}
	else
	{
		echo'<h2>OOPs! you have entered Wrong input</h2>';
	}

				
}


?>

<script>

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.moveTo(0, 0);
ctx.lineTo(300, 100);
ctx.stroke();

</script>

</body>
</html>