<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        dd($kategori);
    }

    public function store()
    {
        Kategori::create([
            'kategori' => 'Bahan bangunan',
            'keterangan' => 'bahan bangunan atas'
        ]);
        echo "menambah data eloquent berhasil";
    }

    public function update()
    {
        Kategori::where('id',1)->update([
            'kategori' => 'alat alat dapur'
        ]);
        echo "update berhasil";
    }

    public function delete()
    {
        Kategori::where('id',1)->delete();
        echo "delete berhasil";
    }
}
