<?php
namespace App\Http\Helpers;
use App\Models\Category;
// use Auth;
class Helper{

    public static function uplodePhotoProduct($file){
        $ext=$file->getClientOriginalExtension();
        $filename='product_'.time().'.'.$ext;
        $file->move('assets/uploads/product',$filename);
        
        return $filename;
    }

    public static function uplodePhoto($file,$path){
        $ext=$file->getClientOriginalExtension();
        $filename='uplaode_'.time().'.'.$ext;
        $file->move($path,$filename);
        
        return $filename;
    }
}
?>