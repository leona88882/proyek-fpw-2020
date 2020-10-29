<?php

namespace App\Http\Controllers;
use App\users;
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
                "password_user_confirmation.required"=>"Confirm password Harus diisi",
                "notelp.required"=>"Nomor Telepone Harus diisi"


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
    if($data->input('username')=="admin" &&$data->input("password")=="admin"){
        return redirect("/menuadmin");
    }
    else if($ctr==1){
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
     return redirect("/user");

    }else{
        cookie::queue("logins",$email,60);
     return redirect("pegawai");

    }
}
}
