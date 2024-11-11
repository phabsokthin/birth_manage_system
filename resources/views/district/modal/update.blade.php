@foreach ($districts as $dis)

<div class="modal fade" id="ModalEdit{{$dis->dis_id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងកែប្រែ</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form data-district-id="{{$dis->dis_id}}" class="update-form" action="{{ route('district.update',$dis->dis_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="province_id" class="form-label">ឈ្មោះខេត្ត (Khmer)</label>
                        <select class="form-select" id="province_id" name="province_id" required>
                            <option value="">ជ្រើសរើសឈ្មោះខេត្តជាភាសាខ្មែរ</option>
                            @foreach($province as $pro)
                                <option value="{{ $pro->province_id }}"@if ($dis->province_id==$pro->province_id) selected @endif>
                                    {{ $pro->province_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="district_kh_name" class="form-label">ស្រុក(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="district_kh_name" name="district_kh_name" value="{{$dis->district_kh_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះស្រុកជាភាសាខ្មែរ" required pattern="[\u1780-\u17FF\s]+"
                        title="Only Khmer characters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="district_en_name" class="form-label">ស្រុក(Engish)</label>
                        <input type="text" class="form-control" id="district_en_name" name="district_en_name" value="{{$dis->district_en_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះស្រុកជាភាសា English" pattern="[A-Za-z\s]+"
                               title="Only letters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="dis_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="dis_code" name="dis_code" value="{{$dis->dis_code}}" 
                        placeholder="ចូរបញ្ចូលលេខកូដ" required pattern="\d+"
                        title="Only numbers are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">ស្ថានភាព</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled>ជ្រើសរើសស្ថានភាព</option>
                            <option value="1" {{ $dis->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $dis->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary save-button" data-district-id="{{$dis->dis_id}}" >រក្សាទុក</button>
                        <button type="button" class="btn btn-primary saving-button" data-district-id="{{$dis->dis_id}}" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const forms = document.querySelectorAll(".update-form");

        forms.forEach(form => {
            const districtId = form.getAttribute("data-district-id");
            const saveButton = form.querySelector(`.save-button[data-district-id="${districtId}"]`);
            const savingButton = form.querySelector(`.saving-button[data-district-id="${districtId}"]`);

           

            // Display loading button on submit
            form.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent default form submission to show loading state
                saveButton.style.display = "none";
                savingButton.style.display = "inline-block";

           
            form.submit();
        });
        });
    });
</script>

