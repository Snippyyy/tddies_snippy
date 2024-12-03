<?php

it('gives back succesful responese for home page', function () {

    $response = $this->get('/');

    $response->assertStatus(200);

});
