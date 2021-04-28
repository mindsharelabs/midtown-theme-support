<?php

/**
 * Testimonial Slider
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$testimonial_slider = get_field('testimonial_slider');

if(count($testimonial_slider['testimonials']) > 1) :

  echo '<div class="' . $className . '" id="' . $id . '">';


    echo '<div class="midtown-testimonial-slider">';
      foreach($testimonial_slider['testimonials'] as $key => $testimonial) :
        echo '<div class="testimonial-slide">';
          echo '<figure>';
            echo '<blockquote class="blockquote">';
              echo $testimonial['quote'];
            echo '</blockquote>';
            echo '<figcaption class="blockquote-footer">';
              echo '<span class="citation">' . $testimonial['citation'] . '</span>';
              echo '<span class="position">' . $testimonial['position'] . '</span>';
            echo '</figcaption>';
          echo '</figure>';
        echo '</div>';
      endforeach;
    echo '</div>';


    echo '<div class="slide-nav">';
      echo '<div class="interaction front-slide-prev"><i class="fas fa-angle-left"></i></div>';
      echo '<div class="interaction front-slide-dots"></div>';
      echo '<div class="interaction front-slide-next"><i class="fas fa-angle-right"></i></div>';
    echo '</div>';


  echo '</div>';



endif;
