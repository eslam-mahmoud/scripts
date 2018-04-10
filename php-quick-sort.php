<?php

    $a = [2, 8, 5, 3, 9, 4, 1, 7, 0];

    function quickSort($array){
      if (count($array) <= 1) {
        return $array;
      }
      
      $pivot = array_pop($array);
      $left  = []; // less than pivot
      $right = []; // more than pivot
      
      foreach($array as $k=>$v) {
        if ($v <= $pivot) {
          $left[] = $v;
        } else {
          $right[] = $v;
        }
      }
      
      $left = quickSort($left);
      $right = quickSort($right);
      
      return array_merge($left, [$pivot], $right);
    }

    print_r(quickSort($a));
