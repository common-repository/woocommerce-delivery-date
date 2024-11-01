<?php
namespace Dreamfox\DeliveryDate\Ajaxs;

use Dreamfox\DeliveryDate\Abstracts\AbstractAjax;
use Dreamfox\DeliveryDate\Facades\SystemFacade;

class AdminAjax extends AbstractAjax
{

  public function getAjaxEvents()
  {
    return [
      'load_categories',
      'save_settings',
    ];
  }

  public function load_categories()
  {
    $categories = SystemFacade::getInstance()->loadCategories();
    $response = array(
			'message' => 'Updated successfully!',
      'categories' => $categories,
		);
		wp_send_json( $response );
  }

  public function save_settings()
  {
    $data = $this->_getRequestData();
    SystemFacade::getInstance()->saveSettings($data);
    $response = array(
			'message' => 'Updated successfully!',
		);
		wp_send_json( $response );
  }
}