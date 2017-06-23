<?php 
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Pie Chart Demo (Google VAPI) - http://codeofaninja.com/</title>
    </head>
    
<body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 400px;"></div>
 
    <?php
 
    //include database connection
    //include 'db_connect.php';
 
    //query all records from the database
    //$query = "select * from programming_languages";
    $query = "SELECT DISTINCT  `MasterClass` , COUNT(*) as `cnt`  FROM  `student_master` GROUP BY  `MasterClass`";
 
    //execute the query
    //$result = $mysqli->query( $query );
    $result= mysql_query($query);
 
    //get number of rows returned
    //$num_results = $result->num_rows;
 
    if(mysql_num_rows($result)>0)
    {
    			
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
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
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Tiobe Top Programming Languages for June 2012"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No programming languages found in the database.";
    }
    ?>
    
</body>
</html>