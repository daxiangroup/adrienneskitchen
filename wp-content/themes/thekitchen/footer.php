            </div> <!-- #main -->
        </div>
        <div class="columns large-3">

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



        </div>
    </div>
<!--    
        </div><!-- #main --

        <div id="footer">
            <div id="colophon">
                <div id="site-info">
                </div><!-- #site-info --
            </div><!-- #colophon --
        </div><!-- #footer --
    </div><!-- #wrapper -->

    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/foundation.min.js"></script>
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/plugins.js"></script>
    <script>
      $(document).foundation();
    </script>

    <?php wp_footer(); ?>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>
