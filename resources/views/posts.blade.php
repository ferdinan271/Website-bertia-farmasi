@extends('layouts.main')

@section('container')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">

                    @foreach ($posts as $item)
                        <div class="d-md-flex post-entry-2 half">

                            @if ($item->image)
                                <a href="/posts/{{ $item->slug }}" class="me-4 thumbnail">
                                    <img src="{{ asset( 'app/'.$item->image) }}" alt="" class="img-fluid">
                                </a>
                            @else
                                <a href="/posts/{{ $item->slug }}" class="me-4 thumbnail">
                                    <img src="https://source.unsplash.com/900x571?{{ $item->category->name }}"
                                        alt="" class="img-fluid">
                                </a>
                            @endif
                            <div>
                                <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $item->created_at->format('M jS \'y') }}</span>
                                </div>
                                <h3><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a></h3>
                                <p>{{ $item->excerpt }}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $item->author->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-trending-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-trending" type="button" role="tab"
                                    aria-controls="pills-trending" aria-selected="false">Trending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab"
                                    aria-controls="pills-latest" aria-selected="false">Latest</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Trending -->
                            <div class="tab-pane fade show active" id="pills-trending" role="tabpanel"
                                aria-labelledby="pills-trending-tab">
                                @foreach ($trending->take(5) as $item)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $item->category->name }}</span>
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ $item->created_at->format('M jS \'y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a></h2>
                                        <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Trending -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                                @foreach ($recent->take(5) as $item)
                                        <div class="post-entry-1 border-bottom">
                                            <div class="post-meta"><span class="date">{{ $item->category->name }}</span>
                                                <span class="mx-1">&bullet;</span>
                                                <span>{{ $item->created_at->format('M jS \'y') }}</span>
                                            </div>
                                            <h2 class="mb-2"><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a></h2>
                                            <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                                        </div>
                                @endforeach

                            </div> <!-- End Latest -->

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
