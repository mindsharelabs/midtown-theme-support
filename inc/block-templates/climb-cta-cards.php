<?php

/**
 * Call to Action Cards
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'midtown-cta-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'midtown-cta-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$call_to_action_cards = get_field('call_to_action_cards');

if($call_to_action_cards['call_to_action_cards']) :

    echo '<div class="' . $className . '" id="' . $id . '">';
      echo '<div class="row">';

      foreach($call_to_action_cards['call_to_action_cards'] as $key => $card) :

        echo '<div class="col-12 col-md-4 mb-3">';
          echo '<div class="card cta-card text-white bg-primary mb-3 h-100 d-flex justify-content-between ' . ($card['image'] ? 'has-background' : '') . '" ' . ($card['image'] ? 'style="background-image: url(' . $card['image']['sizes']['grid-image'] . ');"' : '') . '>';
            if($card['title']) :
              echo '<div class="card-header">';
                echo '<h2 class="h3 text-white m-0">' . $card['title'] . '</h3>';
              echo '</div>';
            endif;
            if($card['description']) :
              echo '<div class="card-body">';
                echo '<span class="small">' . $card['description'] . '</span>';
              echo '</div>';
            endif;

            if($card['link']['url']) :
              echo '<div class="card-footer d-grid py-3">';
                echo '<a class="btn btn-white" href="' . $card['link']['url'] . '" title="' . $card['link']['title'] . '" target="' . $card['link']['target'] . '">' . $card['link']['title'] . ' <i class="fal fa-arrow-right fa-sm"></i></a>';
              echo '</div>';
            endif;


          echo '</div>';

        echo '</div>';


      endforeach;
      echo '</div>';
    echo '</div>';



endif;
