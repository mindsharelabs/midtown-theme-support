<?php

/**
 * Blog Post List
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'midtown-blog-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'midtown-blog-posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$blog_post_list = get_field('blog_post_list');

if($blog_post_list) :
  $args = array(
    'posts_per_page' => $blog_post_list['posts_to_show'],
    'tax_query' => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $blog_post_list['blog_categories'],
      ),
    )
  );

  $posts = new WP_Query($args);

  if($posts->have_posts()) :
    echo '<div class="' . $className . ' row" id="' . $id . '">';
    $tools = array();

    while($posts->have_posts()) :
      $posts->the_post();


      echo '<div class="col-12 my-2">';

        echo '<div class="row no-gutters midtown-post-item">';
          echo '<div class="col-md">';
            echo '<div class="card-body">';
              echo '<h3 class="post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h3>';
              echo '<span class="small">' . get_the_excerpt() . '</span>';
              echo '<a class="text-primary link d-block" href="' . get_permalink() . '">Read More <i class="fal fa-arrow-right fa-sm"></i></a>';
            echo '</div>';
          echo '</div>';

        echo '</div>';

      echo '</div>';


    endwhile;
    echo '</div>';



  endif;
endif;
