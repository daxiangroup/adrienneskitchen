<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Adrienne's Kitchen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/style.css">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/roboto.css">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/adventpro.css">
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <div id="header" class="shadow-down">
        <div id="masthead" class="site-width">
            <div id="neon-sign" class="site-width"></div>
            <div id="access" class="site-width site-navigation">
                <ul>
                    <li id="btn-home" class="button" title="Bring me home!">
                        <a href="<?php echo site_url(); ?>">
                            <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/1.png">
                        </a>
                    </li>
                    <li id="btn-categories" class="button">
                        <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/281.png" />
                        <div>Categories</div>
                        <?php ak_list_categories(); ?>
                    </li>
                    <li id="btn-tags" class="button">
                        <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/432.png" />
                        <div>Tags</div>
                        <?php ak_list_tags(); ?>
                    </li>
                    <li id="btn-search" class="button">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <button type="submit" id="btn-search-submit">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/241.png" />
                            </button>
                            <input type="text" name="s" id="box-search" />
                        </form>
                    </li>
                </ul>
            </div><!-- #access -->
        </div><!-- #masthead -->

    </div><!-- #header -->

    <div id="wrapper" class="site-wrapper site-width hfeed">
        <div id="branding"></div>

        <div id="main">