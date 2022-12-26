<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\JSONImporter;

class WorkerController extends Controller
{
    function index()
    {
        return view('pages.import');
    }

    function importJSON(Request $request)
    {
        $file = $request->file('json_data');
        JSONImporter::import($file);
    }
}
