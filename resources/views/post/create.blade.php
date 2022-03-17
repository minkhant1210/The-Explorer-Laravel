@extends('master')

@section('title') Create Post : {{ env('APP_NAME') }} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Create New Post</h4>
                    <p class="mb-0">
                        <i class="fas fa-calendar fa-fw"></i>
                        {{ date("d-M-Y") }}
                    </p>
                </div>
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="postTitle" placeholder="no need">
                        <label for="postTitle">Post Title</label>
                        @error('title')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <img src="{{ asset('image-default.png') }}" id="coverPreview" class="cover-img w-100 rounded @error('title') is-invalid @enderror" alt="">
                        <input type="file" name="cover" class="d-none" id="cover" accept="image/jpeg,image/png">
                        @error('cover')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control @error('title') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 350px"></textarea>
                        <label for="floatingTextarea2">Share your experiences</label>
                        @error('description')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 text-center">
                        <button class="btn btn-lg btn-primary">
                            <i class="fas fa-message"></i>
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let coverPreview = document.querySelector('#coverPreview')
        let cover = document.querySelector('#cover');

        coverPreview.addEventListener('click', () => cover.click())
        cover.addEventListener('change', () => {
            const reader = new FileReader();
            const file = cover.files[0];
            reader.onload = function (){
                coverPreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        })
    </script>
@endpush
