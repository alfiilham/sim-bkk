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
        return view('user.daftarlowongan', compact('preset'));
    }

    public function json()
    {
        $model = daftarLowongan::with(['Lowongan','Instansi'])->where('jurusan_id', Auth::user()->datasiswa->jurusan_id);
        return DataTables::eloquent($model)->make(true);
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
    public function show(daftarLowongan $daftarLowongan)
    {
        //
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
    public function destroy(daftarLowongan $daftarLowongan)
    {
        //
    }
}
