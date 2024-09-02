@extends("welcome") 
@section('content')

<div class="center-content" style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f9f9f9;">
    <div class="text-and-buttons" style="text-align: center;">
        <div class="text-container" style="margin-bottom: 20px;">
            <h1 style="font-size: 2.5rem; font-weight: bold; color: #2c3e50;">Welcome to the best application for managing your employees.</h1>
            {{-- <p style="font-size: 1.2rem; color: #7f8c8d;">Have a good time in our center together with your children!</p> --}}
        </div>
        <div class="button-container" style="margin-top: 30px;">
            {{-- <a href="#" class="btn btn-primary" style="background-color: #7257fa; border-color: #7257fa; padding: 10px 20px; font-size: 1rem;">About the Center</a> --}}
            <a href="{{ route('login.index') }}" class="btn btn-primary" style="background-color: #7257fa; border-color: #7257fa;">Sign In</a>
            {{-- <a href="#" class="btn btn-success">Sign Up</a> --}}
        </div>
    </div>
</div>

@endsection