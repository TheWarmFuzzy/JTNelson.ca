<html>
	<head>
		<?php require_once("lib/php/block_creator.php"); ?>
		<script type="text/javascript" src="lib/js/js_cookie.js"></script>
		<link rel="stylesheet" type="text/css" href="lib/css/metro-style.css"/>
		<link rel="stylesheet" type="text/css" href="lib/css/custom-borders.css"/>
	</head>
	<body>
		<?php
			if(isset($_COOKIE["js_enabled"])){
				if($_COOKIE["js_enabled"] == true){
					$js_enabled = true;
				}else{
					$js_enabled = false;
				}
			}
			generate_blocks();
		?>
		<div class="content">
			<div class="block_container">
			<?php
				display_blocks(generate_blocks());
			?>
			</div>
		</div>
	</body>
</html>

