<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!strcmp(auth()->user()->role,'admin')){
            return view('pemesanan.daftarpesan-admin', [
                'pesanans'=> Pesanan::all()
            ]);
        }
        return view('pemesanan.daftarpesan', [
            'pesanans'=> Pesanan::where('user_id',auth()->user()->id)->get()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pemesanan.pesanjasa');
       
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
        $validatedData = $request->validate([
            'jenis_pesanan' => 'required',
            'judul_proyek' => 'required',
            'penanggungjawab' => 'required',
            'perusahaan' => 'required',
            'nomor_penanggungjawab' => 'required',
            'deskripsi' => 'required',
            'dedline' => 'required',
            'budget' => 'required' 
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Pesanan::create($validatedData);

        $request->session()->flash('success','Pesanan Berhasil Di Simpan');

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
        if(!strcmp(auth()->user()->role,'admin')){
            return view('pemesanan.detailpesanan-admin', [
                'pesanan'=> $pesanan
            ]);
        }
        return view('pemesanan.detailpesanan',[
            'pesanan'=>$pesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
        if(!strcmp(auth()->user()->role,'user')){
            $validatedData = $request->validate([
                'jenis_pesanan' => 'required',
                'penanggungjawab' => 'required',
                'perusahaan' => 'required',
                'nomor_penanggungjawab' => 'required',
                'judul_proyek' => 'required',
                'deskripsi' => 'required',
                'dedline' => 'required',
                'budget' => 'required' 
            ]);
            // dd($request->input('id'));
            Pesanan::where('id',$pesanan->id)->update($validatedData);
            $request->session()->flash('success','Pesanan Berhasil Di Ubah'); 
            return redirect('/dashboard');
        }

        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        // dd($request->input('id'));
        Pesanan::where('id',$request->input('id'))->update($validatedData);
        $request->session()->flash('success','Status Pesanan Berhasil Di Ubah');
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
