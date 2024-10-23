@foreach ($districts as $districts)


<div class="modal fade" id="ModalDetail{{$districts->dis_id}}" tabindex="-1" aria-labelledby="ModalLabel{{$districts->dis_id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel{{$districts->dis_id}}">ព័ត៌មានលម្អិត</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('district.show', $districts->dis_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="province_id" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <select class="form-select" id="province_id" name="province_id" disabled required>
                            <option value="">ជ្រើសរើសឈ្មោះខេត្តជាភាសាខ្មែរ</option>
                            @foreach($province as $pro)
                            <option value="{{ $pro->province_id }}" @if ($districts->province_id==$pro->province_id) selected @endif>
                                {{ $pro->province_kh_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="district_kh_name" class="form-label">ស្រុក(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="district_kh_name" name="district_kh_name" value="{{$districts->district_kh_name}}" placeholder="ចូរបញ្ចូលស្រុក(ខ្មែរ)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="district_en_name" class="form-label">ស្រុក(Engish)</label>
                        <input type="text" class="form-control" id="district_en_name" name="district_en_name" value="{{$districts->district_en_name}}" placeholder="ចូរបញ្ចូលស្រុក(Engish)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="dis_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="dis_code" name="dis_code" value="{{$districts->dis_code}}" placeholder="ចូរបញ្ចូលលេខកូដ" disabled>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary" disabled>រក្សាទុក</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach