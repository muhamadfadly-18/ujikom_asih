<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Agenda;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


use DataTables;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = kategori::all(); // Mengambil semua data kategori
    
        if ($request->ajax()) {
            // Melakukan join tabel 'agenda' dengan tabel 'kategori' untuk mengambil nama kategori
            $data = Agenda::join('kategoris', 'kategoris.id', '=', 'agendas.kategori_id')
                ->select('agendas.*', 'kategoris.kategori as kategori') // Ambil semua kolom agenda dan nama kategori
                ->orderBy('agendas.created_at', 'desc')
                ->get();
    
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
        
        return view('admin.Agenda.index', compact('kategori'));
    }
    
    public function getAllData(): JsonResponse
    {
        // Mengambil semua data dari model
        $data = Agenda::all();

        // Mengembalikan data sebagai JSON
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
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
        
        Agenda::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $Agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $Agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $Agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $Agenda)
    {
        return response()->json($Agenda);
    }

    public function update(Request $request, Agenda $Agenda)
    {
        $Agenda->update($request->all());
    }

    public function destroy(Agenda $Agenda)
    {
        $Agenda->delete();
    }
}
