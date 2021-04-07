<?php 
namespace UlnTools;
use Exception;
use InvalidArgumentException;

class UlnValidation
{
    /**
     * @method validate
     *
     * Checks if a ULN number is in the correct format, 10 digits including a 1 digit checksum
     *
     * @link https://assets.publishing.service.gov.uk/government/uploads/system/uploads/attachment_data/file/710270/ULN_validation.pdf
     *
     * 1. Take the first 9 digits of the entered ULN.
     * 2. Sum 10 × first digit + 9 x second digit + 8 x third digit + 7 x fourth digit + 6 x fifth digit
     * + 5 x sixth digit + 4 x seventh digit + 3 x eighth digit + 2 × ninth digit
     * 3. Divide this number by 11 and find the remainder (modulo function).
     * 4. Subtract the remainder from 10. If this number is greater than 0 and matches the
     * tenth digit from the entered ULN, the ULN format is valid.
     *
     * @param int $uln
     *
     * @return bool
     * @throws Exception
     */
    public static function validate(int $uln): bool
    {
        $uln = trim($uln);
        // uln must only contain a number
        if (!is_numeric($uln)){
            throw new InvalidArgumentException( 'not numeric');
        }

        // uln must only be 10 digits
        if (10 != strlen($uln)){
            throw new InvalidArgumentException( 'must be exactly 10 digits');
        }

        // uln must be positive whole number
        if (intval($uln) < 1) {
            throw new InvalidArgumentException( 'not a positive number');
        }

        // calculate the checksum
        $firstNine =  str_split(substr($uln, 0, 9));
        $givenChecksum  = substr($uln, -1);
        $total = 0;

        for ($i = 0; $i<9; $i++){
            $multiplier = 10-$i;
            $digit = intval($firstNine[$i]);
            $total += $multiplier * $digit;
        }

        $mod =  $total % 11;
        $calcChecksum = 10 - $mod;

        if ($givenChecksum != $calcChecksum){
            throw new InvalidArgumentException( 'invalid checksum');
        }

        return true;
    }
}
