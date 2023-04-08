<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        return ResponseFormatter::success($users->paginate(5), 'Data users berhasil diambil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = [
                "username" => $request->username,
                "password" => Hash::make($request->password)
            ];
            
            User::create($data);

            return ResponseFormatter::success($data, "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return ResponseFormatter::success($users, 'Data users berhasil diambil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
            $user = User::find($id);

            $data = [
                "username" => $request->username,
                "password" => Hash::make($request->password)
            ];

            if ($user != null) {
                $user->update($data);
                return ResponseFormatter::success($user, 'Data users berhasil diubah');
            }

            return ResponseFormatter::success([], 'Data user gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user != null) {
            $user->delete();
            return ResponseFormatter::success($user, 'Data users berhasil dihapus');
        }

        return ResponseFormatter::success([], 'Data user gagal dihapus');
    }
}
