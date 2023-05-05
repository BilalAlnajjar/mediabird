<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function download(){
        $path = storage_path('/app/public/file/collect.pdf');
        return response()->download($path,'MediaBird.pdf');
}
}
