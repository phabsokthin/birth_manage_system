@foreach ($communes as $com)

<div class="modal fade" id="ModalDelete{{$com->commune_id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងលុប</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('commune.destroy',$com->commune_id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="p_code" class="form-label">
                           <h2>តើអ្នកចង់លុប 
                            <a style="color: red;"> {{$com->commune_kh_name}}</a>
                            ?
                            </h2> 
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-danger">លុប </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach