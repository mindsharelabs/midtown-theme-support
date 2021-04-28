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
        'terms'    => $blog_post_list['blog_category'],
      ),
    )
  );

  $posts = new WP_Query($args);

  if($posts->have_posts()) :
    echo '<div class="container">';
      echo '<div class="' . $className . '" id="' . $id . '">';


        echo '<div class="row">';
          echo '<div class="col-12 col-md-3 offset-0 offset-md-1">';
            if($blog_post_list['blog_category']) :
              echo '<h2>' . get_term( $blog_post_list['blog_category'] )->name . '</h2>';
              echo '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" title="' . get_the_title( get_option( 'page_for_posts' ) ) . '">';
                echo 'View All  <i class="arrow fas fa-angle-double-right"></i>';
              echo '</a>';
            endif;
          echo '</div>';


          echo '<div class="col-12 col-md-7">';
            while($posts->have_posts()) :
              $posts->the_post();

              echo get_template_part( 'loop-post');
            endwhile;

          echo '</div>';


      echo '</div>';
    echo '</div>';



  endif;
endif;
