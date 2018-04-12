<?php

    // Create the data as in 
    // https://en.wikipedia.org/wiki/Breadth-first_search
    $data = [
        1 => [2, 3, 4],
        2 => [1, 5, 6],
        3 => [1],
        4 => [1, 7, 8],
        5 => [2, 9, 10],
        6 => [2],
        7 => [4, 11, 12],
        8 => [4],
        9 => [5],
        10 => [5],
        11 => [7],
        12 => [7]
    ];

    /**
    * @param array $haystack
    * @param int|string $start
    * @param int|string $needle The searched value.
    * @param array $queue first in first out queue of haystack keys to search
    * @param array $visited list of visited keys of haystack
    * @return bool
    */
    function breadthFirstSearch($haystack, $start, $needle, $queue = [], $visited = []) {
        //if start not visited before add it to queue and visited arrays
        if (!in_array($start, $visited)) {
            $queue[] = $start;
            $visited[] = $start;
        }
        //loop on all values of the start point to add them to the queue and visited if not visited before
        foreach($haystack[$start] as $k=>$v){
            if (in_array($v, $visited)){
                continue;
            } else {
                $queue[] = $v;
                $visited[] = $v;
            }
        }
        
        //loop on the queue till it become empty
        while ($key = array_shift($queue)) {
            //if empty return false no more items to check
            if ($key === null){
                return false;
            } else if($key === $needle) { 
                // if found the element then return true
                return true;
            } else {
                // else use the first element in the queue to be the new start point 
                return breadthFirstSearch($haystack, $key, $end, $queue, $visited);
            }
        }
        // we should not be here because of the null check inside the while()
        return false;
    }

    var_dump(breadthFirstSearch($data, 1, 10));
