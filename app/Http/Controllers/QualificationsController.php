<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;

class QualificationsController extends Controller
{
    //
    public function list()
    {
        return view('qualifications.list', [
            'qualifications' => Qualification::all()
        ]);
    }
     // Add
     public function addForm()
     {
         return view('qualifications.add', [
             'qualification' => Qualification::all(),
         ]);
     }
     public function add()
     {
         $attributes = request()->validate([
             'college_name' => 'required',
             'program_name' => 'required',
             'location' => 'required',
             'url' => 'required',
             'started_at' => 'required',
             'ended_at' => 'nullable',
         ]);
 
         $qualification = new Qualification();
         $qualification->college_name = $attributes['college_name'];
         $qualification->program_name = $attributes['program_name'];
         $qualification->location = $attributes['location'];
         $qualification->url = $attributes['url'];
         $qualification->started_at = $attributes['started_at'];
         $qualification->ended_at = $attributes['ended_at'];
         $qualification->save();
 
         return redirect('/console/qualifications/list')
             ->with('message', 'Qualification has been added!');
     }

     public function editForm(Qualification $qualification)
     {
         return view('qualifications.edit', [
             'qualification' => $qualification,
         ]);
     }

     public function edit(Qualification $qualification)
    {

        $attributes = request()->validate([
            'college_name' => 'required',
            'program_name' => 'required',
            'location' => 'required',
            'url' => 'nullable|url',
            'started_at' => 'required',
            'ended_at' => 'nullable',
        ]);

        $qualification->college_name = $attributes['college_name'];
        $qualification->program_name = $attributes['program_name'];
        $qualification->location = $attributes['location'];
        $qualification->url = $attributes['url'];
        $qualification->started_at = $attributes['started_at'];
        $qualification->ended_at = $attributes['ended_at'];
        $qualification->save();

        return redirect('/console/qualifications/list')
            ->with('message', 'Qualification has been edited!');
    }

    public function delete(Qualification $qualification)
    {
        $qualification->delete();
        
        return redirect('/console/qualifications/list')
            ->with('message', 'Qualification has been deleted!');

    }
}
