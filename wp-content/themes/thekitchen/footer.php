            </div> <!-- #main -->
        </div>
        <div class="columns medium-3 show-for-medium-up">
            <div id="side-panels" class="widget-area">
                <div class="content">
                    <div class="panel-banner"><span>Recent</span></div>
                    <div class="recent-recipes site-panel">
                        <?php ak_recent_recipes(); ?>
                    </div>

                    <div class="panel-banner"><span>Favourites</span></div>
                    <div class="favourite-recipes site-panel">
                        <?php ak_favourite_recipes(); ?>
                    </div>
                </div>
            </div><!-- #primary .widget-area -->
        </div>
    </div>

    <?php require_once('footer-common.php');
