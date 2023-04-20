<?php

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