<?php

// use Dotenv\Parser\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Type;
use App\Models\User;
use App\Models\Entry;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;

use App\Models\Qualification;
use App\Models\Experience;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/types', function () {

    $types = Type::orderBy('title')->get();
    return $types;

});

Route::get('/topics', function () {

    $topics = Topic::orderBy('title')->get();
    return $topics;

});
Route::get('/skills', function () {

    $skills = Skill::orderBy('title')->get();
    return $skills;

});

Route::get('/certificates', function () {
    $certificates = Certificate::orderBy('title')->get();
    return $certificates;

});
Route::get('/qualifications', function () {

    $qualifications = Qualification::orderBy('college_name')->get();
    return $qualifications;

});

Route::get('/entries', function () {

    $entries = Entry::orderBy('learned_at')->get();
    return $entries;

});

Route::get('/projects', function () {

    $projects = Project::orderBy('created_at')->get();

    foreach ($projects as $key => $project) {
        $projects[$key]['user'] = User::where('id', $project['user_id'])->first();
        $projects[$key]['type'] = Type::where('id', $project['type_id'])->first();

        if ($project['image']) {
            $projects[$key]['image'] = env('APP_URL') . 'storage/' . $project['image'];
        }
    }

    return $projects;

});

Route::get('/projects/profile/{project?}', function (Project $project) {

    $project['user'] = User::where('id', $project['user_id'])->first();
    $project['type'] = Type::where('id', $project['type_id'])->first();

    if ($project['image']) {
        $project['image'] = env('APP_URL') . 'storage/' . $project['image'];
    }

    return $project;

});



Route::get('/experiences', function () {

    $experiences = Experience::orderBy('start_date')->get();
    return $experiences;

});

// Route::get('/experiences', function () {
//     $experiences = Experience::orderBy('end_date')->get();
//     $formattedExperiences = $experiences->map(function ($experience) {
//         return [
//             'id' => $experience->id,
//             'title' => $experience->job_title,
//             'company_name' => $experience->company_name,
//             'start_date' => $experience->start_date,
//             'end_date' => $experience->end_date,
//         ];
//     });
//     return $formattedExperiences;
// });
