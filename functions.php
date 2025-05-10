<?php

// security for WordPress functions.php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

// Images
add_theme_support('post-thumbnails');

add_theme_support('custom-logo', array(
  'height' => 70,
  'width' => 400,
  'flex-height' => true,
  'flex-width' => true,
));


// Register FAQ Custom Post Type
function matriarch_register_post_types()
{
  register_post_type('press', array(
    'labels' => array(
      'name' => __('Press'),
      'singular_name' => __('Press'),
      'add_new' => __('Add New Press'),
      'add_new_item' => __('Add New Press'),
      'edit_item' => __('Edit Press'),
      'new_item' => __('New Press'),
      'view_item' => __('View Press'),
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'press'),
    'menu_icon' => 'dashicons-media-document',
    'show_in_rest' => true,
    'rest_base' => 'press',
  ));
}

add_action('init', 'matriarch_register_post_types');

// Menus
add_theme_support('menus');

function matriarch_register_menus()
{
  register_nav_menus(array(
    'header-menu' => __('Header Menu'),
    'footer-menu' => __('Footer Menu'),
    'social-menu' => __('Social Menu'),
  ));
}
add_action('init', 'matriarch_register_menus');

// Styles and Scripts
function matriarch_enqueue_styles()
{
  wp_enqueue_style('matriarch-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'matriarch_enqueue_styles');

function matriarch_enqueue_scripts()
{
  wp_enqueue_script('matriarch-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'matriarch_enqueue_scripts');


/**
 * Register custom blocks
 */
function matriarch_register_blocks()
{
  // Check if Gutenberg is active
  if (!function_exists('register_block_type')) {
    return;
  }

  // Register blocks
  // require_once get_template_directory() . '/blocks/explainer-block/explainer-block.php';
}
add_action('init', 'matriarch_register_blocks', 9);
