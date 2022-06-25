<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class BookselvesController extends Controller
{
    public function index()
    {
        $data = BukuModel::with(['categories'])->get();
        $totalbooks = $data->count();

        return view('pages.books', compact('data', 'totalbooks'));
    }

    public function detail($slug)
    {
        $item = BukuModel::where('slug', $slug)->firstOrFail();

        return view('pages.detail', compact('item'));
    }
}