@extends("welcome")
@section("content")

<div class="d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>
    <h1 class="mx-auto text-center text-warning">Details Utilisateur</h1>
</div>

<table class="table styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Departments</th>
            <th>Last Update</th>
            <th>Date Created</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <ul>

                
                @foreach ($user->departments as $department)
                    <li>{{ $department->department_name }}</li>
                @endforeach
            </ul>
            </td>
            <td>{{ $user->updated_at ? $user->updated_at :"Null"  }}</td>
            <td>{{ $user->created_at ? $user->created_at : 'null' }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="link">
                    <button class="btn btn-success">Update</button>
                </a>
            </td>
            <td>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-userid="{{ $user->id }}">
                    Delete
                </button>
            </td>
        </tr>
    </tbody>
</table>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteUserForm" method="POST">
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
        var userId = button.getAttribute('data-userid'); // Extract user ID from data-* attribute
        var form = document.getElementById('deleteUserForm');
        form.action = '/users/' + userId; // Update the form action with the user ID
    });
</script>

@endsection
