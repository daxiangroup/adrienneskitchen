<?php
    the_post();
    get_header();
?>
<div class="akit-recipe">
    <div class="akit-recipe--hero-photo z-depth-2">
        <!--<img src="http://akit.dev/wp-content/uploads/2013/05/chicken-fettuccine-e1369960151219.jpg" alt="" />-->
        <?php ak_post_image($post->ID, 'large'); ?>
    </div>

    <div class="container">
        <div class="row no-margin-bottom">
            <div class="col s12 z-depth-2 no-padding">
                <div class="akit-recipe--header">
                    <h1><?php single_post_title(); ?></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 z-depth-2 white">
                <div class="row akit-recipe--content">
                    <div class="col m7">

                        <div class="recipe-vitals">
                            <div class="course">
                                <div class="label">Course</div>
                                <?php echo recipress_recipe('course'); ?>
                            </div>
                            <div class="prep-time">
                                <div class="label">Prep Time</div>
                                <?php echo ak_recipress_recipe('prep_time', 'mins'); ?>
                            </div>
                            <div class="cook-time">
                                <div class="label">Cook Time</div>
                                <?php echo ak_recipress_recipe('cook_time', 'mins') ; ?>
                            </div>
                            <div class="yield">
                                <div class="label">Yield</div>
                                <?php echo recipress_recipe('yield'); ?>
                            </div>

                            <!-- TODO: Work out these final 'details' -->
                            <div class="details">
                                <div class="label">Cuisine:</div><?php echo recipress_recipe('cuisine'); ?> <br />

                                <div class="vital-label">Ready In</div>
                                <div class="vital-data"><?php echo ak_recipress_recipe('ready_time', 'mins'); ?></div>

                                Skill: <?php echo recipress_recipe('skill_level'); ?> <br />
                                Categories: <?php echo ak_post_categories($post->ID); ?> <br />
                                Tags: <?php echo ak_post_tags($post->ID); ?> <br />
                            </div>
                        </div>

                        <div class="recipe-information">
                            <?php the_content(); ?>
                            <div class="read-more hide-on-med-and-up">
                                <a href="#">Expand</a>
                            </div>
                        </div>

                        <div class="recipe-ingredients">
                            <h4>Ingredients:</h3>
                            <?php ak_recipe_ingredients(recipress_recipe('ingredients')); ?>
                        </div>

                        <div class="recipe-instructions">
                            <h4>Preparation:</h4>
                            <?php ak_recipe_instructions(recipress_recipe('instructions')); ?>
                        </div>

                        <?php ak_recipe_photos(recipress_recipe('instructions')); ?>
                    </div>

                    <div class="col m5 hide-on-small-and-down recipe-sidebar">
                        <div class="recipe-sidebar--social-media">
                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                            <a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterapi">Tweet</a>
                            <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
                            <div class="g-plusone" data-size="medium" data-annotation="none"></div>
                        </div>

                        <div class="recipe-recents">
                            <?php ak_recent_recipes(); ?>
                        </div>

                        <div class="recipe-favourites">
                            <?php ak_favourite_recipes(); ?>
                        </div>

                        <?php ak_related_recipes($post->ID); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>