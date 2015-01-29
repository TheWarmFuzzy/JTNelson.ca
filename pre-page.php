<?php
	///////////////////////////
	//Page Redirects///////////
	///////////////////////////
	define("UNDER_CONSTRUCTION", false);
	
	if(UNDER_CONSTRUCTION){
		header("Location: construction.php");
		die();
	}
?>