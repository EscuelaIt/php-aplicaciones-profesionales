<?php
namespace Lib;

use Carbon\Carbon;

class Dates {

  public static function today() {
    return Carbon::now();
  }

  public static function tomorrow() {
    return self::today()->addDays(1);
  }

  public static function longDate($date) {
    Carbon::setLocale('es');
    return $date->isoFormat('dddd DD [de] MMMM'); 
  }
  
}