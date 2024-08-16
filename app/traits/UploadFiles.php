<?php


namespace App\traits;

use Illuminate\Http\Request;
 
trait UploadFiles{


    public function uploadFile(Request $request, $file, $filepath){

        if (isset($file)){
            $filename=$file->hashName();
            $file->move(public_path($filepath),$filename);
            return $filepath."/".$filename;
        }

    }
}
