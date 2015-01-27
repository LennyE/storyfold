<?php

// convert potential malicious characters to html
$textcontent = htmlspecialchars($_POST["content-submit"]);

$filepath = 'stories/'.$id.'.txt';


echo ('<a href="index.php">Start new</a> | ');
echo ('<a href="index.php?id='.$id.'">current id: '.$id.'</a><hr>');
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

	echo ('
		<script>
		$(function replaceUrl() {
			/* add $id variable to url with replaceState upon loading data.php */
	    	history.replaceState("object or string", "title", "index.php?id='.$id.'");
		});
		</script>
	');
	
?>