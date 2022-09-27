<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InfoForm;

class InfoFormController extends Controller
{
    public function index()
    {
        $infos = InfoForm::get(); 

        return view('admin.infoForm', compact('infos'));
    }
}
