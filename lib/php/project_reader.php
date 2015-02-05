<?php
	function getProjects(){
		
		$myfile = fopen("project_list.js", "r") or die("Unable to open file!");
		
		$data = fread($myfile,filesize("project_list.js"));
		
		fclose($myfile);
		
		return json_decode($data, true);
	}
?>