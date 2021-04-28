<?php
/**
* Register custom Gutenberg blocks category
*
*/
add_filter('block_categories', function ($categories, $post) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' 	=> 'midtown-blocks',
				'title' => __('MIDTOWN Blocks', 'mindshare'),
				'icon' 	=> file_get_contents(MIDTOWN_ABSPATH . 'inc/img/logo.svg'),
			),

		)
	);
}, 10, 2);



add_action( 'setup_theme', function() {
	// add_image_size( 'grid-image', 400, 400, array('center', 'center'));

}, 10, 1 );



add_action('acf/init', function () {
	// Check function exists.
	if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'              => 'branded-container',
			'title'             => __('Branded Container'),
			'description'       => __('A branded container block with a colorful background.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/branded-container.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'container', 'brand', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'preview',
			'supports'					=> array(
				'align' => false,
				'mode' => false,
				'jsx' => true
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});


				wp_register_style( 'midtown-slick-slider', MIDTOWN_URL . '/inc/css/slick.css', array());
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-slick-slider');});
				// wp_register_style( 'midtown-slick-slider-theme', MIDTOWN_URL . '/inc/css/slick-theme.css', array('midtown-slick-slider') );
				// add_action( 'get_footer', function () {wp_enqueue_style('midtown-slick-slider-theme');});

				wp_register_script('midtown-slick-js', MIDTOWN_URL . 'inc/js/slick.min.js', array('jquery'), MIDTOWN_PLUGIN_VERSION, true);
				wp_enqueue_script('midtown-slick-js');

				wp_register_script('midtown-slick-js-init', MIDTOWN_URL . 'inc/js/slick-init.js', array('jquery', 'midtown-slick-js'), MIDTOWN_PLUGIN_VERSION, true);
				wp_enqueue_script('midtown-slick-js-init');



				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'testimonials-slider',
			'title'             => __('Testimonial Slideshow'),
			'description'       => __('Automatically sliding testamonails with proper markup.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/testimonials-slider.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'testimonial', 'slider', 'slides', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
	      'mode' => false,
	      'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});


				wp_register_style( 'midtown-slick-slider', MIDTOWN_URL . '/inc/css/slick.css', array());
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-slick-slider');});
				// wp_register_style( 'midtown-slick-slider-theme', MIDTOWN_URL . '/inc/css/slick-theme.css', array('midtown-slick-slider') );
				// add_action( 'get_footer', function () {wp_enqueue_style('midtown-slick-slider-theme');});

				wp_register_script('midtown-slick-js', MIDTOWN_URL . 'inc/js/slick.min.js', array('jquery'), MIDTOWN_PLUGIN_VERSION, true);
				wp_enqueue_script('midtown-slick-js');

				wp_register_script('midtown-slick-js-init', MIDTOWN_URL . 'inc/js/slick-init.js', array('jquery', 'midtown-slick-js'), MIDTOWN_PLUGIN_VERSION, true);
				wp_enqueue_script('midtown-slick-js-init');



				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'vision-cards',
			'title'             => __('Vision Cards'),
			'description'       => __('Branding specific cards use to display the vision of the site on the site.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/vision-cards.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'cards', 'brand', 'vision', 'lifestyle', 'card', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
	      'mode' => false,
	      'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});


				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'number-repeater',
			'title'             => __('Column Number Counter'),
			'description'       => __('A block that displays number stats that count up.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/number-repeater.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'number','count', 'up', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
	      'mode' => false,
	      'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});

				wp_register_script('count-up-init', MIDTOWN_URL . 'inc/js/count-up-init.js', array('jquery'), MAPI_PLUGIN_VERSION, true);
				wp_enqueue_script('count-up-init');


				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'multi-link-feature',
			'title'             => __('Multi Link Feature'),
			'description'       => __('A feature block that displays multiple links and images.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/multi-link-feature.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'feature', 'links', 'images', 'gallery', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
	      'mode' => false,
	      'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});

				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'midtown-blog-posts',
			'title'             => __('Blog Post List'),
			'description'       => __('A simple block to display blog posts from a specific set of categories.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/midtown-blog-posts.php',
			'category'          => 'midtown-blocks',
			'icon'              => array(
			  'background' => '#E6E6E6',
			  'foreground' => '#D94D42',
			  'src' 			 => 'screenoptions',
			),
			'keywords'          => array( 'blog', 'post', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
	      'mode' => false,
	      'jsx' => false
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'midtown-block-styles', MIDTOWN_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('midtown-block-styles');});

				},
			)
		);





	}



	if( function_exists('acf_add_local_field_group') ):

	endif;






});
