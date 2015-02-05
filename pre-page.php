<?php
	///////////////////////////
	//Page Redirects///////////
	///////////////////////////
	define("UNDER_CONSTRUCTION", false);
	
	if(UNDER_CONSTRUCTION){
		header("Location: construction.php");
		die();
	}
	
	///////////////////////////
	//Project Page Constants///
	///////////////////////////

	define("RANDOM_BLOCKS",false);
	define("ONLY_WIDE_BLOCKS",false);
	define("BlOCKS_PER_SET",11);
	define("PROJECT_DIRECTORY","projects/");
	define("PROJECT_ICON_DIRECTORY", PROJECT_DIRECTORY . "project-icons/");
	
	///////////////////////////
	//P-Reader Page Constants//
	///////////////////////////
	
	define("PROJECT_LIST","project_list.js")
	
?>