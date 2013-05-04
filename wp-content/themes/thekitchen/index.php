<?php get_header(); ?>

<div id="container">

    <div id="content">
        <?php while ( have_posts() ) : the_post() ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
    </div><!-- #content -->

</div><!-- #container -->

<div id="primary" class="widget-area">
</div><!-- #primary .widget-area -->

<div id="secondary" class="widget-area">
</div><!-- #secondary -->

<?php get_footer(); ?>