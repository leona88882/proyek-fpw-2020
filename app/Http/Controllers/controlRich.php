<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controlRich extends Controller
{
    public function historyin()
    {
        $result = DB::select('select d.id_htrans_in, b.nama_barang, d.jumlah_barang, s.nama_supplier, h.tanggal_htrans_in from dtrans_in d, supplier s, htrans_in h, barang b where b.id_barang = d.id_barang AND d.id_htrans_in = h.id_htrans_in AND s.id_supplier = h.id_supplier order by h.tanggal_htrans_in desc');
        return view('historyin', ['trans'=>$result]);
    }

    public function historyout()
    {
        $result = DB::select('select distinct d.id_htrans_out, b.nama_barang, h.username_pegawai, h.username_pelanggan, d.jumlah_barang, d.total_harga, h.tanggal_htrans_out from dtrans_out d, barang b, htrans_out h where b.id_barang = d.id_barang AND d.id_htrans_out = h.id_htrans_out order by d.id_htrans_out asc');
        return view('historyout', ['trans'=>$result]);
    }

    public function searchin(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $result = DB::table('dtrans_in')
        ->join('htrans_in','htrans_in.id_htrans_in', '=', 'dtrans_in.id_htrans_in')
        ->join('barang', 'barang.id_barang', '=', 'dtrans_in.id_barang')
        ->join('supplier', 'supplier.id_supplier', '=', 'htrans_in.id_supplier')
        ->where('htrans_in.tanggal_htrans_in', 'like', '%'.$tanggal.'%')
        ->orderBy('htrans_in.tanggal_htrans_in', 'desc')
        ->get(array(
            'dtrans_in.id_htrans_in',
            'nama_barang',
            'jumlah_barang',
            'nama_supplier',
            'tanggal_htrans_in'
        ));

        return view('searching', ['trans'=>$result]);
    }
}
