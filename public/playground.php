<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([
    'óne',
    'dва',
    'три',
    'четыре'
]);

if ($numbers->contains('три')) {
    echo "The collection contains 'три'.\n";
} else {
    echo "The collection does not contain 'три'.\n";
}

