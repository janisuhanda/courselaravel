<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // return '<H1>Mengakses fungsi di controller menggunakan route</H1>';
        $products=DB::table('products')
        ->join('categories','products.kategori_id','=','categories.id')
        ->get();
        // echo "<pre>";
        // print_r($products);
        // dd($products);
        $title="daftar product";
        // $pelanggan = ['ina','ani','ita','indra'];

        return view('index',compact('products','title'));

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

    public function store(){
        DB::table('products')->insert([
            'nama' =>  'sabun',
            'kategori_id' => 1,
            'qty' => 10,
            'harga_beli' => 10000,
            'harga_jual' => 15000
        ]);
        echo "data berhasil di tambah";
    }

    public function update(){
        DB::table('products')
        ->where('id',3)
        ->update([
            'nama' =>  'sabun mandi premium'
        ]);
        echo "data berhasil di update";
    }

    public function delete(){
        DB::table('products')
        ->where('id',3)
        ->delete();
        echo "data berhasil di delete";
    }



}
