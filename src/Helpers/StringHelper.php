<?php
namespace Dreamfox\DeliveryDate\Helpers;

class StringHelper
{

  public static function prefix( $text )
  {
    return DREAMFOX_WDD_PREFIX . $text;
  }
}