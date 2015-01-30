<?php

define("RANDOM_BLOCKS",true);
define("ONLY_WIDE_BLOCKS",true);
define("BlOCKS_PER_SET",15);

function generate_blocks(){
	$blocks = array();
	$block_count = 0;
	
	if(RANDOM_BLOCKS){
		
		$block_count = 6;
		for($i=0;$i<$block_count;$i++){
			$blocks[] = array("rating"=>rand(0,10));
		}
		
	}else{
	
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
		create_block("large", "img/awesome.png", "My Title");
	close_block_set();
}

function block_set_2($array){
	switch(ONLY_WIDE_BLOCKS ? 0 : rand(0,1)){
		case 0:
		
			open_block_set("large");
				create_block("wide", "img/awesome.png", "My Title");
				create_block("wide", "img/awesome.png", "My Title");
			close_block_set();
			
			break;
		case 1:
		
			open_block_set("large");
				create_block("tall", "img/awesome.png", "My Title");
				create_block("tall", "img/awesome.png", "My Title");
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
					create_block("small", "img/awesome.png", "My Title");
					create_block("small", "img/awesome.png", "My Title");
				close_block_set();
				create_block("wide", "img/awesome.png", "My Title");
			close_block_set();
			
			break;
		case 1:
			//	 Wide
			//Small Small
			open_block_set("large");
				create_block("wide", "img/awesome.png", "My Title");
				open_block_set("wide");
					create_block("small", "img/awesome.png", "My Title");
					create_block("small", "img/awesome.png", "My Title");
				close_block_set();
			close_block_set();
			
			break;
		case 2:
			//Small
			//		Tall
			//Small
			open_block_set("large");
				open_block_set("tall");
					create_block("small", "img/awesome.png", "My Title");
					create_block("small", "img/awesome.png", "My Title");	
				close_block_set();
				create_block("tall", "img/awesome.png", "My Title");
			close_block_set();
			
			break;
		case 3:
			//		Small
			//Tall
			//		Small
			open_block_set("large");
				create_block("tall", "img/awesome.png", "My Title");
				open_block_set("tall");
					create_block("small", "img/awesome.png", "My Title");
					create_block("small", "img/awesome.png", "My Title");
				close_block_set();
			close_block_set();
			
			break;
		default:
			break;
	}
}

function block_set_4($array){
	open_block_set("large");
		create_block("small", "img/awesome.png", "My Title");
		create_block("small", "img/awesome.png", "My Title");
		create_block("small", "img/awesome.png", "My Title");
		create_block("small", "img/awesome.png", "My Title");
	close_block_set();
}

//Creates an individual project block
function create_block($type, $image, $text){

	//Class for the block (size, colour)
	$block_class = $type . " blue";
	
	//Image for the block
	$block_image = $image;
	
	//Title for the block
	$block_title = $text;
	
	?>
	
		<a href="" onclick="myFunction()">
			<span class="block <?php echo $block_class; ?>">
				<span class="block-image" style="background-image:url('<?php echo $block_image; ?>');"></span>
				<span class="block-fill"></span>
				<span class="block-text">Hola</span>
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