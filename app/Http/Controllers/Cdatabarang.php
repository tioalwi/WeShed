<?php

namespace App\Http\Controllers;

use App\Models\databarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class Cdatabarang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = databarang::orderBy('sku', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('databarang.tombol')->with('data', $data);
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
            'sku' => 'required|unique:databarang',
            'nm_barang' => 'required',
            'varian' => 'required',
        ], [
            'sku.required' => '*SKU Wajib Diisi*',
            'sku.unique' => '*SKU Tidak Boleh Sama*',
            'nm_barang.required' => '*NAMA Barang Wajib Diisi*',
            'varian.required' => '*VARIAN Wajib Diisi*'
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            // Kirim data ke DB
            $data = [
                'sku' => $request->sku,
                'nm_barang' => $request->nm_barang,
                'varian' => $request->varian,
                // 'jumlah' => $request->jumlah
            ];
            databarang::create($data);
            return response()->json(['success' => "Data Berhasil Tersimpan"]);
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
     * @param  int  $sku
     * @return \Illuminate\Http\Response
     */
    public function edit($sku)
    {
        $data = databarang::where('sku', $sku)->first();
        return response()->json(['result' => $data]);
        // return "Masuk";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        $validasi = Validator::make($request->all(), [
            // 'sku' => 'required',
            'nm_barang' => 'required',
            'varian' => 'required',
        ], [
            // 'sku.required' => '*SKU Wajib Diisi*',
            // 'sku.unique' => '*SKU Tidak Boleh Sama*',
            'nm_barang.required' => '*NAMA Barang Wajib Diisi*',
            'varian.required' => '*VARIAN Wajib Diisi*'
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            // Kirim data ke DB
            $data = [
                'sku' => $request->sku,
                'nm_barang' => $request->nm_barang,
                'varian' => $request->varian,
                // 'jumlah' => $request->jumlah
            ];
            databarang::where('sku', $sku)->update($data);
            return response()->json(['success' => "Data Berhasil Terupdate"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sku
     * @return \Illuminate\Http\Response
     */
    public function destroy($sku)
    {
        databarang::where('sku', $sku)->delete();
    }
}