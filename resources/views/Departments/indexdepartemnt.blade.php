@extends("welcome")
@section("content")

    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="btn btn-default-primary">
            <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
        </a>
        <h1 class="text-center text-warning">Liste des Departments </h1>
        <a class="nav-link" href="{{ route('departments.create') }}">
            <button class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i> Add Department
            </button>
        </a>
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

    <table class="table styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Show Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department) 
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>
                        <a href="{{ route('departments.show', $department->id) }}">
                            <button type="button" class="btn btn-warning"><i class="fa-solid me-1 fa-circle-info"> </i>More Details</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="link">
                            <button class="btn btn-success"> 
                                <i class="fa-solid fa-pen-to-square"></i> Update
                            </button>
                        </a>
                    </td>
                    <td>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-departmentid="{{ $department->id }}">
                            <i class="fa-regular fa-trash-can"></i> Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteDepartmentForm" method="POST">
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
            var departmentId = button.getAttribute('data-departmentid'); // Extract department ID from data-* attribute
            var form = document.getElementById('deleteDepartmentForm');
            form.action = '/departments/' + departmentId; // Update the form action with the department ID
        });
    </script>
@endsection