<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<div class="uk-flex uk-flex-between uk-flex-middle uk-posts-top-info">
		<div class="uk-category-blog">
			<?php the_category(' | '); ?>
		</div>
		<div class="uk-data-post">
			<?php echo get_the_date('j-n-Y'); ?>
		</div>
	</div>
	<div class="uk-child-width-expand uk-grid-large uk-flex-middle uk-grid" uk-grid>
		<div class="uk-width-expend@m uk-article-fix">
			<?php
			if ( has_post_thumbnail() ) { echo get_the_post_thumbnail($page->ID, 'medium',array('class' => 'uk-image-blog uk-box-shadow-medium')); }
			else { ?>
			<img class="uk-image-blog uk-box-shadow-medium" src="<?php bloginfo('template_url') ?>/app/img/wheat11.jpg" alt="">
			<?php } 
			?>
		</div>

		<div class="entry-content">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php mb_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
			<?php
			the_content();

			?>
		</div><!-- .entry-content -->
	</div>
	<?php the_tags('<ul class="uk-tag uk-flex uk-flex-row"><li>','</li><li>','</li></ul>'); ?>
	<footer class="entry-footer">
		<?php mb_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<hr>