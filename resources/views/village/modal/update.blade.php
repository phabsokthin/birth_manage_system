@foreach ($villages as $vill)

<div class="modal fade" id="ModalEdit{{$vill->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងកែប្រែ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('village.update',$vill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="commune_id" class="form-label">ឈ្មោះឃុំ (Khmer)</label>
                        <select class="form-select" id="commune_id" name="commune_id" required>
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
                        <input type="text" class="form-control" id="village_kh_name" name="village_kh_name" value="{{$vill->village_kh_name}}" placeholder="ចូរបញ្ចូលភូមិ(ខ្មែរ)" required>
                    </div>

                    <div class="mb-3">
                        <label for="village_en_name" class="form-label">ភូមិ(Engish)</label>
                        <input type="text" class="form-control" id="village_en_name" name="village_en_name" value="{{$vill->village_en_name}}" placeholder="ចូរបញ្ចូលភូមិ(Engish)" required>
                    </div>

                    <div class="mb-3">
                        <label for="village_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="village_code" name="village_code" value="{{$vill->village_code}}" placeholder="ចូរបញ្ចូលលេខកូដ" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
