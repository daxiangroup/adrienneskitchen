<?php
    the_post();
    get_header();
?>
<div class="akit-recipe">
    <div class="akit-recipe--hero-photo">
        <img src="http://akit.dev/wp-content/uploads/2013/05/chicken-fettuccine-e1369960151219.jpg" alt="" />
        <?php //ak_post_image($post->ID, 'recipe-hero-720'); ?>
    </div>

    <div class="container">
        <div class="row no-margin-bottom">
            <div class="col s12 z-depth-2 no-padding">
                <div class="akit-recipe--header">
                    <h1><?php single_post_title(); ?></h1>
                    <span class="posted"><?php the_date(); ?></span>

                    <div class="akit-recipe--header--social-media">
                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                        <a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterapi">Tweet</a>
                        <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
                        <div class="g-plusone" data-size="medium" data-annotation="none"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 z-depth-2 white">
                <div class="row akit-recipe--content">
                    <div class="col m7">

                        <div class="recipe-information">
                            <?php echo the_content(); ?>
                            <div class="read-more hide-on-med-and-up">
                                <a href="#">Expand</a>
                            </div>
                        </div>

                        <hr>

                        <h4>Ingredients:</h3>
                        <?php ak_recipe_ingredients(recipress_recipe('ingredients')); ?>

                        <hr>

                        <h4>Preparation:</h4>
                        <?php ak_recipe_instructions(recipress_recipe('instructions')); ?>
                    </div>
                    <div class="col m5 hide-on-small-and-down">right</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>