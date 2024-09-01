@extends("welcome")
@section("content")
<div class="d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="btn btn-default-primary">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff; background-color: Green; border-radius: 12px; padding: 0.2cm;"></i>
    </a>
    <h1 class="mx-auto text-center text-warning">Details Department</h1>
</div>
    


    <table class="table styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Département</th>
                <th>Nom du Responsable</th>
                <th>Empolyees</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            
                <tr>
                <td>{{ $Department->id }}</td>
                    <td>{{ $Department->department_name }}</td>
                    {{-- <td>{{ $Department->manager_name }}</td> --}}
                    <td>
                        
                        <ul>
                                <li>{{ $Department->user->name}}</li>
                        </ul>
                    </td>
                    <td>
                        @foreach ($Department->employees as $empolyee)
                            
                        <ul>
                            <li>{{ $empolyee->first_name}}</li>
                        </ul>
                        @endforeach
                    </td>
                                    
                    <td>
                        <a href="{{ route('departments.edit', $Department->id) }}" class="link">
                            <button class="btn btn-success"> 
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </button>
                        </a>
                    </td>
                    <td>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-departmentid="{{ $Department->id }}">
                            <i class="fa-regular fa-trash-can"></i> Supprimer
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
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Supprimer Département</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce département ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form id="deleteDepartmentForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
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