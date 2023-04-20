<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperiencesController extends Controller
{
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
            'end_date' => 'nullable|in:present',
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

    // public function edit(Experience $experience)
    // {

    //     $attributes = request()->validate([
    //         'job_title' => 'required',
    //         'company_name' => 'required',
    //         'location' => 'required',
    //         'start_date' => 'required',
    //         'end_date' => 'required',
    //         'description' => 'required',
    //         'url' => 'required',
    //     ]);

    //     $experience->job_title = $attributes['job_title'];
    //     $experience->company_name = $attributes['company_name'];
    //     $experience->location = $attributes['location'];
    //     $experience->start_date = $attributes['start_date'];
    //     $experience->end_date = $attributes['end_date'];
    //     $experience->description = $attributes['description'];
    //     $experience->url = $attributes['url'];

    //     $experience->save();

    //     return redirect('/console/experiences/list')
    //         ->with('message', 'Experience has been edited!');
    // }

    public function edit(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        if ($request->method() == 'POST') {
            $request->validate([
                'job_title' => 'required',
                'company_name' => 'required',
                'location' => 'required',
                'start_date' => 'required|date',
                'description' => 'required',
                'url' => 'nullable|url',
            ]);

            $experience->job_title = $request->job_title;
            $experience->company_name = $request->company_name;
            $experience->location = $request->location;
            $experience->start_date = $request->start_date;

            if ($request->has('present')) {
                $experience->end_date = null;
            } else {
                $experience->end_date = $request->end_date;
            }

            $experience->description = $request->description;
            $experience->url = $request->url;
            $experience->save();

            return redirect('/console/experiences/list');
        }

        return view('experiences.edit', compact('experience'));
    }



    //DELETE
    public function delete(Experience $experience)
    {
        $experience->delete();

        return redirect('/console/experiences/list')
            ->with('message', 'Experience has been deleted!');

    }




}