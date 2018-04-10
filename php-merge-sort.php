<?php
  $a = [2, 8, 5, 3, 9, 4, 1, 7, 0];
  function mergeSort($array) {
    $arrayLength = count($array);
    if ($arrayLength <= 1) {
      return $array;
    }
    
    $medel = floor($arrayLength/2);
    $array1 = array_slice($array, 0, $medel);
    $array2 = array_slice($array, $medel, $arrayLength-1);
    
    $array1 = mergeSort($array1);
    $array2 = mergeSort($array2);
    
    return merge($array1, $array2);
  }

    function merge($array1, $array2) {
        $result = [];
        while (count($array1) > 0 && count($array2) > 0) {
            $v1 = array_shift($array1);
            $v2 = array_shift($array2);
            if ($v1 < $v2) {
                $result[] = $v1;
                array_unshift($array2, $v2);
            } else {
                $result[] = $v2;
                array_unshift($array1, $v1);
            } 
        }
        
        if (count($array1) > 0) {
            $result = array_merge($result, $array1);
        } else if (count($array2) > 0) {
            $result = array_merge($result, $array2);
        }
        return $result;
    }

    print_r(mergeSort($a));
    
