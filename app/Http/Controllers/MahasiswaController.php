<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    //  {
    //      $this->middleware('auth');
    //  }
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['title' => 'Data Mahasiswa', 'mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = ["Teknik Informatika", "Sistem Informasi", "Hukum", "Sastra", "Politik", "Psikologi"];
        return view('mahasiswa.create',['title' => 'Tambah Mahasiswa', 'jurusan' => $jurusan]);
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
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        // $mahasiswa = Mahasiswa::find($id);
        // dd($mahasiswa->toArray());
        // $jurusan = ["Teknik Informatika", "Sistem Informasi", "Hukum", "Sastra", "Politik", "Psikologi"];
        // return view('mahasiswa.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mahasiswa::where('id', $id)->update($request->all());
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
