<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB
 */

?>

</main>

<footer>
    <div class="site-info uk-container">

    </div>
    <div class="uk-copyright">
        <div class="uk-container">
            <span>
                <?php _e('Tetiana Aleksandrova © ', 'mb');
                echo date(Y); ?>
            </span>
        </div>
    </div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
