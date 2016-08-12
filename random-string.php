<?php
// Return random string
// @param $length Integer set the length of the returned random string (optional)
// @param $characters String string of chars to randomize and return random string from them (optional)
function getRandomString($length = 64, $characters = null) {
    if (!$characters) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-[]';
    }
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Will echo random string length 10 characters 
echo getRandomString(10);
?>
