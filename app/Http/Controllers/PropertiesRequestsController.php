<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PRequest;

use App\PropertiesRequests;

use Mail;

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
                $data = array(
                    'name' => $request['name'],
                    'phone' => $request['phone'],
                    'type' => $request['type'],
                    'city' => $request['city'],
                    'rooms' => $request['rooms'],
                    'baths' => $request['baths'],
                    'min_price' => $request['min_price'],
                    'max_price' => $request['max_price'],
                    'details' => $request['details'],
                        
                );
                Mail::send('mail', $data, function($message) {
                   $message->to('rawabireal@gmail.com', 'ادارة الروابي')->subject('طلب عقاري جديد');
                   $message->from('admin@rawabireal.com','طلبات العقار الإلكترونية');
                });
          
                return redirect('/thanks');

            }

    }

}
