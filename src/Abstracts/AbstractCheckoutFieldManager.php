<?php
namespace Dreamfox\DeliveryDate\Abstracts;

use Dreamfox\DeliveryDate\Helpers\CartHelper;

abstract class AbstractCheckoutFieldManager
{

  protected $_fields;

  public function __construct($fields)
  {
    $this->_fields = $fields;
  }

  abstract public function process();

  public function getFields()
  {
    return $this->_fields;
  }

  protected function _isAvailable($appliedCategories)
  {
    $cartCategories = CartHelper::getCategories();
    $hasAtLeastOne = !empty(array_intersect($cartCategories, $appliedCategories));
    return $hasAtLeastOne;
  }

  protected function _getMinDeliveryDate($datesToDeliver)
  {
    $dateFormat = get_option('date_format');
    $minDeliveryDate = date($dateFormat, strtotime('+' . ( $datesToDeliver ) . ' day', current_time('timestamp', 0)));
    return $minDeliveryDate;
  }
}