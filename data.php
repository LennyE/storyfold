<?php
session_start();
$_SESSION['id'] = $_GET['id'];


// convert potential malicious characters to html
$textcontent = htmlspecialchars($_POST["content-submit"]);

$filepath = 'stories/'. $_SESSION['id'] .'.txt';



/* if(isset($_GET["id"]) && strlen($_SESSION['id']) = 7)) { */

if (isset($_GET["id"])){
   $_SESSION['id'] = $_GET['id'];
}
else{
	$_SESSION['id'] = substr( md5(rand()), 0, 7);
}
echo ('<a href=index.php?id='.$_SESSION['id'].'>id: '.$_SESSION['id'].'</a><hr>');
/* print_r($_SESSION); */


echo ('Try to read file:<br>');


if( strlen($_SESSION['id']) == 7 ){

	// only write to file if there is any text to save
	if (strlen($textcontent) > 0) {
	
		$fp = fopen($filepath, 'a+');
		
		fwrite($fp, $textcontent);
		
		fclose($fp);
	}
	
	else{
	// add something
	}

		
		if (file_exists($filepath)) {
		    echo ('The file '.$_SESSION['id'].' exist!<br>');
			readfile($filepath);
		}
		else {
		    echo ('The file '.$_SESSION['id'].' does not exist<br>');
		}	
			
}

else {
    echo ('Oh you! That\'s an invalid file id. ');
    $idlength = strlen($_SESSION['id']);
    echo ('['.$idlength.']');

}	


	echo ('
		<script>
		$(function replaceUrl() {
			/* add $id variable to url with replaceState on page load iframe onload */
	    	history.replaceState("object or string", "title", "index.php?id='.$_SESSION['id'].'");
		});
		</script>
	');



?>