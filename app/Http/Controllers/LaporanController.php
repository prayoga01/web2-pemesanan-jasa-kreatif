<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index()
    {
        //

        return view('laporan.opsilaporan',[
            'pesanans' => Pesanan::all()
        ]);
    }

    public function laporanlist(Request $request)
    {
        //
        // dd($request);
        $mulai = $request->tanggal_mulai;
        $selesai = $request->tanggal_selesai;

        $pesanans = Pesanan::with('user')
                        ->whereDate('dedline','>=',$mulai)->whereDate('dedline','<=',$selesai)->get();
        // dd($pesanans);
        return view('laporan.laporanlist',[
            'pesanans' => $pesanans
        ]);
    }

    public function laporanperforma(Request $request)
    {
        //
        // dd($request);
        $mulai = $request->tanggal_mulai;
        $selesai = $request->tanggal_selesai;
        $jmlslese = 0;
        $jmlproyek = 0;
        $jmlpajak=0;
        $jmlBersih = 0;
        $totalKotor = 0;
        $persentase = 0;
        $pajak = 10;

        $pesanans = Pesanan::with('user')
                        ->whereDate('dedline','>=',$mulai)->whereDate('dedline','<=',$selesai)
                        ->where('status','!=','Ditolak')->get();

        $totalKotor = $pesanans->sum('budget');

        $jmlproyek = $pesanans->count();

        if ($jmlproyek>0) {
            foreach($pesanans as $pesanan){
                if (!strcmp($pesanan->status,'Selesai')) {
                    $jmlslese++;
                }
            }
            $persentase = ($jmlslese/$jmlproyek)*100;
            $persentase = intval($persentase);
        }

        if ($totalKotor>0) {
            $jmlpajak = $totalKotor*($pajak/100);
            $jmlBersih = $totalKotor - $jmlpajak;
        }

        // dd($totalKotor);
        return view('laporan.laporanpendapatan',[
            'pesanans' => $pesanans,
            'mulai' => $mulai,
            'selesai' => $selesai,
            'jmlselese' => $jmlslese,
            'jmlproyek' => $jmlproyek,
            'pajak' => $pajak,
            'jmlpajak' => $jmlpajak,
            'jmlbersih' => $jmlBersih,
            'jmlkotor' => $totalKotor,
            'persentase' => $persentase
        ]);
    }

    public function laporandetil(Request $request)
    {
        //
        $pesanan = Pesanan::find($request->pesanan_id);
        return view('laporan.laporandetil',[
            'pesanan' => $pesanan
        ]);
    }
}
