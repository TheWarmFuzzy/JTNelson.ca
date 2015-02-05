<?php
	
	///////////////////////////
	//P-Reader Page Constants//
	//If Pre-page fails////////
	///////////////////////////
		
	defined("PROJECT_LIST") or define("PROJECT_LIST","project_list.js");

	///////////////////////////
	//Main Code////////////////
	///////////////////////////

	function getProjects(){
		
		$myfile = fopen(PROJECT_LIST, "r") or die("Unable to open file!");
		
		$data = fread($myfile,filesize(PROJECT_LIST));
		
		fclose($myfile);
		
		return json_decode($data, true);
	}
?>