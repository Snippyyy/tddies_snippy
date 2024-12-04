<?php

use function Pest\Laravel\get;

it('gives back succesful responese for home page', function () {
    get(route('welcome'))
        ->assertOk();   //Lo mismo que assertResponse(200);
});
