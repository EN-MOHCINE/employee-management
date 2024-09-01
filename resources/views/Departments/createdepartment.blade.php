@extends("welcome")
@section("content")

<div class="d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>
    <h1 class="mx-auto text-center text-warning">create new Department </h1>
</div>


<div class="container">
    
        {{-- @dd($manger) --}}
        
    <div class="row justify-content-center">
        <div class="ms-5 card w-25 d-flex justify-content-center align-items-center">
            <form method="POST" class="card-body" action="{{ route('departments.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="department_name">department_name</label>
                    <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="department_name"  name="department_name" value="{{ old('department_name') }}" required>
                    @error('department_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="manger">manger address</label>
                    <input type="manger" class="form-control @error('manger') is-invalid @enderror" id="manger" name="manger" value="{{ old('manger') }}" required>
                    @error('manger')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
               <select class="form-select mb-3" id="manager_id"  name="manager_id" required>
                        @foreach ($managers as $manager)
                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                        @endforeach                             
                    </select>
            
                <button type="submit" class="btn btn-primary mt-3">Create </button>
            </form>
        </div>
    </div>
</div>
@endsection
