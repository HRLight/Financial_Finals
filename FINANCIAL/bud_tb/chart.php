<?php
 
$dataPoints = array(
	array("label"=> "Total Cash", "y"=> 4500),
	array("label"=> "Total Budget", "y"=> 5000),
	array("label"=> "Accumulated Budget", "y"=> 5000),
	array("label"=> "Remaining Budget", "y"=> 4500),
	
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Budget Management Reports"
	},
	subtitles: [{
		text: "Currency Used: Philippine Peso  (P)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		
		yValueFormatString: "P#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 350px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>