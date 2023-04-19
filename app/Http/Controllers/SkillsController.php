<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillsController extends Controller
{
    //list
    public function list()
    {
        return view('skills.list', [
            'skills' => Skill::all()
        ]);
    }
      // Add
    public function addForm()
    {
        return view('skills.add', [
            'skills' => Skill::all(),
        ]);
    }
    public function add()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $skill = new Skill();
        $skill->title = $attributes['title'];
        $skill->url = $attributes['url'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been added!');
    }
    //edit
    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $skill->title = $attributes['title'];
        $skill->url = $attributes['url'];

        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been edited!');
    }
    //delete
    public function delete(Skill $skill)
    {
        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skill has been deleted!');

    }
    //image
    public function imageForm(Skill $skill)
    {
        return view('skills.image', [
            'skill' => $skill,
        ]);
    }
    public function image(Skill $skill)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($skill->image)
        {
            Storage::delete($skill->image);
        }
        
        $path = request()->file('image')->store('skills');

        $skill->image = $path;
        $skill->save();
        
        return redirect('/console/skills/list')
            ->with('message', 'skill image has been edited!');
    }
}
