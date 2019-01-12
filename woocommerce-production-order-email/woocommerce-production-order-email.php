<?php
/**
 * Plugin Name: WooCommerce Custom Production Order Email
 * Plugin URI: https://www.skyverge.com/blog/how-to-add-a-custom-woocommerce-email/
 * Description: Demo plugin for adding a custom WooCommerce email that sends admins an email when an order is received with production shipping
 * Author: SkyVerge
 * Author URI: http://www.skyverge.com
 * Version: 0.1
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Add a custom email to the list of emails WooCommerce should load
 *
 * @since 0.1
 * @param array $email_classes available email classes
 * @return array filtered available email classes
 */
function add_production_order_woocommerce_email( $email_classes ) {

    // include our custom email class
    require( 'includes/class-wc-production-order-email.php' );

    // add the email class to the list of email classes that WooCommerce loads
    $email_classes['WC_Production_Order_Email'] = new WC_Production_Order_Email();

    return $email_classes;
    
}
add_filter( 'woocommerce_email_classes', 'add_production_order_woocommerce_email' );