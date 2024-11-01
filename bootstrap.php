<?php
use Dreamfox\DeliveryDate\Admin\Backend;
use Dreamfox\DeliveryDate\Site\Frontend;
use Dreamfox\DeliveryDate\Ajax;
use Dreamfox\DeliveryDate\Helpers\RequestHelper;

include dirname(__FILE__) . '/lib/core-functions.php';
include dirname(__FILE__) . '/defines.php';
include dirname(__FILE__) . '/autoloader.php';

if ( RequestHelper::is( 'ajax' ) ) {
  $app = new Ajax();
} elseif ( RequestHelper::is( 'admin' ) ) {
  $app = new Backend();
} elseif ( RequestHelper::is( 'frontend' ) ) {
  $app = new Frontend();
}
if (isset($app)) {
  $app->bootstrap();
}