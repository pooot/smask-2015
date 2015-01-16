<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
      'primary_navigation' => 'Huvudmeny',
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

    add_theme_support('custom-background', array(
        'default-color'          => '',
        'default-image'          => '',
    ));

    add_theme_support('custom-header', array(
        'default-image'          => '',
        'width'                  => 0,
        'height'                 => 0,
        'flex-width'             => true,
        'flex-height'            => true,
        'random-default'         => false,
        'header-text'            => false,
        'default-text-color'     => '',
        'uploads'                => true,
    ));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
      'id'            => 'rightsidebar',
      'name'          => 'Right sidebar',
      'description'   => '',
      'class'         => '',
      'before_widget' => '<section>',
      'after_widget'  => '</section>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
  ));
}
add_action('widgets_init', 'roots_widgets_init');
