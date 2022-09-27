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
    if($template_file == 'page-templates/therapies-template.php'){ // edit the template name
    	remove_post_type_support('page', 'editor');
    }
    if($template_file == 'page-templates/location-template.php'){ // edit the template name
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

// backend fields
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
	<style>
		#acf-group_632a6d9808288 .postbox-header {
			background: rgba(0, 54, 163, 0.3);
		}
		#acf-group_632a7812cb27f .postbox-header {
			background: #f3f8fb;
		}

		#acf-group_632bcad972a3a .postbox-header {
			background: #FEFEFE;
		}
		#acf-group_632b83537909e .postbox-header {
			background: #FEFEFE;
		}
		#acf-group_632b9c3600fb3 .postbox-header {
			background: #FEFEFE;
		}

		#acf-group_632b8638a7dc0 .postbox-header {
			background: #5483e0;
		}

		#acf-group_632bc82c46ac1 .postbox-header {
			background: #e2efff;
		}
		#acf-group_632b963fb15ce .postbox-header {
			background: #e2efff;
		}
		#acf-group_632b9e8041b46 .postbox-header {
			background: rgba(171,199,210,.7);
		}
		#acf-group_633090b4095a5 .postbox-header {
			background: rgba(171,199,210,.7);
		}
		#acf-group_632b9b53bbff3 .postbox-header {
			background: #5483e0;
		}
	</style>
  ';
}


function stop_smoking_table() {
	return '
<!-- Stop Smoking Shortcode - Start -->
<div class="c-stop-smoking">
  <div class="c-stop-smoking__title">
    <i class="c-icon c-icon--money u-margin-bottom-small"></i>
    <h4 class="c-stop-smoking__heading">How much will you save?</h4>
  </div>
  <div class="c-stop-smoking__header">
    <div class="o-layout">
      <div class="o-layout__item u-1/2">10 / day</div>
      <div class="o-layout__item u-1/2 u-text-align-right">20 / day</div>
    </div>
  </div>
  <div class="c-stop-smoking__body">
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every week</div><!--
   --><div class="c-stop-smoking__row__item">£37</div><!--
   --><div class="c-stop-smoking__row__item">£68</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every month</div><!--
   --><div class="c-stop-smoking__row__item">£148</div><!--
   --><div class="c-stop-smoking__row__item">£270</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every 6 months</div><!--
   --><div class="c-stop-smoking__row__item">£890</div><!--
   --><div class="c-stop-smoking__row__item">£1,756</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every year</div><!--
   --><div class="c-stop-smoking__row__item">£1,781</div><!--
   --><div class="c-stop-smoking__row__item">£3,513</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every 5 years</div><!--
   --><div class="c-stop-smoking__row__item">£8,904</div><!--
   --><div class="c-stop-smoking__row__item">£17,563</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every 10 years</div><!--
   --><div class="c-stop-smoking__row__item">£17,808</div><!--
   --><div class="c-stop-smoking__row__item">£35,126</div>
    </div>
    <div class="c-stop-smoking__row">
      <div class="c-stop-smoking__row__title">Every 20 years</div><!--
   --><div class="c-stop-smoking__row__item">£35,616</div><!--
   --><div class="c-stop-smoking__row__item">£70,252</div>
    </div>
  </div>
</div>
<!-- Stop Smoking Shortcode - End -->
	';
}

add_shortcode( 'stop_smoking', 'stop_smoking_table' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}