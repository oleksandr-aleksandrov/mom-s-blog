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
            <i uk-icon="icon: comments; ratio: 2"></i>
            <?php
            $comment_count = get_comments_number();
            if (1 === $comment_count) {
                printf(
                /* translators: 1: title. */
                    esc_html_e('One thought on &ldquo;%1$s&rdquo;', 'mb'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf( // WPCS: XSS OK.
                /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s Коментарiв ', '%1$s Коментарiв ', $comment_count, 'comments title', 'mb')),
                    number_format_i18n($comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
            ));
            ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'mb'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().
    $args = array(
        // изменяем текст кнопки отправки
        'label_submit' => 'Запостить коммент',
        'title_reply' => '',
        // удаляем сообщение со списком разрешенных HTML-тегов из-под формы комментирования
        'comment_notes_after' => '',
        // указываем собственный HTML-код для вывода поля комментария
//        'comment_field' => '<div class="uk-margin comment-form-comment">
//            <textarea class="uk-textarea" rows="5" placeholder="Textarea" aria-required="true"></textarea>
//        </div>',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">Залиште своє питання або відгук</label><br /><textarea id="comment" class="uk-textarea" rows="5" placeholder="Textarea" name="comment" aria-required="true"></textarea></p>',
    );
    comment_form($args);
    ?>

</div><!-- #comments -->
