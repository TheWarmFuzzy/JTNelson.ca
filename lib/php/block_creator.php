<?php

	///////////////////////////
	//Project Page Constants///
	//If Pre-page fails////////
	///////////////////////////
		
	defined("RANDOM_BLOCKS") or define("RANDOM_BLOCKS",false);
	defined("ONLY_WIDE_BLOCKS") or define("ONLY_WIDE_BLOCKS",true);
	defined("BlOCKS_PER_SET") or define("BlOCKS_PER_SET",15);
	defined("PROJECT_DIRECTORY") or define("PROJECT_DIRECTORY","projects/");
	defined("PROJECT_ICON_DIRECTORY") or define("PROJECT_ICON_DIRECTORY", PROJECT_DIRECTORY . "project-icons/");

	///////////////////////////
	//Main Code////////////////
	///////////////////////////
		
	function generate_blocks($blk){
		$blocks = array();
		$block_count = 0;
		
		if(RANDOM_BLOCKS){
			
			$block_count = 11;
			for($i=0;$i<$block_count;$i++){
				$blocks[] = array("rating"=>rand(0,10),"title"=>"Hola","color"=>"blue","image"=>"test.png","link"=>"#");
			}
			
		}else{
		
			$blocks = $blk["projects"];
			$block_count = count($blocks);
		}
		
		sort($blocks);
		
		
		$block_set_count = ceil($block_count / BlOCKS_PER_SET);
		
		$block_count = 6 * $block_set_count;
		
		$current_block_set = 0;
		$increment = 1;
		$block_sets = array();
		
		for($i = count($blocks) - 1; $i >= 0; $i--){
		
			$block_sets[$current_block_set][] = $blocks[$i];
			
			$current_block_set++;
			
			if($current_block_set == $block_count){
				$current_block_set = $block_set_count * $increment;
				$increment++;
			}
			
		}
		
		return($block_sets);
	}

	function display_blocks($array){
		shuffle($array);
		for($i = 0;$i < count($array);$i++){
			switch(count($array[$i])){
				case 1:
					block_set_1($array[$i]);
					break;
				case 2:
					block_set_2($array[$i]);
					break;
				case 3:
					block_set_3($array[$i]);
					break;
				case 4:
					block_set_4($array[$i]);
					break;
				default:
				
					break;
			}
		}
	}

	function block_set_1($array){
		open_block_set("large");
			create_block("large", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
		close_block_set();
	}

	function block_set_2($array){
		switch(ONLY_WIDE_BLOCKS ? 0 : rand(0,1)){
			case 0:
			
				open_block_set("large");
					create_block("wide", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
					create_block("wide", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
				close_block_set();
				
				break;
			case 1:
			
				open_block_set("large");
					create_block("tall", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
					create_block("tall", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
				close_block_set();
				
				break;
			default:
			
				break;
		}
	}

	function block_set_3($array){
		switch(ONLY_WIDE_BLOCKS ? rand(0,1) : rand(0,3)){
			case 0:
				//Small Small
				//	 Wide
				open_block_set("large");
					open_block_set("wide");
						create_block("small", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
						create_block("small", $array[1]["image"], $array[2]["title"], $array[2]["color"]);
					close_block_set();
					create_block("wide", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
				close_block_set();
				
				break;
			case 1:
				//	 Wide
				//Small Small
				open_block_set("large");
					create_block("wide", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
					open_block_set("wide");
						create_block("small", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
						create_block("small", $array[2]["image"], $array[2]["title"], $array[2]["color"]);
					close_block_set();
				close_block_set();
				
				break;
			case 2:
				//Small
				//		Tall
				//Small
				open_block_set("large");
					open_block_set("tall");
						create_block("small", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
						create_block("small", $array[2]["image"], $array[2]["title"], $array[2]["color"]);	
					close_block_set();
					create_block("tall", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
				close_block_set();
				
				break;
			case 3:
				//		Small
				//Tall
				//		Small
				open_block_set("large");
					create_block("tall", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
					open_block_set("tall");
						create_block("small", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
						create_block("small", $array[2]["image"], $array[2]["title"], $array[2]["color"]);
					close_block_set();
				close_block_set();
				
				break;
			default:
				break;
		}
	}

	function block_set_4($array){
		open_block_set("large");
			create_block("small", $array[0]["image"], $array[0]["title"], $array[0]["color"]);
			create_block("small", $array[1]["image"], $array[1]["title"], $array[1]["color"]);
			create_block("small", $array[2]["image"], $array[2]["title"], $array[2]["color"]);
			create_block("small", $array[3]["image"], $array[3]["title"], $array[3]["color"]);
		close_block_set();
	}

	//Creates an individual project block
	function create_block($type, $image, $text, $color, $link = ""){

		//Class for the block (size, colour)
		$block_class = $type . " " . $color;
		
		//Image for the block
		$block_image = PROJECT_ICON_DIRECTORY . $image;
		
		//Title for the block
		$block_title = $text;
		
		if(true){
?>
		
			<a href="#project" onclick="myFunction( <?php echo $link; ?> )">
			
<?php
		}else{
?>
		
			<a href="<?php echo $link; ?>">
			
<?php
		}
?>
				<span class="block <?php echo $block_class; ?>">
					<span class="block-image" style="background-image:url('<?php echo $block_image; ?>');"></span>
					<span class="block-fill"></span>
					<span class="block-text"> <?php echo $block_title; ?> </span>
					<span class="block-trans"></span>
				</span>
			</a>
			
<?php
	}

	//Creates an individual project block
	function open_block_set($type){

		//Class for the block (size, colour)
		$block_class = $type;
		
		//Opens a block set tag
		echo "<span class=\"block-set $block_class\">" . "\n";

	}

	//Creates an individual project block
	function close_block_set(){

		//Closes a block set tag
		echo "</span>" . "\n";

	}

?>