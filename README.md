# ulnTools


ULN (Unique Learner Number) tools to validate a uln as per the specification at 
https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/710270/ULN_validation.pdf


Usage:

install with composer
```
composer require fisss-apprentice/ulntools
```


then use in a file

```php
<?php

use UlnTools\UlnValidation;

$testUln=1000102504;
try {
    if(UlnValidation::validate($testUln)){
        echo "ULN is valid";
    }
} catch (Exception $e) {
    echo $e->getMessage() ."\n";
}

// too few digits
$testUln=100010250;
try {
    if(UlnValidation::validate($testUln)){
        echo "ULN is valid";
    }
} 
catch (Exception $e) {
    echo $e->getMessage() ."\n";
}

```


UlnValidation::validate returns true if a valid uln is provided

an exception is thrown with more detail about problem contained in the exception message


