<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Informasi;
use Illuminate\Http\Request;
use DataTables;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Informasi::orderBy('created_at', 'desc')->get();
        // return $data;
        if ($request->ajax()) {
            // $data = Informasi::select('*')->orderBy('created_at','DESC');
            $data = Informasi::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<div class="row"><a href="javascript:void(0)" id="'.$row->id.'" class="btn btn-primary btn-sm ml-2 btn-edit">Edit</a>';
                           $btn .= '<a href="javascript:void(0)" id="'.$row->id.'" class="btn btn-danger btn-sm ml-2 btn-delete">Delete</a></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.Informasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        Informasi::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $Informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $Informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $Informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $Informasi)
    {
        return response()->json($Informasi);
    }

    public function update(Request $request, Informasi $Informasi)
    {
        $Informasi->update($request->all());
    }

    public function destroy(Informasi $Informasi)
    {
        $Informasi->delete();
    }
}
