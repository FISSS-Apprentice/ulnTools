<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use UlnTools\UlnValidation;

$testUln=1000102504;
$testResult = false;
try {
    $testResult = UlnValidation::validate($testUln);
    } catch (Exception $e) {
    echo $e->getMessage();
}

if ($testResult) {
    echo "$testUln ULN is valid";
}
