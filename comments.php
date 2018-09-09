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
    <div>
        <?php if ( $comments ): foreach ( $comments as $comment ): ?>
        <div>
            <p><?php echo $comment -> comment_author; ?></p>
            <p><?php echo $comment -> comment_date; ?></p>
            <p><?php echo $comment -> comment_content; ?></p>
            <hr>
        </div>
        <?php endforeach; else: echo 'No comments found.'; endif; ?>
    </div>
</section>