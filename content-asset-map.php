<?php
	$section_id = get_sub_field('map_section_id');
	$bg_color   = get_sub_field('asset_map_bg_color');
?>

<section id="<?php echo $section_id; ?>" class="asset-map-section <?php echo $bg_color; ?>">
	<div class="container-fluid">
		<div class="row">
			<!-- THINGS TO DO 
				1) functions.php create asset post type supporting featured image, title, content editor
				2) create an asset unit-756
				3) set up ids in the svg matching the asset slugs
				4) ajax call on svg click to populate the div#asset
				5) animations
					a) map svg centering on the clicked asset and moving to the left ???
					b) creating a line from the clicked asset
					c) bringing the #asset from the right side or bringing it as a white line first and then changing the height.				
				
				THINGS TO DISCUSS
				1) Hover state on assets, do we need names etc? 
			-->
			
			<!-------ASSET SVG GOES HERE------>
			<div id="map">
				
			</div>
			
			<!-------ASSET-------->
			<div id="asset"></div>
						
		</div>
	</div>
</section>

<script>
	
	
</script>

<style>
	
</style>