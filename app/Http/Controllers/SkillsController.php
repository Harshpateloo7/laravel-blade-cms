<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillsController extends Controller
{
    
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

    public function delete(Skill $skill)
    {
        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skill has been deleted!');

    }
}
