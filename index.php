<?php
if (isset($_GET['id'])) {
        $id = $_GET['id']; 
    } 
    else{ 
    	// if no ?variable=value is provided in the url, use a random value
        $id = substr( md5(rand()), 0, 7); 
    }
    
setcookie("currentID", $id, time()+7200);
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Storyfold! &alpha;</title>

	<!-- stylesheets --> 
	<link href="css/style.css" rel="stylesheet" type="text/css" id="stl" />
	
	<!-- google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
		


<script>
window.onload = function(){
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
};

window.onblur = function() {
	document.getElementById('notificationsound').muted = false;
	document.title="blur";
};

window.onfocus = function() {
	document.getElementById('notificationsound').muted = true;
	document.title="focus";
};
</script>

	<!-- polling -->	
    <script src="js/jquery-1.11.2.js"></script>
<!-- 	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->
	  <script src="js/jQuery.longpolling.js"></script>
	  <script src="js/application.js"></script>


</head>
<body>
<br>

<div id="results">

        <h1>Storyfold!</h1>
		<hr>

	<?php include('data.php');?>
	
	<hr>
	    
    <div id="response">Start writing your story!</div>
    
	<audio id="notificationsound" src="sound/notify.mp3" preload="auto"></audio>
<!--
	<a href="javascript:play_single_sound();">Play 5-sec sound on single channel</a>
	<script type="text/javascript">
	function play_single_sound() {
		document.getElementById('audiotag1').play();
	}
	</script>
-->
	
		<!-- using a div contenteditable because of the div's layout properties -->
<!-- 	<div id="textcontent" contenteditable="true" class="no-formatting" placeholder="Add your part of the story!"></div> -->

<!-- 	<form id="form" action="<?php echo $_SERVER["PHP_SELF"] . '?id='.$_SESSION['id']; ?>" method="post" onsubmit="return getContent()"> -->
<!-- 	<form id="form" action="<?php echo $_SERVER["PHP_SELF"] . '?id='.$id; ?>" method="post"> -->
	<form id="form" method="post">
		<textarea id="content-submit" name="content-submit" class="no-formatting" type="text" placeholder="textfield for submitting textcontent"></textarea>
		<input type="submit" name="submit" value="Send" />
	</form>
	<br>Storyfold bakar kakor i din dator.
</div>
</body>
</html>

<!-- remove formatting -->
<script id="jsbin-javascript" src="js/remove-paste-formatting.js"></script>