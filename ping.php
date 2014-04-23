<?php
include_once("models/config.php");



$Data = new Data;
$initialping = pingDomain("http://aaronfisher.co");
if($initialping==true){
    //connection available
    $Data->insertData("Ping_Results", "", array("Status"=>1, "Message"=>"First site up, connection OK.", "Date_Time"=>time()));
} else if($initialping==false) {
    //site might be down, check another
    $secondping = pingDomain("http://raktronics.com");
    if($secondping==true){
        //connection is fine, fist site is down
        $Data->insertData("Ping_Results", "", array("Status"=>2, "Message"=>"First site down, second site up, connection OK.", "Date_Time"=>time()));
    } else {
        //connection is down
        $Data->insertData("Ping_Results", "", array("Status"=>3, "Message"=>"Both sites down, connection down.", "Date_Time"=>time()));
    }

}
?>