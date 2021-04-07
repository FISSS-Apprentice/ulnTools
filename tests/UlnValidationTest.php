<?php 
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use UlnTools\UlnValidation;
use PHPUnit\Framework\TestCase;


final class UlnValidationTest extends TestCase
{
    // known valid uln
    public function testValidUln(): void
    {
        $testUln = 1000102504;
        $testResult = UlnValidation::validate($testUln);
        $this->assertTrue($testResult);
    }

    // must be exactly 10 digits
    public function testExceptionLessThanTenDigits(): void
    {
        $testUln = 100010250;

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('must be exactly 10 digits');
        $testResult = UlnValidation::validate ($testUln);
        $this->assertFalse($testResult);
    }

    // must be exactly 10 digits
    public function testExceptionMoreThanTenDigits(): void
    {
        $testUln = 10001025045;

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('must be exactly 10 digits');
        $testResult = UlnValidation::validate ($testUln);
        $this->assertFalse($testResult);
    }

    // uln must be an int
    public function testExceptionUlnNotInt(): void
    {
        $testUln = 'string';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('not numeric');
        $testResult = UlnValidation::validate ($testUln);
        $this->assertFalse($testResult);
    }

    // uln must be positive whole number
    public function testExceptionNotPositive(): void
    {
        $testUln = -100000000;

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('not a positive number');
        $testResult = UlnValidation::validate ($testUln);
        $this->assertFalse($testResult);
    }

    // uln must have valid checksum
    public function testExceptionInvalidChecksum(): void
    {
        $testUln = 1000102508;

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid checksum');
        $testResult = UlnValidation::validate ($testUln);
        $this->assertFalse($testResult);
    }
}



