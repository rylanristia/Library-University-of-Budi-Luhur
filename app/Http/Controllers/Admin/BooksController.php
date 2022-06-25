<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BukuRequest;
use App\Models\BukuModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BukuModel::with(['categories'])->get();

        return view('pages.admin.books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = KategoriModel::all();

        return view('pages.admin.books.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $data = $request->all();

        $file_name = $request->thumbnail->getClientOriginalName();
        $thumbnail = $request->thumbnail->storeAs('gallery', $file_name);

        $created_by = Auth::user()->name;
        $updated_by = Auth::user()->name;

        BukuModel::create([
            'judul' => $data['judul'],
            'slug' => Str::slug($request->judul),
            'pengarang' => $data['pengarang'],
            'kategori_id' => $data['kategori_id'],
            'thumbnail' => $thumbnail,
            'created_by' => $created_by,
            'updated_by' => $updated_by
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = BukuModel::with(['categories'])->findOrFail($id);

        return view('pages.admin.books.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BukuModel::with(['categories'])->findOrFail($id);
        $category = KategoriModel::all();

        return view('pages.admin.books.edit', compact('item', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = BukuModel::findOrFail($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->judul);
        $data['updated_by'] = Auth::user()->name;

        if (!empty($item['thumbnail'])) {
            if (!empty($data['thumbnail'])) {
                $file_name = $request->thumbnail->getClientOriginalName();
                $thumbnail = $request->thumbnail->storeAs('gallery', $file_name);

                $data['thumbnail'] = $thumbnail;
            } else {
                $data['thumbnail'] = $item['thumbnail'];
            }
        }

        $item->update($data);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BukuModel::findOrFail($id);

        $item->delete();

        return redirect()->route('books.index');
    }
}