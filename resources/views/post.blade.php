@extends('layouts.main')

@section('container')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
                            <span>{{ $post->created_at->format('M jS \'y') }}</span>
                        </div>
                        <h1 class="mb-5">{{ $post->title }}</h1>

                        <figure class="my-4">
                            @if ($post->image)
                                <img src="{{ asset('app/'. $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid" width="900px" height="571px">
                            @else
                                <img src="https://source.unsplash.com/900x571?{{ $post->category->name }}" alt=""
                                    class="img-fluid">
                            @endif
                        </figure>
                        <p><span class="firstcharacter">{!! mb_substr(strip_tags($post->body), 0, 1, 'UTF-8') !!}</span>{!! $post->body !!}</p>
                    </div><!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <div class="row">
                            <div class="col">
                                <span>
                                    <a href="#comment" class="btn" role="button">
                                        <i class="bi bi-chat"></i>
                                        {{ $commentCount }}
                                    </a>
                                </span>
                                <span style="margin-left: 5px">
                                    <a href="{{ route('like', ['post' => $post->slug]) }}" class="btn like-button"
                                        role="button">
                                        <i class="bi bi-hand-thumbs-up{{ $post->isLikedByUser() ? '-fill' : '' }}"></i>
                                        <span id="like-count">
                                            {{ $likeCount }}
                                        </span>
                                    </a>
                                </span>
                            </div>
                        </div>

                        @foreach ($comment as $item)
                            <div id="comment" class="comment d-flex mb-4">
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{ $item->name }}</h6>
                                        <span class="text-muted">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment-body">
                                        {{ $item->body }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">

                        <div class="col-lg-12">
                            <h5 class="comment-title">Leave a Comment</h5>
                            <form action="/comment/{{ $post->slug }}" method="post" class="form-block">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-name">Name</label>
                                        <input type="text" class="form-control" name="name" id="comment-name"
                                            placeholder="Enter your name">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-email">Email</label>
                                        <input type="text" class="form-control" name="email" id="comment-email"
                                            placeholder="Enter your email">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>

                                        <textarea class="form-control" id="comment-message" name="body" placeholder="Enter your comment" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Comments Form -->

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
                                        <h2 class="mb-2"><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a>
                                        </h2>
                                        <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Trending -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                aria-labelledby="pills-latest-tab">
                                @foreach ($recent->take(5) as $item)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $item->category->name }}</span>
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ $item->created_at->format('M jS \'y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="/posts/{{ $item->slug }}">{{ $item->title }}</a>
                                        </h2>
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
