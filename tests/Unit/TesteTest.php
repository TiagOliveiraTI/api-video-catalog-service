<?php

use Core\Teste;

test('Test return 123', function () {
    $sut = new Teste();
    expect($sut->foo())->toBe('123');
});
