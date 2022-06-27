@extends('layouts.userpage')

@section('title')
    Bookselves
@endsection

@section('content')
    <div class="banner-section">
        <div class="content-banner container rounded">
            <h1>Books categories</h1>
            <div class="d-flex">
                <p>Find your favorite books in many categories</p>
                <p class="ms-auto">Retrieve {{ $totalcategories }} categories</p>
            </div>
        </div>
    </div>
    <div class="most-recent-book-section">
        <div class="container">
            <div class="header-section">
                <h5>Most favorite books</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, soluta!</p>
            </div>
            <div class="row">
                @php
                    $count = 1;
                @endphp
                @foreach ($books as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <a href="{{ route('detail-book', $item->slug) }}" class="d-block">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                        class="img-fluid image-card border-radius-lg">
                                </a>
                            </div>

                            <div class="card-body pt-2">
                                <a href="{{ route('category', $item->kategori_id) }}">
                                    <span
                                        class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $item->categories->nama }}</span></a>
                                <a href="{{ route('detail-book', $item->slug) }}"
                                    class="card-title h5 d-block text-darker">
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
                    @php
                        $count++;
                    @endphp
                    @if ($count == 5)
                    @break
                @endif
            @endforeach
        </div>
    </div>
    <div class="categories-section">
        <div class="container">
            <div class="header-section">
                <h5>Book category</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, soluta!</p>
            </div>
            <div class="row">
                @php
                    $count = 1;
                @endphp
                @foreach ($categories as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <p>{{ $item->nama }}</p>
                            </div>
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <a href="{{ route('detail-book', $item->slug) }}" class="d-block">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
