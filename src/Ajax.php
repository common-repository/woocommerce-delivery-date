<?php

namespace Dreamfox\DeliveryDate;

use Dreamfox\DeliveryDate\Ajaxs\AdminAjax;
use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;
class Ajax implements ApplicationInterface {
    public function bootstrap() {
        $admin = new AdminAjax();
        $admin->init();
    }

}
