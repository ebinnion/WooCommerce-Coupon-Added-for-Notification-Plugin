<?php
/*
  Plugin Name: WooCommerce Coupon Added for Notification Plugin
  Plugin URI: https://eric.blog
  Description: An extension for the Notification plugin that adds a trigger for a coupon being applied in WooCommerce.
  Author: Eric Binnion
  Version: 1.0.0
  Author URI: https://eric.blog
*/

use BracketSpace\Notification\Register;

add_action( 'notification/init', function() {
	require_once __DIR__ . '/class-woocommerce-coupon-added.php';
	Register::trigger( new WooCommerceCouponAdded() );
} );