<?php

namespace App\Http\Controllers;

use App\daftarLowongan;
use App\Preset;
use App\InfoLowongan;
use App\User;
use App\Instansi;
use App\DataSiswa;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class daftarLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $preset = preset::where('status','active')->first();
        if(Auth::user()->role == 'instansi'){
            return view('instansi.datapelamar',compact('preset'));
        }
        return view('user.daftarLowongan',compact('preset'));
    }

    public function json()
    {
        if(Auth::user()->role == 'instansi'){
            $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where('instansi_id', Auth::user()->dataInstansi->id);
            return DataTables::eloquent($model)->make(true);
        }
        $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where('jurusan_id', Auth::user()->datasiswa->jurusan_id);
        return DataTables::eloquent($model)->make(true);
    }

    public function active($user_id)
    {
        daftarLowongan::where('user_id',$user_id)->update(['status' => 'Diterima']);
        return response()->json();
    }

    public function deactive($user_id)
    {
        daftarLowongan::where('user_id',$user_id)->update(['status' => 'Tidak Diterima']);
        return response()->json();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\daftarLowongan  $daftarLowongan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\daftarLowongan  $daftarLowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(daftarLowongan $daftarLowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\daftarLowongan  $daftarLowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, daftarLowongan $daftarLowongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\daftarLowongan  $daftarLowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        daftarLowongan::find($id)->delete();
        return response()->json();
    }
}
