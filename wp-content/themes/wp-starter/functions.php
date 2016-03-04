<?php
$theme_version = "1.0.0";
$jQuery_version = "1.11.1";
/*
=================================
		Includes
=================================
*/
require_once('includes/functions.helpers.php');

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

		// Add theme support for Title Tags
			add_theme_support( 'title-tag' );

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
	/*
		===== Vendor Scripts I Always Use =====
	*/
	wp_register_script( 'modernizr', trailingslashit(get_template_directory_uri()).'js/vendor/modernizr.full.min.js', array(), $theme_version);
	// Remove built in jquery
	wp_deregister_script( 'jquery' );
	// Register a CDN version on google
	wp_register_script( 'jquery-cdn', '//ajax.googleapis.com/ajax/libs/jquery/'.$jQuery_version.'/jquery.min.js', array('modernizr'), $theme_version);
	// Create a fallback script
	wp_register_script( 'jquery', trailingslashit(get_template_directory_uri()).'js/jquery.fallback.js', array('jquery-cdn'), $theme_version);
	// localize the fallback with the theme vars
	wp_localize_script( 'jquery-cdn', 'wp_theme_vars', $theme_data );

	/*
		===== Vendor Scripts I Sometimes Use (Registered but not necessarily enqueued) =====
	*/
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
	// Bootstrap Parts with dependencies
	wp_deregister_script( 'bootstrap-js-collapse' );
	wp_register_script( 'bootstrap-js-collapse', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/collapse.js', array( 'jquery', 'bootstrap-js-transition' ), $theme_version);
	wp_deregister_script( 'bootstrap-js-popover' );
	wp_register_script( 'bootstrap-js-popover', trailingslashit(get_template_directory_uri()).'js/vendor/bootstrap/popover.js', array( 'jquery', 'bootstrap-js-tooltip' ), $theme_version);
	// DocCookies
	wp_register_script( 'doc-cookies', trailingslashit(get_template_directory_uri()).'js/vendor/mozilla.docCookies.js', array(), $theme_version);
	// FlexSlider
	wp_register_script( 'doc-cookies', trailingslashit(get_template_directory_uri()).'js/vendor/mozilla.docCookies.js', array(), $theme_version);
	// Isotope & Images loaded
	// Commercial License Required for Commercial Jobs:  http://isotope.metafizzy.co/license.html - again, worth the money.
	wp_register_script( 'images-loaded', trailingslashit(get_template_directory_uri()).'js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ), $theme_version);
	wp_register_script( 'isotope', trailingslashit(get_template_directory_uri()).'js/vendor/isotope.pkgd.min.js', array( 'jquery', 'images-loaded' ), $theme_version);
	/*
		===== Dev Scripts =====
	*/
	if(is_dev()){
		wp_register_script( 'livereload-loader', trailingslashit(get_template_directory_uri()).'js/livereload-loader.js', array( 'modernizr' ), $theme_version);
		wp_enqueue_script( 'livereload-loader' );
	}

	/*
		===== User Scripts =====
	*/
	wp_register_script( 'ajax-framework', trailingslashit(get_template_directory_uri()).'js/ajax-framework.js', array('jquery'), $theme_version);
	wp_register_script( 'main-js', trailingslashit(get_template_directory_uri()).'js/main.js', array('jquery', 'ajax-framework'), $theme_version);
	/*
		===== Enqueue Scripts =====
	*/
	wp_enqueue_script( 'bootstrap-js-collapse' ); // Collapse used in menu with data attributes.  Can be removed if menu collapse removed
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
			Menus
=================================
*/

if ( ! function_exists( 'theme_navigation_menus' ) ) {
	// Register Navigation Menus
	function theme_navigation_menus() {

		$locations = array(
			'navbar-top' => 'The Top Menu of the theme',
			'navbar-footer' => 'Footer Menu',
			);
		register_nav_menus( $locations );

	}
	// Hook into the 'init' action
	add_action( 'init', 'theme_navigation_menus' );
}
// Register Custom Navigation Walker
require_once('includes/wp_bootstrap_navwalker.php');

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
				'args' => array(
				/********************
					Override $args array below by matching keys like so:
						'supports' => array( 'title', 'author', 'thumbnail', 'comments', ),
						'show_in_nav_menus'   => false,
				*********************/
				),
			),
		);

		// Icons can be found here: http://melchoyce.github.io/dashicons/

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
				'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
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
			if (!empty($value['args'])) {
				$args = array_merge($args, $value['args']);
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
		Live Reload Trigger
=================================
*/
function livereload_trigger() {
	$target = get_stylesheet_directory() . '/livereload-trigger.php';
	touch($target);
}
if(is_dev()){
	add_action( 'save_post', 'livereload_trigger' );
}

/*
=================================
	Ajax Functions
=================================
*/
function get_the_ajax_delimiter($start = true){
	if ($start === true || strtolower($start) === 'start' || strtolower($start) === 'begin') {
		$delim = 'start';
	} elseif (empty($start) || strtolower($start) === 'stop' || strtolower($start) === 'end' ) {
		$delim = 'stop';
	} else {
		return false;
	}
	if (!is_ajax_request()) {
		return false;
	}
	return "<!--ajax-".$delim."-->";
}
function get_the_ajax_delimiter_start(){
	return get_the_ajax_delimiter(true);
}
function get_the_ajax_delimiter_stop(){
	return get_the_ajax_delimiter(false);
}
function the_ajax_delimiter($start = true){
	echo get_the_ajax_delimiter($start);
}
function the_ajax_delimiter_start(){
	echo get_the_ajax_delimiter(true);
}
function the_ajax_delimiter_stop(){
	echo get_the_ajax_delimiter(false);
}
function remove_more_link_scroll( $link, $text ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	$link = preg_replace( '|class="more-link"|', 'class="more-link" data-content-target=".blog-post" data-target-is-ancestor="true"', $link );
	$link = str_replace($text, "Read More", $link);
	return $link;
}
function is_ajax_request() {
	return !empty($_POST["ajaxRequest"]) && $_POST["ajaxRequest"] == 'true';
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll', 10, 2 );


/*
=================================
	Additional Includes
=================================
*/
require_once('includes/favicons.php');
