<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;
use App\Property;
use App\User;

use App\Http\Requests\FavRequest;

use Auth;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Create($pid)
    {

        $property = Property::findOrFail($pid);

        $user = User::findOrFail(Auth::user()->id);


        $user->Properties()->attach($property->id);

    
        return redirect()->back()->with('message', 'تم إضافة العقار للمفضلة');

            

    }


    public function Delete($fid)
    {


        $property = Property::findOrFail($fid);

        $user = User::findOrFail(Auth::user()->id);


        $user->Properties()->detach($property->id);

        return redirect()->back()->with('message', 'تم إلغاء العقار من المفضلة');
            

    }
}
