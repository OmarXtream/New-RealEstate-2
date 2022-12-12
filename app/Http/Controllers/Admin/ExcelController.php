<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

use Auth;
use Toastr;

use Excel;
use App\Imports\PropertiesImport;
class ExcelController extends Controller
{

    public function index()
    {
        return view('admin.excelUpload');
    }
    
    public function uploadContent(Request $request){
         $file = $request->file('uploaded_file');
        

        Excel::import(new PropertiesImport, $file);


        
        Toastr::success('message', 'تم رفع البيانات بنجاح.');


        return redirect()->back()->with('message', 'تم رفع البيانات بنجاح');
    }




}
