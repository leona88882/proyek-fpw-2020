<?php

namespace App\Http\Controllers;
use App\users;
use App\barang;
use Illuminate\Http\Request;

class controllerjudy extends Controller
{
    public function addtoCart(Request $req)
    {
        $id = $req->input('id');
        $product = barang::where('id_barang', '=', $req->input('id'))->first();
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->nama_barang,
                    "quantity" => 1,
                    "price" => $product->harga_barang
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->nama_barang,
            "quantity" => 1,
            "price" => $product->harga_barang
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }public function showCart(Request $req)
    {
        $customer = users::where('jenis_user', '=', '0')->where('status_delete_user', '=', '0')->get();
        $result = barang::where('status_delete_barang', '=', '0')->get();
        return view('pegawaiCart', ['barang' => $result, 'cust' => $customer]);
    }
}
