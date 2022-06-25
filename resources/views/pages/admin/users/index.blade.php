@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="card p-5">
        <h1>Users</h1>
        @include('includes.alerts')
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered at</th>
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->roles }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y h:m') }}</td>
                                <td class="d-flex ">
                                    <a href="{{ route('users.edit', $item->id) }}" class="ms-2"><button
                                            class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
