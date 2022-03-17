@extends('master')

@section('title') {{ env("APP_NAME") }} @endsection

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 ">
                    @auth
                        <div class="border rounded-3 d-flex justify-content-between align-items-center p-4 mb-4">
                            <h4 class="mb-0">
                                <span class="text-black-50 fw-bold">Welcome</span>
                                <br>
                                <span class="fw-bold">{{ auth()->user()->name }}</span>
                            </h4>
                            <a href="{{ route('post.create') }}" class="btn btn-lg btn-primary">Create Post</a>
                        </div>
                    @endauth
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            {{ $posts->links() }}
                        </div>
                        <div class="posts">
                            @forelse($posts as $post)
                            <div class="post mb-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('storage/cover/'.$post->cover) }}" class="cover-img w-100 rounded-3" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex flex-column justify-content-between h-350 py-4">
                                            <div>
                                                <h4 class="fw-bold">{{ $post->title }}</h4>
                                                <p class="text-black-50 mb-0">
                                                    {{ $post->excerpt }}
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <img src="{{ asset($post->user->photo) }}" class="mt-1 user-img rounded-circle border-white shadow" alt="">
                                                    <p class="mb-0 ms-2">
                                                        {{ $post->user->name }} <br>
                                                        <i class="fas fa-calendar"></i> {{ $post->created_at->format("d-M-Y") }}
                                                    </p>
                                                </div>
                                                <a href="{{ route('detail',$post->slug) }}" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    <div class="bg-primary text-light d-flex justify-content-center align-items-center index-footer">
        <p class="mb-0">
            &copy; {{ date('Y') }} United Wood Industries. All Right Reversed.
        </p>
    </div>
@endsection
