<?php
/*
Plugin Name: WP Signature
Plugin URI: http://www.hokya.com/wp-signature
Description: Displays your signature on the post footer. You can select your signature from your media files.
Version: 1.21
Author URI: http://www.hokya.com
*/

if (!get_option("wp_signature")) update_option("wp_signature",get_option("home")."/wp-admin/images/logo.gif");

function wp_signature () {
	$src = get_option("wp_signature");
	echo "<img src='$src' />";
}
function wp_signature_register () {
	add_options_page('WP Signature', 'WP Signature', 'manage_options','wp-signature/options.php');
	add_theme_page('WP Signature', 'WP Signature', 'manage_options','wp-signature/options.php');
}
add_action('admin_head','wp_signature_register');
add_action('comments_template','wp_signature');
?>