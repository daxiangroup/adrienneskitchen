<?php
// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'the-kitchen') . get_query_var('paged');
    }
} // end get_page_number

show_admin_bar(false);

/**
 * Hooks
 ******************************************************************************/
add_action('init', 'ak_create_post_type');
add_image_size('recipe-hero-720', 720);
add_image_size('recipe-hero-349', 349);
add_image_size('recipe-hero-200', 200);


/**
 * Implementations
 ******************************************************************************/

/**
 * ak_create_post_type()
 *
 * This function creates the 'recipe' post type that we can tell ReciPress to
 * attach the recipe output to. We do this so that there can be blog posts in
 * this installation as well as recipe posts and we don't have to mangle the
 * templating.
 *
 * @return void
 */
function ak_create_post_type()
{
    register_post_type('recipe', array(
        'labels' => array(
            'name' => __('Recipes'),
            'singular_name' => __('Recipe')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
        ),
        'taxonomies' => array('category', 'post_tag'),
    ));
}


function ak_recipe_ingredients($ingredients)
{
    //echo '<pre>'.print_r($ingredients,true).'</pre>';
    foreach ($ingredients as $ingredient) {
        $row =  '<div class="ingredient-row">';
        $row .= '   <div class="amount">'.$ingredient['amount'].'&nbsp;</div>';
        $row .= '   <div class="measurement">'.$ingredient['measurement'].'</div>';
        $row .= '   <div class="ingredient">'.$ingredient['ingredient'].'</div>';
        if (!empty($ingredient['notes'])) {
            $row .= '   <div class="notes">, '.$ingredient['notes'].'</div>';
        }
        $row .= '</div>';
        echo $row;

        unset($row);
    }
}

function ak_recipe_instructions($instructions)
{
    //echo '<pre>'.print_r($instructions,true).'</pre>';
    foreach ($instructions as $step => $instruction) {
        $float = $step % 3 ? 'right' : 'left';

        $row =  '<div class="instruction-row">';
        $row .= '   <div class="step">Step '.($step+1).'</div>';
        $row .= '   <div class="instruction">';
        if (!empty($instruction['image'])) {
            $row .= '       <a href="http://placekitten.com/500/700" rel="lightbox['.rand(5,23423).']">'.wp_get_attachment_image($instruction['image'], 'thumbnail', false, array(
                'class' => $float,
            )).'</a>';
        }
        $row .= '       '.$instruction['description'];
        $row .= '   </div>';
        $row .= '</div>';
        echo $row;

        unset($row);
    }
}

function ak_related_recipes($postID, $hasPosts = false)
{
    $tags = wp_get_post_tags($postID);

    if ($tags) {
        $first_tag = $tags[0]->term_id; // we only need the id of first tag

        // arguments for query_posts : http://codex.wordpress.org/Function_Reference/query_posts
        $args = array(
                'tag__in' => array($first_tag, $tags[1]->term_id),
                'post__not_in' => array($postID),
                'showposts' => 4, // these are the number of related posts we want to display
                'ignore_sticky_posts' => 1, // to exclude the sticky post
                'post_type' => 'recipe', // we only want related recipes
                );

        // WP_Query takes the same arguments as query_posts
        $related_query = new WP_Query($args);

        if ($related_query->have_posts()) {
            // If we're in this block and we've asked for the $hasPosts boolean,
            // we return true, to show that we the supplied post does have related
            // posts.
            if ($hasPosts) {
                return true;
            }
        ?>
            <ul class="related-posts">
                <?php
                while ($related_query->have_posts()) : $related_query->the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink() ?>" > <?php the_title();?> </a>
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
        <?php
        }
        wp_reset_query(); // to reset the loop : http://codex.wordpress.org/Function_Reference/wp_reset_query
    }
}

function ak_recipe_sub_navigation()
{
    $output  = '<ul>';
    $output .= '    <li><a href="#the-details">The Details</a></li>';
    $output .= '    <li><a href="#ingredients">Ingredients</a></li>';
    $output .= '    <li><a href="#what-to-do">What To Do</a></li>';
    $output .= '</ul>';

    echo $output;
}

function ak_post_image($ID, $imageType)
{
    // Hero Image
    $args = array(
        'post_type' => 'attachment',
        'numberposts' => 1,
        'post_status' => null,
        'post_parent' => $ID,
    );
    $attachment = get_posts($args);

    switch ($imageType) {
        case 'recipe-hero-720':
            $extras = array('class'=>'hero-image');
            break;
        default:
            $extras = array();
            break;
    }

    echo wp_get_attachment_image($attachment[0]->ID, $imageType, false, $extras);
}

function ak_list_categories()
{
    $categories = get_categories(array(
        'type' => 'recipe',
        'orderby' => 'count',
        'order' => 'desc',
        'exclude' => '1,74',
    ));

    $output  = '<ul>';
    foreach ($categories as $category) {
        $output .= '    <li><a href="'.get_category_link($category->term_id).'"><div>'.$category->cat_name.'</div></a></li>';
    }
    $output .= '</ul>';

    echo $output;
}

function ak_list_tags()
{
    $tags = get_tags(array(
        'orderby' => 'count',
        'order' => 'desc',
    ));

    $output  = '<ul>';
    foreach ($tags as $tag) {
        $output .= '    <li><a href="'.get_tag_link($tag->term_id).'"><div>'.$tag->name.'</div></a></li>';
    }
    $output .= '</ul>';

    echo $output;
}

function ak_post_content($ID)
{
    $post = wp_get_single_post($ID);
    if (strlen($post->post_content) > 200) {
        return substr($post->post_content, 0, 250).'...';
    }
    return $post->post_content;
/*
    $postContent = explode(' ', $post->post_content);
    $elipsis = '';
    if (count($postContent) > 50) {
        $postContent = array_slice($postContent, 0, 50);
        $elipsis = '...';
    }

    return implode(' ', $postContent).$elipsis;
    */
}

function ak_post_categories($ID)
{
    $categories = wp_get_post_categories($ID);
    foreach($categories as $category){
        $category = get_category($category);
        if ($category->term_id == 74) { continue; }
        //$cats[] = array('name'=>$category->name, 'slug'=>$category->slug);
        $out[] = '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
    }

    echo implode(', ', $out);
}

function ak_post_tags($ID)
{
    $tags = wp_get_post_tags($ID);
    foreach($tags as $tag){
        $out[] = '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
    }

    echo implode(', ', $out);
}