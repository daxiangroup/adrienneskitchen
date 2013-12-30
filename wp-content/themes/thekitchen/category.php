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
                <?php ak_post_image($post->ID, 'recipe-hero-349'); ?>
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
        <div class="panel-banner"><span>Recent</span></div>
        <div class="sub-navigation site-panel">
            <?php ak_recipe_sub_navigation(); ?>
        </div>

        <div class="panel-banner"><span>Vitals</span></div>
        <div class="vitals site-panel">

            Cuisine: <?php echo recipress_recipe('cuisine'); ?> <br />
            Course: <?php echo recipress_recipe('course'); ?> <br />
            Skill: <?php echo recipress_recipe('skill_level'); ?> <br />
            Prep Time: <?php echo recipress_recipe('prep_time', 'mins'); ?> <br />
            Cook Time: <?php echo recipress_recipe('cook_time', 'mins'); ?> <br />
            Ready Time: <?php echo recipress_recipe('ready_time', 'mins'); ?> <br />
            Yield: <?php echo recipress_recipe('yield'); ?> <br />
        </div>

        <div class="panel-banner"><span>Related Recipes</span></div>
        <div class="related-recipes site-panel">
            <?php ak_related_recipes($post->ID); ?>
        </div>

    </div>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
