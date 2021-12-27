<?php

namespace App\Http\Controllers;

use App\Mail\MailSend;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $details = [
            'judul' => $validatedData['judul_proyek'],
            'jenis' => $validatedData['jenis_pesanan'],
            'budget' => $validatedData['budget'],
            'status' => 'menunggu',
            'header' => 'Pemesanan Jasa Kreatif'
        ];


        // Mail::to(auth()->user()->email)->send(new MailSend($details));

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
            // PENGIRIM EMAIL

            $details = [
                'judul' => $validatedData['judul_proyek'],
                'jenis' => $validatedData['jenis_pesanan'],
                'budget' => $validatedData['budget'],
                'status' => 'menunggu',
                'header' => 'Perubahan Status Pemesanan'
            ];


            Mail::to(auth()->user()->email)->send(new MailSend($details));

            // dd($request->input('id'));
            Pesanan::where('id',$pesanan->id)->update($validatedData);
            $request->session()->flash('success','Pesanan Berhasil Di Ubah'); 
            return redirect('/dashboard');
        }

        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        $pesanann = Pesanan::where('id',$request->input('id'))->first();

        $emailPemesan = User::find($pesanann->user_id)->email;

        // PENGIRIM EMAIL

        $details = [
            'judul' => $pesanann->judul_proyek,
            'jenis' => $pesanann->jenis_pesanan,
            'budget' => $pesanann->budget,
            'status' => $validatedData['status'],
            'header' => 'Perubahan Status Pemesanan'
        ];

        // dd($details,$emailPemesan);

        Mail::to($emailPemesan)->send(new MailSend($details));

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
