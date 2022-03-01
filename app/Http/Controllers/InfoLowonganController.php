<?php

namespace App\Http\Controllers;

use App\InfoLowongan;
use App\daftarLowongan;
use App\Jurusan;
use App\User;
use App\Instansi;
use App\Preset;
use App\DataSiswa;
use DataTables;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\reminder;

class InfoLowonganController extends Controller
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
        if(Auth::user()->role == 'alumni'){
            return view('user.infoLowongan',compact('preset'));
        }
        return view('admin.infoLowongan',compact('preset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json()
    {
        if(Auth::user()->role == 'instansi'){
            $model = InfoLowongan::with('Instansi')->where('instansi',Auth::user()->dataInstansi->id);
            return DataTables::eloquent($model)
                ->addColumn('instansi', function (InfoLowongan $infolowongan) {
                    return $infolowongan->Instansi->nama;
                })
                ->make(true);
        }
        elseif(Auth::user()->role == 'alumni'){
            $model = InfoLowongan::with('Instansi')->where('jurusan', 'like', '%'.Auth::user()->datasiswa->short.'%');
            return DataTables::eloquent($model)
                ->make(true);
        }
            $model = InfoLowongan::with('Instansi');
            return DataTables::eloquent($model)
                ->addColumn('instansi', function (InfoLowongan $infolowongan) {
                    return $infolowongan->Instansi->nama;
                })
                ->make(true);
    }

    public function active($id)
    {
        InfoLowongan::where('id',$id)->update(['status' => 'Aktif']);
        return response()->json();
    }

    public function deactive($id)
    {
        InfoLowongan::where('id',$id)->update(['status' => 'Tidak Aktif']);
        return response()->json();
    }
    
    public function create()
    {
        $jurusans = Jurusan::all();
        $instansis = Instansi::all();
        $preset = preset::where('status','active')->first();
        return view('admin.inputInfoLowongan',compact('preset','jurusans','instansis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([ 
            'jurusan' => implode(',', (array) $request->get('jurusan'))
        ]);
        $path = public_path().'/image/InfoLowongan/';
        File::makeDirectory($path, $mode = 0777, true, true);
        $file = $request->file('foto');
        $nama_file = $request->judul."_".$file->getClientOriginalName();
        $file->move($path,$nama_file);
        if(Auth::user()->role == 'instansi'){
            InfoLowongan::create([
                'instansi' =>Auth::user()->dataInstansi->id,
                'jurusan' =>$request->jurusan,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'foto' => $nama_file,
                'status' => 'Aktif'
            ]);
        }
        else{
            InfoLowongan::create([
                'instansi' =>$request->instansi,
                'jurusan' =>$request->jurusan,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'foto' => $nama_file,
                'status' => 'Aktif'
            ]);
        }
        $jurusan = explode(',',$request->jurusan);
        $hasil[0] = 0;
            for ($i=0; $i < count($jurusan) ; $i++) { 
                $email[$i] = Datasiswa::select('email','user_id')->where([['short',$jurusan[$i]],['email','!=','Belum Diisi'],['email_verified_at','!=',null]])->get();
            }
            for ($a=0; $a < count($email) ; $a++) { 
                for ($b=0; $b < count($email[$a]) ; $b++) { 
                    $hasil[$a] = $email[$a][$b]->email;
                }
            }
            $isi = $request->isi;
            if($hasil[0] != null){
                for ($s=0; $s < count($hasil) ; $s++) { 
                    Mail::to($hasil[$s])->send(new reminder($isi));
                }
            }
        return redirect('/infolowongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoLowongan  $infoLowongan
     * @return \Illuminate\Http\Response
     */
    public function show(InfoLowongan $infoLowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoLowongan  $infoLowongan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instansis = Instansi::all();
        $jurusans = Jurusan::all();
        $preset = preset::where('status','active')->first();
        $data = InfoLowongan::where('id',$id)->get();
        foreach($data as $d){     
        }
        $checkjurusan = explode("," , $d->jurusan);
        return view('admin.editInfoLowongan',compact('preset','d','jurusans','checkjurusan','instansis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoLowongan  $infoLowongan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->merge([ 
            'jurusan' => implode(',', (array) $request->get('jurusan'))
        ]);
        $lowongan = InfoLowongan::find($id);
        $lowongan->judul = $request->judul;
        $lowongan->isi = $request->isi;
        $lowongan->jurusan = $request->jurusan;
        if ($request->hasFile('foto')) {
            $gambar = InfoLowongan::where('id',$id)->first();
	        File::delete('image/InfoLowongan/'.$gambar->foto);
            $path = public_path().'/image/InfoLowongan/';
            File::makeDirectory($path, $mode = 0777, true, true);
            $file = $request->file('foto');
            $nama_file = $request->judul."_".$file->getClientOriginalName();
            $file->move($path,$nama_file);
            $lowongan->foto = $nama_file;
        }
        if(Auth::user()->role == 'instansi'){
            $lowongan->save();
        return redirect('/infolowongan');
        }
        $lowongan->instansi = $request->instansi;
        $lowongan->save();

        return redirect('/infolowongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoLowongan  $infoLowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = InfoLowongan::where('id',$id)->first();
	    File::delete('image/InfoLowongan/'.$gambar->foto);

        InfoLowongan::find($id)->delete();
        return response()->json();
    }
    public function detail($id){
        $response = InfoLowongan::with('Instansi')->where('id',$id);
        return DataTables::eloquent($response)->toJson();
    }
    public function daftar(Request $request){
        return daftarLowongan::create([
            'user_id' => Auth::user()->id,
            'jurusan_id' => Auth::user()->datasiswa->jurusan_id,
            'infoLowongan_id' => $request->id,
            'instansi_id' => $request->idInstansi,
            'status' => 'Proses',
        ]);
    }
}
