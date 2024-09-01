@extends("welcome")
@section("content")

  <div class="d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>
</div>
<div class="d-flex justify-content-center align-items-center">
    <h1 class="text-center text-warning">Liste des Employés</h1>
</div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card w-100">
                <div class="card-body">
                    <h5><B class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</B></h5>
                    <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $employee->phone_number }}</p>
                    <p class="card-text"><strong>Hire Date:</strong> {{ $employee->hire_date }}</p>
                    <p class="card-text">
                        <strong>Departments </strong> <ul>
                        @foreach ($employee->departments as $departments) 
                            <li>{{ $departments->department_name }}</li>
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
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-pen-to-square"></i> Update
                        </a>
                        <a href="{{ route('pdf.generate', $employee->id) }}" class="btn btn-info">
                            <i class="fas fa-file-pdf"></i> PDF 
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-employeeid="{{ $employee->id }}">
                            <i class="fa-regular fa-trash-can"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteEmployeeForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Attach event listener to the delete button
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var employeeId = button.getAttribute('data-employeeid'); // Extract employee ID from data-* attribute
            var form = document.getElementById('deleteEmployeeForm');
            form.action = '/employees/' + employeeId; // Update the form action with the employee ID
        });
    </script>
@endsection