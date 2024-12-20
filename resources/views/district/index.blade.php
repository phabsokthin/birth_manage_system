@extends('layouts.layout')
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</header>
@section('content')
    @extends('cdn')
    @if (Session::has('success'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'success',
                title: '<h6 class="d-flex align-items-center" style="margin-left:10px">បានរក្សាទុកដោយជោគជ័យ</h6>'
            });
        </script>
    @endif

    <div class="content-wrapper p-4">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book-user">
                    <path d="M15 13a3 3 0 1 0-6 0" />
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                    <circle cx="12" cy="8" r="2" />
                </svg>
                <h5>ព័ត៌មានរបស់ស្រុក</h5>
            </div>
            <div class="d-flex gap-2 ms-auto">
                <button type="button" class="btn btn-danger btn-round" id="DeleteButton" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal" disabled>
                    <i class="fa fa-trash-alt"></i> {{ __('លុបទាំងអស់') }}
                </button>
                <a class="btn btn-primary btn-round ml-3" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                    <i class="fa fa-plus"></i> {{ __('បង្កើតថ្មី') }}
                </a>
            </div>
        </div>
        <form id="delete-form" method="POST" action="{{ route('districts.deleteall') }}">
            @csrf
            @method('DELETE')

            <!-- Message for alerting user about unchecked items -->
            <div class="alert alert-warning d-none" id="alert-message" role="alert">
                សូមជ្រើសរើសរបស់ដែលអ្នកចង់លុប! <!-- Message in Khmer -->
            </div>

            <div style="background-color: white; border-top:2px solid blue;height:100vh;" class="p-3">
                <table class="table table-striped my-3 table-bordered " id="Datatable">
                    <thead class="sidebar-dark-primary text-light" style="width: 100px">
                        <tr>
                            <th scope="col">
                                <input type="checkbox" id="checkAll" />
                            </th>
                            <th scope="col">ខេត្តខ្មែរ</th>
                            <th scope="col">ខេត្តអងគ្លេស</th>
                            <th scope="col">ឈ្មោះខ្មែរ</th>
                            <th scope="col">ឈ្មោះអងគ្លេស</th>
                            <th scope="col">លេខកូដ</th>
                            <th scope="col">ស្ថានភាព</th>
                            <th class="text-center align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($districts as $dist)
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="ids[]" value="{{ $dist->dis_id }}"
                                        class="delete-checkbox" />
                                </th>
                                <td>{{ $dist->province->province_kh_name }}</td>
                                <td>{{ $dist->province->province_en_name }}</td>
                                <td>{{ $dist->district_kh_name }}</td>
                                <td>{{ $dist->district_en_name }}</td>
                                <td>{{ $dist->dis_code }}</td>
                                <!-- <td>{{ $dist->status }}</td> -->
                                <td>
                                    <div
                                        class="{{ $dist->status == 1 ? 'btn btn-success btn-xs rounded-pill' : 'btn btn-danger btn-xs rounded-pill' }}">
                                        {{ $dist->status == 1 ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="view-details-url" class="btn btn-warning btn-sm p-1" title="View Details"
                                        data-bs-toggle="modal" data-bs-target="#ModalDetail{{ $dist->dis_id }}">
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                    <div style="display: inline-block; margin-left: 5px;" class="">
                                        <a href="#" class="edit btn btn-secondary btn-sm p-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit{{ $dist->dis_id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="edit btn btn-danger btn-sm p-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete{{ $dist->dis_id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>


    <!-- including modal -->
    @include('district.modal.create')
    @include('district.modal.update')
    @include('district.modal.delete')
    @include('district.modal.deleteall')
    @include('district.modal.detail')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        // Select all checkboxes
        const checkboxes = document.querySelectorAll('.delete-checkbox');
        const deleteButton = document.getElementById('DeleteButton');
        const alertMessage = document.getElementById('alert-message');

        // Function to update the Delete button's state
        function updateDeleteButtonState() {
            const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteButton.disabled = !isAnyChecked;
            alertMessage.classList.add('d-none');
        }

        // Check all functionality
        document.getElementById('checkAll').addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateDeleteButtonState(); // Update button state
        });

        // Add event listeners to each checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateDeleteButtonState);
        });

        deleteButton.addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('.delete-checkbox:checked');

            if (selectedCheckboxes.length === 0) {
                alertMessage.classList.remove('d-none');
                return;
            }

            // Show the confirmation modal
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            confirmModal.show();
        });


        document.getElementById('confirmDelete').addEventListener('click', function() {

            document.getElementById('delete-form').submit();
        });

        // Delete button click event for form submission
        document.getElementById('DeleteButton').addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('.delete-checkbox:checked');

            if (selectedCheckboxes.length === 0) {
                alertMessage.classList.remove('d-none');
                return;
            }
            alertMessage.classList.add('d-none');

            // Show the confirmation modal
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            confirmModal.show();
        });
    </script>
@endsection
