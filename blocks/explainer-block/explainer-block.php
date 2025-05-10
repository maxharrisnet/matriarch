<?php

/**
 * Register the Explainer Block for the Matriarch theme
 */

function matriarch_register_explainer_block()
{
  register_block_type(__DIR__, array(
    'render_callback' => 'matriarch_render_explainer_block',
  ));
}
add_action('init', 'matriarch_register_explainer_block');

/**
 * Server-side rendering of the block
 */
function matriarch_render_explainer_block($attributes, $content)
{
  $title = isset($attributes['title']) ? $attributes['title'] : 'What Are Dental Implants?';
  $description = isset($attributes['description']) ? $attributes['description'] : 'An implant is a small metal screw that replaces an entire tooth...';
  $secondParagraph = isset($attributes['secondParagraph']) ? $attributes['secondParagraph'] : 'Getting dental implants is a big deal...';
  $imageUrl = isset($attributes['imageUrl']) ? $attributes['imageUrl'] : get_template_directory_uri() . '/assets/images/default-explainer.jpg';
  $imageAlt = isset($attributes['imageAlt']) ? $attributes['imageAlt'] : 'Dental implant explained';
  $backgroundColor = isset($attributes['backgroundColor']) ? $attributes['backgroundColor'] : '#000000';
  $textColor = isset($attributes['textColor']) ? $attributes['textColor'] : '#ffffff';

  // Create the HTML output
  $output = '<div class="explainer-section" style="background-color: ' . esc_attr($backgroundColor) . '; color: ' . esc_attr($textColor) . ';">
        <div class="container explainer-container">
            <div class="explainer-image-wrapper">
                <img src="' . esc_url($imageUrl) . '" alt="' . esc_attr($imageAlt) . '" class="explainer-image" />
            </div>
            <div class="explainer-content">
                <h2 class="explainer-title">' . esc_html($title) . '</h2>
                <div class="explainer-description">
                    <p>' . wp_kses_post($description) . '</p>
                    <p>' . wp_kses_post($secondParagraph) . '</p>
                </div>
            </div>
        </div>
    </div>';
  return $output;
}
