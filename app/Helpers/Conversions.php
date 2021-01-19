<?php

namespace App\Helpers;

class Conversions
{
  /**
   * Convert the key or value of array of CamelCase to under_score or under_score to CamelCase
   * @param $array
   * @param $toConvert
   * @param $invert
   * @return mixed
   */
  public static function convertCamelToUnder($array, $toConvert, $invert)
  {
    foreach ($array as $key => $value) {
      $newString = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', ${$toConvert}));
      if ($invert) {
        $newString = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', ${$toConvert}))));
      }
      if ($newString != ${$toConvert}) {
        if ($toConvert == 'key') {
          $array[$newString] = $array[${$toConvert}];
          unset($array[$key]);
        } else {
          $array[$key] = $newString;
        }
      }
    }
    return $array;
  }

}
