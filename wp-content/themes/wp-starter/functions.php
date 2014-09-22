<?php 
$theme_version = "1.0.0";
$jQuery_version = "1.11.1";

/* 
=================================
		Theme Support
=================================
*/
	if ( ! function_exists('add_theme_features') ) {

	// Register Theme Features
			function add_theme_features()  {

		// Add theme support for Featured Images
				add_theme_support( 'post-thumbnails' );	

		// Add theme support for Semantic Markup
				$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
				add_theme_support( 'html5', $markup );	
			}

		// Hook into the 'after_setup_theme' action
		add_action( 'after_setup_theme', 'add_theme_features' );

	}

/* 
=================================
		Scripts and Styles
================================= 
*/
function add_theme_scripts() {
	global $theme_version, $jQuery_version;
	// Theme Data For Javascript
	$theme_data = array(
		"theme_dir_uri" => trailingslashit(get_template_directory_uri()),
		'ajax_uri' => admin_url( 'admin-ajax.php' ),
		"theme_version" => $theme_version,
		"jQuery_version" => $jQuery_version,
	);
	// Remove built in jquery
	wp_deregister_script( 'jquery' );
	// Register a CDN version on google
	wp_register_script( 'jquery-cdn', '//ajax.googleapis.com/ajax/libs/jquery/'.$jQuery_version.'/jquery.min.js', array(), $theme_version);
	// Create a fallback script
	wp_register_script( 'jquery', trailingslashit(get_template_directory_uri()).'js/jquery.fallback.js', array('jquery-cdn'), $theme_version);
	// localize the fallback with the theme vars
	wp_localize_script( 'jquery-cdn', 'wp_theme_vars', $theme_data );

	// Bootstrap JS Full
	wp_deregister_script( 'bootstrap-js' );
	wp_register_script( 'bootstrap-js', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap.js', array( 'jquery' ), $theme_version);
	// Bootstrap JS Parts
	wp_deregister_script( 'bootstrap-js-affix' );
	wp_register_script( 'bootstrap-js-affix', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/affix.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-carousel' );
	wp_register_script( 'bootstrap-js-carousel', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/carousel.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-modal' );
	wp_register_script( 'bootstrap-js-modal', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/modal.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-tab' );
	wp_register_script( 'bootstrap-js-tab', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/tab.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-alert' );
	wp_register_script( 'bootstrap-js-alert', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/alert.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-tooltip' );
	wp_register_script( 'bootstrap-js-tooltip', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/tooltip.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-button' );
	wp_register_script( 'bootstrap-js-button', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/button.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-dropdown' );
	wp_register_script( 'bootstrap-js-dropdown', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/dropdown.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-scrollspy' );
	wp_register_script( 'bootstrap-js-scrollspy', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/scrollspy.js', array( 'jquery' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-transition' );
	wp_register_script( 'bootstrap-js-transition', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/transition.js', array( 'jquery' ), $theme_version);
	// plugins with dependencies
	wp_deregister_script( 'bootstrap-js-collapse' );
	wp_register_script( 'bootstrap-js-collapse', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/collapse.js', array( 'jquery', 'bootstrap-js-transition' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-popover' );
	wp_register_script( 'bootstrap-js-popover', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/popover.js', array( 'jquery', 'bootstrap-js-tooltip' ), $theme_version);
	// Add in theme Main JS
	wp_register_script( 'main-js', trailingslashit(get_template_directory_uri()).'js/main.js', array('jquery'), $theme_version);

	// Enqueue scripts that you want
	wp_enqueue_script( 'main-js' );
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Register Style
function add_theme_styles() {
	global $theme_version;
	wp_register_style( 'bootstrap-css', trailingslashit(get_template_directory_uri()).'css/bootstrap.css', array(), $theme_version );
	wp_enqueue_style( 'bootstrap-css' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'add_theme_styles' );


/* 
=================================
		Custom Post Types
================================= 
*/

if ( ! function_exists('add_theme_custom_post_types') ) {

	// Register Custom Post Type
	function add_theme_custom_post_types() {

		$cpts = array(
			'cpt_item' => array(
				'singular' => "Custom Item",
				'plural' => "Custom Items",
				'desc' => "This is a description of Custom Items",
				'icon' => "dashicons-carrot",
			),
		);
		foreach ($cpts as $key => $value) {
			

			$labels = array(
				'name'                => $value['plural'],
				'singular_name'       => $value['singular'],
				'menu_name'           => $value['plural'],
				'parent_item_colon'   => 'Parent '.$value['singular'].':',
				'all_items'           => 'All '.$value['plural'],
				'view_item'           => 'View '.$value['singular'],
				'add_new_item'        => 'Add New '.$value['singular'],
				'add_new'             => 'Add New '.$value['singular'],
				'edit_item'           => 'Edit '.$value['singular'],
				'update_item'         => 'Update '.$value['singular'],
				'search_items'        => 'Search '.$value['singular'],
				'not_found'           => 'No '.$value['plural'].' found',
				'not_found_in_trash'  => 'No '.$value['plural'].' found in Trash',
			);
			$args = array(
				'label'               => $key,
				'description'         => $value['desc'],
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			if(!empty($value['icon'])){
				$args['menu_icon'] = $value['icon'];
			}
			register_post_type( $key, $args );

		}
	}

	// Hook into the 'init' action
	add_action( 'init', 'add_theme_custom_post_types', 0 );

}
/* 
=================================
	Advanced Custom Fields
================================= 
*/

	require_once('advanced-custom-fields-pro/acf.php');
	add_filter('acf/settings/path', 'my_acf_settings_path');
	function my_acf_settings_path( $path ) {
		$path = get_stylesheet_directory() . '/advanced-custom-fields-pro/';
		return $path;
	}
	add_filter('acf/settings/dir', 'my_acf_settings_dir');
	function my_acf_settings_dir( $dir ) {
		$dir = get_stylesheet_directory_uri() . '/advanced-custom-fields-pro/';
		return $dir;
	}

// ACF Options
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'icon_url'		=> 'dashicons-lightbulb',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Sub Page Settings',
			'menu_title'	=> 'Sub Page',
			'parent_slug'	=> 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Other Sub Page Settings',
			'menu_title'	=> 'Other Sub Page',
			'parent_slug'	=> 'theme-general-settings',
		));
		
	}





/* 
=================================
		Helper Functions
================================= 
*/

function var_pre($var, $msg = NULL){
	/*
		Helper Function:
			Use *instead of* var_dump();
			will output var_dump wrapped with <pre></pre> and give an optional 2nd param for a message.  
	*/
	echo "\n<pre>";
	if($msg !== NULL){
		echo "\n".$msg."\n";
	}
	var_dump($var);
	echo "</pre>\n";
}
