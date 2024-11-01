<?php
namespace Dreamfox\DeliveryDate\Views;

use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;

class AdminJsView extends BaseView
{
  private $_staticUrl;

  public function __construct(ApplicationInterface $app, $staticJsUrl)
  {
    parent::__construct($app);
    $this->_staticUrl = $staticJsUrl;
    $this->setTemplate('admin_js_view');
  }

  public function getStaticUrl()
  {
    return $this->_staticUrl;
  }
}