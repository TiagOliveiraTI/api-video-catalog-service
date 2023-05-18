<?php

namespace Tests\Unit\Core\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\Category;
use Core\Domain\Dto\CategoryInputDto;

class CategoryTest extends TestCase
{
    public function testClassAttributes()
    {
        $sut = new Category(
            name: 'any_category',
            description: 'any_description',
            isActive: true,
        );

        $this->assertEquals('any_category', $sut->name);
        $this->assertEquals('any_description', $sut->description);
        $this->assertTrue($sut->isActive);
    }

    public function testShouldBeActivated()
    {
        $sut = new Category(
            name: 'any_category',
            isActive: false,
        );

        $this->assertFalse($sut->isActive);
        
        $sut->activate();
        
        $this->assertTrue($sut->isActive);
    }

    public function testShouldBeDisabled()
    {
        $sut = new Category(
            name: 'any_category'
        );

        $this->assertTrue($sut->isActive);
        
        $sut->disable();
        
        $this->assertFalse($sut->isActive);
    }

    public function testShouldBeNothing()
    {
        $sut = new Category(
            id: 'test_id',
            name: 'test_name',
            description: 'test_description',
            isActive: false,
        );

        $this->assertFalse($sut->isActive);
        
        $sut->disable();
        
        $this->assertFalse($sut->isActive);
    }

    public function testUpdateCategoryCorrectly()
    {
        // Arrange
        $uuid = 'uuid.value';

        $inputDto = new CategoryInputDto(
            name: 'example_category_name',
            description: 'example_category_description',
            isActive: true,
        );

        $sut = new Category(
            id: $uuid,
            name: $inputDto->name,
            description: $inputDto->description,
            isActive: $inputDto->isActive,
        );

        // Act
        $sut->update(
            name: 'new_category_name',
            description: 'new_category_description',
        );

        // Assert
        $this->assertEquals('new_category_name', $sut->name);
        $this->assertEquals('new_category_description', $sut->description);
        $this->assertTrue($sut->isActive);
    }
}
