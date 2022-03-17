@extends('master')

@section('title') Create Post : {{ env('APP_NAME') }} @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Edit Post</h4>
                    <p class="mb-0">
                        <i class="fas fa-calendar fa-fw"></i>
                        {{ date("d-M-Y") }}
                    </p>
                </div>
                <form action="{{ route('post.update',$post->id) }}" method="post" id="postCreate" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-floating mb-4">
                        <input type="text" name="title" value="{{ old('title',$post->title) }}" class="form-control @error('title') is-invalid @enderror" id="postTitle" placeholder="no need">
                        <label for="postTitle">Post Title</label>
                        @error('title')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <img src="{{ asset('storage/cover/'.$post->cover) }}" id="coverPreview" class="cover-img w-100 rounded" alt="">
                        <input type="file" name="cover" class="d-none" id="cover" accept="image/jpeg,image/png">
                        @error('cover')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 350px">{{ old('description',$post->description) }}</textarea>
                        <label for="floatingTextarea2">Share your experiences</label>
                        @error('description')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
                <div class="border rounded p-3 mb-4" id="gallery">

                    <div class="d-flex align-items-stretch">
                        <div class="border rounded px-5 d-flex justify-content-center align-items-center me-2" id="uploadUi" style="height: 150px">
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="d-flex overflow-auto" style="height: 150px">
                            @forelse($post->galleries as $gallery)
                                <div class="">
                                    <img src="{{ asset('storage/gallery/'.$gallery->photo) }}" alt="" class="h-100 rounded me-2">
                                    <form action="{{ route('gallery.destroy',$gallery->id) }}" method="post" class="text-end">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger img-delete-btn"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data" id="galleryUpload">
                        @csrf
                        <div class="">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="file" class="d-none" id="galleryInput" name="galleries[]" multiple accept="image/jpeg,image/png">
                        </div>
                        @error('galleries')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                        @error('galleries.*')
                        <div class="text-danger ps-2">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
                <div class="mb-4 text-center">
                    <button class="btn btn-lg btn-primary" form="postCreate">
                        <i class="fas fa-message"></i>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="bg-primary text-light index-footer d-flex justify-content-center align-items-center">
        <p class="mb-0">
            &copy; {{ date('Y') }} United Wood Industries. All Right Reversed.
        </p>
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

        let uploadUi = document.getElementById('uploadUi');
        let galleryInput = document.getElementById('galleryInput');
        let galleryUpload = document.getElementById('galleryUpload');

        uploadUi.addEventListener('click', () => galleryInput.click());
        galleryInput.addEventListener('change', () => galleryUpload.submit());
    </script>
@endpush
