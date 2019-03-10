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
        ],
    ],
];

$location = $person['location'];

echo $person['full_name'].'<br/>';
echo $person['age'].'<br/>';
echo $location['address'].'<br/>';
echo $location['city'].'<br/>';
echo $location['country']['country_code'].'<br/>';
echo $location['country']['country_name'].'<br/>';
