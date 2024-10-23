@extends('layouts.layout')
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</header>
@section('content')
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
            <h5>ព័ត៌មានរបស់ភូមិ</h5>
        </div>
        <div class="d-flex gap-2 ms-auto">
            <button type="button" class="btn btn-danger btn-round" id="delete-selected" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                <i class="fa fa-trash-alt"></i> {{ __('លុបទាំងអស់') }}
            </button>
            <a class="btn btn-primary btn-round ml-3" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                <i class="fa fa-plus"></i> {{ __('បង្កើតថ្មី') }}
            </a>
        </div>
    </div>
    <form id="delete-form" method="POST" action="{{ route('villages.deleteall')}}">
        @csrf
        @method('DELETE') 

         <!-- Message for alerting user about unchecked items -->
         <div class="alert alert-warning d-none" id="alert-message" role="alert">
            សូមជ្រើសរើសរបស់ដែលអ្នកចង់លុប! <!-- Message in Khmer -->
        </div>

        <div style="background-color: white; border-top:2px solid blue;height:100vh;" class="p-3">
            <table class="table d" id="Datatable" >
                <thead class="table-dark">
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="checkAll" />
                        </th>
                        <th scope="col">ឃុំ(ខ្មែរ)</th>
                        <th scope="col">ឃុំ(អងគ្លេស)</th>
                        <th scope="col">ឈ្មោះខ្មែរ</th>
                        <th scope="col">ឈ្មោះអងគ្លេស</th>
                        <th scope="col">លេខកូដ</th>
                        <th scope="col">ស្ថានភាព</th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($villages as $vill)
                    <tr>
                        <th scope="row">
                            <input type="checkbox" name="ids[]" value="{{$vill->id}}" class="delete-checkbox" />
                        </th>
                        <td>{{$vill->commune->commune_kh_name}}</td>
                        <td>{{$vill->commune->commune_en_name}}</td>
                        <td>{{$vill->village_kh_name}}</td>
                        <td>{{$vill->village_en_name}}</td>
                        <td>{{$vill->village_code}}</td>
                        <td>{{$vill->status}}</td>
                        <td class="text-center align-middle">
                            <a href="view-details-url" class="btn btn-warning btn-sm p-1" title="View Details"
                                data-bs-toggle="modal"
                                data-bs-target="#ModalDetail{{$vill->id}}">
                                <i class="fas fa-eye text-white"></i>
                            </a>
                            <div style="display: inline-block; margin-left: 5px;" class="">
                                <a href="#" class="edit btn btn-secondary btn-sm p-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalEdit{{$vill->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="edit btn btn-danger btn-sm p-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete{{$vill->id}}">
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
@include('village.modal.create')
@include('village.modal.update')
@include('village.modal.detail')
@include('village.modal.delete')
@include('village.modal.deleteall')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.delete-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        document.getElementById('alert-message').classList.add('d-none');
    });

    document.getElementById('DeleteButton').addEventListener('click', function() {
        const selectedCheckboxes = document.querySelectorAll('.delete-checkbox:checked');
        const alertMessage = document.getElementById('alert-message');
        
        
        if (selectedCheckboxes.length === 0) {
            alertMessage.classList.remove('d-none'); 
            return; 
        }
        alertMessage.classList.add('d-none');

        document.getElementById('delete-form').submit();
    });
</script>

@endsection
