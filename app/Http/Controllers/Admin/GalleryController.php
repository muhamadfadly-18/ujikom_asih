<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Http\JsonResponse;


class GalleryController extends Controller
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
            $data = gallery::orderBy('created_at', 'desc')->get();
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
        
        return view('admin.gallery.index');
    }

    public function getAllData()
    {
        // Mengambil semua data dari tabel Gallery
        $galleryData = Gallery::all();
    
        // Mengambil IP lokal dari file .env
        $serverIp = config('app.SERVER_IP'); // Default ke 127.0.0.1 jika tidak ada IP di .env
        // dd($serverIp); // Debug untuk memastikan IP diambil dengan benar
        
        // Menambahkan field foto_url untuk setiap item
        $galleryDataWithUrl = $galleryData->map(function ($item) use ($serverIp) {
            $item->foto_url = 'http://' . $serverIp . '/img/' . $item->foto;
            return $item;
        });
    
        // Tambahkan header CORS di sini
        return response()->json([
            'status' => 'success',
            'data' => $galleryDataWithUrl
        ])
        ->header('Access-Control-Allow-Origin', '*')  // Allow all origins
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')  // Allow necessary methods
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');  // Allow necessary headers
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
    $request->validate([
        'text' => 'required|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'required|date',
    ]);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $fotoPath = 'img/' . $filename;
    }

    gallery::create([
        'text' => $request->text,
        'foto' => $fotoPath,
        'tanggal' => $request->tanggal,
    ]);

    return response()->json(['success' => 'Data berhasil ditambah']);
}
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $Gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        return response()->json($gallery);
    }
    
    public function update(Request $request, gallery $gallery)
{
    $request->validate([
        'text' => 'required|string',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'required|date',
    ]);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);

        if ($gallery->foto && file_exists(public_path($gallery->foto))) {
            unlink(public_path($gallery->foto));
        }

        $gallery->foto = 'img/' . $filename;
    }

    $gallery->update($request->except('foto'));

    return response()->json(['success' => 'Data berhasil diubah']);
}
    
    public function destroy(gallery $gallery)
    {
        $gallery->delete();
    }
}
