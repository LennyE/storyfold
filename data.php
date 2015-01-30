<?php

$str = "I am sam, the great manchild";
echo ($str);
$words = str_word_count($str, 1);

/*
$firstWords = array_slice($words, 0,5);
$lastWords = array_slice($words, -5,5);
*/

print_r($firstWords);
print_r($lastWords);

echo ('<br>');

/* echo $lastWords[4]; */
$first = join(" ", array_slice($words, 0, 5));
$last = join(" ", array_slice($words, -5, 5));
echo($first);
echo ('<br>');
echo($last);

echo ('<hr>');

// convert potential malicious characters to html
$textcontent = htmlspecialchars($_POST["content-submit"]);

$filepath = 'stories/'.$id.'.txt';


// use a javascript button to avoid opening the new session in a new tab (prevent $id bug)
	// skulle eventuellt kunna använda en vanlig href tillsammans med knappen
echo ('
	<button onclick="newsession()">Start new</button> | 
	<script>
	function newsession() {
	     newWindow = window.open("index.php?id='.substr( md5(rand()), 0, 7).'", "_self");
	}
	</script>
');	
/* echo ('<a target="_self" href="index.php?id='.substr( md5(rand()), 0, 7).'">Start new</a> | '); */
/* echo ('<a href="index.php?id='.$id.'">current id: '.$id.'</a> | '); */
echo ('<a href="" onclick="location.reload();">current id: '.$id.'</a> | ');
echo ('<a href="stories/'.$id.'.txt">View whole story</a><hr>');
/* print_r($_SESSION); */


// check if $id is 7 char
if( strlen($id) == 7 ){

	// only write to file if there is any text to save
	if (strlen($textcontent) > 0) {
	
		$fp = fopen($filepath, 'a+');
		fwrite($fp, $textcontent);
		fclose($fp);
	}
	else{
	// do nothing
	}

		if (file_exists($filepath)) {
		    echo ('The file '.$id.' exist!<br>');
		}
		else {
		    echo ('The file '.$id.' does not exist<br>');
		    
		    // create a temporary file that will make it possible to auto-poll the initial submit by a player
			$temp = tmpfile();
			fwrite($temp, $textcontent);
			fseek($temp, 0);
			echo fread($temp, 1024);
			fclose($temp); // this removes the file
		}	
			
}

else {
    echo ('Oh you! That\'s an invalid file id. ');
    $idlength = strlen($id);
    echo ('['.$idlength.']');
}	


	// add $id variable to url with replaceState upon loading data.php
	//// avaktiverad för att inte trigga $_GET['id'] och även för att inte visa $id publikt för användaren
/*
	echo ('
		<script>
		$(function replaceUrl() {
	    	history.replaceState("object or string", "title", "index.php?id='.$id.'");
		});
		</script>
	');	
*/

	// ugly fix in order to remove everything (index.php?id=1234567) after slash in example.com/
	echo ('
		<script>
		$(function replaceUrl() {
	    	history.replaceState("object or string", "title", " .");
		});
		</script>
	');	



?>

