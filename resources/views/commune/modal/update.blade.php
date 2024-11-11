@foreach ($communes as $com)

<div class="modal fade" id="ModalEdit{{$com->commune_id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងកែប្រែ</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form data-update-id="{{$com->commune_id}}" class="update-form" action="{{ route('commune.update',$com->commune_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="dis_id" class="form-label">ឈ្មោះស្រុក (Khmer)</label>
                        <select class="form-select" id="dis_id" name="dis_id" required>
                            <option value="">ជ្រើសរើសឈ្មោះស្រុកជាភាសាខ្មែរ</option>
                            @foreach($districts as $dis)
                                <option value="{{ $dis->dis_id }}"@if ($com->dis_id==$dis->dis_id) selected @endif>
                                    {{ $dis->district_kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="commune_kh_name" class="form-label">ឃុំ(ខ្មែរ)</label>
                        <input type="text" class="form-control" id="commune_kh_name" name="commune_kh_name" value="{{$com->commune_kh_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះឃុំជាភាសាខ្មែរ" required pattern="[\u1780-\u17FF\s]+"
                               title="Only Khmer characters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="commune_en_name" class="form-label">ឃុំ(Engish)</label>
                        <input type="text" class="form-control" id="commune_en_name" name="commune_en_name" value="{{$com->commune_en_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះឃុំជាភាសា English" pattern="[A-Za-z\s]+"
                               title="Only letters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="commune_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="commune_code" name="commune_code" value="{{$com->commune_code}}" 
                        placeholder="ចូរបញ្ចូលលេខកូដ" required pattern="\d+"
                        title="Only numbers are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">ស្ថានភាព</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled>ជ្រើសរើសស្ថានភាព</option>
                            <option value="1" {{ $com->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $com->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary save-button" data-update-id="{{$com->commune_id}}" >រក្សាទុក</button>
                        <button type="button" class="btn btn-primary saving-button" data-update-id="{{$com->commune_id}}" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
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
            const updateId = form.getAttribute("data-update-id");
            const saveButton = form.querySelector(`.save-button[data-update-id="${updateId}"]`);
            const savingButton = form.querySelector(`.saving-button[data-update-id="${updateId}"]`);

            // // Enable save button if form is valid
            // form.addEventListener("input", function () {
            //     saveButton.disabled = !form.checkValidity();
            // });

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
