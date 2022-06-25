@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h3>Edit role of {{ $item->name }}</h3>
        @include('includes.alerts')
        <label class="mt-5">Email</label>
        <strong>{{ $item->email }}</strong>

        <div class="mt-4">
            <form action="{{ route('users.update', $item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="roles">User role</label>
                    <select name="roles" id="roles" class="form-control">
                        <option value="{{ $item->roles }}">{{ $item->roles }}</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Update</button>
            </form>
        </div>
    </div>
@endsection
