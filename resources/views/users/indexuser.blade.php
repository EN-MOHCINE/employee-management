@extends("welcome")
@section("content")
<div class="d-flex justify-content-between align-items-center">
    <!-- Home button on the left -->
    <a href="{{ route('home1') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>

    <!-- Centered title -->
    <h1 class="text-center text-warning flex-grow-1">Liste des Utilisateurs</h1>

    <!-- Right-aligned buttons -->
    <div class="d-flex align-items-center">
        <a class="nav-link" href="{{ route('users.export') }}">
            <button class="btn btn-secondary me-2">
                <i class="fa-solid fa-file-export"></i> Export data
            </button>
        </a>
        <a class="nav-link" href="{{ route('users.create') }}">
            <button class="btn btn-primary me-2">
                <i class="fa-solid fa-user-plus"></i> Add user
            </button>
        </a>
        <a class="nav-link" href="{{ route('logout') }}">
            <button class="btn btn-danger">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </a>
    </div>
</div>


<!-- Content for authenticated users -->
<table class="table styled-table">
    <thead>
        <tr>
            {{-- <th>ID</th> --}}
            <th>Picture</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Show Details</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user) 
            <tr>
                {{-- <td>{{ $user->id }}</td> --}}
                <td>
                    <img src="{{ asset('storage/'.$user->picture) }}" alt="User Picture" style="width: 50px; height: 50px; border-radius: 50%;">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}">
                        <button type="button" class="btn btn-warning"><i class="fa-solid me-1 fa-circle-info"> </i>More Details</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="link">
                        <button class="btn btn-success"> 
                            <i class="fa-solid fa-pen-to-square"></i> Update
                        </button>
                    </a>
                </td>
                <td>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-userid="{{ $user->id }}">
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