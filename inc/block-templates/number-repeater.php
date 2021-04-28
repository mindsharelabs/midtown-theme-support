<?php

/**
 * Number Repeater
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'number-repeater-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'number-repeater';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$number_repeater = get_field('number_repeater');
if($number_repeater) :
  echo '<div class="' . $className . '" id="' . $id . '">';

    echo '<div class="row my-4">';
      foreach ($number_repeater['stats'] as $key => $stat) :
        echo '<div class="col-6 col-md-3 number-container text-center mb-4 mb-md-0">';

          echo '<h3 class="count-up number" data-count="' . $stat['number']  .'">0</h3>';
          echo '<span class="label">' . $stat['label'] . '</span>';

        echo '</div>';
      endforeach;
    echo '</div>';

  echo '</div>';
endif;
