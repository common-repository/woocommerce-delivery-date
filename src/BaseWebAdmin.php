<?php
namespace Dreamfox\DeliveryDate;

use Dreamfox\DeliveryDate\Abstracts\AbstractAssets;
use Dreamfox\DeliveryDate\Abstracts\AbstractWebApplication;
use Dreamfox\DeliveryDate\Views\AdminJsView;

class BaseWebAdmin extends AbstractWebApplication
{

  public function __construct(AbstractAssets $assetsManager )
  {
    parent::__construct($assetsManager);
    add_action('admin_head', [$this, 'declareJsFunctions']);
  }

  public function declareJsFunctions()
  {
    $view = new AdminJsView($this, $this->_assetsManager->getRelativeStaticUrl());
    echo $view->render();
  }
}