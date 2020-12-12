<?php

namespace App\Http\Controllers;

use App\supplier;
use App\users;
use App\barang;
use App\dtrans_out;
use App\htrans_out;
use Illuminate\Support\Facades\DB;

use App\jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class controlLeo extends Controller
{
    public function loadregister(Request $data){
        $errcode=Cookie::get("errcode","kosong");
        $err="";
        if($errcode=="1"){
            $err="Password Tidak Sesuai";
            Cookie::queue("errcode","kosong",60);
            //confirm  passsword salah
        }else if($errcode=="2"){
            $err="Email Sudah Terdaftar";
            Cookie::queue("errcode","kosong",60);
            //email sudah terdaftar
        }else if($errcode=="3"){
            $err="Register Berhasil";
            Cookie::queue("errcode","kosong",60);
            //email sudah terdaftar
        }
        return view("register",["err"=>$err]);
    }
    public function olahregis(Request $data){


            $rule = [
                'username_user'=>'required',
                'jenis_user'=>'required',
                'password_user'=>'required |confirmed',
                'password_user_confirmation'=>'required'
            ];
            $custom_msg = [
                "required" => ":attribute harus diisi",
                "digits"=>"Panjang :attribute Minimal adalah :digits",
                "confirmed"=>"Confirm Password Tidak sesuai",
                "password_user_confirmation.required"=>"Confirm password Harus diisi"


            ];

            $this->validate($data, $rule, $custom_msg);
            $email=$data->input("email");
            $result = users::where('username_user', '=', $data->input('username_user'))->first();
                if($result===null){
                   users::create($data->all());
                    cookie::queue("errcode","3",60);

                }else{
                    cookie::queue("errcode","2",60);
                }

            return redirect("/register");
}
public function loadadmin(){
    return view('menuadmin');
}
public function loadlogin(){
    $remember=cookie::get("remember,kosong");
    echo $remember;
    if($remember=="0s"){
        return redirect("/home");
    }if(cookie::get("remember","kosong")=="1s"){
        return redirect("penjual");
    }
    $errcode=Cookie::get("errcode","kosong");
    $err="";
    if($errcode=="0"){
        $err="Email atau Password salah";
        Cookie::queue("errcode","kosong",60);
        //confirm  passsword salah
    }else if($errcode=="1"){
        $err="Password salah";
        Cookie::queue("errcode","kosong",60);
        //email sudah terdaftar
    }
    else if($errcode=="9"){
        $err='user terhapus';
        Cookie::queue("errcode","kosong",60);
        //email sudah terdaftar
    }
    return view("login",["err"=>$err]);
}
public function olahlogout(){
    Cookie::get("logins","kosong");
    Cookie::queue("remember",3,60);
    echo cookie::get("remember");
    return redirect("");
}
public function checklogin(Request $data){
    $ctr=0;
    if($data->input('username')=="admin" &&$data->input("password")=="admin"){
        return redirect("/menuadmin");
    }
    else{
        $remember= $data-> input("remember");

        $email=$data -> input("username");
        $password=$data -> input("password");

        $ctr=0;
        $rule = [

                    'username'=>['required'],
                    'password'=>'required'

        ];
        $custom_msg = [
            "required" => ":attribute harus diisi"

        ];
        $this->validate($data, $rule, $custom_msg);

        $result = users::where('username_user', '=', $data->input('username'))->where('password_user','=',$data->input('password'))->first();
        if($result!=null){

            if($data->input("remember")==1){
                echo "masuk";
                $tambahan="s";
            cookie::queue("remember",($result[0]->jenis).$tambahan,60);
            }
        }else{
            echo"masuk";
            $ctr=1;
        }


        Cookie::queue("errcode",$ctr."",60);

        if($ctr==1){
            cookie::queue("errcode",0,60);
            return redirect("");
        }
        else if($result->status_delete_user==1){
            cookie::queue("errcode",9,60);
            return redirect("");
        }
        else if ($result->jenis_user==0){
        Cookie::queue("errcode","kosong",60);
        cookie::queue("logins",$email,60);
        return redirect("/historypelanggan");

        }else{
            cookie::queue("logins",$email,60);
        return redirect("pegawai");

        }
    }
    }
    public function load_supplier(){
        return view('insertsupplier');
    }
    public function load_jenis_barang(){
        return view('insertjenis_barang');
    }
    public function olah_supplier(Request $data){
        $kode= strtoupper(substr($data->input('nama_supplier'),0,2));
        $result= supplier::where('id_supplier', 'like', '%' . $kode . '%')->get();
        $angka= count($result)+1;

        if($angka<10){
            $kode.="00".$angka;
        }else if($angka<100){
            $kode.="0".$angka;
        }else{
            $kode.=$angka;
        }
        echo $kode;
        $data->merge(['id_supplier'=>$kode]);
        supplier::create($data->all());
        return redirect('insertsupplier');
    }
    public function olah_jenis_barang(Request $data){
        $kode= strtoupper(substr($data->input('jenis_barang'),0,2));
        $result= jenis_barang::where('id_jenis', 'like', '%' . $kode . '%')->get();
        $angka= count($result)+1;

        if($angka<10){
            $kode.="00".$angka;
        }else if($angka<100){
            $kode.="0".$angka;
        }else{
            $kode.=$angka;
        }
        echo $kode;
        $data->merge(['id_jenis'=>$kode]);
        jenis_barang::create($data->all());
        return redirect('tambahjenisbarang');
    }
    public function showpegawai(Request $data){
       $result= users::where("jenis_user","=","1")->where('status_delete_user','=','0')->get();
        return view('pegawai',['result'=>$result]);
    }
    public function softdeletepegawai(Request $data){
        $result= users::where("username_user","=",$data->input('username'))->first();
        $result->status_delete_user=1;
        $result->save();
        return redirect('editpegawai');
    }
    public function editpegawai(Request $data){
        $result= users::where("username_user","=",$data->input('username'))->get();
         return view('editpegawai',['result'=>$result]);
     }
     public function olaheditpegawai(Request $data){
        $result = users::where('username_user', '=', $data->input('username'))->where('password_user','=',$data->input('old_password'))->first();
       if($result===null){
        return redirect('/editpegawai')->with('alert', 'old password tidak kembar');
        }
        else{
            $result = users::where('username_user', '=', $data->input('username_user'))->first();

             if($result==null){
                $result = users::where('username_user', '=', $data->input('username'))->first();

                $result->username_user=$data->input('username_user');
                $result->password_user=$data->input('password');
                $result->save();
                return redirect('/editpegawai')->with('alert', 'berhasil edit');
            }else{

                return redirect('/editpegawai')->with('alert', 'new username  kembar');
            }

        }


     }
     public function showbarang(Request $data){
        $result= barang::where('status_delete_barang','=','0')->get();
        return view('listbarang',['result'=>$result]);
     }
     public function softdeletebarang(Request $data){
         $result= barang::where("id_barang","=",$data->input('id_barang'))->first();
         $result->status_delete_barang=1;
         $result->save();
         return redirect('deletebarang');
     }
     public function dtransout(){
        $result =DB::select('select tanggal_htrans_out, id_htrans_out from htrans_out where username_pelanggan="'.cookie::get('logins').'"');
        return view('dhistoryout',['result'=>$result]);
     }
     public function historyout(Request $data)
    {
        $result = DB::select('select distinct d.id_htrans_out, b.nama_barang, h.username_pegawai, h.username_pelanggan, d.jumlah_barang, d.total_harga, h.tanggal_htrans_out from dtrans_out d, barang b, htrans_out h where b.id_barang = d.id_barang AND d.id_htrans_out = h.id_htrans_out and d.id_htrans_out="'.$data->input('id').'" order by d.id_htrans_out asc');
        return view('historyout', ['trans'=>$result]);
    }
    public function checkout(Request $data){
        $date = date("Y-m-d");
        date_default_timezone_set("Asia/Bangkok");
        $time =  date("Y-m-d h:i:sa");
        $htrans_out = htrans_out::where("id_htrans_out", "like", $date.""."%")->get();
        $jumlahHtransout = strval(count($htrans_out)+1);
        $kodeHtransout = $date.substr("-000",0,4-strlen($jumlahHtransout)).$jumlahHtransout;
        echo $kodeHtransout."<br>";
        echo $data->input('total');
        htrans_out::create([//
            'ID_htrans_out'=>$kodeHtransout,
            'username_pegawai'=>cookie::get('logins'),
            'username_pelanggan'=>$data->input('cust'),
            'jumlah'=>$data->input('total')
        ]);


        $dtrans=session()->pull('cart');

        foreach ($dtrans as $key) {
            dtrans_out::create([//
            'ID_htrans_out'=>$kodeHtransout,
            'id_barang'=>$key["id"],
            'jumlah_barang'=>$key["quantity"],
            'total_harga'=>$key["price"]
        ]);
        $temp = barang::find($key["id"]);
        $temp->stock_barang = ($temp->stock_barang-$key["quantity"]);
        $temp->save();
        var_dump($key);
        echo "<br>";
        }
        return redirect('/pegawai');
        dd(session('cart'));
    }

}
