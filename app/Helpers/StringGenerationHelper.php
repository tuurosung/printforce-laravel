<?php

use Illuminate\Support\Str;


function generateRandomString($length = 10)
{
    if (function_exists('random_bytes')) {
        $bytes = random_bytes($length);
    } else {
        $bytes = openssl_random_pseudo_bytes($length);
    }

    $string = bin2hex($bytes);
    return Str::upper($string);
}


function generateDashedRandomNumber($length = 16)
{
    // get random string separated by - every 4 characters
    $randomString = generateRandomString($length);

    // separate $randomString into 4 parts by a dash after every 3 characters
    $split_array = str_split($randomString, 4);
    return implode('-', $split_array);
}




function generatedNumericId($limit = 10)
{
    $string = '';

    for($i = 0; $i < $limit;  $i++)
    {
        $string .= random_int(1, 9);
    }

    return $string;
}
