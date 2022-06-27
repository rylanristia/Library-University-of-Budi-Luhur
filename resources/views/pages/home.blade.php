@extends('layouts.userpage')

@section('title')
    Home - Library University of Budi Luhur
@endsection

@section('content')
    <div class="banner-section">
        <div class="content-banner container rounded">
            <h1>Hi, Bluetizen!</h1>
            <p>Welcome to our library of University Budi Luhur</p>
        </div>
    </div>

    <div class="category-section mt-4">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Book's category</h5>
                </div>
                <div class="card-body">
                    <div class=" d-flex flex-nowrap">
                        @foreach ($categories as $item)
                            <a href="{{ route('category', $item->id) }}">
                                <div class="category py-2 px-3 ms-2 me-2">
                                    <p>{{ $item->nama }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="most-fav-book-section">
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
</div>
<div class="section-who-we-are">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <h3 class="mb-4">Who we are?</h3>
                <p class="pe-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, debitis dolorum
                    ipsa recusandae
                    velit culpa incidunt expedita aut modi quam fuga nam eos exercitationem, ratione ipsum distinctio
                    dolorem quidem nisi.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ url('./images/universitasbudiluhur.jpeg') }}" alt="" class="image-who-we-are">
            </div>
        </div>
    </div>
</div>
<div class="most-fav-book-section">
    <div class="container">
        <div class="header-section">
            <h5>Most search books</h5>
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
    <div class="section-faq">
        <div class="accordion-1">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6 mx-auto text-center">
                        <h2>Frequently Asked Questions</h2>
                        <p>A lot of people don’t appreciate the moment until it’s passed. I'm not trying my hardest,
                            and I'm not trying to do </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="accordion" id="accordionRental">
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-bottom font-weight-bold collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        How do I order?
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        We’re not always in the position that we want to be at. We’re constantly
                                        growing. We’re constantly making mistakes. We’re constantly trying to
                                        express ourselves and actualize our dreams. If you have the opportunity to
                                        play this game
                                        of life you need to appreciate every moment. A lot of people don’t
                                        appreciate the moment until it’s passed.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        How can i make the payment?
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                    <div class="accordion-body text-sm opacity-8">
                                        It really matters and then like it really doesn’t matter. What matters is
                                        the people who are sparked by it. And the people who are like offended by
                                        it, it doesn’t matter. Because it's about motivating the doers. Because I’m
                                        here to follow my dreams and inspire other people to follow their dreams,
                                        too.
                                        <br>
                                        We’re not always in the position that we want to be at. We’re constantly
                                        growing. We’re constantly making mistakes. We’re constantly trying to
                                        express ourselves and actualize our dreams. If you have the opportunity to
                                        play this game of life you need to appreciate every moment. A lot of people
                                        don’t appreciate the moment until it’s passed.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        How much time does it take to receive the order?
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                                    <div class="accordion-body text-sm opacity-8">
                                        The time is now for it to be okay to be great. People in this world shun
                                        people for being great. For being a bright color. For standing out. But the
                                        time is now to be okay to be the greatest you. Would you believe in what you
                                        believe in, if you were the only one who believed it?
                                        If everything I did failed - which it doesn't, it actually succeeds - just
                                        the fact that I'm willing to fail is an inspiration. People are so scared to
                                        lose that they don't even try. Like, one thing people can't say is that I'm
                                        not trying, and I'm not trying my hardest, and I'm not trying to do the best
                                        way I know how.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingFour">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Can I resell the products?
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                                    <div class="accordion-body text-sm opacity-8">
                                        I always felt like I could do anything. That’s the main thing people are
                                        controlled by! Thoughts- their perception of themselves! They're slowed down
                                        by their perception of themselves. If you're taught you can’t do anything,
                                        you won’t do anything. I was taught I could do everything.
                                        <br><br>
                                        If everything I did failed - which it doesn't, it actually succeeds - just
                                        the fact that I'm willing to fail is an inspiration. People are so scared to
                                        lose that they don't even try. Like, one thing people can't say is that I'm
                                        not trying, and I'm not trying my hardest, and I'm not trying to do the best
                                        way I know how.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingFifth">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFifth"
                                        aria-expanded="false" aria-controls="collapseFifth">
                                        Where do I find the shipping details?
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                            aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseFifth" class="accordion-collapse collapse"
                                    aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
                                    <div class="accordion-body text-sm opacity-8">
                                        There’s nothing I really wanted to do in life that I wasn’t able to get good
                                        at. That’s my skill. I’m not really specifically talented at anything except
                                        for the ability to learn. That’s what I do. That’s what I’m here for. Don’t
                                        be afraid to be wrong because you can’t learn anything from a compliment.
                                        I always felt like I could do anything. That’s the main thing people are
                                        controlled by! Thoughts- their perception of themselves! They're slowed down
                                        by their perception of themselves. If you're taught you can’t do anything,
                                        you won’t do anything. I was taught I could do everything.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
