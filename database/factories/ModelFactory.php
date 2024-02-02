<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Attachment::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Branch::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Commit::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\CommitFile::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\CommitFilePhpc::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\ConfigIssueEffort::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\ConfigPriority::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\ConfigStatus::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Favorite::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Issue::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\IssueType::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Label::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Note::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Organization::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\ProductBacklog::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\PullRequest::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Sprint::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\Status::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\UserStat::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(\App\Models\UserStory::class, function (Faker\Generator $faker) {
    return [
    ];
});
