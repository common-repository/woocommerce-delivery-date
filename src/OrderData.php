<?php
namespace Dreamfox\DeliveryDate;

class OrderData
{

  private $_deliveryDate;

  public function __construct($data = null)
  {
    if ($data) {
      $this->setDeliveryDate($data->deliveryDate);
    }
  }

  public function getDeliveryDate()
  {
    return $this->_deliveryDate;
  }

  public function setDeliveryDate($value)
  {
    $this->_deliveryDate = $value;
  }
}