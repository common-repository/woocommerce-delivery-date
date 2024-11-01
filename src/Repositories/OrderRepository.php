<?php
namespace Dreamfox\DeliveryDate\Repositories;

use Dreamfox\DeliveryDate\OrderData;

class OrderRepository
{
  private $_orderId;

  public function __construct($orderId)
  {
    $this->_orderId = $orderId;
  }

  public function getOrderId()
  {
    return $this->_orderId;
  }

  public function load()
  {
    $date = get_post_meta($this->getOrderId(), DREAMFOX_WDD_FIELD_NAME, true);
    $data = new OrderData();
    $data->setDeliveryDate($date);
    return $data;
  }

  public function save(OrderData $data)
  {
    $value = $data->getDeliveryDate();
    update_post_meta($this->getOrderId(), DREAMFOX_WDD_FIELD_NAME, esc_attr($value));
  }
}