<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Domain\Entity\Traits;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Exception;
use PHPUnit\Framework\TestCase;


class MagicMethodsTraitTest extends TestCase
{
    public function testMagicGetterWithExistingProperty()
    {
        // Arrange
        $sut = new class {
            use MagicMethodsTrait;
            
            public $exampleProperty = 'example_value';
        };

        // Act
        $result = $sut->exampleProperty;

        // Assert
        $this->assertEquals('example_value', $result);
    }

    public function testMagicGetterWithNonExistentProperty()
{
    // Arrange
    $sut = new class {
        use MagicMethodsTrait;
    };

    $className = get_class($sut);

    // Assert
    $this->expectException(Exception::class);
    $this->expectExceptionMessage("Property nonExistentProperty not found in class $className");

    // Act
    $sut->nonExistentProperty;
}

}
