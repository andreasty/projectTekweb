<?php

namespace App\Http\Controllers;

use App\Models\poinMahasiswa;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class poinMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = poinMahasiswa::orderBy('id_poin', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('components.action-button')->with('data', $data);
            })
            ->make(true);
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
        $validasi = Validator::make($request->all(), [
            'namaKegiatan' => 'required',
            'kategori' => 'required',
            'instansi' => 'required',
            'tglKegiatan' => 'required',
            'semester' => 'required',
            'bukti' => 'required',
        ], [
            'namaKegiatan.required' => 'Form harus di isi',
            'kategori.required' => 'Form harus di isi',
            'instansi.required' => 'Form harus di isi',
            'tglKegiatan.required' => 'Form harus di isi',
            'semester.required' => 'Form harus di isi',
            'bukti.required' => 'Form harus di isi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'namaKegiatan' => $request->namaKegiatan,
                'kategori' => $request->kategori,
                'instansi' => $request->instansi,
                'tglKegiatan' => $request->tglKegiatan,
                'semester' => $request->semester,
                'bukti' => $request->bukti
            ];
            poinMahasiswa::create($data);
            return response()->json(['success' => "Berhasil upload poin, Silahkan tunggu di validasi"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
