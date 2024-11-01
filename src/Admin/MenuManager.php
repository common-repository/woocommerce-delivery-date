<?php
namespace Dreamfox\DeliveryDate\Admin;

use Dreamfox\DeliveryDate\Helpers\StringHelper;

class MenuManager
{

  public function build()
  {
    add_action( 'admin_menu', array( $this, 'addSettingPage' ), 99 );
  }

  public function addSettingPage()
  {
    add_submenu_page(
      'woocommerce',
      'Delivery Date',
      'Delivery Date',
      'manage_options',
      'woocommerce-delivery-date',
      array( $this, 'handleSettingPage' )
    );
  }

  public function handleSettingPage()
  {
    echo '<div id="dreamfox-delivery-date-backend"></div>';
  }
}