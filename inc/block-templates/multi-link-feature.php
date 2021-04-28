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
$id = 'multi-link-feature-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'multi-link-feature';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$multi_link_feature = get_field('multi_link_feature');

if(count($multi_link_feature['rectangle']) >= 3) :
  $i = 1;
  echo '<div class="container">';
    echo '<div class="' . $className . '" id="' . $id . '">';
      echo '<div class="row g-2">';

        foreach($multi_link_feature['rectangle'] as $key => $item) :
          if($i == 1) :
            echo '<div class="col-12 col-md-5 cell ' . $i . '">';
          endif;
          if($i == 3) :
            echo '<div class="col-12 col-md-3 cell ' . $i . '">';
          endif;
          if($i == 4) :
            echo '<div class="col-12 col-md-4 cell ' . $i . '">';
          endif;


            echo '<div class="tile ' . $item['link_align'] . ' ' . ($item['background_image'] ? '' : 'no-background') . '" ' . ($item['background_image'] ? 'style="background-image: url(' . $item['background_image']['sizes']['medium_large'] . ')"' : '') . '>';
              echo '<div class="blur"></div>';
              if($item['link']) :
                echo '<h2 class="background">&nbsp;&nbsp;';
                  echo ('<a href="' . $item['link']['url'] .'" title="' . $item['link']['title'] . '" target="' . $item['link']['target'] . '">');
                    echo $item['link']['title'];
                  echo '</a>';
                echo '&nbsp;&nbsp;</h2>';
              endif;
            echo '</div>';

          if($i == 2 || $i == 3 || $i == 5) :
            echo '</div>';
          endif;

          $i++;
        endforeach;

      echo '</div>';
    echo '</div>';
  echo '</div>';



endif;
