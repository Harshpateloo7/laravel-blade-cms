<?php

namespace App\Http\Controllers;
use App\Models\Experience;

use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    //
    public function list()
    {
        return view('experiences.list', [
            'experiences' => Experience::all()
        ]);
    }
    // Add
    public function addForm()
    {
        return view('experiences.add', [
            'experiences' => Experience::all(),
        ]);
    }
    public function add()
    {
        $attributes = request()->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'url' => 'required',
        ]);

        $experience = new Experience();
        $experience->job_title = $attributes['job_title'];
        $experience->company_name = $attributes['company_name'];
        $experience->location = $attributes['location'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];
        $experience->description = $attributes['description'];
        $experience->url = $attributes['url'];
        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been added!');
    }

    //EDIT
    public function editForm(Experience $experience)
    {
        return view('experiences.edit', [
            'experience' => $experience,
        ]);
    }

    public function edit(Experience $experience)
    {

        $attributes = request()->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'url' => 'required',
        ]);

        $experience->job_title = $attributes['job_title'];
        $experience->company_name = $attributes['company_name'];
        $experience->location = $attributes['location'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];
        $experience->description = $attributes['description'];
        $experience->url = $attributes['url'];

        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been edited!');
    }

    //DELETE
    public function delete(Experience $experience)
    {
        $experience->delete();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been deleted!');

    }
}
