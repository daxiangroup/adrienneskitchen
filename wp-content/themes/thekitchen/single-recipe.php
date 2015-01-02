<?php
    the_post();
    get_header('single-recipe');
?>

<div id="container" class="shadow-all bordered">
    <div class="ctr-hero-image">
        <?php ak_post_image($post->ID, 'recipe-hero-720'); ?>
    </div>

    <div id="content" class="recipe-content">
        <div class="social-media">
            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterapi">Tweet</a>
            <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
            <div class="g-plusone" data-size="medium" data-annotation="none"></div>
        </div>

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

<?php get_footer('single-recipe'); ?>
