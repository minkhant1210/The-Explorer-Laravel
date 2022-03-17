@extends('master')

@section('title') Edit Profile @endsection

@section('content')
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5 ">
                    <div class="text-center">
                        <h4 class="text-primary">Change Password</h4>
                        <img src="{{ asset(auth()->user()->photo) }}" class="profile-img" alt="" id="photoUi">
                        <br>
                        <p class="mb-0">{{ auth()->user()->name }}</p>
                        <p class="small text-black-50">{{ auth()->user()->email }}</p>
                    </div>
                    <form action="{{ route('profile.updatePassword') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror rounded-3" id="userName" placeholder="no need">
                            <label for="userName">Current Password</label>
                            @error('old_password')
                            <div class="text-danger ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror rounded-3" id="userEmail" placeholder="no need">
                            <label for="userEmail">New Password</label>
                            @error('password')
                            <div class="text-danger ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror rounded-3" id="userEmail" placeholder="no need">
                            <label for="userEmail">Confirm Password</label>
                            @error('password_confirmation')
                            <div class="text-danger ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="bn btn-primary btn-lg rounded-3">
                                <i class="fas fa-arrows-rotate"></i>
                                Change
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
