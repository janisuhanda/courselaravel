<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        // echo "<pre>";
        // print_r($categories);
        foreach ($categories as $category) {
            echo "nama Kategori : ".$category->nama_kategori;
            echo "<br>";
            echo "keterangan : ".$category->keterangan;
            echo "<br>";
            // echo $category->product;
            // echo "<br>";
            foreach ($category->product as $product) {
                echo "nama product : ".$product->nama;
                echo "<br>";
            }
        }
    }
}
