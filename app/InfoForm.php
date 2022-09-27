<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoForm extends Model
{
    protected $fillable = ['id','name','phone','type','commitments','bank','salary','supported','notes'];


    public function typeText(){
        switch ($this->type) {
            case 1:
                return 'قطاع عسكري';
                break;
            case 2:
                return 'قطاع مدني';
                break;
            case 3:
                return 'قطاع خاص';
                break;     
            default:
              echo "غير معرف";
          }
    }

    public function SupportText(){
        switch ($this->supported) {
            case 1:
                return 'لا';
                break;
            case 2:
                return 'نعم';
                break;
            default:
              echo "غير معرف";
          }
    }


}
