@foreach ($province as $pro)
<div class="modal fade" id="ModalDetail{{$pro->province_id}}" tabindex="-1" aria-labelledby="ModalLabel{{$pro->province_id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel{{$pro->province_id}}">ព័ត៌មានលម្អិត</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('province.show', $pro->province_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="p_code" class="form-label">លេខកូដ</label>
                        <input type="text" class="form-control" id="p_code{{$pro->province_id}}" name="p_code" value="{{ $pro->p_code }}" placeholder="ចូរបញ្ចូលលេខកូដ" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="province_en_name" class="form-label">ឈ្មោះខេត្ត (English)</label>
                        <input type="text" class="form-control" id="province_en_name{{$pro->province_id}}" name="province_en_name" value="{{ $pro->province_en_name }}" placeholder="ចូរបញ្ចូលឈ្មោះខេត្តជាភាសា English" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="province_kh_name" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <input type="text" class="form-control" id="province_kh_name{{$pro->province_id}}" name="province_kh_name" value="{{ $pro->province_kh_name }}" placeholder="ចូរបញ្ចូលឈ្មោះខេត្តជាភាសាខ្មែរ" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="modify_date" class="form-label">កាលបរិច្ឆេទ</label>
                        <input type="date" class="form-control" id="modify_date{{$pro->province_id}}" name="modify_date" value="{{ $pro->modify_date }}" disabled>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">បិទ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
