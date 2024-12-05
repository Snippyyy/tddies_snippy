<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows courses overview', function () {
    //Los test tienen 3 secciones -->
    //Arrange

    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $thirdCourse = Course::factory()->released()->create();

    Course::factory()->create([
        'title' => 'Course A',
        'description' => 'Description Course A',
        'released_at' => Carbon::now(),
    ]);
    Course::factory()->create([
        'title' => 'Course B',
        'description' => 'Description Course B',
        'released_at' => Carbon::now(),
    ]);
    Course::factory()->create([
        'title' => 'Course C',
        'description' => 'Description Course C',
        'released_at' => Carbon::now(),
    ]);

    //Act                    //Assert
    get(route('home'))->assertSeeText([
        $firstCourse->title,
        $firstCourse->description,
        $secondCourse->title,
        $secondCourse->description,
        $thirdCourse->title,
        $thirdCourse->description,
    ]);

});

it('shows only released courses', function () {
    //Arrange
    $releasedCourse = Course::factory()->released()->create();
    $notReleasedCourse = Course::factory()->create();

    //Act                       //Assert
    get(route('home'))->assertSeeText([
        $releasedCourse->title,
    ])->assertDontSeeText([
        $notReleasedCourse->title,
    ]);

});

it('shows courses by release date', function () {

    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();
    $newestReleasedCourse = Course::factory()->released()->create();
    //Act           //Assert
    get(route('home'))->
        assertSeeTextInOrder([
            $newestReleasedCourse->title,
            $releasedCourse->title,
        ]);

});
