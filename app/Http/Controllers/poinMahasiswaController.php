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
            'namaKegiatan.required' => 'Form nama kegiatan wajib diisi!',
            'kategori.required' => 'Form kategori kegiatan wajib diisi!',
            'instansi.required' => 'Form instansi penyelenggara wajib diisi!',
            'tglKegiatan.required' => 'Form tanggal kegiatan wajib diisi!',
            'semester.required' => 'Form semester wajib diisi!',
            'bukti.required' => 'Form bukti kegiatan wajib diisi!',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $request->validate([
                'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('bukti'), $imageName);

            $data = [
                'namaKegiatan' => $request->namaKegiatan,
                'kategori' => $request->kategori,
                'instansi' => $request->instansi,
                'tglKegiatan' => $request->tglKegiatan,
                'semester' => $request->semester,
                'bukti' => $imageName,
                'status' => $request->status
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
        $data = poinMahasiswa::where('id_poin', $id)->first();
        return response()->json(['result' => $data]);
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
        $validasi = Validator::make($request->all(), [
            'namaKegiatan' => 'required',
            'kategori' => 'required',
            'instansi' => 'required',
            'tglKegiatan' => 'required',
            'semester' => 'required',
            'bukti' => 'required',
            'status' => 'required',
        ], [
            'namaKegiatan.required' => 'Form nama kegiatan wajib diisi!',
            'kategori.required' => 'Form kategori kegiatan wajib diisi!',
            'instansi.required' => 'Form instansi penyelenggara wajib diisi!',
            'tglKegiatan.required' => 'Form tanggal kegiatan wajib diisi!',
            'semester.required' => 'Form semester wajib diisi!',
            'bukti.required' => 'Form bukti kegiatan wajib diisi!',
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
                'bukti' => $request->bukti,
                'status' => $request->status,
            ];
            poinMahasiswa::where('id_poin', $id)->update($data);
            return response()->json(['success' => "Berhasil edit data poin, Silahkan tunggu di validasi"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        poinMahasiswa::where('id_poin', $id)->delete();
    }
}
