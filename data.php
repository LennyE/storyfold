<?php

// convert potential malicious characters to html
$textcontent = htmlspecialchars($_POST["contentsubmit"]);

$filepath = 'stories/'.$id.'.txt';


// use a javascript button to avoid opening the new session in a new tab (prevent $id bug)
	// skulle eventuellt kunna använda en vanlig href tillsammans med knappen
echo ('
	<hr>
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


	// open again and correct any errors in formatting of text
		$fp_correcting = fopen($filepath, 'r+');
		
		$filecontent = file_get_contents($filepath);
		
		// corrects any unwanted formatting, also adds a space to the end of the string (if a space already is present that will be corrected upon next submit)
		$filecontent = preg_replace( '/(?<!\d)[.,!?](?![.,!?\d])/', '$0 ', $filecontent.' '); 

		// corrects unwanted spacing
		$filecontent = preg_replace('/\s\s+/', ' ', $filecontent);

		// capitalize first word following a full-stop (period)
		$filecontent = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'),$filecontent);
 
/*
		echo('<hr>corrected:<br>');
		echo $correctedtext;
		echo('<hr>');
*/
				
		file_put_contents($filepath, ""); // clear before putting new (probably shorter lengthwise) content in it
		
		fwrite($fp_correcting, $filecontent);
		fclose($fp_correcting);
		
	}
	
	else {
	// do nothing
	}


/*
	if (file_exists($filepath)) {
	    echo ('The file '.$id.' exist!<br>');
	}
	else {
	    echo ('The file '.$id.' does not exist<br>');
	}	
*/
			
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
	// also helps to prevent resubmission of POST data on page reload 
	echo ('
		<script>
		$(function replaceUrl() {
	    	history.replaceState("object or string", "title", " .");
		});
		</script>
	');	

?>
