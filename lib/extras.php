<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more()
{
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}

add_filter('excerpt_more', 'roots_excerpt_more');

// Disable the admin bar
add_filter('show_admin_bar', '__return_false');

function wpb_list_child_pages()
{

    global $post;

    if (is_page() && $post->post_parent) {
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
    } else {
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');
    }

    if ($childpages) {
        $string = '<ul class="list-unstyled">' . $childpages . '</ul>';
    }

    return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

function the_post_thumbnail_caption()
{
    global $post;

    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

    if ($thumbnail_image && isset($thumbnail_image[0])) {
        echo '<span>' . $thumbnail_image[0]->post_excerpt . '</span>';
    }
}

add_filter('rwmb_meta_boxes', 'smask_register_meta_boxes');

function smask_register_meta_boxes($meta_boxes)
{
    $prefix = 'smask_';

    // 1st meta box
    $meta_boxes[] = array(
        'id'       => 'facts',
        'title'    => 'Faktaruta',
        'pages'    => array('post'),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name'  => 'Text',
                'id'    => $prefix . 'facts',
                'type'  => 'wysiwyg',
                'clone' => false,
            ),
        )
    );

    $meta_boxes[] = array(
        'id'    => 'images',
        'title' => 'Bilder i högerkolumn',
        'pages'    => array('post'),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name'  => 'Bilder',
                'id'    => $prefix . 'images',
                'type'  => 'image_advanced',
                'clone' => false,
            ),
        )
    );

    $meta_boxes[] = array(
        'id'    => 'byline',
        'title' => 'Byline',
        'pages'    => array('post'),
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name' => 'Byline',
                'id' => $prefix . 'byline',
                'type' => 'wysiwyg',
                'clone' => false,
                'options' => array(
                    'media_buttons' => false,
                    'textarea_rows' => 3,
                )
            )
        )
    );

    return $meta_boxes;
}