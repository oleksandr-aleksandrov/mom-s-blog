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

<footer class="main-footer">
    <!--    <div class="uk-footer-navigation">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-6">-->
    <!--                    <nav>-->
    <!--                        <ul>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                            <li>asdsad</li>-->
    <!--                        </ul>-->
    <!--                    </nav>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="uk-copyright">
        <div class="container">
            <div class="align-items-center d-flex justify-content-between">

                <span>
                    <?php _e('Tetiana Aleksandrova © ', 'mb');
                    echo date('Y'); ?>
                </span>
                <a id="up" href="#">
                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
