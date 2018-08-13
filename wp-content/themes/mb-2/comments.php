<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB
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

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    'Comments';
    if (have_comments()) : ?>
        <h2 class="comments-title">

            <?php
            $comment_count = get_comments_number();
            if (1 === $comment_count) {
                printf(
                /* translators: 1: title. */
                    esc_html_e('One thought on &ldquo;%1$s&rdquo;', 'mb'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else { ?>
                <span>
                    <?php _e('Коментарi', 'mb'); ?>
                </span>
                <?php
                echo '<i class="mx-2 fa fa-comments-o" aria-hidden="true"></i>';
                echo $comment_count;
            } ?>


        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'avatar_size' => 40,
                'style' => 'ul',
                'short_ping' => true,
            ));
            ?>
        </ul><!-- .comment-list -->
        <?php
        $args = array('reply_text' => "ответить на комментарий", 'depth' => 5);
        comment_reply_link($args);
        ?>
        <?php the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we ?
        if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Коментарi закритi!.', 'mb'); ?></p>
            <?php
        endif;

    endif; ?>
    <!--    Ваш e-mail не будет опубликован. Обязательные поля помечены *-->
    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $fields = array(
        'author' => '<div class="comment-form-author col-12 col-md-6 position-relative">' .
            '<input id="author" class="uk-input commentName field p-1" placeholder="Iм`я*" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
        'email' => '<div class="comment-form-email col-12 col-md-6 position-relative">' .
            '<input id="email" class="uk-input commentMail field p-1" placeholder="Email*" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
    );
    $comments_args = array(
        'fields' => $fields,
        'label_submit' => 'Залишити коментар',
        'class_submit' => 'uk-button-more commentSubmit',
        'submit_field' => '<p class="col-md-12 form-submit my-4">%1$s %2$s</p>',
        'title_reply' => '',
        'class_form' => 'commentForm comment-form row',
        'comment_notes_after' => '',
        'title_reply' => __(''),
        'title_reply_to' => __('Вiдповiсти %s'),
        'title_reply_before' => '',
        'comment_notes_before' => '<p class="col-md-12 uk-before-notes">Ваш e-mail не буде опублікований. Обов\'язкові поля помічені *</p>',
        'comment_notes_after' => '',
        'cancel_reply_before' => ' <small>',
        'cancel_reply_after' => '</small>',
        'cancel_reply_link' => __('Вiдмiнити вiдповiдь'),
        'comment_field' => '<div class="comment-form-comment col-md-12 position-relative"><label for="comment">Залиште своє питання або відгук</label><br /><textarea id="comment" class="uk-textarea mt-3 commentMessage field" rows="5" placeholder="Текст повiдомлення* ..." name="comment" aria-required="true"></textarea></div>',
    );
    comment_form($comments_args);
    ?>
</div><!-- #comments -->
