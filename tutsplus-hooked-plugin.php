<?php
/**
* Plugin Name:   Call to Action Plugin - Hooked to Theme
* Plugin URI:    https://tutsplus.com/
* Description:   Adds a call to action box
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.com
*
*
*/

/*********************************************************************************
Enqueue stylesheet
*********************************************************************************/
function tutsplus_hook_plugin_enqueue_styles() {
	
	wp_register_style( 'hook_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
	wp_enqueue_style( 'hook_cta_css' );
	
}
add_action( 'wp_enqueue_scripts', 'tutsplus_hook_plugin_enqueue_styles' );
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
include PLUGIN_PATH."inc/admin_menu.php";
/*********************************************************************************
CTA box
*********************************************************************************/
function tutsplus_cta_below_posts() {
	
	if( is_singular( 'post' )) { ?>
		
		<div class="cta-in-post">
			<a href="#">For more posts like this in your inbox every week, join our mailing list.</a>
		</div>
		
	<?php }
	
}
add_action( 'tutsplus_after_content', 'tutsplus_cta_below_posts' );




/*********************************************************************************
Simple shortcode
*********************************************************************************/
function tutsplus_cta_simple($atts,$content = null) { 
	$atts = shortcode_atts( array(
		'text' => 'this is link',				//these are default values if user dont enter anything this will display.
		'link' => '#'
	), $atts, 'cta' );
	ob_start();
	?>
	
	<div class="shortcode cta">
		<?php echo '<a href="' .$atts['link']. '">'.$atts['text'].'</a>' ?>
	</div>
	
	<?php 
	return ob_get_clean();
		
}
add_shortcode( 'cta', 'tutsplus_cta_simple' );



?>