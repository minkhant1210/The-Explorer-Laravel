@extends('master')

@section('title') {{ env("APP_NAME") }} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 ">
                <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                                <img src="{{ asset('storage/cover/'.$post->cover) }}" class="w-100 rounded-2" alt="">
                        </div>
                        <div class="col-12 col-lg-8">
                            <h4 class="mb-2 mb-lg-0 fw-bold">{{ $post->title }}</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <img src="{{ asset($post->user->photo) }}" class="mt-1 user-img rounded-circle border-white shadow" alt="">
                                    <p class="mb-0 ms-2">
                                        {{ $post->user->name }} <br>
                                        <i class="fas fa-calendar text-primary"></i> {{ $post->created_at->format("d-M-Y") }}
                                    </p>
                                </div>
                                <a href="{{ route('index') }}" class="btn btn-outline-primary">Read All</a>
                            </div>
                            <hr>
                            <p>
                                {{ $post->description }}
                            </p>
                        </div>
                </div>
                <div class="text-end">
                    @can('update',$post)
                    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    @endcan
                    @can('delete',$post)
                    <form class="d-inline-block" action="{{ route('post.destroy',$post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                        @endcan
                </div>
                @if($post->galleries->count())
                    <div class="row border rounded p-4 g-4 mt-2 mb-4 d-flex justify-content-center">
                        @foreach($post->galleries as $gallery)
                        <div class="col-6 col-lg-4 col-xl-3">
                            <a class="venobox" data-gall="gallery" href="{{ asset('storage/gallery/'.$gallery->photo) }}">
                                <img src="{{ asset('storage/gallery/'.$gallery->photo) }}" class="gallery-photo rounded" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                @endif
                <div class="row justify-content-center align-items-center mb-5">
                    <div class="col-12 col-lg-8">
                        <div class="text-center mb-3">
                            <h4>Users' Comments</h4>
                        </div>
                        <div class="comments">
                            @forelse($post->comments as $comment)
                            <div class="border p-3 rounded-3 mb-3" id="comment">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="d-flex">
                                        <img src="{{ asset($comment->user->photo) }}" class="mt-1 user-img rounded-circle border-white shadow" alt="">
                                        <p class="mb-0 ms-2">
                                            {{ $comment->user->name }} <br>
                                            <i class="fas fa-calendar text-primary"></i> {{ $comment->created_at->diffforhumans()}}
                                        </p>
                                    </small>
                                    @can('delete',$comment)
                                    <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger rounded-circle">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                                <p class="ps-5 mb-0">{{ $comment->message }}</p>
                            </div>
                            @empty
                                <p class="text-center">
                                    There is no comment Yet!
                                    @auth
                                        Start comment now
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}">Login</a>to comment.
                                    @endguest
                                </p>
                            @endforelse
                        </div>
                        @auth()
                        <div class="">
                            <form action="{{ route('comment.store') }}" method="post" id="commentForm">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                                    <textarea class="form-control @error('message') is-invalid @enderror rounded-3" name="message" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                    @error('message')
                                    <div class="text-danger ps-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">Comment</button>
                                </div>
                            </form>
                        </div>
                        @endauth
                    </div>
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

@push('script')
    <script>
        new VenoBox({
            selector: '.venobox'
        });
    </script>
@endpush
