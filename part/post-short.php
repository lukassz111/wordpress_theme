<?php while ( have_posts() ) : the_post() ?>
    <article class="post">
        <h1><?php the_title(); ?></h1>
        <br/>
        <?php the_excerpt(); ?>
        <div class="more">
            <span><a href="<?php echo esc_url(get_permalink($post->ID)); ?>">Więcej</a></span>
        </div>
        <hr class="end">
    </article>
<?php endwhile; ?>