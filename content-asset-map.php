<?php
	$section_id = get_sub_field('map_section_id');
	$bg_color   = get_sub_field('asset_map_bg_color');
?>

<section id="<?php echo $section_id; ?>" class="asset-map-section <?php echo $bg_color; ?>">
	<div class="container-fluid">
		<div class="row">
			<!-- THINGS TO DO 
				//1) functions.php create asset post type supporting featured image, title, content editor
				//2) create an asset unit-726
				//3) set up ids in the svg matching the asset slugs
					//a) create blocks in svg that overlay the tanks
					//b) create a function on click
				//4) ajax call on svg click to populate the div#asset
				5) animations
					//a) map svg centering on the clicked asset and moving to the left ???
					//b) creating a line from the clicked asset
					//c) bringing the #asset from the right side or bringing it as a white line first and then changing the height.
					d) clicking on outside of the asset will zoom out						
				// 6) change the close button
				
				THINGS TO DISCUSS
				1) Hover state on assets ??? 
				2) map svg initial animation ???
				3) Divide the asset image and asset copy animations into two different parts??? I don't really like the image movement currently.
				
				BUGS, ERRORS, MISC
				// 1) Asset showing up animation isn't consistent (bind it to the ajax call dumbass)
				2) If scroll position top isn't 0, centering and line&asset animations aren't correct			  
			-->
			
			<!-------ASSET SVG GOES HERE------>
			<div id="map">
				<?php get_template_part('img/asset_map_black'); ?>
			</div>
			
			<!-------ASSET-------->
			<div id="asset">
				<div id="whiteline"></div>
				<div id="asset_content_container" class="d-flex">
					<div id="asset_image" class="col-md-6">
						
					</div>
					<div id="asset_copy" class="col-md-6">
						<h3></h3>
						<div class="asset_copy">
							
						</div>	
					</div>
					<div class="close_asset_button">&times;</div>
				</div>
			</div>
						
		</div>
	</div>
</section>

<script>	

</script>

<style>
	.asset-map-section {
		height: 120vh !important;
		min-height: 640px;
		position: relative;
		overflow: hidden;
	}
	.asset-map-section {
	    height: auto;
	    padding-bottom: 15%;
	    background: #000;
	}
	#map {
		position: relative;
	    height: 100vh;
	    width: 100%;
	}
	#map svg{
		height: 100vh;
		width: auto;
		min-height: 640px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate3d(-50%,-50%,0);
	}
	.mapclickable:hover circle{
		fill: white !important;
		fill-opacity: .2 !important;
		cursor: pointer;
	}
	.mapclickable.selected_asset {
		fill: white !important;
		fill-opacity: .2 !important;
		stroke: #fff !important;
		stroke-width: 2 !important;
	}
	

	#asset {
	    position: absolute; /* width, height, top, left are written with javascript */
	    max-height: 0;
	    transform: translate3d(0,-50%,0);
	}
	#asset.asset_visible {
		height: auto;
		max-height: 9999px;
		transition: width 1s ease-in-out 1s; 
	}
	#whiteline {
		position: absolute;
		top: 50%;
		left: 0;
		transform: translate3d(0,-50%,0);
		height: 4px; 
		width: 0;
		background: #fff;
		transition: width .7s ease-in-out .7s; 
	}
	#asset.asset_visible #whiteline {
		width: 100%;
		transition: width .7s ease-in-out 0s; 
	}
	#asset_content_container{
		float: right;
		background: #fff;
		width: 60vw;
		height: 0;
		/*max-height: 0px;*/
		overflow: hidden; 
		transform: translate3d(0,-50%,0);
		transition: height .7s ease-in-out 0s; 
	}
	#asset.asset_visible #asset_content_container{	
		height: 80vh;
		/*max-height: 9999px;*/
		transition: height .7s ease-in-out .7s; 		
	}
			
	#asset_copy {
		padding: 60px 5%;
	}
	#asset_copy strong, #asset_copy blockquote {
		font-size: 1.3em;
	}
		
	.close_asset_button {
		color: red;
		position: absolute;
		font-size: 2em;
		right: .5em;
		top: .5em;
		width: 1em;
		height: 1em;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
	}
	
</style>