<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $books = BukuModel::all();
        $categories = KategoriModel::all();
        $totalcategories = $categories->count();

        return view('pages.category', compact('books', 'categories', 'totalcategories'));
    }
    public function category($kategori_id)
    {
        $data = BukuModel::with(['categories'])->where('kategori_id', $kategori_id)->get();

        $totalbooks = $data->count();

        $categories = KategoriModel::where('id', $kategori_id)->get();
        $fetch = [];

        foreach ($categories as $key) {
            $fetch = $key->nama;
        }

        return view('pages.categories', compact('data', 'fetch', 'totalbooks'));
    }
}