<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Feature;
use Toastr;
use Carbon\Carbon;
class FeatureController extends Controller
{

    public function index()
    {
        $features = Feature::latest()->get();

        return view('admin.features.index',compact('features'));
    }


    public function create()
    {
        return view('admin.features.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:features|max:255',
            'icon' => 'required'

        ]);


        $icon = $request->file('icon');
        $slug  = str_slug($request->name);
        $tag = new Feature();
        $tag->name = $request->name;
        if(isset($icon)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$icon->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('features')){
                Storage::disk('public')->makeDirectory('features');
            }
            Storage::disk('public')->put('features/'.$imagename, file_get_contents($icon));
            $tag->icon = $imagename;

        } 



        $tag->slug = str_slug($request->name);
        $tag->save();
        Toastr::success('message', 'تم الإنشاء بنجاح.');
        return redirect()->route('admin.features.index');
    }
    

    public function edit($id)
    {
        $feature = Feature::find($id);

        return view('admin.features.edit',compact('feature'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $feature = Feature::find($id);
        $feature->name = $request->name;
        $feature->slug = str_slug($request->name);
        $feature->save();

        Toastr::success('message', 'Feature updated successfully.');
        return redirect()->route('admin.features.index');
    }


    public function destroy($id)
    {
        $feature = Feature::find($id);
        $feature->delete();
        $feature->features()->detach();

        Toastr::success('message', 'Feature deleted successfully.');
        return back();
    }
}
