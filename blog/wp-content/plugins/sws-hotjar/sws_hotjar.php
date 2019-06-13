<?php

/**
 * Plugin Name: Hotjar for WordPress
 * Version: 1.2.0
 * Description: This plugin will install the Hotjar script into your website using the provided Hotjar Site ID.
 * Author: Stoute.co
 * Author URI: https://www.stoute.co/
 * Plugin URI: https://www.stoute.co/plugins/hotjar-for-wordpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: sws_hotjar
 */


add_action( 'wp_head', 'sws_hotjar_script' );

function sws_hotjar_script() {
  $hotJarSiteID = get_option( 'sws_hotjar_settings' );
  $user = wp_get_current_user();
  $allowed_roles = array('editor', 'administrator', 'author');

  if( array_intersect( $allowed_roles, $user->roles ) ) {  ?>
  <!-- Hotjar for WordPress is installed.-->
  <!-- Your Site ID is: <?php if ($hotJarSiteID['sws_hotjar_text_field_0'] != '') { echo $hotJarSiteID['sws_hotjar_text_field_0'];} else { echo 'MISSING. Please add your hotjar SiteID in the settings page. (Tools > Hotjar for WordPress)';} ?>-->
  <!-- You are logged in as an Admin, Editor, or Author so the script will not be displayed until you logout.-->
  <!-- Thanks for using our plugin! -The Stoute.co Team (https://www.stoute.co/)-->
  <!-- END Hotjar for WordPress -->
<?php } else { ?>
  <!-- START Hotjar for WordPress -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:<?php echo $hotJarSiteID['sws_hotjar_text_field_0']; ?>,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  <!-- END Hotjar for WordPress -->
  <?
  }
}

add_action( 'admin_menu', 'sws_hotjar_add_admin_menu' );
add_action( 'admin_init', 'sws_hotjar_settings_init' );


function sws_hotjar_add_admin_menu(  ) {

	add_submenu_page( 'tools.php', 'Hotjar for WordPress', 'Hotjar for WordPress', 'manage_options', 'hotjar_for_wordpress', 'sws_hotjar_options_page' );

}


function sws_hotjar_settings_init(  ) {

	register_setting( 'pluginPage', 'sws_hotjar_settings' );

	add_settings_section(
		'sws_hotjar_pluginPage_section',
		__( 'Add your Hotjar Site ID', 'sws-hotjar' ),
		'sws_hotjar_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'sws_hotjar_text_field_0',
		__( 'Site ID:', 'sws-hotjar' ),
		'sws_hotjar_text_field_0_render',
		'pluginPage',
		'sws_hotjar_pluginPage_section'
	);


}


function sws_hotjar_text_field_0_render(  ) {

	$options = get_option( 'sws_hotjar_settings' );
	?>
	<input type='text' name='sws_hotjar_settings[sws_hotjar_text_field_0]' value='<?php echo $options['sws_hotjar_text_field_0']; ?>'>
	<?php

}


function sws_hotjar_settings_section_callback(  ) {

	echo __( 'Add the Hotjar SiteID for your newly created site.', 'sws-hotjar' );

}


function sws_hotjar_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Hotjar for WordPress</h2>
		<?php
		do_settings_sections( 'pluginPage' );
		settings_fields( 'pluginPage' );
		submit_button();
		?>
    <h3>Locations of the SiteID within the Hotjar website</h3>
    <p>There are a number of locations where you can find your Hotjar SiteID. We've included screenshots below for a number of them</p>
    <img src="<?php echo plugins_url( 'images/screenshot-1.png', __FILE__ ); ?>" alt="Hotjar Screenshot" width="500px"/><br>
    <img src="<?php echo plugins_url( 'images/screenshot-2.png', __FILE__ ); ?>" alt="Hotjar Screenshot" width="500px"/><br>
    <img src="<?php echo plugins_url( 'images/screenshot-3.png', __FILE__ ); ?>" alt="Hotjar Screenshot" width="500px"/><br>
    <hr>
    <p>You can also click on these buttons to locate the tracking code screen in the upper right hand corner of the Hotjar page.</p>
    <img src="<?php echo plugins_url( 'images/screenshot-4.png', __FILE__ ); ?>" alt="Hotjar Screenshot" width="500px"/></br>
    <img src="<?php echo plugins_url( 'images/screenshot-5.png', __FILE__ ); ?>" alt="Hotjar Screenshot" width="500px"/></br>
	</form>
	<?php

}
