<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <?php 
	include '../../connection.php'; 
	include '../Header/Header3.php';
	 $query = "SELECT DISTINCT  `MasterClass` , COUNT(*) as `cnt`  FROM  `student_master` GROUP BY  `MasterClass`";
     $result= mysql_query($query);
	?>	

    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
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
            title: 'Student Count',
            subtitle: 'Student Class on the left, Strength on the right'
          },
          //bars: 'horizontal', // Required for Material Bar Charts.
          bars: 'vertical', // Required for Material Bar Charts.
          vAxis: {title: "Class"},
      hAxis: {title: "Strength"},
          series: {
            0: { axis: 'Class' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'StudentStrength' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              Class: {label: 'Student Strength'}, // Bottom x-axis.
              StudentStrength: {side: 'left', label: 'apparent magnitude'} // Top x-axis.
            }
          },
          animation:{
        duration: 1000,
        easing: 'out'
      }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="dual_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>