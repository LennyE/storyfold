<?php
//egentligen bör detta vara ett sessionid som skapas dynamiskt, använder statiskt för testsyfte.
$sessionid = "123testID";
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Storyfold! &alpha;</title>

	<!-- stylesheets --> 
	<link href="css/style.css" rel="stylesheet" type="text/css" id="stl" />
	<script src="js/jquery-1.8.2.min.js"></script>
	
	<!-- google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
		
	<!-- add textcontent to an inputfield in order to submit -->	
	<script src="js/hidden-submit.js"></script>
	
</head>
<body>
	
<div id="results">
	
		<!-- using a div contenteditable because of the div's layout properties -->
		<div id="textcontent" contenteditable="true" class="no-formatting" placeholder="Add some story!"></div>
	
		<form id="form" action="index.php" method="post" onsubmit="return getContent()">
			<input id="content-submit" type="text" placeholder="textfield for submitting textcontent" name="content-submit">
			<input type="submit" name="submit" value="Send" />
		</form>
	
	<!-- 	<?php include('data.php'); ?> -->

</div>

<!-- remove formatting -->
<script id="jsbin-javascript" src="js/remove-paste-formatting.js"></script>
	
</body>
</html>


<?php

$textcontent = $_POST["content-submit"];

?>

<?php
if (strlen($textcontent) > 0) {

	/* skulle kunna använda detta för att spara ner briefer för Piñatabrief */
	$fp = fopen('stories/'.$sessionid.'.txt', 'a+');
	
/* 	fwrite($fp, "Compatibility:\t".$tot_sum."%\t ".$name."\t Gender:\t".$gender."\t Year:\t".$year."\t Products:\t".$chosen_product."\t Food:\t".$chosen_food."\r\n"); */
/* 	fwrite($fp, "variable value:\t".$textcontent."\r\n"); */
	fwrite($fp, "".$textcontent."\r\n");
	
	fclose($fp);
}
else{
/* 	echo "<script type='text/javascript'>alert('wut');</script>"; */
}

?>