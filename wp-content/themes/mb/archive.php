<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
 */

get_header(); ?>


    <section class="uk-section">
        <div class="uk-container">
            <h1 class="uk-text-center">
                Welcome to the Blog
            </h1>
            <p class="uk-text-center">
                Слоган про свiй БЛОГ
            </p>
        </div>
    </section>

    <div class="uk-container uk-margin-medium-bottom">
    <div uk-grid>
        <div class="uk-width-1-4 uk-visible@m">
            <ul>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
                <li>lorem ssdas a da sd</li>
            </ul>
        </div>
        <div class="mb-archive-page uk-width-1-1 uk-width-3-4@m">
            <?php
            if (have_posts()) : ?>

                <!--	<header class="page-header">-->
                <!--		--><?php
//		the_archive_title( '<h1 class="page-title">', '</h1>' );
//		the_archive_description( '<div class="archive-description">', '</div>' );
//		?>
                <!--	</header>-->

                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    switch (get_post_type()) {
                        case 'vi_news':
                            render_partial('template-parts/news_content', ['post' => get_post()]);
                            break;
                        case 'photo':
                            render_partial('template-parts/1_4_', ['post' => get_post()]);
                            break;

                    }
                endwhile; ?>

                <?php
            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>
            <div class="infinite-loader uk-margin-medium-top uk-margin-small-bottom uk-flex uk-flex-center"
                 uk-spinner></div>

        </div>
    </div>
<?php
get_footer();
