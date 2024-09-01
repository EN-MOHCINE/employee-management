@extends("welcome")

@section("content")

<div class="d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>
    
    <h1 class="mx-auto text-center text-warning">Edit User</h1>
</div>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="ms-5 card w-25 d-flex justify-content-center align-items-center">
        <form method="POST" class="card-body" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- For HTTP method spoofing -->

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="picture">Profile Picture</label>
                <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture">
                @error('picture')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary m-5">Update User</button>
        </form>
    </div>
</div>
@endsection