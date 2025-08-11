<?php

use App\Models\Job;

it('belongs to an employer', function () {
    $employer = \App\Models\Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id
    ]);

    expect($job->employer->is($employer))->toBeTrue();
});

it('can have tags', function () {
    $job = Job::factory()->create();

    $job->tag('Backend');

    expect($job->tags)->toHaveCount(1);

});
