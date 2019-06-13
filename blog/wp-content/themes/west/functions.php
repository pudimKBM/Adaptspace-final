<?php
/**
 * West functions and definitions
 *
 * @package West
 */

if ( ! function_exists( 'west_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function west_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on West, use a find and replace
	 * to change 'west' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'west', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('west-large-thumb', 660);
	add_image_size('west-small-thumb', 450);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'west' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'west_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );
}
endif; // west_setup
add_action( 'after_setup_theme', 'west_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function west_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'west' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'west' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}	

	//Register the custom widgets
	register_widget( 'West_Video_Widget' );
	register_widget( 'West_Contact_Info' );
	register_widget( 'West_Social_Profile' );
	register_widget( 'West_Recent_Posts' );

}
add_action( 'widgets_init', 'west_widgets_init' );

/**
 * Load the custom widgets
 */
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/contact-widget.php";
require get_template_directory() . "/widgets/social-widget.php";
require get_template_directory() . "/widgets/posts-widget.php";


/**
 * Enqueue scripts and styles.
 */
function west_scripts() {

	wp_enqueue_style( 'west-style', get_stylesheet_uri() );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'west-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
	} else {
	    wp_enqueue_style( 'west-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,500');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'west-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
	} else {
	    wp_enqueue_style( 'west-headings-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700'); 
	}

	wp_enqueue_style( 'west-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );	

	wp_enqueue_script( 'west-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( get_theme_mod('blog_layout') == 'masonry-layout' && (is_home() || is_archive()) ) {
		wp_enqueue_script( 'west-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('masonry'),'', true );		
	}	

	wp_enqueue_script( 'west-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );	

	wp_enqueue_script( 'west-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'west_scripts' );

/**
 * Enqueue Bootstrap
 */
function west_enqueue_bootstrap() {
	wp_enqueue_style( 'west-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'west_enqueue_bootstrap', 9 );

/**
 * Load html5shiv
 */
function west_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'west_html5shiv' );

/**
 * Site branding
 */
if ( ! function_exists( 'west_branding' ) ) :
function west_branding() {
	if ( get_theme_mod('site_logo') ) :
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>'; 
	else :
		echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1>';
		if ( get_bloginfo( 'description' ) ) {
			echo '<h2 class="site-description">' . esc_html(get_bloginfo( 'description' )) . '</h2>';
		}
	endif;
}
endif;

/**
 * Full width single posts
 */
function west_fullwidth_singles($classes) {
	if ( function_exists('is_woocommerce') ) {
		$woocommerce = is_woocommerce();
	} else {
		$woocommerce = false;
	}

	$single_layout = get_theme_mod('fullwidth_single', 0);
	if ( is_single() && !$woocommerce && $single_layout ) {
		$classes[] = 'fullwidth-single';
	}
	return $classes;
}
add_filter('body_class', 'west_fullwidth_singles');

/**
 * Posts clearfix 
 */
function west_clearfix_post( $class ) {
	$class[] = 'clearfix';
	return $class;
}
add_filter( 'post_class', 'west_clearfix_post' );

/**
 * Blog layout
 */
function west_blog_layout() {
	$layout = get_theme_mod('blog_layout','classic');
	return $layout;
}

/**
 * Change the excerpt length
 */
function west_excerpt_length( $length ) {
	$excerpt = get_theme_mod('exc_lenght', '30');
	return $excerpt;
}
add_filter( 'excerpt_length', 'west_excerpt_length', 999 );

/**
 * Polylang compatibility
 */
if ( function_exists('pll_register_string') ) :
function west_polylang() {
	pll_register_string('Header text', get_theme_mod('header_text'), 'West');
	pll_register_string('Button left', get_theme_mod('button_left'), 'West');
	pll_register_string('Button right', get_theme_mod('button_right'), 'West');
}
add_action( 'admin_init', 'west_polylang' );
endif;

/**
 * Header text
 */
function west_header_text() {

	if ( !function_exists('pll_register_string') ) {
		$header_text 		= get_theme_mod('header_text', 'TIME TO GO WEST');
		$button_left		= get_theme_mod('button_left', 'Explore');
		$button_right 		= get_theme_mod('button_right', 'Browse');
	} else {
		$header_text 		= pll__(get_theme_mod('header_text', 'TIME TO GO WEST'));
		$button_left		= pll__(get_theme_mod('button_left', 'Explore'));
		$button_right 		= pll__(get_theme_mod('button_right', 'Browse'));	
	}
	$button_left_url	= get_theme_mod('button_left_url', '#primary');
	$button_right_url 	= get_theme_mod('button_right_url', '#primary');

	echo '<div class="header-info">
			<div class="header-info-inner">
				<h3 class="header-text">' . wp_kses_post($header_text) . '</h3>
				<div class="header-buttons">';
				if ($button_left_url) {
					echo '<a class="button header-button left-button" href="' . esc_url($button_left_url) . '">' . esc_html($button_left) . '</a>';
				}
				if ($button_right_url) {
					echo '<a class="button header-button right-button" href="' . esc_url($button_right_url) . '">' . esc_html($button_right) . '</a>';
				}
	echo 		'</div>';
	echo 	'</div>';
	echo '</div>';
}

/**
 * Header image check
 */
function west_has_header() {
	$front_header = get_theme_mod('front_header_type' ,'image');
	$site_header = get_theme_mod('site_header_type', 'image');
	global $post;
	if ( !is_404() ) {
	$single_toggle = get_post_meta( $post->ID, '_west_header_key', true );
	} else {
		$single_toggle = false;
	}

	if ( get_header_image() && ( $front_header == 'image' && is_front_page() ) || ( $site_header == 'image' && !is_front_page() ) ) 
		if (!$single_toggle)
		return 'has-header';
}

/**
 * Remove archives labels
 */
function west_category_label($title) {
    if ( is_category() ) {
        $title = '<i class="fa fa-folder-o"></i>' . single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = '<i class="fa fa-tag"></i>' . single_tag_title( '', false );    	
    } elseif ( is_author() ) {
		$title = '<span class="vcard"><i class="fa fa-user"></i>' . get_the_author() . '</span>';
	}
    return $title;
}
add_filter('get_the_archive_title', 'west_category_label');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Live Composer
 */
require get_template_directory() . '/inc/composer.php';


/**
 * Header metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 *TGM Plugin activation.
 */
require get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'west_recommend_plugin' );
function west_recommend_plugin() {
 
    $plugins = array(
        array(
            'name'               => 'Live Composer Page Builder',
            'slug'               => 'live-composer-page-builder',
            'required'           => false,
        ),        
    );
 
    tgmpa( $plugins);
 
}