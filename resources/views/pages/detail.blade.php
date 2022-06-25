@extends('layouts.userpage')

@section('title')
    Detail books of {{ $item->judul }}
@endsection

@section('content')
    <div class="container">
        <div class="card p-5">
            <h2 class="pb-4">Book of {{ $item->judul }}</h2>
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
                                <td>Time Create</td>
                                <td>: {{ \Carbon\Carbon::parse($item->created_at)->format('j F') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
