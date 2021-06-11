<?php 

try {
  exec("powercfg /batteryreport /output battery.html");
} catch (Exception $e) {
  return null;
}


$batt = file_get_contents("battery.html");
$recent = explode("<h2>Recent usage</h2>", $batt);
$recent = explode("<h2>Battery usage</h2>", $recent[1]);
$explodedTable = explode("<tr", $recent[0]);
$latestRow = $explodedTable[sizeof($explodedTable)-1];
$time = explode("</span>", explode('class="time">', $latestRow)[1])[0];
$battery = trim(explode("</td>", explode('class="acdc">', $latestRow)[1])[0]);
$percent = trim(explode("</td>", explode('class="percent">', $latestRow)[1])[0]);
$percent = intval(explode(" %", $percent)[0]);
if ($battery == "Battery") {$battery = true;} else {$battery = false;}

echo json_encode((object) ["time" => $time, "battery" => $battery, "percentage" => $percent]);