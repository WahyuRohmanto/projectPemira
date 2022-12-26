<?php

namespace App\Action;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class JSONImporter 
{
    public static function import($uploadedFile)
    {
        $JSONFile = file_get_contents($uploadedFile);
        $data = json_decode($JSONFile);
        foreach ($data as $key => $value) {
            JSONImporter::dataProcessing($value);
        }
        dd('Sukses !');
    }
    
    public static function dataProcessing($value)
    {
        DB::transaction(function () use ($value){    
            $userData = new User();
            $userData->name = $value->name;
            $userData->email = $value->email != NULL ? $value->email : NULL ;
            $userData->nim = $value->nim != NULL ? $value->nim : NULL ;
            $userData->password = 123;
            $userData->remember_token = $value->remember_token != NULL ? $value->remember_token : NULL ;
            $userData->created_at = \Carbon\Carbon::now();
            $userData->updated_at = \Carbon\Carbon::now();
            $userData->tahun = $value->tahun != NULL ? $value->tahun : NULL ;
            $userData->status = $value->status;
            $userData->save();
        });
    }
}