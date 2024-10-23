@foreach ($communes as $com)

<div class="modal fade" id="ModalDetail{{$com->commune_id}}" tabindex="-1" aria-labelledby="ModalLabel{{$com->commune_id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel{{$com->commune_id}}">ព័ត៌មានលម្អិត</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('commune.show', $com->commune_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="dis_id" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <select class="form-select" id="dis_id" name="dis_id" disabled required>
                            <option value="">ជ្រើសរើសឈ្មោះខេត្តជាភាសាខ្មែរ</option>
                            @foreach($districts as $dis)
                                <option value="{{ $dis->dis_id }}"@if ($com->dis_id==$dis->dis_id) selected @endif>
                                    {{ $dis->district_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="commune_kh_name" class="form-label">ឃុំ(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="commune_kh_name" name="commune_kh_name" value="{{$com->commune_kh_name}}" placeholder="ចូរបញ្ចូលឃុំ(ខ្មែរ)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="commune_en_name" class="form-label">ឃុំ(Engish)</label>
                        <input type="text" class="form-control" id="commune_en_name" name="commune_en_name" value="{{$com->commune_en_name}}" placeholder="ចូរបញ្ចូលឃុំ(Engish)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="commune_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="commune_code" name="commune_code" value="{{$com->commune_code}}" placeholder="ចូរបញ្ចូលលេខកូដ" disabled>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary" disabled>យល់ស្រប</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach