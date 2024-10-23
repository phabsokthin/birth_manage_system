@foreach ($villages as $vill)

<div class="modal fade" id="ModalDetail{{$vill->id}}" tabindex="-1" aria-labelledby="ModalLabel{{$vill->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel{{$vill->id}}">ព័ត៌មានលម្អិត</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('village.show', $vill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="dis_id" class="form-label">ឈ្មោះឃុំ (Khmer)</label>
                        <select class="form-select" id="dis_id" name="dis_id" disabled required>
                            <option value="">ជ្រើសរើសឈ្មោះឃុំជាភាសាខ្មែរ</option>
                            @foreach($communes as $com)
                                <option value="{{ $com->commune_id }}"@if ($vill->commune_id==$com->commune_id) selected @endif>
                                    {{ $com->commune_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="village_kh_name" class="form-label">ភូមិ(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="village_kh_name" name="village_kh_name" value="{{$vill->village_kh_name}}" placeholder="ចូរបញ្ចូលភូមិ(ខ្មែរ)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="village_en_name" class="form-label">ភូមិ(Engish)</label>
                        <input type="text" class="form-control" id="village_en_name" name="village_en_name" value="{{$vill->village_en_name}}" placeholder="ចូរបញ្ចូលភូមិ(Engish)" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="village_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="village_code" name="village_code" value="{{$vill->village_code}}" placeholder="ចូរបញ្ចូលលេខកូដ" disabled>
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