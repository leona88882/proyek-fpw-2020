<?php

namespace App\Http\Controllers;

use App\supplier;
use App\users;
use App\barang;
use App\htrans_in;
use App\dtrans_in;
use App\jenisBarang;
use App\Rules\cek_sup;
use App\Rules\cek_jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class controlMaxi extends Controller
{
    //
    public function indexInsertBarang(Request $req)
    {
        $sup = supplier::all();
        $jenis = jenisBarang::all();
        // $barang = barang::all();
        // dd($sup);
        return view("insertbarang",["supplier"=>$sup, "jenis"=>$jenis]);
    }
    public function addBarang(Request $req)
    {
        // dd($req->input("sup"));
        $rules=[
            "sup"=>["required",new cek_sup],
            "jenis"=>["required",new cek_jenis],
            "nama_barang"=>"required",
            "jmlh_barang"=>"required | min:1 | numeric",
            "harga_barang"=>"required | min:0 | numeric",
        ];
        $this->validate($req, $rules);
        $kode = strtoupper(substr($req->nama_barang,0,2));
        $barang = barang::where("id_barang","like",$kode."%")->get();
        $jumlah = strval(count($barang)+1);
        $kode = $kode.substr("000",0,3-strlen($jumlah)).$jumlah;
        $add = barang::create([
            "id_barang"=>$kode,
            "nama_barang"=>$req->input("nama_barang"),
            "id_jenis"=>$req->input("jenis"),
            "stock_barang"=>$req->input("jmlh_barang"),
            "harga_barang"=>$req->input("harga_barang"),
            "status_delete_barang"=>0,
        ]);
        $date = date("Y-m-d");
        date_default_timezone_set("Asia/Bangkok");
        $time =  date("Y-m-d h:i:sa");
        $htrans_in = htrans_in::where("id_htrans_in", "like", $date.""."%")->get();
        $jumlahHtransIn = strval(count($htrans_in)+1);
        $kodeHtransIn = $date.substr("-000",0,4-strlen($jumlahHtransIn)).$jumlahHtransIn;
        // dd ($time);

        $add = htrans_in::create([
            'id_htrans_in'=>$kodeHtransIn,
            'id_supplier'=>$req->input("sup"),
        ]);

        $add = dtrans_in::create([
            'id_htrans_in'=>$kodeHtransIn,
            "id_barang"=>$kode,
            "jumlah_barang"=>$req->input("jmlh_barang"),
        ]);

        // $dtrans_in = ;

        return redirect("/insertbarang");
        // dd ($add);
    }

}
