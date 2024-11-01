<?php
namespace Dreamfox\DeliveryDate\Views;

use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;

class AdminOrderView extends EmailView
{

  public function __construct(ApplicationInterface $app, $order)
  {
    parent::__construct($app, $order);
    $this->setTemplate('admin_order_view');
  }
}