<?php
namespace Dreamfox\DeliveryDate\Helpers;

class PremiumHelper
{

  public static function createObject($className, ...$args)
  {
    $fullClassName = '\\Dreamfox\\DeliveryDate\\Premium\\' . $className;
    return new $fullClassName(...$args);
  }
}