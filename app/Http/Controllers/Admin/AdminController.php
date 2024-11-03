<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Informasi;
use App\Models\gallery;

class AdminController extends Controller
{
    public function index()
    {

        $agenda = Agenda::all();
        $informasi = Informasi::all();
        $gallery = gallery::all();

        // return $gallery;
    	return view('admin.index' ,compact('agenda','informasi','gallery'));
    }
}
