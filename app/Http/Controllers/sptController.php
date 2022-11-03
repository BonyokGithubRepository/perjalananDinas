<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spt;
use Illuminate\Support\Facades\DB;

class sptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spt = DB::table('spt as a')
        ->select('a.*','b.name')
        ->join('users as b','a.id_user','=','b.id')
        ->get();
        $response = [
        'code' => '00',
        'message' => 'success',
        'data' => $spt
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
        $spt = new Spt;
        $spt->no_spt = $request->no_spt;
        $spt->tgl_berangkat = $request->tgl_berangkat;
        $spt->tgl_kembali = $request->tgl_kembali;
        $spt->asal = $request->asal;
        $spt->tujuan = $request->tujuan;
        $spt->transportasi = $request->transportasi;
        $spt->keperluan = $request->keperluan;
        $spt->id_user = $request->id_user;
        $spt->status = $request->status;
        $spt->save();

        return response([
            'code' => '00',
            'message' => 'Berhasil',
            'data' => $spt
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
        $spt = Spt::firstWhere('id', $id);
        if($spt){
           $spt = Spt::find($id);
           $spt->no_spt = $request->no_spt;
           $spt->tgl_berangkat = $request->tgl_berangkat;
           $spt->tgl_kembali = $request->tgl_kembali;
           $spt->asal = $request->asal;
           $spt->tujuan = $request->tujuan;
           $spt->transportasi = $request->transportasi;
           $spt->keperluan = $request->keperluan;
           $spt->status = $request->status;
           $spt->id_user = $request->id_user;
           $spt->save();
            return response([
                'status' => 'OK',
                'message' => 'DATA BERHASIL DI UBAH',
                'Udate-Data' => $spt

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
        $spt = Spt::firstWhere('id', $id);
            if($spt){
               Spt::destroy($id);
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
