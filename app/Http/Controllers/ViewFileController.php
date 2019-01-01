<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewFileController extends Controller
{
    public function index(Request $request)
    {
        return response()->file(storage_path('app/' . $request->get('file')));
    }
}
