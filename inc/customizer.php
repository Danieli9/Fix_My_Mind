<?php
/**
 * _s Theme Customizer
 *
 * @package _s
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => '_s_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => '_s_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', '_s_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function _s_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function _s_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js() {
	wp_enqueue_script( '_s-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', '_s_customize_preview_js' );


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

//Remove JQuery migrate
 
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		 $script = $scripts->registered['jquery'];
	if ( $script->deps ) { 
 	// Check whether the script has any dependencies
 
	$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
}
}
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

// add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

// function change_default_jquery( ){
//     wp_dequeue_script( 'jquery');
//     wp_deregister_script( 'jquery');   
// }


 /*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );

// Remove Contact Form 7 css
function rjs_lwp_contactform_css_js() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
        wp_enqueue_script('contact-form-7');
         wp_enqueue_style('contact-form-7');

    }else{
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }
}
add_action( 'wp_enqueue_scripts', 'rjs_lwp_contactform_css_js');


// testimonials

function register_post_types() {
	$labels = array(
		"name" => __( 'Testimonials', '' ),
		"singular_name" => __( 'Testimonial', '' ),
		);

	$args = array(
		"label" => __( 'Testimonials', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonial", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-editor-quote",
		"supports" => array( "title", "editor", "page-attributes" ),
	);

	register_post_type( "testimonial", $args );

}
register_post_types();


add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
    
    if($template_file == 'page-templates/home-template.php'){ // edit the template name
    	remove_post_type_support('page', 'editor');
    }
    if($template_file == 'page-templates/treatments-template.php'){ // edit the template name
    	remove_post_type_support('page', 'editor');
    }
    if($template_file == 'page-templates/treatments-single.php'){ // edit the template name
    	remove_post_type_support('page', 'editor');
    }

}

function override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
} add_filter('tiny_mce_before_init', 'override_mce_options');


// Excerpt Length Control
function set_excerpt_length(){
	return 32;
}
  
add_filter('excerpt_length', 'set_excerpt_length');
  
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



// -------------------------------------------------------------------------

/*FUNCTION FILTER AND AJAX LOAD MORE*/
add_action( 'wp_enqueue_scripts', 'cc_script_and_styles');

function cc_script_and_styles() {
	if ( is_home() || is_archive()) {
		global $wp_query;
		wp_register_script( 'cc_scripts', get_stylesheet_directory_uri() . '/js/script.js', array('jquery') );
		wp_localize_script( 'cc_scripts', 'cc_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
			'max_page' => $wp_query->max_num_pages
		) );

		wp_enqueue_script( 'cc_scripts' );
	}

}

add_action('wp_ajax_loadmorebutton', 'cc_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorebutton', 'cc_loadmore_ajax_handler');

function cc_loadmore_ajax_handler(){
	$params = json_decode( stripslashes( $_POST['query'] ), true ); 
	$params['paged'] = $_POST['page'] + 1; 
	$params['post_status'] = 'publish';
	query_posts( $params );

	if( have_posts() ) :

		while( have_posts() ): the_post();

		get_template_part( 'template-parts/content', 'archive' );

		endwhile;

	endif;

	die; 
}
