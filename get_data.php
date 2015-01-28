<?php

$id = $_COOKIE["currentID"];

$filepath = 'stories/'.$id.'.txt';


if (file_exists($filepath)) {

/*   $file = dirname(__FILE__).'stories/'.$qwe.'.txt'; */
/*   $file = 'stories/'. $id .'.txt'; */
  $lastmodif = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
  $currentmodif = filemtime($filepath);
  
  while($currentmodif <= $lastmodif){
    usleep(10000);
    clearstatcache();
    $currentmodif = filemtime($filepath);
  }
  
  $response = array();
  $response['data'] = file_get_contents($filepath);
  $response['timestamp'] = $currentmodif;
  
  echo json_encode($response);
  
}

else{
	// if file doesn't exist
	echo('nada data, son.');
}
?>