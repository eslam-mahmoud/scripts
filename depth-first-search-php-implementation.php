<?php

    // Create the data as in 
    // https://en.wikipedia.org/wiki/Depth-first_search
    $data = [
        1 => [2, 7, 8],
        2 => [1, 3, 6],
        3 => [2, 4, 5],
        4 => [3],
        5 => [3],
        6 => [2],
        7 => [1],
        8 => [1, 9, 12],
        9 => [8, 10, 11],
        10 => [9],
        11 => [9],
        12 => [8]
    ];

    /**
    * @param array $haystack
    * @param int|string $start
    * @param int|string $needle The searched value.
    * @param array $stack first in last out keys of haystack keys to search
    * @param array $visited list of visited keys of haystack
    * @return bool
    */
    function depthFirstSearch($haystack, $start, $needle, &$stack = [], &$visited = []) {
        $result = false;
        // if start not visited before add it to stack and visited arrays
        if (!in_array($start, $visited)) {
            $visited[] = $start;
            $stack[] = $start;
        }
        // loop on the haystack
        foreach($haystack[$start] as $k=>$v){
            //if we have the needle then good return true
            if($v === $needle) {
                return true;
            } else if (in_array($v, $visited)){
                // if repeated key then skip it
                continue;
            } else {
                //add it to stack and visited
                $stack[] = $v;
                $visited[] = $v;
                //get all children first and add them before moving to the next node
                $result = depthFirstSearch($haystack, $v, $needle, $stack, $visited);
                // if needle found on any of the children
                // break the loop and propagate return the result
                // will keep breaking parent loops till we get to the main one and return then
                if ($result === true){
                    break;
                }
            }
        }
        // final return in the main call
        return $result;
    }

    var_dump(breadthFirstSearch($data, 1, 10));
