<?php

test('globals')
    ->expect(['dd', 'dump', 'ray', 'env'])
    ->not->toBeUsed();

test('controllers')
    ->expect('App\Http\Controllers')
    ->not->toUse('Illuminate\Http\Request');

test('value objects')
    ->expect('App\ValueObjects')
    ->toUseNothing();
