<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Exceptions\EntityValidationException;

class Category
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true
    ) {
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = ''): void
    {
        $this->name = $name;
        $this->description = $description;

        $this->validate();
    }

    private function validate()
    {
        if (empty($this->name)) {
            throw new EntityValidationException('name cannot be empty');
        }

        if (strlen($this->name) <= 2) {
            throw new EntityValidationException('name cannot be less than 3');
        }
    }
}
