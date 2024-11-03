<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\kategori;
use Illuminate\Http\Request;
use DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Gallery::select('*')->orderBy('created_at','DESC');
            $data = kategori::orderBy('created_at', 'desc')->get();
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
        
        return view('admin.kategori.index');
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
        
        Kategori::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $Kategori)
    {
        return response()->json($Kategori);
    }

    public function update(Request $request, Kategori $Kategori)
    {
        $Kategori->update($request->all());
    }

    public function destroy(Kategori $Kategori)
    {
        $Kategori->delete();
    }
}
