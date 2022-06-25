@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>Add new books</h1>
        @include('includes.alerts')
        <div class="mt-4">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="masukan judul buku">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang"
                        placeholder="masukan pengarang buku">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="kategori_id">Pilih kategori buku</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option>Select answer</option>
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
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Save</button>
            </form>
        </div>
    </div>
@endsection
