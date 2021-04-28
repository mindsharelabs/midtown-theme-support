<?php

/**
 * Branded Container
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'branded-container-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'branded-container';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$branded_container = get_field('branded_container');

mapi_write_log($branded_container);
if(!$branded_container) :
  $branded_container['container_width'] = 12;
endif;

if($branded_container['container_width'] != 12) :
  $offset = (12 - $branded_container['container_width']) / 2;
else :
  $offset = 0;
endif;



echo '<div class="' . $className . ' bg-' . $branded_container['container_background'] . '" id="' . $id . '" style="' . ($is_preview ? 'padding:10px; border: 2px solid #888;' : '') . '">';
  echo '<div class="container">';
    echo '<div class="row">';
      echo '<div class="col-12 py-2 offset-0 offset-md-' . $offset . ' col-md-' . $branded_container['container_width'] . '">';
        echo '<InnerBlocks  />';
      echo '</div>';
    echo '</div>';
  echo '</div>';
echo '</div>';
