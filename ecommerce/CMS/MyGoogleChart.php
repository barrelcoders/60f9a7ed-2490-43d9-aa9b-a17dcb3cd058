<?php
session_start();
include '../../connection.php';
?>
<?php
$rsChart=mysql_query("SELECT DISTINCT  `DateOfPurchase` , COUNT( * ) FROM  `Commerce_Order_temp` GROUP BY  `DateOfPurchase` ORDER BY  `DateOfPurchase`");
$strData="[";
while($row=mysql_fetch_row($rsChart))
{
	$DateOfPurchase=$row[0];
	$timestamp = strtotime($DateOfPurchase);
	$Day=date("d", $timestamp);
	$Mnth=date("m", $timestamp);
	$Yr=date("Y", $timestamp);
	$DateOfPurchase="new Date(".$Yr.",".$Mnth.",".$Day.")";
	$SalesCount=$row[1];
	$strData=$strData."[".$DateOfPurchase.",".$SalesCount."]".",";
}
$strData= substr($strData,0,strlen($strData)-1);
$strData=$strData."]";

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
<input type="hidden" name="DataRow" id="DataRow" value="<?php echo $strData;?>">
<div id="chart_div" style="width:50%"></div>
</body>

</html>
<script language="javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
	  var Data=document.getElementById("DataRow").value;
	  //alert(Data);
      var data = new google.visualization.DataTable();

      data.addColumn('date', 'X');
      data.addColumn('number', 'Sales Count');

      /*
      data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
      ]);
      */
	 data.addRows(<?php echo $strData;?>);
      var options = {
        hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: 'Sales'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>