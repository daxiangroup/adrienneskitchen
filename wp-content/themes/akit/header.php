<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title>Adrienne's Kitchen</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/akit.min.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/materialize.min.css">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <script>(function(){document.documentElement.className='js'})();</script>
    <style>
        @font-face {
            font-family: 'Advent Pro';
            font-style: normal;
            font-weight: 400;
            src: local('Advent Pro Regular'), local('AdventPro-Regular'), url(<?php bloginfo('stylesheet_directory'); ?>/font/adventpro/AdventPro-400.woff) format('woff');
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>