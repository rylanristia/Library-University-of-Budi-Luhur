@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="card p-5">
        <h1>Books</h1>
        <div class="d-flex">
            <p>there's many books you can find in out library</p>
            <a href="{{ route('books.create') }}" class="ms-auto"><button class="btn btn-primary">Add new books</button></a>
        </div>
        @include('includes.alerts')
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                        alt="{{ asset('storage/' . $item->thumbnail) }}" class="rounded" width="100px">
                                </td>
                                <td>{{ Str::limit($item->judul, 20, '...') }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->categories->nama }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_by }}</td>
                                <td class="d-flex ">
                                    <a href="{{ route('books.show', $item->id) }}" class="ms-2"><button
                                            class="btn btn-info"><i class="bi bi-eye-fill"></i></button></a>
                                    <a href="{{ route('books.edit', $item->id) }}" class="ms-2"><button
                                            class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button></a>
                                    <form action="{{ route('books.destroy', $item->id) }}" method="POST" class="ms-2">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
