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