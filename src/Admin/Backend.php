<?php

namespace Dreamfox\DeliveryDate\Admin;

use Dreamfox\DeliveryDate\BaseWebAdmin;
use Dreamfox\DeliveryDate\Views\AdminOrderView;
class Backend extends BaseWebAdmin {
    public function __construct() {
        add_action( 'woocommerce_admin_order_data_after_order_details', [$this, 'displayOrderDataInAdmin'] );
        $assetsManager = new AssetsManager();
        parent::__construct( $assetsManager );
        $this->_buildMenu();
    }

    private function _buildMenu() {
        $menuManager = new MenuManager();
        $menuManager->build();
    }

    public function displayOrderDataInAdmin( $order ) {
        $view = new AdminOrderView($this, $order->get_id());
        echo $view->render();
    }

}
