<?php

include("apiKey.php");

if (!isset($_GET['id']) || strlen($_GET['id']) !== 11) {
  echo json_encode((object) [
    "status" => "400",
    "description" => "YouTube user's ID was not valid"
  ]);
} else {
  
  $ytid = $_GET['id'];
  
  function warning_handler($errno, $errstr) { 
    echo json_encode((object) ["error" => "YouTube API Error(s)", "viewers" => 0]);
    exit();
  }
  
  set_error_handler("warning_handler", E_WARNING);
  
  $apiResponse = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=liveStreamingDetails&id=${ytid}&fields=items%2FliveStreamingDetails%2FconcurrentViewers&key=${apiKey}");
  
  restore_error_handler();  
  
  //$apiResponse = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=liveStreamingDetails&id=${ytid}&key=${apiKey}");
  //$apiResponse = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=${ytid}&key=${apiKey}");
  
  $json = json_decode($apiResponse);
  
  if (isset($json->items[0]->liveStreamingDetails->concurrentViewers)) {
    $viewers = $json->items[0]->liveStreamingDetails->concurrentViewers;
  } else {
    $viewers = 0;
  }
  //return JSON response
  echo json_encode((object) ["viewers" => $viewers]);
  
  //var_dump( $json );
}