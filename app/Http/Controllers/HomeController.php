<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = BukuModel::all();
        $categories = KategoriModel::all();

        return view('pages.home', compact('books', 'categories'));
    }
}