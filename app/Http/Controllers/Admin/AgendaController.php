<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Agenda;
use Illuminate\Http\Request;

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
        // $data = Agenda::orderBy('created_at', 'desc')->get();
        // return $data;
        if ($request->ajax()) {
            // $data = Agenda::select('*')->orderBy('created_at','DESC');
            $data = Agenda::orderBy('created_at', 'desc')->get();
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
        
        return view('admin.Agenda.index');
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
