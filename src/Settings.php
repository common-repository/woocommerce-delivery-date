<?php
namespace Dreamfox\DeliveryDate;

class Settings
{

  private $_deliveryDays;
  private $_categories;

  public function __construct($data = null)
  {
    if ($data) {
      $this->setDeliveryDays($data->deliveryDays);
      $this->setCategories($data->categories);
    }
  }

  public function getDeliveryDays()
  {
    return (int)$this->_deliveryDays;
  }

  public function setDeliveryDays($days)
  {
    $this->_deliveryDays = $days;
  }

  public function setCategories($categories)
  {
    $this->_categories = $categories;
  }

  public function getCategories()
  {
    return $this->_categories;
  }
}