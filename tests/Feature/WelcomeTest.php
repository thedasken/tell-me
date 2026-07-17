<?php

declare(strict_types=1);

test('returns a successful response', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee(config('app.name'))
        ->assertSee('Start for free')
        ->assertSee('Log in')
        ->assertSee('resources/css/app.css')
        ->assertDontSee('Laravel has an incredibly rich ecosystem.');
});
