<?php
namespace Dreamfox\DeliveryDate\Repositories;

use Dreamfox\DeliveryDate\Settings;
use stdClass;

class SettingRepository
{
  const KEY_DELIVERY_DAYS = 'dreamfox_wdd_delivery_days';
  const KEY_CATEGORIES = 'dreamfox_wdd_categories';

  public function load()
  {
    $days = get_option(self::KEY_DELIVERY_DAYS, 0);
    $categories = get_option(self::KEY_CATEGORIES);
    if (!is_array($categories)) {
      $categories = [];
    }
    $settings = new Settings();
    $settings->setDeliveryDays($days);
    $settings->setCategories($categories);
    return $settings;
  }

  public function save(Settings $data)
  {
    update_option(self::KEY_DELIVERY_DAYS, $data->getDeliveryDays());
    update_option(self::KEY_CATEGORIES, $data->getCategories());
  }
}