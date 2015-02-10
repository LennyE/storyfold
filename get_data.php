<?php

$id = $_COOKIE["currentID"];

$filepath = 'stories/'.$id.'.txt';

if (file_exists($filepath)) {

  $lastmodif = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
  $currentmodif = filemtime($filepath);
  
  while($currentmodif <= $lastmodif){
/*     usleep(10000); */
    sleep(1);
    clearstatcache();
    $currentmodif = filemtime($filepath);
  }
  
	// Get last five words of .txt file  
	$filecontent = file_get_contents($filepath);
	/* $code = ('This is a test to see what happens'); */
	/* $code = ('ett två tre fyra fem sex sju'); */
	$filecontent_exploded = explode(' ', $filecontent);
	$lastfive = join(" ", array_slice($filecontent_exploded, -6, 6)); // ending space will count as a word (see $correctedtext in data.php)

  $response = array();
/*   $response['data'] = file_get_contents($filepath); */
  $response['data'] = $lastfive;
  $response['timestamp'] = $currentmodif;

  echo json_encode($response);
  
}

// if no .txt file exists (new round), send an "empty" timestamp
// it ain't pretty, but it works
else{

  $lastmodif = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
  $currentmodif = filemtime($filepath);
  
  while($currentmodif <= $lastmodif){
/*     usleep(10000); */
    sleep(1);
    clearstatcache();
    $currentmodif = filemtime($filepath);
  }

  $response = array();
/*   $response['data'] = file_get_contents($filepath); */
  $response['data'] = 'none';
  $response['timestamp'] = 'none';

  echo json_encode($response);


	// if file doesn't exist
	echo('nada data, son.');
}
?>