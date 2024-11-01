<?php
namespace Dreamfox\DeliveryDate\Site;

use Dreamfox\DeliveryDate\Abstracts\AbstractCheckoutFieldManager;
use Dreamfox\DeliveryDate\Facades\SystemFacade;
use Dreamfox\DeliveryDate\Helpers\CartHelper;

class CheckoutFieldManager extends AbstractCheckoutFieldManager
{

  public function process()
  {
    $setting = SystemFacade::getInstance()->loadSettings();
    $appliedCategories = $setting->getCategories();
    $cartCategories = CartHelper::getCategories();
    $hasAtLeastOne = !empty(array_intersect($cartCategories, $appliedCategories));
    if (!$hasAtLeastOne) {
      return;
    }
    $datesToDeliver = $setting->getDeliveryDays();
    $dateFormat = get_option('date_format');
    $minDeliveryDate = date($dateFormat, strtotime('+' . ( $datesToDeliver ) . ' day', current_time('timestamp', 0)));
    $label = __('Select delivery date', 'dreamfox-wdd');
    $required = false;
		$this->_fields[DREAMFOX_WDD_FIELD_NAME] = array(
			DREAMFOX_WDD_FIELD_NAME => array(
				'type' => 'text',
				'class' => array('delivery-date form-row-wide'),
				'label' => $label,
				'default' => $minDeliveryDate,
				'required' => $required,
			)
		);
  }
}