<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Photo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('back.blog.index',compact('blogs'));
    }

    public function create()
    {
        return view('back.blog.create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->distribute;
        $blog->save();

        $blog->slug;
        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->blog_id = $blog->id;
            $photos->save();
        }

        return redirect()->route('blog.index');
    }

    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        return view('back.blog.edit',compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->distribute;
        $blog->save();
        $photos = Photo::whereId($request->get('photo_id'))->first();
        if ($photos) {
            $photos->blog_id = $blog->id;
            $photos->save();
        }

        return redirect()->route('blog.index');

    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
