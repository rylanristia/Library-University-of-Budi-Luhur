@extends('layouts.userpage')

@section('title')
    Bookselves
@endsection

@section('content')
    <div class="banner-section">
        <div class="content-banner container rounded">
            <h3>Bookselves by category {{ $fetch }}</h3>
            <div class="d-flex">
                <p>Books with category of {{ $fetch }}</p>
                <p class="ms-auto">Retrieve {{ $totalbooks }} books</p>
            </div>
        </div>
    </div>
    <div class="bookselves container mt-4">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="{{ route('detail-book', $item->slug) }}" class="d-block">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                    class="img-fluid border-radius-lg image-card">
                            </a>
                        </div>

                        <div class="card-body pt-2">
                            <a href="{{ route('category', $item->kategori_id) }}"><span
                                    class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $item->categories->nama }}</span></a>
                            <a href="{{ route('detail-book', $item->slug) }}" class="card-title h5 d-block text-darker">
                                {{ Str::limit($item->judul, 18, '...') }}
                            </a>
                            <div class="author align-items-center">
                                <div class="name ps-3">
                                    <span>{{ Str::limit($item->pengarang, 25, '...') }}</span>
                                    <div class="stats">
                                        <small>Posted on
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('j F') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
