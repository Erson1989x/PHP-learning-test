<?php

return [
    'database' => [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'myfirstdb',
    'charset'=> 'utf8mb4',
    ],

    'services'=> [
        'prerender'=> [
            'token' => true,
            'secret' => 'https://prerender.io',
        ]
    ],

];