<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kwitansi;
use Illuminate\Support\Facades\DB;

class kwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kwitansi = DB::table('kwitansi as a')
                    ->select('a.*','b.name')
                    ->join('users as b','a.id_user','=','b.id')
                    ->get();
         $response = [
            'code' => '00',
            'message' => 'success',
            'data' => $kwitansi
         ];
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $kwitansi = new Kwitansi();
       $kwitansi->id_user = $request->id_user;
       $kwitansi->uang_transport = $request->uang_transport;
       $kwitansi->uang_dinas = $request->uang_dinas;
       $kwitansi->total = $request->total;
       $kwitansi->save();

        return response([
            'code' => '00',
            'message' => 'Berhasil',
            'data' => $kwitansi
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
        
        $kwitansi = Kwitansi::firstWhere('id', $id);
        if($kwitansi){
            $kwitansi = Kwitansi::find($id);
            $kwitansi->id_pegawai = $request->id_pegawai;
            $kwitansi->uang_transport = $request->uang_transport;
            $kwitansi->uang_dinas = $request->uang_dinas;
            $kwitansi->total = $request->total;
            $kwitansi->save();
            return response([
                'status' => 'OK',
                'message' => 'DATA BERHASIL DI UBAH',
                'Udate-Data' => $kwitansi

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
        $kwitansi = Kwitansi::firstWhere('id', $id);
        if($kwitansi){
           Kwitansi::destroy($id);
           return response([
            'Status' => 'OK',
            'Message' => 'Data Berhsil Di Hapus',
           ],200 );
        } else {
        return response([
            'Status' => 'Not Found',
            'message' => 'ID tidak ditemukan',
        ],300);
                 }
    }
}
