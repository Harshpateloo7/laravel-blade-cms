<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Entry;

use Illuminate\Http\Request;


class TopicsController extends Controller
{
    public function list()
    {
        return view('topics.list', [
            'topics' => Topic::all()
        ]);
    }
    // Add
    public function addForm()
    {
        return view('topics.add', [
            'entries' => Topic::all(),
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $topic = new Topic();
        $topic->title = $attributes['title'];
        $topic->save();

        return redirect('/console/topics/list')
            ->with('message', 'Topic has been added!');
    }
     //EDIT
    public function editForm(Topic $topic)
    {
        return view('topics.edit', [
            'topic' => $topic,
        ]);
    }
    public function edit(Topic $topic)
    {

        $attributes = request()->validate([
            'title' => 'required',
           
        ]);

        $topic->title = $attributes['title'];
        $topic->save();

        return redirect('/console/topics/list')
            ->with('message', 'Topic has been edited!');
    }
    public function delete(Topic $topic)
    {
        $topic->delete();
        
        return redirect('/console/topics/list')
            ->with('message', 'Topic has been deleted!');

    }
}



