@extends('layouts.app')

@section('title')
    Detail books of {{ $item->judul }}
@endsection

@section('content')
    <div class="card p-5">
        <h1>Books</h1>
        <div class="d-flex">
            <p>there's many books you can find in out library</p>
            <a href="{{ route('books.create') }}" class="ms-auto"><button class="btn btn-primary">Add new books</button></a>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" style="width: 100%" class="rounded">
            </div>
            <div class="col-lg-8">
                <table style="width: 50%">
                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td>: {{ $item->judul }}</td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>: {{ $item->pengarang }}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>: {{ $item->categories->nama }}</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>: {{ $item->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Edited by</td>
                            <td>: {{ $item->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Time Create</td>
                            <td>: {{ $item->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>: {{ $item->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card p-5 mt-4">
        <h4>Description</h4>
        <p class="pt-3">{{ $item->description }}</p>
    </div>
@endsection
