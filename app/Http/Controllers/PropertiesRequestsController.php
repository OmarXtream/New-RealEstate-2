<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PRequest;

use App\PropertiesRequests;

class PropertiesRequestsController extends Controller
{
    public function index()
    {
        return view('pages.properties.Requests');
    }


    public function Create(PRequest $request)
    {

        $Form = PropertiesRequests::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'type' => $request['type'],
            'city' => $request['city'],
            'rooms' => $request['rooms'],
            'baths' => $request['baths'],
            'min_price' => $request['min_price'],
            'max_price' => $request['max_price'],
            'first_district' => $request['first_district'],
            'Second_district' => $request['Second_district'],
            'Third_district' => $request['Third_district'],
            'Fourth_district' => $request['Fourth_district'],
            'details' => $request['details'],
            ]);

            if(!$Form->save()){
                return redirect()->back()
                ->withErrors(['حدث خطأ ما , حاول مره أخرى']);
            }else{
              return redirect()->back()->with('message', 'شكرا لكم , سيتم التواصل معكم');

            }

    }

}
