<?php
    get_header();
    the_post();
?>

<div id="container" class="shadow-all bordered">
    <div class="ctr-hero-image">
        <?php ak_post_image($post->ID, 'recipe-hero-720'); ?>
    </div>

    <div id="content" class="recipe-content">
        <div class="recipe-title">
            <span id="the-details" class="recipe-anchor"></span>
            <h1><?php single_post_title(); ?></h1>
            <div class="posted"><?php the_date(); ?></div>
        </div>

        <div class="recipe-description">
            <?php echo the_content(); ?>
        </div>

        <div class="recipe-banner">
            <span id="ingredients" class="recipe-anchor"></span>
            <div class="title"><div>Ingredients</div></div>
        </div>
        <div class="recipe-ingredients">
            <?php ak_recipe_ingredients(recipress_recipe('ingredients')); ?>
        </div>

        <div class="recipe-banner">
            <span id="what-to-do" class="recipe-anchor"></span>
            <div class="title"><div>What To Do</div></div>
        </div>
        <div class="recipe-instructions">
            <?php ak_recipe_instructions(recipress_recipe('instructions')); ?>
        </div>
    </div><!-- #content -->

    <div class="scrolled-sub-navigation">
        <?php ak_recipe_sub_navigation(); ?>
    </div>
</div><!-- #container -->
<!--
<div id="side-panels" class="widget-area">
    <div class="content">
        <div class="panel-banner"><span>Jump To</span></div>
        <div class="sub-navigation site-panel">
            <?php ak_recipe_sub_navigation(); ?>
        </div>

        <div class="panel-banner stopper"><span>Timing</span></div>
        <div class="vitals site-panel">
            <div class="vital-label">Prep Time</div>
            <div class="vital-data"><?php echo ak_recipress_recipe('prep_time', 'mins'); ?></div>
            <div class="vital-label">Cook Time</div>
            <div class="vital-data"><?php echo ak_recipress_recipe('cook_time', 'mins') ; ?></div>
            <div class="vital-label">Ready In</div>
            <div class="vital-data"><?php echo ak_recipress_recipe('ready_time', 'mins'); ?></div>
        </div>

        <div class="panel-banner"><span>Vitals</span></div>
        <div class="vitals site-panel">
            Cuisine: <?php echo recipress_recipe('cuisine'); ?> <br />
            Course: <?php echo recipress_recipe('course'); ?> <br />
            Skill: <?php echo recipress_recipe('skill_level'); ?> <br />
            Yield: <?php echo recipress_recipe('yield'); ?> <br />
            Categories: <?php echo ak_post_categories($post->ID); ?> <br />
            Tags: <?php echo ak_post_tags($post->ID); ?> <br />
        </div>

        <?php if (ak_related_recipes($post->ID, true)) { ?>
        <div class="panel-banner"><span>Related Recipes</span></div>
        <div class="related-recipes site-panel">
            <?php ak_related_recipes($post->ID); ?>
        </div>
        <?php } ?>

    </div>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
