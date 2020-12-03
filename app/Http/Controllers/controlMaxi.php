<?php

namespace App\Http\Controllers;

use App\supplier;
use App\users;
use App\barang;
use App\Rules\cek_sup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class controlMaxi extends Controller
{
    //
    public function indexInsertBarang(Request $req)
    {
        $sup = supplier::all();
        // $barang = barang::all();
        // dd($sup);
        return view("insertbarang",["supplier"=>$sup]);
    }
    public function addBarang(Request $req)
    {
        // dd($req->input("sup"));
        $rules=[
            "sup"=>["required",new cek_sup],
            "nama_barang"=>"required",
            "jmlh_barang"=>"required | min:1 | numeric",
        ];
        $this->validate($req, $rules);
        $kode = strtoupper(substr($req->nama_barang,0,2));
        dd ($kode);
    }

}
