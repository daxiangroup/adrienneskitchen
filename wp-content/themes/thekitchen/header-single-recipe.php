<?php
$extraMeta        .= '<meta property="og:url" content="'.get_permalink().'" />'.PHP_EOL;
$extraMeta        .= '        <meta property="og:title" content="'.get_the_title().' - Adrienne\'s Kitchen" />'.PHP_EOL;
$extraMeta        .= '        <meta property="og:site_name" content="Adrienne\'s Kitchen" />'.PHP_EOL;
$extraMeta        .= '        <meta property="og:type" content="blog" />'.PHP_EOL;
$extraMeta        .= '        <meta property="og:image" content="'.ak_post_image($post->ID, 'recipe-hero-369', true).'" />'.PHP_EOL;

$extraStyleSheets .= '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_directory').'/css/recipes.css" />'.PHP_EOL;
$extraStyleSheets .= '        <link rel="stylesheet" href="'.get_bloginfo('stylesheet_directory').'/css/print.css" media="print" />'.PHP_EOL;

$bodyClass        .= 'single-recipe';

require_once('header.php');
