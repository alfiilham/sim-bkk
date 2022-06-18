<?php

namespace App\Http\Controllers;

use App\statusDetail;
use App\Message;
use App\Siswa;
use App\DataStatus;
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
use Illuminate\Support\Facades\Mail;
use App\Mail\reminder;

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
        $active = "dataPelamar";
        if(Auth::user()->role == 'instansi'){
            return view('instansi.datapelamar',compact('preset','active'));
        }
        return view('user.daftarLowongan',compact('preset','active'));
    }

    public function json(Request $request)
    {
        if(Auth::user()->role == 'instansi'){
            if($request->session()->get('lowongan_id') != null){
                $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where([['instansi_id', Auth::user()->dataInstansi->id],['infoLowongan_id',$request->session()->get('lowongan_id')],['status','Proses']]);
                $request->session()->put('lowongan_id', null);
                return DataTables::eloquent($model)->make(true);
            }
            $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where([['instansi_id', Auth::user()->dataInstansi->id],['status','Diterima']]);
            return DataTables::eloquent($model)->make(true);
        }
        elseif(Auth::user()->role == 'alumni'){
            $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where('user_id', Auth::user()->datasiswa->user_id);
            return DataTables::eloquent($model)->make(true);
        }
        $model = daftarLowongan::with(['Lowongan','Instansi', 'Datasiswa'])->where('infoLowongan_id',$request->session()->get('lowongan_id'));
        return DataTables::eloquent($model)->make(true);
    }

    public function active(Request $request,$user_id)
    {
        $data = Datasiswa::where('user_id',$user_id)->first();

        //update status
        daftarLowongan::where([['user_id',$user_id],['infoLowongan_id',$request->infoLowongan_id]])->update(['status' => 'Diterima']);

        //kirim email
        if($data->email_verified_at != null){
            $instansi = Auth::user()->dataInstansi->nama;
            $isi = "<strong>SELAMAT ANDA DINYATAKAN DITERIMA</strong> di perusahaan $instansi";
            $type = "lowongan diterima";
            Mail::to($data->email)->send(new reminder($isi,$instansi,$type));
        }

        //update data siswa
        Siswa::updateOrCreate(['user_id' => $user_id],
        [ 'status_id' => 1]);
        statusDetail::updateOrCreate(['nis' => $data->nis],
        ['nis' => $data->nis,'status_id' => 1,'id_instansi'=> Auth::user()->dataInstansi->id]);
        Message::Create([
            'user_id' => $user_id,
            'isi' => "<strong>Selamat</strong> ananda diterima di perusahaan " .Auth::user()->dataInstansi->nama. " silahkan lengkapi data Pekerjaan anda",
            'status' => 'Belom Dilihat'
        ]);
        return response()->json();
    }

    public function deactive(Request $request,$user_id)
    {
        $data = Datasiswa::where('user_id',$user_id)->first();

        daftarLowongan::where([['user_id',$user_id],['infoLowongan_id',$request->infoLowongan_id]])->update(['status' => 'Tidak Diterima']);

        //kirim email
        if($data->email_verified_at != null){
            $instansi = Auth::user()->dataInstansi->nama;
            $isi = "<strong>MAAF ANDA DINYATAKAN TIDAK DITERIMA</strong> di perusahaan $instansi tetap semangat dan pantang menyerah";
            $type = "lowongan ditolak";
            Mail::to($data->email)->send(new reminder($isi,$instansi,$type));
        }

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
    public function show(Request $request)
    {
        $id = $request->id;
        $preset = preset::where('status','active')->first();
        $request->session()->put('lowongan_id', $id);
        if(Auth::user()->role == 'instansi'){
            $active = "showpelamar";
            return view('instansi.datapelamar',compact('preset','active'));
        }
        $active = "showpelamar";
        return view('instansi.datapelamar',compact('preset','active'));
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
