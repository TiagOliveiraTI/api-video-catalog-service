<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Domain\Entity\Validation;

use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Validation\DomainValidation;
use Core\Domain\Exceptions\EntityValidationException;

class DomainValidationTest extends TestCase
{
    public function testTestNotNull()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("should not be empty.");

        DomainValidation::notNull('');
    }

    public function testTestNotNullWithMessage()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("any message.");

        DomainValidation::notNull('', 'any message.');
    }

    public function testStringMaxLengthThrowsExceptionForMaxLength()
    {
        $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $maxValue = 20;
        $exceptionMessage = 'Custom exception message';

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage($exceptionMessage);

        DomainValidation::stringMaxLength($string, $maxValue, $exceptionMessage);
    }

    public function testStringMaxLengthThrowsExceptionForEqualMaxLength()
    {
        $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $maxValue = strlen($string);
        $exceptionMessage = null;

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("the max value is {$maxValue} characters.");

        DomainValidation::stringMaxLength($string, $maxValue, $exceptionMessage);
    }

    public function testStringMaxLengthDoesNotThrowExceptionForLessThanMaxLength()
    {
        $string = 'Short string';
        $maxValue = 255;
        $exceptionMessage = null;

        $this->expectNotToPerformAssertions();

        DomainValidation::stringMaxLength($string, $maxValue, $exceptionMessage);
    }

    public function testStringMaxLengthThrowsExceptionWithCustomExceptionMessage()
    {
        $string = 'Too long string';
        $maxValue = 10;
        $exceptionMessage = 'Custom exception message';

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage($exceptionMessage);

        DomainValidation::stringMaxLength($string, $maxValue, $exceptionMessage);
    }

}
