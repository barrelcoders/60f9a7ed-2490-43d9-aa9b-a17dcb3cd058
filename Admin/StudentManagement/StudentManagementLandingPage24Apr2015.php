<?php 
	include '../../connection.php'; 
	include '../Header/Header3.php';
	 $query = "SELECT DISTINCT  `MasterClass` , COUNT(*) as `cnt`  FROM  `student_master` GROUP BY  `MasterClass`";
     $result= mysql_query($query);
	?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<html>
<head>

<style>

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
<script type="text/javascript">
      google.load("visualization", "1", {packages:["bar"]});
      google.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Class', 'Student Strength'],
          <?php
                    //while( $row = $result->fetch_assoc())
                    while($row = mysql_fetch_row($result))
					{
                        //extract($row);
                        $MasterClass=$row[0];
                        $cnt=$row[1];
                        //echo "['{$name}', {$ratings}],";
                        echo "['{$MasterClass}', {$cnt}],";
                    }
                    ?>
        ]);

        var options = {
          width: 900,
          chart: {
            title: 'New Student Count',
            subtitle: 'Student Class on the left, Strength on the right'
          },
          //bars: 'horizontal', // Required for Material Bar Charts.
          bars: 'vertical', // Required for Material Bar Charts.
          vAxis: {title: "Class"},
      hAxis: {title: "Strength"},
          animation:{duration: 0,easing: 'inAndOut'}
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>	
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Management Landing Page</title>

</head>

<body background="../images/logo.png" repeat=No-repeat>


<div style="position: absolute; width: 100%; height: 26px; z-index: 1; left: 1px; top: 126px; background-color: #48AC2E" id="layer8">
	<b><font color="#FFFFFF" face="Cambria" size="3">New Studetn Count : </font></b></div>

<div id="dual_x_div" style="width: 900px; height: 500px;"></div>
<div class="footer" align="center" width=100%>

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

</body>

</html>