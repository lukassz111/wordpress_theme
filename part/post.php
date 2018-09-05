<?php while ( have_posts() ) : the_post() ?>
    <article class="post">
        <h1><?php the_title(); ?></h1>
        <br/>
        <?php the_content(); ?>
        <hr class="end">
    </article>
<?php endwhile; ?>