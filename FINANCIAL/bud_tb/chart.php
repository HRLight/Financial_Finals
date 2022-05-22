<?php
$con4  = mysqli_connect("localhost","root","","fnc_management");
 if (!$con4) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM `fnc_budget_allo`";
         $result = mysqli_query($con4,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
             $dataPoints = array(array("label"=> $row['department'], "y"=>  $row['amount']));
            $department[]  = $row['department'];
            $remaining[] = $row['amount'];
              $allocated[] = $row['remaining_budget'];
        }
 }
?>


<?php
 

$dataPoints = array(
	array("label"=>  $department, "y"=> $remaining));
	

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