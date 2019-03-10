<?php

$person = [
    'full_name' => 'John Doe',
    'age' => 26,
    'location' => [
        'address' => 'Banani',
        'city' => 'Dhaka',
        'country' => [
            'country_code' => 'BD',
            'country_name' => 'Bangladesh',
            'local' => [
                'name' => 'বাংলাদেশ',
                'code' => 'PRB',
            ],
        ],
    ],
];

foreach ($person as $key => $value) {
    if (is_array($value)) {
        iterate_array($value);
    } else {
        echo keytotext($key).': '.$value.'<br/>';
    }
}

function iterate_array($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            iterate_array($value);
        } else {
            echo keytotext($key).': '.$value.'<br/>';
        }
    }
}

function keytotext($key)
{
    return ucwords(str_replace('_', ' ', $key));
}
