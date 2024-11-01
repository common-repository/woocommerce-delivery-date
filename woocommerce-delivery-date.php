<?php

/**
 * Plugin Name: Woocommerce Delivery Date Premium
 * Plugin URI: https://dreamfoxmedia.com
 * Version: 2.2.0
 * Author URI: https://dreamfoxmedia.com
 * Author: Dreamfox Media
 * Description: Extend Woocommerce plugin to add delivery date on checkout
 * Requires at least: 5.0
 * Tested up to: 6.5.5
 * WC requires at least: 6.0.0
 * WC tested up to: 9.0.2
 * License: GPLv3 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: woocommerce-delivery-date
 * Domain Path: /lang/
 * @Developer : Marco van Loghum Slaterus / Hoang Xuan Hao ( Pamysoft )
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !defined( 'DREAMFOX_WDD_PLUGIN_FILE' ) ) {
    define( 'DREAMFOX_WDD_PLUGIN_FILE', __FILE__ );
}
if ( function_exists( 'dreamfox_delivery_date' ) ) {
    dreamfox_delivery_date()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'dreamfox_delivery_date' ) ) {
        // Create a helper function for easy SDK access.
        function dreamfox_delivery_date() {
            global $dreamfox_delivery_date;
            if ( !isset( $dreamfox_delivery_date ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_10651_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_10651_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $dreamfox_delivery_date = fs_dynamic_init( array(
                    'id'             => '10651',
                    'slug'           => 'dreamfox-deliverydate',
                    'premium_slug'   => 'dreamfox-deliverydate-premium',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_cbd84d7abd43d4e1d2c4b5850c495',
                    'is_premium'     => false,
                    'premium_suffix' => 'Premium',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug'       => 'woocommerce-delivery-date',
                        'first-path' => 'admin.php?page=woocommerce-delivery-date',
                        'support'    => false,
                        'network'    => true,
                        'parent'     => array(
                            'slug' => 'woocommerce',
                        ),
                    ),
                    'is_live'        => true,
                ) );
            }
            return $dreamfox_delivery_date;
        }

        // Init Freemius.
        dreamfox_delivery_date();
        // Signal that SDK was initiated.
        do_action( 'dreamfox_delivery_date_loaded' );
    }
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        include dirname( __FILE__ ) . '/bootstrap.php';
    }
}