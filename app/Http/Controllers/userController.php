<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users as a')
                    ->select('a.*','b.nama_jabatan')
                    ->join('jabatan as b','a.jabatan_id','=','b.id')
                    ->get();
         $response = [
            'code' => '00',
            'message' => 'success',
            'data' => $user
         ];
        return response()->json($response,200);
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
       $user = new User();
       $user->nip = $request->nip;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->token = $request->token;
       $user->telepon = $request->telepon;
       $user->alamat = $request->alamat;
       $user->jabatan_id = $request->jabatan_id;
       $user->role = $request->role;
       $user->save();

        return response([
            'code' => '00',
            'message' => 'Berhasil',
            'data' => $user
        ]);
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
        $user = User::firstWhere('id', $id);
        if($user){
           $user = User::find($id);
           $user->nip = $request->nip;
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = $request->password;
           $user->token = $request->token;
           $user->telepon = $request->telepon;
           $user->alamat = $request->alamat;
           $user->jabatan_id = $request->jabatan_id;
           $user->role= $request->role;
           $user->save();
            return response([
                'status' => 'OK',
                'message' => 'DATA BERHASIL DI UBAH',
                'Udate-Data' => $user

            ],200);
        } else {
            return response([
                'Status' => 'Not Found',
                'Mesaage' => 'id tidak di temukan'
            ],300);
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
        
    }
}
