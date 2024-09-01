@extends("welcome")
@section("content")

    


    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card w-100">
                <div class="card-body">
                    <b class="card-title text-center"> <h1 class="text-warning">Empolye :{{ $employee->first_name }} {{ $employee->last_name }}</h1></b>
                    <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $employee->phone_number }}</p>
                    <p class="card-text"><strong>Hire Date:</strong> {{ $employee->hire_date }}</p>
                    <p class="card-text">
                        <strong>Departments:</strong>
                        <ul>
                            @foreach ($employee->departments as $department)
                                <li>{{ $department->department_name }}</li>
                            @endforeach
                        </ul>
                    </p>
                    <p class="card-text"><strong>Job ID:</strong> {{ $employee->job_id }}</p>
                    <p class="card-text"><strong>Department ID:</strong> {{ $employee->department_id }}</p>
                    <p class="card-text"><strong>User ID:</strong> {{ $employee->user_id }}</p>
                    <p class="card-text"><strong>Salary:</strong> {{ $employee->salary }}</p>
                    <p class="card-text"><strong>Manager ID:</strong> {{ $employee->manager_id }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $employee->created_at }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $employee->updated_at }}</p>
                    <p class="card-text"><strong>Fcture</strong> 45000</p>
                </div>
            </div>
        </div>
    </div>
  

@endsection