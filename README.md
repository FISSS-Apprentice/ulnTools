# ulnTools


ULN (Unique Learner Number) tools to validate a uln as per the specification at 
https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/710270/ULN_validation.pdf

The validator first checks if the ULN is in the correct format then calculates the checksum.


Usage:

install with composer
```
composer require fisss-apprentice/ulntools
```


then use in a file

```php
<?php
require 'vendor/autoload.php'; // require composer dependencies
use UlnTools\UlnValidation;

$testUln=1000102504;
$ulnValid = false;
$errorMessage = '';
try {
    $ulnValid = UlnValidation::validate($testUln);
} catch (Exception $e) {
    $errorMessage = $e->getMessage() ."\n";
}

if (!$ulnValid) {
    die('uln is not valid '.$errorMessage);
}

// too few digits
$testUln=100010250;
$ulnValid = false;
$errorMessage = '';
try {
    $ulnValid = UlnValidation::validate($testUln);
} catch (Exception $e) {
    $errorMessage = $e->getMessage() ."\n";
}

if (!$ulnValid) {
    die('uln is not valid '.$errorMessage);
}

```


UlnValidation::validate returns true if a valid uln is provided

an exception is thrown with more detail about problem contained in the exception message


