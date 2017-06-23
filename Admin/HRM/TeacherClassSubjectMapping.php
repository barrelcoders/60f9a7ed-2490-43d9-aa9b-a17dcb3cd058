<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<script src="jquery.min.js"></script>



<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<title>Teacher Class Subject Mapping</title>

<style>

#username {

    color: #000000;

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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}


</style>

</head>



<body>

<form action="" method="post" id="form">



<div align="center">



<table style="border:1px solid #000000; width:100%; border-collapse:collapse"   cellpadding="0">

	<tr> <td style="padding:0px 0px 0px 0x">    

                 <font face="Cambria">Date-Month<input type="month" name="month" id="month"> 
					</font> </td>

		<td style="padding:0px 0px 0px 450px"><font face="Cambria">Class:<select  name="selectclass" style="width:150px;height:25px" required>

								<option value="-1" selected>Select..</option>

								<option value="P.NURSERY">P.NURSERY</option>

                                <option value="NURSERYA">NURSERY A</option>

                                <option value="NURSERYB">NURSERY B</option>

                                <option value="NURSERYC">NURSERY C</option>

                                <option value="NURSERYD">NURSERY D</option>

                                <option value="K.G.A">K.G.A</option>

							    <option value="K.G.B">K.G.B</option>

								<option value="K.G.C">K.G.C</option>

								<option value="K.G.D">K.G.D</option>

								<option value="K.G.E">K.G.E</option>

								<option value="1A">1A</option>

								<option value="1B">1B</option>

								<option value="1C">1C</option>

								<option value="1D">1D</option>

								<option value="2A">2A</option>

								<option value="2B">2B</option>

								<option value="3A">3A</option>

								<option value="3B">3B</option>

								<option value="4A">4A</option>

								<option value="4B">4B</option>

								<option value="5A">5A</option>

								<option value="5B">5B</option>

								<option value="6A">6A</option>

								<option value="6B">6B</option>

								<option value="7A">7A</option>

								<option value="7B">7B</option>

								<option value="8A">8A</option>

								<option value="8B">8B</option>

								<option value="9A">9A</option>

								<option value="9B">9B</option>

               </select><input type="submit" value="Submit"  name="butt" style="font-weight: 700" />
		</font>

           </td>

          

		

       

	</tr>

</table>





</div>
<div align="center">





<table style="border:1px solid #000000; width:100%; height:auto ; border-collapse:collapse"   cellpadding="0"	>

	<tr>

		<td align="center"><font face="Cambria"><a href="#">
		<span style="text-decoration: none">Upload Teacher Time Table</span></a></font></td>

		<td align="center"><font face="Cambria"><a href="#">
		<span style="text-decoration: none">View previous Teacher Time Table</span></a> 
		</font> </td>

		

	</tr>

</table>



</div>



<table style="width:100%; height:auto;"   cellpadding="0" cellspacing="0" align="center" >








<?php



			$result=mysql_query("SELECT * FROM   teacher_mapping1");

			$i=1;

			echo " <tr bgcolor='yellow'><td style='padding:0px 0px 0px 25px;'><b>EMPID</b></td><td style='padding:0px 0px 0px 55px;'><b>CLASS</b></td><td style='padding:0px 0px 0px 55px;'><b>SUBJECTS</b></td><td style='padding:0px 0px 0px 25px;'><b>Hr.Min.</b></td></tr>";

			while($test = mysql_fetch_array($result))

			{

			

			    echo " <tr bgcolor='blue'>

				<td><input type='text' name='EmpID'". $i."  value='".$test['EmpID']."' readonly style='background-color: #FFFFFF; color: #FFFFFF; text-align:center;'/></td>

				

				<td><input  type='text' name='Class'". $i." value='".$test['Class']."' readonly style='background-color: #FFFFFF; color: #FFFFFF; text-align:center;'/>   </td>

				

				<td><input  type='text' name='Subject'". $i." value='".$test['Subject']."' style='background-color: #FFFFFF; color: #FFFFFF; text-align:center;' readonly/>  </td>     				      

		

		<td><select  name='Time' style='width:50px;height:25px' required>

								<option value=''>Hr.</option><option value=''>6</option><option value=''>7</option><option value=''>8</option><option value=''>9</option><option value=''>6</option><option value=''>10</option><option value=''>11</option><option value=''>12</option><option value=''>13</option><option value=''>14</option><option value=''>15</option>

				  </select>

							

                  <select  name='Time' style='width:50px;height:25px' required>

								<option value=''>Min.</option>

								<<option value=''>1</option><option value=''>2</option><option value=''>3</option><option value=''>4</option><option value=''>5</option><option value=''>6</option><option value=''>7</option><option value=''>8</option><option value=''>9</option><option value=''>10</option><option value=''>11</option><option value=''>12</option><option value=''>13</option><option value=''>14</option><option value=''>15</option><option value=''>16</option><option value=''>17</option><option value=''>18</option><option value=''>19</option><option value=''>20</option><option value=''>21</option><option value=''>22</option><option value=''>23</option><option value=''>24</option><option value=''>25</option><option value=''>26</option><option value=''>27</option><option value=''>28</option><option value=''>29</option><option value=''>30</option><option value=''>31</option><option value=''>32</option><option value=''>33</option><option value=''>34</option><option value=''>35</option><option value=''>36</option><option value=''>37</option><option value=''>38</option><option value=''>39</option><option value=''>40</option><option value=''>41</option><option value=''>42</option><option value=''>43</option><option value=''>44</option><option value=''>45</option><option value=''>46</option><option value=''>47</option><option value=''>48</option><option value=''>49</option><option value=''>50</option><option value=''>51</option><option value=''>52</option><option value=''>53</option><option value=''>54</option><option value=''>55</option><option value=''>56</option><option value=''>57</option><option value=''>58</option><option value=''>59</option><option value=''>60</option>

								

								</select>

								</td></tr>";

				

				

				

			

			$i=$i+1;

				

			}

			

	

?>





</table>

<div align="center">

<table style="border:1px solid #000000; width:100%; border-collapse:collapse"   cellpadding="0">

  <tr>

    <td align="center"><font face="Cambria"><input name="Submit1" type="submit"  value="Submit" /></font></td>

  </tr>

</table>





</div>





</form>

<font face="Cambria">

<?php 

		









?>

</font>

<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>
</body>

</html>
