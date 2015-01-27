<?php
session_start();

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
		

	<!-- polling -->	
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/sizzle.js"></script>
<!--     <script src="js/client.js"></script> -->


</head>
<body>
<!-- <?php echo($_SESSION['filnamn']); ?> -->
<br>

<div id="results">

        <h1>Storyfold!</h1>
<!--         <div id="response">&nbsp;</div> -->


	<?php include('data.php');
		
		
	?>
	
	

	<!-- using a div contenteditable because of the div's layout properties -->
<!-- 	<div id="textcontent" contenteditable="true" class="no-formatting" placeholder="Add your part of the story!"></div> -->

	<form id="form" action="<?php echo $_SERVER["PHP_SELF"] . '?id='.$_SESSION['id']; ?>" method="post" onsubmit="return getContent()">
		<textarea id="content-submit" name="content-submit" class="no-formatting" type="text" placeholder="textfield for submitting textcontent"></textarea>
		<input type="submit" name="submit" value="Send" />
	</form>

</div>

</body>
</html>

<!-- remove formatting -->
<script id="jsbin-javascript" src="js/remove-paste-formatting.js"></script>