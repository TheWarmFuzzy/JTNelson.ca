<?php

define("RANDOM_BLOCKS",true);
define("BlOCKS_PER_SET",20);

$block_dispersion = array("large"=>1,"medium"=>5,"small"=>14);
$block_values = array("large"=>4,"medium"=>2,"small"=>1);
$block_values = array("large"=>4,"medium"=>2,"small"=>1);

function generate_blocks(){
	$blocks = array();
	$block_count = 0;
	if(RANDOM_BLOCKS){
		
		$block_count = 32;
		for($i=0;$i<$block_count;$i++){
			$blocks[] = array("rating"=>rand(0,10));
		}
	}else{
	
	}
	sort($blocks);
	
	
	$block_set_count = ceil($block_count / BlOCKS_PER_SET);
	$block_count = 6 * $block_set_count;
	$current_block_set = 0;
	$block_sets = array();
	for($i = count($blocks) - 1; $i >= 0; $i--){
		$block_sets[$current_block_set][] = $blocks[$i];
		
		$current_block_set++;
		if($current_block_set == $block_count){
			$current_block_set = $block_set_count;
		}
	}
	return($block_sets);
}

function display_blocks(&$array){
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
	?>

	<div class="block-set large">
		<span class="block large web-design">
			<span class="block-image" style="background-image:url('img/awesome.png');"></span>
			<span class="block-fill"></span>
			<span class="block-trans"></span>
		</span>
	</div>

	<?php
}

function block_set_2($array){
	switch(rand(0,1)){
		case 0:
			?>
				
			<div class="block-set large">
				<span class="block tall">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
				<span class="block tall">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
			</div>
							
			<?php
			break;
		case 1:
			?>
				
			<div class="block-set large">
				<span class="block wide">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
				<span class="block wide">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
			</div>
							
			<?php
			break;
		default:
		
			break;
	}
}

function block_set_3($array){
	switch(rand(0,3)){
		case 0:
			?>

			<div class="block-set large">
				<div class="block-set wide">
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
				</div>
				<span class="block wide">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
			</div>

			<?php
			break;
		case 1:
			?>

			<div class="block-set large">
				<span class="block wide">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
				<div class="block-set wide">
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
				</div>
			</div>

			<?php
			break;
		case 2:
			?>

			<div class="block-set large">
				<div class="block-set tall">
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
				</div>
				<span class="block tall">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
			</div>

			<?php
			break;
		case 3:
			?>

			<div class="block-set large">
				<span class="block tall">
					<span class="block-image" style="background-image:url('img/awesome.png');"></span>
					<span class="block-fill"></span>
					<span class="block-trans"></span>
				</span>
				<div class="block-set tall">
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
					<span class="block small">
						<span class="block-image" style="background-image:url('img/awesome.png');"></span>
						<span class="block-fill"></span>
						<span class="block-trans"></span>
					</span>
				</div>
			</div>

			<?php
			break;
		default:
			break;
	}
}

function block_set_4($array){
	?>

	<div class="block-set large">
		<span class="block small">
			<span class="block-image" style="background-image:url('img/awesome.png');"></span>
			<span class="block-fill"></span>
			<span class="block-trans"></span>
		</span>
		<span class="block small">
			<span class="block-image" style="background-image:url('img/awesome.png');"></span>
			<span class="block-fill"></span>
			<span class="block-trans"></span>
		</span>
		<span class="block small">
			<span class="block-image" style="background-image:url('img/awesome.png');"></span>
			<span class="block-fill"></span>
			<span class="block-trans"></span>
		</span>
		<span class="block small">
			<span class="block-image" style="background-image:url('img/awesome.png');"></span>
			<span class="block-fill"></span>
			<span class="block-trans"></span>
		</span>
	</div>

	<?php
}

?>