<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use UlnTools\UlnValidation;

// too few digits
$testUln=100010250;
$testResult = false;
try {
    $testResult = UlnValidation::validate($testUln);
} 
catch (Exception $e) {
    echo $e->getMessage() ."\n";
}

if ($testResult) {
    echo "ULN is valid";
}


// not a number
$testUln='string';
$testResult = false;
try {
    $testResult = UlnValidation::validate($testUln);
} 
catch (Exception $e) {
    echo $e->getMessage() ."\n";
}

if ($testResult) {
    echo "ULN is valid";
}


