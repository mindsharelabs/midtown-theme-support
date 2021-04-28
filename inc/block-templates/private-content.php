<?php

/**
 * Private Content
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'private-content' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'private-content';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


echo '<div class="' . $className . '" id="' . $id . '">';

  $allowed_user_roles = get_field('private_content');
  // Load values and assing defaults.
  $user = wp_get_current_user();

  if(($user && $allowed_user_roles['allowed_user_roles']) || $is_preview) :
    $user_roles = $user->roles;
    $permission = array_intersect ($allowed_user_roles['allowed_user_roles'] , $user_roles );
    if($permission || $is_preview) :

        if($is_preview || $permission) :
          echo '<div class="row" ' . ($is_preview ? 'style="padding: 10px; background: #eee;"' : '') . '>';
            echo '<div class="col-12">';
              echo '<div class="private-page-notice"><small>Private Content</small></div>';
              echo '<InnerBlocks />';
            echo '</div>';
          echo '</div>';
        endif;
    else :
      if(is_user_logged_in()) :
        echo '<div class="no-permission">You do not have the proper permission to view this content.</div>';
      else :
        echo '<div class="no-permission">Please <a href="' . wp_login_url() . '">login to</a> view this content.</div>';
      endif;
    endif;
  endif;

echo '</div>';
