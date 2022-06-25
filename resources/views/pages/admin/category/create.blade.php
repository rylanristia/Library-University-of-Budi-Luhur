@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>Add new category</h1>
        <div class="mt-4">
            <form action="{{ route('book-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="masukan nama kategori">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">See the result</button>
            </form>
        </div>
    </div>
@endsection
