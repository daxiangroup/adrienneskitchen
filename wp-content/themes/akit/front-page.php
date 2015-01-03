<?php
/**
 * The front page template file
 *
 */

get_header();

$query = new WP_Query(array(
    'post_type' => 'recipe',
    'category_name' => 'front-page',
    'orderby' => 'ID',
    'order' => 'desc',
));

/* Restore original Post Data */
wp_reset_postdata();

$front_content = get_post(2);?>

<div id="container">
    <div class="content-panel shadow-all bordered">
        <?php echo $front_content->post_content; ?>
    </div>

    <?php
        while ($query->have_posts() ) {

            $query->the_post();
    ?>
    <div class="recipe-box<?php echo ($i % 2 ? ' even' : ''); ?> bordered shadow-all">
        <div class="img">
            <a href="<?php echo the_permalink(); ?>">
                <?php ak_post_image($post->ID, 'recipe-hero-369'); ?>
            </a>
        </div>
        <div class="content">
            <a href="<?php echo the_permalink(); ?>">
                <h2><?php echo get_the_title(); ?></h2>
            </a>
            <p><?php echo ak_post_content($post->ID); ?></p>
            <div class="info">
                <div class="categories" title="<?php echo get_the_title(); ?> Categories">
                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/281.png" />
                    <?php ak_post_categories($post->ID); ?>
                </div>
                <div class="tags" title="<?php echo get_the_title(); ?> Tags">
                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/432.png" />
                    <?php ak_post_tags($post->ID); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
            $i++;
        }
    ?>
</div>

<?php get_footer(); ?>