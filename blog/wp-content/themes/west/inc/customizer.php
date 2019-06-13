<?php
/**
 * West Theme Customizer
 *
 * @package West
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function west_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel         = 'west_header_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->get_section( 'title_tagline' )->title        = __('Site branding', 'west');
    $wp_customize->get_section( 'title_tagline' )->panel        = 'west_header_panel';    
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );

    //Titles
    class West_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border-bottom:1px solid;padding:5px;color:#111;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }


 
    //___Header area___//
    $wp_customize->add_panel( 'west_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'west'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'west_header_type',
        array(
            'title'         => __('Header type', 'west'),
            'priority'      => 10,
            'panel'         => 'west_header_panel', 
            'description'   => __('Select your header type', 'west'),
        )
    );
    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'west_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'west'),
            'section'     => 'west_header_type',
            'description' => __('Select the header type for your front page', 'west'),
            'choices' => array(
                'image'     => __('Image', 'west'),
                'nothing'   => __('Only menu', 'west')
            ),
        )
    );
    //Site
    $wp_customize->add_setting(
        'site_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'west_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'site_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'west'),
            'section'     => 'west_header_type',
            'description' => __('Select the header type for all pages except the front page', 'west'),
            'choices' => array(
                'image'     => __('Image', 'west'),
                'nothing'   => __('Only menu', 'west')
            ),
        )
    );

    //___Header text___//
    $wp_customize->add_section(
        'west_header_text',
        array(
            'title'         => __('Header text', 'west'),
            'priority'      => 14,
            'panel'         => 'west_header_panel', 
        )
    );    
    $wp_customize->add_setting(
        'header_text',
        array(
            'default' => __('TIME TO GO WEST','west'),
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_text',
        array(
            'label' => __( 'Header text', 'west' ),
            'section' => 'west_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'button_left',
        array(
            'default' => __('Explore','west'),
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'button_left',
        array(
            'label' => __( 'Left button text', 'west' ),
            'section' => 'west_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'button_left_url',
        array(
            'default' => '#primary',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'button_left_url',
        array(
            'label' => __( 'Left button URL', 'west' ),
            'section' => 'west_header_text',
            'type' => 'text',
            'priority' => 11
        )
    );
    $wp_customize->add_setting(
        'button_right',
        array(
            'default' => __('Browse','west'),
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'button_right',
        array(
            'label' => __( 'Right button text', 'west' ),
            'section' => 'west_header_text',
            'type' => 'text',
            'priority' => 12
        )
    );  
    $wp_customize->add_setting(
        'button_right_url',
        array(
            'default' => '#primary',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'button_right_url',
        array(
            'label' => __( 'Right button URL', 'west' ),
            'section' => 'west_header_text',
            'type' => 'text',
            'priority' => 13
        )
    );      

    //___Mobile header image___//
    $wp_customize->add_setting(
        'mobile_header',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mobile_header',
            array(
               'label'          => __( 'Small screens header image', 'west' ),
               'type'           => 'image',
               'section'        => 'header_image',
               'settings'       => 'mobile_header',
               'description'    => __( 'Add a header image for screen widths smaller than 1024px', 'west' ),
               'priority'       => 10,
            )
        )
    );

    //___Menu style___//
    $wp_customize->add_section(
        'west_menu_style',
        array(
            'title'         => __('Menu style', 'west'),
            'priority'      => 15,
            'panel'         => 'west_header_panel', 
        )
    );
    //Sticky menu
    $wp_customize->add_setting(
        'sticky_menu',
        array(
            'default'           => 'sticky',
            'sanitize_callback' => 'west_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Sticky menu', 'west'),
            'section' => 'west_menu_style',
            'choices' => array(
                'sticky'   => __('Sticky', 'west'),
                'static'   => __('Static', 'west'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_style',
        array(
            'default'           => 'inline',
            'sanitize_callback' => 'west_sanitize_menu_style',
        )
    );
    $wp_customize->add_control(
        'menu_style',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu style', 'west'),
            'section'   => 'west_menu_style',
            'choices'   => array(
                'inline'     => __('Inline', 'west'),
                'centered'   => __('Centered', 'west'),
            ),
        )
    );

    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'west' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'priority'       => 12,
            )
        )
    );

    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'west'),
            'priority' => 13,
        )
    );  
    // Blog layout
    $wp_customize->add_setting('west_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new West_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'west'),
        'section' => 'blog_options',
        'settings' => 'west_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'west_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'west'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic'           => __( 'Classic', 'west' ),
                'fullwidth'         => __( 'Full width (no sidebar)', 'west' ),
                'masonry-layout'    => __( 'Masonry (grid style)', 'west' )
            ),
        )
    ); 
    //Full width singles
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'west_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'west'),
            'section'   => 'blog_options',
            'priority'  => 12,
        )
    );
    //Excerpt
    $wp_customize->add_setting('west_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new West_Info( $wp_customize, 'content', array(
        'label' => __('Excerpt', 'west'),
        'section' => 'blog_options',
        'settings' => 'west_options[info]',
        'priority' => 13
        ) )
    );              
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'west'),
        'description' => __('Excerpt length [default: 30 words]', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );
    //Meta
    $wp_customize->add_setting('west_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new West_Info( $wp_customize, 'meta', array(
        'label' => __('Meta', 'west'),
        'section' => 'blog_options',
        'settings' => 'west_options[info]',
        'priority' => 17
        ) )
    ); 
    //Hide meta index
    $wp_customize->add_setting(
      'hide_meta_index',
      array(
        'sanitize_callback' => 'west_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on index, archives?', 'west'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide meta single
    $wp_customize->add_setting(
      'hide_meta_single',
      array(
        'sanitize_callback' => 'west_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_single',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on single posts?', 'west'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );
    //Featured images
    $wp_customize->add_setting('west_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new West_Info( $wp_customize, 'images', array(
        'label' => __('Featured images', 'west'),
        'section' => 'blog_options',
        'settings' => 'west_options[info]',
        'priority' => 21
        ) )
    );     
    //Index images
    $wp_customize->add_setting(
        'index_feat_image',
        array(
            'sanitize_callback' => 'west_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on index, archives?', 'west'),
            'section' => 'blog_options',
            'priority' => 22,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'post_feat_image',
        array(
            'sanitize_callback' => 'west_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'post_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on single posts?', 'west'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );

    //___Fonts___//
    $wp_customize->add_section(
        'west_fonts',
        array(
            'title' => __('Fonts', 'west'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: athemes.com/documentation/west', 'west'),
        )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Roboto:400,400italic,500italic,500',
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Body font name/style/sets', 'west' ),
            'section' => 'west_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Roboto\', serif',
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Body font family', 'west' ),
            'section' => 'west_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );   
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Montserrat:400,700',
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Headings font name/style/sets', 'west' ),
            'section' => 'west_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Montserrat\', serif',
            'sanitize_callback' => 'west_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Headings font family', 'west' ),
            'section' => 'west_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'west_fonts',
        'label'       => __('Site title', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
        ),
    ) ); 
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'west_fonts',
        'label'       => __('Site description', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );         
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'west_fonts',
        'label'       => __('H1 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'west_fonts',
        'label'       => __('H2 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'west_fonts',
        'label'       => __('H3 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'west_fonts',
        'label'       => __('H4 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'west_fonts',
        'label'       => __('H5 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'west_fonts',
        'label'       => __('H6 font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'west_fonts',
        'label'       => __('Body font size', 'west'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
        ),
    ) );

    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#EAAB1C',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'west'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 12
            )
        )
    );
    //Menu
    $wp_customize->add_setting(
        'menu_bg',
        array(
            'default'           => '#1C1E21',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg',
            array(
                'label'         => __('Menu background', 'west'),
                'section'       => 'colors',
                'settings'      => 'menu_bg',
                'priority'      => 16
            )
        )
    );
    //Menu scroll
    $wp_customize->add_setting(
        'menu_bg_scroll',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_scroll',
            array(
                'label'         => __('Menu background (scroll mode)', 'west'),
                'section'       => 'colors',
                'settings'      => 'menu_bg_scroll',
                'priority'      => 17
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#969CB3',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'west'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 22
            )
        )
    ); 
    //Footer
    $wp_customize->add_setting(
        'footer_bg',
        array(
            'default'           => '#1C1E29',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg',
            array(
                'label' => __('Footer background', 'west'),
                'section' => 'colors',
                'settings' => 'footer_bg',
                'priority' => 23
            )
        )
    );    

    //___Footer___//
    $wp_customize->add_section(
        'west_footer',
        array(
            'title'         => __('Footer widgets', 'west'),
            'priority'      => 18,
        )
    );
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '3',
            'sanitize_callback' => 'west_sanitize_fwidgets',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget area', 'west'),
            'section'     => 'west_footer',
            'description' => __('Choose the number of widget areas in the footer, then go to Appearance > Widgets and add your widgets.', 'west'),
            'choices' => array(
                '1'     => __('One', 'west'),
                '2'     => __('Two', 'west'),
                '3'     => __('Three', 'west'),
            ),
        )
    );

}
add_action( 'customize_register', 'west_customize_register' );

/**
* Sanitize
*/
//Header type
function west_sanitize_header( $input ) {
    if ( in_array( $input, array( 'image', 'nothing' ), true ) ) {
        return $input;
    }
}
//Text
function west_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function west_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
//Menu style
function west_sanitize_menu_style( $input ) {
    if ( in_array( $input, array( 'inline', 'centered' ), true ) ) {
        return $input;
    }
}
//Menu style
function west_sanitize_sticky( $input ) {
    if ( in_array( $input, array( 'sticky', 'static' ), true ) ) {
        return $input;
    }
}
//Footer widget areas
function west_sanitize_fwidgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}
//Blog layout
function west_sanitize_blog( $input ) {
    if ( in_array( $input, array( 'classic', 'fullwidth', 'masonry-layout' ), true ) ) {
        return $input;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function west_customize_preview_js() {
    wp_enqueue_script( 'west_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'west_customize_preview_js' );