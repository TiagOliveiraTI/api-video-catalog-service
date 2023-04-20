<?php

declare(strict_types=1);

namespace Core\Domain\Entity\Traits;

use Exception;

trait MagicMethodsTrait
{
    public function __get($property)
    {
        $className = get_class($this);

        if(!$this->{$property}) {
            throw new Exception("Property $property not found in class $className");
        }

        return $this->{$property};
    }
}
