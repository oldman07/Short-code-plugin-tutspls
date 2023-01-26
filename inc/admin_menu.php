<?php
add_action('admin_menu', 'pwspk_options');  

function pwspk_options()
{
    add_menu_page('pwspk option', 'pwspk option', 'manage_options', 'pwspk-option', 'pwspk_option_func');  //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', string $icon_url = '', int|float $position = null ): string
    add_submenu_page('pwspk-option', 'pwspk settings', 'pwspk settings', 'manage_options', 'pwspk settings', 'pwspk_settings_func');   //add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', int|float $position = null ):
    add_options_page('Theme option', 'Theme option', 'manage_options', 'pwspk_theme_Settings', 'pwspk_theme_func');
}

// admin custom menu
add_action( 'admin_menu', 'my_plugin_menu' );

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}


function pwspk_option_func()
{ ?>
 

<div class="wrap">                                                 
<h1>pwspk_option</h1>
<?php settings_errors() ?>

    <form action="options.php" method='post'>
        <?php settings_fields('pwspk-option-group')  ?>
        <label for=""> Setting 1:
        <input type="text" name='pwspk_option_1' value ="<?php esc_html(get_option('pwspk_option_1')); ?>" /></label>
        <?php submit_button('Save changes') ?>
    </form>
    
</div>

<?php

}
function pwspk_settings_func()
{
    echo '<h1>pwspk_settings</h1>';
}

function pwspk_theme_func()
{
    echo '<h1>pwspk_Theme_settings</h1>';
}