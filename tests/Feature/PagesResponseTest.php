<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);
it('gives back succesful responese for home page', function () {
    get(route('welcome'))
        ->assertOk();   //Lo mismo que assertResponse(200);
});
