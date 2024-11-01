<?php
namespace Dreamfox\DeliveryDate\Abstracts;

use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;
use Dreamfox\DeliveryDate\Interfaces\AssetsInterface;

abstract class AbstractWebApplication implements ApplicationInterface
{

  protected $_assetsManager;
  public function __construct(AssetsInterface $assetsManager )
  {
    $this->_assetsManager = $assetsManager;
  }

  public function bootstrap()
  {
    $this->_assetsManager->register();
  }
}