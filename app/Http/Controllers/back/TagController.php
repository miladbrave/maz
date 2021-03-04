<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(50);
        return view('back.tag.index',compact('tags'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->title = $request->tag;
        $tag->save();
        return back();
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('back.tag.edit',compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->title = $request->tag;
        $tag->save();
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
