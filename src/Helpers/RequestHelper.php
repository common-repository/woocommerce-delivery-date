<?php
namespace Dreamfox\DeliveryDate\Helpers;

class RequestHelper
{

  public static function is( $type )
  {
    switch ( $type ) {
      case 'admin':
        return is_admin();
      case 'ajax':
        return wp_doing_ajax();
      case 'cron':
        return defined( 'DOING_CRON' );
      case 'frontend':
        return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
    }
  }
}