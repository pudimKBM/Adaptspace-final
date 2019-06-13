<?php
/**
 * @package West
 */

//Converts hex colors to rgba for the menu background color
function west_hex2rgba($color, $opacity = false) {

        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map('hexdec', $hex);
        $opacity = 0.9;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        return $output;
}


//Dynamic styles
function west_custom_styles($custom) {

	$custom = '';


	//Menu style
	$sticky_menu = get_theme_mod('sticky_menu','sticky');
	if ($sticky_menu == 'static') {
		$custom .= ".site-header.has-header { position: absolute;background-color:transparent;padding:15px 0;}"."\n";
		$custom .= ".site-header.header-scrolled {padding:15px 0;}"."\n";
		$custom .= ".header-clone {display:none;}"."\n";
	} else {
		$custom .= ".site-header {position: fixed;}"."\n";
	}
	$menu_style = get_theme_mod('menu_style','inline');
	if ($menu_style == 'centered') {
		$custom .= ".site-header .container { display: block;}"."\n";
		$custom .= ".site-branding { width: 100%; text-align: center;margin-bottom:15px;}"."\n";
		$custom .= ".main-navigation { width: 100%;float: none;}"."\n";
		$custom .= ".main-navigation ul { float: none;text-align:center;}"."\n";
		$custom .= ".main-navigation li { float: none; display: inline-block;}"."\n";
		$custom .= ".main-navigation ul ul li { display: block; text-align: left;}"."\n";
	}

	//Primary color
	$primary_color = get_theme_mod( 'primary_color', '#EAAB1C' );
	if ( $primary_color != '#EAAB1C' ) {
		$custom .= ".entry-title a:hover,a, a:hover, .primary-color, .main-navigation a:hover,.main-navigation ul ul a:hover,.main-navigation ul ul a.focus, .main-navigation li::before { color:" . esc_attr($primary_color) . "}"."\n";
		$custom .= ".west_contact_info_widget span,.go-top,.list-meta .read-more,.comment-navigation a,.posts-navigation a,.post-navigation a,button, .button:not(.header-button), input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] { background-color:" . esc_attr($primary_color) . "}"."\n";
		$custom .= ".main-navigation .current_page_item > a,.main-navigation .current-menu-item > a,.main-navigation .current_page_ancestor > a { border-color:" . esc_attr($primary_color) . "}"."\n";
	}
	//Menu
	$menu_bg = get_theme_mod( 'menu_bg', '#1C1E21' );
	$custom .= ".site-header { background-color:" . esc_attr($menu_bg) . ";}"."\n";
	//Menu scroll
	$menu_bg_scroll = get_theme_mod( 'menu_bg_scroll', '#ffffff' );
	$menu_rgba 		= west_hex2rgba($menu_bg_scroll, 0.9);
	if ($menu_bg_scroll != "#ffffff") {
		$custom 	.= ".site-header.header-scrolled { background-color:" . esc_attr($menu_rgba) . ";}"."\n";
		$custom 	.= "@media only screen and (max-width: 1024px) { .site-header,.site-header.has-header,.site-header.header-scrolled { background-color:" . esc_attr($menu_rgba) . ";}}"."\n";
	}

	//Body
	$body_text = get_theme_mod( 'body_text_color', '#969CB3' );
	$custom .= "body, .widget a { color:" . esc_attr($body_text) . "}"."\n";
	//Footer
	$footer_bg = get_theme_mod( 'footer_bg', '#1C1E29' );
	$custom .= ".site-footer, .footer-widgets { background-color:" . esc_attr($footer_bg) . "}"."\n";	


	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body { font-family:" . wp_kses_post($body_fonts) . ";}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family:" . wp_kses_post($headings_fonts) . ";}"."\n";
	}
    //Site title
    $site_title_size = get_theme_mod( 'site_title_size', '62' );
    if ( get_theme_mod( 'site_title_size' )) {
        $custom .= ".site-title { font-size:" . intval($site_title_size) . "px; }"."\n";
    }
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '18' );
    if ( get_theme_mod( 'site_desc_size' )) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px; }"."\n";
    }	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( get_theme_mod( 'h1_size' )) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( get_theme_mod( 'h2_size' )) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( get_theme_mod( 'h3_size' )) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( get_theme_mod( 'h4_size' )) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( get_theme_mod( 'h5_size' )) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( get_theme_mod( 'h6_size' )) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( get_theme_mod( 'body_size' )) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }

	//Output all the styles
	wp_add_inline_style( 'west-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'west_custom_styles' );