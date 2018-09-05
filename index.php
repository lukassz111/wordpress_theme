<?php get_header(); ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-lg-2">
                <?php get_template_part('part/sidebar','left'); ?>
            </div>
            <div class="col-md-10 col-lg-8">
            <?php
                if(is_singular())
                    get_template_part('part/post');
                else
                    get_template_part('part/post','short');
            ?>
            </div>
            <div class="col-md-1 col-lg-2">
                <?php get_template_part('part/sidebar','right'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>