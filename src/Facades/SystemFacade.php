<?php
namespace Dreamfox\DeliveryDate\Facades;

use Dreamfox\DeliveryDate\Repositories\SettingRepository;
use Dreamfox\DeliveryDate\Settings;

class SystemFacade
{

  private static $_instance = null;

  public static function getInstance() {
    if (self::$_instance == null) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function loadCategories()
  {
    $categories = get_categories( array(
      'taxonomy' => 'product_cat',
      'hierarchical' => 1,
      'orderby' => 'name',
      'order'   => 'ASC',
      'hide_empty' => false,
    ));
    $result = [];
    foreach ($categories as $category) {
      $result[] = [
        'value' => $category->term_id,
        'label' => $category->name,
      ];
    }
    return $result;
  }

  public function loadSettings()
  {
    $repository = new SettingRepository();
    $settings = $repository->load();
    return $settings;
  }

  public function saveSettings($data)
  {
    $settings = new Settings($data);
    $repository = new SettingRepository();
    $repository->save($settings);
  }
}