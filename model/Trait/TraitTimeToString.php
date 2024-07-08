<?php
trait TraitTimeToString
{
    /**
   * @return string format example : "1 heure et 30 minutes"
   */
  private function timeToString($time){
    $hours = floor($time / 60);
    $minutes = $time % 60;
    
    $toReturn = "";

    if($hours > 0){
      $toReturn .= $hours . ' heure' . ($hours > 1 ? 's' : '');
      if($minutes > 0) $toReturn .= ' et ';
    }
    if($minutes > 0){
      $toReturn .= $minutes . ' minute' . ($minutes > 1 ? 's' : '');
    }

    return $toReturn;
  }

}