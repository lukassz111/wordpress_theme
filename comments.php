<?php
//Get only the approved comments 
$args = array(
    'status' => 'approve'
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
?>
<section class="comments">
    <div class="comments-form">
        <?php comment_form(); ?>
        <hr>
    </div>
    <div class="comments-list">
        <?php if ( $comments ): foreach ( $comments as $comment ): ?>
        <div>
            <div class="comment-author">
                <?php echo get_avatar( $comment->comment_author_email, 96 );; ?>
                <div>
                    <p><?php echo $comment -> comment_author; ?></p>
                    <p><?php echo $comment -> comment_date; ?></p>
                </div>
            </div>
            <div class="comment-content">
                <?php echo $comment -> comment_content; ?>
            </div>
            <hr>
            <!--<code><pre><?php print_r($comment); ?></pre></code>-->
        </div>
        <?php endforeach; else: echo 'No comments found.'; endif; ?>
    </div>
</section>