<?php

	
function side_init()  {
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	//add_theme_support( 'jetpack-responsive-videos' );
	set_post_thumbnail_size( 1090, 613, true );
	add_image_size( 'large', 1090, 613, true );
	add_image_size( 'slider', 623, 350, true );
	add_image_size( 'thumb', 250, 250, true );
	add_image_size( 'header', 1090, 250, true );
	add_image_size( 'project', 301, 167, true );
	add_image_size( 'news', 340, 340 );
	add_editor_style( 'editor-style.css' );	
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	
}
add_action( 'after_setup_theme', 'side_init' );

function side_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/gumby.min.js', false, '2.6', true );
	wp_register_script( 'cookie', get_template_directory_uri() . '/js/libs/cookie.js', false, '1.4.1', true );
	wp_register_script( 'owl', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', false, '1.4.1', true );
	wp_register_script( 'capslide', get_template_directory_uri() . '/js/capSlide.js', false, '1.4.1', true );
	wp_register_script( 'gmap', '//maps.googleapis.com/maps/api/js?sensor=false&region=GB', false, '6.0.0', true );
	wp_register_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.js', false, '6.0.0', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', false, '2.6', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'gumby' );
	wp_enqueue_script( 'owl' );
	wp_enqueue_script( 'capslide' );
	wp_enqueue_script( 'cookie' );
	wp_enqueue_script( 'gmap' );
	wp_enqueue_script( 'gmap3' );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'side_scripts' );

function side_styles() {
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '2.6' );
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, '3.0.1' );
	wp_register_style( 'owl', get_template_directory_uri() . '/owl-carousel/owl.carousel.css', false, '3.0.1' );
	wp_register_style( 'theme', get_template_directory_uri() . '/owl-carousel/owl.theme.css', false, '3.0.1' );
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, '3.0.1' );
	wp_enqueue_style( 'normalise' );
	wp_enqueue_style( 'owl' );
	wp_enqueue_style( 'theme' );
	wp_enqueue_style( 'base' );
}
add_action( 'wp_enqueue_scripts', 'side_styles' );

function side_menu() {
	$locations = array(
		'sideUKmenu' => __( 'Side UK Menu', 'side' ),
		'social' => __( 'Social Menu', 'side' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'side_menu' );

add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');
function prefix_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

class Walker_Page_Custom extends Walker_Nav_menu{
	function start_lvl(&$output, $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
	}
	function end_lvl(&$output , $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}

// Register Custom Post Type
function work() {
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Projects', 'side' ),
		'parent_item_colon'   => __( 'Parent Project:', 'side' ),
		'all_items'           => __( 'All Projects', 'side' ),
		'view_item'           => __( 'View Project', 'side' ),
		'add_new_item'        => __( 'Add New Project', 'side' ),
		'add_new'             => __( 'New Project', 'side' ),
		'edit_item'           => __( 'Edit Project', 'side' ),
		'update_item'         => __( 'Update Project', 'side' ),
		'search_items'        => __( 'Search Projects', 'side' ),
		'not_found'           => __( 'No Projects found', 'side' ),
		'not_found_in_trash'  => __( 'No Projects found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'projects', 'side' ),
		'description'         => __( 'Projects', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'categories', 'page-attributes' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'projects', $args );
}
add_action( 'init', 'work', 0 );
function awards() {
	$labels = array(
		'name'                => _x( 'Awards', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Award', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Awards', 'side' ),
		'parent_item_colon'   => __( 'Parent Award:', 'side' ),
		'all_items'           => __( 'All Awards', 'side' ),
		'view_item'           => __( 'View Award', 'side' ),
		'add_new_item'        => __( 'Add New Award', 'side' ),
		'add_new'             => __( 'New Award', 'side' ),
		'edit_item'           => __( 'Edit Award', 'side' ),
		'update_item'         => __( 'Update Award', 'side' ),
		'search_items'        => __( 'Search award', 'side' ),
		'not_found'           => __( 'No awards found', 'side' ),
		'not_found_in_trash'  => __( 'No award found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'awards', 'side' ),
		'description'         => __( 'Award information pages', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'page-attributes' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'awards', $args );
}
add_action( 'init', 'awards', 0 );
function Founders() {
	$labels = array(
		'name'                => _x( 'Founders', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Founder', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Founders', 'side' ),
		'parent_item_colon'   => __( 'Parent Founder:', 'side' ),
		'all_items'           => __( 'All Founders', 'side' ),
		'view_item'           => __( 'View Founder', 'side' ),
		'add_new_item'        => __( 'Add New Founder', 'side' ),
		'add_new'             => __( 'New Founder', 'side' ),
		'edit_item'           => __( 'Edit Founder', 'side' ),
		'update_item'         => __( 'Update Founder', 'side' ),
		'search_items'        => __( 'Search founders', 'side' ),
		'not_found'           => __( 'No founders found', 'side' ),
		'not_found_in_trash'  => __( 'No founders found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'founder', 'side' ),
		'description'         => __( 'Founder information pages', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'founder', $args );
}
add_action( 'init', 'Founders', 0 );
function what_we_do() {
	$labels = array(
		'name'                => _x( 'What We Do', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'What We Do', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'What We Do', 'side' ),
		'parent_item_colon'   => __( 'Parent Category:', 'side' ),
		'all_items'           => __( 'All Categories', 'side' ),
		'view_item'           => __( 'View Category', 'side' ),
		'add_new_item'        => __( 'Add New Category', 'side' ),
		'add_new'             => __( 'New Category', 'side' ),
		'edit_item'           => __( 'Edit Category', 'side' ),
		'update_item'         => __( 'Update Category', 'side' ),
		'search_items'        => __( 'Search categories', 'side' ),
		'not_found'           => __( 'No categories found', 'side' ),
		'not_found_in_trash'  => __( 'No categories found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'what-we-do', 'side' ),
		'description'         => __( 'Side delivers amazing character performances that give your productions the edge.', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'what-we-do', $args );
}
add_action( 'init', 'what_we_do', 0 );
function quotes() {
	$labels = array(
		'name'                => _x( 'Quotes', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Quote', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Quotes', 'side' ),
		'parent_item_colon'   => __( 'Parent Quote:', 'side' ),
		'all_items'           => __( 'All Quotes', 'side' ),
		'view_item'           => __( 'View Quote', 'side' ),
		'add_new_item'        => __( 'Add New Quote', 'side' ),
		'add_new'             => __( 'New Quote', 'side' ),
		'edit_item'           => __( 'Edit Quote', 'side' ),
		'update_item'         => __( 'Update Quote', 'side' ),
		'search_items'        => __( 'Search quotes', 'side' ),
		'not_found'           => __( 'No quotes found', 'side' ),
		'not_found_in_trash'  => __( 'No quotes found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'quote', 'side' ),
		'description'         => __( 'Quotes', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'quote', $args );
}
add_action( 'init', 'quotes', 0 );
function home_slider() {
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Slider', 'side' ),
		'parent_item_colon'   => __( 'Parent Slider:', 'side' ),
		'all_items'           => __( 'All Sliders', 'side' ),
		'view_item'           => __( 'View Slider', 'side' ),
		'add_new_item'        => __( 'Add New Slider', 'side' ),
		'add_new'             => __( 'New Slider', 'side' ),
		'edit_item'           => __( 'Edit Slider', 'side' ),
		'update_item'         => __( 'Update Slider', 'side' ),
		'search_items'        => __( 'Search sliders', 'side' ),
		'not_found'           => __( 'No sliders found', 'side' ),
		'not_found_in_trash'  => __( 'No sliders found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'slider', 'side' ),
		'description'         => __( 'Slider images', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'home_slider', 0 );

function twitter()  {
	$args = array(
		'id'            => 'tweets',
		'name'          => __( 'Twitter', 'side' ),
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'twitter' );

function page_title( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Extra info',
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'text',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'test_title'
			),		
			array(
				'name' => 'Awards image',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'image'
			),	
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'page_title' );

function wwd_images( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Extra info',
		'pages' => array('what-we-do'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'What We Do image 1',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd1'
			),	
			array(
				'name' => 'What We Do image 2',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd2'
			),	
			array(
				'name' => 'What We Do image 3',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd3'
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wwd_images' );

function founder( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Extra info',
		'pages' => array('founder'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Job Title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'job_title'
			),		
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'founder' );
	
function file_upload( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Extra info',
		'pages' => array('projects'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Client',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'client'
			),
			array(
				'name' => 'Developer',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'developer'
			),
			array(
				'name' => 'Publisher',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'publisher'
			),
			array(
				'name' => 'Brief',
				'desc' => '',
				'type' => 'wysiwyg',
				'id' => $prefix . 'brief',
				'options' => array(
				    'wpautop' => true,
				),
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'file_upload' );

function awards_year( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Award Year',
		'pages' => array('awards'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Extra Info',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'extra'
			),
			array(
				'name' => 'Year',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'year'
			),			
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'awards_year' );



add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}

function quote2what() {
	p2p_register_connection_type( array(
		'name' => 'quote2what',
		'from' => 'quote',
		'to' => 'what-we-do'
	) );
}
add_action( 'p2p_init', 'quote2what' );

function quote_project() {
    p2p_register_connection_type( array(
        'name' => 'quote_project', 
        'from' => 'quote',
        'to' => 'projects',
    ) );
}
add_action( 'p2p_init', 'quote_project' );

function slider_project() {
    p2p_register_connection_type( array(
        'name' => 'slider_project', 
        'from' => 'slider',
        'to' => 'projects',
    ) );
}
add_action( 'p2p_init', 'slider_project' );

function what_we() {
    p2p_register_connection_type( array(
        'name' => 'what_we', 
        'from' => 'what-we-do',
        'to' => 'page',
    ) );
}
add_action( 'p2p_init', 'what_we' );