<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
   //Arrange
   $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id'=> $employer->id
    ]);
   //Art and Assert
   expect($job->employer->is($employer))->toBeTrue();
});

it('can have a tag', function () {
    //Arrange
     $job = Job::factory()->create();
     $job->tag('Frontend');
    //Art and Assert
    expect($job->tags)->toHaveCount(1);
 });