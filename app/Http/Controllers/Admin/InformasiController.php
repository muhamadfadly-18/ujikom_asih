<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Informasi;
use App\Models\kategori;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Http\JsonResponse;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = kategori::all();
        $informasi = Informasi::all();
        // $data = Informasi::orderBy('created_at', 'desc')->get();
        // return $data;
        if ($request->ajax()) {
            // $data = Informasi::select('*')->orderBy('created_at','DESC');
            $data = Informasi::join('kategoris', 'kategoris.id', '=', 'informasis.kategori_id')
            ->select('informasis.*', 'kategoris.kategori as kategori') // Ambil semua kolom agenda dan nama kategori
            ->orderBy('informasis.created_at', 'desc')
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
        
        return view('admin.Informasi.index',compact('kategori','informasi'));
    }

    public function getAllData(): JsonResponse
    {
        // Mengambil semua data dari model
        $data = Informasi::all();

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
        $kategori = kategori::all();
        return view('admin.Informasi.index',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|integer|exists:kategoris,id', // Change to kategori_id
        ]);
        
        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
        
            Informasi::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto' => 'img/' . $filename,
                'kategori_id' => $request->kategori_id, // Change to kategori_id
            ]);
        }
        
        return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambah']);
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
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto bisa diabaikan
            'kategori_id' => 'required|integer|exists:kategoris,id',
        ]);
    
        // Siapkan data untuk diupdate
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ];
    
        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['foto'] = 'img/' . $filename; // Update foto baru
        }
    
        // Update informasi
        $Informasi->update($data);
    
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diupdate', 'foto' => $data['foto'] ?? $Informasi->foto]);
    }
    

    
   

    public function destroy(Informasi $Informasi)
    {
        $Informasi->delete();
    }
}
