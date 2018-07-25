
<?php

	$section_id = get_sub_field('team_section_id');
	$bg_color 	= get_sub_field('team_bg_color');
	$first_content = '';


	//Get terms for staff type selector
	$terms = get_terms( array( 'taxonomy' => 'staff-type', 'hide_empty' => false ) );
	$desktop_controls = '<div class="desktop-team-controls">';
	$mobile_controls  = '';

	//Build desktop controls
	$index = 0;
	foreach( $terms as $term ){
		if( $index == 0 ){
			$desktop_controls .= '<span class="active" data-id="' . $term->term_id . '">' . $term->name . '</span>';
			$index++;
			continue;
		}
		$desktop_controls .= '<span class="lt-gray" data-id="' . $term->term_id . '">' . $term->name . '</span>';

	}
	$desktop_controls .= "</div>";

	//Build mobile controls
	foreach( $terms as $term ){
		$mobile_controls .= '<a class="dropdown-item" href="#" data-id="' . $term->term_id . '">' . $term->name . '</a>';
	}

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$team_args = array(
		'post_type'      => 'team',
		'paged'          => $paged,
		'posts_per_page' => 3,
		'tax_query'      => array(
			array(
				'taxonomy' => 'staff-type',
				'field'    => 'slug',
				'terms'	   => 'leadership',				
			)
		)
	);


?>

<section id="<?php if( $section_id ) echo $section_id; ?>" class="team-section <?php echo $bg_color; ?>">
	<div class="container-fluid">
		<div class="row">
			
			<div class="team-header">
				<h2 class="team-heading hiddenmobile red">Leadership</h2>
				<div class="team-controls">
					<?php echo $desktop_controls; ?>
					<div class="dropdown">
						<button class="team-type-btn lt-gray dropdown-toggle" type="button" id="dropDownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leadership</button>
						<div class="dropdown-menu" aria-labelledby="dropDownMenuButton">
							<?php echo $mobile_controls; ?>
						</div>
					</div>
				</div>
			</div>
			

			<div class="team-container">
				<div class="team-container-inner">	
				<?php
					$backup = $post;
					$i = 0;
					$team_query = new WP_Query( $team_args );
					if( $team_query->have_posts() ) : ?>
					<div id="navlinks">
						<div class="nav-next alignright"><?php previous_posts_link( '', $team_query ->max_num_pages ); ?></div>
						<div class="nav-previous alignleft"><?php next_posts_link( '', $team_query ->max_num_pages ); ?></div>						
					</div>
					<div class="team-slider">
						<?php while( $team_query->have_posts() ) : $team_query->the_post();
						
						$initials = get_field('initials');
						$title 	  = get_field('title');
	
	
						if( $i == 0 ) {
							$first_name = get_the_title($id);
							$first_content = '<h2 class="tm-content-name">' . $first_name . '</h2>';
							$first_content .= '<p class="tm-content-title red">' . $title . '</p>';
							$first_col = get_field('team_first_column');
							$second_col = get_field('team_second_column');
						}
						 ?>
						 <div class="team-member bg-img white<?php 	if( $i == 0 ) echo " active"; ?>" style="background-image: url(<?php the_post_thumbnail_url($id); ?>);" data-id="<?php echo get_the_id($id); ?>">
							 <h2 class="tm-initials"><?php echo $initials; ?></h2>
							 <p class="tm-title"><?php echo $title; ?></p>
						 </div>
						 <?php $i++; endwhile; ?>
						 
					</div>
				
					<div class="team-content">
						<?php echo $first_content; ?>
						<div class="team-info">
							<div class="team-col1 team-col">
								<?php echo $first_col; ?>
							</div>
							<div class="team-col2 team-col">
								<?php echo $second_col; ?>
							</div>
						</div>
					</div>
					
					<?php wp_reset_query($team_query); endif; ?>
					<?php $post = $backup; ?> 
				</div>
			</div>
		</div>
	</div>
</section>



