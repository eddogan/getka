<section id="<?php if( $section_id ) echo $section_id; ?>" class="blogfeed-section-featured <?php echo $bg_color; ?> <?php echo $bg_style; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 offset-md-3">
				<h1 class="white">Press and News Room</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 featured_content_copy lt-gray">
				<h2 class="red">Featured Press Releases</h2>
				<p>Totam rem aperiam, eaque ipsa quae ab illo inventore</p>
			</div>	
			<div class="col-md-9 blogfeed-container d-flex">
				<?php
					$backup = $post;
					$i = 0;
					$post_args = array(
						'post_type' => 'post',
						'meta_key' => 'featured',
						'meta_value' => true,
					);
					$post_query = new WP_Query( $post_args );
					if( $post_query->have_posts() ) :
					while( $post_query->have_posts() ) : $post_query->the_post();		

					?>
					 <div class="blogfeed-post-featured" data-id="<?php echo get_the_id($id); ?>" style="background-image: url(<?php the_post_thumbnail_url($id); ?>);">
						<a href="<?php the_permalink(); ?>"> 
							<div class="blogfeed-post-inner-container">
								<span class="blog_article-link red">+</span>
								<h2 class="blog_article-title"><?php the_title();?></h2>								
							</div>
						</a>
					 </div>
					 <?php $i++; endwhile; ?>

				<?php wp_reset_query($post_query); endif; ?>
				<?php $post = $backup; ?> 
			</div>
		</div>
	</div>
</section>



