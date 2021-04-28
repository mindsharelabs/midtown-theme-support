<?php

/**
 * Brand Specific Cards
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'vision-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'vision-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$vision_cards = get_field('vision_cards');

if(count($vision_cards['vision_cards']) > 1) :
  $i = 1;

  echo '<div class="' . $className . '" id="' . $id . '">';
    echo '<div class="container">';
        foreach($vision_cards['vision_cards'] as $key => $card) :
          $list_items = explode("\n", $card['list']);


          if($i % 2 != 0) {
            echo '<div class="row vision-card">';
              echo '<div class="col-12 col-md-3 offset-0 offset-md-1 vision-image left" ' . ($card['image'] ? 'style="background-image:url(' . $card['image']['sizes']['medium_large'] . ')"' : '') . '>';
                //no content
              echo '</div>';


              echo '<div class="col-12 col-md-7 vision-content" style="background-color: ' . $card['background_color'] . '; color: ' . midtown_getContrastColor($card['background_color']) . '">';
                echo '<h2 style="color:' . midtown_getContrastColor($card['background_color']) . '">' . $card['title'] . '</h2>';
                echo $card['content'];

                if($list_items) :
                  echo '<div class="list-items">';
                  foreach ($list_items as $key => $item) :
                    echo '<span class="list-icon">' . $item . '</span>';
                  endforeach;
                  echo '</div>';
                endif;
                echo '<div class="vertical-line right" style="border-color:' . $card['line_color'] . '"></div>';
              echo '</div>';

            echo '</div>';

          } else {
            echo '<div class="row vision-card">';

              echo '<div class="col-12 col-md-7 offset-0 offset-md-1  vision-content" style="background-color: ' . $card['background_color'] . '; color: ' . midtown_getContrastColor($card['background_color']) . '">';
                echo '<div class="vertical-line left" style="border-color:' . $card['line_color'] . '"></div>';
                echo '<h2 style="color:' . midtown_getContrastColor($card['background_color']) . '">' . $card['title'] . '</h2>';
                echo $card['content'];

                if($list_items) :
                  echo '<div class="list-items">';
                  foreach ($list_items as $key => $item) :
                    echo '<span class="list-icon">' . $item . '</span>';
                  endforeach;
                  echo '</div>';
                endif;

              echo '</div>';



              echo '<div class="col-12 col-md-3 order-first order-md-last vision-image right" ' . ($card['image'] ? 'style="background-image:url(' . $card['image']['sizes']['medium_large'] . ')"' : '') . '>';
                //no content
              echo '</div>';

            echo '</div>';
          }



          $i++;
        endforeach;
    echo '</div>';
  echo '</div>';



endif;
