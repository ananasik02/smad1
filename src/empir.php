<?php

$dataPoints = array(
	array("y"=> 0, "label"=> "0"),
	array("y"=> 1/7, "label"=> "0.31"),
	array("y"=> 2/7, "label"=> "0.34"),
	array("y"=> 3/7, "label"=> "0.35"),
	array("y"=> 5/7, "label"=> "0.36"),
	array("y"=> 5/7, "label"=> "0.36")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Емпірична функція розподілу"
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "stepLine",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>