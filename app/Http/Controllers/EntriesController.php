<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entry;
use App\Models\EntryTopics;

use App\Models\Topic;

class EntriesController extends Controller
{

    public function list()
    {
        return view('entries.list', [
            'entries' => Entry::all()
        ]);
    }

    // Add
    public function addForm()
    {
        return view('entries.add', [
            'topics' => Topic::all(),
        ]);
    }
    public function add()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
            'topics' => 'nullable',
        ]);

        $entry = new Entry();
        $entry->title = $attributes['title'];
        $entry->content = $attributes['content'];
        $entry->learned_at = $attributes['learned_at'];
        $entry->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been added!');
    }

    //EDIT
    public function editForm(Entry $entry)
    {
        return view('entries.edit', [
            'entry' => $entry,
        ]);
    }

    public function edit(Entry $entry)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
        ]);

        $entry->title = $attributes['title'];
        $entry->content = $attributes['content'];
        $entry->learned_at = $attributes['learned_at'];

        $entry->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been edited!');
    }
    public function delete(Entry $entry)
    {
        $entry->delete();
        
        return redirect('/console/entries/list')
            ->with('message', 'Entry has been deleted!');

    }
}