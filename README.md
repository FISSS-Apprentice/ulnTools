# ulnTools


ULN (Unique Learner Number) tools to validate a uln as per the specification at 

[https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/710270/ULN_validation.pdf]


Usage:

install with composer
```
composer require fisss-apprentice/ulntools
```


then use in a file

```php
<?php

use UlnTools\UlnValidation;

$testResult = false;
try {
    $testResult = UlnValidation::validate($testUln);
    } catch (Exception $e) {
    
}

if ($testResult) {
    echo "ULN is valid";
}

```


UlnValidation::validate returns true if a valid uln is provided

an exception is thrown with more detail about problem contained in the exception message


