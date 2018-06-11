<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MB
 */

get_header(); ?>
    <section class="error-404 not-found mb-section container d-flex flex-column align-items-center">
        <h2>
            404
        </h2>
        <p><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'mb'); ?></p>
        <a class="uk-home-link" href="<?php bloginfo('url'); ?>">Home</a>
    </section><!-- .error-404 -->
<?php
get_footer();
