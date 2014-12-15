<?php
/**
 * Plugin Name: CiviCRM Demo (WP)
 * Plugin URI: http://civicrm.org/
 * Description: Lock down for CiviCRM demo sites
 * Author: CiviCRM LLC
 * Version: 1.0
 * Author URI: http://civicrm.org/
 * License: AGPL3
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class CiviCRM_Demo_WP {
  private static $instance;
  public static function singleton() {
    if ( ! isset( self::$instance ) ) {
      self::$instance = new CiviCRM_Demo_WP();
    }
    return self::$instance;
  }
  
  public function register() {
    add_filter('show_password_fields', '__return_false');

    // Note: This doesn't hide the password-reset link in UI, but it does
    // prevent submission of the password-reset requests.
    add_filter('allow_password_reset', '__return_false');
  }
}

CiviCRM_Demo_WP::singleton()->register();
