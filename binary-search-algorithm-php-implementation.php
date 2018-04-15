<?php
    $data = [1,2,4,5,6,7,8,9];

    /**
    * @param Array $haystack sorted array to be searched
    * @param mixed $needle the value that we search for
    * @param boot $returnIndex if trye
    * @return bool|int it return true if found false if not but if $returnIndex is set to true will return the index of $needle if found or false if not found
    */
    function binarySearch($haystack, $needle, $returnIndex = false) {
        //starting points
        $left = 0;
        $right = count($haystack) - 1;
        
        while ($left<=$right) {
            $mid = floor(($right-$left)/2);
            
            if ($needle == $haystack[$mid]) {
                if ($returnIndex === true) {
                    return (int) $mid;
                } else {
                    return true;
                }
            } else if ($needle > $haystack[$mid]) {
                //shift the start point to be next element to the mid
                $left = $mid + 1;
            } else if ($needle < $haystack[$mid]) {
                //shift the nend point to be the element before to the mid
                $right = $mid - 1;
            }
        }
        
        return false;
    }

    $result = binarySearch($data, 5, true);
    var_dump($result);
    
