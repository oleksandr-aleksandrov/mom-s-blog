<?php 
get_header(); ?>


<div class="uk-container">
	<div uk-grid>

		
		<div class="uk-width-expand@m">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );



			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

		endwhile; // End of the loop.
		?>
	</div>
	<div class="uk-widht-1-4@m">	
		<?php 
		get_sidebar();
		?>
	</div>
</div>

<div class="uk-last-posts" uk-grid>

	<?php 
	$args = array(
		'numberposts' => 4,
		'post_status' => 'publish',
	); 

	$last_posts = wp_get_recent_posts($args);

	foreach( $last_posts as $last_post ){ 
		?>
		<div class="uk-width-expand@m uk-grid-item-match">
			<div class="uk-margin uk-text-left@s uk-text-center uk-card uk-card-default uk-card-hover">
				<a class="uk-position-cover uk-position-z-index uk-margin-remove-adjacent" href="<?php echo get_permalink($last_post['ID']) ?>"></a> 
				<div class="uk-card-media-top">
					<?php
					if ( has_post_thumbnail() ) { echo get_the_post_thumbnail($last_post['ID'], 'medium',array('class' => 'uk-image-blog uk-box-shadow-medium')); }
					else { ?>
					<img class="uk-image-blog uk-box-shadow-medium" src="<?php bloginfo('template_url') ?>/app/img/wheat11.jpg" alt="">
					<?php } 
					?>
				</div>
				<div class="uk-card-body">
					<h3 class="uk-margin uk-card-title uk-margin-remove-adjacent uk-margin-small-bottom"><?php echo $last_post['post_title'] ?></h3>
					<p><?php
					(is_single() &&'post' === get_post_type() )
					?  the_content()  
					:the_truncated_post( $last_post['ID'], 100 ) ;
					?></p>
				</div>
			</div>
		</div> 
		<?php 
	} 
	?>

</div>
</div>

<?php

get_footer();