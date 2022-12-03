<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PMarkat;
use App\PropertiesMarkating;

class PropertiesMarkatingController extends Controller
{
    public function index()
    {
        return view('pages.properties.Marakting');
    }
    

    public function Create(PMarkat $request)
    {

        $Form = PropertiesMarkating::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'type' => $request['type'],
            'city' => $request['city'],
            'rooms' => $request['rooms'],
            'baths' => $request['baths'],
            'price' => $request['price'],
            'details' => $request['details'],
            ]);

            if(!$Form->save()){
                return redirect()->back()
                ->withErrors(['حدث خطأ ما , حاول مره أخرى']);
            }else{
                return view('pages/thanks');

            }

    }
}
