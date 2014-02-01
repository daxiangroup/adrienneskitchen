<?php
    get_header();

    $category_ID = get_query_var('cat');

    $query = new WP_Query(array(
        'post_type' => 'recipe',
        'cat' => $category_ID,
        'orderby' => 'ID',
        'order' => 'desc',
    ));

    /* Restore original Post Data */
    wp_reset_postdata();
?>

<div class="category-title">
    <h1>Category: <?php single_cat_title(); ?></h1>
</div>

<div id="container" class="front-page">
    <?php
        while ($query->have_posts() ) {

            $query->the_post();
    ?>
    <div class="recipe-box<?php echo ($i % 2 ? ' even' : ''); ?> bordered shadow-all">
        <div class="img">
            <a href="<?php echo the_permalink(); ?>">
                <?php ak_post_image($post->ID, 'recipe-hero-369'); ?>
            </a>
        </div>
        <div class="content">
            <a href="<?php echo the_permalink(); ?>">
                <h2><?php echo get_the_title(); ?></h2>
            </a>
            <p><?php echo ak_post_content($post->ID); ?></p>
            <div class="info">
                <div class="categories" title="<?php echo get_the_title(); ?> Categories">
                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/281.png" />
                    <?php ak_post_categories($post->ID); ?>
                </div>
                <div class="tags" title="<?php echo get_the_title(); ?> Tags">
                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/432.png" />
                    <?php ak_post_tags($post->ID); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
            $i++;
        }
    ?>
</div><!-- #container -->

<div id="side-panels" class="widget-area">
    <div class="content">
        <div class="panel-banner stopper"><span>Recent</span></div>
        <div class="sub-navigation site-panel">
            <?php ak_recent_recipes(); ?>
        </div>

        <div class="panel-banner"><span>Favourites</span></div>
        <div class="favourite-recipes site-panel">
            <?php ak_favourite_recipes(); ?>
        </div>
    </div>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
