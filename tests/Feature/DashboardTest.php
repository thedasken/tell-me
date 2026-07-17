<?php

declare(strict_types=1);

use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Good morning, '.$user->name.'.')
        ->assertSee('Entries this month')
        ->assertSee('18')
        ->assertSee('Your rhythm')
        ->assertSee('Recent entries')
        ->assertSee('A slower morning');
});
