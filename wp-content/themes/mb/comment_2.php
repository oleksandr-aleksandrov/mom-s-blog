<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to vodolaha_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div class="uk-section uk-section-comments uk-margin-medium-bottom uk-margin-medium-top">
    <div class="uk-container">

        <div uk-grid>
            <div class="uk-width-1-1@s">
                <div id="comments" class="comments-area">

                    <?php if (have_comments()) : ?>
                        <h2 class="comments-title">
                            <?php
                            printf(
                                _n('Один коментар про &ldquo;%2$s&rdquo;', '%1$s коментарі про &ldquo;%2$s&rdquo;', get_comments_number(), 'vodolaha'),
                                number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'
                            );
                            ?>
                        </h2>

                        <div class="commentlist">
                            <?php
                            wp_list_comments(
                                array(
                                    'callback' => 'vodolaha_comment',
                                    'style' => 'div',
                                )
                            );
                            ?>
                        </div><!-- .commentlist -->

                    <?php endif; // have_comments() ?>

                    <?php comment_form(); ?>

                </div><!-- #comments .comments-area -->

            </div>
        </div>

    </div>
</div>