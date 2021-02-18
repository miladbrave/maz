<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(20);
        return view('back.brand.index',compact('brands'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->title = $request->brand;
        $brand->save();
        return back();
    }

    public function show(Brand $brand)
    {
        //
    }


    public function edit(Brand $brand)
    {
        return view('back.brand.edit',compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->title = $request->brand;
        $brand->save();
        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back();
    }
}
