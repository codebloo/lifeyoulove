<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Home Menu' ),
	  'footer-menu' => __( 'Footer Menu' ),
	  'blog-menu' => __( 'Blog Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_theme_support('post-thumbnails');
add_image_size( 'slides', 940, 480, true ); // 940 pixels wide by 480 pixels tall, hard crop mode
add_image_size( 'blogpost', 600, 400, true ); // 940 pixels wide by 480 pixels tall, hard crop mode
add_image_size( 'hero', 1920, 600, true ); // 1920 pixels wide by 600 pixels tall, hard crop mode


add_post_type_support( 'page', 'excerpt' );


/*-----------------------------------------------------------------------------------*/
/* Equeue JS
/*-----------------------------------------------------------------------------------*/

function js_scripts_load_cdn()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );
	wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ) );

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'js_scripts_load_cdn' );

/*-----------------------------------------------------------------------------------*/
/* Equeue CCS
/*-----------------------------------------------------------------------------------*/

function css_styles()
{

	// Register the style like this for a theme:
	wp_register_style( 'grid', get_template_directory_uri() . '/css/simple-grid.css', array(), '', 'all' );
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', array(), '', 'all' );
	wp_register_style( 'bodyfonts', '//fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i||Source+Sans+Pro:400,700', array(), '', 'all' );
	wp_register_style( 'fa', get_template_directory_uri() . '/css/fontawesome-all.min.css', array(), '', 'all' );
	wp_register_style( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css', array(), '', 'all' );
	wp_register_style( 'slick-theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.css', array(), '20160101', 'all' );
	wp_register_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '', 'all' );
	wp_register_style( 'wp', get_template_directory_uri() . '/css/wp.css', array(), '', 'all' );

	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'grid' );
	wp_enqueue_style( 'base' );
	wp_enqueue_style( 'bodyfonts' );
	wp_enqueue_style( 'fa' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'custom' );
	wp_enqueue_style( 'wp' );
}
add_action( 'wp_enqueue_scripts', 'css_styles' );

/*-----------------------------------------------------------------------------------*/
/* Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {
			register_sidebar(array('name'=>'Default',
					'id'=>'Default',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				));
				
			register_sidebar(array('name'=>'Footer Left',
					'id'=>'footerleft',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3>',
					'after_title' => '</h3>',
				));	
				
			register_sidebar(array('name'=>'Footer Right',
					'id'=>'footerright',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3>',
					'after_title' => '</h3>',
				));	
				
			register_sidebar(array('name'=>'Blog',
					'id'=>'Blog',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				));	
}

/*-----------------------------------------------------------------------------------*/
/* Options
/*-----------------------------------------------------------------------------------*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
			'page_title' 	=> ' LYL Settings',
			'menu_title'	=>  'LYL Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}

/*-----------------------------------------------------------------------------------*/
/* Courses
/*-----------------------------------------------------------------------------------*/
	
add_action( 'init', 'register_cpt_courses' );

function register_cpt_courses() {

    $labels = array( 
        'name' => _x( 'Courses', 'courses' ),
        'singular_name' => _x( 'Course', 'courses' ),
        'add_new' => _x( 'Add New', 'courses' ),
        'add_new_item' => _x( 'Add New Course', 'courses' ),
        'edit_item' => _x( 'Edit Course', 'courses' ),
        'new_item' => _x( 'New Course', 'courses' ),
        'view_item' => _x( 'View Course', 'courses' ),
        'search_items' => _x( 'Search courses', 'courses' ),
        'not_found' => _x( 'No Curses found', 'courses' ),
        'not_found_in_trash' => _x( 'No Courses found in Trash', 'courses' ),
        'parent_item_colon' => _x( 'Parent Course:', 'courses' ),
        'menu_name' => _x( 'Courses', 'courses' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
    
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
    
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'courses', $args );
}

/*-----------------------------------------------------------------------------------*/
/* WOOCOMMERCE
/*-----------------------------------------------------------------------------------*/

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );



// Remove the "End Date" column from the My Memberships table
function sv_remove_membership_end_date_column( $columns ) {
	unset( $columns['membership-end-date'] );
	return $columns;
}
add_filter( 'wc_memberships_my_memberships_column_names', 'sv_remove_membership_end_date_column' );





?>
