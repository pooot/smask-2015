<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function roots_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'roots_body_class');

//Get Featured Image URL
function wp_get_thumbnail_url($id, $size){
	if(has_post_thumbnail($id)){
		$imgArray = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
		$imgURL = $imgArray[0];
		return $imgURL;
	}else{
		return false;
	}
}