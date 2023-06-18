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
}
