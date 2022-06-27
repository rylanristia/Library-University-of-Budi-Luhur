@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>Edit book of {{ $item->judul }}</h1>
        @include('includes.alerts')
        <div class="mt-4">
            <form action="{{ route('books.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="judul">Judul buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $item->judul }}"
                        placeholder="masukan judul buku">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi buku</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        placeholder="Tuliskan deskripsi atau sinopsis dari isi buku" class="form-control">{{ $item->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang"
                        value="{{ $item->pengarang }}" placeholder="masukan pengarang buku">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="kategori_id">Pilih kategori buku</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option value="{{ $item->kategori_id }}">{{ $item->categories->nama }}</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="thumbnail">thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                        placeholder="masukan thumbnail buku">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Update</button>
            </form>
        </div>
    </div>
@endsection
