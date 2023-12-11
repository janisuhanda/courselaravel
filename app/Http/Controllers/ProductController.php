<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return '<H1>Mengakses fungsi di controller menggunakan route</H1>';
    }
    public function show(){
        return '<H1>Mengakses method show di controller menggunakan route</H1>';
    }

    public function showAll(){
        $products=Product::get();
        $title="daftar product";
        $pelanggan = ['ina','ani','ita','indra'];
        // dd($products);
        // print($products);

        return view('showsemua',compact('products','title','pelanggan'));
        // return view('showsemua',[
        //     'products' => $products,
        //     'title' => $title
        // ]);

        // $this->fungsilain();

        // $data=$this->fungsilainreturn();
        // echo $data;
    }

    public function fungsilain(){
        echo "fungsi lain tanpa return";
        echo "</br>";
    }

    public function fungsilainreturn(){
        return "fungsi lain dengan return";
    }
}
