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
        
        try{
        Excel::import(new PropertiesImport, $file);
        } catch (Exception $e) {
            // return redirect()->back()->with('message', 'حدث خطأ ما ');
        }        

        
        Toastr::success('message', 'تم رفع البيانات بنجاح.');


        return redirect()->back()->with('message', 'تم رفع البيانات بنجاح');
    }


public function checkUploadedFileProperties($extension, $fileSize)
{
$valid_extension = array("csv", "xlsx"); //Only want csv and excel files
$maxFileSize = 2097152; // Uploaded file size limit is 2mb
if (in_array(strtolower($extension), $valid_extension)) {
if ($fileSize <= $maxFileSize) {
} else {
throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
}
} else {
throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
}
}

}
