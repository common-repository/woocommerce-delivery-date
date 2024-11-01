<?php

namespace Dreamfox\DeliveryDate\Site;

use Dreamfox\DeliveryDate\Abstracts\AbstractWebApplication;
use Dreamfox\DeliveryDate\OrderData;
use Dreamfox\DeliveryDate\Repositories\OrderRepository;
use Dreamfox\DeliveryDate\Views\DeliveryDateView;
use Dreamfox\DeliveryDate\Views\EmailView;
use Dreamfox\DeliveryDate\Views\OrderView;
class Frontend extends AbstractWebApplication {
    public function __construct() {
        $assetsManager = new AssetsManager();
        parent::__construct( $assetsManager );
    }

    public function bootstrap() {
        parent::bootstrap();
        $this->_init();
    }

    protected function _init() {
        add_action( 'woocommerce_checkout_billing', [$this, 'outputDeliveryDate'], 2000 );
        add_filter( 'woocommerce_checkout_fields', [$this, 'checkoutFields'] );
        add_action(
            'woocommerce_checkout_update_order_meta',
            [$this, 'updateOrderMeta'],
            10,
            2
        );
        add_action(
            'woocommerce_email_after_order_table',
            'renderEmailWithDeliveryDate',
            15,
            2
        );
        add_action( 'woocommerce_order_details_after_order_table', [$this, 'renderOrderView'], 20 );
        add_action( 'woocommerce_thankyou', [$this, 'renderOrderView'], 20 );
    }

    public function outputDeliveryDate() {
        $view = new DeliveryDateView($this);
        echo $view->render();
    }

    public function checkoutFields( $fields ) {
        $fieldManager = new CheckoutFieldManager($fields);
        $fieldManager->process();
        return $fieldManager->getFields();
    }

    public function updateOrderMeta( $orderId ) {
        if ( isset( $_POST[DREAMFOX_WDD_FIELD_NAME] ) && !empty( $_POST[DREAMFOX_WDD_FIELD_NAME] ) ) {
            $repository = new OrderRepository($orderId);
            $data = new OrderData();
            $data->setDeliveryDate( $_POST[DREAMFOX_WDD_FIELD_NAME] );
            $repository->save( $data );
        }
    }

    public function renderEmailWithDeliveryDate( $order, $is_admin_email ) {
        $view = new EmailView($this, $order);
        echo $view->render();
    }

    public function renderOrderView( $order ) {
        $view = new OrderView($this, $order);
        echo $view->render();
    }

}
