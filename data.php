<?php
	
	// convert potential malicious characters to html
	$textcontent = htmlspecialchars($_POST["content-submit"]);


if (strlen($textcontent) > 0) {

	/* skulle kunna använda detta för att spara ner briefer för Piñatabrief */
	$fp = fopen('stories/'.$sessionid.'.txt', 'a+');
	
/* 	fwrite($fp, "Compatibility:\t".$tot_sum."%\t ".$name."\t Gender:\t".$gender."\t Year:\t".$year."\t Products:\t".$chosen_product."\t Food:\t".$chosen_food."\r\n"); */
/* 	fwrite($fp, "variable value:\t".$textcontent."\r\n"); */
	fwrite($fp, "".$textcontent."");
	
	fclose($fp);
}
else{
/* 	echo "<script type='text/javascript'>alert('wut');</script>"; */
}


/* 	readfile('stories/'.$sessionid.'.txt'); */

?>