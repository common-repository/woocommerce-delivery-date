<?php
namespace Dreamfox\DeliveryDate\Views;

use Dreamfox\DeliveryDate\Helpers\DateHelper;
use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;

class DeliveryDateView extends BaseView
{

  public function __construct(ApplicationInterface $app)
  {
    parent::__construct($app);
    $this->setTemplate('delivery_date');
  }

  public function getMinDate()
  {
    // $dateFormat = get_option('date_format');
    // $dateFormat = 'd/m/Y';
    // $currentDate = date($dateFormat, strtotime(current_time('mysql')));
    $currentDate = DateHelper::toJsDateObject(date('Y'), date('m'), date('d'));
    return $currentDate;
  }
}