<?php
    get_header();
    the_post();
?>

<div id="container" class="shadow-all bordered">
    <div id="content">
        <div lass="recipe-title">
            <h1><?php single_post_title(); ?></h1>
            <div class="posted"><?php the_date(); ?></div>
        </div>

        <div class="recipe-description">
            <?php echo the_content(); ?>
        </div>

    </div><!-- #content -->

    <div class="scrolled-sub-navigation">
        <?php ak_recipe_sub_navigation(); ?>
    </div>
</div><!-- #container -->

<div id="side-panels" class="widget-area">
    <div class="content">
        <div class="panel-banner"><span>Sub-Nav</span></div>
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
    </div>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
