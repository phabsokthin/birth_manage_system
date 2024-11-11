@foreach ($villages as $vill)

<div class="modal fade" id="ModalEdit{{$vill->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">ផ្ទាំងកែប្រែ</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form data-update-id="{{$vill->id}}" class="update-form" action="{{ route('village.update',$vill->id) }}" method="POST">
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
                        <input type="text" class="form-control" id="village_kh_name" name="village_kh_name" value="{{$vill->village_kh_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះភូមិជាភាសាខ្មែរ" required pattern="[\u1780-\u17FF\s]+"
                        title="Only Khmer characters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="village_en_name" class="form-label">ភូមិ(Engish)</label>
                        <input type="text" class="form-control" id="village_en_name" name="village_en_name" value="{{$vill->village_en_name}}" 
                        placeholder="ចូរបញ្ចូលឈ្មោះស្រុកជាភាសា English" pattern="[A-Za-z\s]+"
                        title="Only letters are allowed">
                    </div>

                    <div class="mb-3">
                        <label for="village_code" class="form-label">លេដកូដ</label>
                        <input type="text" class="form-control" id="village_code" name="village_code" value="{{$vill->village_code}}" 
                        placeholder="ចូរបញ្ចូលលេខកូដ" required pattern="\d+"
                        title="Only numbers are allowed">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">ស្ថានភាព</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="" disabled>ជ្រើសរើសស្ថានភាព</option>
                            <option value="1" {{ $vill->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $vill->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">បិទ</button>
                        <button type="submit" class="btn btn-primary save-button" data-update-id="{{$vill->id}}" >រក្សាទុក</button>
                        <button type="button" class="btn btn-primary saving-button" data-update-id="{{$vill->id}}" style="display: none;" disabled>កំពុងរក្សាទុក...</button>
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
