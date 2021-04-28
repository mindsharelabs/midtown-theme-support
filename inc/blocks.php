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
			'name'              => 'midtown-cta-cards',
			'title'             => __('Call to Action Cards'),
			'description'       => __('CAll to action cards that span the width of the page.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/midtown-cta-cards.php',
			'category'          => 'mind-blocks',
			'icon'              => file_get_contents(MIDTOWN_ABSPATH . 'inc/img/logo.svg'),
			'keywords'          => array( 'call', 'action', 'post', 'midtown', 'mind', 'Mindshare' ),
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
			'category'          => 'mind-blocks',
			'icon'              => file_get_contents(MIDTOWN_ABSPATH . 'inc/img/logo.svg'),
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

		acf_register_block_type(array(
			'name'              => 'child-page-navigation',
			'title'             => __('Child Page Navigation'),
			'description'       => __('A block that displays all of the child pages with links.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/child-page-navigation.php',
			'category'          => 'mind-blocks',
			'icon'              => file_get_contents(MIDTOWN_ABSPATH . 'inc/img/logo.svg'),
			'keywords'          => array( 'child', 'navigation', 'children', 'midtown', 'mind', 'Mindshare' ),
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
			'name'              => 'private-content',
			'title'             => __('Private Content Container'),
			'description'       => __('A block that displays private content only to specific user roles.'),
			'render_template'   => MIDTOWN_ABSPATH . '/inc/block-templates/private-content.php',
			'category'          => 'mind-blocks',
			'icon'              => file_get_contents(MIDTOWN_ABSPATH . 'inc/img/logo.svg'),
			'keywords'          => array( 'private', 'content', 'container', 'board', 'midtown', 'mind', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'preview',
			'supports'					=> array(
				'align' => true,
	      'mode' => false,
	      'jsx' => true
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

		acf_add_local_field_group(array(
			'key' => 'group_6075d6c028d9d',
			'title' => 'Block: Blog Post List',
			'fields' => array(
				array(
					'key' => 'field_6075d6c407edc',
					'label' => 'Blog Post List',
					'name' => 'blog_post_list',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6075d6c907edd',
							'label' => 'Blog Categories',
							'name' => 'blog_categories',
							'type' => 'taxonomy',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'taxonomy' => 'category',
							'field_type' => 'checkbox',
							'add_term' => 0,
							'save_terms' => 0,
							'load_terms' => 0,
							'return_format' => 'id',
							'multiple' => 0,
							'allow_null' => 0,
						),
						array(
							'key' => 'field_6075d6eb07ede',
							'label' => 'Posts to Show',
							'name' => 'posts_to_show',
							'type' => 'number',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => 1,
							'max' => 12,
							'step' => '',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/midtown-blog-posts',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));

		endif;






});
