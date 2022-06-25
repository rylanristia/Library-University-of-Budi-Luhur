@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>Edit book of {{ $item->judul }}</h1>
        @include('includes.alerts')
        <div class="mt-4">
            <form action="{{ route('book-category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama">Nama kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}"
                        placeholder="masukan nama kategori">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Update</button>
            </form>
        </div>
    </div>
@endsection
