<?php

namespace App\Http\Controllers\API;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mahasiswa = Mahasiswa::query();
        return ResponseFormatter::success($mahasiswa->paginate(5), 'Data mahasiswa berhasil diambil');
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
        Mahasiswa::create($request->all());

        return ResponseFormatter::success($request->all(), "Data berhasil ditambahkan!");
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
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa != null) {
            $mahasiswa->update($request->all());
            return ResponseFormatter::success($mahasiswa, 'Data users berhasil diubah');
        }

        return ResponseFormatter::success($mahasiswa, 'Data user gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa != null) {
            $mahasiswa->delete();
            return ResponseFormatter::success($mahasiswa, 'Data users berhasil dihapus');
        }

        return ResponseFormatter::success([], 'Data mahasiswa gagal dihapus');
    }
}
