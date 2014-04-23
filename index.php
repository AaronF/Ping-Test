<?php
include_once("models/config.php");



$Data = new Data;
$results = $Data->getData("Ping_Results", "*", "", "ORDER BY Date_Time DESC");
if($results == true){
    foreach($results as $key => $result){
        echo "<li>(".$result["Status"].") ".$result["Message"]." - ".date("H:i d/m/y",$result["Date_Time"])."</li>";
    }
}
?>