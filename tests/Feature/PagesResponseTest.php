<?php

use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('gives back succesful responese for home page', function () {
    get(route('welcome'))
        ->assertOk();   //Lo mismo que assertResponse(200);
});
