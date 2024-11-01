<?php
namespace Dreamfox\DeliveryDate\Helpers;

use DateTime;

class DateHelper
{

  public static function createFromFormat($dateFormat, $currentDate, $count)
  {
    $timezone = wp_timezone_string();
    return new DateTime(date($dateFormat, strtotime($currentDate)), $timezone);
  }

  public static function toJsDate($dateString) {
    $pattern = array(
          //day
          'd', //day of the month
          'j', //3 letter name of the day
          'l', //full name of the day
          'z', //day of the year
          //month
          'F', //Month name full
          'M', //Month name short
          'n', //numeric month no leading zeros
          'm', //numeric month leading zeros
          //year
          'Y', //full numeric year
          'y' //numeric year: 2 digit
        );
    $replace = array(
      'dd', 'd', 'DD', 'o',
      'MM', 'M', 'm', 'mm',
      'yy', 'y'
    );
    foreach ($pattern as &$p) {
      $p = '/' . $p . '/';
    }
    return preg_replace($pattern, $replace, $dateString);
  }

  public static function getJsDateFormat($dateText)
  {
    return self::toJsDate($dateText);
  }

  public static function createDateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);
    while ($current <= $last) {
      $a  = date($format, $current);
      $dates[] = date($format, $current);
      $current = strtotime($step, $current);
    }
    return $dates;
  }

  public static function toDateYmd($dateText)
  {
    $parts = explode('/', $dateText);
    $dateStr = sprintf('%s-%s-%s', $parts[2], $parts[1], $parts[0]);
    return $dateStr;
  }

  public static function toJsDateObject($year, $month, $day)
  {
    return sprintf('new Date(%s, %s, %s)', $year, $month, $day);
  }
}