<?php

//komylat


 $dataPoints = array(
    array("x" => 0.3, "y" => 1),
    array("x" => 0.31, "y" => 2),
    array("x" => 0.34, "y" => 3),
    array("x" => 0.35, "y" => 5),
    array("x" => 0.36, "y" => 7)
 );


 ?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Комулятивна крива за нагромадженими частотами"
                },
                data: [{
                    type: "line",
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

