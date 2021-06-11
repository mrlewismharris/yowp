<?php

include("apiKey.php");

if (!isset($_GET['id']) || strlen($_GET['id']) !== 24) {
  echo json_encode((object) [
    "status" => "400",
    "description" => "YouTube user's ID was not valid"
  ]);
} else {
  
  $ytid = $_GET['id'];
  
  
  function warning_handler($errno, $errstr) { 
    echo json_encode((object) ["error" => "YouTube API Error(s)", "live" => true, "streamId" => "null"]);
    exit();
  }
  
  set_error_handler("warning_handler", E_WARNING);
  
  $apiResponse = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={$ytid}&type=video&eventType=live&fields=items%2Fid%2FvideoId&key={$apiKey}"));
  
  restore_error_handler(); 
  
  $return['live'] = false;
  
  if ($apiResponse !== null) {
    $return['live'] = true;
    $return['streamId'] = $apiResponse->items[0]->id->videoId;
  }
  
  //return JSON response
  echo json_encode((object) $return);
}