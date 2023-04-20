<?php

declare(strict_types=1);

namespace Core\Domain\Dto;

use Core\Domain\Entity\Traits\MagicMethodsTrait;

readonly class CategoryInputDto
{
    use MagicMethodsTrait;
    
    public function __construct(
        public string $name = '',
        public string $description = '',
        public bool $isActive = true
    ) {
    }
}
