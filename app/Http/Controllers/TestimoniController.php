<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
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
            return view('portofolio.inputportofolio', [
                'testimonis'=> Testimoni::all(),
                'pesanans'=> Pesanan::all()
            ]);
        }
        return view('portofolio.tampilanportofolio',[
            'testimonis'=> Testimoni::all()
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
            'pesanan_id'=>'required',
            'url'=>'required'
        ]);

        Testimoni::create($validatedData);

        $request->session()->flash('success','Testimoni berhasil di tambahkan');

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        return view('portofolio.editportofolio', [
            'testimoni'=> $testimoni,
            'pesanans'=> Pesanan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $testimoni->pesanan_id = $request->get('pesanan_id');
        $testimoni->url = $request->get('url');
        $testimoni->save();
        $request->session()->flash('success','Testimoni berhasil di update');

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return redirect('dashboard')->with('success','Testimoni berhasil di hapus');
    }
}
