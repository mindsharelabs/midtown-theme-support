<?php
// Creating the widget
class midtown_widget extends WP_Widget {

  function __construct() {
    parent::__construct(

      // Base ID of your widget
      'midtown_widget',

      // Widget name will appear in UI
      __('Social Media Icons', 'wpb_widget_domain'),

      // Widget description
      array( 'description' => __( 'Simple width to display social media icons.', 'wpb_widget_domain' ), )
    );
  }

  // Creating widget front-end

  public function widget( $args, $instance ) {
    // mapi_write_log($instance);
    $icons = get_field('social_media_icons', 'widget_' . $args['widget_id']);

    $title = apply_filters( 'widget_title', $instance['title'] );

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    if($icons) :
      echo '<div class="d-flex flex-row flex-wrap">';
      foreach ($icons as $key => $icon) :
        echo '<a class="d-block me-2" href="' . $icon['link']['url'] . '" title="' . $icon['link']['title'] .'" target="' . $icon['link']['target'] . '"><i class="fa-2x ' . $icon['icon'] . '"></i></a>';
      endforeach;
      echo '</div>';
    endif;



    echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }

  // Class wpb_widget ends here
}


// Register and load the widget
function wpb_load_widget() {
  register_widget( 'midtown_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
