<?php

namespace Dreamfox\DeliveryDate\Views;

use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;
use Dreamfox\DeliveryDate\Repositories\OrderRepository;
class EmailView extends BaseView {
    protected $_orderId;

    public function __construct( ApplicationInterface $app, $order ) {
        parent::__construct( $app );
        $this->setTemplate( 'email_view' );
        $this->_orderId = $order;
    }

    public function getDeliveryDate() {
        $repository = new OrderRepository($this->_orderId);
        $data = $repository->load();
        $deliveryDate = $data->getDeliveryDate();
        $dateFormat = get_option( 'date_format' );
        $deliveryDate = ( $dateFormat == 'd/m/Y' ? $deliveryDate : mysql2date( $dateFormat, $deliveryDate ) );
        return $deliveryDate;
    }

    public function getLabel() {
        $label = 'Select delivery date';
        return $label;
    }

}
