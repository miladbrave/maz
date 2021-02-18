<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('back.download.index', compact('downloads'));
    }

    public function create()
    {
        return view('back.download.create');
    }

    public function store(Request $request)
    {
        $uploadfile = $request->file('file');
        $filename = time() . $uploadfile->getClientOriginalName();
        $original_name = $uploadfile->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'DownloadFiles', $uploadfile, $filename
        );

        $download = new Download();
        $download->original_name = $original_name;
        $download->path = $filename;
        $download->user_id = auth()->user()->id;
        $download->type = $request->type;
        $download->title = $request->title;
        $download->description = $request->description;
        $download->price = $request->price;
        $download->save();

        return redirect()->route('download.index');
    }

    public function show(Download $download)
    {
        return Storage::disk('public')->download('/DownloadFiles/' . $download->path);
    }


    public function edit(Download $download)
    {
        return view('back.download.edit', compact('download'));
    }


    public function update(Request $request, Download $download)
    {
        if ($request->file) {
            $uploadfile = $request->file('file');
            $filename = time() . $uploadfile->getClientOriginalName();
            $original_name = $uploadfile->getClientOriginalName();
            Storage::disk('public')->putFileAs(
                'DownloadFiles', $uploadfile, $filename
            );
            $download->original_name = $original_name;
            $download->path = $filename;
        }

        $download->user_id = auth()->user()->id;
        $download->type = $request->type;
        $download->description = $request->description;
        $download->title = $request->title;
        $download->price = $request->price;
        $download->save();

        return redirect()->route('download.index');

    }

    public function destroy(Download $download)
    {
        Storage::disk('public')->delete('/DownloadFiles/' . $download->path);
        $download->delete();
        return back();

    }
}
