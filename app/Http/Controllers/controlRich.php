<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class controlRich extends Controller
{
    public function historyin()
    {
        $result = DB::select('select d.id_htrans_in, b.nama_barang, d.jumlah_barang, s.nama_supplier, h.tanggal_htrans_in from dtrans_in d, supplier s, htrans_in h, barang b where b.id_barang = d.id_barang AND d.id_htrans_in = h.id_htrans_in AND s.id_supplier = h.id_supplier');
        return view('historyin', ['trans'=>$result]);
    }

    public function historyout()
    {
        $result = DB::select('select d.id_htrans_out, b.nama_barang, h.username_pelanggan, d.jumlah_barang, d.total_harga, h.tanggal_htrans_out from dtrans_out d, barang b, htrans_out h where b.id_barang = d.id_barang AND d.id_htrans_out = h.id_htrans_out order by d.id_htrans_out asc');
        return view('historyout', ['trans'=>$result]);
    }

}
