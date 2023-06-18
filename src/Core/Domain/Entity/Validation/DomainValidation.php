<?php

declare(strict_types=1);

namespace Core\Domain\Entity\Validation;

use Core\Domain\Exceptions\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, ?string $exceptionMessage = null)
    {
        if(empty($value))
        {
            throw new EntityValidationException($exceptionMessage ?? "should not be empty.");
        }
    }
}