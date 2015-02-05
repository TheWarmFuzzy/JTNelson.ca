<?php

$ROOT = dirname(__FILE__);
include_once($ROOT.'/pre-page.php');
require_once($ROOT.'/lib/php/project_reader.php'); 

?>
<html>
	<head>
	
		<?php require_once("lib/php/block_creator.php"); ?>
		
		<script type="text/javascript" src="lib/js/js_cookie.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/css/metro-style.css"/>
		<link rel="stylesheet" type="text/css" href="lib/css/custom-borders.css"/>
		<link rel="stylesheet" type="text/css" href="lib/css/overlay.css"/>
        <style>
            .content-end {
                background-color:red;
            }
        </style>
	</head>
	<body>
	
		<?php
			$js_enabled = false;
			if(isset($_COOKIE["js_enabled"])){
				if($_COOKIE["js_enabled"] == true){
					$js_enabled = true;
				}
			}
		?>
		
		<div class="content">
		
			<?php
				display_blocks(generate_blocks(getProjects()));
			?>
			
		</div>
		<div class="overlay">
			<div id="project" class="content">
				
				<a href="#" class="button"/>
			</div>
			<a href="#" class="mask"/>
		</div>
		
	</body>
</html>

