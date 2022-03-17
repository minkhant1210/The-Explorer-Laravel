@extends('master')

@section('title') Edit Profile @endsection

@section('content')
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5 ">
                    <div class="text-center">
                        <img src="{{ asset(auth()->user()->photo) }}" class="profile-img" alt="" id="photoUi">
                        <br>
                        <button class="btn btn-sm btn-primary" id="editPhoto" style="margin-top: -35px">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <p class="mb-0">{{ auth()->user()->name }}</p>
                        <p class="small text-black-50">{{ auth()->user()->email }}</p>
                    </div>
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="d-none" name="photo" accept="image/jpeg,image/png" id="photoUpload">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" value="{{ old('name',auth()->user()->name) }}" class="form-control @error('name') is-invalid @enderror" id="userName" placeholder="no need">
                            <label for="userName">User Name</label>
                            @error('name')
                            <div class="text-danger ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" disabled name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" id="userEmail" placeholder="no need">
                            <label for="userEmail">Email</label>
                            @error('email')
                            <div class="text-danger ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="bn btn-primary btn-lg rounded-3">
                                <i class="fas fa-upload"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="bg-primary text-light d-flex justify-content-center align-items-center edit-profile-footer">
        <p class="mb-0">
            &copy; {{ date('Y') }} United Wood Industries. All Right Reversed.
        </p>
    </div>
@endsection

@push('script')
    <script>
        let photoUi = document.getElementById('photoUi')
        let photoUpload = document.getElementById('photoUpload');
        let editPhoto = document.getElementById('editPhoto');

        editPhoto.addEventListener('click', () => photoUpload.click());
        photoUpload.addEventListener('change',() => {
            const reader = new FileReader();
            const file = photoUpload.files[0];
            reader.onload = function (){
                photoUi.src = reader.result;
            }
            reader.readAsDataURL(file);
        })
    </script>
@endpush
