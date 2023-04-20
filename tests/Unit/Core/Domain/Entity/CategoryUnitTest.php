<?php

use Core\Domain\Dto\CategoryInputDto;
use Core\Domain\Entity\Category;

it('should test the class attributes', function() {
    $sut = new Category(
        name: 'any_category',
        description: 'any_description',
        isActive: true,
    );

    expect($sut->name)->toBe('any_category');
    expect($sut->description)->toBe('any_description');
    expect($sut->isActive)->toBeTrue();
});

it('should be activated', function () {
    $sut = new Category(
        name: 'any_category',
        isActive: false,
    );

    expect($sut->isActive)->toBeFalsy();
    
    $sut->activate();
    
    expect($sut->isActive)->toBeTrue();

});

it('should be disabled', function () {
    $sut = new Category(
        name: 'any_category',
        isActive: true,
    );

    expect($sut->isActive)->toBeTrue();
    
    $sut->disable();
    
    expect($sut->isActive)->toBeFalsy();

});

it('should update the category correctly', function () {
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
    expect($sut->name)->toBe('new_category_name');
    expect($sut->description)->toBe('new_category_description');
    expect($sut->isActive)->toBeTrue();
});