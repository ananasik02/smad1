<?php
$line = [
    "0.3" => 1,
    "0.31" => 1,
    "0.34" => 1,
    "0.35" => 2,
    "0.36" => 2
];

$N =0;
foreach ($line as $x=>$m){
    $N += $m;
}

//find ser stat
echo '<p>';
$serStat = 0;
foreach ($line as $x=>$m){
    $serStat += $m * $x;
}
$serStat = $serStat / $N;
echo "Середнє статистичне: " . $serStat;

//find the mode
$mode = array_keys($line,max($line));
echo '<p>';
for($i=0; $i<count($mode); $i++){
    echo '<p>';
    echo "Мода : " . $mode[$i];
}

//find mediana
echo '</p>';
$medianaArray = array_keys($line);
if(count($line) % 2 == 1){
    $medianaPosition = floor(count($line)/2);
    $mediana = $medianaArray[$medianaPosition];
}else{
    $medianaPosition = count($line)/2;
    $mediana = ($medianaArray[$medianaPosition] + $medianaArray[$medianaPosition-1])/2;
}
echo "Медіана : " . $mediana ;


//find rozmah
echo '</p>';
$rozmah = max(array_keys($line)) - min(array_keys($line));
echo "Розмах: " . $rozmah;

//find dispersion
echo '<p>';
foreach ($line as $x=>$m){
    $dis = $m * $x * $x;
}
$dis = $dis / $N;
$dis = abs($dis - $serStat * $serStat);
echo "Дисперсія: " . $dis;

//find seredne kvadratychne vidhulennia
echo '<p>';
$serKva = sqrt($dis);
echo "Середнє квадратичне відхилення: " . $serKva;

//find vypravlena dispersion
echo '<p>';
$vipDis = ( $N / ($N-1) ) * $dis;
echo "Виправлена Дисперсія : " . $vipDis;

//find vypravlene seredne kvadratychne vidhulennia
echo '<p>';
$vipSerKva = sqrt($vipDis);
echo "Виправлене середнє квадратичне відхилення: " . $vipSerKva;

//find variation
echo '<p>';
$var = $serKva / $serStat;
echo "Варіація : " . $var;

//find start moment
echo '<p>Початковий момент 0-вого порядку дорівнює 0</p>';
echo '<p>Початковий момент 1-го порядку дорівнює середньому статистичному : ' . $serStat . '</p>';
$startMoment2 = 0;
foreach ($line as $x=>$m){
    $startMoment2 += $m * $x * $x;
}
$startMoment2 = $startMoment2 / $N;
echo '<p>Початковий момент 2-го порядку дорівнює середньому статистичному : ' . $startMoment2 . '</p>';
$startMoment3 = 0;
foreach ($line as $x=>$m){
    $startMoment3 += $m * $x * $x * $x;
}
$startMoment3 = $startMoment3 / $N;
echo '<p>Початковий момент 3-го порядку дорівнює середньому статистичному : ' . $startMoment3 . '</p>';

//find central moment
echo '<p>Центральний момент 0-вого порядку дорівнює 1</p>';
echo '<p>Центральний момент 1-го порядку дорівнює 0 </p>';
echo '<p>Центральний момент 2-го порядку дорівнює середньому статистичному : ' . $serStat . '</p>';
$centralMoment3 = 0;
foreach ($line as $x=>$m){
    $centralMoment3 += $m * pow(($x - $serStat), 3);
}
$centralMoment3 = $centralMoment3 / $N;
echo '<p>Центральний момент 3-го порядку дорівнює середньому статистичному : ' . $centralMoment3 . '</p>';
foreach ($line as $x=>$m){
    $centralMoment4 += $m * pow(($x - $serStat), 4);
}
$centralMoment4 = $centralMoment4 / $N;
echo '<p>Центральний момент 4-го порядку дорівнює середньому статистичному : ' . $centralMoment4 . '</p>';

//asymmetria
$as = $centralMoment3 / pow($serKva, 3);
echo '<p>Асиметрія : ' . $as . '</p>' ;

//eksces
$eksces = $centralMoment4 / pow($serKva, 4);
echo '<p>Ексцес : ' . $eksces . '</p>';

//poligon
$dataPoints = array(
    array("label"=> 0.3, "y"=> 1),
    array("label"=> 0.31, "y"=> 1),
    array("label"=> 0.34, "y"=> 1),
    array("label"=> 0.35, "y"=> 2),
    array("label"=> 0.36, "y"=> 2),
);
?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Полігон частот"
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

