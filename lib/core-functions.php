<?php
function dreamfox_wdd_is_request( $type ) {
  switch ( $type ) {
    case 'admin':
      return is_admin();
    case 'ajax':
      return defined( 'DOING_AJAX' );
    case 'cron':
      return defined( 'DOING_CRON' );
    case 'frontend':
      return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
  }
}

function dreamfox_wdd_define( $name, $value ) {
  if ( ! defined( $name ) ) {
    define( $name, $value );
  }
}

function dreamfox_wdd_site_relative_url( ) {
  $site_url = get_site_url();
  $site_url = str_replace(['http://', 'https://'], '', $site_url);
  $parts = explode('/', $site_url);
  unset($parts[0]);
  $part_url = implode('/', $parts);
  $part_url = trim($part_url, '/');
  return $part_url;
}

function dreamfox_wdd_get_main_js_path( $build_type ) {
  $jsonFilePath = sprintf( '%s/assets/%s/build/asset-manifest.json', DREAMFOX_WDD_ABSPATH, $build_type );
  if (file_exists($jsonFilePath)) {
    $settings = json_decode( file_get_contents( $jsonFilePath ), true);
    return DREAMFOX_WDD_ABSPATH . '/assets/'.$build_type.'/build'. $settings['files']['main.js'];
  }
  return false;
}