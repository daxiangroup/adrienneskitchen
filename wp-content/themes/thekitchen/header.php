<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php echo $extraMeta; ?>
        <title>Adrienne's Kitchen</title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/foundation.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />
        <?php echo $extraStyleSheets; ?>
        <style>
            @font-face {
                font-family: 'Advent Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Advent Pro Regular'), local('AdventPro-Regular'), url(<?php bloginfo('stylesheet_directory'); ?>/css/AdventPro-400.woff) format('woff');
            }
            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 300;
                src: local('Roboto Light'), local('Roboto-Light'), url(<?php bloginfo('stylesheet_directory'); ?>/css/Roboto-300.woff) format('woff');
            }
            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 400;
                src: local('Roboto Regular'), local('Roboto-Regular'), url(<?php bloginfo('stylesheet_directory'); ?>/css/Roboto-400.woff) format('woff');
            }
            <?php echo $extraStyle; ?>
        </style>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr.js"></script>
    </head>
    <body<?= empty($bodyClass) === false ? ' class="'.$bodyClass.'"' : '' ?>>
    <div id="header" class="shadow-down">
        <div class="row">
            <div id="masthead" class="columns medium-12">
                <div id="neon-sign"></div>
                <div id="access" class="site-navigation">
                    <ul>
                        <li id="btn-home" class="btn" title="Bring me home!">
                            <a href="<?php echo site_url(); ?>">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/1.png">
                            </a>
                        </li>
                        <li id="btn-categories" class="btn">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/281.png" />
                            <div>Categories</div>
                            <?php ak_list_categories(); ?>
                        </li>
                        <li id="btn-tags" class="btn">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/432.png" />
                            <div>Tags</div>
                            <?php ak_list_tags(); ?>
                        </li>
                        <li id="btn-search" class="btn">
                            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                <button type="submit" id="btn-search-submit" onclick="$('#box-search-wrapper').removeClass('closed');">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/241.png" />
                                </button>
                                <div id="box-search-wrapper" class="box-search-wrapper closed">
                                    <input type="text" name="s" id="box-search" />
                                </div>
                            </form>
                        </li>
                    </ul>
                </div><!-- #access -->
            </div>
        </div>
    </div><!-- #header -->

    <div id="branding-container" class="row">
        <div class="columns small-12">
            <img id="branding" src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" />
        </div>
    </div>
    <div id="main-container" class="row">
        <div class="columns small-12 medium-9">
            <div id="main">
